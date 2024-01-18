{!! view_render_event('bagisto.shop.products.view.reviews.after', ['product' => $product]) !!}

<<<<<<< HEAD
<v-product-review :product-id="{{ $product->id }}">
    <div class="container max-1180:px-[20px]">
        <x-shop::shimmer.products.reviews/>
    </div>
</v-product-review>
=======
<v-product-reviews :product-id="{{ $product->id }}">
    <div class="container max-1180:px-5">
        <x-shop::shimmer.products.reviews/>
    </div>
</v-product-reviews>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

{!! view_render_event('bagisto.shop.products.view.reviews.after', ['product' => $product]) !!}

@pushOnce('scripts')
<<<<<<< HEAD
    {{-- Product Review Template --}}
    <script type="text/x-template" id="v-product-review-template">
        <div class="container max-1180:px-[20px]">
=======
    <!-- Product Review Template -->
    <script type="text/x-template" id="v-product-reviews-template">
        <div class="container max-1180:px-5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <!-- Create Review Form Container -->
            <div 
                class="w-full" 
                v-if="canReview"
            >
                <x-shop::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <!-- Review Form -->
                    <form
<<<<<<< HEAD
                        class="grid grid-cols-[auto_1fr] gap-[40px] justify-center max-md:grid-cols-[1fr]"
=======
                        class="grid grid-cols-[auto_1fr] gap-10 justify-center max-md:grid-cols-[1fr]"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @submit="handleSubmit($event, store)"
                        enctype="multipart/form-data"
                    >
                        <div class="max-w-[286px]">
                            <x-shop::form.control-group>
                                <x-shop::form.control-group.control
                                    type="image"
                                    name="attachments"
                                    class="!p-0 !mb-0"
<<<<<<< HEAD
                                    rules="required"
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    ref="reviewImages"
                                    :label="trans('shop::app.products.view.reviews.attachments')"
                                    :is-multiple="true"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    class="mt-4"
                                    control-name="attachments"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>
                        </div>
                        
                        <div>
                            <x-shop::form.control-group>
<<<<<<< HEAD
                                <x-shop::form.control-group.label class="mt-[0] required">
=======
                                <x-shop::form.control-group.label class="mt-0 required">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('shop::app.products.view.reviews.rating')
                                </x-shop::form.control-group.label>

                                <x-shop::products.star-rating
                                    name="rating"
                                    :value="old('rating') ?? 5"
                                    :disabled="false"
                                    rules="required"
                                    :label="trans('shop::app.products.view.reviews.rating')"
                                >
                                </x-shop::products.star-rating>

                                <x-shop::form.control-group.error
                                    control-name="rating"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            @if (
                                core()->getConfigData('catalog.products.review.guest_review')
                                && ! auth()->guard('customer')->user()
                            )
                                <x-shop::form.control-group>
                                    <x-shop::form.control-group.label class="required">
                                        @lang('shop::app.products.view.reviews.name')
                                    </x-shop::form.control-group.label>

                                    <x-shop::form.control-group.control
                                        type="text"
                                        name="name"
                                        :value="old('name')"
                                        rules="required"
                                        :label="trans('shop::app.products.view.reviews.name')"
                                        :placeholder="trans('shop::app.products.view.reviews.name')"
                                    >
                                    </x-shop::form.control-group.control>

                                    <x-shop::form.control-group.error
                                        control-name="name"
                                    >
                                    </x-shop::form.control-group.error>
                                </x-shop::form.control-group>
                            @endif

                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required">
                                    @lang('shop::app.products.view.reviews.title')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="text"
                                    name="title"
                                    :value="old('title')"
                                    rules="required"
                                    :label="trans('shop::app.products.view.reviews.title')"
                                    :placeholder="trans('shop::app.products.view.reviews.title')"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="title"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>

                            <x-shop::form.control-group>
                                <x-shop::form.control-group.label class="required">
                                    @lang('shop::app.products.view.reviews.comment')
                                </x-shop::form.control-group.label>

                                <x-shop::form.control-group.control
                                    type="textarea"
                                    rows="12"
                                    name="comment"
                                    :value="old('comment')"
                                    rules="required"
                                    :label="trans('shop::app.products.view.reviews.comment')"
                                    :placeholder="trans('shop::app.products.view.reviews.comment')"
                                >
                                </x-shop::form.control-group.control>

                                <x-shop::form.control-group.error
                                    control-name="comment"
                                >
                                </x-shop::form.control-group.error>
                            </x-shop::form.control-group>


<<<<<<< HEAD
                            <div class="flex gap-[15px] justify-start max-sm:flex-wrap mt-4 max-sm:justify-center max-sm:mb-[20px] max-xl:mb-[20px]">
                                <button
                                    class="primary-button w-full max-w-[374px] py-[16px] px-[43px] rounded-[18px] text-center"
=======
                            <div class="flex gap-4 justify-start max-sm:flex-wrap mt-4 max-sm:justify-center max-sm:mb-5 max-xl:mb-5">
                                <button
                                    class="primary-button w-full max-w-[374px] py-4 px-11 rounded-2xl text-center"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    type='submit'
                                >
                                    @lang('shop::app.products.view.reviews.submit-review')
                                </button>
                                
                                <button
                                    type="button"
<<<<<<< HEAD
                                    class="secondary-button items-center px-[30px] py-[10px] rounded-[18px] max-sm:w-full max-sm:max-w-[374px]"
=======
                                    class="secondary-button items-center px-8 py-2.5 rounded-2xl max-sm:w-full max-sm:max-w-[374px]"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @click="canReview = false"
                                >
                                    @lang('shop::app.products.view.reviews.cancel')
                                </button>
                            </div>
                        </div>
                    </form>
                </x-shop::form>
            </div>

            <!-- Product Reviews Container -->
            <div v-else>
                <!-- Review Container Shimmer Effect -->
                <template v-if="isLoading">
                    <x-shop::shimmer.products.reviews/>
                </template>

                <template v-else>
                    <!-- Review Section Header -->
<<<<<<< HEAD
                    <div class="flex gap-[15px] items-center justify-between  max-sm:flex-wrap">
                        <h3 class="font-dmserif text-[30px] max-sm:text-[22px]">
=======
                    <div class="flex gap-4 items-center justify-between  max-sm:flex-wrap">
                        <h3 class="font-dmserif text-3xl max-sm:text-xl">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('shop::app.products.view.reviews.customer-review')
                        </h3>
                        
                        @if (
                            core()->getConfigData('catalog.products.review.guest_review')
                            || auth()->guard('customer')->user()
                        )
                            <div
<<<<<<< HEAD
                                class="flex gap-x-[15px] items-center px-[15px] py-[10px] border border-navyBlue rounded-[12px] cursor-pointer"
                                @click="canReview = true"
                            >
                                <span class="icon-pen text-[24px]"></span>
=======
                                class="flex gap-x-4 items-center px-4 py-2.5 border border-navyBlue rounded-xl cursor-pointer"
                                @click="canReview = true"
                            >
                                <span class="icon-pen text-2xl"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                                @lang('shop::app.products.view.reviews.write-a-review')
                            </div>
                        @endif
                    </div>

                    <template v-if="reviews.length">
                        <!-- Average Rating Section -->
<<<<<<< HEAD
                        <div class="flex gap-[15px] justify-between items-center max-w-[365px] mt-[30px] max-sm:flex-wrap">
                            <p class="text-[30px] font-medium max-sm:text-[16px]">{{ number_format($avgRatings, 1) }}</p>

                            <x-shop::products.star-rating :value="$avgRatings"></x-shop::products.star-rating>

                            <p class="text-[12px] text-[#858585]">
=======
                        <div class="flex gap-4 justify-between items-center max-w-[365px] mt-8 max-sm:flex-wrap">
                            <p class="text-3xl font-medium max-sm:text-base">{{ number_format($avgRatings, 1) }}</p>

                            <x-shop::products.star-rating :value="$avgRatings"></x-shop::products.star-rating>

                            <p class="text-xs text-[#858585]">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                (@{{ meta.total }} @lang('shop::app.products.view.reviews.customer-review'))
                            </p>
                        </div>

                        <!-- Ratings By Individual Stars -->
<<<<<<< HEAD
                        <div class="flex gap-x-[20px] items-center">
                            <div class="flex gap-y-[18px] flex-wrap max-w-[365px] mt-[10px]">
                                @for ($i = 5; $i >= 1; $i--)
                                    <div class="flex gap-x-[25px] items-center max-sm:flex-wrap">
                                        <div class="text-[16px] font-medium">{{ $i }} Stars</div>
                                        <div class="h-[16px] w-[275px] max-w-full bg-[#E5E5E5] rounded-[2px]">
                                            <div class="h-[16px] bg-[#FEA82B] rounded-[2px]" style="width: {{ $percentageRatings[$i] }}%"></div>
=======
                        <div class="flex gap-x-5 items-center">
                            <div class="grid gap-y-5 flex-wrap max-w-[365px] mt-2.5">
                                @for ($i = 5; $i >= 1; $i--)
                                    <div class="row grid grid-cols-[1fr_2fr] gap-2.5 items-center max-sm:flex-wrap">
                                        <div class="text-base font-medium">{{ $i }} Stars</div>

                                        <div class="h-4 w-[275px] max-w-full bg-[#E5E5E5] rounded-sm">
                                            <div class="h-4 bg-[#FEA82B] rounded-sm" style="width: {{ $percentageRatings[$i] }}%"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>

<<<<<<< HEAD
                        <div class="grid grid-cols-[1fr_1fr] gap-[20px] mt-[60px] max-1060:grid-cols-[1fr]">
=======
                        <div class="grid grid-cols-[1fr_1fr] gap-5 mt-14 max-1060:grid-cols-[1fr]">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <!-- Product Review Item Vue Component -->
                            <v-product-review-item
                                v-for='review in reviews'
                                :review="review"
                            ></v-product-review-item>
                        </div>

                        <button
<<<<<<< HEAD
                            class="block mx-auto w-max mt-[60px] py-[11px] px-[43px] bg-white border border-navyBlue rounded-[18px] text-center text-navyBlue text-base font-medium"
=======
                            class="block mx-auto w-max mt-14 py-3 px-11 bg-white border border-navyBlue rounded-2xl text-center text-navyBlue text-base font-medium"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            v-if="links?.next"
                            @click="get()"
                        >
                            @lang('shop::app.products.view.reviews.load-more')
                        </button>
                    </template>

                    <template v-else>
                        <!-- Empty Review Section -->
<<<<<<< HEAD
                        <div class="grid items-center justify-items-center w-[100%] m-auto h-[476px] place-content-center text-center">
                            <img class="" src="{{ bagisto_asset('images/review.png') }}" alt="" title="">

                            <p class="text-[20px]">
=======
                        <div class="grid items-center justify-items-center w-full m-auto h-[476px] place-content-center text-center">
                            <img class="" src="{{ bagisto_asset('images/review.png') }}" alt="" title="">

                            <p class="text-xl">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @lang('shop::app.products.view.reviews.empty-review')
                            </p>
                        </div>
                    </template>
                </template>
            </div>
        </div>
    </script>

<<<<<<< HEAD
    {{-- Product Review Item Template --}}
    <script type="text/x-template" id="v-product-review-item-template">
        <div class="flex gap-[20px] p-[25px] border border-[#e5e5e5] rounded-[12px] max-sm:flex-wrap max-xl:mb-[20px]">
            <div>
                <div
                    class="flex justify-center items-center min-h-[100px] max-h-[100px] min-w-[100px] max-w-[100px] rounded-[12px] bg-[#F5F5F5] max-sm:hidden"
                    :title="review.name"
                >
                    <span
                        class="text-[24px] text-[#6E6E6E] font-semibold"
=======
    <!-- Product Review Item Template -->
    <script type="text/x-template" id="v-product-review-item-template">
        <div class="flex gap-5 p-6 border border-[#e5e5e5] rounded-xl max-sm:flex-wrap max-xl:mb-5">
            <div>
                <img
                    v-if="review.profile"
                    class="flex justify-center items-center min-h-[100px] max-h-[100px] min-w-[100px] max-w-[100px] rounded-xl max-sm:hidden"
                    :src="review.profile"
                    :alt="review.name"
                    :title="review.name"
                >

                <div
                    v-else
                    class="flex justify-center items-center min-h-[100px] max-h-[100px] min-w-[100px] max-w-[100px] rounded-xl bg-[#F5F5F5] max-sm:hidden"
                    :title="review.name"
                >
                    <span
                        class="text-2xl text-[#6E6E6E] font-semibold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-text="review.name.split(' ').map(name => name.charAt(0).toUpperCase()).join('')"
                    >
                    </span>
                </div>
            </div>

            <div class="w-full">
                <div class="flex justify-between">
                    <p
<<<<<<< HEAD
                        class="text-[20px] font-medium max-sm:text-[16px]"
=======
                        class="text-xl font-medium max-sm:text-base"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-text="review.name"
                    >
                    </p>

                    <div class="flex items-center">
                        <x-shop::products.star-rating 
                            ::name="review.name" 
                            ::value="review.rating"
                        >
                        </x-shop::products.star-rating>
                    </div>
                </div>

                <p
<<<<<<< HEAD
                    class="mt-[10px] text-[14px] font-medium max-sm:text-[12px]"
=======
                    class="mt-2.5 text-sm font-medium max-sm:text-xs"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-text="review.created_at"
                >
                </p>

                <p
<<<<<<< HEAD
                    class="mt-[20px] text-[16px] text-[#6E6E6E] font-semibold max-sm:text-[12px]"
=======
                    class="mt-5 text-base text-[#6E6E6E] font-semibold max-sm:text-xs"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-text="review.title"
                >
                </p>

                <p
<<<<<<< HEAD
                    class="mt-[20px] text-[16px] text-[#6E6E6E] max-sm:text-[12px]"
=======
                    class="mt-5 text-base text-[#6E6E6E] max-sm:text-xs"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-text="review.comment"
                >
                </p>

<<<<<<< HEAD
                <div class="flex gap-2 flex-wrap mt-2">
=======
                <button
                    class="secondary-button min-h-[34px] mt-2.5 px-2 py-1 rounded-lg text-sm"
                    @click="translate"
                >
                    <!-- Spinner -->
                    <template v-if="isLoading">
                        <img
                            class="animate-spin h-5 w-5 text-blue-600"
                            src="{{ bagisto_asset('images/spinner.svg') }}"
                        />

                        @lang('shop::app.products.view.reviews.translating')
                    </template>

                    <template v-else>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" role="presentation"> <g clip-path="url(#clip0_3148_2242)"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1484 9.31989L9.31995 12.1483L19.9265 22.7549L22.755 19.9265L12.1484 9.31989ZM12.1484 10.7341L10.7342 12.1483L13.5626 14.9767L14.9768 13.5625L12.1484 10.7341Z" fill="#060C3B"/> <path d="M11.0877 3.30949L13.5625 4.44748L16.0374 3.30949L14.8994 5.78436L16.0374 8.25924L13.5625 7.12124L11.0877 8.25924L12.2257 5.78436L11.0877 3.30949Z" fill="#060C3B"/> <path d="M2.39219 2.39217L5.78438 3.95197L9.17656 2.39217L7.61677 5.78436L9.17656 9.17655L5.78438 7.61676L2.39219 9.17655L3.95198 5.78436L2.39219 2.39217Z" fill="#060C3B"/> <path d="M3.30947 11.0877L5.78434 12.2257L8.25922 11.0877L7.12122 13.5626L8.25922 16.0374L5.78434 14.8994L3.30947 16.0374L4.44746 13.5626L3.30947 11.0877Z" fill="#060C3B"/> </g> <defs> <clipPath id="clip0_3148_2242"> <rect width="24" height="24" fill="white"/> </clipPath> </defs> </svg>
                        
                        @lang('shop::app.products.view.reviews.translate')
                    </template>
                </button>

                <!-- Review Attachments -->
                <div
                    class="flex gap-2 flex-wrap mt-3"
                    v-if="review.images.length"
                >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <template v-for="file in review.images">
                        <a
                            :href="file.url"
                            class="h-12 w-12 flex"
                            target="_blank"
                            v-if="file.type == 'image'"
                        >
                            <img
<<<<<<< HEAD
                                class="min-w-[50px] max-h-[50px] rounded-[12px] cursor-pointer"
=======
                                class="min-w-[50px] max-h-[50px] rounded-xl cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :src="file.url"
                                :alt="review.name"
                                :title="review.name"
                            >
                        </a>

                        <a
                            :href="file.url"
                            class="flex h-12 w-12"
                            target="_blank"
                            v-else
                        >
                            <video
<<<<<<< HEAD
                                class="min-w-[50px] max-h-[50px] rounded-[12px] cursor-pointer"
=======
                                class="min-w-[50px] max-h-[50px] rounded-xl cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :src="file.url"
                                :alt="review.name"
                                :title="review.name"
                            >
                            </video>
                        </a>
                    </template>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
<<<<<<< HEAD
        app.component('v-product-review', {
            template: '#v-product-review-template',
=======
        app.component('v-product-reviews', {
            template: '#v-product-reviews-template',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

            props: ['productId'],

            data() {
                return {
                    isLoading: true,

                    canReview: false,

                    reviews: [],

                    links: {
                        next: '{{ route('shop.api.products.reviews.index', $product->id) }}',
                    },

                    meta: {},
                }
            },

            mounted() {
                this.get();
            },

            methods: {
                get() {
                    if (this.links?.next) {
                        this.$axios.get(this.links.next)
                            .then(response => {
                                this.isLoading = false;

                                this.reviews = [...this.reviews, ...response.data.data];

                                this.links = response.data.links;

                                this.meta = response.data.meta;
                            })
                            .catch(error => {});
                    }
                },

                store(params, { resetForm, setErrors }) {
<<<<<<< HEAD
=======
                    let selectedFiles = this.$refs.reviewImages.uploadedFiles.filter(obj => obj.file instanceof File).map(obj => obj.file);

                    params.attachments = { ...params.attachments, ...selectedFiles };
                    
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    this.$axios.post('{{ route('shop.api.products.reviews.store', $product->id) }}', params, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(response => {
                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });

                            resetForm();

                            this.canReview = false;
                        })
                        .catch(error => {
                            setErrors({'attachments': ["@lang('shop::app.products.view.reviews.failed-to-upload')"]});

                            this.$refs.reviewImages.uploadedFiles.forEach(element => {
                                setTimeout(() => {
                                    this.$refs.reviewImages.removeFile();
                                }, 0);
                            });
                        });
                },

                selectReviewImage() {
                    this.reviewImage = event.target.files[0];
                },
            },
        });
        
        app.component('v-product-review-item', {
            template: '#v-product-review-item-template',

            props: ['review'],
<<<<<<< HEAD
=======

            data() {
                return {
                    isLoading: false,
                }
            },

            methods: {
                translate() {
                    this.isLoading = true;

                    this.$axios.get("{{ route('shop.api.products.reviews.translate', ['id' => $product->id, 'review_id' => ':reviewId']) }}".replace(':reviewId', this.review.id))
                        .then(response => {
                            this.isLoading = false;

                            this.review.comment = response.data.content;
                        })
                        .catch(error => {
                            this.isLoading = false;

                            this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                        });
                },
            },
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        });
    </script>
@endPushOnce