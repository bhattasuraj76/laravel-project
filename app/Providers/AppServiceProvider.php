<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
//Schem::defaultStringLength(191) this is used to remove the bug but in my project there is no bug until
    }

    public function register()
    {
        //
    }
}
