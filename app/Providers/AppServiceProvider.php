<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Navprofile;
use App\Services;
use App\Footer;


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
        view()->share([
        'nav' => Navprofile::where('status', 1)->first(),
        'services' => Services::all(),
        'footer' => Footer::where('status', 1)->first(), 
        ]);
    }
}
