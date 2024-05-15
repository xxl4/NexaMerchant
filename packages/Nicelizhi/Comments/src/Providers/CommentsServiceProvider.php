<?php
namespace Nicelizhi\Comments\Providers;

use Illuminate\Support\ServiceProvider;

class CommentsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'comments');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'comments');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Resources/views' => $this->app->resourcePath('themes/default/views'),
            ], 'comments');
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
    protected function registerConfig(){
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/comments.php', 'comments'
        );
    }

    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Nicelizhi\Comments\Console\Commands\Install::class,
            ]);
        }
    }
}