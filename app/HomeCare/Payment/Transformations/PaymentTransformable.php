<?php

namespace App\HomeCare\Payment\Transformations;

use App\HomeCare\Payment\Payment;

trait PaymentTransformable
{
    public function  transformPayment(Payment $model): Payment
    {
        $obj = new Payment;
        $obj->id = $model->id;
        $obj->user_id = $model->user_id;
        $obj->file_id = $model->file_id;
        $obj->status_id = $model->status_id;
        $obj->updated_by = $model->updated_by;

        return $obj;
    }
}
