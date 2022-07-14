<?php

namespace App\HomeCare\MasterStatus\Exceptions;

class CreateMasterStatusErrorException extends \Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Master Status error');
    }

    public function render($request){
        return response()->json([
            "status" => "fail",
            "message" => $this->getMessage(),
            "route" => ""
        ],500);
    }
}
