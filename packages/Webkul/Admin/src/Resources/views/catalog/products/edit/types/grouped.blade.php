{!! view_render_event('bagisto.admin.catalog.product.edit.form.types.grouped.before', ['product' => $product]) !!}

<v-group-products :errors="errors"></v-group-products>

{!! view_render_event('bagisto.admin.catalog.product.edit.form.types.grouped.after', ['product' => $product]) !!}

@pushOnce('scripts')
    <script type="text/x-template" id="v-group-products-template">
<<<<<<< HEAD
        <div class="relative bg-white dark:bg-gray-900  rounded-[4px] box-shadow">
            <!-- Panel Header -->
            <div class="flex gap-[20px] justify-between mb-[10px] p-[16px]">
                <div class="flex flex-col gap-[8px]">
                    <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                        @lang('admin::app.catalog.products.edit.types.grouped.title')
                    </p>

                    <p class="text-[12px] text-gray-500 dark:text-gray-300 font-medium">
=======
        <div class="relative bg-white dark:bg-gray-900 rounded box-shadow">
            <!-- Panel Header -->
            <div class="flex gap-5 justify-between mb-2.5 p-4">
                <div class="flex flex-col gap-2">
                    <p class="text-base text-gray-800 dark:text-white font-semibold">
                        @lang('admin::app.catalog.products.edit.types.grouped.title')
                    </p>

                    <p class="text-xs text-gray-500 dark:text-gray-300 font-medium">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.catalog.products.edit.types.grouped.info')
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
                        @click="$refs.productSearch.openDrawer()"
                    >
                        @lang('admin::app.catalog.products.edit.types.grouped.add-btn')
                    </div>
                </div>
            </div>

            <!-- Panel Content -->
            <div
                class="grid"
                v-if="groupProducts.length"
            >
                <!-- Draggable Products -->
                <draggable
                    ghost-class="draggable-ghost"
<<<<<<< HEAD
=======
                    handle=".icon-drag"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-bind="{animation: 200}"
                    :list="groupProducts"
                    item-key="id"
                >
                    <template #item="{ element, index }">
<<<<<<< HEAD
                        <div class="flex gap-[10px] justify-between p-[16px] border-b-[1px] border-slate-300 dark:border-gray-800 cursor-pointer">
                            <!-- Information -->
                            <div class="flex gap-[10px]">
                                <!-- Drag Icon -->
                                <i class="icon-drag text-[20px] text-gray-600 dark:text-gray-300 transition-all pointer-events-none"></i>
                                
                                <!-- Image -->
                                <div
                                    class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded-[4px] overflow-hidden"
                                    :class="{'border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion overflow-hidden': ! element.associated_product.images.length}"
=======
                        <div class="flex gap-2.5 justify-between p-4 border-b border-slate-300 dark:border-gray-800">
                            <!-- Information -->
                            <div class="flex gap-2.5">
                                <!-- Drag Icon -->
                                <i class="icon-drag text-xl text-gray-600 dark:text-gray-300 transition-all cursor-grab"></i>
                                
                                <!-- Image -->
                                <div
                                    class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded overflow-hidden"
                                    :class="{'border border-dashed border-gray-300 dark:border-gray-800 rounded dark:invert dark:mix-blend-exclusion overflow-hidden': ! element.associated_product.images.length}"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                    <template v-if="! element.associated_product.images.length">
                                        <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                                    
<<<<<<< HEAD
                                        <p class="w-full absolute bottom-[5px] text-[6px] text-gray-400 text-center font-semibold">
=======
                                        <p class="w-full absolute bottom-1.5 text-[6px] text-gray-400 text-center font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @lang('admin::app.catalog.products.edit.types.grouped.image-placeholder')
                                        </p>
                                    </template>

                                    <template v-else>
                                        <img :src="element.associated_product.images[0].url">
                                    </template>
                                </div>

                                <!-- Details -->
<<<<<<< HEAD
                                <div class="grid gap-[6px] place-content-start">
                                    <p class="text-[16x] text-gray-800 dark:text-white font-semibold">
=======
                                <div class="grid gap-1.5 place-content-start">
                                    <p class="text-base text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @{{ element.associated_product.name }}
                                    </p>

                                    <p class="text-gray-600 dark:text-gray-300">
                                        @{{ "@lang('admin::app.catalog.products.edit.types.grouped.sku')".replace(':sku', element.associated_product.sku) }}
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
                                    @{{ $admin.formatPrice(element.associated_product.price) }}    
                                </p>

                                
                                <!-- Hidden Input -->
                                <input
                                    type="hidden"
                                    :name="'links[' + (element.id ? element.id : 'link_' + index) + '][associated_product_id]'"
                                    :value="element.associated_product.id"
                                />
                                
                                <input
                                    type="hidden"
                                    :name="'links[' + (element.id ? element.id : 'link_' + index) + '][sort_order]'"
                                    :value="index"
                                />

                                <x-admin::form.control-group class="!mb-0">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.catalog.products.edit.types.grouped.default-qty')
                                    </x-admin::form.control-group.label>

                                    <v-field
                                        type="text"
                                        :name="'links[' + (element.id ? element.id : 'link_' + index) + '][qty]'"
                                        v-model="element.qty"
<<<<<<< HEAD
                                        class="flex w-[86px] min-h-[39px] py-2 px-3 border rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400 dark:bg-gray-900 dark:border-gray-800"
=======
                                        class="flex w-[86px] min-h-[39px] py-2 px-3 border rounded-md text-sm text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400 dark:bg-gray-900 dark:border-gray-800"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        :class="[errors['links[' + (element.id ? element.id : 'link_' + index) + '][qty]'] ? 'border border-red-600 hover:border-red-600' : '']"
                                        rules="required|numeric|min_value:1"
                                    ></v-field>
                                </x-admin::form.control-group>

                                <p
                                    class="text-red-600 cursor-pointer transition-all hover:underline"
                                    @click="remove(element)"
                                >
                                    @lang('admin::app.catalog.products.edit.types.grouped.delete')
                                </p>
                            </div>
                        </div>
                    </template>
                </draggable>
            </div>

            <!-- For Empty Variations -->
            <div
<<<<<<< HEAD
                class="grid gap-[14px] justify-center justify-items-center py-[40px] px-[10px]"
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
=======
                    class="w-20 h-20 dark:invert dark:mix-blend-exclusion"
                />

                <!-- Add Variants Information -->
                <div class="flex flex-col gap-1.5 items-center">
                    <p class="text-base text-gray-400 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.catalog.products.edit.types.grouped.empty-title')
                    </p>

                    <p class="text-gray-400">
                        @lang('admin::app.catalog.products.edit.types.grouped.empty-info')
                    </p>
                </div>
                
                <!-- Add Row Button -->
                <div
<<<<<<< HEAD
                    class="secondary-button text-[14px]"
=======
                    class="secondary-button text-sm"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @click="$refs.productSearch.openDrawer()"
                >
                    @lang('admin::app.catalog.products.edit.types.grouped.add-btn')
                </div>
            </div>

            <!-- Product Search Blade Component -->
            <x-admin::products.search
                ref="productSearch"
                ::added-product-ids="addedProductIds"
                ::query-params="{type: 'simple'}"
                @onProductAdded="addSelected($event)"
            ></x-admin::products.search>
        </div>
    </script>

    <script type="module">
        app.component('v-group-products', {
            template: '#v-group-products-template',

            props: ['errors'],

            data() {
                return {
                    groupProducts: @json($product->grouped_products()->with(['associated_product.inventory_indices', 'associated_product.images'])->orderBy('sort_order', 'asc')->get())
                }
            },

            computed: {
                addedProductIds() {
                    return this.groupProducts.map(product => product.associated_product.id);
                }
            },

            methods: {
                addSelected(selectedProducts) {
                    let self = this;

                    selectedProducts.forEach(function (product) {
                        self.groupProducts.push({
                            associated_product: product,
                            qty: 1,
                        });
                    });
                },

                remove(product) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            let index = this.groupProducts.indexOf(product)

                            this.groupProducts.splice(index, 1);
                        }
                    });
                },
            }
        });
    </script>
@endPushOnce