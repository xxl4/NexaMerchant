<?php

namespace Webkul\Admin\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
<<<<<<< HEAD
=======
        'customer.registration.after' => [
            'Webkul\Admin\Listeners\Customer@afterCreated',
        ],

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        'admin.password.update.after' => [
            'Webkul\Admin\Listeners\Admin@afterPasswordUpdated',
        ],

        'checkout.order.save.after' => [
            'Webkul\Admin\Listeners\Order@afterCreated',
        ],

        'sales.order.cancel.after' => [
            'Webkul\Admin\Listeners\Order@afterCanceled',
        ],

        'sales.invoice.save.after' => [
            'Webkul\Admin\Listeners\Invoice@afterCreated',
        ],

        'sales.shipment.save.after' => [
            'Webkul\Admin\Listeners\Shipment@afterCreated',
        ],

        'sales.refund.save.after' => [
            'Webkul\Admin\Listeners\Refund@afterCreated',
        ],

        'core.channel.update.after' => [
            'Webkul\Admin\Listeners\ChannelSettingsChange@checkForMaintenanceMode',
        ],
    ];
}
