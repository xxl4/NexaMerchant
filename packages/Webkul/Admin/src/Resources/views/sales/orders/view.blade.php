<x-admin::layouts>
<<<<<<< HEAD
    <x-slot:title>
        @lang('admin::app.sales.orders.view.title', ['order_id' => $order->increment_id])
    </x-slot:title>

    {{-- Header --}}
    <div class="grid">
        <div class="flex gap-[16px] justify-between items-center max-sm:flex-wrap">
            {!! view_render_event('sales.order.title.before', ['order' => $order]) !!}
            <div class="flex gap-[10px] items-center">
                <p class="text-[20px] text-gray-800 dark:text-white font-bold leading-[24px]">
                    @lang('admin::app.sales.orders.view.title', ['order_id' => $order->increment_id])
                </p>

                <div>
                    @switch($order->status)
                        @case('processing')
                            <span class="label-processing text-[14px] mx-[5px]">
                                @lang('admin::app.sales.orders.view.processing')    
                            </span>
                            @break

                        @case('completed')
                            <span class="label-closed text-[14px] mx-[5px]">
                                @lang('admin::app.sales.orders.view.completed')    
                            </span>
                            @break

                        @case('pending')
                            <span class="label-pending text-[14px] mx-[5px]">
                                @lang('admin::app.sales.orders.view.pending')    
                            </span>
                            @break

                        @case('closed')
                            <span class="label-closed text-[14px] mx-[5px]">
                                @lang('admin::app.sales.orders.view.closed')    
                            </span>
                            @break

                        @case('canceled')
                            <span class="label-cancelled text-[14px] mx-[5px]">
                                @lang('admin::app.sales.orders.view.canceled')    
                            </span>
                            @break

                    @endswitch
                </div>
=======
    <!-- Page Title -->
    <x-slot:title>
        @lang('admin::app.sales.orders.view.title', ['order_id' => $order->increment_id])
    </x-slot>

    <!-- Header -->
    <div class="grid">
        <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
            {!! view_render_event('sales.order.title.before', ['order' => $order]) !!}
            <div class="flex gap-2.5 items-center">
                <p class="text-xl text-gray-800 dark:text-white font-bold leading-6">
                    @lang('admin::app.sales.orders.view.title', ['order_id' => $order->increment_id])
                </p>

                <!-- Order Status -->
                <span class="{{ 'label-' . $order->status }} text-sm mx-1.5">
                    @lang("admin::app.sales.orders.view.$order->status")
                </span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </div>

            {!! view_render_event('sales.order.title.after', ['order' => $order]) !!}

<<<<<<< HEAD
            {{-- Back Button --}}
=======
            <!-- Back Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <a
                href="{{ route('admin.sales.orders.index') }}"
                class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
            >
                @lang('admin::app.account.edit.back-btn')
            </a>
        </div>
    </div>

<<<<<<< HEAD
    <div class="justify-between gap-x-[4px] gap-y-[8px] items-center flex-wrap mt-[20px]">
        <div class="flex gap-[5px]">
=======
    <div class="justify-between gap-x-1 gap-y-2 items-center flex-wrap mt-5">
        <div class="flex gap-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            {!! view_render_event('sales.order.page_action.before', ['order' => $order]) !!}

            @if (
                $order->canCancel()
                && bouncer()->hasPermission('sales.orders.cancel')
            )
               <form
                    method="POST"
                    ref="cancelOrderForm"
                    action="{{ route('admin.sales.orders.cancel', $order->id) }}"
                >
                    @csrf
                </form>

                <div 
<<<<<<< HEAD
                    class="inline-flex gap-x-[8px] items-center justify-between w-full max-w-max px-[4px] py-[6px] text-gray-600 dark:text-gray-300 font-semibold text-center cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800 hover:rounded-[6px]"
                    @click="$emitter.emit('open-confirm-modal', {
                        message: '@lang('shop::app.customers.account.orders.view.cancel-confirm-msg')',
=======
                    class="inline-flex gap-x-2 items-center justify-between w-full max-w-max px-1 py-1.5 text-gray-600 dark:text-gray-300 font-semibold text-center cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800 hover:rounded-md"
                    @click="$emitter.emit('open-confirm-modal', {
                        message: '@lang('admin::app.sales.orders.view.cancel-msg')',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        agree: () => {
                            this.$refs['cancelOrderForm'].submit()
                        }
                    })"
                >
<<<<<<< HEAD
                    <span class="icon-cancel text-[24px]"></span>
=======
                    <span
                        class="icon-cancel text-2xl"
                        role="presentation"
                        tabindex="0"
                    >
                    </span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                    <a
                        href="javascript:void(0);"
                    >
                        @lang('admin::app.sales.orders.view.cancel')    
                    </a>
                </div>
            @endif

            @if (
                $order->canInvoice()
<<<<<<< HEAD
                && $order->payment->method !== 'paypal_standard'
            )
              
                @include('admin::sales.invoices.create')
            @endif

            @if ($order->canShip())
                @include('admin::sales.shipments.create')
            @endif

            @if ($order->canRefund())
=======
                && bouncer()->hasPermission('sales.invoices.create')
                && $order->payment->method !== 'paypal_standard'
            )
                @include('admin::sales.invoices.create')
            @endif

            @if (
                $order->canShip()
                && bouncer()->hasPermission('sales.shipments.create')
            )
                @include('admin::sales.shipments.create')
            @endif

            @if (
                $order->canRefund()
                && bouncer()->hasPermission('sales.refunds.create')
            )
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @include('admin::sales.refunds.create')
            @endif

            {!! view_render_event('sales.order.page_action.after', ['order' => $order]) !!}
        </div>

<<<<<<< HEAD
        {{-- Order details --}}
        <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
            {{-- Left Component --}}
            <div class="flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
                <div class="bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                    <div class="flex justify-between p-[16px]">
                        <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                            @lang('Order Items') ({{ count($order->items) }})
                        </p>

                        <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
=======
        <!-- Order details -->
        <div class="flex gap-2.5 mt-3.5 max-xl:flex-wrap">
            <!-- Left Component -->
            <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">
                <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                    <div class="flex justify-between p-4">
                        <p class="mb-4 text-base text-gray-800 dark:text-white font-semibold">
                            @lang('Order Items') ({{ count($order->items) }})
                        </p>

                        <p class="text-base text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.sales.orders.view.grand-total', ['grand_total' => core()->formatBasePrice($order->base_grand_total)])
                        </p>
                    </div>

<<<<<<< HEAD
                    {{-- Order items --}}
                    <div class="grid">
                        @foreach ($order->items as $item)
                            <div class="flex gap-[10px] justify-between px-[16px] py-[24px] border-b-[1px] border-slate-300 dark:border-gray-800">
                                <div class="flex gap-[10px]">
                                    @if($item->product?->base_image_url)
                                        <img
                                            class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded-[4px]"
                                            src="{{ $item->product?->base_image_url }}"
                                        >
                                    @else
                                        <div class="w-full h-[60px] max-w-[60px] max-h-[60px] relative border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion">
                                            <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                                            
                                            <p class="absolute w-full bottom-[5px] text-[6px] text-gray-400 text-center font-semibold"> 
=======
                    <!-- Order items -->
                    <div class="grid">
                        @foreach ($order->items as $item)
                            <div class="flex gap-2.5 justify-between px-4 py-6 border-b border-slate-300 dark:border-gray-800">
                                <div class="flex gap-2.5">
                                    @if($item?->product?->base_image_url)
                                        <img
                                            class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded"
                                            src="{{ $item?->product->base_image_url }}"
                                        >
                                    @else
                                        <div class="w-full h-[60px] max-w-[60px] max-h-[60px] relative border border-dashed border-gray-300 dark:border-gray-800 rounded dark:invert dark:mix-blend-exclusion">
                                            <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                                            
                                            <p class="absolute w-full bottom-1.5 text-[6px] text-gray-400 text-center font-semibold"> 
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                @lang('admin::app.sales.invoices.view.product-image') 
                                            </p>
                                        </div>
                                    @endif
                    
<<<<<<< HEAD
                                    <div class="grid gap-[6px] place-content-start">
                                        <p class="text-[16x] text-gray-800 dark:text-white font-semibold">
                                            {{ $item->name }}
                                        </p>

                                        <div class="flex flex-col gap-[6px] place-items-start">
=======
                                    <div class="grid gap-1.5 place-content-start">
                                        <p class="text-base text-gray-800 dark:text-white font-semibold">
                                            {{ $item->name }}
                                        </p>

                                        <div class="flex flex-col gap-1.5 place-items-start">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            <p class="text-gray-600 dark:text-gray-300">
                                                @lang('admin::app.sales.orders.view.amount-per-unit', [
                                                    'amount' => core()->formatBasePrice($item->base_price),
                                                    'qty'    => $item->qty_ordered,
<<<<<<< HEAD
                                                    ])
=======
                                                ])
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            </p>

                                            @if (isset($item->additional['attributes']))
                                                <p class="text-gray-600 dark:text-gray-300">
                                                    @foreach ($item->additional['attributes'] as $attribute)
                                                        {{ $attribute['attribute_name'] }} : {{ $attribute['option_label'] }}
                                                    @endforeach
                                                </p>
                                            @endif

                                            <p class="text-gray-600 dark:text-gray-300">
                                                @lang('admin::app.sales.orders.view.sku', ['sku' => $item->sku])
                                            </p>

                                            <p class="text-gray-600 dark:text-gray-300">
                                                {{ $item->qty_ordered ? trans('admin::app.sales.orders.view.item-ordered', ['qty_ordered' => $item->qty_ordered]) : '' }}

                                                {{ $item->qty_invoiced ? trans('admin::app.sales.orders.view.item-invoice', ['qty_invoiced' => $item->qty_invoiced]) : '' }}

                                                {{ $item->qty_shipped ? trans('admin::app.sales.orders.view.item-shipped', ['qty_shipped' => $item->qty_shipped]) : '' }}

                                                {{ $item->qty_refunded ? trans('admin::app.sales.orders.view.item-refunded', ['qty_refunded' => $item->qty_refunded]) : '' }}

                                                {{ $item->qty_canceled ? trans('admin::app.sales.orders.view.item-canceled', ['qty_canceled' => $item->qty_canceled]) : '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

<<<<<<< HEAD
                                <div class="grid gap-[4px] place-content-start">
                                    <div class="">
                                        <p class="flex items-center gap-x-[4px] justify-end text-[16px] text-gray-800 dark:text-white font-semibold">
=======
                                <div class="grid gap-1 place-content-start">
                                    <div class="">
                                        <p class="flex items-center gap-x-1 justify-end text-base text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            {{ core()->formatBasePrice($item->base_total + $item->base_tax_amount - $item->base_discount_amount) }}
                                        </p>
                                    </div>

<<<<<<< HEAD
                                    <div class="flex flex-col gap-[6px] items-end place-items-start">
=======
                                    <div class="flex flex-col gap-1.5 items-end place-items-start">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        <p class="text-gray-600 dark:text-gray-300">
                                            @lang('admin::app.sales.orders.view.price', ['price' => core()->formatBasePrice($item->base_price)])
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ $item->tax_percent }}%
                                            @lang('admin::app.sales.orders.view.tax', ['tax' => core()->formatBasePrice($item->base_tax_amount)])
                                        </p>
<<<<<<< HEAD
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @if ($order->base_discount_amount > 0)
                                            <p class="text-gray-600 dark:text-gray-300">
                                                @lang('admin::app.sales.orders.view.discount', ['discount' => core()->formatBasePrice($item->base_discount_amount)])
                                            </p>
                                        @endif

                                        <p class="text-gray-600 dark:text-gray-300">
                                            @lang('admin::app.sales.orders.view.sub-total', ['sub_total' => core()->formatBasePrice($item->base_total)])
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

<<<<<<< HEAD
                    <div class="flex w-full gap-[10px] justify-end mt-[16px] p-[16px]">
                        <div class="flex flex-col gap-y-[6px]">
                            <p class="text-gray-600 dark:text-gray-300  font-semibold">
                                @lang('admin::app.sales.orders.view.summary-sub-total')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
=======
                    <div class="flex w-full gap-2.5 justify-end mt-4 p-4">
                        <div class="flex flex-col gap-y-1.5">
                            <p class="text-gray-600 dark:text-gray-300 font-semibold !leading-5">
                                @lang('admin::app.sales.orders.view.summary-sub-total')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300 !leading-5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @lang('admin::app.sales.orders.view.summary-tax')
                            </p>

                            @if ($haveStockableItems = $order->haveStockableItems())
<<<<<<< HEAD
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('admin::app.sales.orders.view.shipping-and-handling')</p>
                            @endif

                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                @lang('admin::app.sales.orders.view.summary-grand-total')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.orders.view.total-paid')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.orders.view.total-refund')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.orders.view.total-due')
                            </p>
                        </div>
                        <div class="flex  flex-col gap-y-[6px]">
                            <p class="text-gray-600 dark:text-gray-300  font-semibold">
                                {{ core()->formatBasePrice($order->base_sub_total) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
=======
                                <p class="text-gray-600 dark:text-gray-300 !leading-5">
                                    @lang('admin::app.sales.orders.view.shipping-and-handling')</p>
                            @endif

                            <p class="text-base text-gray-800 dark:text-white font-semibold !leading-5">
                                @lang('admin::app.sales.orders.view.summary-grand-total')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300 !leading-5">
                                @lang('admin::app.sales.orders.view.total-paid')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300 !leading-5">
                                @lang('admin::app.sales.orders.view.total-refund')
                            </p>

                            <p class="text-gray-600 dark:text-gray-300 !leading-5">
                                @lang('admin::app.sales.orders.view.total-due')
                            </p>
                        </div>

                        <div class="flex  flex-col gap-y-1.5">
                            <p class="text-gray-600 dark:text-gray-300 font-semibold !leading-5">
                                {{ core()->formatBasePrice($order->base_sub_total) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300 !leading-5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                {{ core()->formatBasePrice($order->base_tax_amount) }}
                            </p>

                            @if ($haveStockableItems)
<<<<<<< HEAD
                                <p class="text-gray-600 dark:text-gray-300">
=======
                                <p class="text-gray-600 dark:text-gray-300 !leading-5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    {{ core()->formatBasePrice($order->base_shipping_amount) }}
                                </p>
                            @endif

<<<<<<< HEAD
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                {{ core()->formatBasePrice($order->base_grand_total) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                {{ core()->formatBasePrice($order->base_grand_total_invoiced) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
=======
                            <p class="text-base text-gray-800 dark:text-white font-semibold !leading-5">
                                {{ core()->formatBasePrice($order->base_grand_total) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300 !leading-5">
                                {{ core()->formatBasePrice($order->base_grand_total_invoiced) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300 !leading-5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                {{ core()->formatBasePrice($order->base_grand_total_refunded) }}
                            </p>

                            @if($order->status !== 'canceled')
<<<<<<< HEAD
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ core()->formatBasePrice($order->base_total_due) }}
                                </p>
                            @else
                                <p class="text-gray-600 dark:text-gray-300">
=======
                                <p class="text-gray-600 dark:text-gray-300 !leading-5">
                                    {{ core()->formatBasePrice($order->base_total_due) }}
                                </p>
                            @else
                                <p class="text-gray-600 dark:text-gray-300 !leading-5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    {{ core()->formatBasePrice(0.00) }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            
<<<<<<< HEAD
                {{-- Customer's comment form --}}
                <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                    <p class="p-[16px] pb-0 text-[16px] text-gray-800 dark:text-white font-semibold">
=======
                <!-- Customer's comment form -->
                <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                    <p class="p-4 pb-0 text-base text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.sales.orders.view.comments')
                    </p>

                    <x-admin::form action="{{ route('admin.sales.orders.comment', $order->id) }}">
<<<<<<< HEAD
                        <div class="p-[16px]">
                            <div class="mb-[10px]">
=======
                        <div class="p-4">
                            <div class="mb-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.control
                                        type="textarea"
                                        name="comment" 
                                        id="comment"
                                        rules="required"
                                        :label="trans('admin::app.sales.orders.view.comments')"
                                        :placeholder="trans('admin::app.sales.orders.view.write-your-comment')"
                                        rows="3"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="comment"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>

                            <div class="flex justify-between items-center">
<<<<<<< HEAD
                                <label 
                                    class="flex gap-[4px] w-max items-center p-[6px] cursor-pointer select-none"
                                    for="customer_notified"
                                >
                                    <input 
                                        type="checkbox" 
=======
                                <label
                                    class="flex gap-1 w-max items-center p-1.5 cursor-pointer select-none"
                                    for="customer_notified"
                                >
                                    <input
                                        type="checkbox"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        name="customer_notified"
                                        id="customer_notified"
                                        value="1"
                                        class="hidden peer"
                                    >
<<<<<<< HEAD
                        
                                    <span class="icon-uncheckbox rounded-[6px] text-[24px] cursor-pointer peer-checked:icon-checked peer-checked:text-blue-600 "></span>
                        
                                    <p class="flex gap-x-[4px] items-center cursor-pointer text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100 font-semibold">
=======

                                    <span
                                        class="icon-uncheckbox rounded-md text-2xl cursor-pointer peer-checked:icon-checked peer-checked:text-blue-600"
                                        role="button"
                                        tabindex="0"
                                    >
                                    </span>
                        
                                    <p class="flex gap-x-1 items-center cursor-pointer text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @lang('admin::app.sales.orders.view.notify-customer')
                                    </p>
                                </label>
                                
                                <button
                                    type="submit"
                                    class="secondary-button"
<<<<<<< HEAD
=======
                                    aria-label="{{ trans('admin::app.sales.orders.view.submit-comment') }}"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                    @lang('admin::app.sales.orders.view.submit-comment')
                                </button>
                            </div>
                        </div>
                    </x-admin::form> 

<<<<<<< HEAD
                    <span class="block w-full border-b-[1px] dark:border-gray-800"></span>

                    {{-- Comment List --}}
                    @foreach ($order->comments()->orderBy('id', 'desc')->get() as $comment)
                        <div class="grid gap-[6px] p-[16px]">
                            <p class="text-[16px] text-gray-800 dark:text-white leading-6">
                                {{ $comment->comment }}
                            </p>

                            {{-- Notes List Title and Time --}}
                            <p class="flex gap-2 text-gray-600 dark:text-gray-300 items-center">  
                                @if ($comment->customer_notified)
                                    <span class="h-fit text-[24px] rounded-full icon-done text-blue-600 bg-blue-100"></span> 

                                    @lang('admin::app.sales.orders.view.customer-notified', ['date' => core()->formatDate($comment->created_at, 'Y-m-d H:i:s a')])
                                @else
                                    <span class="h-fit text-[24px] rounded-full icon-cancel-1 text-red-600 bg-red-100"></span>
=======
                    <span class="block w-full border-b dark:border-gray-800"></span>

                    <!-- Comment List -->
                    @foreach ($order->comments()->orderBy('id', 'desc')->get() as $comment)
                        <div class="grid gap-1.5 p-4">
                            <p class="text-base text-gray-800 dark:text-white leading-6">
                                {{ $comment->comment }}
                            </p>

                            <!-- Notes List Title and Time -->
                            <p class="flex gap-2 text-gray-600 dark:text-gray-300 items-center">  
                                @if ($comment->customer_notified)
                                    <span class="h-fit text-2xl rounded-full icon-done text-blue-600 bg-blue-100"></span> 

                                    @lang('admin::app.sales.orders.view.customer-notified', ['date' => core()->formatDate($comment->created_at, 'Y-m-d H:i:s a')])
                                @else
                                    <span class="h-fit text-2xl rounded-full icon-cancel-1 text-red-600 bg-red-100"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                                    @lang('admin::app.sales.orders.view.customer-not-notified', ['date' => core()->formatDate($comment->created_at, 'Y-m-d H:i:s a')])
                                @endif
                            </p>
                        </div>

<<<<<<< HEAD
                        <span class="block w-full border-b-[1px] dark:border-gray-800"></span>
=======
                        <span class="block w-full border-b dark:border-gray-800"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @endforeach
                </div>
            </div>

            {!! view_render_event('sales.order.tabs.before', ['order' => $order]) !!}

<<<<<<< HEAD
            {{-- Right Component --}}
            <div class="flex flex-col gap-[8px] w-[360px] max-w-full max-sm:w-full">
                {{-- Customer and address information --}}
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
            <!-- Right Component -->
            <div class="flex flex-col gap-2 w-[360px] max-w-full max-sm:w-full">
                <!-- Customer and address information -->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-base  p-2.5 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.sales.orders.view.customer')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
<<<<<<< HEAD
                        <div class="{{ $order->billing_address ? 'pb-[16px]' : '' }}">
                            <div class="flex flex-col gap-[5px]">
=======
                        <div class="{{ $order->billing_address ? 'pb-4' : '' }}">
                            <div class="flex flex-col gap-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <p class="text-gray-800 font-semibold dark:text-white">
                                    {{ $order->customer_full_name }}
                                </p>

                                {!! view_render_event('sales.order.customer_full_name.after', ['order' => $order]) !!}

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $order->customer_email }}
                                </p>

                                {!! view_render_event('sales.order.customer_email.after', ['order' => $order]) !!}

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('admin::app.sales.orders.view.customer-group') : {{ $order->is_guest ? core()->getGuestCustomerGroup()?->name : ($order->customer->group->name ?? '') }}
                                </p>

                                {!! view_render_event('sales.order.customer_group.after', ['order' => $order]) !!}
                            </div>
                        </div>
                        
<<<<<<< HEAD
                        {{-- Billing Address --}}
                        @if ($order->billing_address)
                            <span class="block w-full border-b-[1px] dark:border-gray-800"></span>

                            <div class="{{ $order->shipping_address ? 'pb-[16px]' : '' }}">

                                <div class="flex items-center justify-between">
                                    <p class="text-gray-600 dark:text-gray-300  text-[16px] py-[16px] font-semibold">
=======
                        <!-- Billing Address -->
                        @if ($order->billing_address)
                            <span class="block w-full border-b dark:border-gray-800"></span>

                            <div class="{{ $order->shipping_address ? 'pb-4' : '' }}">

                                <div class="flex items-center justify-between">
                                    <p class="text-gray-600 dark:text-gray-300  text-base  py-4 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @lang('admin::app.sales.orders.view.billing-address')
                                    </p>
                                </div>

                                @include ('admin::sales.address', ['address' => $order->billing_address])

                                {!! view_render_event('sales.order.billing_address.after', ['order' => $order]) !!}
                            </div>
                        @endif

<<<<<<< HEAD
                        {{-- Shipping Address --}}
                        @if ($order->shipping_address)
                            <span class="block w-full border-b-[1px] dark:border-gray-800"></span>

                            <div class="flex items-center justify-between">
                                <p class="text-gray-600 dark:text-gray-300 text-[16px] py-[16px] font-semibold">
=======
                        <!-- Shipping Address -->
                        @if ($order->shipping_address)
                            <span class="block w-full border-b dark:border-gray-800"></span>

                            <div class="flex items-center justify-between">
                                <p class="text-gray-600 dark:text-gray-300 text-base  py-4 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.sales.orders.view.shipping-address')
                                </p>
                            </div>

                            @include ('admin::sales.address', ['address' => $order->shipping_address])

                            {!! view_render_event('sales.order.shipping_address.after', ['order' => $order]) !!}
                        @endif
                    </x-slot:content>
                </x-admin::accordion> 

<<<<<<< HEAD
                {{-- Order Information --}}
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
                <!-- Order Information -->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-base  p-2.5 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.sales.orders.view.order-information')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
<<<<<<< HEAD
                        <div class="flex w-full gap-[20px] justify-start">
                            <div class="flex flex-col gap-y-[6px]">
=======
                        <div class="flex w-full gap-5 justify-start">
                            <div class="flex flex-col gap-y-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('admin::app.sales.orders.view.order-date')
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('admin::app.sales.orders.view.order-status')
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('admin::app.sales.orders.view.channel')
                                </p>
                            </div>
                    
<<<<<<< HEAD
                            <div class="flex flex-col gap-y-[6px]">
                                {!! view_render_event('sales.order.created_at.before', ['order' => $order]) !!}

                                {{-- Order Date --}}
=======
                            <div class="flex flex-col gap-y-1.5">
                                {!! view_render_event('sales.order.created_at.before', ['order' => $order]) !!}

                                <!-- Order Date -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{core()->formatDate($order->created_at) }}
                                </p>

                                {!! view_render_event('sales.order.created_at.after', ['order' => $order]) !!}
                            
<<<<<<< HEAD
                                {{-- Order Status --}}
=======
                                <!-- Order Status -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{$order->status_label}}
                                </p>
                            
                                {!! view_render_event('sales.order.status_label.after', ['order' => $order]) !!}

<<<<<<< HEAD
                                {{-- Order Channel --}}
=======
                                <!-- Order Channel -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{$order->channel_name}}
                                </p>

                                {!! view_render_event('sales.order.channel_name.after', ['order' => $order]) !!}
                            </div>
                        </div>
                    </x-slot:content>
                </x-admin::accordion> 

<<<<<<< HEAD
                {{-- Payment and Shipping Information--}}    
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
                <!-- Payment and Shipping Information-->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-base  p-2.5 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.sales.orders.view.payment-and-shipping')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        <div>
<<<<<<< HEAD
                            {{-- Payment method --}}
=======
                            <!-- Payment method -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <p class="text-gray-800 font-semibold dark:text-white">
                                {{ core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title') }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.orders.view.payment-method')
                            </p>

<<<<<<< HEAD
                            {{-- Currency --}}
                            <p class="pt-[16px] text-gray-800 dark:text-white font-semibold">
=======
                            <!-- Currency -->
                            <p class="pt-4 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                {{ $order->order_currency_code }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.orders.view.currency')
                            </p>

                            @php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($order->payment->method); @endphp

<<<<<<< HEAD
                            {{-- Addtional details --}}
                            @if (! empty($additionalDetails))
                                <p class="pt-[16px] text-gray-800 dark:text-white font-semibold">
=======
                            <!-- Addtional details -->
                            @if (! empty($additionalDetails))
                                <p class="pt-4 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    {{ $additionalDetails['title'] }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $additionalDetails['value'] }}
                                </p>
                            @endif

                            {!! view_render_event('sales.order.payment-method.after', ['order' => $order]) !!}
                        </div>

<<<<<<< HEAD
                        {{-- Shipping Method and Price Details --}}
                        @if ($order->shipping_address)
                            <span class="block w-full mt-[16px] border-b-[1px] dark:border-gray-800  "></span>
                            <div class="pt-[16px]">
=======
                        <!-- Shipping Method and Price Details -->
                        @if ($order->shipping_address)
                            <span class="block w-full mt-4 border-b dark:border-gray-800"></span>

                            <div class="pt-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <p class="text-gray-800 font-semibold dark:text-white">
                                    {{ $order->shipping_title }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('admin::app.sales.orders.view.shipping-method')
                                </p>

<<<<<<< HEAD
                                <p class="pt-[16px] text-gray-800 dark:text-white font-semibold">
=======
                                <p class="pt-4 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    {{ core()->formatBasePrice($order->base_shipping_amount) }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('admin::app.sales.orders.view.shipping-price')
                                </p>
                            </div>

                            {!! view_render_event('sales.order.shipping-method.after', ['order' => $order]) !!}
                        @endif
                    </x-slot:content>
                </x-admin::accordion> 

<<<<<<< HEAD
                {{-- Invoice Information--}}    
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
                <!-- Invoice Information-->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-base  p-2.5 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.sales.orders.view.invoices') ({{ count($order->invoices) }})
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        @forelse ($order->invoices as $index => $invoice)
<<<<<<< HEAD
                            <div class="grid gap-y-[10px]">
=======
                            <div class="grid gap-y-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <div>
                                    <p class="text-gray-800 font-semibold dark:text-white">
                                        @lang('admin::app.sales.orders.view.invoice-id', ['invoice' => $invoice->increment_id ?? $invoice->id])
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ core()->formatDate($invoice->created_at, 'd M, Y H:i:s a') }}
                                    </p>
                                </div>

<<<<<<< HEAD
                                <div class="flex gap-[10px]">
                                    <a
                                        href="{{ route('admin.sales.invoices.view', $invoice->id) }}"
                                        class="text-[14px] text-blue-600 transition-all hover:underline"
=======
                                <div class="flex gap-2.5">
                                    <a
                                        href="{{ route('admin.sales.invoices.view', $invoice->id) }}"
                                        class="text-sm text-blue-600 transition-all hover:underline"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                        @lang('admin::app.sales.orders.view.view')
                                    </a>

                                    <a
                                        href="{{ route('admin.sales.invoices.print', $invoice->id) }}"
<<<<<<< HEAD
                                        class="text-[14px] text-blue-600 transition-all hover:underline"
=======
                                        class="text-sm text-blue-600 transition-all hover:underline"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                        @lang('admin::app.sales.orders.view.download-pdf')
                                    </a>
                                </div>
                            </div>

                            @if ($index < count($order->invoices) - 1)
<<<<<<< HEAD
                                <span class="block w-full mb-[16px] mt-[16px] border-b-[1px] dark:border-gray-800  "></span>
=======
                                <span class="block w-full mb-4 mt-4 border-b dark:border-gray-800"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @endif
                        @empty 
                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.orders.view.no-invoice-found')
                            </p>
                        @endforelse
                    </x-slot:content>
                </x-admin::accordion> 

<<<<<<< HEAD
                {{-- Shipment Information--}}    
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
                <!-- Shipment Information-->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-base  p-2.5 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.sales.orders.view.shipments') ({{ count($order->shipments) }})
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        @forelse ($order->shipments as $shipment)
<<<<<<< HEAD
                            <div class="grid gap-y-[10px]">
                                <div>
                                    {{-- Shipment Id --}}
=======
                            <div class="grid gap-y-2.5">
                                <div>
                                    <!-- Shipment Id -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <p class="text-gray-800 font-semibold dark:text-white">
                                        @lang('admin::app.sales.orders.view.shipment', ['shipment' => $shipment->id])
                                    </p>

<<<<<<< HEAD
                                    {{-- Shipment Created --}}
=======
                                    <!-- Shipment Created -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ core()->formatDate($shipment->created_at, 'd M, Y H:i:s a') }}
                                    </p>
                                </div>

<<<<<<< HEAD
                                <div class="flex gap-[10px]">
                                    <a
                                        href="{{ route('admin.sales.shipments.view', $shipment->id) }}"
                                        class="text-[14px] text-blue-600 transition-all hover:underline"
=======
                                <div class="flex gap-2.5">
                                    <a
                                        href="{{ route('admin.sales.shipments.view', $shipment->id) }}"
                                        class="text-sm text-blue-600 transition-all hover:underline"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                        @lang('admin::app.sales.orders.view.view')
                                    </a>
                                </div>
                            </div>
                        @empty 
                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.orders.view.no-shipment-found')
                            </p>
                        @endforelse
                    </x-slot:content>
                </x-admin::accordion> 

<<<<<<< HEAD
                {{-- Refund Information--}}    
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
                <!-- Refund Information-->
                <x-admin::accordion>
                    <x-slot:header>
                        <p class="text-gray-600 dark:text-gray-300 text-base  p-2.5 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.sales.orders.view.refund')
                        </p>
                    </x-slot:header>

                    <x-slot:content>
                        @forelse ($order->refunds as $refund)
<<<<<<< HEAD
                            <div class="grid gap-y-[10px]">
=======
                            <div class="grid gap-y-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <div>
                                    <p class="text-gray-800 font-semibold dark:text-white">
                                        @lang('admin::app.sales.orders.view.refund-id', ['refund' => $refund->id])
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ core()->formatDate($refund->created_at, 'd M, Y H:i:s a') }}
                                    </p>

<<<<<<< HEAD
                                    <p class="mt-[16px] text-gray-800 dark:text-white font-semibold">
=======
                                    <p class="mt-4 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @lang('admin::app.sales.orders.view.name')
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ $refund->order->customer_full_name }}
                                    </p>

<<<<<<< HEAD
                                    <p class="mt-[16px] text-gray-800 dark:text-white font-semibold">
=======
                                    <p class="mt-4 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @lang('admin::app.sales.orders.view.status')
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        @lang('admin::app.sales.orders.view.refunded') 
                                        
                                        <span class="text-gray-800 font-semibold dark:text-white">
                                            {{ core()->formatBasePrice($refund->base_grand_total) }}
                                        </span>
                                    </p>
                                </div>

<<<<<<< HEAD
                                <div class="flex gap-[10px]">
                                    <a
                                        href="{{ route('admin.sales.refunds.view', $refund->id) }}"
                                        class="text-[14px] text-blue-600 transition-all hover:underline"
=======
                                <div class="flex gap-2.5">
                                    <a
                                        href="{{ route('admin.sales.refunds.view', $refund->id) }}"
                                        class="text-sm text-blue-600 transition-all hover:underline"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                        @lang('admin::app.sales.orders.view.view')
                                    </a>
                                </div>
                            </div>
                        @empty 
                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.orders.view.no-refund-found')
                            </p>
                        @endforelse
                    </x-slot:content>
                </x-admin::accordion> 
            </div>

            {!! view_render_event('sales.order.tabs.after', ['order' => $order]) !!}
        </div>
    </div>
</x-admin::layouts>