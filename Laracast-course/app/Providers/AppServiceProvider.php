<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Gate::define("edit-job", function (User $user, Job $job) { //$user will be automatically currently sign in user but you are not sign in auto redirect login page and want to customize the $use just pass default argument null or make it opational using "?"
            return $job->employer->user->is($user);
        });
    }
}
