<?php

namespace App\HomeCare\MasterHomeCare\Repositories;

use App\HomeCare\MasterHomeCare\Exceptions\CreateMasterHomeCareErrorException;
use App\HomeCare\MasterHomeCare\MasterHomeCare;
use App\HomeCare\MasterHomeCare\Repositories\Interfaces\MasterHomeCareRepositoryInterface;
use App\HomeCare\MasterHomeCare\Transformations\MasterHomeCareTransformable;
use Illuminate\Database\QueryException;
use Jsdecena\Baserepo\BaseRepository;
use Yajra\DataTables\DataTables;

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

    public function listMasterHomeCare(array $params)
    {
        try {
            $table = $this->model
                ->select('id','name','price','type')
                ->orderby('name','desc')
                ->when(isset($params['id']),function ($q) use($params){
                    $q->where('id','=',$params['id']);
                })
                ->when(isset($params['filter']),function ($q) use($params){
                    $q->where('name',"LIKE" ,($params['filter'] ? '%'.$params['filter'].'%' : '%%'));
                });

            if(isset($params['limit']) ) {
                $table->take($params['limit']);

                if (isset($params['offset']) ) {
                    $table->skip($params['offset']);
                }
            }
            return apiGeneral($table->get(),$table);

        } catch (QueryException $e){
            report($e);
            throw new createMasterHomeCareErrorException('Sorry, data master home care not found.');
        }
    }

    public function dataTableMasterHomeCare(array $params)
    {
        $name = isset($params['name']) ? $params['name'] : "";
        $price = isset($params['price']) ? $params['price'] : "";
        $result = $this->model
            ->when($name,function ($q) use($name) {
                $q->where('name','LIKE','%'.$name.'%');
            })
            ->when($price,function ($q) use($price) {
                $rp = str_replace([',','.'],"",$price);
                $q->where('price','LIKE','%'.$rp.'%');
            });

        return DataTables::of($result)->toJson();
    }
}
