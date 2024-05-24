<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Repositories\Order\Ports\OrderRepositoryPort;
use App\Services\Order\Ports\OrderServicePort;
use App\Services\OrderProduct\Ports\OrderProductServicePort;
use Illuminate\Database\Eloquent\Collection;

class OrderServiceAdapter implements OrderServicePort
{
    /**
     * @var OrderRepositoryPort
     */
    protected OrderRepositoryPort $orderRepository;

    /**
     * @var OrderProductServicePort
     */
    protected OrderProductServicePort $orderProductService;

    /**
     * @param  OrderRepositoryPort  $orderRepository
     * @param  OrderProductServicePort $orderProductService
     */
    public function __construct(
        OrderRepositoryPort         $orderRepository,
        OrderProductServicePort $orderProductService
    )
    {
        $this->orderRepository = $orderRepository;
        $this->orderProductService = $orderProductService;
    }

    /**
     * @param  int  $idClient
     * @param  array  $products
     * @return Order
     */
    public function create(int $idClient, array $products): Order
    {
        $newOrder = $this->orderRepository->create($idClient);

        foreach ($products as $product) {
            $this->orderProductService->create(
                [
                    'order_id' => $newOrder->id,
                    'product_id' => $product
                ]
            );
        }

        return $newOrder;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->orderRepository->getAll();
    }
}

