<?php
namespace Nicelizhi\OneBuy\Console\Commands\Paypal;

use Exception;

use Illuminate\Console\Command;
use Webkul\Checkout\Facades\Cart;
use Webkul\Checkout\Models\CartProxy;
use Webkul\Sales\Models\OrderProxy;
use Webkul\Paypal\Payment\SmartButton;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;

class OrderSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'onebuy:paypal:order:search {--trans_id=} {--cart_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'paypal order onebuy:paypal:order:search {--trans_id=} {--cart_id=}';

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
    ){
        parent::__construct();
    }

    private $cache_key = "faq";

    private $cart;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        $this->info('Search order');

        // GET Paypal Order ID
        $trans_id = $this->option('trans_id');
        $cart_id = $this->option('cart_id');
        if(empty($trans_id)){
            $this->error('Order ID is required');
            return;
        }

        $this->info('Order ID: ' . $trans_id);

        $smartButton = new SmartButton();
        $order_id = $smartButton->getOrderIdByTransactionId($trans_id);

        // check order id exist
        $trans_detail = $this->orderTransactionRepository->findOneWhere(['captures_id' => $trans_id]);

        if($trans_detail){
            $this->error('Order already exist');
            return;
        }


        $order = $smartButton->getOrder($order_id);

        if(!$order){
            $this->error('Order not found');
            return;
        }

        // cover order to array
        $transactionDetails = json_decode(json_encode($order), true);

        //var_dump($order);

        // base use paypal email to search cart order
        $carts = CartProxy::where('customer_email', $transactionDetails['result']['payer']['email_address'])->where("grand_total", $transactionDetails['result']['purchase_units'][0]['amount']['value'])->get();

        $cart = null;
        //
        foreach($carts as $c){
            $this->info('Cart ID: ' . $c->id);
            $local_order = OrderProxy::where('cart_id', $c->id)->first();
            if($local_order){
                $this->info('Order ID: ' . $local_order->id);
                continue;
            }
            $cart  = $c;
        }

        if($cart_id) {
            var_dump($transactionDetails['result']['purchase_units'][0]['amount']['value']);
            $cart = CartProxy::where('id', $cart_id)->where("grand_total", $transactionDetails['result']['purchase_units'][0]['amount']['value'])->first();
        }

        //var_dump($cart);

        //exit;

        // var_dump($cart->order_id);

        // exit;

        // check this cart have
        if(!$cart){
            $this->error('Cart not found');
            return;
        }

        //var_dump($cart->order_id);

        // check this cart have order
        $local_order = OrderProxy::where('cart_id', $cart->id)->first();

        if($local_order){
            $this->error('Order already exist');
            return;
        }

        $this->info('Cart ID: ' . $cart->id);

        $this->cart = $this->cartRepository->findOneWhere([
                'id'   =>  $cart->id
        ]);

        Cart::setCart($this->cart);
        Cart::activateCart($cart->id);

        //var_dump(Cart::prepareDataForOrder());

        $local_order = $this->orderRepository->create(Cart::prepareDataForOrder());

        $invoice = $this->invoiceRepository->findOneWhere(['order_id' => $local_order->id]);

        if (empty($invoice)) {
            $invoice = $this->prepareInvoiceData($local_order);
            $this->invoiceRepository->create($this->prepareInvoiceData($local_order));
            $invoice = $this->invoiceRepository->findOneWhere(['order_id' => $local_order->id]);
        }

        $paypal_vault = [];
        $paypal_vault['vault'] = null;
        if(isset($transactionDetails['result']['payment_source']['paypal']['attributes']['vault'])) {
            $paypal_vault['vault'] = $transactionDetails['result']['payment_source']['paypal']['attributes']['vault'];
        }

        if ($transactionDetails['statusCode'] == 200 && $transactionDetails['result']['status'] == 'COMPLETED') {
            $this->orderTransactionRepository->create([
                'transaction_id' => $transactionDetails['result']['id'],
                'captures_id'    => isset($transactionDetails['result']['purchase_units'][0]['payments']['captures'][0]['id']) ? $transactionDetails['result']['purchase_units'][0]['payments']['captures'][0]['id'] : null,
                'status'         => $transactionDetails['result']['status'],
                'type'           => $transactionDetails['result']['intent'],
                'amount'         => $transactionDetails['result']['purchase_units'][0]['amount']['value'],
                'payment_method' => $invoice->order->payment->method,
                'order_id'       => $invoice->order->id,
                'invoice_id'     => $invoice->id,
                'data'           => json_encode(
                    array_merge(
                        $transactionDetails['result']['purchase_units'],
                        $transactionDetails['result']['payer'],
                        $paypal_vault
                    )
                ),
            ]);
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