<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepositoryAdapter;
use App\Repositories\Order\Ports\OrderRepositoryPort;
use Illuminate\Database\Eloquent\Collection;

class OrderRepositoryAdapterAdapter extends BaseRepositoryAdapter implements OrderRepositoryPort
{
    /**
     * @var Order
     */
    protected Order $model;

    /**
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * @param  int  $idClient
     * @return Order
     */
    public function create(int $idClient): Order
    {
        return $this->model->create(
            [
                'client_id' => $idClient,
            ]
        );
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        $orders = $this->model->with('clients', 'products')->get();

        return $orders->each(function ($order) {
            unset($order->client_id);
            $order->products->each(function ($product) {
                unset($product->pivot);
                unset($product->category_id);
            });
        });
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

