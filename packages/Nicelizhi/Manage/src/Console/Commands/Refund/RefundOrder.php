<?php
namespace Nicelizhi\Manage\Console\Commands\Refund;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Repositories\RefundRepository;


class RefundOrder extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'manage:refund:order {refund_id}';

    protected $refund_id;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refund the order';

    public function __construct(
        protected RefundRepository $refundRepository
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->refund_id = $this->argument("refund_id");
        $this->info("refund id ". $this->refund_id );
        $refund = $this->refundRepository->findOrFail($this->refund_id);

        $refundEvent = new \Nicelizhi\Manage\Listeners\Refund();
        
        $refundEvent->refundOrder($refund);
    }
}