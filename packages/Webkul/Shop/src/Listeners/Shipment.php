<?php

namespace Webkul\Shop\Listeners;

use Webkul\Shop\Mail\Order\ShippedNotification;

class Shipment extends Base
{
    /**
     * After order is created
     *
     * @param  \Webkul\Sale\Contracts\Shipment  $shipment
     * @return void
     */
    public function afterCreated($shipment)
    {
<<<<<<< HEAD
        if ($shipment->email_sent) {
            return;
        }

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        try {
            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.new_shipment')) {
                return;
            }

            $this->prepareMail($shipment, new ShippedNotification($shipment));
<<<<<<< HEAD
=======

            $shipment->query()->update(['email_sent' => 1]);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        } catch (\Exception $e) {
            report($e);
        }
    }
}
