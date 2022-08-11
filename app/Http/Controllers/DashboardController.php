<?php

namespace App\Http\Controllers;

use App\HomeCare\Reservation\Repositories\ReservationRepository;
use App\Models\Aula;
use App\Models\BuluTangkis;
use App\Models\Futsal;
use App\Models\Laktasi;
use App\Models\Perpustakaan;
use App\Models\User;
use App\Notifications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;
use DB;

class DashboardController extends Controller
{
    private $repoReservation;

    public function __construct(
        ReservationRepository $repoReservation
    )
    {
        $this->middleware('auth');
        $this->repoReservation = $repoReservation;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        $notif = \Auth::user()->hasRole('admin') == true ? Notifications::orderBy('created_at','desc')->get() :
            Notifications::where('user_id','=',\Auth::user()->id)->orderBy('created_at','desc')->get() ;

        $homeCares = [];
        $babySpas = [];
        $reservation = [];
        $i = 1;
        for($i; $i <= 12; $i++ ){
            $homeCare =  $this->repoReservation->listResevation([
                'date' => $i,
                'type_reservation_id' => 1
            ]);
            $babySpa = $this->repoReservation->listResevation([
                'date' => $i,
                'type_reservation_id' => 2
            ]);
            array_push($homeCares,$homeCare);
            array_push($babySpas,$babySpa);
            array_push($reservation,$homeCare+$babySpa);
        }

        $array = [
            'notifications' => $notif,
            'totalReservation' => json_encode($reservation),
            'sumReservation' => array_sum($reservation),
            'totalHomeCare' => json_encode($homeCares),
            'sumHomeCare' => array_sum($homeCares),
            'totalBabySpa' => json_encode($babySpas),
            'sumBabySpa' => array_sum($babySpas)
        ];
        return view('pages.dashboard',$array);
    }
}
