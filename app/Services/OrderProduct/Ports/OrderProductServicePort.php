<?php

namespace App\Services\OrderProduct\Ports;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Collection;

interface OrderProductServicePort
{
    /**
     * @param  array  $data
     * @return OrderProduct
     */
    public function create(array $data): OrderProduct;

    /**
     * @return Collection
     */
    public function getAll(): Collection;
}

