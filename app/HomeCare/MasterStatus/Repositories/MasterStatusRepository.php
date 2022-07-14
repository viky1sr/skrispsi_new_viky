<?php

namespace App\HomeCare\MasterStatus\Repositories;

use App\HomeCare\MasterStatus\Exceptions\CreateMasterStatusErrorException;
use App\HomeCare\MasterStatus\MasterStatus;
use App\HomeCare\MasterStatus\Repositories\Interfaces\MasterStatusRepositoryInterface;
use App\HomeCare\MasterStatus\Transformations\MasterStatusTransformable;
use Illuminate\Database\QueryException;
use Jsdecena\Baserepo\BaseRepository;

class MasterStatusRepository extends BaseRepository implements MasterStatusRepositoryInterface
{
    use MasterStatusTransformable;

    /**
     * MasterStatusRepository constructor.
     * @param MasterStatus $masterStatus
     */
    public function __construct(MasterStatus $masterStatus)
    {
        parent::__construct($masterStatus);
        $this->model = $masterStatus;
    }

    public function createMasterStatus(array $params): MasterStatus
    {
        try {
            return $this->create($params);
        } catch (QueryException $e){
            report($e);
            throw new createMasterStatusErrorException('Sorry, error create master status.');
        }
    }

    public function updateMasterStatus(array $update): bool
    {
        try {
            return $this->update($update);
        } catch (QueryException $e){
            report($e);
            throw new createMasterStatusErrorException('Sorry, error update master status.');
        }
    }

    public function findMasterStatus(int $id): MasterStatus
    {
        try {
            return $this->find($id);
        } catch (QueryException $e){
            report($e);
            throw new createMasterStatusErrorException('Sorry, data master status not found.');
        }
    }

    public function deleteMasterStatus()
    {
        try {
            return $this->delete();
        } catch (QueryException $e){
            report($e);
            throw new createMasterStatusErrorException('Delete error, data master status not found.');
        }
    }
}
