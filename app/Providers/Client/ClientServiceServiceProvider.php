<?php

namespace App\Providers\Client;

use App\Services\Client\ClientServiceAdapter;
use App\Services\Client\Ports\ClientServicePort;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ClientServiceServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ClientServicePort::class,
            ClientServiceAdapter::class
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [ClientServicePort::class];
    }
}

