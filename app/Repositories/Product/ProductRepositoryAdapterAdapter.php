<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepositoryAdapter;
use App\Repositories\Product\Ports\ProductRepositoryPort;
use Illuminate\Database\Eloquent\Collection;

class ProductRepositoryAdapterAdapter extends BaseRepositoryAdapter implements ProductRepositoryPort
{
    /**
     * @var Product
     */
    protected Product $model;

    /**
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return Product
     */
    public function create(array $data): Product
    {
        return $this->store($data);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->all();
    }

    /**
     * @param  array  $data
     * @param  int  $id
     * @return int
     */
    public function updateById(array $data, int $id): int
    {
        return $this->update($data, $id);
    }

    /**
     * @param  int  $id
     * @return int
     */
    public function deleteById(int $id): int
    {
        return $this->delete($id);
    }
}

