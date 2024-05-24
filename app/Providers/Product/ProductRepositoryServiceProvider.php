<?php

namespace App\Providers\Product;

use App\Repositories\Product\ProductRepositoryAdapterAdapter;
use App\Repositories\Product\Ports\ProductRepositoryPort;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ProductRepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryPort::class,
            ProductRepositoryAdapterAdapter::class
        );
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [ProductRepositoryPort::class];
    }
}

