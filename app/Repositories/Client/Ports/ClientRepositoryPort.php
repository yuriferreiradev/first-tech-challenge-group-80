<?php

namespace App\Repositories\Client\Ports;

use App\Models\Client;
use App\Repositories\BaseRepositoryPort;
use Illuminate\Database\Eloquent\Collection;

interface ClientRepositoryPort extends BaseRepositoryPort
{
    /**
     * @param  array  $data
     * @return Client
     */
    public function create(array $data): Client;

    /**
     * @param  string  $document
     * @return Client|null
     */
    public function getByDocument(string $document): ?Client;
}

