<?php

namespace App\HomeCare\MasterSpa\Transformations;

use App\HomeCare\MasterSpa\MasterSpa;

trait MasterSpaTransformable
{
    public function  transformMasterSpa(MasterSpa $model): MasterSpa
    {
        $obj = new MasterSpa;
        $obj->id = $model->id;
        $obj->name = $model->name;
        $obj->price = $model->price;

        return $obj;
    }
}
