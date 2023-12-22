<?php
namespace Nicelizhi\Shopify\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Webkul\Shop\Http\Middleware\AuthenticateCustomer;
use Webkul\Shop\Http\Middleware\Currency;
use Webkul\Shop\Http\Middleware\Locale;
use Webkul\Shop\Http\Middleware\Theme;

class ShopifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        

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
        $this->registerCommands();
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/shopify.php', 'shopify'
        );
        
    }

    /**
     * Register the console commands of this package.
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Nicelizhi\Shopify\Console\Commands\Product\Get::class,
                \Nicelizhi\Shopify\Console\Commands\Product\Post::class,
                \Nicelizhi\Shopify\Console\Commands\Product\Put::class,
                \Nicelizhi\Shopify\Console\Commands\Product\Delete::class,
            ]);
        }
    }
}
