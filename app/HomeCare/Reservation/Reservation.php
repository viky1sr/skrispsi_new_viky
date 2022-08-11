<?php

namespace App\HomeCare\Reservation;

use App\Genetic\ReservationGenetic\ReservationGenetic;
use App\HomeCare\MasterHomeCare\MasterHomeCare;
use App\HomeCare\MasterSpa\MasterSpa;
use App\HomeCare\MasterStatus\MasterStatus;
use App\HomeCare\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        return $this->hasOne(MasterHomeCare::class,'id','name_reservation_id')
            ->select('id','name','price','type')
            ->where('type','=', 1) ;
    }

    public function master_data_2(){
        return $this->hasOne(MasterSpa::class,'id','name_reservation_id')
            ->select('id','name','price','type')
            ->where('type','=', 2);
    }

    public function status(){
        return $this->hasOne(MasterStatus::class,'status_id','status_id')
            ->select('status_id','status_name');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id')
            ->select('id','full_name','number_phone','email');
    }
}
