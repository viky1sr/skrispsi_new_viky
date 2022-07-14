<?php

namespace App\HomeCare\Payment\Repositories\Interfaces;

use App\HomeCare\Payment\Payment;

interface PaymentRepositoryInterface
{
    public function uploadProofOfPayment(array $params) : Payment;
    public function updateStatusProofOfPayment(array $update) : bool;
    public function findProofOfPayment(int $id) : Payment;
    public function deleteProofOfPayment();
    public function dataTableProofOfPayment(array $params);
}
