<v-product-gallery ref="gallery">
<<<<<<< HEAD
    <x-shop::shimmer.products.gallery/>
</v-product-gallery>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-gallery-template">
        <div class="flex gap-[30px] h-max sticky top-[30px] max-1180:hidden">
            <!-- Product Image Slider -->
            <div class="flex-24 place-content-start h-509 overflow-x-hidden overflow-y-auto flex gap-[30px] max-w-[100px] flex-wrap">
                <img 
                    :class="`min-w-[100px] max-h-[100px] rounded-[12px] ${ hover ? 'cursor-pointer' : '' }`" 
                    v-for="image in media.images"
                    :src="image.small_image_url"
                    alt="@lang('shop::app.products.view.gallery.thumbnail-image')"
                    width="100"
                    height="100"
                    @mouseover="change(image)"
                />

                <!-- Need to Set Play Button  -->
                <video 
                    class="min-w-[100px] rounded-[12px]"
                    v-for="video in media.videos"
                    @mouseover="change(video)"
                >
                    <source 
                        :src="video.video_url" 
                        type="video/mp4"
                    />
                </video>
=======
    <x-shop::shimmer.products.gallery />
</v-product-gallery>

@pushOnce('scripts')
<script type="text/x-template" id="v-product-gallery-template">
    <div class="flex gap-8 h-max sticky top-8 max-1180:hidden">
            <!-- Product Image Slider -->
            <div class="flex-24 justify-center place-content-start h-509 overflow-x-hidden overflow-y-auto flex gap-2.5 max-w-[100px] min-w-[100px] flex-wrap">
                <span
                    class="icon-arrow-up text-2xl cursor-pointer"
                    role="button"
                    aria-label="@lang('shop::app.components.products.carousel.previous')"
                    tabindex="0"
                    @click="swipeDown"
                    v-if= "lengthOfMedia"
                >
                </span>

                <div
                    ref="swiperContainer"
                    class="flex flex-col max-h-[540px] gap-2.5 [&>*]:flex-[0] overflow-auto scroll-smooth scrollbar-hide"
                >

                                 <img 
                        :class="`min-w-[100px] max-h-[100px] rounded-xl border transparent cursor-pointer ${activeIndex === `image_${index}` ? 'border border-navyBlue pointer-events-none' : 'border-white'}`"
                        v-for="(image, index) in media.images"
                        :src="image.small_image_url"
                        alt="{{ $product->name }}"
                        width="100"
                        height="100"
                        @click="change(image, `image_${index}`)"
                    />

                    <!-- Need to Set Play Button  -->
                    <video 
                        :class="`min-w-[100px] max-h-[100px] rounded-xl border transparent cursor-pointer ${activeIndex === `video_${index}` ? 'border border-navyBlue pointer-events-none' : 'border-white'}`"
                        v-for="(video, index) in media.videos"
                        @click="change(video, `video_${index}`)"
                    >
                        <source 
                            :src="video.video_url"
                            type="video/mp4"
                        />
                    </video>
                </div>

                <span
                    class="icon-arrow-down text-2xl cursor-pointer"
                    role="button"
                    aria-label="@lang('shop::app.components.products.carousel.previous')"
                    tabindex="0"
                    @click="swipeTop"
                    v-if= "lengthOfMedia"
                >
                </span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </div>
            
            <!-- Media shimmer Effect -->
            <div
<<<<<<< HEAD
                class="max-w-[560px] max-h-[609px]"
                v-show="isMediaLoading"
            >
                <div class="min-w-[560px] min-h-[607px] bg-[#E9E9E9] rounded-[12px] shimmer"></div>
            </div>

            <div
                class="max-w-[560px] max-h-[609px]"
                v-show="! isMediaLoading"
            >
                <img 
                    class="min-w-[450px] rounded-[12px]" 
                    :src="baseFile.path" 
                    v-if="baseFile.type == 'image'"
                    alt="@lang('shop::app.products.view.gallery.product-image')"
                    width="560"
                    height="609"
=======
                class="max-w-[560px] max-h-[610px]"
                v-show="isMediaLoading"
            >
                <div class="min-w-[560px] min-h-[607px] bg-[#E9E9E9] rounded-xl shimmer"></div>
            </div>

            <div
                class="max-w-[560px] max-h-[610px]"
                v-show="! isMediaLoading"
            >
                <img
                    class="min-w-[450px] rounded-xl" 
                    :src="baseFile.path" 
                    v-if="baseFile.type == 'image'"
                    alt="{{ $product->name }}"
                    width="560"
                    height="610"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @load="onMediaLoad()"
                />

                <div
<<<<<<< HEAD
                    class="min-w-[450px] rounded-[12px]"
                    v-if="baseFile.type == 'video'"
                >
                    <video  
                        controls                             
                        width='475'
                        @load="onMediaLoad()"
                    >
                        <source 
                            :src="baseFile.path" 
                            type="video/mp4"
                        />
                    </video>    
=======
                    class="min-w-[450px] rounded-xl"
                    v-if="baseFile.type == 'video'"
                >
                    <video
                        controls
                        width="475"
                        @loadeddata="onMediaLoad()"
                    >
                        <source 
                            :src="baseFile.path"
                            type="video/mp4"
                        />
                    </video>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                </div>
                
            </div>
        </div>

        <!-- Product slider Image with shimmer -->
<<<<<<< HEAD
        <div class="flex gap-[30px] 1180:hidden overflow-auto scrollbar-hide">
            <x-shop::media.images.lazy
                ::src="image.large_image_url"
                class="min-w-[450px] max-sm:min-w-full w-[490px]" 
=======
        <div class="flex gap-8 1180:hidden overflow-auto scrollbar-hide">
            <x-shop::media.images.lazy
                ::src="image.large_image_url"
                class="min-w-[450px] max-sm:min-w-full w-[490px]"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                v-for="image in media.images"
            >
            </x-shop::media.images.lazy>
        </div>
    </script>

<<<<<<< HEAD
    <script type="module">
        app.component('v-product-gallery', {
            template: '#v-product-gallery-template',

            data() {
                return {
                    isMediaLoading: true,

                    media: {
                        images: @json(product_image()->getGalleryImages($product)),

                        videos: @json(product_video()->getVideos($product)),
                    },

                    baseFile: {
                        type: '',

                        path: ''
                    },

                    hover: false,
                }
            },

            watch: {
                'media.images': {
                    deep: true,

                    handler(newImages, oldImages) {
                        if (JSON.stringify(newImages) !== JSON.stringify(oldImages)) {
                            this.baseFile.path = newImages[0].large_image_url; 
                        }
                    },
                },
            },

            mounted() {
                if (this.media.images.length) {
                    this.baseFile.type = 'image';
                    this.baseFile.path = this.media.images[0].large_image_url;
                } else {
                    this.baseFile.type = 'video';
                    this.baseFile.path = this.media.videos[0].video_url;
                }
            },

            methods: {
                onMediaLoad() {
                    this.isMediaLoading = false;
                },

                change(file) {
                    if (file.type == 'videos') {
                        this.baseFile.type = 'video';

                        this.baseFile.path = file.video_url;
                    } else {
                        this.baseFile.type = 'image';

                        this.baseFile.path = file.large_image_url;
                    }
                    
                    this.hover = true;
                }
            }
        })
    </script>
@endpushOnce
=======
<script type="module">
    app.component('v-product-gallery', {
        template: '#v-product-gallery-template',

        data() {
            return {
                isMediaLoading: true,

                media: {
                    images: @json(product_image()->getGalleryImages($product)),

                    videos: @json(product_video()->getVideos($product)),
                },

                baseFile: {
                    type: '',

                    path: ''
                },

                activeIndex: 0,

                containerOffset: 110,
            }
        },

        watch: {
            'media.images': {
                deep: true,

                handler(newImages, oldImages) {
                    let selectedImage = newImages?.[this.activeIndex];

                    if (JSON.stringify(newImages) !== JSON.stringify(oldImages) && selectedImage?.large_image_url) {
                        this.baseFile.path = selectedImage.large_image_url;
                    }
                },
            },
        },

        mounted() {
            if (this.media.images.length) {
                this.activeIndex = 'image_0';
                this.baseFile.type = 'image';
                this.baseFile.path = this.media.images[0].large_image_url;
            } else if (this.media.videos.length) {
                this.activeIndex = 'video_0';
                this.baseFile.type = 'video';
                this.baseFile.path = this.media.videos[0].video_url;
            }
        },

        computed: {
            lengthOfMedia() {
                if (this.media.images.length) {
                    return [...this.media.images, ...this.media.videos].length > 5;
                }
            }
        },

        methods: {
            onMediaLoad() {
                this.isMediaLoading = false;
            },

            change(file, index) {
                this.isMediaLoading = true;

                if (file.type == 'videos') {
                    this.baseFile.type = 'video';
                    this.baseFile.path = file.video_url;
                    this.onMediaLoad();
                } else {
                    this.baseFile.type = 'image';
                    this.baseFile.path = file.large_image_url;
                }

                if (index > this.activeIndex) {
                    this.swipeDown();
                } else if (index < this.activeIndex) {
                    this.swipeTop();
                }

                this.activeIndex = index;
            },

            swipeTop() {
                const container = this.$refs.swiperContainer;
                container.scrollTop -= this.containerOffset;
            },

            swipeDown() {
                const container = this.$refs.swiperContainer;
                container.scrollTop += this.containerOffset;
            },
        }
    })
</script>
@endpushOnce
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
