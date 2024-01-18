<v-products-carousel
    src="{{ $src }}"
    title="{{ $title }}"
    navigation-link="{{ $navigationLink ?? '' }}"
>
    <x-shop::shimmer.products.carousel :navigation-link="$navigationLink ?? false"></x-shop::shimmer.products.carousel>
</v-products-carousel>

@pushOnce('scripts')
    <script type="text/x-template" id="v-products-carousel-template">
<<<<<<< HEAD
        <div class="container mt-20 max-lg:px-[30px] max-sm:mt-[30px]" v-if="! isLoading && products.length">
            <div class="flex justify-between">
                <h3 class="text-[30px] font-dmserif max-sm:text-[25px]" v-text="title"></h3>

                <div class="flex gap-8 justify-between items-center">
                    <span
                        class="icon-arrow-left-stylish rtl:icon-arrow-right-stylish inline-block text-[24px] cursor-pointer"
=======
        <div class="container mt-20 max-lg:px-8 max-sm:mt-8" v-if="! isLoading && products.length">
            <div class="flex justify-between">
                <h2 class="text-3xl font-dmserif max-sm:text-2xl" v-text="title"></h2>

                <div class="flex gap-8 justify-between items-center">
                    <span
                        class="icon-arrow-left-stylish rtl:icon-arrow-right-stylish inline-block text-2xl cursor-pointer"
                        role="button"
                        aria-label="@lang('shop::app.components.products.carousel.previous')"
                        tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @click="swipeLeft"
                    >
                    </span>

                    <span
<<<<<<< HEAD
                        class="icon-arrow-right-stylish rtl:icon-arrow-left-stylish inline-block text-[24px] cursor-pointer"
=======
                        class="icon-arrow-right-stylish rtl:icon-arrow-left-stylish inline-block text-2xl cursor-pointer"
                        role="button"
                        aria-label="@lang('shop::app.components.products.carousel.next')"
                        tabindex="0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @click="swipeRight"
                    >
                    </span>
                </div>
            </div>

            <div
                ref="swiperContainer"
<<<<<<< HEAD
                class="flex gap-8 [&>*]:flex-[0] mt-[40px] overflow-auto scroll-smooth scrollbar-hide max-sm:mt-[20px]"
=======
                class="flex gap-8 [&>*]:flex-[0] mt-10 overflow-auto scroll-smooth scrollbar-hide max-sm:mt-5"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            >
                <x-shop::products.card
                    class="min-w-[291px]"
                    v-for="product in products"
                >
                </x-shop::products.card>
            </div>

            <a
                :href="navigationLink"
<<<<<<< HEAD
                class="secondary-button block w-max mt-[60px] mx-auto py-[11px] px-[43px] rounded-[18px] text-base text-center"
=======
                class="secondary-button block w-max mt-14 mx-auto py-3 px-11 rounded-2xl text-base text-center"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-if="navigationLink"
            >
                @lang('shop::app.components.products.carousel.view-all')
            </a>
        </div>

        <!-- Product Card Listing -->
        <template v-if="isLoading">
            <x-shop::shimmer.products.carousel :navigation-link="$navigationLink ?? false"></x-shop::shimmer.products.carousel>
        </template>
    </script>

    <script type="module">
        app.component('v-products-carousel', {
            template: '#v-products-carousel-template',

            props: [
                'src',
                'title',
                'navigationLink',
            ],

            data() {
                return {
                    isLoading: true,

                    products: [],

                    offset: 323,
                };
            },

            mounted() {
                this.getProducts();
            },

            methods: {
                getProducts() {
                    this.$axios.get(this.src)
                        .then(response => {
                            this.isLoading = false;

                            this.products = response.data.data;
                        }).catch(error => {
                            console.log(error);
                        });
                },

                swipeLeft() {
                    const container = this.$refs.swiperContainer;

                    container.scrollLeft -= this.offset;
                },

                swipeRight() {
                    const container = this.$refs.swiperContainer;

<<<<<<< HEAD
                    container.scrollLeft += this.offset;
=======
                    // Check if scroll reaches the end
                    if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
                        // Reset scroll to the beginning
                        container.scrollLeft = 0;
                    } else {
                        // Scroll to the right
                        container.scrollLeft += this.offset;
                    }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                },
            },
        });
    </script>
@endPushOnce
