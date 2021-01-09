<?php

namespace App\Providers;

use App\Models\Cat;
use App\Models\Collection;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\CollectionObserver;
use App\Observers\UserObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
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
        Paginator::useBootstrap();

        User::observe(UserObserver::class);
        Cat::observe(CategoryObserver::class);
        Collection::observe( CollectionObserver::class);
    }
}
