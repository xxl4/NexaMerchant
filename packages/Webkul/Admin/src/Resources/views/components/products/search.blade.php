<v-product-search {{ $attributes }}></v-product-search>

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-search-template">
        <!-- Search Drawer -->
        <x-admin::drawer
            ref="searchProductDrawer"
            @close="searchTerm = ''; searchedProducts = [];"
        >
            <!-- Drawer Header -->
            <x-slot:header>
<<<<<<< HEAD
                <div class="grid gap-[12px]">
                    <div class="flex justify-between items-center">
                        <p class="text-[20px] font-medium dark:text-white">
=======
                <div class="grid gap-3">
                    <div class="flex justify-between items-center">
                        <p class="text-xl font-medium dark:text-white">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.components.products.search.title')
                        </p>

                        <div
<<<<<<< HEAD
                            class="mr-[45px] primary-button"
=======
                            class="ltr:mr-11 rtl:ml-11 primary-button"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @click="addSelected"
                        >
                            @lang('admin::app.components.products.search.add-btn')
                        </div>
                    </div>

                    <div class="relative w-full">
                        <input
                            type="text"
<<<<<<< HEAD
                            class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-lg block w-full ltr:pl-[12px] rtl:pr-[12px] ltr:pr-[40px] rtl:pl-[40px] py-[5px] leading-6 text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400"
=======
                            class="bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-lg block w-full ltr:pl-3 rtl:pr-3 ltr:pr-10 rtl:pl-10 py-1.5 leading-6 text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            placeholder="Search by name"
                            v-model.lazy="searchTerm"
                            v-debounce="500"
                        />

<<<<<<< HEAD
                        <span class="icon-search text-[22px] absolute ltr:right-[12px] rtl:left-[12px] top-[6px] flex items-center pointer-events-none"></span>
=======
                        <span class="icon-search text-2xl absolute ltr:right-3 rtl:left-3 top-1.5 flex items-center pointer-events-none"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    </div>
                </div>
            </x-slot:header>

            <!-- Drawer Content -->
            <x-slot:content class="!p-0">
                <div
                    class="grid"
                    v-if="filteredSearchedProducts.length"
                >
                    <div
<<<<<<< HEAD
                        class="flex gap-[10px] justify-between px-[16px] py-[24px] border-b-[1px] border-slate-300 dark:border-gray-800"
                        v-for="product in filteredSearchedProducts"
                    >
                        <!-- Information -->
                        <div class="flex gap-[10px]">
=======
                        class="flex gap-2.5 justify-between px-4 py-6 border-b border-slate-300 dark:border-gray-800"
                        v-for="product in filteredSearchedProducts"
                    >
                        <!-- Information -->
                        <div class="flex gap-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <!-- Checkbox -->
                            <div class="">
                                <input
                                    type="checkbox"
                                    class="sr-only peer"
                                    :id="'searched-product' + product.id"
                                    v-model="product.selected"
                                />

                                <label
<<<<<<< HEAD
                                    class="icon-uncheckbox text-[24px] peer-checked:icon-checked peer-checked:text-blue-600  cursor-pointer"
=======
                                    class="icon-uncheckbox text-2xl peer-checked:icon-checked peer-checked:text-blue-600  cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :for="'searched-product' + product.id"
                                >
                                </label>
                            </div>

                            <!-- Image -->
                            <div
<<<<<<< HEAD
                                class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded-[4px] overflow-hidden"
=======
                                class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded overflow-hidden"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :class="{'border border-dashed border-gray-300 dark:border-gray-800 dark:invert dark:mix-blend-exclusion': ! product.images.length}"
                            >
                                <template v-if="! product.images.length">
                                    <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                                
<<<<<<< HEAD
                                    <p class="w-full absolute bottom-[5px] text-[6px] text-gray-400 text-center font-semibold">Product Image</p>
=======
                                    <p class="w-full absolute bottom-1.5 text-[6px] text-gray-400 text-center font-semibold">
                                        @lang('admin::app.components.products.search.product-image')
                                    </p>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                </template>

                                <template v-else>
                                    <img :src="product.images[0].url">
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
                                    @{{ product.name }}
                                </p>

                                <p class="text-gray-600 dark:text-gray-300">
                                    @{{ "@lang('admin::app.components.products.search.sku')".replace(':sku', product.sku) }}
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
                                @{{ product.formatted_price }}
                            </p>

                            <p class="text-green-600">
                                @{{ "@lang('admin::app.components.products.search.qty')".replace(':qty', totalQty(product)) }}
                            </p>
                        </div>
                    </div>
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
                            @lang('admin::app.components.products.search.empty-title')
                        </p>

                        <p class="text-gray-400">
                            @lang('admin::app.components.products.search.empty-info')
                        </p>
                    </div>
                </div>
            </x-slot:content>
        </x-admin::drawer>
    </script>

    <script type="module">
        app.component('v-product-search', {
            template: '#v-product-search-template',

            props: {
                addedProductIds: {
                    type: Array,
                    default: []                    
                },

                queryParams: {
                    type: Object,
                    default: () => ({})
                },
            },

            data() {
                return {
                    searchTerm: '',

                    searchedProducts: [],
                }
            },

            computed: {
                filteredSearchedProducts() {
                    return this.searchedProducts.filter(product => ! this.addedProductIds.includes(product.id));
                }
            },

            watch: {
                searchTerm: function(newVal, oldVal) {
                    this.search()
                }
            },

            methods: {
                openDrawer() {
                    this.$refs.searchProductDrawer.open();
                },

                search() {
                    if (this.searchTerm.length <= 1) {
                        this.searchedProducts = [];

                        return;
                    }

                    let self = this;
                    
                    this.$axios.get("{{ route('admin.catalog.products.search') }}", {
                            params: {
                                ...{query: this.searchTerm},
                                ...this.queryParams
                            }
                        })
                        .then(function(response) {
                            self.searchedProducts = response.data.data;
                        })
                        .catch(function (error) {
                        })
                },

                addSelected() {
                    let selectedProducts = this.searchedProducts.filter(product => product.selected);

                    this.$emit('onProductAdded', selectedProducts);

                    this.$refs.searchProductDrawer.close();
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