<?php

namespace Nicelizhi\Manage\Listeners;

use Nicelizhi\Manage\Mail\Order\CreatedNotification;
use Nicelizhi\Manage\Mail\Order\CanceledNotification;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Nicelizhi\Shopify\Console\Commands\Order\Post;

class Order extends Base
{
    /**
     * After order is created
     *
     * @param  \Webkul\Sale\Contracts\Order  $order
     * @return void
     */
    public function afterCreated($order)
    {
        // send order to shopify
        Artisan::queue((new Post())->getName(), ['--order_id'=> $order->id])->onConnection('redis')->onQueue('commands');
        
        try {
            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.new_order')) {
                return;
            }

            $this->prepareMail($order, new CreatedNotification($order));

        } catch (\Exception $e) {
            report($e);
        }

        
    }

    /**
     * Send cancel order mail.
     *
     * @param  \Webkul\Sales\Contracts\Order  $order
     * @return void
     */
    public function afterCanceled($order)
    {
        try {
            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.cancel_order')) {
                return;
            }

            $this->prepareMail($order, new CanceledNotification($order));

            

        } catch (\Exception $e) {
            report($e);
        }
    }
}
