<?php

namespace App\HomeCare\Reservation;

use App\Genetic\ReservationGenetic\ReservationGenetic;
use App\HomeCare\MasterHomeCare\MasterHomeCare;
use App\HomeCare\MasterSpa\MasterSpa;
use App\HomeCare\MasterStatus\MasterStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','type_reservation_id','name_reservation_id','city','village','address',
        'date_reservation','hour_reservation','reservation_meet','reservation_repeat','status'
    ];

    public function r_genetic(){
        return $this->hasOne(ReservationGenetic::class,'reservation_id','id');
    }

    public function master_data(){
        $checkData = $this->hasOne(Reservation::class,'id','id')
            ->select('id','type_reservation_id')
            ->first();
        if($checkData->type_reservation_id == 1){
            return $this->hasOne(MasterHomeCare::class,'id','name_reservation_id')
                ->select('id','name','price','type');
        } else {
            return $this->hasOne(MasterSpa::class,'id','name_reservation_id')
                ->select('id','name','price','type');
        }
    }

    public function status(){
        return $this->hasOne(MasterStatus::class,'status_id','status_id')
            ->select('status_id','status_name');
    }
}
