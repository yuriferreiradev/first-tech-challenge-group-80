<?php

namespace App\Services\Auth;

use App\Repositories\Client\Ports\ClientRepositoryPort;
use App\Services\Auth\Ports\AuthServicePort;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Laravel\Sanctum\PersonalAccessToken;

class AuthServiceAdapter implements AuthServicePort
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

    /**
     * @param  string  $document
     * @return string
     * @throws HttpResponseException
     */
    public function login(string $document): string
    {
        $clientExists = $this->clientRepository->getByDocument($document);

        if (! $clientExists) {
            throw new HttpResponseException(
                response()->json(['error' => 'Client not found'], Response::HTTP_NOT_FOUND)
            );
        }

        return $clientExists->createToken('api-token')->plainTextToken;
    }

    /**
     * @param  string  $token
     * @return void
     * @throws HttpResponseException
     */
    public function logout(string $token): void
    {
        $tokenInstance = PersonalAccessToken::findToken($token);

        if ($tokenInstance) {
            $tokenInstance->delete();
        } else {
            throw new HttpResponseException(
                response()->json(['error' => 'Token not found'], Response::HTTP_BAD_REQUEST)
            );
        }
    }
}

