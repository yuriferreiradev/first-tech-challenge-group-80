<?php

namespace App\Providers\Client;

use App\Repositories\Client\ClientRepositoryAdapterAdapter;
use App\Repositories\Client\Ports\ClientRepositoryPort;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ClientRepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ClientRepositoryPort::class,
            ClientRepositoryAdapterAdapter::class
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [ClientRepositoryPort::class];
    }
}

