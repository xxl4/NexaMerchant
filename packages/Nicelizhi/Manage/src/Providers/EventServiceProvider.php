<?php

namespace Nicelizhi\Manage\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'admin.password.update.after' => [
            'Nicelizhi\Manage\Listeners\Admin@afterPasswordUpdated',
        ],

        'checkout.order.save.after' => [
            'Nicelizhi\Manage\Listeners\Order@afterCreated',
        ],

        'sales.order.cancel.after' => [
            'Nicelizhi\Manage\Listeners\Order@afterCanceled',
        ],

        'sales.invoice.save.after' => [
            'Nicelizhi\Manage\Listeners\Invoice@afterCreated',
        ],

        'sales.shipment.save.after' => [
            'Nicelizhi\Manage\Listeners\Shipment@afterCreated',
        ],

        'sales.refund.save.after' => [
            'Nicelizhi\Manage\Listeners\Refund@afterCreated',
        ],

        'core.channel.update.after' => [
            'Nicelizhi\Manage\Listeners\ChannelSettingsChange@checkForMaintenanceMode',
        ],
    ];
}
