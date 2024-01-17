<?php

namespace Webkul\Core\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;
<<<<<<< HEAD
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Original;
use Illuminate\Routing\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckForMaintenanceMode extends Original
=======
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as BaseCheckForMaintenanceMode;
use Illuminate\Routing\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Webkul\Installer\Helpers\DatabaseManager;

class CheckForMaintenanceMode extends BaseCheckForMaintenanceMode
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
{
    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
<<<<<<< HEAD
     * Current channel.
     *
     * @var \Webkul\Core\Models\Channel
     */
    protected $channel;

    /**
     * Exclude route names.
     * 
=======
     * Exclude route names.
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @var array
     */
    protected $excludedNames = [];

    /**
<<<<<<< HEAD
     * Exclude route uris.
     * 
     * @var array
     */
    protected $except = [];

    /**
     * Exclude IPs.
     * 
=======
     * Exclude Channel Ip's.
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @var array
     */
    protected $excludedIPs = [];

    /**
<<<<<<< HEAD
     * Constructor.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     */
    public function __construct(Application $app)
    {
        /* application */
        $this->app = $app;

        /* current channel */
        $this->channel = core()->getCurrentChannel();

        /* adding exception for admin routes */
        $this->except[] = env('APP_ADMIN_URL', 'admin') . '*';

        /* exclude ips */
        $this->setAllowedIps();
=======
     * Exclude route uris.
     *
     * @var array
     */
    protected $except = [];

    /**
     * Constructor.
     */
    public function __construct(
        protected DatabaseManager $databaseManager,
        Application $app
    ) {
        /* application */
        $this->app = $app;

        /* adding exception for admin routes */
        $this->except[] = config('app.admin_url') . '*';

        if ($this->databaseManager->isInstalled()) {
            /* exclude ips */
            $this->setAllowedIps();
        }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @param  \Closure  $next
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle($request, Closure $next)
    {
<<<<<<< HEAD
        if ($this->app->isDownForMaintenance()) {
            $response = $next($request);

            if (in_array($request->ip(), $this->excludedIPs)) {
=======
        if ($this->databaseManager->isInstalled() && $this->app->isDownForMaintenance()) {
            $response = $next($request);

            if (
                in_array($request->ip(), $this->excludedIPs)
                || $this->shouldPassThrough($request)
                || ! (bool) core()->getCurrentChannel()->is_maintenance_on
            ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                return $response;
            }

            $route = $request->route();

            if ($route instanceof Route) {
                if (in_array($route->getName(), $this->excludedNames)) {
                    return $response;
                }
            }

<<<<<<< HEAD
            if ($this->shouldPassThrough($request)) {
                return $response;
            }

            if (! (bool) $this->channel->is_maintenance_on) {
                return $response;
            }

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            throw new HttpException(503);
        }

        return $next($request);
    }

    /**
     * Set allowed IPs.
<<<<<<< HEAD
     *
     * @return void
     */
    protected function setAllowedIps()
    {
        if ($this->channel) {
            $this->excludedIPs = array_map('trim', explode(',', $this->channel->allowed_ips));
=======
     */
    protected function setAllowedIps(): void
    {
        if ($channel = core()->getCurrentChannel()) {
            $this->excludedIPs = array_map('trim', explode(',', $channel->allowed_ips ?? ''));
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        }
    }

    /**
     * Check for the except routes.
     *
     * @param  \Illuminate\Http\Request  $request
<<<<<<< HEAD
     * @return boolean
=======
     * @return bool
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected function shouldPassThrough($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }
}
