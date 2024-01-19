<?php
namespace Nicelizhi\Binom;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Arr;
use Webkul\Checkout\Traits\CartValidators;
use Webkul\Checkout\Traits\CartTools;
use Webkul\Checkout\Traits\CartCoupons;
use Webkul\Checkout\Repositories\CartRepository;
use Webkul\Checkout\Repositories\CartItemRepository;
use Webkul\Customer\Repositories\CustomerAddressRepository;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\Tax\Repositories\TaxCategoryRepository;
use Webkul\Customer\Repositories\WishlistRepository;
use Webkul\Checkout\Repositories\CartAddressRepository;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Checkout\Models\CartPayment;
use Webkul\Checkout\Models\CartAddress;
use Webkul\Tax\Helpers\Tax;

class Binom
{
    use CartCoupons, CartTools, CartValidators;

    /**
     * @var \Webkul\Checkout\Contracts\Cart
     */
    private $cart;

    /**
     * @var \Nicelizhi\Binom\Contracts\Binom
     */
    private $binom;

    /**
     * Create a new class instance.
     *
     * @param  \Webkul\Checkout\Repositories\CartRepository  $cartRepository
     * @param  \Webkul\Checkout\Repositories\CartItemRepository  $cartItemRepository
     * @param  \Webkul\Checkout\Repositories\CartAddressRepository  $cartAddressRepository
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     * @param  \Webkul\Tax\Repositories\TaxCategoryRepository   $taxCategoryRepository
     * @param  \Webkul\Customer\Repositories\WishlistRepository  $wishlistRepository
     * @param  \Webkul\Customer\Repositories\CustomerAddressRepository  $customerAddressRepository
     * @return void
     */
    public function __construct(
        protected CartRepository $cartRepository,
        protected CartItemRepository $cartItemRepository,
        protected CartAddressRepository $cartAddressRepository,
        protected ProductRepository $productRepository,
        protected TaxCategoryRepository $taxCategoryRepository,
        protected WishlistRepository $wishlistRepository,
        protected CustomerAddressRepository $customerAddressRepository
    )
    {
        $this->getCart();
    }

    /**
     * Returns cart.
     *
     * @return \Webkul\Checkout\Contracts\Cart|null
     */
    public function getCart(): ?\Webkul\Checkout\Contracts\Cart
    {
        if ($this->cart) {
            return $this->cart;
        }

        if (auth()->guard()->check()) {
            $this->cart = $this->cartRepository->findOneWhere([
                    'customer_id' => auth()->guard()->user()->id,
                    'is_active'   => 1,
                ]);
        } elseif (session()->has('cart')) {
            $this->cart = $this->cartRepository->find(session()->get('cart')->id);
        }

        return $this->cart;
    }

     /**
     * Set cart model to the variable for reuse
     *
     * @param \Webkul\Checkout\Contracts\Cart
     * @return  void
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
    }
}