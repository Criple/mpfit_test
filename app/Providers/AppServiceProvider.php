<?php

namespace App\Providers;

use App\Services\Orders\Interfaces\OrdersServiceInterface;
use App\Services\Orders\OrdersService;
use App\Services\Products\Interfaces\ProductsServiceInterface;
use App\Services\Products\ProductsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(ProductsServiceInterface::class, ProductsService::class);
        $this->app->bind(OrdersServiceInterface::class, OrdersService::class);
    }
}
