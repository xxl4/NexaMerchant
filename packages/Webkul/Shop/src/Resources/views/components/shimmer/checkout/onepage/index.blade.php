<<<<<<< HEAD
<div class="grid grid-cols-[1fr_auto] gap-[30px] max-lg:grid-cols-[1fr]">
    <div>
        {{-- Billing Address Shimmer --}}
        <x-shop::shimmer.checkout.onepage.address/>

        {{-- Shipping Method Shimmer --}}
        <x-shop::shimmer.checkout.onepage.shipping-method/>

        {{-- Payment Method Shimmer --}}
=======
<div class="grid grid-cols-[1fr_auto] gap-8 max-lg:grid-cols-[1fr]">
    <div>
        <!-- Billing Address Shimmer -->
        <x-shop::shimmer.checkout.onepage.address/>

        <!-- Shipping Method Shimmer -->
        <x-shop::shimmer.checkout.onepage.shipping-method/>

        <!-- Payment Method Shimmer -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <x-shop::shimmer.checkout.onepage.payment-method/>
    </div>

    <x-shop::shimmer.checkout.onepage.cart-summary/>
</div>
