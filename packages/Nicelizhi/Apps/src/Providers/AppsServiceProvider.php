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
        $this->loadRoutesFrom(__DIR__.'/../Routes/api.php');
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

        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->regsiteCommands();
        $this->registeConfig();
    }

    public function registeConfig() {
        $this->mergeConfigFrom(
            __DIR__.'/../Config/apps.php', 'apps'
        );

        $this->mergeConfigFrom(
            __DIR__.'/../Config/system.php', 'core'
        );

    }

    public function regsiteCommands()
    {
        $this->commands([
            \Nicelizhi\Apps\Console\Commands\Install::class,
            \Nicelizhi\Apps\Console\Commands\UnInstall::class,
            \Nicelizhi\Apps\Console\Commands\Create::class,
            \Nicelizhi\Apps\Console\Commands\Remove::class,
            \Nicelizhi\Apps\Console\Commands\Lists::class,
            \Nicelizhi\Apps\Console\Commands\Search::class,
        ]);
    }
}