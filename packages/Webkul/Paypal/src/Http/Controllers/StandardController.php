<?php

namespace Webkul\Paypal\Http\Controllers;

use Webkul\Paypal\Helpers\Ipn;
use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;
use Illuminate\Support\Facades\Log;

class StandardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Paypal\Helpers\Ipn  $ipnHelper
     * @return void
     */
    public function __construct(
        protected OrderRepository $orderRepository,
        protected Ipn $ipnHelper
    )
    {
    }

    /**
     * Redirects to the paypal.
     *
     * @return \Illuminate\View\View
     */
    public function redirect()
    {
        return view('paypal::standard-redirect');
    }

    /**
     * Cancel payment from paypal.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        session()->flash('error', trans('shop::app.checkout.cart.paypal-payment-canceled'));

        return redirect()->route('shop.checkout.cart.index');
    }

    /**
     * Success payment.
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        $order = $this->orderRepository->create(Cart::prepareDataForOrder());

        Cart::deActivateCart();

        session()->flash('order', $order);

        return redirect()->route("checkout.v1.product.success", $order->id);

        return redirect()->route('shop.checkout.onepage.success');
    }

    /**
     * Paypal IPN listener.
     *
     * @return \Illuminate\Http\Response
     */
    public function ipn()
    {
        Log::info('paypal st ipn--'.json_encode(request()->all())); 

        $this->ipnHelper->processIpn(request()->all());
    }
}