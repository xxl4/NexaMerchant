<?php
namespace Nicelizhi\OneBuy\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Category\Repositories\CategoryRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Repositories\ThemeCustomizationRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Attribute\Repositories\AttributeOptionRepository;
use Webkul\Checkout\Facades\Cart;
use Webkul\Shop\Http\Resources\CartResource;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Shop\Http\Resources\ProductResource;
use Webkul\Paypal\Payment\SmartButton;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Product\Helpers\View;
use Nicelizhi\Airwallex\Payment\Airwallex;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Webkul\Payment\Facades\Payment;
use Illuminate\Support\Facades\Redis;
use Webkul\CMS\Repositories\CmsRepository;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Illuminate\Http\Response;
use Webkul\CartRule\Repositories\CartRuleRepository;


class ApiController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\OrderRepository  $orderRepository
     * @param  \Webkul\Paypal\Helpers\Ipn  $ipnHelper
     * @return void
     */
    public function __construct(
        protected SmartButton $smartButton,
        protected CategoryRepository $categoryRepository,
        protected ProductRepository $productRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected AttributeRepository $attributeRepository,
        protected OrderRepository $orderRepository,
        protected InvoiceRepository $invoiceRepository,
        protected Airwallex $airwallex,
        protected CmsRepository $cmsRepository,
        protected CartRuleCouponRepository $cartRuleCouponRepository,
        protected CartRuleRepository $cartRuleRepository,
        protected ThemeCustomizationRepository $themeCustomizationRepository
    )
    {
        
    }

    /**
     * Create a order from cart
     *
     * @return void
     */
    public function OrderAddSync(Request $request) {
        //var_dump($request->all());

        $payment_method = $request->input('payment_method');

        $input = $request->all();

        //$refer = $request->session()->get('refer');
        //Log::info("refer checkout v1 ".$refer);
        $refer = isset($input['refer']) ? trim($input['refer']) : "";

        $products = $request->input("products");
        // 添加到购物车
        Cart::deActivateCart();
        foreach($products as $key=>$product) {
            //var_dump($product);
            $product['quantity'] = $product['amount'];
            $product['selected_configurable_option'] = $product['variant_id'];
            if(!empty($product['attr_id'])) {
                $attr_ids = explode(',', $product['attr_id']);
                foreach($attr_ids as $key=>$attr_id) {
                    $attr = explode('_', $attr_id);
                    $super_attribute[$attr[0]] = $attr[1];
                }

                $product['super_attribute'] = $super_attribute;
            }
            //Log::info("add product into cart ". json_encode($product));
            $cart = Cart::addProduct($product['product_id'], $product);

            if (
                is_array($cart)
                && isset($cart['warning'])
            ) {
                return new JsonResource([
                    'message' => $cart['warning'],
                ]);
            }

        }
        // 添加地址内容
        $addressData = [];


        $addressData['billing'] = [];
        $address1 = [];
        array_push($address1, $input['address']);
        $addressData['billing']['city'] = $input['city'];
        $addressData['billing']['country'] = $input['country'];
        $addressData['billing']['email'] = $input['email'];
        $addressData['billing']['first_name'] = $input['first_name'];
        $addressData['billing']['last_name'] = $input['second_name'];
        $input['phone_full'] = str_replace('undefined+','', $input['phone_full']);
        $addressData['billing']['phone'] = $input['phone_full'];
        $addressData['billing']['postcode'] = $input['code'];
        $addressData['billing']['state'] = $input['province'];
        $addressData['billing']['use_for_shipping'] = true;
        $addressData['billing']['address1'] = $address1;

        $addressData['billing']['address1'] = implode(PHP_EOL, $addressData['billing']['address1']);

        $shipping = [];
        $address1 = [];
        array_push($address1, $input['address']);
        $shipping['city'] = $input['city'];
        $shipping['country'] = $input['country'];
        $shipping['email'] = $input['email'];
        $shipping['first_name'] = $input['first_name'];
        $shipping['last_name'] = $input['second_name'];
        //undefined+
        $input['phone_full'] = str_replace('undefined+','', $input['phone_full']);
        $shipping['phone'] = $input['phone_full'];
        $shipping['postcode'] = $input['code'];
        $shipping['state'] = $input['province'];
        $shipping['use_for_shipping'] = true;
        $shipping['address1'] = $address1;
        $shipping['address1'] = implode(PHP_EOL, $shipping['address1']);


        $addressData['shipping'] = $shipping;
        $addressData['shipping']['isSaved'] = false;
        $address1 = [];
        array_push($address1, $input['address']);
        $addressData['shipping']['address1'] = $address1;
        $addressData['shipping']['address1'] = implode(PHP_EOL, $addressData['shipping']['address1']);

        // customer bill address info
        if(@$input['shipping_address']=="other") {
            $address1 = [];
            array_push($address1, $input['bill_address']);
            $billing = [];
            $billing['city'] = $input['bill_city'];
            $billing['country'] = $input['bill_country'];
            $billing['email'] = $input['email'];
            $billing['first_name'] = $input['bill_first_name'];
            $billing['last_name'] = $input['bill_second_name'];
            //undefined+
            $input['phone_full'] = str_replace('undefined+','', $input['phone_full']);
            $billing['phone'] = $input['phone_full'];
            $billing['postcode'] = $input['bill_code'];
            $billing['state'] = $input['bill_province'];
            //$billing['use_for_shipping'] = true;
            $billing['address1'] = $address1;
            $billing['address1'] = implode(PHP_EOL, $billing['address1']);

        // $billing['address1'] = implode(PHP_EOL, $billing['address1']);

            $addressData['billing'] = $billing;
        }


        Log::info("address" . json_encode($addressData));

        if (
            Cart::hasError()
            || ! Cart::saveCustomerAddress($addressData)
        ) {
            return new JsonResource([
                'redirect' => true,
                'data'     => route('shop.checkout.cart.index'),
            ]);
        }


        //处理配送方式
        $shippingMethod = "free_free"; // 包邮
        $shippingMethod = "flatrate_flatrate";
        // Cart::saveShippingMethod($shippingMethod);

        if (
            Cart::hasError()
            || ! $shippingMethod
            || ! Cart::saveShippingMethod($shippingMethod)
        ) {
            return response()->json([
                'redirect_url' => route('shop.checkout.cart.index'),
            ], Response::HTTP_FORBIDDEN);
        }

        Cart::collectTotals();

        if($payment_method=="airwallex_klarna") $payment_method = "airwallex";
        if($payment_method=="airwallex_dropin") $payment_method = "airwallex";

        $couponCode = $input['coupon_code'];
        try {
            if (strlen($couponCode)) {
                $coupon = $this->cartRuleCouponRepository->findOneByField('code', $couponCode);

                if (! $coupon) {
                    return (new JsonResource([
                        'data'     => new CartResource(Cart::getCart()),
                        'message'  => trans('Coupon not found.'),
                    ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                if ($coupon->cart_rule->status) {
                    if (Cart::getCart()->coupon_code == $couponCode) {
                        return (new JsonResource([
                            'data'     => new CartResource(Cart::getCart()),
                            'message'  => trans('shop::app.checkout.cart.coupon-already-applied'),
                        ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                    }

                    Cart::setCouponCode($couponCode);
                    //$this->validateOrder();
                    Cart::collectTotals();

                    // if (Cart::getCart()->coupon_code != $couponCode) {
                    //     return new JsonResource([
                    //         'data'     => new CartResource(Cart::getCart()),
                    //         'message'  => trans('shop::app.checkout.cart.coupon.success-apply'),
                    //     ]);
                    // }
                }
            }
        } catch (\Exception $e) {
            return (new JsonResource([
                'data'    => new CartResource(Cart::getCart()),
                'message' => trans('shop::app.checkout.cart.coupon.error'),
            ]))->response()->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // 获取支付信息

        if($payment_method=='airwallex') {
            //处理支付方式
            $payment = [];
            $payment['description'] = $payment_method."-".$refer;
            $payment['method'] = $payment_method;
            $payment['method_title'] = $payment_method."-".$refer;
            $payment['sort'] = "2";
            // Cart::savePaymentMethod($payment);

            if (
                Cart::hasError()
                || ! $payment
                || ! Cart::savePaymentMethod($payment)
            ) {
                return response()->json([
                    'redirect_url' => route('shop.checkout.cart.index'),
                ], Response::HTTP_FORBIDDEN);
            }

            // 生成订单，
            Cart::collectTotals();
            $this->validateOrder();
            $cart = Cart::getCart();
            $order = $this->orderRepository->create(Cart::prepareDataForOrder());
            // Cart::deActivateCart();
            // Cart::activateCartIfSessionHasDeactivatedCartId();
            // 跳转到支付
            $data['result'] = 200;
            $data['order'] = $order;
            if ($order) {
                $orderId = $order->id;
                $transactionManager = $this->airwallex->createPaymentOrder($cart, $order->id);
                Log::info("airwallex-".$order->id."--".json_encode($transactionManager));
                $data['client_secret'] = $transactionManager->client_secret;
                $data['payment_intent_id'] = $transactionManager->id;
                $data['currency'] = $transactionManager->currency;
                $data['country'] = $input['country'];
                $data['billing'] = $addressData['billing'];
            }

            return response()->json($data);
        }

        if($payment_method=='paypal_standard') {
            //处理支付方式
            $payment = [];
            $payment['description'] = "PayPal-".$refer;
            $payment['method'] = "paypal_standard";
            $payment['method_title'] = "PayPal standard Button-".$refer;
            $payment['sort'] = "1";
            // Cart::savePaymentMethod($payment);

            if (
                Cart::hasError()
                || ! $payment
                || ! Cart::savePaymentMethod($payment)
            ) {
                return response()->json([
                    'message' => 'save payment error',
                ]);
            }

            Cart::collectTotals();

            $this->validateOrder();

            $cart = Cart::getCart();

            //$order = $this->orderRepository->create(Cart::prepareDataForOrder()); //todo


            if ($redirectUrl = Payment::getRedirectUrl($cart)) {
                $paypalStandard = app('Webkul\Paypal\Payment\Standard');
                $data = [];
                $data['success'] = true;
                $data['redirect'] = $redirectUrl;
                $data['redirect_url'] = $redirectUrl;
                $data['form'] =  $paypalStandard->getFormFields();
                $data['pay_url'] =  $paypalStandard->getPaypalUrl();
                $data['result'] = 200;
                return response()->json($data);
            }else{
                $data = [];
                $data['result'] = 400;
                $data['message'] = $redirectUrl;
                return response()->json($data);
            }
        }
    }

    public function OrderAddrAfter(Request $request) {
        $input = $request->all();

        //$last_order_id = $request->session()->get('last_order_id'); // check the laster order id
        $last_order_id = "";
        //$last_order_id = "ddddd";
        $force = $request->input("force");

        Log::info("last order id " . $last_order_id);

        if(!empty($last_order_id) && $force !="1") {
            return response()->json(['error' => 'You Have already placed order, if you want to place another order please confirm your order','code'=>'202'], 400);
        }

        //$refer = $request->session()->get('refer');

        $refer = isset($input['refer']) ? trim($input['refer']) : "";

        $products = $request->input("products");
        Log::info("products". json_encode($products));
        // 添加到购物车
        Cart::deActivateCart();
        foreach($products as $key=>$product) {
            //var_dump($product);
            $product['quantity'] = $product['amount'];
            $product['selected_configurable_option'] = $product['variant_id'];
            if(!empty($product['attr_id'])) {
                $attr_ids = explode(',', $product['attr_id']);
                foreach($attr_ids as $key=>$attr_id) {
                    $attr = explode('_', $attr_id);
                    $super_attribute[$attr[0]] = $attr[1];
                }
    
                $product['super_attribute'] = $super_attribute;
            }
            
            //Log::info("add product into cart ". json_encode($product));
            $cart = Cart::addProduct($product['product_id'], $product);
            if (
                is_array($cart)
                && isset($cart['warning'])
            ) {
                return new JsonResource([
                    'message' => $cart['warning'],
                ]);
            }
        }


        // 添加地址内容
        $addressData = [];
        $addressData['billing'] = [];
        $address1 = [];
        array_push($address1, $input['address']);
        $addressData['billing']['city'] = $input['city'];
        $addressData['billing']['country'] = $input['country'];
        $addressData['billing']['email'] = $input['email'];
        $addressData['billing']['first_name'] = $input['first_name'];
        $addressData['billing']['last_name'] = $input['second_name'];
        $input['phone_full'] = str_replace('undefined+','', $input['phone_full']);
        $addressData['billing']['phone'] = $input['phone_full'];
        $addressData['billing']['postcode'] = $input['code'];
        $addressData['billing']['state'] = $input['province'];
        $addressData['billing']['use_for_shipping'] = true;
        $addressData['billing']['address1'] = $address1;
        $addressData['shipping'] = [];
        $addressData['shipping']['isSaved'] = false;
        $address1 = [];
        array_push($address1, "");
        $addressData['shipping']['address1'] = $address1;

        $addressData['billing']['address1'] = implode(PHP_EOL, $addressData['billing']['address1']);

        $addressData['shipping']['address1'] = implode(PHP_EOL, $addressData['shipping']['address1']);

        Log::info("paypal pay ".$refer.'--'.json_encode($addressData));


        if (
            Cart::hasError()
            || ! Cart::saveCustomerAddress($addressData)
        ) {
            return new JsonResource([
                'redirect' => true,
                'data'     => route('shop.checkout.cart.index'),
            ]);
        }


        //处理配送方式
        $shippingMethod = "free_free"; // 包邮
        $shippingMethod = "flatrate_flatrate";
        // Cart::saveShippingMethod($shippingMethod);

        if (
            Cart::hasError()
            || ! $shippingMethod
            || ! Cart::saveShippingMethod($shippingMethod)
        ) {
            return response()->json([
                'redirect_url' => route('shop.checkout.cart.index'),
            ], Response::HTTP_FORBIDDEN);
        }

        Cart::collectTotals();

        //处理支付方式
        $payment = [];
        $payment['description'] = "PayPal-".$refer;
        $payment['method'] = "paypal_smart_button";
        $payment['method_title'] = "PayPal Smart Button-".$refer;
        $payment['sort'] = "1";
        // Cart::savePaymentMethod($payment);

        if (
            Cart::hasError()
            || ! $payment
            || ! Cart::savePaymentMethod($payment)
        ) {
            return response()->json([
                'redirect_url' => route('shop.checkout.cart.index'),
            ], Response::HTTP_FORBIDDEN);
        }


        $couponCode = $input['coupon_code'];
        try {
            if (strlen($couponCode)) {
                $coupon = $this->cartRuleCouponRepository->findOneByField('code', $couponCode);

                if (! $coupon) {
                    return (new JsonResource([
                        'data'     => new CartResource(Cart::getCart()),
                        'message'  => trans('Coupon not found.'),
                    ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                if ($coupon->cart_rule->status) {
                    if (Cart::getCart()->coupon_code == $couponCode) {
                        return (new JsonResource([
                            'data'     => new CartResource(Cart::getCart()),
                            'message'  => trans('shop::app.checkout.cart.coupon-already-applied'),
                        ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                    }

                    Cart::setCouponCode($couponCode);
                    //$this->validateOrder();
                    Cart::collectTotals();

                    // if (Cart::getCart()->coupon_code != $couponCode) {
                    //     return new JsonResource([
                    //         'data'     => new CartResource(Cart::getCart()),
                    //         'message'  => trans('shop::app.checkout.cart.coupon.success-apply'),
                    //     ]);
                    // }
                }
            }
        } catch (\Exception $e) {
            return (new JsonResource([
                'data'    => new CartResource(Cart::getCart()),
                'message' => trans('shop::app.checkout.cart.coupon.error'),
            ]))->response()->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        try {
            $order = $this->smartButton->createOrder($this->buildRequestBody($input));
            $data = [];
            $data['order'] = $order;
            $data['code'] = 200;
            $data['result'] = 200;
            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json(json_decode($e->getMessage()), 400);
        }
    }

    /**
     * Order confirm
     *
     * @return \Illuminate\Http\Response
     */
    public function OrderConfirm(Request $request) {
        $payment_intent_id = $request->input("payment_intent_id");
        $order_id = $request->input("order_id");

        $order = $this->orderRepository->find($order_id);
        
        $transactionManager = $this->airwallex->confirmPayment($payment_intent_id, $order);

        $data = [];
        $data['payment'] = $transactionManager;
        $data['code'] = 200;
        $data['result'] = 200;
        $data['order_id'] = $order_id;
        $data['order_id'] = $order_id;
        return response()->json($data);
    }

    public function OrderLog(Request $request) {
        Log::info("request ". json_encode($request->all()));
        $session_data = $request->session()->all();
        Log::info("session ". json_encode($session_data));
        $refer = $request->cookie('refer');
        Log::info("cookie refer ". $refer);
    }

    public function OrderQuery(Request $request) {
        $order_id = $request->input("id");

        $order = $this->orderRepository->find($order_id);
        if(is_null($order)) {
            return new JsonResource([
                'order_id' => 0,
                'info'      => [],
            ]);
        }

        return new JsonResource([
            'order_id' => $order_id,
            'info'      => $order,
        ]);
    }

    public function OrderStatus(Request $request) {

        try {
            $order = $this->smartButton->getOrder(request()->input('orderData.orderID'));
            // return response()->json($order);
            

            Log::info("paypal ".json_encode($order));
            Log::info("paypal request ".json_encode($request->all()));

            $order = (array)$order;

            //var_dump($order);

            $purchase_units = (array)$order['result']->purchase_units;
            $input = (array)$purchase_units[0]->shipping;
            $payer = (array)$order['result']->payer;
            $payment_source = (array)$order['result']->payment_source;
            $payment_source_paypal = (array)$payment_source['paypal'];

            //Log::info("paypal source".json_encode($payment_source));
            //Log::info("paypal source paypal".json_encode($payment_source_paypal));

            // 添加地址内容
            $addressData = [];
            $addressData['billing'] = [];
            $address1 = [];
            array_push($address1, $input['address']->address_line_1);
            $addressData['billing']['city'] = isset($input['address']->admin_area_2) ? $input['address']->admin_area_2 : "";
            $addressData['billing']['country'] = $input['address']->country_code;
            $addressData['billing']['email'] = $payer['email_address'];
            $addressData['billing']['first_name'] = $payer['name']->given_name;
            $addressData['billing']['last_name'] = $payer['name']->surname;
            $national_number = isset($payment_source_paypal['phone_number']) ? $payment_source_paypal['phone_number']->national_number : "";
            $addressData['billing']['phone'] =  $national_number;
            $addressData['billing']['postcode'] = isset($input['address']->postal_code) ? $input['address']->postal_code : "";
            $addressData['billing']['state'] = isset($input['address']->admin_area_1) ? $input['address']->admin_area_1 : "";
            $addressData['billing']['use_for_shipping'] = true;
            $addressData['billing']['address1'] = $address1;
            $addressData['shipping'] = [];
            $addressData['shipping']['isSaved'] = false;
            $address1 = [];
            array_push($address1, "");
            $addressData['shipping']['address1'] = $address1;

            $addressData['billing']['address1'] = implode(PHP_EOL, $addressData['billing']['address1']);

            $addressData['shipping']['address1'] = implode(PHP_EOL, $addressData['shipping']['address1']);

            //Log::info("address data-".$refer.'--'.json_encode($addressData));

            if (
                Cart::hasError()
                || ! Cart::saveCustomerAddress($addressData)
            ) {
                return new JsonResource([
                    'redirect' => true,
                    'data'     => route('shop.checkout.cart.index'),
                ]);
            }

            $this->smartButton->captureOrder(request()->input('orderData.orderID'));

            $request->session()->put('last_order_id', request()->input('orderData.orderID'));

            return $this->saveOrder();
        } catch (\Exception $e) {
            Log::info("paypal pay exception". json_encode($e->getMessage()));
            return response()->json($e->getMessage());
            return response()->json(json_decode($e->getMessage()), 400);
        }
    }

    /**
     * 
     * check the coupon info
     * @param string code
     * 
     */
    public function CheckCoupon(Request $request) {
        $couponCode = $request->input("code");

        try {
            if (strlen($couponCode)) {
                $coupon = $this->cartRuleCouponRepository->findOneByField('code', $couponCode);

                if (! $coupon) {
                    return (new JsonResource([
                        'data'     => new CartResource(Cart::getCart()),
                        'message'  => trans('Coupon not found.'),
                    ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
                }

                $couponConfig = [];

                $couponConfig = $this->cartRuleRepository->findOneByField('id',$coupon->cart_rule_id);

                return (new JsonResource([
                    'data'     => [
                        'coupon' => $coupon,
                        'couponConfig' => $couponConfig,
                    ],
                    'message'  => trans('Coupon applied successfully.'),
                ]))->response()->setStatusCode(Response::HTTP_OK);
            }
        } catch (\Exception $e) {
            return (new JsonResource([
                'data'    => new CartResource(Cart::getCart()),
                'message' => trans('shop::app.checkout.cart.coupon.error'),
            ]))->response()->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

      /**
     * Saving order once captured and all formalities done.
     *
     * @return \Illuminate\Http\Response
     */
    protected function saveOrder()
    {
        if (Cart::hasError()) {
            return response()->json(['redirect_url' => route('shop.checkout.cart.index')], 403);
        }

        try {
            Cart::collectTotals();

            $this->validateOrder();

            $order = $this->orderRepository->create(Cart::prepareDataForOrder());

            $this->orderRepository->update(['status' => 'processing'], $order->id);

            if ($order->canInvoice()) {
                $this->invoiceRepository->create($this->prepareInvoiceData($order));
            }

            Cart::deActivateCart();

            session()->flash('order', $order);

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            session()->flash('error', trans('shop::app.common.error'));

            throw $e;
        }
    }

      /**
     * Prepares order's invoice data for creation.
     *
     * @param  \Webkul\Sales\Models\Order  $order
     * @return array
     */
    protected function prepareInvoiceData($order)
    {
        $invoiceData = ['order_id' => $order->id];

        foreach ($order->items as $item) {
            $invoiceData['invoice']['items'][$item->id] = $item->qty_to_invoice;
        }

        return $invoiceData;
    }

    /**
     * 
     * @link https://developer.paypal.com/docs/multiparty/checkout/save-payment-methods/during-purchase/js-sdk/paypal/
     * 
     */
    protected function buildRequestBody($input)
    {
        $cart = Cart::getCart();


        $billingAddressLines = $this->getAddressLines($cart->billing_address->address1);

        $data = [
            'intent' => 'CAPTURE',
            'application_context' => [
                //'shipping_preference' => 'NO_SHIPPING',
                'shipping_preference' => 'GET_FROM_FILE', // 用户选择自己的地址内容
            ],
            

            'purchase_units' => [
                [
                    'amount'   => [
                        'value'         => $this->smartButton->formatCurrencyValue((float) $cart->sub_total + $cart->tax_total + ($cart->selected_shipping_rate ? $cart->selected_shipping_rate->price : 0) - $cart->discount_amount),
                        'currency_code' => $cart->cart_currency_code,

                        'breakdown'     => [
                            'item_total' => [
                                'currency_code' => $cart->cart_currency_code,
                                'value'         => $this->smartButton->formatCurrencyValue((float) $cart->sub_total),
                            ],

                            'shipping'   => [
                                'currency_code' => $cart->cart_currency_code,
                                'value'         => $this->smartButton->formatCurrencyValue((float) ($cart->selected_shipping_rate ? $cart->selected_shipping_rate->price : 0)),
                            ],

                            'tax_total'  => [
                                'currency_code' => $cart->cart_currency_code,
                                'value'         => $this->smartButton->formatCurrencyValue((float) $cart->tax_total),
                            ],

                            'discount'   => [
                                'currency_code' => $cart->cart_currency_code,
                                'value'         => $this->smartButton->formatCurrencyValue((float) $cart->discount_amount),
                            ],
                        ],
                    ],

                    'items'    => $this->getLineItems($cart),
                ],
            ],
        ];

        if (! empty($cart->billing_address->phone)) {
            $data['payer']['phone'] = [
                'phone_type'   => 'MOBILE',

                'phone_number' => [
                    'national_number' => $this->smartButton->formatPhone($cart->billing_address->phone),
                ],
            ];
        }

        if (
            $cart->haveStockableItems()
            && $cart->shipping_address
        ) {
            //$data['application_context']['shipping_preference'] = 'SET_PROVIDED_ADDRESS';

            /*
            $data['purchase_units'][0] = array_merge($data['purchase_units'][0], [
                'shipping' => [
                    'address' => [
                        'address_line_1' => current($billingAddressLines),
                        'address_line_2' => last($billingAddressLines),
                        'admin_area_2'   => $cart->shipping_address->city,
                        'admin_area_1'   => $cart->shipping_address->state,
                        'postal_code'    => $cart->shipping_address->postcode,
                        'country_code'   => $cart->shipping_address->country,
                    ],
                ],
            ]);
            */
        }

        return $data;
    }

     /**
     * Return cart items.
     *
     * @param  string  $cart
     * @return array
     */
    protected function getLineItems($cart)
    {
        $lineItems = [];

        foreach ($cart->items as $item) {
            $lineItems[] = [
                'unit_amount' => [
                    'currency_code' => $cart->cart_currency_code,
                    'value'         => $this->smartButton->formatCurrencyValue((float) $item->price),
                ],
                'quantity'    => $item->quantity,
                'name'        => $item->name,
                'sku'         => $item->sku,
                'category'    => $item->getTypeInstance()->isStockable() ? 'PHYSICAL_GOODS' : 'DIGITAL_GOODS',
            ];
        }

        return $lineItems;
    }

      /**
     * Return convert multiple address lines into 2 address lines.
     *
     * @param  string  $address
     * @return array
     */
    protected function getAddressLines($address)
    {
        $address = explode(PHP_EOL, $address, 2);

        $addressLines = [current($address)];

        if (isset($address[1])) {
            $addressLines[] = str_replace(["\r\n", "\r", "\n"], ' ', last($address));
        } else {
            $addressLines[] = '';
        }

        return $addressLines;
    }

    /**
     * Validate order before creation.
     *
     * @return void|\Exception
     */
    public function validateOrder()
    {
        $cart = Cart::getCart();

        $minimumOrderAmount = core()->getConfigData('sales.order_settings.minimum_order.minimum_order_amount') ?: 0;

        if (
            auth()->guard('customer')->check()
            && auth()->guard('customer')->user()->is_suspended
        ) {
            throw new \Exception(trans('shop::app.checkout.cart.suspended-account-message'));
        }

        if (
            auth()->guard('customer')->user()
            && ! auth()->guard('customer')->user()->status
        ) {
            throw new \Exception(trans('shop::app.checkout.cart.inactive-account-message'));
        }

        if (! $cart->checkMinimumOrder()) {
            throw new \Exception(trans('shop::app.checkout.cart.minimum-order-message', ['amount' => core()->currency($minimumOrderAmount)]));
        }

        if ($cart->haveStockableItems() && ! $cart->shipping_address) {
            throw new \Exception(trans('shop::app.checkout.cart.check-shipping-address'));
        }

        if (! $cart->billing_address) {
            throw new \Exception(trans('shop::app.checkout.cart.check-billing-address'));
        }

        if (
            $cart->haveStockableItems()
            && ! $cart->selected_shipping_rate
        ) {
            throw new \Exception(trans('shop::app.checkout.cart.specify-shipping-method'));
        }

        if (! $cart->payment) {
            throw new \Exception(trans('shop::app.checkout.cart.specify-payment-method'));
        }
    }


}