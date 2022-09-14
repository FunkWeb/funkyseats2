<?php

namespace App\Providers;

use Carbon\Carbon;
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
        Carbon::setLocale(config('app.locale'));

        \Spatie\Flash\Flash::levels([
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'error' => 'alert-danger',
        ]);
    }
}
