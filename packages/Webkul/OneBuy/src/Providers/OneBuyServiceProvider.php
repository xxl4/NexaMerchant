<?php

namespace Nicelizhi\OneBuy\Providers;

use Illuminate\Support\ServiceProvider;

class OneBuyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        include __DIR__ . '/../Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'onebuy');
        /*
        $this->app->register(EventServiceProvider::class);
        */
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        /*
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/paymentmethods.php', 'payment_methods'
        );
        */
    }
}
