<?php

use Illuminate\Support\Facades\Validator;

function rupiah($angka) {
    $hasil_rupiah = number_format($angka,0,',','.');
    return $hasil_rupiah;
}

function apiGeneral($data, $table) {
    if (count(array($table)) == 0 ) {
        return response()->json([
            'status_code' => 204,
            'data' => $data
        ],200);
    } else {
        return response()->json([
            'status_code' => 200,
            'data' => $data
        ],200);
    }
}

function resevationGuestValidation($req){
    $validated = Validator::make($req, [
        'full_name' => 'required',
        'type_booking' => 'required',
        'list_service' => 'required',
        'date_booking' => 'required',
        'hour_booking' => 'required',
        'number_phone' => 'required',
        'address' => 'required',
        'kecamatan' => 'required',
        'kelurahan' => 'required',
    ]);
    return $validated;
}

?>
