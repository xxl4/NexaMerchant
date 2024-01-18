<div class="w-[418px] max-w-full">
<<<<<<< HEAD
    <p class="text-[26px] font-medium">
        @lang('shop::app.checkout.cart.summary.cart-summary')
    </p>

    <div class="grid gap-[15px] mt-[25px]">
        <div class="flex justify-between text-right">
            <p class="text-[16px]">
=======
    {!! view_render_event('bagisto.shop.checkout.cart.summary.title.before') !!}

    <p
        class="text-2xl font-medium"
        role="heading"
    >
        @lang('shop::app.checkout.cart.summary.cart-summary')
    </p>

    {!! view_render_event('bagisto.shop.checkout.cart.summary.title.after') !!}

    <div class="grid gap-4 mt-6">
        {!! view_render_event('bagisto.shop.checkout.cart.summary.sub_total.before') !!}

        <div class="flex justify-between text-right">
            <p class="text-base">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @lang('shop::app.checkout.cart.summary.sub-total')
            </p>

            <p 
<<<<<<< HEAD
                class="text-[16px] font-medium"
=======
                class="text-base font-medium"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-text="cart.formatted_sub_total"
            >
            </p>
        </div>

<<<<<<< HEAD
=======
        {!! view_render_event('bagisto.shop.checkout.cart.summary.sub_total.after') !!}

        {!! view_render_event('bagisto.shop.checkout.cart.summary.tax.before') !!}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <div 
            class="flex justify-between text-right"
            v-for="(amount, index) in cart.base_tax_amounts"
            v-if="parseFloat(cart.base_tax_total)"
        >
<<<<<<< HEAD
            <p class="text-[16px] max-sm:text-[14px] max-sm:font-normal">
=======
            <p class="text-base max-sm:text-sm max-sm:font-normal">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @lang('shop::app.checkout.cart.summary.tax') (@{{ index }})%
            </p>

            <p 
<<<<<<< HEAD
                class="text-[16px] font-medium max-sm:text-[14px] max-sm:font-medium"
=======
                class="text-base font-medium max-sm:text-sm max-sm:font-medium"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-text="amount"
            >
            </p>
        </div>

<<<<<<< HEAD
=======
        {!! view_render_event('bagisto.shop.checkout.cart.summary.tax.after') !!}

        {!! view_render_event('bagisto.shop.checkout.cart.summary.discount_amount.before') !!}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <div 
            class="flex justify-between text-right"
            v-if="cart.base_discount_amount && parseFloat(cart.base_discount_amount) > 0"
        >
<<<<<<< HEAD
            <p class="text-[16px]">
=======
            <p class="text-base">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @lang('shop::app.checkout.cart.summary.discount-amount')
            </p>

            <p 
<<<<<<< HEAD
                class="text-[16px] font-medium"
=======
                class="text-base font-medium"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-text="cart.formatted_base_discount_amount"
            >
            </p>
        </div>
<<<<<<< HEAD
        
        @include('shop::checkout.cart.coupon')
   
        <div class="flex justify-between text-right">
            <p class="text-[18px] font-semibold">
=======

        {!! view_render_event('bagisto.shop.checkout.cart.summary.discount_amount.after') !!}

        {!! view_render_event('bagisto.shop.checkout.cart.summary.coupon.before') !!}
        
        @include('shop::checkout.cart.coupon')

        {!! view_render_event('bagisto.shop.checkout.cart.summary.coupon.after') !!}
   
        {!! view_render_event('bagisto.shop.checkout.cart.summary.grand_total.before') !!}

        <div class="flex justify-between text-right">
            <p class="text-lg font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @lang('shop::app.checkout.cart.summary.grand-total')
            </p>

            <p 
<<<<<<< HEAD
                class="text-[18px] font-semibold" 
=======
                class="text-lg font-semibold" 
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-text="cart.formatted_grand_total"
            >
            </p>
        </div>

<<<<<<< HEAD
        <a 
            href="{{ route('shop.checkout.onepage.index') }}" 
            class="block w-max place-self-end py-[11px] mt-[15px] px-[43px] bg-navyBlue rounded-[18px] text-white text-base font-medium text-center cursor-pointer"
        >
            @lang('shop::app.checkout.cart.summary.proceed-to-checkout')
        </a>
=======
        {!! view_render_event('bagisto.shop.checkout.cart.summary.grand_total.after') !!}

        {!! view_render_event('bagisto.shop.checkout.cart.summary.proceed_to_checkout.before') !!}

        <a 
            href="{{ route('shop.checkout.onepage.index') }}" 
            class="block w-max place-self-end py-3 mt-4 px-11 bg-navyBlue rounded-2xl text-white text-base font-medium text-center cursor-pointer"
        >
            @lang('shop::app.checkout.cart.summary.proceed-to-checkout')
        </a>

        {!! view_render_event('bagisto.shop.checkout.cart.summary.proceed_to_checkout.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    </div>
</div>