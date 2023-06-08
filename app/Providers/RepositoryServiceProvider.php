<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    ClientRepositoryInterface,
    OrderRepositoryInterface,
    ProductRepositoryInterface,
    TableRepositoryInterface,
    TenantRepositoryInterface
};
use App\Repositories\{
    TenantRepository,
    CategoryRepository,
    ClientRepository,
    OrderRepository,
    ProductRepository,
    TableRepository,
};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            TenantRepositoryInterface::class,
            TenantRepository::class,
        );
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class,
        );
        $this->app->bind(
            TableRepositoryInterface::class,
            TableRepository::class,
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class,
        );
        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class,
        );
        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
