<?php

namespace App\HomeCare\MasterStatus\Transformations;

use App\HomeCare\MasterStatus\MasterStatus;

trait MasterStatusTransformable
{
    public function  transformMasterStatus(MasterStatus $model): MasterStatus
    {
        $obj = new MasterStatus;
        $obj->id = $model->id;
        $obj->name = $model->name;

        return $obj;
    }
}
