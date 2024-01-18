@if ($product->type == 'grouped')
    {!! view_render_event('bagisto.shop.products.view.grouped_products.before', ['product' => $product]) !!}

    <div class="w-[455px] max-w-full">
        @php
            $groupedProducts = $product->grouped_products()->orderBy('sort_order')->get();
        @endphp

        @if ($groupedProducts->count())
<<<<<<< HEAD
            <div class="grid gap-[20px] mt-[30px]">
                @foreach ($groupedProducts as $groupedProduct)
                    @if ($groupedProduct->associated_product->getTypeInstance()->isSaleable())
                        <div class="flex gap-[20px] justify-between items-center">
                            <div class="text-[14px] font-medium">
=======
            <div class="grid gap-5 mt-8">
                @foreach ($groupedProducts as $groupedProduct)
                    @if ($groupedProduct->associated_product->getTypeInstance()->isSaleable())
                        <div class="flex gap-5 justify-between items-center">
                            <div class="text-sm font-medium">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <p class="">
                                    @lang('shop::app.products.view.type.grouped.name')
                                </p>

<<<<<<< HEAD
                                <p class="text-[#6E6E6E] mt-[5px]">
=======
                                <p class="text-[#6E6E6E] mt-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    {{ $groupedProduct->associated_product->name . ' + ' . core()->currency($groupedProduct->associated_product->getTypeInstance()->getFinalPrice()) }}
                                </p>

                            </div>

                            <x-shop::quantity-changer
                                name="qty[{{$groupedProduct->associated_product_id}}]"
                                :value="$groupedProduct->qty"
<<<<<<< HEAD
                                class="gap-x-[16px] py-[10px] px-[12px] rounded-[12px]"
=======
                                class="gap-x-4 py-2.5 px-3 rounded-xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @change="updateItem($event)"
                            >
                            </x-shop::quantity-changer>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
        
    </div>

    {!! view_render_event('bagisto.shop.products.view.grouped_products.before', ['product' => $product]) !!}
@endif