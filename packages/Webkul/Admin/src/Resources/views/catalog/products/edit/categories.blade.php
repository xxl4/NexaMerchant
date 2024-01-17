{!! view_render_event('bagisto.admin.catalog.product.edit.form.categories.before', ['product' => $product]) !!}

<<<<<<< HEAD
{{-- Panel --}}
<div class="p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
    {{-- Panel Header --}}
    <p class="flex justify-between text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
=======
<!-- Panel -->
<div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
    <!-- Panel Header -->
    <p class="flex justify-between text-base text-gray-800 dark:text-white font-semibold mb-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        @lang('admin::app.catalog.products.edit.categories.title')
    </p>

    {!! view_render_event('bagisto.admin.catalog.product.edit.form.categories.controls.before', ['product' => $product]) !!}

<<<<<<< HEAD
    {{-- Panel Content --}}
    <div class="mb-[20px] text-[14px] text-gray-600 dark:text-gray-300">
=======
    <!-- Panel Content -->
    <div class="mb-5 text-sm text-gray-600 dark:text-gray-300">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        <v-product-categories>
            <x-admin::shimmer.tree/>
        </v-product-categories>

    </div>

    {!! view_render_event('bagisto.admin.catalog.product.edit.form.categories.controls.after', ['product' => $product]) !!}
</div>

{!! view_render_event('bagisto.admin.catalog.product.edit.form.categories.after', ['product' => $product]) !!}

<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@pushOnce('scripts')
    <script type="text/x-template" id="v-product-categories-template">
        <div>
            <template v-if="isLoading">
                <x-admin::shimmer.tree/>
            </template>

            <template v-else>
                <x-admin::tree.view
                    input-type="checkbox"
<<<<<<< HEAD
=======
                    selection-type="individual"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    name-field="categories"
                    id-field="id"
                    value-field="id"
                    ::items="categories"
                    :value="json_encode($product->categories->pluck('id'))"
<<<<<<< HEAD
                    behavior="no"
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    :fallback-locale="config('app.fallback_locale')"
                >
                </x-admin::tree.view>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-product-categories', {
            template: '#v-product-categories-template',

            data() {
                return {
                    isLoading: true,

                    categories: [],
                }
            },

            mounted() {
                this.get();
            },

            methods: {
                get() {
                    this.$axios.get("{{ route('admin.catalog.categories.tree') }}")
                        .then(response => {
                            this.isLoading = false;

                            this.categories = response.data.data;
                        }).catch(error => {
                            console.log(error);
                        });
                }
            }
        });
    </script>
<<<<<<< HEAD
@endpushOnce
=======
@endpushOnce
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
