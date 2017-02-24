<?php

namespace API\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('API\Repositories\Contracts\AuthenticateRepositoryInterface','API\Repositories\AuthenticateRepository');
        $this->app->bind('API\Repositories\Contracts\UserRepositoryInterface','API\Repositories\UserRepository');
        $this->app->bind('API\Repositories\Contracts\WorkoutPlanRepositoryInterface','API\Repositories\WorkoutPlanRepository');
        $this->app->bind('API\Repositories\Contracts\WorkoutTypeRepositoryInterface','API\Repositories\WorkoutTypeRepository');

    }
}
