<?php

namespace App\Genetic\ReservationGenetic;

use App\HomeCare\Reservation\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationGenetic extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id' , 'running_genetic'
    ];

    public function reservation(){
        return $this->hasOne(Reservation::class,'id','reservation_id');
    }
}
