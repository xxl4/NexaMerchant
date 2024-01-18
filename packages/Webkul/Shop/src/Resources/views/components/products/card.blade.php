<v-product-card
    {{ $attributes }}
    :product="product"
>
</v-product-card>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-card-template">
        <!-- Grid Card -->
        <div
            class='grid gap-2.5 content-start w-full relative'
            v-if="mode != 'list'"
        >
<<<<<<< HEAD
            <div class="relative overflow-hidden group max-w-[291px] max-h-[300px] rounded-[4px]">
=======
            <div class="relative overflow-hidden group max-w-[291px] max-h-[300px] rounded">

                {!! view_render_event('bagisto.shop.components.products.card.image.before') !!}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <a
                    :href="`{{ route('shop.product_or_category.index', '') }}/${product.url_key}`"
                    :aria-label="product.name + ' '"
                >
                    <x-shop::media.images.lazy
                        class="relative after:content-[' '] after:block after:pb-[calc(100%+9px)] bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300"
                        ::src="product.base_image.medium_image_url"
                        ::key="product.id"
                        ::index="product.id"
                        width="291"
                        height="300"
                        ::alt="product.name"
                    ></x-shop::media.images.lazy>
                </a>
<<<<<<< HEAD
                
                <div class="action-items bg-black">
                    <p
                        class="inline-block absolute top-[20px] left-[20px] px-[10px]  bg-[#E51A1A] rounded-[44px] text-white text-[14px]"
=======

                {!! view_render_event('bagisto.shop.components.products.card.image.after') !!}
                
                <div class="action-items bg-black">
                    <p
                        class="inline-block absolute top-5 ltr:left-5 rtl:right-5 px-2.5  bg-[#E51A1A] rounded-[44px] text-white text-sm"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-if="product.on_sale"
                    >
                        @lang('shop::app.components.products.card.sale')
                    </p>

                    <p
<<<<<<< HEAD
                        class="inline-block absolute top-[20px] left-[20px] px-[10px] bg-navyBlue rounded-[44px] text-white text-[14px]"
=======
                        class="inline-block absolute top-5 ltr:left-5 rtl:right-5 px-2.5 bg-navyBlue rounded-[44px] text-white text-sm"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-else-if="product.is_new"
                    >
                        @lang('shop::app.components.products.card.new')
                    </p>

                    <div class="group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
<<<<<<< HEAD
                        @if (core()->getConfigData('general.content.shop.wishlist_option'))
                            <span
                                class="flex justify-center items-center absolute top-[20px] right-[20px] w-[30px] h-[30px] bg-white rounded-md cursor-pointer text-[25px]"
=======

                        {!! view_render_event('bagisto.shop.components.products.card.wishlist_option.before') !!}

                        @if (core()->getConfigData('general.content.shop.wishlist_option'))
                            <span
                                class="flex justify-center items-center absolute top-5 ltr:right-5 rtl:left-5 w-[30px] h-[30px] bg-white rounded-md cursor-pointer text-2xl"
                                role="button"
                                aria-label="@lang('shop::app.components.products.card.add-to-wishlist')"
                                tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :class="product.is_wishlist ? 'icon-heart-fill' : 'icon-heart'"
                                @click="addToWishlist()"
                            >
                            </span>
                        @endif

<<<<<<< HEAD
                        @if (core()->getConfigData('general.content.shop.compare_option'))
                            <span
                                class="icon-compare flex justify-center items-center w-[30px] h-[30px] absolute top-[60px] right-[20px] bg-white rounded-md cursor-pointer text-[25px]"
=======
                        {!! view_render_event('bagisto.shop.components.products.card.wishlist_option.after') !!}

                        {!! view_render_event('bagisto.shop.components.products.card.compare_option.before') !!}

                        @if (core()->getConfigData('general.content.shop.compare_option'))
                            <span
                                class="icon-compare flex justify-center items-center w-[30px] h-[30px] absolute top-16 ltr:right-5 rtl:left-5 bg-white rounded-md cursor-pointer text-2xl"
                                role="button"
                                aria-label="@lang('shop::app.components.products.card.add-to-compare')"
                                tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @click="addToCompare(product.id)"
                            >
                            </span>
                        @endif

<<<<<<< HEAD
                        <button
                            class="absolute bottom-[15px] left-[50%] py-[11px] px-[43px] bg-white rounded-xl text-navyBlue text-xs w-max font-medium cursor-pointer -translate-x-[50%] translate-y-[54px] group-hover:translate-y-0 transition-all duration-300"
                            @click="addToCart()"
                        >
                            @lang('shop::app.components.products.card.add-to-cart')
                        </button>
=======
                        {!! view_render_event('bagisto.shop.components.products.card.compare_option.after') !!}

                        {!! view_render_event('bagisto.shop.components.products.card.add_to_cart.before') !!}

                        <button
                            class="absolute bottom-4 left-1/2 py-3 px-11 bg-white rounded-xl text-navyBlue text-xs w-max font-medium cursor-pointer -translate-x-1/2 translate-y-[54px] group-hover:translate-y-0 transition-all duration-300"
                            :disabled="! product.is_saleable"
                            @click="addToCart()"
                            ref="addToCartButton"
                        >
                            @lang('shop::app.components.products.card.add-to-cart')
                        </button>

                        {!! view_render_event('bagisto.shop.components.products.card.add_to_cart.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    </div>
                </div>
            </div>

            <div class="grid gap-2.5 content-start max-w-[291px]">
<<<<<<< HEAD
                <p class="text-base" v-text="product.name"></p>

                <div
                    class="flex gap-2.5 font-semibold text-lg"
=======

                {!! view_render_event('bagisto.shop.components.products.card.name.before') !!}

                <p class="text-base" v-text="product.name"></p>

                {!! view_render_event('bagisto.shop.components.products.card.name.after') !!}

                {!! view_render_event('bagisto.shop.components.products.card.price.before') !!}

                <div
                    class="flex gap-2.5 items-center font-semibold text-lg"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-html="product.price_html"
                >
                </div>

<<<<<<< HEAD
                <!-- Needs to implement that in future -->
                <div class="hidden flex gap-4 mt-[8px]">
=======
                {!! view_render_event('bagisto.shop.components.products.card.price.before') !!}

                <!-- Needs to implement that in future -->
                <div class="hidden flex gap-4 mt-2">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <span class="block w-[30px] h-[30px] bg-[#B5DCB4] rounded-full cursor-pointer"></span>

                    <span class="block w-[30px] h-[30px] bg-[#5C5C5C] rounded-full cursor-pointer"></span>
                </div>
            </div>
        </div>

        <!-- List Card -->
        <div
<<<<<<< HEAD
            class="flex gap-[15px] grid-cols-2 max-w-max relative max-sm:flex-wrap rounded-[4px] overflow-hidden"
            v-else
        >
            <div class="relative max-w-[250px] max-h-[258px] overflow-hidden group"> 
=======
            class="flex gap-4 grid-cols-2 max-w-max relative max-sm:flex-wrap rounded overflow-hidden"
            v-else
        >
            <div class="relative max-w-[250px] max-h-[258px] overflow-hidden group"> 

                {!! view_render_event('bagisto.shop.components.products.card.image.before') !!}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <a :href="`{{ route('shop.product_or_category.index', '') }}/${product.url_key}`">
                    <x-shop::media.images.lazy
                        class="min-w-[250px] relative after:content-[' '] after:block after:pb-[calc(100%+9px)] bg-[#F5F5F5] group-hover:scale-105 transition-all duration-300"
                        ::src="product.base_image.medium_image_url"
<<<<<<< HEAD
                        width="291"
                        height="300"
                    ></x-shop::media.images.lazy>
                </a>
            
                <div class="action-items bg-black"> 
                    <p
                        class="inline-block absolute top-[20px] left-[20px] px-[10px] bg-[#E51A1A] rounded-[44px] text-white text-[14px]"
=======
                        ::key="product.id"
                        ::index="product.id"
                        width="291"
                        height="300"
                        ::alt="product.name"
                    ></x-shop::media.images.lazy>
                </a>

                {!! view_render_event('bagisto.shop.components.products.card.image.after') !!}
            
                <div class="action-items bg-black"> 
                    <p
                        class="inline-block absolute top-5 ltr:left-5 rtl:right-5 px-2.5 bg-[#E51A1A] rounded-[44px] text-white text-sm"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-if="product.on_sale"
                    >
                        @lang('shop::app.components.products.card.sale')
                    </p>

                    <p
<<<<<<< HEAD
                        class="inline-block absolute top-[20px] left-[20px] px-[10px] bg-navyBlue rounded-[44px] text-white text-[14px]"
=======
                        class="inline-block absolute top-5 ltr:left-5 rtl:right-5 px-2.5 bg-navyBlue rounded-[44px] text-white text-sm"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-else-if="product.is_new"
                    >
                        @lang('shop::app.components.products.card.new')
                    </p>

                    <div class="group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
<<<<<<< HEAD
                        @if (core()->getConfigData('general.content.shop.wishlist_option'))
                            <span 
                                class="flex justify-center items-center absolute top-[20px] right-[20px] w-[30px] h-[30px] bg-white rounded-md text-[25px] cursor-pointer"
=======

                        {!! view_render_event('bagisto.shop.components.products.card.wishlist_option.before') !!}

                        @if (core()->getConfigData('general.content.shop.wishlist_option'))
                            <span 
                                class="flex justify-center items-center absolute top-5 ltr:right-5 rtl:left-5 w-[30px] h-[30px] bg-white rounded-md text-2xl cursor-pointer"
                                role="button"
                                aria-label="@lang('shop::app.components.products.card.add-to-wishlist')"
                                tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :class="product.is_wishlist ? 'icon-heart-fill' : 'icon-heart'"
                                @click="addToWishlist()"
                            >
                            </span> 
                        @endif
                        
<<<<<<< HEAD
                        @if (core()->getConfigData('general.content.shop.compare_option'))
                            <span 
                                class="icon-compare flex justify-center items-center absolute top-[60px] right-[20px] w-[30px] h-[30px] bg-white rounded-md text-[25px] cursor-pointer"
=======
                        {!! view_render_event('bagisto.shop.components.products.card.wishlist_option.after') !!}

                        {!! view_render_event('bagisto.shop.components.products.card.compare_option.before') !!}

                        @if (core()->getConfigData('general.content.shop.compare_option'))
                            <span 
                                class="icon-compare flex justify-center items-center absolute top-16 ltr:right-5 rtl:left-5 w-[30px] h-[30px] bg-white rounded-md text-2xl cursor-pointer"
                                role="button"
                                aria-label="@lang('shop::app.components.products.card.add-to-compare')"
                                tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @click="addToCompare(product.id)"
                            >
                            </span>
                        @endif
<<<<<<< HEAD
=======

                        {!! view_render_event('bagisto.shop.components.products.card.compare_option.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    </div> 
                </div> 
            </div> 

<<<<<<< HEAD
            <div class="grid gap-[15px] content-start"> 
=======
            <div class="grid gap-4 content-start"> 

                {!! view_render_event('bagisto.shop.components.products.card.name.before') !!}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <p 
                    class="text-base" 
                    v-text="product.name"
                >
                </p> 

<<<<<<< HEAD
=======
                {!! view_render_event('bagisto.shop.components.products.card.name.after') !!}

                {!! view_render_event('bagisto.shop.components.products.card.price.before') !!}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <div 
                    class="flex gap-2.5 text-lg font-semibold"
                    v-html="product.price_html"
                >   
                </div> 

<<<<<<< HEAD
=======
                {!! view_render_event('bagisto.shop.components.products.card.price.after') !!}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <!-- Needs to implement that in future -->
                <div class="hidden flex gap-4"> 
                    <span class="block w-[30px] h-[30px] rounded-full bg-[#B5DCB4]">
                    </span> 

                    <span class="block w-[30px] h-[30px] rounded-full bg-[#5C5C5C]">
                    </span> 
                </div> 
                
<<<<<<< HEAD
                <p class="text-[14px] text-[#6E6E6E]" v-if="! product.avg_ratings">
                    @lang('shop::app.components.products.card.review-description')
                </p>
            
                <p v-else class="text-[14px] text-[#6E6E6E]">
=======
                {!! view_render_event('bagisto.shop.components.products.card.price.after') !!}

                <p class="text-sm text-[#6E6E6E]" v-if="! product.avg_ratings">
                    @lang('shop::app.components.products.card.review-description')
                </p>
            
                {!! view_render_event('bagisto.shop.components.products.card.average_ratings.before') !!}

                <p v-else class="text-sm text-[#6E6E6E]">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <x-shop::products.star-rating 
                        ::value="product && product.avg_ratings ? product.avg_ratings : 0"
                        :is-editable=false
                    >
                    </x-shop::products.star-rating>
                </p>
<<<<<<< HEAD
            
                <div 
                    class="primary-button px-[30px] py-[10px] whitespace-nowrap"
                    @click="addToCart()"
                >
                    @lang('shop::app.components.products.card.add-to-cart')
                </div> 
=======

                {!! view_render_event('bagisto.shop.components.products.card.average_ratings.after') !!}

                {!! view_render_event('bagisto.shop.components.products.card.add_to_cart.before') !!}

                <x-shop::button
                    class="primary-button px-8 py-2.5 whitespace-nowrap"
                    :title="trans('shop::app.components.products.card.add-to-cart')"
                    :loading="false"
                    ::disabled="! product.is_saleable"
                    ref="addToCartButton"
                    @click="addToCart()"
                >
                </x-shop::button>

                {!! view_render_event('bagisto.shop.components.products.card.add_to_cart.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </div> 
        </div>
    </script>

    <script type="module">
        app.component('v-product-card', {
            template: '#v-product-card-template',

            props: ['mode', 'product'],

            data() {
                return {
                    isCustomer: '{{ auth()->guard('customer')->check() }}',
                }
            },

            methods: {
                addToWishlist() {
                    if (this.isCustomer) {
                        this.$axios.post(`{{ route('shop.api.customers.account.wishlist.store') }}`, {
                                product_id: this.product.id
                            })
                            .then(response => {
                                this.product.is_wishlist = ! this.product.is_wishlist;
                                
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
                    let items = this.getStorageValue() ?? [];

                    if (items.length) {
                        if (! items.includes(productId)) {
                            items.push(productId);

                            localStorage.setItem('compare_items', JSON.stringify(items));

<<<<<<< HEAD
                            this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.components.products.card.add-to-compare')" });
=======
                            this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.components.products.card.add-to-compare-success')" });
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        } else {
                            this.$emitter.emit('add-flash', { type: 'warning', message: "@lang('shop::app.components.products.card.already-in-compare')" });
                        }
                    } else {
                        localStorage.setItem('compare_items', JSON.stringify([productId]));
                            
<<<<<<< HEAD
                        this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.components.products.card.add-to-compare')" });
=======
                        this.$emitter.emit('add-flash', { type: 'success', message: "@lang('shop::app.components.products.card.add-to-compare-success')" });
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                    }
                },

                getStorageValue(key) {
                    let value = localStorage.getItem('compare_items');

                    if (! value) {
                        return [];
                    }

                    return JSON.parse(value);
                },

                addToCart() {
<<<<<<< HEAD
=======

                    this.$refs.addToCartButton.isLoading = true;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', {
                            'quantity': 1,
                            'product_id': this.product.id,
                        })
                        .then(response => {
                            if (response.data.data.redirect_uri) {
                                window.location.href = response.data.data.redirect_uri;
                            }

                            if (response.data.message) {
                                this.$emitter.emit('update-mini-cart', response.data.data );

                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                            } else {
                                this.$emitter.emit('add-flash', { type: 'warning', message: response.data.data.message });
                            }
<<<<<<< HEAD
                        })
                        .catch(error => {
=======

                            this.$refs.addToCartButton.isLoading = false;
                        })
                        .catch(error => {
                            this.$refs.addToCartButton.isLoading = false;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            this.$emitter.emit('add-flash', { type: 'error', message: response.data.message });
                        });
                },
            },
        });
    </script>
@endpushOnce
