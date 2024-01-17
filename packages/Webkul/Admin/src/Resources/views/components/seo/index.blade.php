<<<<<<< HEAD
<v-seo-helper></v-seo-helper>

@pushOnce('scripts')
    {{-- SEO Vue Component Template --}}
    <script type="text/x-template" id="v-seo-helper-template">
        <div class="flex flex-col gap-[3px] mb-[30px]">
=======
<v-seo-helper {{ $attributes }}></v-seo-helper>

@pushOnce('scripts')
    <!-- SEO Vue Component Template -->
    <script type="text/x-template" id="v-seo-helper-template">
        <div class="flex flex-col gap-1 mb-8">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <p 
                class="text-[#161B9D] dark:text-white"
                v-text="metaTitle"
            >
            </p>

            <!-- SEO Meta Title -->
            <p 
                class="text-[#135F29]"
<<<<<<< HEAD
                v-text="'{{ URL::to('/') }}/' + (metaTitle ? metaTitle.toLowerCase().replace(/\s+/g, '-') : '')"
=======
                v-text="'{{ URL::to('/') }}/' + (slug ? slug + '/' : '') + (metaTitle ? metaTitle.toLowerCase().replace(/\s+/g, '-') : '')"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            >
            </p>

            <!-- SEP Meta Description -->
            <p 
                class="text-gray-600 dark:text-gray-300"
                v-text="metaDescription"
            >
            </p>
        </div>
    </script>

    <script type="module">
        app.component('v-seo-helper', {
            template: '#v-seo-helper-template',

<<<<<<< HEAD
=======
            props: ["slug"],

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            data() {
                return {
                    metaTitle: this.$parent.getValues()['meta_title'],

                    metaDescription: this.$parent.getValues()['meta_description'],
                }
            },

            mounted() {
                let self = this;

                self.metaTitle = document.getElementById('meta_title').value;

                self.metaDescription = document.getElementById('meta_description').value;

                document.getElementById('meta_title').addEventListener('input', function(e) {
                    self.metaTitle = e.target.value;
                });

                document.getElementById('meta_description').addEventListener('input', function(e) {
                    self.metaDescription = e.target.value;
                });
            },
        });
    </script>
@endPushOnce