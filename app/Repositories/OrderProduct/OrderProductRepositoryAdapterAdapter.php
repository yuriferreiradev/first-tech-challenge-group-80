<?php

namespace App\Repositories\OrderProduct;

use App\Models\OrderProduct;
use App\Repositories\BaseRepositoryAdapter;
use App\Repositories\OrderProduct\Ports\OrderProductRepositoryPort;
use Illuminate\Database\Eloquent\Collection;

class OrderProductRepositoryAdapterAdapter extends BaseRepositoryAdapter implements OrderProductRepositoryPort
{
    /**
     * @var OrderProduct
     */
    protected OrderProduct $model;

    /**
     * @param OrderProduct $model
     */
    public function __construct(OrderProduct $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return OrderProduct
     */
    public function create(array $data): OrderProduct
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
        return $this->updateById($data, $id);
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

