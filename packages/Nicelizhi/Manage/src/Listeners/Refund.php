<?php

namespace Nicelizhi\Manage\Listeners;

use Webkul\Paypal\Payment\SmartButton;
use Nicelizhi\Manage\Mail\Order\RefundedNotification;
use Illuminate\Support\Facades\Log;
use Nicelizhi\Airwallex\Sdk\Airwallex as AirwallexSdk;
use Illuminate\Support\Facades\Artisan;

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

        //Log::info("refund captureID". json_encode($refund));

        if($refund->is_refund_money == "0") {

            Artisan::queue("shopify:refund:post", ['--order_id'=>$order->id,'--refund_id'=> $refund->id])->onConnection('redis')->onQueue('shopify-refund'); // add shopify refund queue

            return;
        }

        if ($order->payment->method === 'paypal_smart_button') {
            /* getting smart button instance */
            $smartButton = new SmartButton;

            if($order->payment->version !='0') {
                $smartButton->setClientId(config("website.paypal.v".$order->payment->version.".client_id"));
                $smartButton->setClientSecret(config("website.paypal.v".$order->payment->version.".client_secret"));
            }


            /* getting paypal oder id */
            $paypalOrderID = $order->payment->additional['orderID'];

            /* getting capture id by paypal order id */
            try {
                $captureID = $smartButton->getCaptureId($paypalOrderID);
            }catch (Exception $e) {
                Log::error($paypalOrderID."--refund captureID". json_encode($e->getMessage()));
                \Nicelizhi\Shopify\Helpers\Utils::send($e->getMessage());
            } 
            //$captureID = $smartButton->getCaptureId($paypalOrderID);

            //Log::info("refund captureID". json_encode($captureID));

            /* now refunding order on the basis of capture id and refund data */
            try {
                $smartButton->refundOrder($captureID, [
                    'amount' => [
                        'value'         => round($refund->grand_total, 2),
                        'currency_code' => $refund->order_currency_code,
                    ],
                ]);
            }catch (Exception $e) {
                var_dump($e->getMessage());
                //exit;
                \Nicelizhi\Shopify\Helpers\Utils::send($e->getMessage());   
            } finally  {
                //echo " Error plese check the log ";exit;
            }
            //return false;

        }
        // airwallex
        if($order->payment->method=='airwallex') {
            Log::info("order refund Log info" . json_encode($order));

            $apiKey = core()->getConfigData('sales.payment_methods.airwallex.apikey');
            $clientId = core()->getConfigData('sales.payment_methods.airwallex.clientId');
            $productionMode = core()->getConfigData('sales.payment_methods.airwallex.production');

            Log::info("order refund Log info tr ".json_encode($order->transactions));
            Log::info("order refund Log info tr ".json_encode($order->id));

            $payment_intent_id = $order->transactions[0]->transaction_id;

            


            $paymentConfig = [
                'clientId' => $clientId,
                'apiKey' => $apiKey
            ];

            try {
                $sdk = new AirwallexSdk($paymentConfig, $productionMode);
                $sdk->createReRefund($payment_intent_id, $order->id, round($refund->grand_total, 2));
            }catch (Exception $e) {
                \Nicelizhi\Shopify\Helpers\Utils::send($e->getMessage());
            }  
        }

        Artisan::queue("shopify:refund:post", ['--order_id'=>$order->id,'--refund_id'=> $refund->id])->onConnection('redis')->onQueue('shopify-refund'); // add shopify refund queue


    }
}
