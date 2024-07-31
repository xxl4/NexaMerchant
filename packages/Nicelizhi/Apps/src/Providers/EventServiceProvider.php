<?php

namespace Nicelizhi\Apps\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        'apps.version.save.after' => [
            'Nicelizhi\Manage\Listeners\Order@afterCreated',
        ],

        'apps.version.delete.after' => [
            'Nicelizhi\Manage\Listeners\Order@afterCanceled',
        ],

        'apps.save.after' => [
            'Nicelizhi\Manage\Listeners\Invoice@afterCreated',
        ],

        'apps.add.after' => [
            'Nicelizhi\Manage\Listeners\Shipment@afterCreated',
        ]
    ];
}
