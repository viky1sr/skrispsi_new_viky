<?php

namespace App\HomeCare\MasterHomeCare\Exceptions;

class CreateMasterHomeCareErrorException extends \Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Master Home Care error');
    }

    public function render($request){
        return response()->json([
            "status" => "fail",
            "message" => $this->getMessage(),
            "route" => ""
        ],500);
    }
}
