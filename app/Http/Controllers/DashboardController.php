<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\BuluTangkis;
use App\Models\Futsal;
use App\Models\Laktasi;
use App\Models\Perpustakaan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;
use DB;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
//        dd(Route::has('register'));
        return view('home');
    }
}
