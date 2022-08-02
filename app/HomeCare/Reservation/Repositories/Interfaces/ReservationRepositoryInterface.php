<?php

namespace App\HomeCare\Reservation\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;

interface ReservationRepositoryInterface extends BaseRepositoryInterface
{
    public function createResevation(array $attributes);
    public function updateResevation(array $attributes,int $id);
    public function listResevation(array $params);
    public function findResevation(int $id);
    public function destroyResevation(int $id);
}
