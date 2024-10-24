<?php

namespace Nicelizhi\Airwallex\Controllers;

use Nicelizhi\Airwallex\Payment\Airwallex;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Webkul\Sales\Repositories\RefundRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;
use Illuminate\Support\Facades\Artisan;
use Nicelizhi\Shopify\Console\Commands\Order\Post;  
use Nicelizhi\Airwallex\Helpers\WebHook;


class AirwallexController extends Controller
{

    /**
     * apiKey object
     *
     * @var object
     */
    private $apiKey;

    /**
     * Production object
     *
     * @var object
     */
    private $productionMode;


    /**
     * Order object
     *
     * @var object
     */
    protected $order;



    /**
     * Create a new controller instance.
     *
     * @param \Webkul\Sales\Repositories\InvoiceRepository $invoiceRepository
     * @param \Webkul\Sales\Repositories\OrderRepository $orderRepository
     * @param \Webkul\Sales\Repositories\OrderTransactionRepository $orderTransactionRepository
     */
    public function __construct(
        protected InvoiceRepository $invoiceRepository,
        protected OrderRepository $orderRepository,
        protected OrderTransactionRepository $orderTransactionRepository,
        protected WebHook $webhookhelp,
        protected RefundRepository $refundRepository,
        protected Airwallex $airwallex
    ) {
    }

    /**
     * Handle airwallex webhook notifications.
     *
     * @param Request $request The HTTP request object.
     * @return \Illuminate\Http\Response
     * @link https://www.airwallex.com/docs/developer-tools__listen-for-webhook-events__code-examples
     */
    public function webhook(Request $request)
    {
        Log::info(json_encode($request->all())); // log body
        $input = $request->all();
        // order webhook
        if (isset($input['data']['object']['merchant_order_id'])) {

            // get order platform from metadata
            $platform = isset($input['data']['object']['metadata']['platform']) ? $input['data']['object']['metadata']['platform'] : null;

            if ($platform == 'SHOPIFY') {
                return response('shopify', 200);
            }


            $orderId = $input['data']['object']['merchant_order_id'];

            $transactionId = str_replace("orderid_", "", $orderId);

            $order = $this->orderRepository->find($transactionId);

            $this->order = $order;

            if ($order) {
                Log::info("airwallex notification received for order id:" . $transactionId);    
                $status = $input['data']['object']['status'];
                if ($status === 'SUCCEEDED' && $input['name']==='payment_intent.succeeded') {

                    if($order->status!=='pending') {
                        return response('Order already processed', 200);
                    }

                   // $amount = $transactionData->data->object->amount;
                    $amount = round($input['data']['object']['amount'] * 100);
                    $orderAmount = round($order->grand_total * 100);

                    $amount_sub = substr($amount, 0, 3);
                    $orderAmount_sub = substr($orderAmount, 0, 3);

                    //var_dump($amount, $orderAmount);
                    if ($amount_sub === $orderAmount_sub) { // check if the amount is matched
                        if ($order->status === 'pending') {
                            $order->status = 'processing';
                            $order->save();
                        }

                        // send order to shopify
                        Artisan::queue((new Post())->getName(), ['--order_id'=> $order->id])->onConnection('redis')->onQueue('commands');

                        if ($order->canInvoice()) {
                            request()->merge(['can_create_transaction' => 1]);
                            
                            $this->invoiceRepository->create($this->prepareInvoiceData());
                        } else {
                            $invoice = $this->invoiceRepository->findOneWhere(['order_id' => $order->id]);
    
                            if ($invoice) {
                                $invoice->state = 'paid';
                                $invoice->save();
                            }
                        }

                        $invoice = $this->invoiceRepository->findOneWhere(['order_id' => $order->id]);
                        //insert into order payment traces

                        $this->orderTransactionRepository->create([
                            'transaction_id' => $input['data']['object']['id'],
                            'status'         => $input['data']['object']['status'],
                            'type'           => $input['name'],
                            'amount'         => $input['data']['object']['amount'],
                            'payment_method' => $invoice->order->payment->method,
                            'order_id'       => $order->id,
                            'invoice_id'     => $invoice->id,
                            'captures_id'    => $input['data']['object']['id'],
                            'data'           => json_encode(
                                $input
                            ),
                        ]);

                    }else{
                        Log::info("airwallex notification received for order id:" . $transactionId . " amount not matched");

                        //send message to wecome
                        \Nicelizhi\Shopify\Helpers\Utils::send(config("app.name").' '.$transactionId. " order the price is not match, please check it ");

                        return response("Order not found ".$amount."---".$orderAmount, 400);
                    }
                } else {
                    $this->webhookProcess($input['name'], $input); // process other webhook events
                }
                
                return response('OK', 200);
            } else {

                Log::info("airwallex notification received for object ".$input['name']." webhook id:" . $input['data']['object']['id']);

                return response('Order not found', 200);
            }
        } else if (isset($input['data']['object']['id'])) {
            // other webhook

            Log::info("airwallex notification received for object ".$input['name']." webhook id:" . $input['data']['object']['id']);

            return response('OK', 200);
        }else if(isset($input['data']['id'])) {
            // other webhook

            Log::info("airwallex notification received for data ".$input['name']." webhook id:" . $input['data']['id']);

            return response('OK', 200);
        }else {
            return response('Invalid notification', 400);
        }
    }

    /**
     * Prepares order's invoice data for creation.
     *
     * @return array
     */
    protected function prepareInvoiceData()
    {
        $invoiceData = ['order_id' => $this->order->id];

        foreach ($this->order->items as $item) {
            $invoiceData['invoice']['items'][$item->id] = $item->qty_to_invoice;
        }

        return $invoiceData;
    }

    public function paymentSuccess(Request $request) {
        Log::info("airwallex payment success". json_encode($request->all()));
        $awx_return_result = $request->input("awx_return_result");
        if($awx_return_result=='success') {
            return view("airwallex::payment-success");
        }
        return view("airwallex::payment-success");
    }

    public function showPaymentMethods()
    {
        $data = collect($this->airwallex->getAvailablePaymentMethods());

        return response()->json($data);
    }


    protected function webhookProcess($name, $data)
    {
        //$webhookhelp = new \Webkul\Airwallex\Helpers\Webhook($name, $data);
        $webhookhelp = $this->webhookhelp->init($name, $data);

        switch ($name) {
            case 'payment_intent.created':
                // Handle payment_intent.created
                break;
            case 'payment_intent.succeeded':
                // Handle payment_intent.succeeded
                break;
            case 'payment_intent.failed':
                // Handle payment_intent.failed
                break;
            case 'payment_intent.canceled':
                // Handle payment_intent.canceled
                break;
            case 'payment_intent.authorized':
                // Handle payment_intent.authorized
                break;
            case 'payment_intent.capture.succeeded':
                // Handle payment_intent.capture.succeeded
                break;
            case 'payment_intent.capture.failed':
                // Handle payment_intent.capture.failed
                break;
            case 'payment_intent.capture.canceled':
                // Handle payment_intent.capture.canceled
                break;
            case 'payment_intent.capture.created':
                // Handle payment_intent.capture.created
                break;
            case 'payment_intent.capture.pending':
                // Handle payment_intent.capture.pending
                break;
            case 'payment_intent.capture.processing':
                // Handle payment_intent.capture.processing
                break;
            case 'payment_intent.capture.requires_confirmation':
                // Handle payment_intent.capture.requires_confirmation
                break;
            case 'payment_intent.capture.requires_action':
                // Handle payment_intent.capture.requires_action
                break;
            case 'payment_intent.capture.canceled':
                // Handle payment_intent.capture.canceled
                break;
            case 'payment_dispute.challenged': // You have received a pre-chargeback / chargeback request which needs your response.
                $webhookhelp->payment_dispute_challenged();
                break;
            case 'payment_dispute.pending_closure': // You have received a Pre-arbitration request from the Issuing bank. Airwallex auto-accepts pre-arbitration requests on behalf of you.
                $webhookhelp->payment_dispute_pending_closure();
                break;
            case 'payment_dispute.requires_response': //You have further challenged the chargeback or pre-arbitration with your response
                $webhookhelp->payment_dispute_requires_response();
                break;
            case 'payment_dispute.accepted': // You have accepted the Pre-chargeback / chargeback / Pre-arbitration request
                $webhookhelp->payment_dispute_accepted($this->orderRepository, $this->refundRepository);
                break;
            case 'payment_dispute.reversed': // Issuing bank has reversed the dispute event, you do not have to respond to the dispute event anymore.
                $webhookhelp->payment_dispute_reversed($this->orderRepository, $this->refundRepository);
                break;
            case 'payment_dispute.won': //You have won the chargeback / Pre-arbitration, no further action needed from your side.
                $webhookhelp->payment_dispute_won();
                break;
            case 'payment_dispute.lost': //You have lost the chargeback / Pre-arbitration, no further action needed from your side.
                $webhookhelp->payment_dispute_lost($this->orderRepository, $this->refundRepository);
                break;
        }
    }

}