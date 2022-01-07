<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\ResponseFactory;
use Illuminate\Support\Facades\View;

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
        // ResponseFactory::macro('modal', function ($modal) {
        //     inertia()->share(['modal' => $modal]);
        // });
        View::share('key', 'value');
    }
}
