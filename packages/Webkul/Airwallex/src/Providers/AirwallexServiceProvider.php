<?php
namespace Nicelizhi\Airwallex\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Webkul\Shop\Http\Middleware\AuthenticateCustomer;
use Webkul\Shop\Http\Middleware\Currency;
use Webkul\Shop\Http\Middleware\Locale;
use Webkul\Shop\Http\Middleware\Theme;

class AirwallexServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        
        

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
