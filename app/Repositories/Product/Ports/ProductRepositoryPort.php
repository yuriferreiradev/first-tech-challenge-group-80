<?php

namespace App\Repositories\Product\Ports;

use App\Models\Product;
use App\Repositories\BaseRepositoryPort;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryPort extends BaseRepositoryPort
{
    /**
     * @param array $data
     * @return Product
     */
    public function create(array $data): Product;

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

