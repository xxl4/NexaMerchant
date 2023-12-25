<?php

namespace Nicelizhi\Airwallex\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'sales.refund.save.after' => [
            'Nicelizhi\Airwallex\Listeners\AirwallexListener@afterRefundGenerated',
        ],
        'sales.shipment.save.after' => [
            'Nicelizhi\Airwallex\Listeners\AirwallexListener@afterOrderShipped',
        ]
    ];
}
