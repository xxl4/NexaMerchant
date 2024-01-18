<<<<<<< HEAD
{{-- SEO Meta Content --}}
=======
<!-- SEO Meta Content -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@push('meta')
    <meta name="description" content="@lang('shop::app.checkout.cart.index.cart')"/>

    <meta name="keywords" content="@lang('shop::app.checkout.cart.index.cart')"/>
@endPush

<x-shop::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="false"
>
<<<<<<< HEAD
    {{-- Page Title --}}
=======
    <!-- Page Title -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-slot:title>
        @lang('shop::app.checkout.cart.index.cart')
    </x-slot>

<<<<<<< HEAD
    {{-- Page Header --}}
    <div class="flex flex-wrap">
        <div class="w-full flex justify-between px-[60px] border border-t-0 border-b-[1px] border-l-0 border-r-0 py-[17px] max-lg:px-[30px] max-sm:px-[15px]">
            <div class="flex items-center gap-x-[54px] max-[1180px]:gap-x-[35px]">
                <a
                    href="{{ route('shop.home.index') }}"
                    class="flex min-h-[30px]"
                    aria-label="Bagisto "
                >
                    <img
                        src="{{ bagisto_asset('images/logo.svg') }}"
                        alt="Bagisto "
=======
    {!! view_render_event('bagisto.shop.checkout.cart.header.before') !!}

    <!-- Page Header -->
    <div class="flex flex-wrap">
        <div class="w-full flex justify-between px-[60px] border border-t-0 border-b border-l-0 border-r-0 py-4 max-lg:px-8 max-sm:px-4">
            <div class="flex items-center gap-x-14 max-[1180px]:gap-x-9">
                {!! view_render_event('bagisto.shop.checkout.cart.logo.before') !!}

                <a
                    href="{{ route('shop.home.index') }}"
                    class="flex min-h-[30px]"
                    aria-label="@lang('shop::app.checkout.cart.index.bagisto')"
                >
                    <img
                        src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                        alt="{{ config('app.name') }}"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        width="131"
                        height="29"
                    >
                </a>
<<<<<<< HEAD
=======

                {!! view_render_event('bagisto.shop.checkout.cart.logo.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <div class="flex-auto">
        <div class="container px-[60px] max-lg:px-[30px]">
            {{-- Breadcrumbs --}}
            <x-shop::breadcrumbs name="cart"></x-shop::breadcrumbs>

            <v-cart ref="vCart">
                {{-- Cart Shimmer Effect --}}
=======
    {!! view_render_event('bagisto.shop.checkout.cart.header.after') !!}

    <div class="flex-auto">
        <div class="container px-[60px] max-lg:px-8">
            
            {!! view_render_event('bagisto.shop.checkout.cart.breadcrumbs.before') !!}

            <!-- Breadcrumbs -->
            <x-shop::breadcrumbs name="cart"></x-shop::breadcrumbs>

            {!! view_render_event('bagisto.shop.checkout.cart.breadcrumbs.after') !!}

            <v-cart ref="vCart">
                <!-- Cart Shimmer Effect -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <x-shop::shimmer.checkout.cart :count="3"></x-shop::shimmer.checkout.cart>
            </v-cart>
        </div>
    </div>

<<<<<<< HEAD
=======
    {!! view_render_event('bagisto.shop.checkout.cart.cross_sell_carousel.before') !!}

    <!-- Cross-sell Product Carousal -->
    <x-shop::products.carousel
        :title="trans('shop::app.checkout.cart.index.cross-sell.title')"
        :src="route('shop.api.checkout.cart.cross-sell.index')"
    >
    </x-shop::products.carousel>

    {!! view_render_event('bagisto.shop.checkout.cart.cross_sell_carousel.after') !!}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    @pushOnce('scripts')
        <script type="text/x-template" id="v-cart-template">
            <div>
                <!-- Cart Shimmer Effect -->
                <template v-if="isLoading">
                    <x-shop::shimmer.checkout.cart :count="3"></x-shop::shimmer.checkout.cart>
                </template>

                <!-- Cart Information -->
                <template v-else>
                    <div 
<<<<<<< HEAD
                        class="flex flex-wrap gap-[75px] mt-[30px] pb-[30px] max-1060:flex-col"
                        v-if="cart?.items?.length"
                    >
                        <div class="grid gap-[25px] flex-1">
                            <!-- Cart Mass Action Container -->
                            <div class="flex justify-between items-center pb-[10px] border-b-[1px] border-[#E9E9E9] max-sm:block">
=======
                        class="flex flex-wrap gap-20 mt-8 pb-8 max-1060:flex-col"
                        v-if="cart?.items?.length"
                    >
                        <div class="grid gap-6 flex-1">

                            {!! view_render_event('bagisto.shop.checkout.cart.cart_mass_actions.before') !!}

                            <!-- Cart Mass Action Container -->
                            <div class="flex justify-between items-center pb-2.5 border-b border-[#E9E9E9] max-sm:block">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <div class="flex select-none items-center">
                                    <input
                                        type="checkbox"
                                        id="select-all"
                                        class="hidden peer"
                                        v-model="allSelected"
                                        @change="selectAll"
                                    >

                                    <label
<<<<<<< HEAD
                                        class="icon-uncheck text-[24px] text-navyBlue peer-checked:icon-check-box peer-checked:text-navyBlue cursor-pointer"
                                        for="select-all"
                                    >
                                    </label>

                                    <span class="text-[20px] max-md:text-[22px] max-sm:text-[18px] ml-[10px]">
=======
                                        class="icon-uncheck text-2xl text-navyBlue peer-checked:icon-check-box peer-checked:text-navyBlue cursor-pointer"
                                        for="select-all"
                                        role="button"
                                        tabindex="0"
                                        aria-label="@lang('shop::app.checkout.cart.index.select-all')"
                                    >
                                    </label>

                                    <span
                                        class="text-xl max-md:text-xl max-sm:text-lg ltr:ml-2.5 rtl:mr-2.5"
                                        role="heading"
                                    >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @{{ "@lang('shop::app.checkout.cart.index.items-selected')".replace(':count', selectedItemsCount) }}
                                    </span>
                                </div>

                                <div 
<<<<<<< HEAD
                                    class="max-sm:ml-[35px] max-sm:mt-[10px]"
                                    v-if="selectedItemsCount"
                                >
                                    <span
                                        class="text-[16px] text-[#0A49A7] cursor-pointer" 
=======
                                    class="max-sm:ltr:ml-9 max-sm:rtl:mr-9 max-sm:mt-2.5"
                                    v-if="selectedItemsCount"
                                >
                                    <span
                                        class="text-base text-[#0A49A7] cursor-pointer" 
                                        role="button"
                                        tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @click="removeSelectedItems"
                                    >
                                        @lang('shop::app.checkout.cart.index.remove')
                                    </span>

                                    @if (auth()->guard()->check())
<<<<<<< HEAD
                                        <span class="mx-[10px] border-r-[2px] border-[#E9E9E9]"></span>

                                        <span
                                            class="text-[16px] text-[#0A49A7] cursor-pointer" 
=======
                                        <span class="mx-2.5 border-r-[2px] border-[#E9E9E9]"></span>

                                        <span
                                            class="text-base text-[#0A49A7] cursor-pointer" 
                                            role="button"
                                            tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @click="moveToWishlistSelectedItems"
                                        >
                                            @lang('shop::app.checkout.cart.index.move-to-wishlist')
                                        </span>    
                                    @endif
                                </div>
                            </div>
                        
<<<<<<< HEAD
                            <!-- Cart Item Listing Container -->
                            <div 
                                class="grid gap-y-[25px]" 
                                v-for="item in cart?.items"
                            >
                                <div class="flex gap-x-[10px] justify-between flex-wrap pb-[18px] border-b-[1px] border-[#E9E9E9]">
                                    <div class="flex gap-x-[20px]">
                                        <div class="select-none mt-[43px]">
=======
                            {!! view_render_event('bagisto.shop.checkout.cart.cart_mass_actions.after') !!}

                            {!! view_render_event('bagisto.shop.checkout.cart.item.listing.before') !!}

                            <!-- Cart Item Listing Container -->
                            <div 
                                class="grid gap-y-6" 
                                v-for="item in cart?.items"
                            >
                                <div class="flex gap-x-2.5 justify-between flex-wrap pb-5 border-b border-[#E9E9E9]">
                                    <div class="flex gap-x-5">
                                        <div class="select-none mt-11">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            <input
                                                type="checkbox"
                                                :id="'item_' + item.id"
                                                class="hidden peer"
                                                v-model="item.selected"
                                                @change="updateAllSelected"
                                            >

                                            <label
<<<<<<< HEAD
                                                class="icon-uncheck text-[24px] text-navyBlue peer-checked:icon-check-box peer-checked:text-navyBlue cursor-pointer"
                                                :for="'item_' + item.id"
                                            ></label>
                                        </div>

                                        <!-- Cart Item Image -->
                                        <x-shop::media.images.lazy
                                            class="h-[110px] min-w-[110px] max-w[110px] rounded-[12px]"
                                            ::src="item.base_image.small_image_url"
                                            ::alt="item.name"
                                            width="110"
                                            height="110"
                                            ::key="item.id"
                                            ::index="item.id"
                                        >
                                        </x-shop::media.images.lazy>

                                        <!-- Cart Item Options Container -->
                                        <div class="grid place-content-start gap-y-[10px]">

                                            <p 
                                                class="text-[16px] font-medium" 
                                                v-text="item.name"
                                            >
                                            </p>
                                    
                                            <!-- Cart Item Options Container -->
                                            <div
                                                class="grid gap-x-[10px] gap-y-[6px] select-none"
=======
                                                class="icon-uncheck text-2xl text-navyBlue peer-checked:icon-check-box peer-checked:text-navyBlue cursor-pointer"
                                                :for="'item_' + item.id"
                                                role="button"
                                                tabindex="0"
                                                aria-label="@lang('shop::app.checkout.cart.index.select-cart-item')"
                                            ></label>
                                        </div>

                                        {!! view_render_event('bagisto.shop.checkout.cart.item_image.before') !!}

                                        <!-- Cart Item Image -->
                                        <a :href="`{{ route('shop.product_or_category.index', '') }}/${item.product_url_key}`">
                                            <x-shop::media.images.lazy
                                                class="h-[110px] min-w-[110px] max-w[110px] rounded-xl"
                                                ::src="item.base_image.small_image_url"
                                                ::alt="item.name"
                                                width="110"
                                                height="110"
                                                ::key="item.id"
                                                ::index="item.id"
                                            >
                                            </x-shop::media.images.lazy>
                                        </a>

                                        {!! view_render_event('bagisto.shop.checkout.cart.item_image.after') !!}

                                        <!-- Cart Item Options Container -->
                                        <div class="grid place-content-start gap-y-2.5">
                                            {!! view_render_event('bagisto.shop.checkout.cart.item_name.before') !!}

                                            <a :href="`{{ route('shop.product_or_category.index', '') }}/${item.product_url_key}`">
                                                <p 
                                                    class="text-base font-medium" 
                                                    v-text="item.name"
                                                >
                                                </p>
                                            </a>

                                            {!! view_render_event('bagisto.shop.checkout.cart.item_name.after') !!}

                                            {!! view_render_event('bagisto.shop.checkout.cart.item_details.before') !!}

                                            <!-- Cart Item Options Container -->
                                            <div
                                                class="grid gap-x-2.5 gap-y-1.5 select-none"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                v-if="item.options.length"
                                            >
                                                <!-- Details Toggler -->
                                                <div class="">
                                                    <p
<<<<<<< HEAD
                                                        class="flex gap-x-[15px] text-[16px] items-center cursor-pointer whitespace-nowrap"
=======
                                                        class="flex gap-x-1.5 text-base items-center cursor-pointer whitespace-nowrap"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                        @click="item.option_show = ! item.option_show"
                                                    >
                                                        @lang('shop::app.checkout.cart.index.see-details')

                                                        <span
<<<<<<< HEAD
                                                            class="text-[24px]"
=======
                                                            class="text-2xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                            :class="{'icon-arrow-up': item.option_show, 'icon-arrow-down': ! item.option_show}"
                                                        ></span>
                                                    </p>
                                                </div>

                                                <!-- Option Details -->
<<<<<<< HEAD
                                                <div class="grid gap-[8px]" v-show="item.option_show">
                                                    <div class="" v-for="option in item.options">
                                                        <p class="text-[14px] font-medium">
                                                            @{{ option.attribute_name + ':' }}
                                                        </p>

                                                        <p class="text-[14px]">
=======
                                                <div class="grid gap-2" v-show="item.option_show">
                                                    <div class="" v-for="option in item.options">
                                                        <p class="text-sm font-medium">
                                                            @{{ option.attribute_name + ':' }}
                                                        </p>

                                                        <p class="text-sm">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                            @{{ option.option_label }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

<<<<<<< HEAD
                                            <div class="sm:hidden">
                                                <p 
                                                    class="text-[18px] font-semibold" 
=======
                                            {!! view_render_event('bagisto.shop.checkout.cart.item_details.after') !!}

                                            {!! view_render_event('bagisto.shop.checkout.cart.formatted_total.before') !!}

                                            <div class="sm:hidden">
                                                <p 
                                                    class="text-lg font-semibold" 
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    v-text="item.formatted_total"
                                                >
                                                </p>
                                                
                                                <span
<<<<<<< HEAD
                                                    class="text-[16px] text-[#0A49A7] cursor-pointer" 
=======
                                                    class="text-base text-[#0A49A7] cursor-pointer"
                                                    role="button"
                                                    tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    @click="removeItem(item.id)"
                                                >
                                                    @lang('shop::app.checkout.cart.index.remove')
                                                </span>
                                            </div>

<<<<<<< HEAD
                                            <x-shop::quantity-changer
                                                name="quantity"
                                                ::value="item?.quantity"
                                                class="flex gap-x-[10px] border rounded-[54px] border-navyBlue py-[5px] px-[14px] items-center max-w-max"
                                                @change="setItemQuantity(item.id, $event)"
                                            >
                                            </x-shop::quantity-changer>
=======
                                            {!! view_render_event('bagisto.shop.checkout.cart.formatted_total.after') !!}

                                            {!! view_render_event('bagisto.shop.checkout.cart.quantity_changer.before') !!}

                                            <x-shop::quantity-changer
                                                name="quantity"
                                                ::value="item?.quantity"
                                                class="flex gap-x-2.5 border rounded-[54px] border-navyBlue py-1.5 px-3.5 items-center max-w-max"
                                                @change="setItemQuantity(item.id, $event)"
                                            >
                                            </x-shop::quantity-changer>

                                            {!! view_render_event('bagisto.shop.checkout.cart.quantity_changer.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        </div>
                                    </div>

                                    <div class="max-sm:hidden text-right">
<<<<<<< HEAD
                                        <p 
                                            class="text-[18px] font-semibold" 
                                            v-text="item.formatted_total"
                                        >
                                        </p>
                                        
                                        <!-- Cart Item Remove Button -->
                                        <span
                                            class="text-[16px] text-[#0A49A7] cursor-pointer" 
=======

                                        {!! view_render_event('bagisto.shop.checkout.cart.total.before') !!}

                                        <p 
                                            class="text-lg font-semibold" 
                                            v-text="item.formatted_total"
                                        >
                                        </p>

                                        {!! view_render_event('bagisto.shop.checkout.cart.total.after') !!}

                                        {!! view_render_event('bagisto.shop.checkout.cart.remove_button.before') !!}
                                        
                                        <!-- Cart Item Remove Button -->
                                        <span
                                            class="text-base text-[#0A49A7] cursor-pointer" 
                                            role="button"
                                            tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @click="removeItem(item.id)"
                                        >
                                            @lang('shop::app.checkout.cart.index.remove')
                                        </span>
<<<<<<< HEAD
=======
                                        
                                        {!! view_render_event('bagisto.shop.checkout.cart.remove_button.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </div>
                                </div>
                            </div>

<<<<<<< HEAD
                            {!! view_render_event('bagisto.shop.checkout.cart.controls.before') !!}
        
                            <!-- Cart Item Actions -->
                            <div class="flex flex-wrap gap-[30px] justify-end">
                                <a
                                    class="secondary-button max-h-[55px] rounded-[18px]"
=======
                            {!! view_render_event('bagisto.shop.checkout.cart.item.listing.after') !!}

                            {!! view_render_event('bagisto.shop.checkout.cart.controls.before') !!}
        
                            <!-- Cart Item Actions -->
                            <div class="flex flex-wrap gap-8 justify-end">
                                {!! view_render_event('bagisto.shop.checkout.cart.continue_shopping.before') !!}

                                <a
                                    class="secondary-button max-h-[55px] rounded-2xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    href="{{ route('shop.home.index') }}"
                                >
                                    @lang('shop::app.checkout.cart.index.continue-shopping')
                                </a> 

<<<<<<< HEAD
                                <button
                                    class="secondary-button max-h-[55px] rounded-[18px]"
                                    @click="update()"
                                >
                                    @lang('shop::app.checkout.cart.index.update-cart')
                                </button>
                            </div>

                            {!! view_render_event('bagisto.shop.checkout.cart.controls.after') !!}
                            
=======
                                {!! view_render_event('bagisto.shop.checkout.cart.continue_shopping.after') !!}

                                {!! view_render_event('bagisto.shop.checkout.cart.update_cart.before') !!}

                                <x-shop::button
                                    class="secondary-button max-h-[55px] rounded-2xl"
                                    :title="trans('shop::app.checkout.cart.index.update-cart')"
                                    :loading="false"
                                    ref="updateCart"
                                    @click="update()"
                                >
                                </x-shop::button>

                                {!! view_render_event('bagisto.shop.checkout.cart.update_cart.after') !!}
                            </div>

                            {!! view_render_event('bagisto.shop.checkout.cart.controls.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </div>

                        {!! view_render_event('bagisto.shop.checkout.cart.summary.before') !!}

                        <!-- Cart Summary -->
                        @include('shop::checkout.cart.summary')

                        {!! view_render_event('bagisto.shop.checkout.cart.summary.after') !!}
<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    </div>

                    <!-- Empty Cart Section -->
                    <div
<<<<<<< HEAD
                        class="grid items-center justify-items-center w-[100%] m-auto h-[476px] place-content-center text-center"
                        v-else
                    >
                        <img src="{{ bagisto_asset('images/thank-you.png') }}"/>
                        
                        <p class="text-[20px]">
=======
                        class="grid items-center justify-items-center w-full m-auto h-[476px] place-content-center text-center"
                        v-else
                    >
                        <img
                            src="{{ bagisto_asset('images/thank-you.png') }}"
                            alt="@lang('shop::app.checkout.cart.index.empty-product')"
                        />
                        
                        <p
                            class="text-xl"
                            role="heading"
                        >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('shop::app.checkout.cart.index.empty-product')
                        </p>
                    </div>
                </template>
            </div>
        </script>

        <script type="module">
            app.component("v-cart", {
                template: '#v-cart-template',

                data() {
                    return  {
                        cart: [],

                        allSelected: false,

                        applied: {
                            quantity: {},
                        },

                        isLoading: true,
                    }
                },

                mounted() {
                    this.get();
                },

                computed: {
                    selectedItemsCount() {
                        return this.cart.items.filter(item => item.selected).length;
                    },
                },

                methods: {
                    get() {
                        this.$axios.get('{{ route('shop.api.checkout.cart.index') }}')
                            .then(response => {
                                this.cart = response.data.data;

                                this.isLoading = false;

                                if (response.data.message) {
                                    this.$emitter.emit('add-flash', { type: 'info', message: response.data.message });
                                }
                            })
<<<<<<< HEAD
                            .catch(error => {});     
=======
                            .catch(error => {});
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    },

                    selectAll() {
                        for (let item of this.cart.items) {
                            item.selected = this.allSelected;
                        }
                    },

                    updateAllSelected() {
                        this.allSelected = this.cart.items.every(item => item.selected);
                    },

                    update() {
<<<<<<< HEAD
=======
                        this.$refs.updateCart.isLoading = true;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        this.$axios.put('{{ route('shop.api.checkout.cart.update') }}', { qty: this.applied.quantity })
                            .then(response => {
                                this.cart = response.data.data;

                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
<<<<<<< HEAD
                            })
                            .catch(error => {});
=======

                                this.$refs.updateCart.isLoading = false;

                            })
                            .catch(error => {
                                this.$refs.updateCart.isLoading = false;
                            });
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    },

                    setItemQuantity(itemId, quantity) {
                        this.applied.quantity[itemId] = quantity;
                    },

                    removeItem(itemId) {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                this.$axios.post('{{ route('shop.api.checkout.cart.destroy') }}', {
                                        '_method': 'DELETE',
                                        'cart_item_id': itemId,
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {});
                            }
                        });
                    },

                    removeSelectedItems() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                const selectedItemsIds = this.cart.items.flatMap(item => item.selected ? item.id : []);

                                this.$axios.post('{{ route('shop.api.checkout.cart.destroy_selected') }}', {
                                        '_method': 'DELETE',
                                        'ids': selectedItemsIds,
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;

                                        this.$emitter.emit('update-mini-cart', response.data.data );

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {});
                            }
                        });
                    },

                    moveToWishlistSelectedItems() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                const selectedItemsIds = this.cart.items.flatMap(item => item.selected ? item.id : []);

                                this.$axios.post('{{ route('shop.api.checkout.cart.move_to_wishlist') }}', {
                                        'ids': selectedItemsIds,
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;

                                        this.$emitter.emit('update-mini-cart', response.data.data );

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {});
                            }
                        });
                    },
                }
            });
        </script>
    @endpushOnce
</x-shop::layouts>
