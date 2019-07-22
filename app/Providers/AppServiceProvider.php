<?php

namespace App\Providers;

use App\Job;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \View::composer('*', function ($view) {
            $view->with('pending', Job::Pending()->count());
            $view->with('blocked', Job::Blocked()->count());
            $view->with('approved', Job::Approved()->count());
        });
    }
}
