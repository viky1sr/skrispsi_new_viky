<?php

namespace App\Genetic\ReservationGenetic\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;

interface GeneticRepositoryInterface extends BaseRepositoryInterface
{
    public function createGenetic(array $attributes);
    public function updateGenetic(array $attributes,int $id);
    public function listGenetic(array $params);
}
