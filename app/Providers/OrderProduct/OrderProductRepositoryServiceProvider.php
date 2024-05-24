<?php

namespace App\Providers\OrderProduct;

use App\Repositories\OrderProduct\OrderProductRepositoryAdapterAdapter;
use App\Repositories\OrderProduct\Ports\OrderProductRepositoryPort;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class OrderProductRepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            OrderProductRepositoryPort::class,
            OrderProductRepositoryAdapterAdapter::class
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [OrderProductRepositoryPort::class];
    }
}

