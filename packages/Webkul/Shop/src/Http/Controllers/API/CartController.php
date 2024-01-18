<?php

namespace Webkul\Shop\Http\Controllers\API;

use Illuminate\Http\Resources\Json\JsonResource;
<<<<<<< HEAD
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Response;
use Webkul\Customer\Repositories\WishlistRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\Checkout\Facades\Cart;
use Webkul\Shop\Http\Resources\CartResource;
=======
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Webkul\CartRule\Repositories\CartRuleCouponRepository;
use Webkul\Checkout\Facades\Cart;
use Webkul\Customer\Repositories\WishlistRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Shop\Http\Resources\CartResource;
use Webkul\Shop\Http\Resources\ProductResource;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CartController extends APIController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected WishlistRepository $wishlistRepository,
        protected ProductRepository $productRepository,
        protected CartRuleCouponRepository $cartRuleCouponRepository
<<<<<<< HEAD
    )
    {
=======
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Cart.
     */
    public function index(): JsonResource
    {
        Cart::collectTotals();

        $response = [
<<<<<<< HEAD
            'data' => ($cart = Cart::getCart()) ? new CartResource($cart) : null
=======
            'data' => ($cart = Cart::getCart()) ? new CartResource($cart) : null,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ];

        if (session()->has('info')) {
            $response['message'] = session()->get('info');
        }

        return new JsonResource($response);
    }

    /**
     * Store items in cart.
     */
    public function store(): JsonResource
    {
        try {
            $product = $this->productRepository->with('parent')->find(request()->input('product_id'));

            if (request()->get('is_buy_now')) {
                Cart::deActivateCart();
<<<<<<< HEAD
            } 
=======
            }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

            $cart = Cart::addProduct($product->id, request()->all());

            /**
             * To Do (@devansh-webkul): Need to check this and improve cart facade.
             */
            if (
                is_array($cart)
                && isset($cart['warning'])
            ) {
                return new JsonResource([
                    'message' => $cart['warning'],
                ]);
            }

            if ($cart) {
                if ($customer = auth()->guard('customer')->user()) {
                    $this->wishlistRepository->deleteWhere([
                        'product_id'  => $product->id,
                        'customer_id' => $customer->id,
                    ]);
                }

                if (request()->get('is_buy_now')) {
                    Event::dispatch('shop.item.buy-now', request()->input('product_id'));

                    return new JsonResource([
                        'data'     => new CartResource(Cart::getCart()),
                        'redirect' => route('shop.checkout.onepage.index'),
                        'message'  => trans('shop::app.checkout.cart.item-add-to-cart'),
                    ]);
                }

                return new JsonResource([
                    'data'     => new CartResource(Cart::getCart()),
                    'message'  => trans('shop::app.checkout.cart.item-add-to-cart'),
                ]);
            }
        } catch (\Exception $exception) {
            return new JsonResource([
<<<<<<< HEAD
                'redirect_uri' => route('shop.product_or_category.index', $product->product->url_key),
=======
                'redirect_uri' => route('shop.product_or_category.index', $product->url_key),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                'message'      => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Removes the item from the cart if it exists.
     */
    public function destroy(): JsonResource
    {
        Cart::removeItem(request()->input('cart_item_id'));

        Cart::collectTotals();

        return new JsonResource([
            'data'    => new CartResource(Cart::getCart()),
            'message' => trans('shop::app.checkout.cart.success-remove'),
        ]);
    }

    /**
     * Method for remove selected items from cart
<<<<<<< HEAD
     * 
     * @return \Illuminate\Http\Resources\Json\JsonResource
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function destroySelected(): JsonResource
    {
        foreach (request()->input('ids') as $id) {
            Cart::removeItem($id);
        }

        return new JsonResource([
            'data'     => new CartResource(Cart::getCart()) ?? null,
            'message'  => trans('shop::app.checkout.cart.index.remove-selected-success'),
        ]);
    }

    /**
     * Method for move to wishlist selected items from cart
<<<<<<< HEAD
     * 
     * @return \Illuminate\Http\Resources\Json\JsonResource
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function moveToWishlist(): JsonResource
    {
        foreach (request()->input('ids') as $id) {
            Cart::moveToWishlist($id);
        }

        return new JsonResource([
            'data'     => new CartResource(Cart::getCart()) ?? null,
            'message'  => trans('shop::app.checkout.cart.index.move-to-wishlist-success'),
        ]);
    }

    /**
     * Updates the quantity of the items present in the cart.
     */
    public function update(): JsonResource
    {
        try {
            Cart::updateItems(request()->input());

            return new JsonResource([
                'data'    => new CartResource(Cart::getCart()),
                'message' => trans('shop::app.checkout.cart.index.quantity-update'),
            ]);
        } catch (\Exception $exception) {
            return new JsonResource([
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Apply coupon to the cart.
     */
    public function storeCoupon()
    {
        $couponCode = request()->input('code');

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

                    Cart::setCouponCode($couponCode)->collectTotals();

                    if (Cart::getCart()->coupon_code == $couponCode) {
                        return new JsonResource([
                            'data'     => new CartResource(Cart::getCart()),
                            'message'  => trans('shop::app.checkout.cart.coupon.success-apply'),
                        ]);
                    }
                }
<<<<<<< HEAD
=======

                return (new JsonResource([
                    'data'     => new CartResource(Cart::getCart()),
                    'message'  => trans('Coupon not found.'),
                ]))->response()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            }
        } catch (\Exception $e) {
            return (new JsonResource([
                'data'    => new CartResource(Cart::getCart()),
                'message' => trans('shop::app.checkout.cart.coupon.error'),
            ]))->response()->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove applied coupon from the cart.
     */
    public function destroyCoupon(): JsonResource
    {
        Cart::removeCouponCode()->collectTotals();

        return new JsonResource([
            'data'     => new CartResource(Cart::getCart()),
            'message'  => trans('shop::app.checkout.cart.coupon.remove'),
        ]);
    }
<<<<<<< HEAD
=======

    /**
     * Cross-sell product listings.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource::collection
     */
    public function crossSellProducts()
    {
        $cart = Cart::getCart();

        if (! $cart) {
            return new JsonResource([
                'data' => [],
            ]);
        }

        $productIds = $cart->items->pluck('product_id')->toArray();

        $products = $this->productRepository
            ->select('products.*', 'product_cross_sells.child_id')
            ->join('product_cross_sells', 'products.id', '=', 'product_cross_sells.child_id')
            ->whereIn('product_cross_sells.parent_id', $productIds)
            ->groupBy('product_cross_sells.child_id')
            ->paginate();

        return ProductResource::collection($products);
    }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
}
