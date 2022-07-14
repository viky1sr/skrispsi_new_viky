<?php

namespace App\HomeCare\MasterHomeCare\Transformations;

use App\HomeCare\MasterHomeCare\MasterHomeCare;

trait MasterHomeCareTransformable
{
    public function  transformMasterHomeCare(MasterHomeCare $model): MasterHomeCare
    {
        $obj = new MasterHomeCare ;
        $obj->id = $model->id;
        $obj->name = $model->name;
        $obj->price = $model->price;

        return $obj;
    }
}
