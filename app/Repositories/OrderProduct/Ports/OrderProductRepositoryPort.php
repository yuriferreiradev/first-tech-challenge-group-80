<?php

namespace App\Repositories\OrderProduct\Ports;

use App\Models\OrderProduct;
use App\Repositories\BaseRepositoryPort;
use Illuminate\Database\Eloquent\Collection;

interface OrderProductRepositoryPort extends BaseRepositoryPort
{
    /**
     * @param array $data
     * @return OrderProduct
     */
    public function create(array $data): OrderProduct;

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

