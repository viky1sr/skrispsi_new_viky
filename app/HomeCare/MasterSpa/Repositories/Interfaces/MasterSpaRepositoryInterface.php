<?php

namespace App\HomeCare\MasterSpa\Repositories\Interfaces;

use App\HomeCare\MasterSpa\MasterSpa;
use Illuminate\Database\Eloquent\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface MasterSpaRepositoryInterface extends BaseRepositoryInterface
{
    public function createMasterSpa(array $params) : MasterSpa;
    public function updateMasterSpa(array $update) : bool;
    public function findMasterSpa(int $id) : MasterSpa;
    public function deleteMasterSpa();
    public function dataTableMasterSpa(array $params);
    public function listMasterSpa(array $params);
}
