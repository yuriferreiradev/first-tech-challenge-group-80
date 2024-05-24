<?php

namespace App\Services\Product\Ports;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductServicePort
{
    /**
     * @param  array  $data
     * @return Product
     */
    public function create(array $data): Product;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param  int  $idCategory
     * @return Collection
     */
    public function getAllByCategoryId(int $idCategory): Collection;

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
