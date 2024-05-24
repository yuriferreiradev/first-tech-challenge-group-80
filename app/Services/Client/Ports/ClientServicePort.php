<?php

namespace App\Services\Client\Ports;

use App\Models\Client;

interface ClientServicePort
{
    public function create(array $data): Client;
}
