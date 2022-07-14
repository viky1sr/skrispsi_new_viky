<?php

namespace App\HomeCare\Payment\Repositories;

use App\HomeCare\Payment\Payment;
use App\HomeCare\Payment\Repositories\Interfaces\PaymentRepositoryInterface;
use App\HomeCare\Payment\Transformations\PaymentTransformable;
use Jsdecena\Baserepo\BaseRepository;
use Yajra\DataTables\DataTables;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{
    use PaymentTransformable;

    public function __construct(Payment $payment)
    {
        parent::__construct($payment);
        $this->model = $payment;
    }

    public function uploadProofOfPayment(array $params): Payment
    {
        $this->getData('','','','','','');
    }

    public function updateStatusProofOfPayment(array $update): bool
    {
        // TODO: Implement updateProofOfPayment() method.
    }

    public function findProofOfPayment(int $id): Payment
    {
        // TODO: Implement findProofOfPayment() method.
    }

    public function deleteProofOfPayment()
    {
        // TODO: Implement deleteProofOfPayment() method.
    }

    public function dataTableProofOfPayment(array $params)
    {
        $user_name = isset($params['user_name']) ? $params['user_name'] : "";
        $status_id = isset($params['status_id']) ? $params['status_id'] : "";
        $date_start = isset($params['date_start']) ? $params['date_start'] : "";
        $date_end = isset($params['date_end']) ? $params['date_end'] : "";

        $result = $this->model
            ->when($user_name, function ($query,$user_name) {
                $query->whereHas('getUser', function ($q) use($user_name){
                    $q->where('full_name','LIKE','%'.$user_name.'%');
                });
            })
            ->when($status_id, function ($query,$status_id) {
                $query->where('status_id',$status_id);
            })
            ->when($date_start, function ($query,$date_start) {
                $query->whereDate('created_at','>=',$date_start);
            })
            ->when($date_end, function ($query,$date_end) {
                $query->whereDate('created_at','<=',$date_end);
            });

        return DataTables::of($result)->toJson();
    }
}
