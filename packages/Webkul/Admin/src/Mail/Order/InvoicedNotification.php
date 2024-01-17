<?php

namespace Webkul\Admin\Mail\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
use Illuminate\Contracts\Queue\ShouldQueue;
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class InvoicedNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param  \Webkul\Customer\Contracts\Invoice  $invoice
     * @param  string  $email
     * @return void
     */
    public function __construct(
<<<<<<< HEAD
        public $invoice,
        public $email = null
    )
    {
=======
        public $invoice
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
<<<<<<< HEAD
        return $this->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
            ->to($this->email ?? $this->invoice->order->customer_email, $this->invoice->order->customer_full_name)
            ->subject(trans('admin::app.emails.orders.invoiced.subject'))
            ->view('admin::emails.orders.invoiced');
=======
        $order = $this->invoice->order;

        return $this->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
            ->to($order->customer_email, $order->customer_full_name)
            ->subject(trans('admin::app.emails.orders.invoiced.subject'))
            ->view('shop::emails.orders.invoiced');
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }
}
