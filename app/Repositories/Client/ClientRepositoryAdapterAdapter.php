<?php

namespace App\Repositories\Client;

use App\Models\Client;
use App\Repositories\BaseRepositoryAdapter;
use App\Repositories\Client\Ports\ClientRepositoryPort;
use Illuminate\Database\Eloquent\Collection;

class ClientRepositoryAdapterAdapter extends BaseRepositoryAdapter implements ClientRepositoryPort
{
    protected Client $model;

    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Client
    {
        return $this->store($data);
    }

    /**
     * @param  string  $document
     * @return Client|null
     */
    public function getByDocument(string $document): ?Client
    {
        return $this->getByAttribute('document', $document)->first();
    }
}

