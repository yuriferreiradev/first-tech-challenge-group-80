<?php

namespace App\Providers\Order;

use App\Repositories\Order\OrderRepositoryAdapterAdapter;
use App\Repositories\Order\Ports\OrderRepositoryPort;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class OrderRepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            OrderRepositoryPort::class,
            OrderRepositoryAdapterAdapter::class
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [OrderRepositoryPort::class];
    }
}

