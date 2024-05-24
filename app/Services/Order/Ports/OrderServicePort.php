<?php

namespace App\Services\Order\Ports;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderServicePort
{
    /**
     * @param  int  $idClient
     * @param  array  $products
     * @return Order
     */
    public function create(int $idClient, array $products): Order;

    /**
     * @return Collection
     */
    public function getAll(): Collection;
}

