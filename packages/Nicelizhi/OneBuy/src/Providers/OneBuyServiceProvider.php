<?php

namespace Nicelizhi\OneBuy\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Webkul\Shop\Http\Middleware\AuthenticateCustomer;
use Webkul\Shop\Http\Middleware\Currency;
use Webkul\Shop\Http\Middleware\Locale;
use Webkul\Shop\Http\Middleware\Theme;

class OneBuyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        
        include __DIR__ . '/../Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'onebuy');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'onebuy');

        /* aliases */
        $router->aliasMiddleware('currency', Currency::class);
        $router->aliasMiddleware('locale', Locale::class);
        $router->aliasMiddleware('customer', AuthenticateCustomer::class);
        $router->aliasMiddleware('theme', Theme::class);

        /* View Composers */
        //$this->composeView();

        /* Paginator */
        Paginator::defaultView('shop::partials.pagination');
        Paginator::defaultSimpleView('shop::partials.pagination');

        Blade::anonymousComponentPath(__DIR__ . '/../Resources/views/components', 'onebuy');

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
        /*
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/paymentmethods.php', 'payment_methods'
        );
        */
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/onebuy.php', 'onebuy'
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
                \Nicelizhi\OneBuy\Console\Commands\Countries\Get::class,
                \Nicelizhi\OneBuy\Console\Commands\Countries\StateCopy::class,
                \Nicelizhi\OneBuy\Console\Commands\Order\CartToOrder::class,
                \Nicelizhi\OneBuy\Console\Commands\Paypal\OrderGet::class,
                \Nicelizhi\OneBuy\Console\Commands\Imports\ImportFaq::class,
                \Nicelizhi\OneBuy\Console\Commands\Imports\ImportProductComments::class,
            ]);
        }
    }
}
