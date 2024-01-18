<<<<<<< HEAD
{{-- SEO Meta Content --}}
=======
<!-- SEO Meta Content -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@push('meta')
    <meta name="description" content="{{ trim($category->meta_description) != "" ? $category->meta_description : \Illuminate\Support\Str::limit(strip_tags($category->description), 120, '') }}"/>

    <meta name="keywords" content="{{ $category->meta_keywords }}"/>

    @if (core()->getConfigData('catalog.rich_snippets.categories.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getCategoryJsonLd($category) !!}
        </script>
    @endif
@endPush

<x-shop::layouts>
<<<<<<< HEAD
    {{-- Page Title --}}
=======
    <!-- Page Title -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-slot:title>
        {{ trim($category->meta_title) != "" ? $category->meta_title : $category->name }}
    </x-slot>

<<<<<<< HEAD
    {{-- Hero Image --}}
    @if ($category->banner_path)
        <div class="container mt-[30px] px-[60px] max-lg:px-[30px]">
            <div>
                <img
                    class="rounded-[12px]"
=======
    {!! view_render_event('bagisto.shop.categories.view.banner_path.before') !!}

    <!-- Hero Image -->
    @if ($category->banner_path)
        <div class="container mt-8 px-[60px] max-lg:px-8 max-sm:px-4">
            <div>
                <img
                    class="rounded-xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    src="{{ $category->banner_url }}"
                    alt="{{ $category->name }}"
                    width="1320"
                    height="300"
                >
            </div>
        </div>
    @endif

<<<<<<< HEAD
    @if (in_array($category->display_mode, [null, 'description_only', 'products_and_description']))
        @if ($category->description)
            <div class="container mt-[30px] px-[60px] max-lg:px-[30px]">
=======
    {!! view_render_event('bagisto.shop.categories.view.banner_path.after') !!}

    {!! view_render_event('bagisto.shop.categories.view.description.before') !!}

    @if (in_array($category->display_mode, [null, 'description_only', 'products_and_description']))
        @if ($category->description)
            <div class="container mt-8 px-[60px] max-lg:px-8 max-sm:px-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                {!! $category->description !!}
            </div>
        @endif
    @endif
<<<<<<< HEAD

    @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
        {{-- Category Vue Component --}}
        <v-category>
            {{-- Category Shimmer Effect --}}
=======
        
    {!! view_render_event('bagisto.shop.categories.view.description.after') !!}

    @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
        <!-- Category Vue Component -->
        <v-category>
            <!-- Category Shimmer Effect -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <x-shop::shimmer.categories.view/>
        </v-category>
    @endif

    @pushOnce('scripts')
        <script 
            type="text/x-template" 
            id="v-category-template"
        >
<<<<<<< HEAD
            <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
                <div class="flex gap-[40px] items-start md:mt-[40px] max-lg:gap-[20px]">
=======
            <div class="container px-[60px] max-lg:px-8 max-sm:px-4">
                <div class="flex gap-10 items-start md:mt-10 max-lg:gap-5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <!-- Product Listing Filters -->
                    @include('shop::categories.filters')

                    <!-- Product Listing Container -->
                    <div class="flex-1">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            @include('shop::categories.toolbar')
                        </div>

                        <!-- Product List Card Container -->
                        <div
<<<<<<< HEAD
                            class="grid grid-cols-1 gap-[25px] mt-[30px]"
=======
                            class="grid grid-cols-1 gap-6 mt-8"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            v-if="filters.toolbar.mode === 'list'"
                        >
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <x-shop::shimmer.products.cards.list count="12"></x-shop::shimmer.products.cards.list>
                            </template>

                            <!-- Product Card Listing -->
<<<<<<< HEAD
=======
                            {!! view_render_event('bagisto.shop.categories.view.list.product_card.before') !!}

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <template v-else>
                                <template v-if="products.length">
                                    <x-shop::products.card
                                        ::mode="'list'"
                                        v-for="product in products"
                                    >
                                    </x-shop::products.card>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
<<<<<<< HEAD
                                    <div class="grid items-center justify-items-center place-content-center w-[100%] m-auto h-[476px] text-center">
                                        <img 
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="placeholder"
                                        />
                                  
                                        <p class="text-[20px]">
=======
                                    <div class="grid items-center justify-items-center place-content-center w-full m-auto h-[476px] text-center">
                                        <img 
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="@lang('shop::app.categories.view.empty')"
                                        />
                                  
                                        <p
                                            class="text-xl"
                                            role="heading"
                                        >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @lang('shop::app.categories.view.empty')
                                        </p>
                                    </div>
                                </template>
                            </template>
<<<<<<< HEAD
                        </div>

                        <!-- Product Grid Card Container -->
                        <div v-else class="mt-[30px]">
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <div class="grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-sm:justify-items-center max-sm:gap-[16px]">
=======

                            {!! view_render_event('bagisto.shop.categories.view.list.product_card.after') !!}
                        </div>

                        <!-- Product Grid Card Container -->
                        <div v-else class="mt-8">
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <div class="grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-sm:justify-items-center max-sm:gap-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <x-shop::shimmer.products.cards.grid count="12"></x-shop::shimmer.products.cards.grid>
                                </div>
                            </template>

<<<<<<< HEAD
                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div class="grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-sm:justify-items-center max-sm:gap-[16px]">
=======
                            {!! view_render_event('bagisto.shop.categories.view.grid.product_card.before') !!}

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div class="grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-sm:justify-items-center max-sm:gap-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        <x-shop::products.card
                                            ::mode="'grid'"
                                            v-for="product in products"
                                        >
                                        </x-shop::products.card>
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
<<<<<<< HEAD
                                    <div class="grid items-center justify-items-center place-content-center w-[100%] m-auto h-[476px] text-center">
                                        <img 
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="placeholder"
                                        />
                                        
                                        <p class="text-[20px]">
=======
                                    <div class="grid items-center justify-items-center place-content-center w-full m-auto h-[476px] text-center">
                                        <img 
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="@lang('shop::app.categories.view.empty')"
                                        />
                                        
                                        <p
                                            class="text-xl"
                                            role="heading"
                                        >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @lang('shop::app.categories.view.empty')
                                        </p>
                                    </div>
                                </template>
                            </template>
<<<<<<< HEAD
                        </div>

                        <!-- Load More Button -->
                        <button
                            class="secondary-button block mx-auto w-max py-[11px] mt-[60px] px-[43px] rounded-[18px] text-base text-center"
                            @click="loadMoreProducts"
                            v-if="links.next"
                        >
                            @lang('shop::app.categories.view.load-more')
                        </button>
=======

                            {!! view_render_event('bagisto.shop.categories.view.grid.product_card.after') !!}
                        </div>

                        {!! view_render_event('bagisto.shop.categories.view.load_more_button.before') !!}

                        <!-- Load More Button -->
                        <button
                            class="secondary-button block mx-auto w-max py-3 mt-14 px-11 rounded-2xl text-base text-center"
                            @click="loadMoreProducts"
                            v-if="links.next && ! loader"
                        >
                            @lang('shop::app.categories.view.load-more')
                        </button>

                        <button
                            v-else-if="links.next"
                            class="secondary-button block w-max mx-auto py-3.5 mt-14 px-[74.5px] rounded-2xl text-base text-center"
                        >
                            <!-- Spinner -->
                            <img
                                class="animate-spin h-5 w-5 text-navyBlue"
                                src="{{ bagisto_asset('images/spinner.svg') }}"
                                alt="Loading"
                            />
                        </button>

                        {!! view_render_event('bagisto.shop.categories.view.grid.load_more_button.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    </div>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-category', {
                template: '#v-category-template',

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,

                        isLoading: true,

                        isDrawerActive: {
                            toolbar: false,
                            
                            filter: false,
                        },

                        filters: {
                            toolbar: {},
                            
                            filter: {},
                        },

                        products: [],

                        links: {},
<<<<<<< HEAD
=======

                        loader: false,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    }
                },

                computed: {
                    queryParams() {
                        let queryParams = Object.assign({}, this.filters.filter, this.filters.toolbar);

                        return this.removeJsonEmptyValues(queryParams);
                    },

                    queryString() {
                        return this.jsonToQueryString(this.queryParams);
                    },
                },

                watch: {
                    queryParams() {
                        this.getProducts();
                    },

                    queryString() {
                        window.history.pushState({}, '', '?' + this.queryString);
                    },
                },

                methods: {
                    setFilters(type, filters) {
                        this.filters[type] = filters;
                    },

                    clearFilters(type, filters) {
                        this.filters[type] = {};
                    },

                    getProducts() {
                        this.isDrawerActive = {
                            toolbar: false,
                            
                            filter: false,
                        };

<<<<<<< HEAD
=======
                        document.body.style.overflow ='scroll';

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        this.$axios.get("{{ route('shop.api.products.index', ['category_id' => $category->id]) }}", {
                            params: this.queryParams 
                        })
                            .then(response => {
                                this.isLoading = false;

                                this.products = response.data.data;

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                    },

                    loadMoreProducts() {
<<<<<<< HEAD
                        if (this.links.next) {
                            this.$axios.get(this.links.next).then(response => {
=======
                        if (! this.links.next) {
                            return;
                        }

                        this.loader = true;

                        this.$axios.get(this.links.next)
                            .then(response => {
                                this.loader = false;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                this.products = [...this.products, ...response.data.data];

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
<<<<<<< HEAD
                        }
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    },

                    removeJsonEmptyValues(params) {
                        Object.keys(params).forEach(function (key) {
                            if ((! params[key] && params[key] !== undefined)) {
                                delete params[key];
                            }

                            if (Array.isArray(params[key])) {
                                params[key] = params[key].join(',');
                            }
                        });

                        return params;
                    },

                    jsonToQueryString(params) {
                        let parameters = new URLSearchParams();

                        for (const key in params) {
                            parameters.append(key, params[key]);
                        }

                        return parameters.toString();
                    }
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
