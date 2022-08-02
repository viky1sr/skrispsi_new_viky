<?php

namespace App\HomeCare\Reservation\Repositories;

use App\HomeCare\Reservation\Exceptions\CreateReservationErrorException;
use App\HomeCare\Reservation\Repositories\Interfaces\ReservationRepositoryInterface;
use App\HomeCare\Reservation\Reservation;
use App\HomeCare\Reservation\Transformations\ReservationTransformable;
use Illuminate\Database\QueryException;
use Jsdecena\Baserepo\BaseRepository;

class ReservationRepository extends BaseRepository implements ReservationRepositoryInterface
{
    use ReservationTransformable;

    /**
     * MasterSpaRepository constructor.
     * @param Reservation $resevation
     */
    public function __construct(Reservation $resevation)
    {
        parent::__construct($resevation);
        $this->model = $resevation;
    }

    public function createResevation(array $attributes)
    {
        try {
            return $this->create($attributes);
        } catch (QueryException $e){
            report($e);
            throw new createReservationErrorException('Sorry, error create reservation.');
        }
    }

    public function updateResevation(array $attributes, int $id)
    {
        // TODO: Implement updateResevation() method.
    }

    public function listResevation(array $params)
    {
        // TODO: Implement listResevation() method.
    }

    public function findResevation(int $id)
    {
        // TODO: Implement findResevation() method.
    }

    public function destroyResevation(int $id)
    {
        // TODO: Implement destroyResevation() method.
    }
}
