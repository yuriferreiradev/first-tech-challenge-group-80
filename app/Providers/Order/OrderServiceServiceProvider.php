<?php

namespace App\Providers\Order;

use App\Services\Order\OrderServiceAdapter;
use App\Services\Order\Ports\OrderServicePort;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class OrderServiceServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            OrderServicePort::class,
            OrderServiceAdapter::class
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [OrderServicePort::class];
    }
}

