<?php

namespace Nicelizhi\Manage\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Webkul\Core\Tree;
use Nicelizhi\Manage\Http\Middleware\AdminOptionLog;

class ManageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        Route::middleware('web')->group(__DIR__ . '/../Routes/web.php');

        $router->aliasMiddleware('admin_option_log', AdminOptionLog::class);

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'admin');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'admin');

        Blade::anonymousComponentPath(__DIR__ . '/../Resources/views/components', 'admin');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->composeView();

        $this->registerACL();

        $this->app->register(EventServiceProvider::class);
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
            dirname(__DIR__) . '/Config/menu.php',
            'menu.admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php',
            'acl'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php',
            'core'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/website.php',
            'website'
        );

    }

    /**
     * Bind the data to the views.
     *
     * @return void
     */
    protected function composeView()
    {
        view()->composer([
            'admin::components.layouts.header.index',
            'admin::components.layouts.sidebar.index',
            'admin::components.layouts.tabs',
        ], function ($view) {
            $tree = Tree::create();

            $permissionType = auth()->guard('admin')->user()->role->permission_type;
            
            $allowedPermissions = auth()->guard('admin')->user()->role->permissions;

            foreach (config('menu.admin') as $index => $item) {
                if (! bouncer()->hasPermission($item['key'])) {
                    continue;
                }

                if (
                    $index + 1 < count(config('menu.admin'))
                    && $permissionType != 'all'
                ) {
                    $permission = config('menu.admin')[$index + 1];

                    if (
                        substr_count($permission['key'], '.') == 2
                        && substr_count($item['key'], '.') == 1
                    ) {
                        foreach ($allowedPermissions as $key => $value) {
                            if ($item['key'] != $value) {
                                continue;
                            }

                            $neededItem = $allowedPermissions[$key + 1];

                            foreach (config('menu.admin') as $key1 => $menu) {
                                if ($menu['key'] == $neededItem) {
                                    $item['route'] = $menu['route'];
                                }
                            }
                        }
                    }
                }

                $tree->add($item, 'menu');
            }


            $tree->items = core()->sortItems($tree->items);

            $view->with('menu', $tree);
        });


        view()->composer([
            'admin::settings.roles.create',
            'admin::settings.roles.edit'
        ], function ($view) {
            $view->with('acl', $this->createACL());
        });
    }

    /**
     * Register ACL to entire application.
     *
     * @return void
     */
    protected function registerACL()
    {
        $this->app->singleton('acl', function () {
            return $this->createACL();
        });
    }

    /**
     * Create ACL tree.
     *
     * @return mixed
     */
    protected function createACL()
    {
        static $tree;

        if ($tree) {
            return $tree;
        }

        $tree = Tree::create();


        foreach (config('acl') as $item) {
            $tree->add($item, 'acl');
        }

        $tree->items = core()->sortItems($tree->items);

        return $tree;
    }

    protected function registerCommands() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Nicelizhi\Manage\Console\Commands\Customers\ImportOrderCustomer::class,
                \Nicelizhi\Manage\Console\Commands\Paypal\PaypalCoverOrderIDToTranslationID::class,
                \Nicelizhi\Manage\Console\Commands\Refund\RefundOrder::class,
            ]);
        }
    }

}
