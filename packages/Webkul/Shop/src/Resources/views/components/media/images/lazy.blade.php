<v-shimmer-image {{ $attributes }}>
    <div {{ $attributes->merge(['class' => 'shimmer']) }}>
    </div>
</v-shimmer-image>

@pushOnce('scripts')
    <script type="text/x-template" id="v-shimmer-image-template">
        <div
            :id="'image-shimmer-' + $.uid"
            class="shimmer"
            v-bind="$attrs"
            v-show="isLoading"
        >
        </div>
<<<<<<< HEAD
=======
        
        <img
            v-bind="$attrs"
            :data-src="src"
            :id="'image-' + $.uid"
            @load="onLoad"
            v-show="! isLoading"
            v-if="lazy"
        >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        <img
            v-bind="$attrs"
            :data-src="src"
            :id="'image-' + $.uid"
            @load="onLoad"
<<<<<<< HEAD
=======
            v-else
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            v-show="! isLoading"
        >
    </script>

    <script type="module">
        app.component('v-shimmer-image', {
            template: '#v-shimmer-image-template',

<<<<<<< HEAD
            props: ['src'],
=======
            props: {
                lazy: {
                    type: Boolean, 
                    default: true,
                },

                src: {
                    type: String, 
                    default: '',
                },
            },
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

            data() {
                return {
                    isLoading: true,
                };
            },

            mounted() {
                let self = this;
<<<<<<< HEAD
=======

                if (! this.lazy) {
                    return;
                }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = document.getElementById('image-' + self.$.uid);

                            lazyImage.src = lazyImage.dataset.src;

                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImageObserver.observe(document.getElementById('image-shimmer-' + this.$.uid));
            },
            
            methods: {
                onLoad() {
                    this.isLoading = false;
                },
            },
        });
    </script>
@endPushOnce
