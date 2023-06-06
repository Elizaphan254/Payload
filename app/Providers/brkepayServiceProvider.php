<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class brkepayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path()."/Helpers/payrollFunctions.php";
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
