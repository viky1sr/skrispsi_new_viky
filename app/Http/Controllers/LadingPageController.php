<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LadingPageController extends Controller
{

    public function __construct($method, $parameters)
    {
        parent::__call($method, $parameters);
    }

    public function index(){
        $array = [
            'home' => DB::table('master_home_cares')->select('id','name','price')->get(),
            'baby' => DB::table('master_spas')->select('id','name','price')->get(),
        ];
        return view('lading_page',$array);
    }
}
