<?php

namespace Webkul\Core\Providers;

<<<<<<< HEAD
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Webkul\Core\Core;
use Webkul\Core\Visitor;
use Webkul\Core\Exceptions\Handler;
use Webkul\Core\Facades\Core as CoreFacade;
=======
use Elastic\Elasticsearch\Client as ElasticSearchClient;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Webkul\Core\Core;
use Webkul\Core\ElasticSearch;
use Webkul\Core\Exceptions\Handler;
use Webkul\Core\Facades\Core as CoreFacade;
use Webkul\Core\Facades\ElasticSearch as ElasticSearchFacade;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Core\View\Compilers\BladeCompiler;
use Webkul\Theme\ViewRenderEventManager;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function boot(): void
    {
        include __DIR__ . '/../Http/helpers.php';

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'core');

        $this->publishes([
<<<<<<< HEAD
            dirname(__DIR__) . '/Config/concord.php'    => config_path('concord.php'),
            dirname(__DIR__) . '/Config/repository.php' => config_path('repository.php'),
            dirname(__DIR__) . '/Config/scout.php'      => config_path('scout.php'),
            dirname(__DIR__) . '/Config/visitor.php'      => config_path('visitor.php'),
=======
            dirname(__DIR__) . '/Config/concord.php'       => config_path('concord.php'),
            dirname(__DIR__) . '/Config/repository.php'    => config_path('repository.php'),
            dirname(__DIR__) . '/Config/visitor.php'       => config_path('visitor.php'),
            dirname(__DIR__) . '/Config/elasticsearch.php' => config_path('elasticsearch.php'),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);

        $this->app->register(EventServiceProvider::class);

<<<<<<< HEAD
=======
        $this->app->register(VisitorServiceProvider::class);

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        $this->app->bind(ExceptionHandler::class, Handler::class);

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'core');

        Event::listen('bagisto.shop.layout.body.after', static function (ViewRenderEventManager $viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('core::blade.tracer.style');
        });

        Event::listen('bagisto.admin.layout.head', static function (ViewRenderEventManager $viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('core::blade.tracer.style');
        });

        $this->app->extend('command.down', function () {
            return new \Webkul\Core\Console\Commands\DownCommand;
        });

        $this->app->extend('command.up', function () {
            return new \Webkul\Core\Console\Commands\UpCommand;
        });
<<<<<<< HEAD
=======

        /**
         * Image Cache route
         */
        if (is_string(config('imagecache.route'))) {
            $filenamePattern = '[ \w\\.\\/\\-\\@\(\)\=]+';

            /**
             * Route to access template applied image file
             */
            $this->app['router']->get(config('imagecache.route') . '/{template}/{filename}', [
                'uses' => 'Webkul\Core\ImageCache\Controller@getResponse',
                'as'   => 'imagecache',
            ])->where(['filename' => $filenamePattern]);
        }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Register services.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function register(): void
    {
        $this->registerFacades();

        $this->registerCommands();

        $this->registerBladeCompiler();
    }

    /**
     * Register Bouncer as a singleton.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected function registerFacades(): void
    {
        $loader = AliasLoader::getInstance();
<<<<<<< HEAD
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        $loader->alias('core', CoreFacade::class);

        $this->app->singleton('core', function () {
            return app()->make(Core::class);
        });

        /**
<<<<<<< HEAD
         * Bind to service container.
         */
        $this->app->singleton('shetabit-visitor', function () {
            $request = app(Request::class);

            return new Visitor($request, config('visitor'));
=======
         * Register ElasticSearch as a singleton.
         */
        $this->app->singleton('elasticsearch', function () {
            return new ElasticSearch;
        });

        $loader->alias('elasticsearch', ElasticSearchFacade::class);

        $this->app->singleton(ElasticSearchClient::class, function () {
            return app()->make('elasticsearch')->connection();
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        });
    }

    /**
     * Register the console commands of this package.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Webkul\Core\Console\Commands\BagistoPublish::class,
                \Webkul\Core\Console\Commands\BagistoVersion::class,
                \Webkul\Core\Console\Commands\ExchangeRateUpdate::class,
                \Webkul\Core\Console\Commands\InvoiceOverdueCron::class,
            ]);
        }

        $this->commands([
            \Webkul\Core\Console\Commands\DownChannelCommand::class,
            \Webkul\Core\Console\Commands\UpChannelCommand::class,
        ]);
    }

    /**
     * Register the Blade compiler implementation.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function registerBladeCompiler(): void
    {
        $this->app->singleton('blade.compiler', function ($app) {
            return new BladeCompiler($app['files'], $app['config']['view.compiled']);
        });
    }
}
