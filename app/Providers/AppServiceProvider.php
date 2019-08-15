<?php

namespace App\Providers;

use App\Job;
use App\Page;
use Illuminate\Support\Facades\Schema;
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
        \View::composer('*', function ($view) {
            $view->with('header_pages', Page::headerPages()->get());
            $view->with('footer_pages', Page::footerPages()->get());
        });
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
