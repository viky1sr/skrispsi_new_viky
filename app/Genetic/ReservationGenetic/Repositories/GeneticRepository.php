<?php

namespace App\Genetic\ReservationGenetic\Repositories;

use App\Genetic\ReservationGenetic\Repositories\Interfaces\GeneticRepositoryInterface;
use App\Genetic\ReservationGenetic\ReservationGenetic;
use Illuminate\Database\QueryException;
use Jsdecena\Baserepo\BaseRepository;

class GeneticRepository extends BaseRepository implements GeneticRepositoryInterface
{

    /**
     * MasterSpaRepository constructor.
     * @param ReservationGenetic $resevationGenetic
     */
    public function __construct(ReservationGenetic $resevationGenetic)
    {
        parent::__construct($resevationGenetic);
        $this->model = $resevationGenetic;
    }

    public function createGenetic(array $attributes)
    {
        return $this->create($attributes);
    }

    public function updateGenetic(array $attributes, int $id)
    {
        try {
            return $this->model->find($id)->update([
                'running_genetic' => $attributes['running_genetic']
            ]);
        } catch (QueryException $e){
            report($e);
        }
    }

    public function listGenetic(array $params)
    {
        return $this->model->with('reservation')->get();
    }
}
