<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->partials();
    }

    public function partials()
    {
        view()->composer('partials.header-banners', 'App\Http\Views\Composers\partialComposer');

    }
}
