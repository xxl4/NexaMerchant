<?php

namespace Nicelizhi\Checkout\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Webkul\Core\Tree;

class CheckoutServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'checkout');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'checkout');

        Blade::anonymousComponentPath(__DIR__ . '/../Resources/views/components', 'checkout');

        $this->composeView();

        $this->registerACL();

        // $this->app->register(EventServiceProvider::class);
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
        // $this->mergeConfigFrom(
        //     dirname(__DIR__) . '/Config/menu.php',
        //     'menu.admin'
        // );

        // $this->mergeConfigFrom(
        //     dirname(__DIR__) . '/Config/acl.php',
        //     'acl'
        // );

        // $this->mergeConfigFrom(
        //     dirname(__DIR__) . '/Config/system.php',
        //     'core'
        // );
    }

    /**
     * Bind the data to the views.
     *
     * @return void
     */
    protected function composeView()
    {
        
    }

    /**
     * Register ACL to entire application.
     *
     * @return void
     */
    protected function registerACL()
    {
       
    }

    /**
     * Create ACL tree.
     *
     * @return mixed
     */
    protected function createACL()
    {
        
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
                \Nicelizhi\Checkout\Console\Commands\Redis\Post::class,
            ]);
        }
    }
}
