<?php
namespace Nicelizhi\Apps\Providers;

use Illuminate\Support\ServiceProvider;

class AppsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'apps');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'apps');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/apps'),
        ]);
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/apps'),
        ]);
        $this->publishes([
            __DIR__.'/../Config/apps.php' => config_path('apps.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}