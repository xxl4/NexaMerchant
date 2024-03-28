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
        
       /* loaders */
       Route::middleware('web')->group(dirname(__DIR__).'/Routes/web.php');
        
       $this->loadRoutesFrom(dirname(__DIR__).'/Routes/api.php');

       $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'airwallex');

       $this->loadViewsFrom(__DIR__.'/../Resources/views', 'airwallex');

       $this->app->bind('Webkul\Core\Core', 'Nicelizhi\Airwallex\Core');

       $this->app->register(EventServiceProvider::class);

       if ($this->app->runningInConsole()) {
           $this->publishes([
               __DIR__.'/../Resources/views' => $this->app->resourcePath('themes/default/views'),
           ], 'airwallex');
       }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerCommands();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/paymentmethods.php', 'payment_methods'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php', 'core'
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
                \Nicelizhi\Airwallex\Console\Commands\Webhook\CreateaWebhook::class,
                \Nicelizhi\Airwallex\Console\Commands\Order\Refund::class,
            ]);
        }
    }
}
