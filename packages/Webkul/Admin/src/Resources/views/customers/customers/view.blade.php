<x-admin::layouts>
<<<<<<< HEAD
    {{-- Page Title --}}
    <x-slot:title>
        @lang('admin::app.customers.customers.view.title')
    </x-slot:title>

    <div class="grid">
        <div class="flex gap-[16px] justify-between items-center max-sm:flex-wrap">
            <div class="flex gap-[10px] items-center">
                <p class="text-[20px] text-gray-800 dark:text-white font-bold leading-[24px]">
=======
    <!-- Page Title -->
    <x-slot:title>
        @lang('admin::app.customers.customers.view.title')
    </x-slot>

    <div class="grid">
        <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
            <div class="flex gap-2.5 items-center">
                <p class="text-xl text-gray-800 dark:text-white font-bold leading-6">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    {{ $customer->first_name . " " . $customer->last_name }}
                </p>
                
                <div>
<<<<<<< HEAD
                    {{-- Customer Status --}}
                    @if ($customer->status == 1)
                        <span class="label-active text-[14px] mx-[5px]">
                            @lang('admin::app.customers.customers.view.active')
                        </span>
                    @else    
                        <span class="label-cancelled text-[14px] mx-[5px]">
=======
                    <!-- Customer Status -->
                    @if ($customer->status == 1)
                        <span class="label-active text-sm mx-1.5">
                            @lang('admin::app.customers.customers.view.active')
                        </span>
                    @else    
                        <span class="label-canceled text-sm mx-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.customers.customers.view.inactive')
                        </span>
                    @endif

<<<<<<< HEAD
                    {{-- Customer Suspended Status --}}
                    @if ($customer->is_suspended == 1)
                        <span class="label-cancelled text-[14px]">
=======
                    <!-- Customer Suspended Status -->
                    @if ($customer->is_suspended == 1)
                        <span class="label-canceled text-sm">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.customers.customers.view.suspended')
                        </span>
                    @endif
                </div>
            </div>    

<<<<<<< HEAD
            {{-- Back Button --}}
=======
            <!-- Back Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <a
                href="{{ route('admin.customers.customers.index') }}"
                class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
            >
                @lang('admin::app.customers.customers.view.back-btn')
            </a>
        </div>
    </div>

    {!! view_render_event('bagisto.admin.customers.customers.view.filters.before') !!}

<<<<<<< HEAD
    {{-- Filters --}}
    <div class="flex gap-x-[4px] gap-y-[8px] items-center flex-wrap mt-[28px]">
        {{-- Address Create component --}}
        @include('admin::customers.addresses.create')

        {{-- Account Delete button --}}
        @if (bouncer()->hasPermission('customers.customers.delete'))
            <div 
                class="inline-flex gap-x-[8px] items-center justify-between w-full max-w-max px-[4px] py-[6px] text-gray-600 dark:text-gray-300 font-semibold text-center cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800 hover:rounded-[6px]"
=======
    <!-- Filters -->
    <div class="flex gap-x-1 gap-y-2 items-center flex-wrap mt-7">
        <!-- Address Create component -->
        @include('admin::customers.addresses.create')

        <!-- Account Delete button -->
        @if (bouncer()->hasPermission('customers.customers.delete'))
            <div 
                class="inline-flex gap-x-2 items-center justify-between w-full max-w-max px-1 py-1.5 text-gray-600 dark:text-gray-300 font-semibold text-center cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800 hover:rounded-md"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @click="$emitter.emit('open-confirm-modal', {
                    message: '@lang('admin::app.customers.customers.view.account-delete-confirmation')',

                    agree: () => {
                        this.$refs['delete-account'].submit()
                    }
                })"
            >
<<<<<<< HEAD
                <span class="icon-cancel text-[24px]"></span>

                @lang('admin::app.customers.customers.view.delete-account')

                {{-- Delete Customer Account --}}
=======
                <span class="icon-cancel text-2xl"></span>

                @lang('admin::app.customers.customers.view.delete-account')

                <!-- Delete Customer Account -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <form 
                    method="post"
                    action="{{ route('admin.customers.customers.delete', $customer->id) }}" 
                    ref="delete-account"
                >
                    @csrf
                </form>
            </div>
        @endif
    </div>

    {!! view_render_event('bagisto.admin.customers.customers.view.filters.after') !!}

<<<<<<< HEAD
    {{-- Content --}}
    <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
        {{-- Left Component --}}
        <div class=" flex flex-col gap-[8px] flex-1 max-xl:flex-auto">

            {!! view_render_event('bagisto.admin.customers.customers.view.card.orders.before') !!}

            {{-- Orders --}}
            <div class=" bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                @if ($totalOrderCount = count($customer->orders))
                    <div class=" p-[16px] flex justify-between">
                        {{-- Total Order Count --}}
                        <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
=======
    <!-- Content -->
    <div class="flex gap-2.5 mt-3.5 max-xl:flex-wrap">
        <!-- Left Component -->
        <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">

            {!! view_render_event('bagisto.admin.customers.customers.view.card.orders.before') !!}

            @php $orders = $customer->orders(); @endphp

            <!-- Orders -->
            <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                @if ($totalOrderCount = $orders->count())
                    <div class="p-4 flex justify-between">
                        <!-- Total Order Count -->
                        <p class="text-base text-gray-800 leading-none dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.customers.customers.view.orders', ['order_count' => $totalOrderCount])
                        </p>    

                        @php
<<<<<<< HEAD
                            $revenue = core()->currency($customer->orders
                                ->whereNotIn('status', ['canceled', 'closed'])
                                ->sum('grand_total'));
                        @endphp

                        <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
=======
                            $revenue = core()->formatBasePrice($orders->get()
                                ->whereNotIn('status', ['canceled', 'closed'])
                                ->sum('base_grand_total_invoiced'));
                        @endphp

                        <p class="text-base text-gray-800 leading-none dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.customers.customers.view.total-revenue', ['revenue' => $revenue])
                        </p>
                    </div>

<<<<<<< HEAD
                    {{-- Order Details --}}
                    <div class="table-responsive grid w-full">
                        @foreach ($customer->orders as $order)
                            <div class="flex justify-between items-center px-[16px] py-[16px] transition-all hover:bg-gray-50 dark:hover:bg-gray-950">
                                <div class="row grid grid-cols-3 w-full">
                                    <div class="flex gap-[10px]">
                                        <div class="flex flex-col gap-[6px]">
                                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
=======
                    <!-- Order Details -->
                    <div class="table-responsive grid w-full">
                        @foreach ($orders->paginate(10) as $order)
                            <div class="flex justify-between items-center px-4 py-4 transition-all hover:bg-gray-50 dark:hover:bg-gray-950">
                                <div class="row grid grid-cols-3 w-full">
                                    <div class="flex gap-2.5">
                                        <div class="flex flex-col gap-1.5">
                                            <p class="text-base text-gray-800 leading-none dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                @lang('admin::app.customers.customers.view.increment-id', ['increment_id' => $order->increment_id])
                                            </p>

                                            <p class="text-gray-600 dark:text-gray-300">
                                                {{ $order->created_at }}
                                            </p>

                                            @switch($order->status)
                                                @case('processing')
                                                    <p class="label-active">
                                                        @lang('admin::app.customers.customers.view.processing')
                                                    </p>
                                                    @break

                                                @case('completed')
                                                    <p class="label-active">
                                                        @lang('admin::app.customers.customers.view.completed')
                                                    </p>
                                                    @break

                                                @case('pending')
                                                    <p class="label-pending">
                                                        @lang('admin::app.customers.customers.view.pending')
                                                    </p>
                                                    @break

                                                @case('canceled')
<<<<<<< HEAD
                                                    <p class="label-cancelled">
=======
                                                    <p class="label-canceled">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                        @lang('admin::app.customers.customers.view.canceled')
                                                    </p>
                                                    @break

                                                @case('closed')
                                                    <p class="label-closed">
                                                        @lang('admin::app.customers.customers.view.closed')
                                                    </p>
                                                    @break

                                            @endswitch
                                        </div>
                                    </div>

<<<<<<< HEAD
                                    <div class="flex flex-col gap-[6px]">
                                        {{-- Grand Total --}}
                                        <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                            {{ core()->currency($order->grand_total ) }}
                                        </p>

                                        {{-- Payment methods --}}   
=======
                                    <div class="flex flex-col gap-1.5">
                                        <!-- Grand Total -->
                                        <p class="text-base text-gray-800 leading-none dark:text-white font-semibold">
                                            {{ core()->formatBasePrice($order->base_grand_total ) }}
                                        </p>

                                        <!-- Payment methods -->   
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        <p class="text-gray-600 dark:text-gray-300">
                                            @lang('admin::app.customers.customers.view.pay-by', ['payment_method' => core()->getConfigData('sales.payment_methods.' . $order->payment->method . '.title')])
                                        </p>

<<<<<<< HEAD
                                        {{-- Channel Code --}}
                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ $order->channel->code }}
                                        </p>
                                    </div>

                                    {{-- Order Address Details --}}
                                    <div class="flex flex-col gap-[6px]">
                                        <p class="text-[16px] text-gray-800 dark:text-white">
                                            {{ $order->billingAddress->name }}
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ $order->billingAddress->email }}
                                        </p>

                                        <p class="text-gray-600 dark:text-gray-300">
                                            @if($order->billingAddress->address1)
                                                {{ $order->billingAddress->address1 }},
                                            @endif

                                            @if($order->billingAddress->city)
                                                {{ $order->billingAddress->city }},
                                            @endif

                                            @if($order->billingAddress->state)
                                                {{ $order->billingAddress->state  }}
                                            @endif
                                        </p>
                                    </div>
=======
                                        <!-- Channel Code -->
                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ $order?->channel_name }}
                                        </p>                                        
                                    </div>

                                    <!-- Order Address Details -->
                                    @if($order->billingAddress)
                                        <div class="flex flex-col gap-1.5">
                                            <p class="text-base text-gray-800 dark:text-white">
                                                {{ $order->billingAddress->name }}
                                            </p>

                                            <p class="text-gray-600 dark:text-gray-300">
                                                {{ $order->billingAddress->email }}
                                            </p>

                                            <p class="text-gray-600 dark:text-gray-300">
                                                {{
                                                    collect([
                                                        $order->billingAddress->address1,
                                                        $order->billingAddress->city,
                                                        $order->billingAddress->state,
                                                    ])
                                                    ->filter(fn ($string) =>! empty($string))
                                                    ->join(', ')
                                                }}
                                            </p>                                        
                                        </div>
                                    @endif
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                </div>

                                <a 
                                    href="{{ route('admin.sales.orders.view', $order->id) }}" 
<<<<<<< HEAD
                                    class="icon-sort-right text-[24px] ltr:ml-[4px] rtl:mr-[4px] p-[6px] rounded-[6px] cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800"
=======
                                    class="icon-sort-right text-2xl ltr:ml-1 rtl:mr-1 p-1.5 rounded-md cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                </a>
                            </div>

<<<<<<< HEAD
                            <span class="block w-full border-b-[1px] dark:border-gray-800"></span>
                        @endforeach
                    </div>
                @else
                    {{-- Empty Container --}} 
                    <div class="p-[16px] flex justify-between">
                        <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
=======
                            <span class="block w-full border-b dark:border-gray-800"></span>
                        @endforeach
                    </div>

                    @php $pagination = $orders->paginate(10)->toArray(); @endphp

                    <!-- Pagination -->
                    @if ($totalOrderCount > 10)
                        <div class="flex gap-x-2 items-center p-4 border-t dark:border-gray-800">
                            <div
                                class="inline-flex gap-x-1 items-center justify-between ltr:ml-2 rtl:mr-2 text-gray-600 dark:text-gray-300 py-1.5 px-2 leading-6 text-center w-full max-w-max bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md marker:shadow appearance-none focus:ring-2 focus:outline-none focus:ring-black max-sm:hidden" 
                            >
                                {{ $pagination['per_page'] }}
                            </div>
    
                            <span class="text-gray-600 dark:text-gray-300 whitespace-nowrap">
                                @lang('admin::app.customers.customers.view.per-page')
                            </span>
    
                            <p
                                class="inline-flex gap-x-1 items-center justify-between ltr:ml-2 rtl:mr-2 text-gray-600 dark:text-gray-300 py-1.5 px-2 leading-6 text-center w-full max-w-max bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md marker:shadow appearance-none focus:ring-2 focus:outline-none focus:ring-black max-sm:hidden"
                            >
                                {{ $pagination['current_page'] }}
                            </p>
    
                            <span class="text-gray-600 dark:text-gray-300 whitespace-nowrap">
                                @lang('admin::app.customers.customers.view.of')
                            </span>
    
                            <span class="text-gray-600 dark:text-gray-300 whitespace-nowrap">
                                {{ $pagination['last_page'] }}
                            </span>
    
                            <!-- Prev & Next Page Button -->
                            <div class="flex gap-1 items-center">
                                <a href="{{ $pagination['first_page_url'] }}">
                                    <div class="inline-flex gap-x-1 items-center justify-between ltr:ml-2 rtl:mr-2 text-gray-600 dark:text-gray-300 p-1.5 text-center w-full max-w-max bg-white dark:bg-gray-900 border rounded-md dark:border-gray-800 cursor-pointer transition-all hover:border hover:bg-gray-100 dark:hover:bg-gray-950 marker:shadow appearance-none focus:ring-2 focus:outline-none focus:ring-black">
                                        <span class="icon-sort-left text-2xl"></span>
                                    </div>
                                </a>
    
                                <a href="{{ $pagination['next_page_url'] }}">
                                    <div class="inline-flex gap-x-1 items-center justify-between ltr:ml-2 rtl:mr-2 text-gray-600 dark:text-gray-300 p-1.5 text-center w-full max-w-max bg-white dark:bg-gray-900 border rounded-md dark:border-gray-800 cursor-pointer transition-all hover:border hover:bg-gray-100 dark:hover:bg-gray-950 marker:shadow appearance-none focus:ring-2 focus:outline-none focus:ring-black">
                                        <span class="icon-sort-right text-2xl"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @else
                    <!-- Empty Container --> 
                    <div class="p-4 flex justify-between">
                        <p class="text-base text-gray-800 leading-none dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.customers.customers.view.orders', ['order_count' => $totalOrderCount])
                        </p>
                    </div>

<<<<<<< HEAD
                    {{-- Order Details --}}
                    <div class="table-responsive grid w-full">
                        <div class="grid gap-[14px] justify-center justify-items-center py-[40px] px-[10px]">
                            <!-- Placeholder Image -->
                            <img
                                src="{{ bagisto_asset('images/empty-placeholders/orders-empty.svg') }}"
                                class="w-[80px] h-[80px] border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion"
                            />

                            <div class="flex flex-col items-center">
                                <p class="text-[16px] text-gray-400 font-semibold"> 
=======
                    <!-- Order Details -->
                    <div class="table-responsive grid w-full">
                        <div class="grid gap-3.5 justify-center justify-items-center py-10 px-2.5">
                            <!-- Placeholder Image -->
                            <img
                                src="{{ bagisto_asset('images/empty-placeholders/orders.svg') }}"
                                class="w-20 h-20 border border-dashed border-gray-300 dark:border-gray-800 rounded dark:invert dark:mix-blend-exclusion"
                            />

                            <div class="flex flex-col items-center">
                                <p class="text-base text-gray-400 font-semibold"> 
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.customers.customers.view.empty-order')
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {!! view_render_event('bagisto.admin.customers.customers.view.card.orders.after') !!}

            {!! view_render_event('bagisto.admin.customers.customers.view.card.invoices.before') !!}

<<<<<<< HEAD
            {{-- Invoices --}}
            <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                @if ($totalInvoiceCount = count($customer->invoices))
                    {{--Invoice Count --}}
                    <p class="p-[16px] text-[16px] text-gray-800 dark:text-white font-semibold">
                        @lang('admin::app.customers.customers.view.invoice', ['invoice_count' => $totalInvoiceCount])
                    </p>

                    {{-- Invoice Table --}}
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left min-w-[800px]">
                            <thead class="text-[14px] text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 border-b-[1px] border-gray-200 dark:border-gray-800">
                                <tr>
                                    @foreach (['invoice-id', 'invoice-date', 'invoice-amount', 'order-id'] as $item)
                                        <th scope="col" class="px-6 py-[16px] font-semibold"> 
=======
            <!-- Invoices -->
            <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                @if ($totalInvoiceCount = count($customer->invoices))
                    <!--Invoice Count -->
                    <p class="p-4 text-base text-gray-800 leading-none dark:text-white font-semibold">
                        @lang('admin::app.customers.customers.view.invoice', ['invoice_count' => $totalInvoiceCount])
                    </p>

                    <!-- Invoice Table -->
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left min-w-[800px]">
                            <thead class="text-sm text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
                                <tr>
                                    @foreach (['invoice-id', 'invoice-date', 'invoice-amount', 'order-id'] as $item)
                                        <th scope="col" class="px-6 py-4 font-semibold"> 
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @lang('admin::app.customers.customers.view.' . $item)
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>

                            @foreach ($customer->invoices as $invoice)
                                <tbody>
<<<<<<< HEAD
                                    {{-- Invoice Details --}}
                                    <tr class="bg-white dark:bg-gray-900 border-b transition-all hover:bg-gray-50 dark:hover:bg-gray-950 dark:border-gray-800">
                                        <td class="px-6 py-[16px] text-gray-600 dark:text-gray-300">
                                            @lang('admin::app.customers.customers.view.invoice-id-prefix', ['invoice_id' => $invoice->id] )
                                        </td>

                                        <td class="px-6 py-[16px] text-gray-600 dark:text-gray-300 whitespace-nowrap">
                                            {{ $invoice->created_at }}
                                        </td>

                                        <td scope="row" class="px-6 py-[16px] text-gray-600 dark:text-gray-300">
                                            {{ core()->currency($invoice->grand_total) }}
                                        </td>

                                        <td class="px-6 py-[16px] text-gray-600 dark:text-gray-300">
                                            @lang('admin::app.customers.customers.view.order-id-prefix', ['order_id' => $invoice->order_id] )
                                        </td>
=======
                                    <!-- Invoice Details -->
                                    <tr class="bg-white dark:bg-gray-900 border-b transition-all hover:bg-gray-50 dark:hover:bg-gray-950 dark:border-gray-800">
                                        <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                            @lang('admin::app.customers.customers.view.invoice-id-prefix', ['invoice_id' => $invoice->id] )
                                        </td>

                                        <td class="px-6 py-4 text-gray-600 dark:text-gray-300 whitespace-nowrap">
                                            {{ $invoice->created_at }}
                                        </td>

                                        <td scope="row" class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                            {{ core()->formatBasePrice($invoice->base_grand_total) }}
                                        </td>

                                        <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                            @lang('admin::app.customers.customers.view.order-id-prefix', ['order_id' => $invoice->order_id] )
                                        </td>

                                        <td class="text-center">
                                            <a 
                                                href="{{ route('admin.sales.invoices.view', $invoice->id) }}" 
                                                class="icon-sort-right text-2xl ltr:ml-1 rtl:mr-1 p-1.5 rounded-md cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800"
                                                role="presentation"
                                            >
                                            </a>
                                        </td>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @else
<<<<<<< HEAD
                    {{-- Empty Container --}}
                    <div class="flex justify-between p-[16px]">
                        <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
=======
                    <!-- Empty Container -->
                    <div class="flex justify-between p-4">
                        <p class="text-base text-gray-800 leading-none dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.customers.customers.view.invoice', ['invoice_count' => $totalInvoiceCount])
                        </p>
                    </div>

                    <div class="table-responsive grid w-full">
<<<<<<< HEAD
                        <div class="grid gap-[14px] justify-center justify-items-center py-[40px] px-[10px]">
                            {{-- Placeholder Image --}}
                            <img
                                src="{{ bagisto_asset('images/settings/invoice.svg') }}"
                                class="w-[80px] h-[80px] border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion"
                            />

                            <div class="flex flex-col items-center">
                                <p class="text-[16px] text-gray-400 font-semibold"> 
=======
                        <div class="grid gap-3.5 justify-center justify-items-center py-10 px-2.5">
                            <!-- Placeholder Image -->
                            <img
                                src="{{ bagisto_asset('images/settings/invoice.svg') }}"
                                class="w-20 h-20 border border-dashed border-gray-300 dark:border-gray-800 rounded dark:invert dark:mix-blend-exclusion"
                            />

                            <div class="flex flex-col items-center">
                                <p class="text-base text-gray-400 font-semibold"> 
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.customers.customers.view.empty-invoice')
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {!! view_render_event('bagisto.admin.customers.customers.view.card.invoices.after') !!}

            {!! view_render_event('bagisto.admin.customers.customers.view.card.reviews.before') !!}

<<<<<<< HEAD
            {{-- Reviews --}}
            <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                @if($totalReviewsCount = count($customer->reviews) )
                    {{-- Reviews Count --}}
                    <p class=" p-[16px] text-[16px] text-gray-800 dark:text-white font-semibold">
=======
            <!-- Reviews -->
            <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                @if($totalReviewsCount = count($customer->reviews))
                    <!-- Reviews Count -->
                    <p class="p-4 text-base text-gray-800 leading-none dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.customers.customers.view.reviews', ['review_count' => $totalReviewsCount])
                    </p>

                    @foreach($customer->reviews as $review)
<<<<<<< HEAD
                        {{-- Reviews Details --}}
                        <div class="grid gap-y-[16px] p-[16px] transition-all hover:bg-gray-50 dark:hover:bg-gray-950">
                            <div class="flex justify-start [&amp;>*]:flex-1">
                                <div class="flex flex-col gap-[6px]">
                                    {{-- Review Name --}}
                                    <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                        {{ $review->name }}
                                    </p>

                                    {{-- Product Name --}}
=======
                        <!-- Reviews Details -->
                        <div class="grid gap-y-4 p-4 transition-all hover:bg-gray-50 dark:hover:bg-gray-950">
                            <div class="flex justify-start [&amp;>*]:flex-1">
                                <div class="flex flex-col gap-1.5">
                                    <!-- Review Name -->
                                    <p class="text-base text-gray-800 leading-none dark:text-white font-semibold">
                                        {{ $review->name }}
                                    </p>

                                    <!-- Product Name -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ $review->product->name }}
                                    </p>

<<<<<<< HEAD
                                    {{-- Review Status --}}
=======
                                    <!-- Review Status -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @switch($review->status)
                                        @case('approved')
                                            <p class="label-active">
                                                @lang('admin::app.customers.customers.view.approved')
                                            </p>
                                            @break

                                        @case('pending')
                                            <p class="label-pending">
                                                @lang('admin::app.customers.customers.view.pending')
                                            </p>
                                            @break

                                        @case('disapproved')
<<<<<<< HEAD
                                            <p class="label-cancelled">
=======
                                            <p class="label-canceled">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                @lang('admin::app.customers.customers.view.disapproved')
                                            </p>
                                            @break

                                    @endswitch
                                </div>

<<<<<<< HEAD
                                <div class="flex flex-col gap-[6px]">
                                    {{-- need to update shivendra-webkul --}}
=======
                                <div class="flex flex-col gap-1.5">
                                    <!-- need to update shivendra-webkul -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <div class="flex">
                                        <x-admin::star-rating 
                                            :is-editable="false"
                                            :value="$review->rating"
                                        >
                                        </x-admin::star-rating>
                                    </div>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ $review->created_at }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        @lang('admin::app.customers.customers.view.id', ['id' => $review->id])
                                    </p>
                                </div>
                            </div>

<<<<<<< HEAD
                            <div class="flex justify-between gap-x-[16px] items-center">
                                <div class="flex flex-col gap-[6px]">
                                    {{-- Review Title --}}
                                    <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                        {{ $review->title }}
                                    </p>

                                    {{-- Review Comment --}}
=======
                            <div class="flex justify-between gap-x-4 items-center">
                                <div class="flex flex-col gap-1.5">
                                    <!-- Review Title -->
                                    <p class="text-base text-gray-800 leading-none dark:text-white font-semibold">
                                        {{ $review->title }}
                                    </p>

                                    <!-- Review Comment -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ $review->comment }}
                                    </p>
                                </div>

                                <a 
                                    href="{{ route('admin.catalog.products.edit', $review->product->id) }}"
<<<<<<< HEAD
                                    class="icon-sort-right text-[24px] ltr:ml-[4px] rtl:mr-[4px] p-[6px] rounded-[6px] cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800"
=======
                                    class="icon-sort-right text-2xl ltr:ml-1 rtl:mr-1 p-1.5 rounded-md cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                </a>
                            </div>
                        </div>

<<<<<<< HEAD
                        <span class="block w-full border-b-[1px] dark:border-gray-800"></span>
                    @endforeach    
                @else
                    {{-- Empty Invoice Container --}}
                    <div class="flex justify-between p-[16px]">
                        <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
=======
                        <span class="block w-full border-b dark:border-gray-800"></span>
                    @endforeach
                @else
                    <!-- Empty Invoice Container -->
                    <div class="flex justify-between p-4">
                        <p class="text-base text-gray-800 leading-none dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.customers.customers.view.reviews', ['review_count' => $totalReviewsCount])
                        </p>
                    </div>

                    <div class="table-responsive grid w-full">
<<<<<<< HEAD
                        <div class="grid gap-[14px] justify-center justify-items-center py-[40px] px-[10px]">
                            {{-- Placeholder Image --}}
                            <img
                                src="{{ bagisto_asset('images/empty-placeholders/reviews-empty.svg') }}"
                                class="w-[80px] h-[80px] border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion"
                            />

                            <div class="flex flex-col items-center">
                                <p class="text-[16px] text-gray-400 font-semibold"> 
=======
                        <div class="grid gap-3.5 justify-center justify-items-center py-10 px-2.5">
                            <!-- Placeholder Image -->
                            <img
                                src="{{ bagisto_asset('images/empty-placeholders/reviews.svg') }}"
                                class="w-20 h-20 border border-dashed border-gray-300 dark:border-gray-800 rounded dark:invert dark:mix-blend-exclusion"
                            />

                            <div class="flex flex-col items-center">
                                <p class="text-base text-gray-400 font-semibold"> 
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                   @lang('admin::app.customers.customers.view.empty-review')
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
          
            {!! view_render_event('bagisto.admin.customers.customers.view.card.reviews.after') !!}

            {!! view_render_event('bagisto.admin.customers.customers.view.card.notes.before') !!}

<<<<<<< HEAD
            {{-- Notes Form --}}
            <div class="bg-white dark:bg-gray-900  rounded box-shadow">
                <p class="p-[16px] pb-0 text-[16px] text-gray-800 dark:text-white font-semibold">
=======
            <!-- Notes Form -->
            <div class="bg-white dark:bg-gray-900  rounded box-shadow">
                <p class="p-4 pb-0 text-base text-gray-800 leading-none dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @lang('admin::app.customers.customers.view.add-note')
                </p>

                <x-admin::form 
                    :action="route('admin.customer.note.store', $customer->id)"
                >
<<<<<<< HEAD
                    <div class="p-[16px]">
                        {{-- Note --}}
                        <x-admin::form.control-group class="mb-[10px]">
=======
                    <div class="p-4">
                        <!-- Note -->
                        <x-admin::form.control-group>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <x-admin::form.control-group.control
                                type="textarea"
                                name="note" 
                                id="note"
                                rules="required"
                                :label="trans('admin::app.customers.customers.view.note')"
                                :placeholder="trans('admin::app.customers.customers.view.note-placeholder')"
                                rows="3"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="note"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>

                        <div class="flex justify-between items-center">
                            <label 
<<<<<<< HEAD
                                class="flex gap-[4px] w-max items-center p-[6px] cursor-pointer select-none"
=======
                                class="flex gap-1 w-max items-center p-1.5 cursor-pointer select-none"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                for="customer_notified"
                            >
                                <input 
                                    type="checkbox" 
                                    name="customer_notified"
                                    id="customer_notified"
                                    value="1"
                                    class="hidden peer"
                                >
                    
<<<<<<< HEAD
                                <span class="icon-uncheckbox rounded-[6px] text-[24px] cursor-pointer peer-checked:icon-checked peer-checked:text-blue-600 "></span>
                    
                                <p class="flex gap-x-[4px] items-center cursor-pointer text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100 font-semibold">
=======
                                <span class="icon-uncheckbox rounded-md text-2xl cursor-pointer peer-checked:icon-checked peer-checked:text-blue-600"></span>
                    
                                <p class="flex gap-x-1 items-center cursor-pointer text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.customers.customers.view.notify-customer')
                                </p>
                            </label>
                            
<<<<<<< HEAD
                            {{--Note Submit Button --}}
=======
                            <!--Note Submit Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <button
                                type="submit"
                                class="secondary-button"
                            >
                                @lang('admin::app.customers.customers.view.submit-btn-title')
                            </button>
                        </div>
                    </div>
                </x-admin::form> 

<<<<<<< HEAD
                {{-- Notes List --}}
                <span class="block w-full border-b-[1px] dark:border-gray-800"></span>

                @foreach ($customer->notes as $note)
                    <div class="grid gap-[6px] p-[16px]">
                        <p class="text-[16px] text-gray-800 dark:text-white leading-6">
                            {{$note->note}}
                        </p>

                        {{-- Notes List Title and Time --}}
                        <p class="flex gap-2 text-gray-600 dark:text-gray-300 items-center">
                            @if ($note->customer_notified)
                                <span class="h-fit text-[24px] rounded-full icon-done text-blue-600 bg-blue-100"></span>  

                                @lang('admin::app.customers.customers.view.customer-notified', ['date' => core()->formatDate($note->created_at, 'Y-m-d H:i:s a')])
                            @else
                                <span class="h-fit text-[24px] rounded-full icon-cancel-1 text-red-600 bg-red-100"></span>
=======
                <!-- Notes List -->
                <span class="block w-full border-b dark:border-gray-800"></span>

                @foreach ($customer->notes as $note)
                    <div class="grid gap-1.5 p-4">
                        <p class="text-base text-gray-800 dark:text-white leading-6">
                            {{$note->note}}
                        </p>

                        <!-- Notes List Title and Time -->
                        <p class="flex gap-2 text-gray-600 dark:text-gray-300 items-center">
                            @if ($note->customer_notified)
                                <span class="h-fit text-2xl rounded-full icon-done text-blue-600 bg-blue-100"></span>  

                                @lang('admin::app.customers.customers.view.customer-notified', ['date' => core()->formatDate($note->created_at, 'Y-m-d H:i:s a')])
                            @else
                                <span class="h-fit text-2xl rounded-full icon-cancel-1 text-red-600 bg-red-100"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                                @lang('admin::app.customers.customers.view.customer-not-notified', ['date' => core()->formatDate($note->created_at, 'Y-m-d H:i:s a')])
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

            {!! view_render_event('bagisto.admin.customers.customers.view.card.notes.after') !!}

        </div>

<<<<<<< HEAD
        {{-- Right Component --}}
        <div class="flex flex-col gap-[8px] w-[360px] max-w-full max-sm:w-full">

            {!! view_render_event('bagisto.admin.customers.customers.view.card.accordion.customer.before') !!}

            {{-- Information --}}
            <x-admin::accordion>
                <x-slot:header>
                    <div class="flex w-[100%]">
                        <p class="w-[100%] p-[10px] text-gray-800 dark:text-white text-[16px] font-semibold">
                            @lang('admin::app.customers.customers.view.customer')
                        </p>
    
                        {{--Customer Edit Component --}}
=======
        <!-- Right Component -->
        <div class="flex flex-col gap-2 w-[360px] max-w-full max-sm:w-full">

            {!! view_render_event('bagisto.admin.customers.customers.view.card.accordion.customer.before') !!}

            <!-- Information -->
            <x-admin::accordion>
                <x-slot:header>
                    <div class="flex w-full">
                        <p class="w-full p-2.5 text-gray-800 dark:text-white text-base  font-semibold">
                            @lang('admin::app.customers.customers.view.customer')
                        </p>
    
                        <!--Customer Edit Component -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                       @include('admin::customers.customers.edit', ['groups' => $groups])
                    </div>
                </x-slot:header>

                <x-slot:content>
<<<<<<< HEAD
                    <div class="grid gap-y-[10px]">
=======
                    <div class="grid gap-y-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <p class="text-gray-800 font-semibold dark:text-white">
                            {{ $customer->first_name . " " . $customer->last_name }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.customers.customers.view.email', ['email' => $customer->email])
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.customers.customers.view.phone', ['phone' => $customer->phone ?? 'N/A'])
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.customers.customers.view.gender', ['gender' => $customer->gender ?? 'N/A'])
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.customers.customers.view.date-of-birth', ['dob' => $customer->date_of_birth ?? 'N/A'])
                        </p>
<<<<<<< HEAD

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.customers.customers.view.group', ['group_code' => $customer->group->code ?? 'N/A'])
=======
                        
                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.customers.customers.view.group', ['group_code' => $customer->group->name ?? 'N/A'])
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </p>
                    </div>
                </x-slot:content>
            </x-admin::accordion> 

            {!! view_render_event('bagisto.admin.customers.customers.view.card.accordion.customer.after') !!}

            {!! view_render_event('bagisto.admin.customers.customers.view.card.accordion.address.before') !!}

<<<<<<< HEAD
            {{-- Addresses listing--}}
            <x-admin::accordion>
                <x-slot:header>
                    <div class="flex items-center justify-between p-[6px]">
                        <p class="text-gray-800 dark:text-white text-[16px] font-semibold">
=======
            <!-- Addresses listing-->
            <x-admin::accordion>
                <x-slot:header>
                    <div class="flex items-center justify-between p-1.5">
                        <p class="text-gray-800 dark:text-white text-base  font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.customers.customers.view.address', ['count' => count($customer->addresses)])
                        </p>
                    </div>
                </x-slot:header>

                <x-slot:content>
                    @if (count($customer->addresses))
                        @foreach ($customer->addresses as $index => $address)
<<<<<<< HEAD
                            <div class="grid gap-y-[10px]">
=======
                            <div class="grid gap-y-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @if ( $address->default_address )
                                    <p class="label-pending">
                                        @lang('admin::app.customers.customers.view.default-address')
                                    </p>
                                @endif

                                <p class="text-gray-800 font-semibold dark:text-white">
                                    {{ $address->name }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $address->address1 }},

                                    @if ($address->address2)
                                        {{ $address->address2 }},
                                    @endif

                                    {{ $address->city }},
                                    {{ $address->state }},
                                    {{ core()->country_name($address->country) }}

                                    @if($address->postcode)
                                        ({{ $address->postcode }})
                                    @endif
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @lang('admin::app.customers.customers.view.phone', ['phone' => $address->phone ?? 'N/A'])
                                </p>

<<<<<<< HEAD
                                <div class="flex gap-[10px]">
                                    {{-- Edit Address --}}
                                    @include('admin::customers.addresses.edit')

                                    {{-- Delete Address --}}
=======
                                <div class="flex gap-2.5">
                                    <!-- Edit Address -->
                                    @include('admin::customers.addresses.edit')

                                    <!-- Delete Address -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @if (bouncer()->hasPermission('customers.addresses.delete'))
                                        <p 
                                            class="text-blue-600 cursor-pointer transition-all hover:underline"
                                            @click="$emitter.emit('open-confirm-modal', {
                                                message: '@lang('admin::app.customers.customers.view.address-delete-confirmation')',

                                                agree: () => {
                                                    this.$refs['delete-address-{{ $address->id }}'].submit()
                                                }
                                            })"
                                        >
                                            @lang('admin::app.customers.customers.view.delete')
                                        </p>

                                        <form 
                                            method="post"
                                            action="{{ route('admin.customers.customers.addresses.delete', $address->id) }}"
                                            ref="delete-address-{{ $address->id }}" 
                                        >
                                            @csrf
                                        </form>
                                    @endif

<<<<<<< HEAD
                                    {{-- Set Default Address --}}
=======
                                    <!-- Set Default Address -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @if (! $address->default_address )
                                        <p 
                                            class="text-blue-600 cursor-pointer transition-all hover:underline"
                                            onclick="event.preventDefault();
                                            document.getElementById('default-address{{ $address->id }}').submit();"
                                        >
                                            @lang('admin::app.customers.customers.view.set-as-default')
                                        </p>

                                        <form
                                            class="hidden"
                                            method="post"
                                            action="{{ route('admin.customers.customers.addresses.set_default', $customer->id) }}" 
                                            id="default-address{{ $address->id }}" 
                                        >
                                            @csrf

                                            <input
                                                type="text"
                                                name="set_as_default"
                                                value="{{ $address->id }}"
                                            />
                                        </form>
                                    @endif
                                </div>
                            </div>
                            
                            @if ($index < count($customer->addresses) - 1)
<<<<<<< HEAD
                                <span class="block w-full mb-[16px] mt-[16px] border-b-[1px] dark:border-gray-800"></span>
                            @endif
                        @endforeach
                    @else    
                        {{-- Empty Address Container --}}
                        <div class="flex gap-[20px] items-center py-[10px]">
                            <img
                                src="{{ bagisto_asset('images/settings/address.svg') }}"
                                class="w-[80px] h-[80px] border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion"
                            >

                            <div class="flex flex-col gap-[6px]">
                                <p class="text-[16px] text-gray-400 font-semibold">
=======
                                <span class="block w-full mb-4 mt-4 border-b dark:border-gray-800"></span>
                            @endif
                        @endforeach
                    @else    
                        <!-- Empty Address Container -->
                        <div class="flex gap-5 items-center py-2.5">
                            <img
                                src="{{ bagisto_asset('images/settings/address.svg') }}"
                                class="w-20 h-20 border border-dashed border-gray-300 dark:border-gray-800 rounded dark:invert dark:mix-blend-exclusion"
                            >

                            <div class="flex flex-col gap-1.5">
                                <p class="text-base text-gray-400 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.customers.customers.view.empty-title')
                                </p>

                                <p class="text-gray-400">
                                    @lang('admin::app.customers.customers.view.empty-description')
                                </p>
                            </div>
                        </div>
                    @endif
                </x-slot:content>
            </x-admin::accordion>

            {!! view_render_event('bagisto.admin.customers.customers.view.card.accordion.address.after') !!}

        </div>
    </div>
</x-admin::layouts>