<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\profileSekolah;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Schema::hasTable('profile_sekolah')) {
                $globalProfile = profileSekolah::first();
                $view->with('globalProfile', $globalProfile);
            }
        });
    }
}