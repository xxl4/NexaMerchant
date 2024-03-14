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
        'manage.password.update.after' => [
            'Nicelizhi\Admin\Listeners\Admin@afterPasswordUpdated',
        ],

        'checkout.order.save.after' => [
            'Nicelizhi\Admin\Listeners\Order@afterCreated',
        ],

        'sales.order.cancel.after' => [
            'Nicelizhi\Admin\Listeners\Order@afterCanceled',
        ],

        'sales.invoice.save.after' => [
            'Nicelizhi\Admin\Listeners\Invoice@afterCreated',
        ],

        'sales.shipment.save.after' => [
            'Nicelizhi\Admin\Listeners\Shipment@afterCreated',
        ],

        'sales.refund.save.after' => [
            'Nicelizhi\Admin\Listeners\Refund@afterCreated',
        ],

        'core.channel.update.after' => [
            'Nicelizhi\Admin\Listeners\ChannelSettingsChange@checkForMaintenanceMode',
        ],
    ];
}
