<?php

namespace App\HomeCare\MasterHomeCare\Request;

use Illuminate\Support\Facades\Validator;

class MasterHomeCareValidation
{
    /**
     * @req request data
     * Validation data
     */
    private function rules(array $request){
        $msg = [
            'price.required' => 'Please input price',
            'name.required' => 'Please input name home care',
        ];

        $validation = Validator::make($request,[
            'price' => 'required',
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
