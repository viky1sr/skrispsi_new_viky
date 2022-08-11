<?php

namespace App\HomeCare\Reservation\Request;

use App\HomeCare\Reservation\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ReservationValidation {

    /**
     * @req request data from ReservasiController @store
     */
    public function createValidation(array $req){
        // Validation filed required
        $validation = Validator::make($req,[
            'type_reservation_id' => 'required',
            'name_reservation_id' => 'required',
            'date_reservation' => 'required',
            'hour_reservation' => 'required',
            'city' => 'required',
            'village' => 'required',
            'address' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'status' => 'fail',
                'message' => $validation->errors()->first()
            ],422);
        }

        //Check Waktu H+1
        if(Carbon::now() > Carbon::parse($req['date_reservation'])){
            return response()->json([
                'status' => 'fail',
                'message' => 'Tanggal Reservation harus H+1'
            ],422);
        }

        // Check waktu reservation < date reservation
        $check = Reservation::whereDate('date_reservation', '>=',Carbon::parse($req['date_reservation']))
            ->where('hour_reservation','=',$req['hour_reservation'])
            ->count();
        if($check > 0){
            return response()->json([
                'status' => 'fail',
                'message' => 'Silakan pilih tanggal yang lain atau Jam Reservation yang lain'
            ],422);
        }

        // Check waktu reservation dan tanggal
        $check2 = Reservation::whereDate('date_reservation',$req['date_reservation'])
            ->where('hour_reservation','=',$req['hour_reservation'])->count();
        if($check2 > 0){
            return response()->json([
                'status' => 'fail',
                'message' => 'Silakan pilih waktu reservation yang lain.'
            ],422);
        }

        return null;
    }

    /**
     * @req request data from ReservasiController @update
     */
    public function updateValidation(array $req){
        $msg = [
            'status_id.required' => 'Silakan pilih status.'
        ];
        $validation = Validator::make($req,[
            'status_id' => 'required',
        ],$msg);

        if($validation->fails()){
            return response()->json([
                'status' => 'fail',
                'message' => $validation->errors()->first()
            ],422);
        }

        return null;
    }

}
