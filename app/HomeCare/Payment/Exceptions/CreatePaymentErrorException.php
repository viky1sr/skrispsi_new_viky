<?php

namespace App\HomeCare\Payment\Exceptions;

class CreatePaymentErrorException extends \Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Payment error');
    }

    public function render($request){
        return response()->json([
            "status" => "fail",
            "message" => $this->getMessage(),
            "route" => ""
        ],500);
    }
}
