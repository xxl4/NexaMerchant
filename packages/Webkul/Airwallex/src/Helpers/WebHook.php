<?php
namespace Nicelizhi\Airwallex\Helpers;

use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\OrderItemRepository;
use Webkul\Sales\Repositories\RefundRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class WebHook {

    private $name = null;
    private $data = null;

    public function __construct(
    ) {
    }

    public function init($name, $data){
        $this->name = $name;
        $this->data = $data;
        return $this;
    }

    public function payment_dispute_lost($orderRepository, $refundRepository) {
        $dispute = \Webkul\Sales\Models\OrderDispute::where('dispute_id', $this->data['data']['object']['id'])->first();
        if(is_null($dispute)) $dispute = $dispute = new \Webkul\Sales\Models\OrderDispute();

        $dispute->platform= "airwallex_".$this->data['data']['object']['payment_method_type'];
        $dispute->dispute_id = $this->data['data']['object']['id'];
        $dispute->transaction_id =  $this->data['data']['object']['payment_intent_id'];

        $dispute->status = $this->data['data']['object']['status'];
        $refund_details = []; 
        $refund_details['amount'] = $this->data['data']['object']['amount'];
        $refund_details['currency'] = $this->data['data']['object']['currency'];
        $refund_details['due_at'] = $this->data['data']['object']['due_at'];
        $refund_details['issuer_comment'] = $this->data['data']['object']['issuer_comment'];
        $refund_details['issuer_documents'] = $this->data['data']['object']['issuer_documents'];
        $refund_details['accept_details'] = $this->data['data']['object']['accept_details'];
        $dispute->refund_details = $refund_details;


        $merchant_order_id = str_replace("orderid_","", $this->data['data']['object']['merchant_order_id']);

        $dispute->order_id = $merchant_order_id;
        $dispute->json = json_encode($this->data);
        $dispute->save();

        $order = $orderRepository->findOrFail($merchant_order_id);

        if (! $order->canRefund()) {

            return false;
        }

        $refund = [];
        // 0: not refund money, 1: refund money


       $refundData= [];

       $params = [];

       $order_items = $order->items;

       //var_dump($order_items);

       foreach ($order_items as $order_item) {
           $refundData[$order_item->id] = $order_item->qty_ordered;
       }


       $refund['refund']['items'] =  $refundData;

       $totals = $refundRepository->getOrderItemsRefundSummary([$refund['refund']['items']], $merchant_order_id);
       //$totals = $refundRepository->getOrderItemsRefundSummary([], $merchant_order_id);
       //var_dump($totals);exit;
       //var_dump($totals);exit;

       $refund['refund']['shipping'] = 9.99;
       $refund['refund']['is_refund_money'] = 0;
       $refund['refund']['adjustment_refund'] = 0;
       $refund['refund']['adjustment_fee'] = 0;
       $refund['refund']['custom_refund_amount'] = $this->data['data']['object']['amount'];

       $refund['refund']['comment'] = $this->data['data']['object']['reason']['type'];

       if(!empty($refund['refund']['custom_refund_amount'])) {
           $refundAmount = $totals['grand_total']['price'] - $totals['shipping']['price'] + $refund['refund']['shipping'] + $refund['refund']['adjustment_refund'] - $refund['refund']['adjustment_fee'];
           $refund['refund']['adjustment_fee'] = abs($refund['refund']['custom_refund_amount'] - $refundAmount);
       }

       //var_dump($refund);exit;

       $refundRepository->create(array_merge($refund, ['order_id' => $merchant_order_id]));
    }

    public function payment_dispute_won() {

    }

    /**
     * 
     * You have further challenged the chargeback or pre-arbitration with your response
     * 
     * @return boolean
     */
    public function payment_dispute_challenged() {

        // check this data from the db
        $dispute = \Webkul\Sales\Models\OrderDispute::where('dispute_id', $this->data['data']['object']['id'])->first();
        if(is_null($dispute)) $dispute = $dispute = new \Webkul\Sales\Models\OrderDispute();

        //var_dump($this->data['data']['object']);exit;

        $dispute->platform= "airwallex_".$this->data['data']['object']['payment_method_type'];
        $dispute->dispute_id = $this->data['data']['object']['id'];
        $dispute->transaction_id =  $this->data['data']['object']['payment_intent_id'];
        $dispute->status = $this->data['data']['object']['status'];
        $dispute->disputed_transactions = $this->data['data']['object']['payment_intent_id'];
        $dispute->adjudications = $this->data['data']['object']['reason'];
        $refund_details = []; 
        $refund_details['amount'] = $this->data['data']['object']['amount'];
        $refund_details['currency'] = $this->data['data']['object']['currency'];
        $refund_details['due_at'] = $this->data['data']['object']['due_at'];
        $dispute->refund_details = $refund_details;
        $offer = [];
        $dispute->offer = $offer;
        $dispute->messages = $this->data['data']['object']['challenge_details'];
        $dispute->json = json_encode($this->data);

        $merchant_order_id = str_replace("orderid_","", $this->data['data']['object']['merchant_order_id']);

        $dispute->order_id = $merchant_order_id;
        $dispute->save();

    }

    public function payment_dispute_pending_closure() {

    }

    public function payment_dispute_requires_response() {
        $dispute = \Webkul\Sales\Models\OrderDispute::where('dispute_id', $this->data['data']['object']['id'])->first();
        if(is_null($dispute)) $dispute = $dispute = new \Webkul\Sales\Models\OrderDispute();
        $dispute->platform= "airwallex_".$this->data['data']['object']['payment_method_type'];
        $dispute->dispute_id = $this->data['data']['object']['id'];
        $dispute->transaction_id =  $this->data['data']['object']['payment_intent_id'];

        $dispute->status = $this->data['data']['object']['status'];
        $refund_details = []; 
        $refund_details['amount'] = $this->data['data']['object']['amount'];
        $refund_details['currency'] = $this->data['data']['object']['currency'];
        $refund_details['due_at'] = $this->data['data']['object']['due_at'];
       
        $dispute->refund_details = $refund_details;

        $merchant_order_id = str_replace("orderid_","", $this->data['data']['object']['merchant_order_id']);

        $dispute->order_id = $merchant_order_id;
        $dispute->json = json_encode($this->data);
        $dispute->save();

    }

    // payment_dispute_closed
    public function payment_dispute_reversed($orderRepository, $refundRepository) {
        $dispute = \Webkul\Sales\Models\OrderDispute::where('dispute_id', $this->data['data']['object']['id'])->first();
        if(is_null($dispute)) $dispute = $dispute = new \Webkul\Sales\Models\OrderDispute();

        //update the status
        $dispute->platform= "airwallex_".$this->data['data']['object']['payment_method_type'];
        $dispute->dispute_id = $this->data['data']['object']['id'];
        $dispute->transaction_id =  $this->data['data']['object']['payment_intent_id'];

        $dispute->status = $this->data['data']['object']['status'];
        $refund_details = []; 
        $refund_details['amount'] = $this->data['data']['object']['amount'];
        $refund_details['currency'] = $this->data['data']['object']['currency'];
        $refund_details['due_at'] = $this->data['data']['object']['due_at'];
       
        $dispute->refund_details = $refund_details;

        $merchant_order_id = str_replace("orderid_","", $this->data['data']['object']['merchant_order_id']);

        $dispute->order_id = $merchant_order_id;
        $dispute->json = json_encode($this->data);
        $dispute->save();

    }   


    // payment_dispute_accepted
    public function payment_dispute_accepted($orderRepository, $refundRepository) {
        $dispute = \Webkul\Sales\Models\OrderDispute::where('dispute_id', $this->data['data']['object']['id'])->first();
        if(is_null($dispute)) $dispute = $dispute = new \Webkul\Sales\Models\OrderDispute();

        $dispute->platform= "airwallex_".$this->data['data']['object']['payment_method_type'];
        $dispute->dispute_id = $this->data['data']['object']['id'];
        $dispute->transaction_id =  $this->data['data']['object']['payment_intent_id'];

        $dispute->status = $this->data['data']['object']['status'];
        $refund_details = []; 
        $refund_details['amount'] = $this->data['data']['object']['amount'];
        $refund_details['currency'] = $this->data['data']['object']['currency'];
        $refund_details['due_at'] = $this->data['data']['object']['due_at'];
        $refund_details['issuer_comment'] = $this->data['data']['object']['issuer_comment'];
        $refund_details['issuer_documents'] = $this->data['data']['object']['issuer_documents'];
        $refund_details['accept_details'] = $this->data['data']['object']['accept_details'];
        $dispute->refund_details = $refund_details;


        $merchant_order_id = str_replace("orderid_","", $this->data['data']['object']['merchant_order_id']);

        $dispute->order_id = $merchant_order_id;
        $dispute->json = json_encode($this->data);
        $dispute->save();

        $order = $orderRepository->findOrFail($merchant_order_id);

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

       $totals = $refundRepository->getOrderItemsRefundSummary($refud['refund']['items'], $merchant_order_id);

       //var_dump($totals);exit;

       $refud['refund']['shipping'] = 9.99;
       $refud['refund']['is_refund_money'] = 0;
       $refud['refund']['adjustment_refund'] = 0;
       $refud['refund']['adjustment_fee'] = 0;
       $refud['refund']['custom_refund_amount'] = $this->data['data']['object']['amount'];

       $refud['refund']['comment'] = $this->data['data']['object']['reason']['type'];

       if(!empty($refud['refund']['custom_refund_amount'])) {
           $refundAmount = $totals['grand_total']['price'] - $totals['shipping']['price'] + $refud['refund']['shipping'] + $refud['refund']['adjustment_refund'] - $refud['refund']['adjustment_fee'];
           $refud['refund']['adjustment_fee'] = abs($refud['refund']['custom_refund_amount'] - $refundAmount);
       }

       $refundRepository->create(array_merge($refud, ['order_id' => $merchant_order_id]));
        
    }

}