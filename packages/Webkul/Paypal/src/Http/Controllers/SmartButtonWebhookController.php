<?php
namespace Webkul\Paypal\Http\Controllers;

use Webkul\Checkout\Facades\Cart;
use Webkul\Paypal\Payment\SmartButton;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\RefundRepository;
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
        protected OrderItemRepository $orderItemRepository,
        protected RefundRepository $refundRepository,
        protected InvoiceRepository $invoiceRepository
    ) {
    }

    public function checkoutOrders(Request $request)
    {
        $result = $this->smartButton->createOrder($request->all());


        Log::info("checkoutOrders--".json_encode($request->all()));

        var_dump($result);
    }

    public function checkoutOrderscapture($order_id, Request $request)
    {
        $result = $this->smartButton->captureOrder($order_id);

        Log::info("checkoutOrderscapture--".json_encode($request->all()));

        var_dump($result);
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
        $dispute->json = json_encode($data);
        // check the order id
        $order_id = 0;
        $orderTransaction = $this->orderTransactionRepository->findOneWhere(['captures_id' => $dispute->transaction_id]);
        if(!is_null($orderTransaction)) {
            $order_id = $orderTransaction->order_id;
        }

        //$order_id = 153;

        $dispute->order_id = $order_id;
        $dispute->save();

        if($dispute->status=='RESOLVED' && !empty($order_id)) {

            if($data['resource']['dispute_outcome']['outcome_code']!='RESOLVED_BUYER_FAVOUR') return false; 
            // create a refund
            //check the order can refund
            $order = $this->orderRepository->findOrFail($order_id);
            if (! $order->canRefund()) {

                return false;
            }
            

            $refud = [];
             // 0: not refund money, 1: refund money


            $refundData= [];

            $params = [];

            $order_items = $order->items;

            //var_dump($order_items);



            foreach ($order_items as $order_item) {
                $refundData[$order_item->id] = $order_item->qty_ordered;
            }

            

            $refud['refund']['items'] =  $refundData;

            $totals = $this->refundRepository->getOrderItemsRefundSummary($refud['refund']['items'], $order_id);

            //var_dump($totals);exit;

            $refud['refund']['shipping'] = 9.99;
            $refud['refund']['is_refund_money'] = 0;
            $refud['refund']['adjustment_refund'] = 0;
            $refud['refund']['adjustment_fee'] = 0;
            $refud['refund']['custom_refund_amount'] = $data['resource']['refund_details']['allowed_refund_amount']['value'];

            $refud['refund']['comment'] = $data['resource']['reason'];

            if(!empty($refud['refund']['custom_refund_amount'])) {
                $refundAmount = $totals['grand_total']['price'] - $totals['shipping']['price'] + $refud['refund']['shipping'] + $refud['refund']['adjustment_refund'] - $refud['refund']['adjustment_fee'];
                $refud['refund']['adjustment_fee'] = abs($refud['refund']['custom_refund_amount'] - $refundAmount);
            }

            
            //var_dump($refud);exit;
            




            $this->refundRepository->create(array_merge($refud, ['order_id' => $order_id]));

        }

        if($dispute->status=='UNDER_REVIEW' && !empty($order_id)) {

            if(!isset($data['resource']['adjudications'][0]['type'])) {
                //var_dump($data['resource']['adjudications'][0]['type']);
                return false;
            }
            if($data['resource']['adjudications'][0]['type']!='RECOVER_FROM_SELLER') {
                var_dump($data['resource']['adjudications'][0]['type']);
                return false;
            }

            $order = $this->orderRepository->findOrFail($order_id);
            //var_dump($order);
            // if (! $order->canRefund()) {
            //     var_dump("can not refund");
            //     return false;
            // }


            $refud = [];
            // 0: not refund money, 1: refund money


           $refundData= [];

           $params = [];

           $order_items = $order->items;

           //var_dump($order_items);



           foreach ($order_items as $order_item) {
               $refundData[$order_item->id] = $order_item->qty_ordered;
           }

           

           $refud['refund']['items'] =  $refundData;

           $totals = $this->refundRepository->getOrderItemsRefundSummary($refud['refund']['items'], $order_id);

           $refund_total = 0.00;
           foreach($data['resource']['money_movements'] as $money_movement) {
                if($money_movement['affected_party']=='SELLER')
               $refund_total += $money_movement['amount']['value'];
           }

           //var_dump($totals);exit;

           $refud['refund']['shipping'] = 9.99;
           $refud['refund']['is_refund_money'] = 0;
           $refud['refund']['adjustment_refund'] = 0;
           $refud['refund']['adjustment_fee'] = 0;
           $refud['refund']['custom_refund_amount'] = '0.00';

           $refud['refund']['comment'] = $data['resource']['reason']."-UNDER_REVIEW-". $refund_total;

           if(!empty($refud['refund']['custom_refund_amount'])) {
               $refundAmount = $totals['grand_total']['price'] - $totals['shipping']['price'] + $refud['refund']['shipping'] + $refud['refund']['adjustment_refund'] - $refud['refund']['adjustment_fee'];
               $refud['refund']['adjustment_fee'] = abs($refud['refund']['custom_refund_amount'] - $refundAmount);
           }

           
           //var_dump($refud);exit;
           




           $this->refundRepository->create(array_merge($refud, ['order_id' => $order_id]));


        }

        echo "success";
    }

    /**
     * 
     * 
     * 
     */
    public function invoicing(Request $request) {

    }
    /**
     *  Payment Subscriptions info
     * 
     * 
     */
    public function subscriptions(Request $request) {

    }
}