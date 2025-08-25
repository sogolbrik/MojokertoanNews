<?php

namespace App\Providers;

use App\Models\Category;
use Carbon\Carbon;
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
        Carbon::setLocale('id'); // set ke bahasa Indonesia

        view()->composer('*', function ($view) {
            $view->with('navKategori', Category::all());
        });
    }
}
