{!! view_render_event('bagisto.admin.catalog.product.edit.form.links.before', ['product' => $product]) !!}
    
<v-product-links></v-product-links>

{!! view_render_event('bagisto.admin.catalog.product.edit.form.links.before', ['product' => $product]) !!}

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-links-template">
<<<<<<< HEAD
        <div class="grid gap-[10px]">
            <!-- Panel -->
            <div
                class="relative bg-white dark:bg-gray-900 rounded-[4px] box-shadow"
                v-for="type in types"
            >
                <div class="flex gap-[20px] justify-between mb-[10px] p-[16px]">
                    <div class="flex flex-col gap-[8px]">
                        <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                            @{{ type.title }}
                        </p>

                        <p class="text-[12px] text-gray-500 dark:text-gray-300 font-medium">
                            @{{ type.info }}
=======
        <div class="grid gap-2.5">
            <!-- Panel -->
            <div
                class="relative bg-white dark:bg-gray-900 rounded box-shadow"
                v-for="type in types"
            >
                <div class="flex gap-5 justify-between mb-2.5 p-4">
                    <div class="flex flex-col gap-2">
                        <p
                            class="text-base text-gray-800 dark:text-white font-semibold"
                            v-text="type.title"
                        >
                        </p>

                        <p
                            class="text-xs text-gray-500 dark:text-gray-300 font-medium"
                            v-text="type.info"
                        >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </p>
                    </div>
                    
                    <!-- Add Button -->
<<<<<<< HEAD
                    <div class="flex gap-x-[4px] items-center">
=======
                    <div class="flex gap-x-1 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <div
                            class="secondary-button"
                            @click="selectedType = type.key; $refs.productSearch.openDrawer()"
                        >
                            @lang('admin::app.catalog.products.edit.links.add-btn')
                        </div>
                    </div>
                </div>

                <!-- Product Listing -->
                <div
                    class="grid"
                    v-if="addedProducts[type.key].length"
                >
                    <div
<<<<<<< HEAD
                        class="flex gap-[10px] justify-between p-[16px] border-b-[1px] border-slate-300 dark:border-gray-800"
=======
                        class="flex gap-2.5 justify-between p-4 border-b border-slate-300 dark:border-gray-800"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-for="product in addedProducts[type.key]"
                    >
                        <!-- Hidden Input -->
                        <input
                            type="hidden"
                            :name="type.key + '[]'"
                            :value="product.id"
                        />

                        <!-- Information -->
<<<<<<< HEAD
                        <div class="flex gap-[10px]">
                            <!-- Image -->
                            <div
                                class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded-[4px] overflow-hidden"
=======
                        <div class="flex gap-2.5">
                            <!-- Image -->
                            <div
                                class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded overflow-hidden"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :class="{'border border-dashed border-gray-300 dark:border-gray-800 dark:invert dark:mix-blend-exclusion': ! product.images.length}"
                            >
                                <template v-if="! product.images.length">
                                    <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                                
<<<<<<< HEAD
                                    <p class="w-full absolute bottom-[5px] text-[6px] text-gray-400 text-center font-semibold">
=======
                                    <p class="w-full absolute bottom-1.5 text-[6px] text-gray-400 text-center font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @lang('admin::app.catalog.products.edit.links.image-placeholder')
                                    </p>
                                </template>
            
                                <template v-else>
                                    <img :src="product.images[0].url">
                                </template>
                            </div>

                            <!-- Details -->
<<<<<<< HEAD
                            <div class="grid gap-[6px] place-content-start">
                                <p class="text-[16x] text-gray-800 dark:text-white font-semibold">
                                    @{{ product.name }}
=======
                            <div class="grid gap-1.5 place-content-start">
                                <p
                                    class="text-base text-gray-800 dark:text-white font-semibold"
                                    v-text="product.name"
                                >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @{{ "@lang('admin::app.catalog.products.edit.links.sku')".replace(':sku', product.sku) }}
                                </p>
                            </div>
                        </div>

                        <!-- Actions -->
<<<<<<< HEAD
                        <div class="grid gap-[4px] place-content-start text-right">
=======
                        <div class="grid gap-1 place-content-start text-right">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <p class="text-gray-800 font-semibold dark:text-white">
                                @{{ $admin.formatPrice(product.price) }}    
                            </p>

                            <p
                                class="text-red-600 cursor-pointer transition-all hover:underline"
                                @click="remove(type.key, product)"
                            >
                                @lang('admin::app.catalog.products.edit.links.delete')
                            </p>
                        </div>
                    </div>
                </div>

                <!-- For Empty Variations -->
                <div
<<<<<<< HEAD
                    class="grid gap-[14px] justify-center justify-items-center py-[40px] px-[10px] "
=======
                    class="grid gap-3.5 justify-center justify-items-center py-10 px-2.5"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-else
                >
                    <!-- Placeholder Image -->
                    <img
                        src="{{ bagisto_asset('images/icon-add-product.svg') }}"
<<<<<<< HEAD
                        class="w-[80px] h-[80px] dark:invert dark:mix-blend-exclusion"
                    />

                    <!-- Add Variants Information -->
                    <div class="flex flex-col items-center">
                        <p class="text-[16px] text-gray-400 font-semibold">
                            @lang('admin::app.catalog.products.edit.links.empty-title')
                        </p>

                        <p class="text-gray-400">
                            @{{ type.empty_info }}
=======
                        class="w-20 h-20 dark:invert dark:mix-blend-exclusion"
                    />

                    <!-- Add Variants Information -->
                    <div class="flex flex-col gap-1.5 items-center">
                        <p class="text-base text-gray-400 font-semibold">
                            @lang('admin::app.catalog.products.edit.links.empty-title')
                        </p>

                        <p
                            class="text-gray-400"
                            v-text="type.empty_info"
                        >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </p>
                    </div>
                </div>
            </div>

            <!-- Product Search Blade Component -->
            <x-admin::products.search
                ref="productSearch"
                ::added-product-ids="addedProductIds"
                @onProductAdded="addSelected($event)"
            ></x-admin::products.search>
        </div>
    </script>

    <script type="module">
        app.component('v-product-links', {
            template: '#v-product-links-template',

            data() {
                return {
                    currentProduct: @json($product),

                    selectedType: 'related_products',

                    types: [
                        {
                            key: 'related_products',
<<<<<<< HEAD
                            title: "@lang('admin::app.catalog.products.edit.links.related-products.title')",
                            info: "@lang('admin::app.catalog.products.edit.links.related-products.info')",
                            empty_info: "@lang('admin::app.catalog.products.edit.links.related-products.empty-info')",
                        }, {
                            key: 'up_sells',
                            title: "@lang('admin::app.catalog.products.edit.links.up-sells.title')",
                            info: "@lang('admin::app.catalog.products.edit.links.up-sells.info')",
                            empty_info: "@lang('admin::app.catalog.products.edit.links.up-sells.empty-info')",
                        }, {
                            key: 'cross_sells',
                            title: "@lang('admin::app.catalog.products.edit.links.cross-sells.title')",
                            info: "@lang('admin::app.catalog.products.edit.links.cross-sells.info')",
                            empty_info: "@lang('admin::app.catalog.products.edit.links.cross-sells.empty-info')",
=======
                            title: `@lang('admin::app.catalog.products.edit.links.related-products.title')`,
                            info: `@lang('admin::app.catalog.products.edit.links.related-products.info')`,
                            empty_info: `@lang('admin::app.catalog.products.edit.links.related-products.empty-info')`,
                        }, {
                            key: 'up_sells',
                            title: `@lang('admin::app.catalog.products.edit.links.up-sells.title')`,
                            info: `@lang('admin::app.catalog.products.edit.links.up-sells.info')`,
                            empty_info: `@lang('admin::app.catalog.products.edit.links.up-sells.empty-info')`,
                        }, {
                            key: 'cross_sells',
                            title: `@lang('admin::app.catalog.products.edit.links.cross-sells.title')`,
                            info: `@lang('admin::app.catalog.products.edit.links.cross-sells.info')`,
                            empty_info: `@lang('admin::app.catalog.products.edit.links.cross-sells.empty-info')`,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        }
                    ],

                    addedProducts: {
                        'up_sells': @json($product->up_sells()->with('images')->get()),

                        'cross_sells': @json($product->cross_sells()->with('images')->get()),

                        'related_products': @json($product->related_products()->with('images')->get())
                    },
                }
            },

            computed: {
                addedProductIds() {
                    let productIds = this.addedProducts[this.selectedType].map(product => product.id);

                    productIds.push(this.currentProduct.id);

                    return productIds;
                }
            },

            methods: {
                addSelected(selectedProducts) {
                    this.addedProducts[this.selectedType] = [...this.addedProducts[this.selectedType], ...selectedProducts];
                },

                remove(type, product) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.addedProducts[type] = this.addedProducts[type].filter(item => item.id !== product.id);
                        },
                    });
                },

                totalQty(product) {
                    let qty = 0;

                    product.inventories.forEach(function (inventory) {
                        qty += inventory.qty;
                    });

                    return qty;
                }
            }
        });
    </script>
@endPushOnce