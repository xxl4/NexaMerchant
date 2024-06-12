<?php
namespace Webkul\Paypal\Http\Controllers;

use Webkul\Checkout\Facades\Cart;
use Webkul\Paypal\Payment\SmartButton;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SmartButtonWebhookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected SmartButton $smartButton,
        protected OrderRepository $orderRepository,
        protected OrderTransactionRepository $orderTransactionRepository,
        protected InvoiceRepository $invoiceRepository
    ) {
    }

    public function dispute(Request $request) {
        Log::info("dispute--".json_encode($request->all()));
        $data = $request->all();

        //var_dump($data);

        $dispute = \Webkul\Sales\Models\OrderDispute::where('dispute_id', $data['resource']['dispute_id'])->first();
        if(is_null($dispute)) $dispute = new \Webkul\Sales\Models\OrderDispute();
        $dispute->platform= "paypal";
        $dispute->dispute_id = $data['resource']['dispute_id'];
        $dispute->transaction_id = $data['resource']['disputed_transactions'][0]['seller_transaction_id'];
        $dispute->status = $data['resource']['status'];
        $dispute->disputed_transactions = $data['resource']['disputed_transactions'];
        $dispute->adjudications = $data['resource']['disputed_transactions'];
        $dispute->refund_details = $data['resource']['refund_details'];
        $dispute->offer = $data['resource']['offer'];
        $dispute->messages = isset($data['resource']['messages']) ?  $data['resource']['messages'] : NULL;

        // check the order id
        $order_id = 0;
        $orderTransaction = $this->orderTransactionRepository->findOneWhere(['captures_id' => $dispute->transaction_id]);
        if(!is_null($orderTransaction)) {
            $order_id = $orderTransaction->order_id;
        }

        $dispute->order_id = $order_id;

        //var_dump($dispute);exit;

        $dispute->save();

        //var_dump($dispute);



        //Log::info("dispute--".json_encode($data));
    }
}