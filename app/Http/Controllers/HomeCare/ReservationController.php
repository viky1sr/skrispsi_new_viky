<?php

namespace App\Http\Controllers\HomeCare;

use App\Genetic\ReservationGenetic\Repositories\GeneticRepository;
use App\HomeCare\Reservation\Repositories\ReservationRepository;
use App\HomeCare\Reservation\Request\ReservationValidation;
use App\HomeCare\Reservation\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReservationController extends Controller
{

    private $valResevation;
    private $repoResevation;
    private $repoGenetic;

    public function __construct(
        ReservationValidation $valResevation,
        ReservationRepository $repoResevation,
        GeneticRepository $repoGenetic
    ){
        $this->valResevation = $valResevation;
        $this->repoResevation = $repoResevation;
        $this->repoGenetic = $repoGenetic;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.resevation.index');
    }

    public function dataTable(Request $request){
        if(\Auth::user()->hasRole('admin')){
            $data = Reservation::with('r_genetic','master_data','master_data_2','status','user');
        } else {
            $data = Reservation::with('r_genetic','master_data','master_data_2','status')->where('user_id','=',\Auth::user()->id);
        }

        return DataTables::of($data)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $array = [
            'home' => \DB::table('master_home_cares')->select('id','name','price')->get(),
            'baby' => \DB::table('master_spas')->select('id','name','price')->get(),
        ];

        return view('pages.resevation.create_or_update',$array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $this->valResevation->createValidation($request->all());
        if($validation){
            return $validation;
        }
        if($data = $this->repoResevation->createResevation($request->except('_method', '_token'))){
            if($request->reservation_meet){
                $this->repoGenetic->createGenetic([
                    'reservation_id' => $data->id
                ]);
            }
            return response()->json([
                'status' => 'ok',
                'message' => 'Success create reservation.'
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->repoResevation->updateResevation($request->except('_token','_method'),$id)){
            return response()->json([
                'status' => 'ok',
                'message' => 'Success update data.'
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
