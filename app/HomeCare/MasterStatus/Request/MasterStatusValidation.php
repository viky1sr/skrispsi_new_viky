<?php

namespace App\HomeCare\MasterStatusValidation\Request;

use Illuminate\Support\Facades\Validator;

class MasterStatusValidation
{

    /**
     * @req request data
     * Validation data
     */
    private function rules(array $request){
        $msg = [
            'name.required' => 'Please input name status',
        ];

        $validation = Validator::make($request,[
            'name' => 'required',
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
