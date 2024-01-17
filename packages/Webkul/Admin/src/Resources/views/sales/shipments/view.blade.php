<x-admin::layouts>
<<<<<<< HEAD
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('admin::app.sales.shipments.view.title', ['shipment_id' => $shipment->id])
        
    </x-slot:title>
=======
    <!-- Title of the page -->
    <x-slot:title>
        @lang('admin::app.sales.shipments.view.title', ['shipment_id' => $shipment->id])  
    </x-slot>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

    @php $order = $shipment->order; @endphp

    <div class="grid">
<<<<<<< HEAD
        <div class="flex  gap-[16px] justify-between items-center max-sm:flex-wrap">
            <p class="text-[20px] text-gray-800 dark:text-white font-bold leading-[24px]">
                @lang('admin::app.sales.shipments.view.title', ['shipment_id' => $shipment->id])
            </p>

            <div class="flex gap-x-[10px] items-center">
                {{-- Cancel Button --}}
=======
        <div class="flex  gap-4 justify-between items-center max-sm:flex-wrap">
            <p class="text-xl text-gray-800 dark:text-white font-bold leading-6">
                @lang('admin::app.sales.shipments.view.title', ['shipment_id' => $shipment->id])
            </p>

            <div class="flex gap-x-2.5 items-center">
                <!-- Back Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <a
                    href="{{ route('admin.sales.shipments.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
                >
                    @lang('admin::app.account.edit.back-btn')
                </a>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    {{-- body content --}}
    <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
        {{-- Left sub-component --}}
        <div class=" flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
            {{-- General --}}
            <div class="bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px] p-[16px]">
=======

    <!-- body content -->
    <div class="flex gap-2.5 mt-3.5 max-xl:flex-wrap">
        <!-- Left sub-component -->
        <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">
            <!-- General -->
            <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                <p class="text-base text-gray-800 dark:text-white font-semibold mb-4 p-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @lang('admin::app.sales.shipments.view.ordered-items') ({{count($shipment->items)}})
                </p>

                <div class="grid">
<<<<<<< HEAD
                    {{-- Shipment Items --}}
                    @foreach ($shipment->items as $index => $item)
                        <div class="flex gap-[10px] justify-between px-[16px] py-[24px]">
                            <div class="flex gap-[10px]">
                                <!-- Image -->
                                @if ($item->product?->base_image_url)
                                    <img
                                        class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded-[4px]"
                                        src="{{ $item->product->base_image_url }}"
                                    >
                                @else
                                    <div class="w-full h-[60px] max-w-[60px] max-h-[60px] relative border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion">
                                        <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                                        
                                        <p class="absolute w-full bottom-[5px] text-[6px] text-gray-400 text-center font-semibold"> 
=======
                    <!-- Shipment Items -->
                    @foreach ($shipment->items as $index => $item)
                        <div class="flex gap-2.5 justify-between px-4 py-6">
                            <div class="flex gap-2.5">
                                <!-- Image -->
                                @if ($item->product?->base_image_url)
                                    <img
                                        class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded"
                                        src="{{ $item->product->base_image_url }}"
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
                                    <p class="text-[16x] text-gray-800 dark:text-white font-semibold">{{ $item->name }}
                                    </p>
                                    <div class="flex flex-col gap-[6px] place-items-start">

=======
                                <div class="grid gap-1.5 place-content-start">
                                    <p class="text-base text-gray-800 dark:text-white font-semibold">
                                        {{ $item->name }}
                                    </p>

                                    <div class="flex flex-col gap-1.5 place-items-start">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @if (isset($item->additional['attributes']))
                                            <p class="text-gray-600 dark:text-gray-300">
                                                @foreach ($item->additional['attributes'] as $attribute)
                                                    {{ $attribute['attribute_name'] }} : {{ $attribute['option_label'] }}
                                                @endforeach
                                            </p>
                                        @endif

                                        <p class="text-gray-600 dark:text-gray-300">
                                            @lang('admin::app.sales.shipments.view.sku', ['sku' =>  $item->sku ])
                                        </p>
                                        
                                        <p class="text-gray-600 dark:text-gray-300">
                                            @lang('admin::app.sales.shipments.view.qty', ['qty' =>  $item->qty ])
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($index < count($shipment->items) - 1)
<<<<<<< HEAD
                            <span class="block w-full border-b-[1px] dark:border-gray-800"></span>
=======
                            <span class="block w-full border-b dark:border-gray-800"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

<<<<<<< HEAD
        {{-- Right sub-component --}}
        <div class="flex flex-col gap-[8px] w-[360px] max-w-full max-sm:w-full">
            {{-- component 1 --}}
            <x-admin::accordion>
                <x-slot:header>
                    <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
        <!-- Right sub-component -->
        <div class="flex flex-col gap-2 w-[360px] max-w-full max-sm:w-full">
            <!-- component 1 -->
            <x-admin::accordion>
                <x-slot:header>
                    <p class="text-gray-600 dark:text-gray-300 text-base  p-2.5 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.sales.shipments.view.customer')
                    </p>
                </x-slot:header>

                <x-slot:content>
<<<<<<< HEAD
                    <div class="flex flex-col pb-[16px]">
                        {{-- Customer Full Name --}}
=======
                    <div class="flex flex-col pb-4">
                        <!-- Customer Full Name -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <p class="text-gray-800 font-semibold dark:text-white">
                            {{ $shipment->order->customer_full_name }}
                        </p>

<<<<<<< HEAD
                        {{-- Customer Email --}}
=======
                        <!-- Customer Email -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.sales.shipments.view.email', ['email' =>  $shipment->order->customer_email ])
                        </p>
                    </div>

<<<<<<< HEAD
                    <span class="block w-full border-b-[1px] dark:border-gray-800"></span>

                    @if ($order->billing_address || $order->shipping_address)
                        {{-- Billing Address --}}
                        @if ($order->billing_address)
                            <div class="flex items-center justify-between">
                                <p class="text-gray-600 dark:text-gray-300 text-[16px] py-[16px] font-semibold">
=======
                    <span class="block w-full border-b dark:border-gray-800"></span>

                    @if ($order->billing_address || $order->shipping_address)
                        <!-- Billing Address -->
                        @if ($order->billing_address)
                            <div class="flex items-center justify-between">
                                <p class="text-gray-600 dark:text-gray-300 text-base  py-4 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.sales.shipments.view.billing-address')
                                </p>
                            </div>

                            @include ('admin::sales.address', ['address' => $order->billing_address])
                            
                        @endif

<<<<<<< HEAD
                        {{-- Shipping Address --}}
                        @if ($order->shipping_address)
                            <span class="block w-full mt-[16px] border-b-[1px] dark:border-gray-800"></span>

                            <div class="flex items-center justify-between">
                                <p class="text-gray-600 dark:text-gray-300 text-[16px] py-[16px] font-semibold">
=======
                        <!-- Shipping Address -->
                        @if ($order->shipping_address)
                            <span class="block w-full mt-4 border-b dark:border-gray-800"></span>

                            <div class="flex items-center justify-between">
                                <p class="text-gray-600 dark:text-gray-300 text-base  py-4 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.sales.shipments.view.shipping-address')
                                </p>
                            </div>

                            @include ('admin::sales.address', ['address' => $order->shipping_address])

                        @endif
                    @endif
                </x-slot:content>
            </x-admin::accordion> 
         
<<<<<<< HEAD
            {{-- component 2 --}}
            <x-admin::accordion>
                <x-slot:header>
                    <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
            <!-- component 2 -->
            <x-admin::accordion>
                <x-slot:header>
                    <p class="text-gray-600 dark:text-gray-300 text-base  p-2.5 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.sales.shipments.view.order-information')
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
                                @lang('admin::app.sales.shipments.view.order-id')     
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.shipments.view.order-date')     
                           </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.shipments.view.order-status')        
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.shipments.view.channel')                     
                            </p>
                        </div>

<<<<<<< HEAD
                        <div class="flex  flex-col gap-y-[6px]">
                            {{-- Order Id --}}
                            <p class="text-blue-600 font-semibold">
                                <a href="{{ route('admin.sales.orders.view', $order->id) }}">#{{ $order->increment_id }}</a>
                            </p>

                            {{-- Order Date --}}
=======
                        <div class="flex flex-col gap-y-1.5">
                            <!-- Order Id -->
                            <p class="text-blue-600 font-semibold">
                                <a href="{{ route('admin.sales.orders.view', $order->id) }}">
                                    #{{ $order->increment_id }}
                                </a>
                            </p>

                            <!-- Order Date -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ core()->formatDate($order->created_at) }}
                            </p>

<<<<<<< HEAD
                            {{-- Order Status --}}
=======
                            <!-- Order Status -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ $order->status_label }}
                            </p>

<<<<<<< HEAD
                            {{-- Order Channel --}}
=======
                            <!-- Order Channel -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <p class="text-gray-600 dark:text-gray-300">
                                {{ $order->channel_name }}
                            </p>
                        </div>
                    </div>
                </x-slot:content>
            </x-admin::accordion>

<<<<<<< HEAD
            {{-- Component 3 --}}
            <x-admin::accordion>
                <x-slot:header>
                    <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
            <!-- Component 3 -->
            <x-admin::accordion>
                <x-slot:header>
                    <p class="text-gray-600 dark:text-gray-300 text-base  p-2.5 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.sales.shipments.view.payment-and-shipping')
                    </p>
                </x-slot:header>

                <x-slot:content>
<<<<<<< HEAD
                    <div class="pb-[16px]">
                        {{-- Payment method --}}
=======
                    <div class="pb-4">
                        <!-- Payment method -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <p class="text-gray-800 font-semibold dark:text-white">
                            {{ core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title') }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.sales.shipments.view.payment-method')
                        </p>

<<<<<<< HEAD
                        {{-- Currency Code --}}
                        <p class="pt-[16px] text-gray-800 dark:text-white font-semibold">  
=======
                        <!-- Currency Code -->
                        <p class="pt-4 text-gray-800 dark:text-white font-semibold">  
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            {{ $order->order_currency_code }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.sales.shipments.view.currency')
                        </p>
                    </div>

<<<<<<< HEAD
                    {{-- Horizontal Line --}}
                    <span class="block w-full border-b-[1px] dark:border-gray-800"></span>
                
                    <div class="pt-[16px]">
                        {{-- Shipping Menthod --}}
=======
                    <!-- Horizontal Line -->
                    <span class="block w-full border-b dark:border-gray-800"></span>
                
                    <div class="pt-4">
                        <!-- Shipping Menthod -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <p class="text-gray-800 font-semibold dark:text-white">
                            {{ $order->shipping_title }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.sales.shipments.view.shipping-method')
                        </p>

<<<<<<< HEAD
                        {{-- Inventory Source --}}
                        <p class="pt-[16px] text-gray-800 dark:text-white font-semibold">
=======
                        <!-- Inventory Source -->
                        <p class="pt-4 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            {{ core()->formatBasePrice($order->base_shipping_amount) }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.sales.shipments.view.shipping-price')
                        </p>

                        @if (
                            $shipment->inventory_source
                            || $shipment->inventory_source_name
                        )
<<<<<<< HEAD
                            <p class="pt-[16px] text-gray-800 dark:text-white font-semibold">
=======
                            <p class="pt-4 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                {{ $shipment->inventory_source ? $shipment->inventory_source->name : $shipment->inventory_source_name }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.shipments.view.inventory-source')
                            </p>
                        @endif

                        @if ($shipment->carrier_title)
<<<<<<< HEAD
                            <p class="pt-[16px] text-gray-800 dark:text-white font-semibold">
=======
                            <p class="pt-4 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                {{ $shipment->carrier_title }}
                            </p>
                            
                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.shipments.view.carrier-title')
                            </p>
                        @endif

                        @if ($shipment->track_number)
<<<<<<< HEAD
                            <p class="pt-[16px] text-gray-800 dark:text-white font-semibold">
=======
                            <p class="pt-4 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                {{ $shipment->track_number }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.shipments.view.tracking-number')
                            </p>
                        @endif
                    </div>
                </x-slot:content>
            </x-admin::accordion> 
        </div>
    </div>
</x-admin::layouts>
