<?php

namespace App\Services\OrderProduct;

use App\Models\OrderProduct;
use App\Repositories\OrderProduct\Ports\OrderProductRepositoryPort;
use App\Services\OrderProduct\Ports\OrderProductServicePort;
use Illuminate\Database\Eloquent\Collection;

class OrderProductAdapter implements OrderProductServicePort
{
    /**
     * @var OrderProductRepositoryPort
     */
    protected OrderProductRepositoryPort $orderProductRepository;

    /**
     * @param OrderProductRepositoryPort $orderProductRepository
     */
    public function __construct(OrderProductRepositoryPort $orderProductRepository)
    {
        $this->orderProductRepository = $orderProductRepository;
    }

    /**
     * @param  array  $data
     * @return OrderProduct
     */
    public function create(array $data): OrderProduct
    {
        return $this->orderProductRepository->create($data);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->orderProductRepository->all();
    }
}

