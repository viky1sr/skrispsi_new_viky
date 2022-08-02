<?php

namespace App\Console\Commands;

use App\Genetic\ReservationGenetic\Repositories\GeneticRepository;
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
        GeneticRepository $repoGenetic
    )
    {
        $this->repoGenetic = $repoGenetic;
    }

    /**
     * Execute the console command.
     *
     * @return int
     *
     * 1  = type_resevation ( Home Care )
     * 2  = type_resevation ( Baby Spa )
     */
    public function handle()
    {
        $resevationGenetic = $this->repoGenetic->listGenetic(null);
        $dateNow = Carbon::now();

        foreach($resevationGenetic as $key => $item){
            $repeat = (int)$item->reservation->reservation_repeat * 7;
            $checkRunning = $item->running_genetic + 1;
            $addDays = $repeat * $checkRunning;
            $dateResevation = Carbon::parse($item->reservation->date_reservation)->addDay($addDays);

            if($item->reservation->reservation_meet > $item->running_genetic){
                $dateNowToInt = strtotime($dateNow);
                $dateReservationToInt = strtotime($dateResevation);
                if($dateNowToInt > $dateReservationToInt){
                    $res = $item->reservation;
                    $user = User::find($res->user_id);

                    $this->repoGenetic->updateGenetic(['running_genetic' => $checkRunning],$item->id);
                    LogGenetic::create([
                        'reservation_id' => $res->id,
                        'repeat_to' => $checkRunning,
                        'date_running' => Carbon::now()
                    ]);

                    // Send to admin
                    Mail::to('vikymuhammadalif@gmail.com')
                        ->send(new Reservasi(
                            $user->full_name,$res->number_phone,$res->type_booking,$res->list_service,Carbon::parse($res->date_booking)->format('d M Y'),
                            $res->hour_booking,$res->kecamatan, $res->kelurahan, $res->adress,substr($res->wa ?: $res->number_phone,1)
                        ));
                }

            }

        }

        return $this->info('Success running resevation');
    }
}
