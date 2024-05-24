<?php

namespace App\Repositories\Order\Ports;

use App\Models\Order;
use App\Repositories\BaseRepositoryPort;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryPort extends BaseRepositoryPort
{
    /**
     * @param  int  $idClient
     * @return Order
     */
    public function create(int $idClient): Order;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param  array  $data
     * @param  int  $id
     * @return int
     */
    public function updateById(array $data, int $id): int;

    /**
     * @param  int  $id
     * @return int
     */
    public function deleteById(int $id): int;
}

