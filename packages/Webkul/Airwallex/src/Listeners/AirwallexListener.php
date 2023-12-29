<?php

namespace Nicelizhi\Airwallex\Listeners;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use Nicelizhi\Airwallex\Sdk\Airwallex as AirwallexSdk;


class AirwallexListener
{

    protected $paymentConfig = array();

    protected $clientEmail;

    protected $clientPassword;

    protected $clientId;

    protected $accountId;

    protected $paDC;

    protected $accountDC;

    /**
     * Flag indicating if production mode is enabled.
     *
     * @var bool
     */
    protected $productionMode;

    /**
     * API key for airwallex.
     *
     * @var string
     */
    protected $apiKey;

    public function __construct() {
    }

    /**
     * After refund is created
     *
     * @param  \Webkul\Sale\Contracts\Refund  $refund
     * @return void
     */
    public function afterRefundGenerated($refund)
    {
        if ($refund->order->payment->method !== 'airwallex') {
            return;
        }

        return;

        $this->apiKey = core()->getConfigData('sales.payment_methods.airwallex.apikey');

        $this->clientId = core()->getConfigData('sales.payment_methods.airwallex.clientId');
        $this->clientEmail = core()->getConfigData('sales.payment_methods.airwallex.clientEmail');
        $this->clientPassword = core()->getConfigData('sales.payment_methods.airwallex.clientPassword');
        $this->accountId = core()->getConfigData('sales.payment_methods.airwallex.accountId');
        $this->paDC = core()->getConfigData('sales.payment_methods.airwallex.paDC');
        $this->accountDC = core()->getConfigData('sales.payment_methods.airwallex.accountDC');

        $this->productionMode = core()->getConfigData('sales.payment_methods.airwallex.production');

        $this->paymentConfig = [
            'clientId' => $this->clientId,
            'apiKey' => $this->apiKey,
            'clientEmail' => $this->clientEmail,
            'clientPassword' => $this->clientPassword,
            'accountId' => $this->accountId,
            'paDC' => $this->paDC,
            'accountDC' => $this->accountDC,
        ];
        $airwallexsdk = new AirwallexSdk($this->paymentConfig, $this->isProduction);

        $orderId = core()->getConfigData('sales.payment_methods.airwallex.prefix') . $refund->order_id;

        try {
            $refundAmount = new Money(round($refund->grand_total * 100), $refund->order->base_currency_code);
            $transactionManager = $airwallexsdk->getTransactionManager();
            $transaction = $transactionManager->get($orderId);
            $response = $transactionManager->refund($transaction, (new RefundRequest())->addMoney($refundAmount));

            $orderTransactionRepository = app('\Webkul\Sales\Repositories\OrderTransactionRepository');
            $transaction = $orderTransactionRepository->findWhere([
                'order_id' => $refund->order_id
            ])->first();

            $orderTransactionRepository->create([
                'transaction_id' => $transaction->transaction_id,
                'status' => 'refunded',
                'amount' => $refund->grand_total,
                'type' => $transaction->type,
                'payment_method' => $transaction->payment_method,
                'invoice_id' => $transaction->invoice_id,
                'order_id' => $transaction->order_id,
            ]);
            Log::info("airwallex refund generated for order id: $orderId");
        } catch (\Exception $exception) {
            Log::info("airwallex exception while generating refund for order id: $orderId");
            Log::info($exception);
        }

        return true;
    }

    /**
     * After order has been shipped
     *
     * @param  \Webkul\Sale\Contracts\Shipment  $shipment
     * @return void
     */
    public function afterOrderShipped($shipment)
    {
        if ($shipment->order->payment->method !== 'airwallex') {
            return;
        }

        return;

        $apiKey = core()->getConfigData('sales.payment_methods.multisafepay.apikey');
        $isProduction = core()->getConfigData('sales.payment_methods.multisafepay.production');
        $multiSafepaySdk = new \MultiSafepay\Sdk($apiKey, $isProduction);

        $orderId = core()->getConfigData('sales.payment_methods.multisafepay.prefix') . $shipment->order_id;

        try {            
            $updateRequest = new UpdateRequest();
            $updateRequest->addId($orderId);
            $updateRequest->addStatus('shipped');

            $multiSafepaySdk->getTransactionManager()->update($orderId, $updateRequest);
        } catch (\Exception $exception) {
            Log::error("MultiSafepay exception while trying to update the status to shipped for order id: $orderId");
            Log::error($exception);
        }
    }
}
