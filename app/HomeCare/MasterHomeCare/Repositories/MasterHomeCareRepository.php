<?php

namespace App\HomeCare\MasterHomeCare\Repositories;

use App\HomeCare\MasterHomeCare\Exceptions\CreateMasterHomeCareErrorException;
use App\HomeCare\MasterHomeCare\MasterHomeCare;
use App\HomeCare\MasterHomeCare\Repositories\Interfaces\MasterHomeCareRepositoryInterface;
use App\HomeCare\MasterHomeCare\Transformations\MasterHomeCareTransformable;
use Illuminate\Database\QueryException;
use Jsdecena\Baserepo\BaseRepository;

class MasterHomeCareRepository extends BaseRepository implements MasterHomeCareRepositoryInterface
{
    use MasterHomeCareTransformable;

    /**
     * MasterHomeCareRepository constructor.
     * @param MasterHomeCare $masterHomeCare
     */
    public function __construct(MasterHomeCare $masterHomeCare)
    {
        parent::__construct($masterHomeCare);
        $this->model = $masterHomeCare;
    }

    /**
     * Create the master spa
     *
     * @param array $data
     *
     * @return MasterHomeCare
     * @throws createMasterHomeCareErrorException
     */
    public function createMasterHomeCare(array $data) : MasterHomeCare
    {
        try {
            return $this->create($data);
        } catch (QueryException $e){
            report($e);
            throw new createMasterHomeCareErrorException('Sorry, error create master spa.');
        }
    }

    /**
     * @param array $data
     * @return bool
     */
    public function updateMasterHomeCare(array $data): bool
    {

        try {
            return $this->update($data);
        } catch (QueryException $e){
            report($e);
            throw new createMasterHomeCareErrorException('Sorry, error update master home care.');
        }
    }

    /**
     * Delete Master Spa
     *
     */
    public function deleteMasterHomeCare()
    {
        try {
            return $this->delete();
        } catch (QueryException $e){
            report($e);
            throw new createMasterHomeCareErrorException('Delete error, data master home care not found.');
        }
    }

    /**
     * Find Master Spa by $id
     *
     */
    public function findMasterHomeCare(int $id): MasterHomeCare
    {
        try {
            return $this->find($id);
        } catch (QueryException $e){
            report($e);
            throw new createMasterHomeCareErrorException('Sorry, data master home care not found.');
        }
    }
}
