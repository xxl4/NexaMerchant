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

        $items = $this->orderTransactionRepository->where('payment_method', "paypal_smart_button")->select(['transaction_id','id'])->get();

        $smartButton = new SmartButton();
            
        foreach($items as $key=>$item) {

            $this->info($item->transaction_id);
            try {
                $captureID = $smartButton->getCaptureId($item->transaction_id);
                $this->error($captureID);

                $this->orderTransactionRepository->update([
                    'transaction_id' => $captureID
                ], $item->id);


            }catch(\Exception $e) {
                $this->error($e->getMessage());
                continue;
            }
        }



    }

}