<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\profileSekolah;

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
        view()->composer('*', function ($view) {
            $globalProfile = profileSekolah::first();
            $view->with('globalProfile', $globalProfile);
        });
    }
}