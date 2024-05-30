<?php
namespace Webkul\Paypal\Http\Controllers;

use Webkul\Checkout\Facades\Cart;
use Webkul\Paypal\Payment\SmartButton;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\OrderRepository;
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
        protected InvoiceRepository $invoiceRepository
    ) {
    }

    public function dispute(Request $request) {
        $data = $request->all();

        Log::info("dispute--".json_encode($data));
    }
}