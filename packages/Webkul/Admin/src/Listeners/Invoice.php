<?php

namespace Webkul\Admin\Listeners;

use Webkul\Admin\Mail\Order\InvoicedNotification;
<<<<<<< HEAD
=======
use Webkul\Sales\Repositories\OrderTransactionRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class Invoice extends Base
{
    /**
<<<<<<< HEAD
=======
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderTransactionRepository $orderTransactionRepository,
    ) {
    }

    /**
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * After order is created
     *
     * @param  \Webkul\Sale\Contracts\Invoice  $invoice
     * @return void
     */
    public function afterCreated($invoice)
    {
<<<<<<< HEAD
        if ($invoice->email_sent) {
            return;
        }

=======
        $this->sendMail($invoice);

        if ($invoice->can_create_transaction) {
            $this->createTransaction($invoice);
        }
    }

    /**
     * Send Transaction mail.
     *
     * @param  \Webkul\Sale\Contracts\Invoice  $invoice
     * @return void
     */
    public function sendMail($invoice)
    {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        try {
            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.new_invoice')) {
                return;
            }

<<<<<<< HEAD
            $this->prepareMail($invoice, new InvoicedNotification($invoice, $invoice->email ?? $this->invoice->order->customer_email));
=======
            $this->prepareMail($invoice, new InvoicedNotification($invoice));
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        } catch (\Exception $e) {
            report($e);
        }
    }
<<<<<<< HEAD
=======

    /**
     * Create the transaction data for Money-transfer and Cash-on-delivery.
     *
     * @param  \Webkul\Sale\Contracts\Invoice  $invoice
     * @return void
     */
    public function createTransaction($invoice)
    {
        $transactionId = md5(uniqid());

        $transactionData = [
            'transaction_id' => $transactionId,
            'status'         => $invoice->state,
            'type'           => $invoice->order->payment->method,
            'payment_method' => $invoice->order->payment->method,
            'order_id'       => $invoice->order->id,
            'invoice_id'     => $invoice->id,
            'amount'         => $invoice->grand_total,
        ];

        $this->orderTransactionRepository->create($transactionData);
    }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
}
