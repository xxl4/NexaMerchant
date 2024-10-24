<?php
namespace Nicelizhi\Manage\Console\Commands\Paypal;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Webkul\Sales\Repositories\OrderTransactionRepository;
use Webkul\Paypal\Payment\SmartButton;


class PaypalCoverOrderIDToTranslationID extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "manage:paypal:cover:order:to:transactions";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Cover the order id to translation id";

    public function __construct(
        protected OrderTransactionRepository $orderTransactionRepository
    ) {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $order_id = "31K46807LW8164335";

        $smartButton = new SmartButton();

        $captureID = $smartButton->getOrder($order_id);

        var_dump($captureID);

        exit;



        $items = $this->orderTransactionRepository->where('payment_method', "paypal_smart_button")->whereNull('captures_id')->select(['transaction_id','id','order_id'])->get();

        $smartButton = new SmartButton();
            
        foreach($items as $key=>$item) {

            $this->info($item->transaction_id);
            try {
                $captureID = $smartButton->getCaptureId($item->transaction_id);
                $this->error($captureID);

                $this->orderTransactionRepository->update([
                    'captures_id' => $captureID
                ], $item->id);


            }catch(\Exception $e) {
                $this->error($e->getMessage());

                $orderPayment = \Webkul\Sales\Models\OrderPayment::where('method', 'paypal_smart_button')->select(['additional'])->where('order_id', $item->order_id)->first();

                if(!is_null($orderPayment)) {
                    $additional = $orderPayment->additional;
                    if($item->transaction_id!=$additional['orderID']) {

                        $this->orderTransactionRepository->update([
                            'transaction_id' => $additional['orderID']
                        ], $item->id);

                    }
                }
                
                continue;
            }
        }



    }

}