<?php

<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
namespace Webkul\Admin\Mail\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CanceledNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  \Webkul\Sales\Contracts\Order  $order
     * @return void
     */
    public function __construct(public $order)
    {
    }

    public function build()
    {
        return $this->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
<<<<<<< HEAD
            ->to($this->order->customer_email, $this->order->customer_full_name)
            ->subject(trans('admin::app.emails.orders.canceled.subject'))
            ->view('admin::emails.orders.canceled');
    }
}
=======
            ->to(core()->getAdminEmailDetails()['email'], core()->getAdminEmailDetails()['name'])
            ->subject(trans('admin::app.emails.orders.canceled.subject'))
            ->view('admin::emails.orders.canceled');
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
