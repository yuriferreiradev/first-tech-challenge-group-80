<?php

namespace App\Services\Auth\Ports;

use Illuminate\Http\Exceptions\HttpResponseException;

interface AuthServicePort
{
    /**
     * @param  string  $document
     * @return string
     * @throws HttpResponseException
     */
    public function login(string $document): string;

    /**
     * @param  string  $token
     * @return void
     * @throws HttpResponseException
     */
    public function logout(string $token): void;
}

