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
        Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');
        Route::middleware('api')->group(__DIR__ . '/../Routes/api.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'shopify');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'shopify');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        

        /*
        $this->app->register(EventServiceProvider::class);
        */

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Resources/views' => $this->app->resourcePath('themes/default/views'),
            ], 'shopify');
        }

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
            dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php',
            'acl'
        );

        
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
                \Nicelizhi\Shopify\Console\Commands\Product\GetV2::class,
                \Nicelizhi\Shopify\Console\Commands\Product\GetV3::class,
                \Nicelizhi\Shopify\Console\Commands\Product\GetV4::class,
                \Nicelizhi\Shopify\Console\Commands\Product\Post::class,
                \Nicelizhi\Shopify\Console\Commands\Product\Put::class,
                \Nicelizhi\Shopify\Console\Commands\Product\Delete::class,
                \Nicelizhi\Shopify\Console\Commands\Order\Get::class,
                \Nicelizhi\Shopify\Console\Commands\Order\GetShipping::class,
                \Nicelizhi\Shopify\Console\Commands\Order\Post::class,
                \Nicelizhi\Shopify\Console\Commands\Order\PostTest::class,

                \Nicelizhi\Shopify\Console\Commands\Order\Create::class,
                \Nicelizhi\Shopify\Console\Commands\Order\Put::class,
                \Nicelizhi\Shopify\Console\Commands\Order\PostCannelOrder::class,
                \Nicelizhi\Shopify\Console\Commands\Collect\Get::class,

                \Nicelizhi\Shopify\Console\Commands\Customers\Get::class,
                \Nicelizhi\Shopify\Console\Commands\Customers\Post::class,

                \Nicelizhi\Shopify\Console\Commands\Webhooks\Get::class,
                \Nicelizhi\Shopify\Console\Commands\Webhooks\Post::class,

                \Nicelizhi\Shopify\Console\Commands\Refund\Post::class,

                \Nicelizhi\Shopify\Console\Commands\CustomCollection\Get::class,
                \Nicelizhi\Shopify\Console\Commands\CustomCollection\Products::class,

                \Nicelizhi\Shopify\Console\Commands\Fulfillments\Create::class
            ]);
        }
    }
}
