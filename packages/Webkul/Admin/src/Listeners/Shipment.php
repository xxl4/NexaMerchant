<?php

namespace Webkul\Admin\Listeners;

<<<<<<< HEAD
use Webkul\Admin\Mail\Order\ShippedNotification;
use Webkul\Admin\Mail\Order\InventorySourceNotification;
=======
use Webkul\Admin\Mail\Order\InventorySourceNotification;
use Webkul\Admin\Mail\Order\ShippedNotification;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

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
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.new_inventory_source')) {
                return;
            }

            $this->prepareMail($shipment, new InventorySourceNotification($shipment));
        } catch (\Exception $e) {
            report($e);
        }
    }
}
