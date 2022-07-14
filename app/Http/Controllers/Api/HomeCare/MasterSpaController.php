<?php

namespace App\Http\Controllers\Api\HomeCare;

use App\HomeCare\MasterSpa\Repositories\Interfaces\MasterSpaRepositoryInterface;
use App\HomeCare\MasterSpa\Repositories\MasterSpaRepository;
use App\HomeCare\MasterSpa\Request\MasterSpaValidation;
use App\HomeCare\MasterSpa\Resources\MasterSpaResource;
use App\HomeCare\MasterSpa\Transformations\MasterSpaTransformable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

    public function dataTables(Request $request)
    {
        return $this->masterSpaRepo->dataTableMasterSpa($request->all());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        return MasterSpaResource::collection($this->masterSpaRepo->findMasterSpa($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($err = $this->valMasterSpa->responseErrorJson($request->all())){
            return $err;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($err = $this->valMasterSpa->responseErrorJson($request->all())){
            return $err;
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
