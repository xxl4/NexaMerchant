<?php
namespace Nicelizhi\OneBuy\Console\Commands\Order;

use Exception;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Checkout\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Webkul\Paypal\Payment\SmartButton;
use Webkul\Sales\Repositories\OrderTransactionRepository;

class CartToOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onebuy:carttoorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'onebuy:carttoorder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected CartRepository $cartRepository,
        protected OrderTransactionRepository $orderTransactionRepository,
        protected InvoiceRepository $invoiceRepository
    )
    {
        parent::__construct();
    }

    private $cache_key = "faq";

    private $cart; 

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $cart_id = 0;

        // $this->cart = $this->cartRepository->findOneWhere([
        //     'id'   => $cart_id
        // ]);

        // Cart::setCart($this->cart);

        // //var_dump(Cart::prepareDataForOrder());

        // $order = $this->orderRepository->create(Cart::prepareDataForOrder());

        // Cart::deActivateCart();

        $sql="SELECT o.id,o.status,t.order_id,o.created_at,p.method,p.additional from ba_orders as o left join ba_order_transactions as t on o.id=t.order_id LEFT join ba_order_payment as p on o.id=p.order_id where t.order_id is null and o.status = 'processing' and p.method='paypal_smart_button'";
        $items = DB::select($sql);   

        $smartButton = new SmartButton();

        foreach ($items as $key => $item) {

            $this->info("order ". $item->id);
            
            $order = $this->orderRepository->find($item->id);
            //var_dump($order->invoice, $item);

            $invoice = $this->invoiceRepository->findOneWhere(['order_id' => $item->id]);

            //var_dump($invoice);exit;

            if (empty($invoice)) {
                $invoice = $this->prepareInvoiceData($order);
                //var_dump($invoice);
                //exit;
                $this->invoiceRepository->create($this->prepareInvoiceData($order));
                $invoice = $this->invoiceRepository->findOneWhere(['order_id' => $item->id]);
                //var_dump($res);exit;
            }

            //exit;
            //if($order->can)

            $paymentData = json_decode($item->additional);
            //var_dump($paymentData);exit;
            try {
                $transactionDetails = $smartButton->getOrder($paymentData->orderID);

                //var_dump($transactionDetails);exit;
    
                $transactionDetails = json_decode(json_encode($transactionDetails), true);
            }catch(Exception $e) {
                var_dump($e->getMessage());
                continue;
            }
            

            if ($transactionDetails['statusCode'] == 200) {
                $this->orderTransactionRepository->create([
                    'transaction_id' => $transactionDetails['result']['id'],
                    'status'         => $transactionDetails['result']['status'],
                    'type'           => $transactionDetails['result']['intent'],
                    'amount'         => $transactionDetails['result']['purchase_units'][0]['amount']['value'],
                    'payment_method' => $invoice->order->payment->method,
                    'order_id'       => $invoice->order->id,
                    'invoice_id'     => $invoice->id,
                    'data'           => json_encode(
                        array_merge(
                            $transactionDetails['result']['purchase_units'],
                            $transactionDetails['result']['payer']
                        )
                    ),
                ]);
            }

            sleep(1);

        }
        
    }

    protected function prepareInvoiceData($order)
    {
        $invoiceData = ['order_id' => $order->id];

        foreach ($order->items as $item) {
            $invoiceData['invoice']['items'][$item->id] = $item->qty_to_invoice;
        }

        return $invoiceData;
    }

    
}