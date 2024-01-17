<?php

namespace Webkul\Admin\Mail\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
use Illuminate\Contracts\Queue\ShouldQueue;
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class RefundedNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param  \Webkul\Sales\Contracts\Refund  $refund
     * @return void
     */
    public function __construct(public $refund)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
<<<<<<< HEAD
            ->to($this->refund->order->customer_email, $this->refund->order->customer_full_name)
=======
            ->to(core()->getAdminEmailDetails()['email'], core()->getAdminEmailDetails()['name'])
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ->subject(trans('admin::app.emails.orders.refunded.subject'))
            ->view('admin::emails.orders.refunded');
    }
}
