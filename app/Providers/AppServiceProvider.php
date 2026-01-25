<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
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
     */
    public function boot(): void
    {
        // Prevent N+1 queries
        Model::preventLazyLoading(! $this->app->isProduction());
        
        // Prevent accessing missing attributes
        Model::preventAccessingMissingAttributes(! $this->app->isProduction());
        
        // Use Bootstrap pagination
        Paginator::useBootstrapFive();
    }
}
