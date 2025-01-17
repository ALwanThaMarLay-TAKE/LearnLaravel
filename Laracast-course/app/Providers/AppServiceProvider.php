<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        Model::preventLazyLoading(); //* this is for disable lazy loading for whole application
        Paginator::useTailwind(); //*config for which pagination Ui should use bootstrap , tailwind
        // Paginator::defaultView("paginate"); //*config for which custom view pagination file should use for pagination UI
    }
}
