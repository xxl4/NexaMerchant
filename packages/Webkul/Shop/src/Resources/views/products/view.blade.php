@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $avgRatings = round($reviewHelper->getAverageRating($product));

    $percentageRatings = $reviewHelper->getPercentageRating($product);

    $customAttributeValues = $productViewHelper->getAdditionalData($product);
@endphp

<<<<<<< HEAD
{{-- SEO Meta Content --}}
=======
<!-- SEO Meta Content -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@push('meta')
    <meta name="description" content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"/>

    <meta name="keywords" content="{{ $product->meta_keywords }}"/>

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {{ app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) }}
        </script>
    @endif

    <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="{{ $product->name }}" />

    <meta name="twitter:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="{{ $product->name }}" />

    <meta property="og:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />

    <meta property="og:url" content="{{ route('shop.product_or_category.index', $product->url_key) }}" />
@endPush

<<<<<<< HEAD
{{-- Page Layout --}}
<x-shop::layouts>
    {{-- Page Title --}}
=======
<!-- Page Layout -->
<x-shop::layouts>
    <!-- Page Title -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-slot:title>
        {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
    </x-slot>

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

<<<<<<< HEAD
    {{-- Breadcrumbs --}}
=======
    <!-- Breadcrumbs -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <div class="flex justify-center max-lg:hidden">
        <x-shop::breadcrumbs name="product" :entity="$product"></x-shop::breadcrumbs>
    </div>

<<<<<<< HEAD
    {{-- Product Information Vue Component --}}
=======
    <!-- Product Information Vue Component -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <v-product :product-id="{{ $product->id }}">
        <x-shop::shimmer.products.view/>
    </v-product>

<<<<<<< HEAD
    {{-- Information Section --}}
    <div class="1180:mt-[80px]">
        <x-shop::tabs position="center">
            {{-- Description Tab --}}
=======
    <!-- Information Section -->
    <div class="1180:mt-20">
        <x-shop::tabs position="center">
            <!-- Description Tab -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            {!! view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]) !!}

            <x-shop::tabs.item
                class="container mt-[60px] !p-0 max-1180:hidden"
                :title="trans('shop::app.products.view.description')"
                :is-selected="true"
            >
<<<<<<< HEAD
                <div class="container mt-[60px] max-1180:px-[20px]">
                    <p class="text-[#6E6E6E] text-[18px] max-1180:text-[14px]">
=======
                <div class="container mt-[60px] max-1180:px-5">
                    <p class="text-[#6E6E6E] text-lg max-1180:text-sm">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        {!! $product->description !!}
                    </p>
                </div>
            </x-shop::tabs.item>

            {!! view_render_event('bagisto.shop.products.view.description.after', ['product' => $product]) !!}


<<<<<<< HEAD
            {{-- Additional Information Tab --}}
=======
            <!-- Additional Information Tab -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <x-shop::tabs.item
                class="container mt-[60px] !p-0 max-1180:hidden"
                :title="trans('shop::app.products.view.additional-information')"
                :is-selected="false"
            >
<<<<<<< HEAD
                <div class="container mt-[60px] max-1180:px-[20px]">
                    <div class="grid gap-[15px] grid-cols-[auto_1fr] max-w-max mt-[30px]">
                        @foreach ($customAttributeValues as $customAttributeValue)
                            <div class="grid">
                                <p class="text-[16px] text-black">
=======
                <div class="container mt-[60px] max-1180:px-5">
                    <div class="grid gap-4 grid-cols-[auto_1fr] max-w-max mt-8">
                        @foreach ($customAttributeValues as $customAttributeValue)
                            <div class="grid">
                                <p class="text-base text-black">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    {!! $customAttributeValue['label'] !!}
                                </p>
                            </div>

                            @if (
                                $customAttributeValue['type'] == 'file'
                                && $customAttributeValue['value']
                            )
                                <a
                                    href="{{ Storage::url($product[$customAttributeValue['code']]) }}"
                                    download="{{ $customAttributeValue['label'] }}"
                                >
<<<<<<< HEAD
                                    <span class="icon-download text-[24px]"></span>
=======
                                    <span class="icon-download text-2xl"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                </a>
                            @elseif (
                                $customAttributeValue['type'] == 'image'
                                && $customAttributeValue['value']
                            )
                                <a
                                    href="{{ Storage::url($product[$customAttributeValue['code']]) }}"
                                    download="{{ $customAttributeValue['label'] }}"
                                >
                                    <img 
<<<<<<< HEAD
                                        class="h-[20px] w-[20px] min-h-[20px] min-w-[20px]"
=======
                                        class="h-5 w-5 min-h-5 min-w-5"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        src="{{ Storage::url($customAttributeValue['value']) }}"
                                    />
                                </a>
                            @else 
                                <div class="grid">
<<<<<<< HEAD
                                    <p class="text-[16px] text-[#7D7D7D]">
=======
                                    <p class="text-base text-[#7D7D7D]">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        {!! $customAttributeValue['value'] ? $customAttributeValue['value'] : '-' !!}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </x-shop::tabs.item>

<<<<<<< HEAD
            {{-- Reviews Tab --}}
=======
            <!-- Reviews Tab -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <x-shop::tabs.item
                class="container mt-[60px] !p-0 max-1180:hidden"
                :title="trans('shop::app.products.view.review')"
                :is-selected="false"
            >
                @include('shop::products.view.reviews')
            </x-shop::tabs.item>
        </x-shop::tabs>
    </div>

<<<<<<< HEAD
    {{-- Information Section --}}
    <div class="container mt-[40px] max-1180:px-[20px] 1180:hidden">
        {{-- Description Accordion --}}
        <x-shop::accordion :is-active="true">
            <x-slot:header>
                <div class="flex justify-between mb-[20px] mt-[20px]">
                    <p class="text-[16px] font-medium 1180:hidden">
                        @lang('shop::app.products.view.description')
                    </p>
                </div>
            </x-slot:header>

            <x-slot:content>
                <p class="text-[#6E6E6E] text-[18px] max-1180:text-[14px] mb-[20px]">
                    {!! $product->description !!}
                </p>
            </x-slot:content>
        </x-shop::accordion>

        {{-- Additional Information Accordion --}}
        <x-shop::accordion :is-active="false">
            <x-slot:header>
                <div class="flex justify-between mb-[20px] mt-[20px]">
                    <p class="text-[16px] font-medium 1180:hidden">
                        @lang('shop::app.products.view.additional-information')
                    </p>
                </div>
            </x-slot:header>

            <x-slot:content>
                <div class="container mt-[20px] mb-[20px] max-1180:px-[20px]">
                    <p class="text-[#6E6E6E] text-[18px] max-1180:text-[14px]">
                        @foreach ($customAttributeValues as $customAttributeValue)
                            <div class="grid">
                                <p class="text-[16px] text-black">
=======
    <!-- Information Section -->
    <div class="container mt-10 !p-0 max-1180:px-5 1180:hidden">
        <!-- Description Accordion -->
        <x-shop::accordion :is-active="true">
            <x-slot:header class="bg-gray-100">
                <p class="text-base font-medium 1180:hidden">
                    @lang('shop::app.products.view.description')
                </p>
            </x-slot:header>

            <x-slot:content>
                <div class="text-[#7D7D7D] text-lg max-1180:text-sm mb-5">
                    {!! $product->description !!}
                </div>
            </x-slot:content>
        </x-shop::accordion>

        <!-- Additional Information Accordion -->
        <x-shop::accordion class="bg-gray-100" :is-active="false">
            <x-slot:header>
                <p class="text-base font-medium 1180:hidden">
                    @lang('shop::app.products.view.additional-information')
                </p>
            </x-slot:header>

            <x-slot:content>
                <div class="container mt-5 mb-5 max-1180:px-5">
                    <p class="text-[#6E6E6E] text-lg max-1180:text-sm">
                        @foreach ($customAttributeValues as $customAttributeValue)
                            <div class="grid">
                                <p class="text-base text-black">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    {{ $customAttributeValue['label'] }}
                                </p>
                            </div>

                            @if (
                                $customAttributeValue['type'] == 'file'
                                || $customAttributeValue['type'] == 'image'
                            )
                                <a
                                    href="{{ Storage::url($product[$customAttributeValue['code']]) }}"
                                    download="{{ $customAttributeValue['label'] }}"
                                >
<<<<<<< HEAD
                                    <p class="text-[16px] text-blue-500 underline">
=======
                                    <p class="text-base text-blue-500 underline">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        {{ $customAttributeValue['label'] }}
                                    </p>
                                </a>
                            @else 
                                <div class="grid">
<<<<<<< HEAD
                                    <p class="text-[16px] text-[#6E6E6E]">
=======
                                    <p class="text-base text-[#6E6E6E]">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        {{ $customAttributeValue['value'] ?? '-' }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </p>
                </div>
            </x-slot:content>
        </x-shop::accordion>

<<<<<<< HEAD
        {{-- Reviews Accordion --}}
        <x-shop::accordion :is-active="false">
            <x-slot:header>
                <div class="flex justify-between mb-[20px] mt-[20px]">
                    <p class="text-[16px] font-medium 1180:hidden">
                        @lang('shop::app.products.view.review')
                    </p>
                </div>
=======
        <!-- Reviews Accordion -->
        <x-shop::accordion class="bg-gray-100" :is-active="false">
            <x-slot:header>
                <p class="text-base font-medium 1180:hidden">
                    @lang('shop::app.products.view.review')
                </p>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </x-slot:header>

            <x-slot:content>
                @include('shop::products.view.reviews')
            </x-slot:content>
        </x-shop::accordion>
    </div>

<<<<<<< HEAD
    {{-- Featured Products --}}
=======
    <!-- Featured Products -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-shop::products.carousel
        :title="trans('shop::app.products.view.related-product-title')"
        :src="route('shop.api.products.related.index', ['id' => $product->id])"
    >
    </x-shop::products.carousel>

<<<<<<< HEAD
    {{-- Upsell Products --}}
=======
    <!-- Upsell Products -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-shop::products.carousel
        :title="trans('shop::app.products.view.up-sell-title')"
        :src="route('shop.api.products.up-sell.index', ['id' => $product->id])"
    >
    </x-shop::products.carousel>

    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-product-template">
            <x-shop::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form
                    ref="formData"
                    @submit="handleSubmit($event, addToCart)"
                >
                    <input 
                        type="hidden" 
                        name="product_id" 
                        value="{{ $product->id }}"
                    >

                    <input
                        type="hidden"
                        name="is_buy_now"
                        v-model="is_buy_now"
                    >
                    
                    <input 
                        type="hidden" 
                        name="quantity" 
                        :value="qty"
                    >

<<<<<<< HEAD
                    <div class="container px-[60px] max-1180:px-[0px]">
                        <div class="flex gap-[40px] mt-[48px] max-1180:flex-wrap max-lg:mt-0 max-sm:gap-y-[25px]">
=======
                    <div class="container px-[60px] max-1180:px-0">
                        <div class="flex gap-9 mt-12 max-1180:flex-wrap max-lg:mt-0 max-sm:gap-y-6">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <!-- Gallery Blade Inclusion -->
                            @include('shop::products.view.gallery')

                            <!-- Details -->
<<<<<<< HEAD
                            <div class="max-w-[590px] relative max-1180:w-full max-1180:max-w-full max-1180:px-[20px]">
                                {!! view_render_event('bagisto.shop.products.name.before', ['product' => $product]) !!}

                                <div class="flex gap-[15px] justify-between">
                                    <h1 class="text-[30px] font-medium max-sm:text-[20px]">
=======
                            <div class="max-w-[590px] relative max-1180:w-full max-1180:max-w-full max-1180:px-5">
                                {!! view_render_event('bagisto.shop.products.name.before', ['product' => $product]) !!}

                                <div class="flex gap-4 justify-between">
                                    <h1 class="text-3xl font-medium max-sm:text-xl">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        {{ $product->name }}
                                    </h1>

                                    @if (core()->getConfigData('general.content.shop.wishlist_option'))
                                        <div
<<<<<<< HEAD
                                            class="flex items-center justify-center min-w-[46px] min-h-[46px] max-h-[46px] bg-white border border-black rounded-full text-[24px] transition-all hover:opacity-[0.8] cursor-pointer"
=======
                                            class="flex items-center justify-center min-w-[46px] min-h-[46px] max-h-[46px] bg-white border border-black rounded-full text-2xl transition-all hover:opacity-[0.8] cursor-pointer"
                                            role="button"
                                            aria-label="@lang('shop::app.products.view.add-to-wishlist')"
                                            tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            :class="isWishlist ? 'icon-heart-fill' : 'icon-heart'"
                                            @click="addToWishlist"
                                        >
                                        </div>
                                    @endif
                                </div>

                                {!! view_render_event('bagisto.shop.products.name.before', ['product' => $product]) !!}

                                <!-- Rating -->
                                {!! view_render_event('bagisto.shop.products.rating.before', ['product' => $product]) !!}

<<<<<<< HEAD
                                <div class="flex gap-[15px] items-center mt-[15px]">
=======
                                <div class="flex gap-4 items-center mt-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <x-shop::products.star-rating 
                                        :value="$avgRatings"
                                        :is-editable=false
                                    >
                                    </x-shop::products.star-rating>

<<<<<<< HEAD
                                    <div class="flex gap-[15px] items-center">
                                        <p class="text-[#6E6E6E] text-[14px]">
=======
                                    <div class="flex gap-4 items-center">
                                        <p class="text-[#6E6E6E] text-sm">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            ({{ $product->approvedReviews->count() }} @lang('reviews'))
                                        </p>
                                    </div>
                                </div>

                                {!! view_render_event('bagisto.shop.products.rating.after', ['product' => $product]) !!}

                                <!-- Pricing -->
                                {!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

<<<<<<< HEAD
                                <p class="flex gap-2.5 items-center mt-[25px] text-[24px] !font-medium max-sm:mt-[15px] max-sm:text-[18px]">
                                    {!! $product->getTypeInstance()->getPriceHtml() !!}

                                    <span class="text-[18px] text-[#6E6E6E]">
=======
                                <p class="flex gap-2.5 items-center mt-5 text-2xl !font-medium max-sm:mt-4 max-sm:text-lg">
                                    {!! $product->getTypeInstance()->getPriceHtml() !!}

                                    <span class="text-lg text-[#6E6E6E]">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @if (
                                            (bool) core()->getConfigData('taxes.catalogue.pricing.tax_inclusive') 
                                            && $product->getTypeInstance()->getTaxCategory()
                                        )
                                            @lang('shop::app.products.view.tax-inclusive')
                                        @endif
                                    </span>
                                </p>

<<<<<<< HEAD
=======
                                @if (count($product->getTypeInstance()->getCustomerGroupPricingOffers()))
                                    <div class="grid gap-1.5 mt-2.5">
                                        @foreach ($product->getTypeInstance()->getCustomerGroupPricingOffers() as $offer)
                                            <p class="text-[#6E6E6E] [&>*]:text-black">
                                                {!! $offer !!}
                                            </p>
                                        @endforeach
                                    </div>
                                @endif

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                {!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}

                                {!! view_render_event('bagisto.shop.products.short_description.before', ['product' => $product]) !!}

<<<<<<< HEAD
                                <p class="mt-[25px] text-[18px] text-[#6E6E6E] max-sm:text-[14px] max-sm:mt-[15px]">
=======
                                <p class="mt-6 text-lg text-[#6E6E6E] max-sm:text-sm max-sm:mt-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    {!! $product->short_description !!}
                                </p>

                                {!! view_render_event('bagisto.shop.products.short_description.after', ['product' => $product]) !!}

                                @include('shop::products.view.types.configurable')

                                @include('shop::products.view.types.grouped')

                                @include('shop::products.view.types.bundle')

                                @include('shop::products.view.types.downloadable')


                                <!-- Product Actions and Qunatity Box -->
<<<<<<< HEAD
                                <div class="flex gap-[15px] max-w-[470px] mt-[30px]">
=======
                                <div class="flex gap-4 max-w-[470px] mt-8">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                                    {!! view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]) !!}

                                    @if ($product->getTypeInstance()->showQuantityBox())
                                        <x-shop::quantity-changer
                                            name="quantity"
                                            value="1"
<<<<<<< HEAD
                                            class="gap-x-[16px] py-[15px] px-[26px] rounded-[12px]"
=======
                                            class="gap-x-4 py-4 px-7 rounded-xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        >
                                        </x-shop::quantity-changer>
                                    @endif

                                    {!! view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]) !!}

                                    <!-- Add To Cart Button -->
                                    {!! view_render_event('bagisto.shop.products.view.add_to_cart.before', ['product' => $product]) !!}

<<<<<<< HEAD
                                    <button
                                        type="submit"
                                        class="secondary-button w-full max-w-full"
                                        {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                    >
                                        @lang('shop::app.products.view.add-to-cart')
                                    </button>
=======
                                    <x-shop::button
                                        type="submit"
                                        class="secondary-button w-full max-w-full"
                                        button-type="secondary-button"
                                        :loading="false"
                                        :title="trans('shop::app.products.view.add-to-cart')"
                                        :disabled="! $product->isSaleable(1)"
                                        ref="addToCartButton"
                                    >
                                    </x-shop::button>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                                    {!! view_render_event('bagisto.shop.products.view.add_to_cart.after', ['product' => $product]) !!}
                                </div>

                                <!-- Buy Now Button -->
                                {!! view_render_event('bagisto.shop.products.view.buy_now.before', ['product' => $product]) !!}

                                @if (core()->getConfigData('catalog.products.storefront.buy_now_button_display'))
<<<<<<< HEAD
                                    <button
                                        type="submit"
                                        class="primary-button w-full max-w-[470px] mt-[20px]"
                                        @click="is_buy_now=1;"
                                        {{ ! $product->isSaleable(1) ? 'disabled' : '' }}
                                    >
                                        @lang('shop::app.products.view.buy-now')
                                    </button>
=======
                                    <x-shop::button
                                        type="submit"
                                        class="primary-button w-full max-w-[470px] mt-5"
                                        button-type="secondary-button"
                                        :title="trans('shop::app.products.view.buy-now')"
                                        :disabled="! $product->isSaleable(1)"
                                        :loading="false"
                                        ref="buyNowButton"
                                        @click="is_buy_now=1;"
                                    >
                                    </x-shop::button>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @endif

                                {!! view_render_event('bagisto.shop.products.view.buy_now.after', ['product' => $product]) !!}

<<<<<<< HEAD
                                <!-- Share Buttons -->
                                <div class="flex gap-[35px] mt-[40px] max-sm:flex-wrap max-sm:justify-center">
                                    {!! view_render_event('bagisto.shop.products.view.compare.before', ['product' => $product]) !!}

                                    <div
                                        class="flex gap-[10px] justify-center items-center cursor-pointer"
                                        @click="is_buy_now=0; addToCompare({{ $product->id }})"
                                    >
                                        @if (core()->getConfigData('general.content.shop.compare_option'))
                                            <span class="icon-compare text-[24px]"></span>
=======
                                {!! view_render_event('bagisto.shop.products.view.additional_actions.before', ['product' => $product]) !!}

                                <!-- Share Buttons -->
                                <div class="flex gap-9 mt-10 max-sm:flex-wrap max-sm:justify-center">
                                    {!! view_render_event('bagisto.shop.products.view.compare.before', ['product' => $product]) !!}

                                    <div
                                        class="flex gap-2.5 justify-center items-center cursor-pointer"
                                        role="button"
                                        tabindex="0"
                                        @click="is_buy_now=0; addToCompare({{ $product->id }})"
                                    >
                                        @if (core()->getConfigData('general.content.shop.compare_option'))
                                            <span
                                                class="icon-compare text-2xl"
                                                role="presentation"
                                            ></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                                            @lang('shop::app.products.view.compare')
                                        @endif
                                    </div>

                                    {!! view_render_event('bagisto.shop.products.view.compare.after', ['product' => $product]) !!}
                                </div>
<<<<<<< HEAD
=======

                                {!! view_render_event('bagisto.shop.products.view.additional_actions.after', ['product' => $product]) !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            </div>
                        </div>
                    </div>
                </form>
            </x-shop::form>
        </script>

        <script type="module">
            app.component('v-product', {
                template: '#v-product-template',

                props: ['productId'],

                data() {
                    return {
                        isWishlist: Boolean("{{ (boolean) auth()->guard()->user()?->wishlist_items->where('channel_id', core()->getCurrentChannel()->id)->where('product_id', $product->id)->count() }}"),

                        isCustomer: '{{ auth()->guard('customer')->check() }}',

                        is_buy_now: 0,
                    }
                },

                methods: {
                    addToCart(params) {
<<<<<<< HEAD
=======
                        const operation = this.is_buy_now ? 'buyNowButton' : 'addToCartButton';

                        this.$refs[operation].isLoading = true;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        let formData = new FormData(this.$refs.formData);

                        this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            })
                            .then(response => {
                                if (response.data.message) {
                                    this.$emitter.emit('update-mini-cart', response.data.data);

                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    if (response.data.redirect) {
                                        window.location.href= response.data.redirect;
                                    }
                                } else {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: response.data.data.message });
                                }
<<<<<<< HEAD
                            })
                            .catch(error => {});
=======

                                this.$refs[operation].isLoading = false;
                            })
                            .catch(error => {
                                this.$refs[operation].isLoading=false;
                            });
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    },

                    addToWishlist() {
                        if (this.isCustomer) {
                            this.$axios.post('{{ route('shop.api.customers.account.wishlist.store') }}', {
                                    product_id: "{{ $product->id }}"
                                })
                                .then(response => {
                                    this.isWishlist = ! this.isWishlist;

                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                })
                                .catch(error => {});
                        } else {
                            window.location.href = "{{ route('shop.customer.session.index')}}";
                        }
                    },

                    addToCompare(productId) {
                        /**
                         * This will handle for customers.
                         */
                        if (this.isCustomer) {
                            this.$axios.post('{{ route("shop.api.compare.store") }}', {
                                    'product_id': productId
                                })
                                .then(response => {
                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                })
                                .catch(error => {
                                    if ([400, 422].includes(error.response.status)) {
                                        this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.data.message });

                                        return;
                                    }

                                    this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message});
                                });

                            return;
                        }

                        /**
                         * This will handle for guests.
                         */
                        let existingItems = this.getStorageValue(this.getCompareItemsStorageKey()) ?? [];

                        if (existingItems.length) {
                            if (! existingItems.includes(productId)) {
                                existingItems.push(productId);

                                this.setStorageValue(this.getCompareItemsStorageKey(), existingItems);

                                this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.products.view.add-to-compare')" });
                            } else {
                                this.$emitter.emit('add-flash', { type: 'warning', message: "@lang('shop::app.products.view.already-in-compare')" });
                            }
                        } else {
                            this.setStorageValue(this.getCompareItemsStorageKey(), [productId]);

                            this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.products.view.add-to-compare')" });
                        }
                    },

                    getCompareItemsStorageKey() {
                        return 'compare_items';
                    },

                    setStorageValue(key, value) {
                        localStorage.setItem(key, JSON.stringify(value));
                    },

                    getStorageValue(key) {
                        let value = localStorage.getItem(key);

                        if (value) {
                            value = JSON.parse(value);
                        }

                        return value;
                    },
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
