<?php

namespace App\Providers\OrderProduct;

use App\Services\OrderProduct\OrderProductAdapter;
use App\Services\OrderProduct\Ports\OrderProductServicePort;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class OrderProductServiceServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            OrderProductServicePort::class,
            OrderProductAdapter::class
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [OrderProductServicePort::class];
    }
}

