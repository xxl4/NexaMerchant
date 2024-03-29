<?php

namespace Nicelizhi\Manage\Listeners;

use Webkul\Paypal\Payment\SmartButton;
use Nicelizhi\Manage\Mail\Order\RefundedNotification;
use Illuminate\Support\Facades\Log;
use Nicelizhi\Airwallex\Sdk\Airwallex as AirwallexSdk;

class Refund extends Base
{
    /**
     * After order is created
     *
     * @param  \Webkul\Sale\Contracts\Refund  $refund
     * @return void
     */
    public function afterCreated($refund)
    {
        $this->refundOrder($refund);

        try {
            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.new_refund')) {
                return;
            }

            $this->prepareMail($refund, new RefundedNotification($refund));
        } catch (\Exception $e) {
            report($e);
        }
    }

    /**
     * After Refund is created
     *
     * @param  \Webkul\Sales\Contracts\Refund  $refund
     * @return void
     */
    public function refundOrder($refund)
    {
        $order = $refund->order;

        if ($order->payment->method === 'paypal_smart_button') {
            /* getting smart button instance */
            $smartButton = new SmartButton;

            /* getting paypal oder id */
            $paypalOrderID = $order->payment->additional['orderID'];

            /* getting capture id by paypal order id */
            $captureID = $smartButton->getCaptureId($paypalOrderID);

            /* now refunding order on the basis of capture id and refund data */
            $smartButton->refundOrder($captureID, [
                'amount' => [
                    'value'         => round($refund->grand_total, 2),
                    'currency_code' => $refund->order_currency_code,
                ],
            ]);
        }
        // airwallex
        if($order->payment->method=='airwallex') {

            Log::info("order refund Log info" . json_encode($order));

            $apiKey = core()->getConfigData('sales.payment_methods.airwallex.apikey');
            $clientId = core()->getConfigData('sales.payment_methods.airwallex.clientId');
            $productionMode = core()->getConfigData('sales.payment_methods.airwallex.production');

            Log::info("order refund Log info tr ".json_encode($order->transactions));

            $payment_intent_id = $order->transactions[0]->transaction_id;

            


            $paymentConfig = [
                'clientId' => $clientId,
                'apiKey' => $apiKey
            ];
    
    
            $sdk = new AirwallexSdk($paymentConfig, $productionMode);
    
            $sdk->createReRefund($payment_intent_id, $order->id, round($order->grand_total, 2));



        }
    }
}
