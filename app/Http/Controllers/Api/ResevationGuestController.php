<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResevationGuestController extends Controller
{
    public function resevationGuest(Request  $request){
        $req = $request->all();
    }
}
