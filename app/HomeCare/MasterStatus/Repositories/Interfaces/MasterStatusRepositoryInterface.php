<?php

namespace App\HomeCare\MasterStatus\Repositories\Interfaces;

use App\HomeCare\MasterStatus\MasterStatus;

interface MasterStatusRepositoryInterface
{
    public function createMasterStatus(array $params) : MasterStatus;
    public function updateMasterStatus(array $update) : bool;
    public function findMasterStatus(int $id) : MasterStatus;
    public function deleteMasterStatus();
}
