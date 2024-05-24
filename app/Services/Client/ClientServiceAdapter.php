<?php

namespace App\Services\Client;

use App\Models\Client;
use App\Repositories\Client\Ports\ClientRepositoryPort;
use App\Services\Client\Ports\ClientServicePort;

class ClientServiceAdapter implements ClientServicePort
{
    /**
     * @var ClientRepositoryPort
     */
    protected ClientRepositoryPort $clientRepository;

    /**
     * @param ClientRepositoryPort $clientRepository
     */
    public function __construct(ClientRepositoryPort $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }


    public function create(array $data): Client
    {
        return $this->clientRepository->create($data);
    }
}
