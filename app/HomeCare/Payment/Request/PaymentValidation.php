<?php

namespace App\HomeCare\Payment\Request;

use Illuminate\Support\Facades\Validator;

class PaymentValidation {

    /**
     * @req request data
     * Validation data
     */
    private function rules(array $request){
        $msg = [
            'file_id.required' => 'Please upload proof of payment',
        ];

        $validation = Validator::make($request,[
            'file_id' => 'required',
        ],$msg);

        return $validation;
    }

    public function responseErrorJson($reqeust){
        $validation = $this->rules($reqeust);
        if($validation->fails()){
            return response()->json([
                'status' => 'fail',
                'message' => $validation->errors()->first()
            ],422);
        }
    }

}
