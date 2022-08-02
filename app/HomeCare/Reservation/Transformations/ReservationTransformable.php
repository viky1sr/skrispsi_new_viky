<?php

namespace App\HomeCare\Reservation\Transformations;

use App\HomeCare\Reservation\Reservation;

trait ReservationTransformable
{
    public function transformReservation(Reservation $model): Reservation
    {
        $obj = new Reservation;
        $obj->id = $model->id;
        $obj->user_id = $model->user_id;
        $obj->type_reservation_id = $model->type_reservation_id;
        $obj->name_reservation_id = $model->name_reservation_id;
        $obj->city = $model->city;
        $obj->village = $model->village;
        $obj->address = $model->address;
        $obj->date_reservation = $model->date_reservation;
        $obj->hour_reservation = $model->hour_reservation;
        $obj->reservation_meet = isset($model->reservation_meet) ? $model->reservation_meet: null;
        $obj->reservation_repeat = isset($model->reservation_repeat) ? $model->reservation_repeat : null;

        return $obj;
    }
}
