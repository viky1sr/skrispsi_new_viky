<?php

namespace App\Http\Controllers;

use App\HomeCare\User\User;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index(){
        $user = User::with('roles')->get();
        dd($user);
    }
}
