<<<<<<< HEAD
<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="false"
>
    {{-- Page Title --}}
=======
<x-shop::layouts>
    <!-- Page Title -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-slot:title>
		@lang('shop::app.checkout.success.thanks')
    </x-slot>

<<<<<<< HEAD
	<div class="absolute top-[60%] left-[50%] -translate-x-[50%] -translate-y-[60%]">
		<div class="grid gap-y-[20px] place-items-center">
=======
	<div class="container mt-8 px-[60px] max-lg:px-8">
		<div class="grid gap-y-5 place-items-center">
			{{ view_render_event('bagisto.shop.checkout.success.image.before', ['order' => $order]) }}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
			<img 
				class="" 
				src="{{ bagisto_asset('images/thank-you.png') }}" 
				alt="thankyou" 
				title=""
			>

<<<<<<< HEAD
			<p class="text-[20px]">

				@if (auth()->guard('customer')->user())
					@lang('shop::app.checkout.success.order-id-info', [
							'order_id' => '<a class="text-[#0A49A7]" href="' . route('shop.customers.account.orders.view', $order->id) . '">' . $order->increment_id . '</a>'
=======
			{{ view_render_event('bagisto.shop.checkout.success.image.after', ['order' => $order]) }}

			<p class="text-xl">
				@if (auth()->guard('customer')->user())
					@lang('shop::app.checkout.success.order-id-info', [
						'order_id' => '<a class="text-[#0A49A7]" href="' . route('shop.customers.account.orders.view', $order->id) . '">' . $order->increment_id . '</a>'
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
					])
				@else
					@lang('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id]) 
				@endif
			</p>

<<<<<<< HEAD
			<p class="text-[26px] font-medium">
				@lang('shop::app.checkout.success.thanks')
			</p>
			
			<p class="text-[20px] text-[#6E6E6E]">
				@lang('shop::app.checkout.success.info')
			</p>

			{{ view_render_event('bagisto.shop.checkout.continue-shopping.before', ['order' => $order]) }}

			<a href="{{ route('shop.home.index') }}">
				<div class="block w-max mx-auto m-auto py-[11px] px-[43px] bg-navyBlue rounded-[18px] text-white text-basefont-medium text-center cursor-pointer">
=======
			<p class="text-2xl font-medium">
				@lang('shop::app.checkout.success.thanks')
			</p>
			
			<p class="text-xl text-[#6E6E6E]">
				@if (! empty($order->checkout_message))
					{!! nl2br($order->checkout_message) !!}
				@else
					@lang('shop::app.checkout.success.info')
				@endif
			</p>

			{{ view_render_event('bagisto.shop.checkout.success.continue-shopping.before', ['order' => $order]) }}

			<a href="{{ route('shop.home.index') }}">
				<div class="block w-max mx-auto m-auto py-3 px-11 bg-navyBlue rounded-2xl text-white text-basefont-medium text-center cursor-pointer">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
             		@lang('shop::app.checkout.cart.index.continue-shopping')
				</div> 
			</a>
			
<<<<<<< HEAD
			{{ view_render_event('bagisto.shop.checkout.continue-shopping.after', ['order' => $order]) }}
			
=======
			{{ view_render_event('bagisto.shop.checkout.success.continue-shopping.after', ['order' => $order]) }}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
		</div>
	</div>
</x-shop::layouts>