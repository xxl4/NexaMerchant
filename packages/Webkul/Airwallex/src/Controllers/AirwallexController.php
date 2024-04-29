<?php

namespace Nicelizhi\Airwallex\Controllers;

use Nicelizhi\Airwallex\Payment\Airwallex;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;
use Illuminate\Support\Facades\Artisan;
use Nicelizhi\Shopify\Console\Commands\Order\Post;


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
        // Log::info(json_encode($request->all())); // log body
        $input = $request->all();
        if (isset($input['data']['object']['merchant_order_id'])) {
            $orderId = $input['data']['object']['merchant_order_id'];

            $transactionId = str_replace("orderid_", "", $orderId);

            $order = $this->orderRepository->find($transactionId);

            $this->order = $order;

            if ($order) {
                Log::info("airwallex notification received for order id:" . $transactionId);

                                
                $status = $input['data']['object']['status'];
                
                if ($status === 'SUCCEEDED') {
                   // $amount = $transactionData->data->object->amount;
                    $amount = $input['data']['object']['amount'] * 100;
                    $orderAmount = round($order->base_grand_total * 100);



                    if ($amount === $orderAmount) { // 核对价格是否一样的情况。
                        if ($order->status === 'pending') {
                            $order->status = 'processing';
                            $order->save();
                        }

                        // send order to shopify
                        Artisan::queue((new Post())->getName(), ['--order_id'=> $order->id])->onConnection('redis')->onQueue('commands');

                        // Log::info(json_encode("order can invoice". json_encode($order)));

                        // Log::info("order invoice can". json_encode($order->canInvoice()));

                        //var_dump($order->canInvoice()); exit;

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

                        // Log::info("orderTransactionRepository ".json_encode([
                        //     'transaction_id' => $input['data']['object']['id'],
                        //     'status'         => $input['data']['object']['status'],
                        //     'type'           => $input['name'],
                        //     'amount'         => $input['data']['object']['amount'],
                        //     'payment_method' => $invoice->order->payment->method,
                        //     'order_id'       => $order->id,
                        //     'invoice_id'     => $invoice->id,
                        //     'data'           => json_encode(
                        //         $input
                        //     ),
                        // ]));

                        $this->orderTransactionRepository->create([
                            'transaction_id' => $input['data']['object']['id'],
                            'status'         => $input['data']['object']['status'],
                            'type'           => $input['name'],
                            'amount'         => $input['data']['object']['amount'],
                            'payment_method' => $invoice->order->payment->method,
                            'order_id'       => $order->id,
                            'invoice_id'     => $invoice->id,
                            'data'           => json_encode(
                                $input
                            ),
                        ]);

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
}
