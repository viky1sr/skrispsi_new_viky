<?php

namespace App\HomeCare\Reservation\Exceptions;

class CreateReservationErrorException extends \Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Reservation error');
    }

    public function render($request){
        return response()->json([
            "status" => "fail",
            "message" => $this->getMessage(),
            "route" => ""
        ],500);
    }
}
