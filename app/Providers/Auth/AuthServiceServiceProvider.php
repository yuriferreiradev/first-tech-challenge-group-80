<?php

namespace App\Providers\Auth;

use App\Services\Auth\AuthServiceAdapter;
use App\Services\Auth\Ports\AuthServicePort;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AuthServiceServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthServicePort::class,
            AuthServiceAdapter::class
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [AuthServicePort::class];
    }
}

