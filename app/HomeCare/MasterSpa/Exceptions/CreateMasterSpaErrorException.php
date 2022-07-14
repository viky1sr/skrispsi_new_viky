<?php

namespace App\HomeCare\MasterSpa\Exceptions;

class CreateMasterSpaErrorException extends \Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Master SPA error');
    }

    public function render($request){
        return response()->json([
            "status" => "fail",
            "message" => $this->getMessage(),
            "route" => ""
        ],500);
    }
}
