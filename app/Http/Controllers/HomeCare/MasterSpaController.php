<?php

namespace App\Http\Controllers\HomeCare;

use App\HomeCare\MasterSpa\Repositories\Interfaces\MasterSpaRepositoryInterface;
use App\HomeCare\MasterSpa\Repositories\MasterSpaRepository;
use App\HomeCare\MasterSpa\Request\MasterSpaValidation;
use App\HomeCare\MasterSpa\Transformations\MasterSpaTransformable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterSpaController extends Controller
{
    use MasterSpaTransformable;

    private $masterSpaRepo;
    private $valMasterSpa;

    public function __construct(
        MasterSpaRepositoryInterface $masterSpaRepo,
        MasterSpaValidation $valMasterSpa
    ){
        $this->masterSpaRepo = $masterSpaRepo;
        $this->valMasterSpa = $valMasterSpa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $this->valMasterSpa->createValidation($request->all());
        if($validation->fails()){
            return response()->json([
                'status' => 'fail',
                'message' => $validation->errors()->first()
            ],422);
        } else {
            $this->masterSpaRepo->createMasterSpa($request->except('_method', '_token'));
            return response()->json([
                'status' => 'ok',
                'message' => 'Success create master spa.',
                'route' => ''
            ],201);
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
        $validation = $this->valMasterSpa->updateValidation($request->all());
        if($validation->fails()){
            return response()->json([
                'status' => 'fail',
                'message' => $validation->errors()->first()
            ],422);
        } else {
            $masterSpa = $this->masterSpaRepo->findMasterSpa($id);
            $update = new MasterSpaRepository($masterSpa);
            $update->updateMasterSpa($request->except('_method', '_token'));
            return response()->json([
                'status' => 'ok',
                'message' => 'Success update master spa.',
                'route' => ''
            ],201);
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
        $masterSpa = $this->masterSpaRepo->findMasterSpa($id);
        $delete = new MasterSpaRepository($masterSpa);
        $delete->deleteMasterSpa();

        return response()->json([
            'status' => 'ok',
            'message' => 'Success delete master spa.',
            'route' => ''
        ],201);
    }
}
