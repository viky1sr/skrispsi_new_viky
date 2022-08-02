<?php

namespace App\Http\Controllers\Api\General;

use App\HomeCare\MasterHomeCare\Repositories\MasterHomeCareRepository;
use App\HomeCare\MasterSpa\Repositories\MasterSpaRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    private $repoMasterHomeCare;
    private $repoMasterSpa;

    public function __construct(
        MasterHomeCareRepository $repoMasterHomeCare,
        MasterSpaRepository $repoMasterSpa
    )
    {
        $this->repoMasterHomeCare = $repoMasterHomeCare;
        $this->repoMasterSpa = $repoMasterSpa;
//        $this->middleware('auth');
    }

    public function masterHomeCare(Request $request){
        return $this->repoMasterHomeCare->listMasterHomeCare($request->all());
    }

    public function masterBabySpa(Request $request){
        return $this->repoMasterSpa->listMasterSpa($request->all());
    }
}
