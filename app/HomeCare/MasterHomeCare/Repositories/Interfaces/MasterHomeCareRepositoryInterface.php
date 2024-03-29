<?php

namespace App\HomeCare\MasterHomeCare\Repositories\Interfaces;

use App\HomeCare\MasterHomeCare\MasterHomeCare;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface MasterHomeCareRepositoryInterface extends BaseRepositoryInterface
{
    public function createMasterHomeCare(array $params) : MasterHomeCare;
    public function updateMasterHomeCare(array $update) : bool;
    public function findMasterHomeCare(int $id) : MasterHomeCare;
    public function deleteMasterHomeCare();
    public function dataTableMasterHomeCare(array $params);
    public function listMasterHomeCare(array $params);
}
