<?php

namespace App\Providers;

use App\Models\Plan;
use App\Observers\PlanObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;



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
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        
        Plan::observe(PlanObserver::class);
    }
}
