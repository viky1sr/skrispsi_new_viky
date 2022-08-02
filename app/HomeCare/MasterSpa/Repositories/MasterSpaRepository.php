<?php

namespace App\HomeCare\MasterSpa\Repositories;

use App\HomeCare\MasterSpa\Exceptions\CreateMasterSpaErrorException;
use App\HomeCare\MasterSpa\MasterSpa;
use App\HomeCare\MasterSpa\Repositories\Interfaces\MasterSpaRepositoryInterface;
use App\HomeCare\MasterSpa\Transformations\MasterSpaTransformable;
use Illuminate\Database\QueryException;
use Jsdecena\Baserepo\BaseRepository;
use Yajra\DataTables\DataTables;

class MasterSpaRepository extends BaseRepository implements MasterSpaRepositoryInterface
{
    use MasterSpaTransformable;

    /**
     * MasterSpaRepository constructor.
     * @param MasterSpa $masterSpa
     */
    public function __construct(MasterSpa $masterSpa)
    {
        parent::__construct($masterSpa);
        $this->model = $masterSpa;
    }

    /**
     * Create the master spa
     *
     * @param array $params
     *
     * @return MasterSpa
     * @throws createMasterSpaErrorException
     */
    public function createMasterSpa(array $params) : MasterSpa
    {
        try {
            return $this->create($params);
        } catch (QueryException $e){
            report($e);
            throw new createMasterSpaErrorException('Sorry, error create master spa.');
        }
    }

    /**
     * @param array $update
     * @return bool
     */
    public function updateMasterSpa(array $update): bool
    {
        try {
            return $this->update($update);
        } catch (QueryException $e){
            report($e);
            throw new createMasterSpaErrorException('Sorry, error update master spa.');
        }
    }

    /**
     * Delete Master Spa
     *
     */
    public function deleteMasterSpa()
    {
        try {
            return $this->delete();
        } catch (QueryException $e){
            report($e);
            throw new createMasterSpaErrorException('Delete error, data master spa not found.');
        }
    }

    /**
     * Find Master Spa by $id
     *
     */
    public function findMasterSpa(int $id): MasterSpa
    {
        try {
            return $this->find($id);
        } catch (QueryException $e){
            report($e);
            throw new createMasterSpaErrorException('Sorry, data master spa not found.');
        }
    }

    public function dataTableMasterSpa(array $params)
    {
        $name = isset($params['name']) ? $params['name'] : "";
        $price = isset($params['price']) ? $params['price'] : "";

        $result = $this->model
            ->when($name,function ($q,$param) {
                $q->where('name','LIKE','%'.$param.'%');
            })
            ->when($price,function ($q,$param) {
                $rp = str_replace([',','.'],"",$param);
                $q->where('price','LIKE','%'.$rp.'%');
            });

        return DataTables::of($result)->toJson();
    }

    public function listMasterSpa(array $params)
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
            throw new createMasterSpaErrorException('Sorry, data master spa not found.');
        }
    }
}
