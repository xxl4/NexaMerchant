<?php

namespace Nicelizhi\Airwallex\Controllers;

use Nicelizhi\Airwallex\Payment\Airwallex;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;


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
     * airwallex object
     *
     * @var object
     */
    protected $airwallex;


    /**
     * Order repository instance.
     *
     * @var \Webkul\Sales\Repositories\OrderRepository
     */
    protected $orderRepository;

    /**
     * Order transaction repository instance.
     *
     * @var \Webkul\Sales\Repositories\OrderTransactionRepository
     */
    protected $orderTransactionRepository;

    /**
     * InvoiceRepository object
     *
     * @var \Webkul\Sales\Repositories\InvoiceRepository
     */
    protected $invoiceRepository;

    /**
     * Create a new controller instance.
     *
     * @param \Webkul\Sales\Repositories\InvoiceRepository $invoiceRepository
     * @param \Webkul\Sales\Repositories\OrderRepository $orderRepository
     * @param \Webkul\Sales\Repositories\OrderTransactionRepository $orderTransactionRepository
     */
    public function __construct(
        InvoiceRepository $invoiceRepository,
        OrderRepository $orderRepository,
        Airwallex $airwallex
    ) {
        $this->invoiceRepository = $invoiceRepository;
        $this->orderRepository = $orderRepository;
        $this->airwallex = $airwallex;

        $this->apiKey  = core()->getConfigData('sales.payment_methods.airwallex.apikey');
        $this->productionMode = core()->getConfigData('sales.payment_methods.airwallex.production');
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
        //Log::info("Log Header ");
        //Log::info(json_encode($request->headers->all())); // log header
        //var_dump($request->all());
        $input = $request->all();
        //var_dump($input['data']['object']['merchant_order_id']);exit;
        if (isset($input['data']['object']['merchant_order_id'])) {
            $orderId = $input['data']['object']['merchant_order_id'];


            $transactionId = str_replace("orderid_", "", $orderId);

            $order = $this->orderRepository->find($transactionId);

            if ($order) {
                Log::info("airwallex notification received for order id:" . $transactionId);

                //$transactionData = $this->airwallex->getPaymentStatusForOrder($orderId);
                                
                $status = $input['data']['object']['status'];
                
                if ($status === 'SUCCEEDED') {
                   // $amount = $transactionData->data->object->amount;
                    $amount = $input['data']['object']['amount'] * 100;
                    $orderAmount = round($order->base_grand_total * 100);

                    //var_dump($amount, $orderAmount);exit;

                    if ($amount === $orderAmount) { // 核对价格是否一样的情况。
                        if ($order->status === 'pending') {
                            $order->status = 'processing';
                            $order->save();
                        }

                        Log::info(json_encode("order can invoice". json_encode($order)));

                        Log::info("order invoice can". json_encode($order->canInvoice()));

                        //var_dump($order->canInvoice()); exit;

                        if ($order->canInvoice()) {
                            request()->merge(['can_create_transaction' => 1]);
                            
                            $this->invoiceRepository->create($this->prepareInvoiceData($order));
                        } else {
                            $invoice = $this->invoiceRepository->findOneWhere(['order_id' => $order->id]);
    
                            if ($invoice) {
                                $invoice->state = 'paid';
                                $invoice->save();
                            }
                        }

                    }
                } else {
                    /*
                    if ($order->canInvoice()) {
                        request()->merge(['can_create_transaction' => 1]);

                        $orderStatus = $order->status !== 'pending' ? $order->status : 'pending';
                        
                        $this->invoiceRepository->create($this->prepareInvoiceData($order), 'pending', $orderStatus);
                    }*/
                }
                
                return response('OK', 200);
            } else {
                return response('Order not found', 400);
            }
        } else {
            return response('Invalid notification', 400);
        }
    }

    public function paymentSuccess(Request $request) {
        Log::info(json_encode("airwallex payment success". $request->all()));
    }

    /**
     * Prepares invoice data
     *
     * @return array
     */
    public function prepareInvoiceData($order)
    {
        $invoiceData = [
            "order_id" => $order->id
        ];

        foreach ($order->items as $item) {
            $invoiceData['invoice']['items'][$item->id] = $item->qty_to_invoice;
        }

        return $invoiceData;
    }

    public function showPaymentMethods()
    {
        $data = collect($this->airwallex->getAvailablePaymentMethods());

        return response()->json($data);
    }
}
