<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    TenantRepositoryInterface
};
use App\Repositories\{
    TenantRepository,
    CategoryRepository,
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
