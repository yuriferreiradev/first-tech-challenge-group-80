<?php

namespace App\Providers\Product;

use App\Services\Product\ProductServiceAdapter;
use App\Services\Product\Ports\ProductServicePort;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ProductServiceServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductServicePort::class,
            ProductServiceAdapter::class
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [ProductServicePort::class];
    }
}

