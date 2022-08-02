<?php

namespace App\Http\Controllers;

use App\Genetic\ReservationGenetic\ReservationGenetic;
use App\HomeCare\User\User;
use App\LogGenetic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class LadingPageController extends Controller
{

//    public function __construct($method, $parameters)
//    {
//        parent::__call($method, $parameters);
//    }

    public function index(){
        $resevationGenetic = ReservationGenetic::with('reservation')->get();
        $dateNow = Carbon::now();
//        dd($dateNow->addDay(-14) == $dateNow->addDay(-14));
        foreach($resevationGenetic as $key => $item){
            $repeat = (int)$item->reservation->reservation_repeat * 7;
            $checkRunning = $item->running_genetic + 1;
            $addDays = $repeat * $checkRunning;
            $dateResevation = Carbon::parse($item->reservation->date_reservation)->addDay($addDays);

            if($item->reservation->reservation_meet > $item->running_genetic){
//                1660073450 ,
                $dateNowToInt = strtotime($dateNow);
                $dateReservationToInt = strtotime($dateResevation);
//                dd($item->reservation);

                if($dateNowToInt > $dateReservationToInt){

                }
                if($dateNow == $dateResevation){
                    $res = $item->reservation;
                    $user = User::find($res->user_id);

                    ReservationGenetic::where('id','=',$item->id)->update([
                        'running_genetic' => $checkRunning
                    ]);

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
                    // Send to Client
                    Mail::to('vikymuhammadalif@gmail.com')
                        ->send(new Reservasi(
                            $user->full_name,$res->number_phone,$res->type_booking,$res->list_service,Carbon::parse($res->date_booking)->format('d M Y'),
                            $res->hour_booking,$res->kecamatan, $res->kelurahan, $res->adress,substr($res->wa ?: $res->number_phone,1)
                        ));
                }
            }

        }



        $array = [
            'home' => DB::table('master_home_cares')->select('id','name','price')->get(),
            'baby' => DB::table('master_spas')->select('id','name','price')->get(),
        ];
        return view('lading_page',$array);
    }
}
