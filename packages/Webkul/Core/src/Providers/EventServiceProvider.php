<?php

namespace Webkul\Core\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Prettus\Repository\Events\RepositoryEntityCreated' => [
<<<<<<< HEAD
            'Webkul\Core\Listeners\CleanCacheRepository'
        ],
        'Prettus\Repository\Events\RepositoryEntityUpdated' => [
            'Webkul\Core\Listeners\CleanCacheRepository'
        ],
        'Prettus\Repository\Events\RepositoryEntityDeleted' => [
            'Webkul\Core\Listeners\CleanCacheRepository'
        ],
        'Spatie\ResponseCache\Events\ResponseCacheHit' => [
            'Webkul\Core\Listeners\ResponseCacheHit'
        ],
    ];
}
=======
            'Webkul\Core\Listeners\CleanCacheRepository',
        ],
        'Prettus\Repository\Events\RepositoryEntityUpdated' => [
            'Webkul\Core\Listeners\CleanCacheRepository',
        ],
        'Prettus\Repository\Events\RepositoryEntityDeleted' => [
            'Webkul\Core\Listeners\CleanCacheRepository',
        ],
        'Spatie\ResponseCache\Events\ResponseCacheHit' => [
            'Webkul\Core\Listeners\ResponseCacheHit',
        ],
    ];
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
