<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Guard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth) {
        view()->composer('*', function($view) use ($auth) {
            // get the current user
            $currentUser = $auth->user();

            // do stuff with the current user
            // ...

            // pass the data to the view
            $view->with('currentUser', $currentUser);
        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
