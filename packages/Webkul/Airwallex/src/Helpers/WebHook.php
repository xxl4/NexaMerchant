<?php
namespace Nicelizhi\Airwallex\Helpers;


class WebHook {

    private $name = null;
    private $data = null;

    public function __construct() {
    }

    public function init($name, $data){
        $this->name = $name;
        $this->data = $data;
        return $this;
    }

    public function payment_dispute_lost() {
        
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
        $dispute = \Webkul\Sales\Models\OrderDispute::where('dispute_id', $this->data['id'])->first();
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
        $dispute->save();

    }

    public function payment_dispute_pending_closure() {

    }

    public function payment_dispute_requires_response() {

    }

    public function payment_dispute_reversed() {

    }   

    public function payment_dispute_accepted() {

    }

}