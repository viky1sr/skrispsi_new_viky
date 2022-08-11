<?php

namespace App\Console\Commands;

use App\Genetic\ReservationGenetic\Repositories\GeneticRepository;
use App\HomeCare\Reservation\Repositories\ReservationRepository;
use App\HomeCare\User\User;
use App\LogGenetic;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AlgorithmGenetic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'algorithm:genetic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running Reservation with algorithm genetic';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    private $repoGenetic;

    public function __construct(
        GeneticRepository $repoGenetic,
        ReservationRepository $repoReservation
    )
    {
        parent::__construct();
        $this->repoGenetic = $repoGenetic;
        $this->repoReservation = $repoReservation;
    }

    /**
     * Execute the console command.
     *
     * @return int
     *
     * 1  = type_resevation ( Home Care )
     * 2  = type_resevation ( Baby Spa )
     * Inisialasi Variable:
    w = minggu ( nilai  7 )
    d = default reservasi  ( nilai awal 0 )
    wm = pertemuan mingguan ( pertemuan dalam 1 bulan berapa minggu
    pr = pertemuan_reservasi ( total pertemuan resevasi )
    tr = tanggal_rservasi ( tanggal reservasi yang akan berjalan )
    dt = tanggal sekarang
    br = berjalanya_reservasi ( hasil reservasi yang berjalan )
    mr = max reservasi (nilai akhir reservasi )
    r =  hasil

    “ (   mr  >  d  & dt  >=  ( tr + ( br +  ( wm * w ) ) )  =  r) “

     *
     */
    public function handle()
    {
        // Inisialisasi nilai Fitnes
        $resevationGenetic = $this->repoGenetic->listGenetic([]);
        $dateNow = Carbon::now();

       // Evaluasi nilai fitnes
        foreach($resevationGenetic as $key => $item){

            // status == 2 is On Progress and Reservation meet is true=
            // Check Nilai Fitnes yang terbaik
            if($item->status_id == 2 && $item->reservation_meet != 0 ){

                // Seleksi
                $repeat = (int)$item->reservation->reservation_repeat * 7;
                $checkRunning = $item->running_genetic + 1;
                $addDays = $repeat * $checkRunning;
                $dateResevation = Carbon::parse($item->reservation->date_reservation)->addDay($addDays);

                $res = $item->reservation;
                $user = User::find($res->user_id);

                // end:Seleksi
                if($item->reservation->reservation_meet > $item->running_genetic){
                    $dateNowToInt = strtotime($dateNow);
                    $dateReservationToInt = strtotime($dateResevation);
                    //Crosssover pilih waktu yang terbaik
                    if($dateNowToInt >= $dateReservationToInt){
                        // Mutasi hasil  = true
                        if($this->repoGenetic->updateGenetic(['running_genetic' => $checkRunning],$item->id)) {
                            // Buat Jadwal
                            LogGenetic::create([
                                'reservation_id' => $res->id,
                                'repeat_to' => $checkRunning,
                                'date_running' => Carbon::now()
                            ]);
                        }
                    }
                    return $this->info('Success running reservation');
                }

                // Update if Finish if end reservation meet
                if($item->reservation->reservation_meet == $item->running_genetic){
                    $this->repoReservation->updateResevation([
                        'status_id' => 3
                    ],$item->reservation_id);

                    return $this->info('Finish running reservation pada user'.' '. $user->full_name);
                }
            } else {

                return $this->error('Data not found.');
            }
        }

        if(count($resevationGenetic) <= 0){
            return $this->error('Data not found.');
        }

    }
}
