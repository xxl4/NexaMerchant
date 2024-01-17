<<<<<<< HEAD
{{-- Seperator --}}
<span class="block w-full absolute ltr:left-0 rtl:right-0 my-[5px] border border-[#E9E9E9]"></span>
=======
<!-- Seperator -->
<span class="block w-full absolute ltr:left-0 rtl:right-0 my-1.5 border border-gray-200"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

<v-product-customer-group-price>
    <x-admin::shimmer.products.edit.group-price/>
</v-product-customer-group-price>

@inject('customerGroupRepository', 'Webkul\Customer\Repositories\CustomerGroupRepository')

@pushOnce('scripts')
    <script type="text/x-template" id="v-product-customer-group-price-template">
        <div>
            <!-- Header -->
<<<<<<< HEAD
            <div class="flex items-center justify-between mt-[6px] py-[15px]">
                <p class="text-gray-800 text-[16px] py-[10px] font-semibold dark:text-white">
=======
            <div class="flex items-center justify-between mt-1.5 py-4">
                <p class="text-gray-800 text-base py-2.5 font-semibold dark:text-white">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @lang('admin::app.catalog.products.edit.price.group.title')
                </p>

                <p
                    class="text-blue-600 cursor-pointer transition-all hover:underline"
                    @click="resetForm(); $refs.groupPriceCreateModal.open()"
                >
                    @lang('admin::app.catalog.products.edit.price.group.create-btn')
                </p>
            </div>

            <!-- Content -->
            <div class="grid">
                <!-- Card -->
                <div
<<<<<<< HEAD
                    class="flex flex-col gap-[8px] py-[10px]"
=======
                    class="flex flex-col gap-2 py-2.5"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-for="(item, index) in prices"
                >
                    <!-- Hidden Inputs -->
                    <input type="hidden" :name="'customer_group_prices[' + item.id + '][customer_group_id]'" :value="item.customer_group_id"/>

                    <input type="hidden" :name="'customer_group_prices[' + item.id + '][qty]'" :value="item.qty"/>

                    <input type="hidden" :name="'customer_group_prices[' + item.id + '][value_type]'" :value="item.value_type"/>

                    <input type="hidden" :name="'customer_group_prices[' + item.id + '][value]'" :value="item.value"/>

                    <div class="flex justify-between">
                        <p class="text-gray-600 dark:text-gray-300 font-semibold">
                            @{{ getGroupNameById(item.customer_group_id) }}
                        </p>

                        <p
                            class="text-blue-600 cursor-pointer transition-all hover:underline"
                            @click="selectedPrice = item; $refs.groupPriceCreateModal.open()"
                        >
                            @lang('admin::app.catalog.products.edit.price.group.edit-btn')
                        </p>
                    </div>

                    <p
                        class="text-gray-600 dark:text-gray-300"
                        v-if="item.value_type == 'fixed'"
                    >
                        @{{ "@lang('admin::app.catalog.products.edit.price.group.fixed-group-price-info')".replace(':qty', item.qty).replace(':price', item.value) }}
                    </p>

                    <p
                        class="text-gray-600 dark:text-gray-300"
                        v-else
                    >
                        @{{ "@lang('admin::app.catalog.products.edit.price.group.discount-group-price-info')".replace(':qty', item.qty).replace(':price', item.value) }}
                    </p>
                </div>

                <!-- Empty Container -->
                <div
<<<<<<< HEAD
                    class="flex gap-[20px] items-center py-[10px]"
=======
                    class="flex gap-5 items-center py-2.5"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-if="! prices.length"
                >
                    <img
                        src="{{ bagisto_asset('images/icon-discount.svg') }}"
<<<<<<< HEAD
                        class="w-[80px] h-[80px] border border-dashed border-gray-300 dark:border-gray-800 rounded-[4px] dark:invert dark:mix-blend-exclusion"
                    />

                    <div class="flex flex-col gap-[6px]">
                        <p class="text-[16px] text-gray-400 font-semibold">
=======
                        class="w-20 h-20 border border-dashed border-gray-300 dark:border-gray-800 rounded dark:invert dark:mix-blend-exclusion"
                    />

                    <div class="flex flex-col gap-1.5">
                        <p class="text-base text-gray-400 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.catalog.products.edit.price.group.add-group-price')
                        </p>

                        <p class="text-gray-400">
                            @lang('admin::app.catalog.products.edit.price.group.empty-info')
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Modal -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form @submit="handleSubmit($event, create)">
                    <!-- Customer Create Modal -->
                    <x-admin::modal ref="groupPriceCreateModal">
<<<<<<< HEAD
                        <x-slot:header>
                            <!-- Modal Header -->
                            <p
                                class="text-[18px] text-gray-800 dark:text-white font-bold"
=======
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p
                                class="text-lg text-gray-800 dark:text-white font-bold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-if="! selectedPrice.id"
                            >
                                @lang('admin::app.catalog.products.edit.price.group.create.create-title')
                            </p>

                            <p
<<<<<<< HEAD
                                class="text-[18px] text-gray-800 dark:text-white font-bold"
=======
                                class="text-lg text-gray-800 dark:text-white font-bold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-else
                            >
                                @lang('admin::app.catalog.products.edit.price.group.create.update-title')
                            </p>    
                        </x-slot:header>
        
<<<<<<< HEAD
                        <x-slot:content>
                            <!-- Modal Content -->
                            <div class="px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">
                                {!! view_render_event('bagisto.admin.catalog.products.create_form.general.controls.before') !!}

                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label>
                                        @lang('admin::app.catalog.products.edit.price.group.create.customer-group')
=======
                        <!-- Modal Content -->
                        <x-slot:content>
                            {!! view_render_event('bagisto.admin.catalog.products.create_form.general.controls.before') !!}

                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('admin::app.catalog.products.edit.price.group.create.customer-group')
                                </x-admin::form.control-group.label>
    
                                <x-admin::form.control-group.control
                                    type="select"
                                    name="customer_group_id"
                                    v-model="selectedPrice.customer_group_id"
                                    :label="trans('admin::app.catalog.products.edit.price.group.create.customer-group')"
                                >
                                    <option value="">
                                        @lang('admin::app.catalog.products.edit.price.group.create.all-groups')
                                    </option>

                                    <option
                                        v-for="group in groups"
                                        :value="group.id"
                                    >
                                        @{{ group.name }}
                                    </option>
                                </x-admin::form.control-group.control>
                            </x-admin::form.control-group>

                            <div class="flex gap-4">
                                <x-admin::form.control-group class="flex-1">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.catalog.products.edit.price.group.create.qty')
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="qty"
                                        v-model="selectedPrice.qty"
                                        rules="required|numeric|min_value:1"
                                        :label="trans('admin::app.catalog.products.edit.price.group.create.qty')"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error control-name="qty"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group class="flex-1">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.catalog.products.edit.price.group.create.price-type')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="select"
<<<<<<< HEAD
                                        name="customer_group_id"
                                        v-model="selectedPrice.customer_group_id"
                                        :label="trans('admin::app.catalog.products.edit.price.group.create.customer-group')"
                                    >
                                        <option value="">
                                            @lang('admin::app.catalog.products.edit.price.group.create.all-groups')
                                        </option>

                                        <option
                                            v-for="group in groups"
                                            :value="group.id"
                                        >
                                            @{{ group.name }}
                                        </option>
                                    </x-admin::form.control-group.control>
                                </x-admin::form.control-group>

                                <div class="flex gap-[16px]">
                                    <x-admin::form.control-group class="flex-1">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.catalog.products.edit.price.group.create.qty')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="qty"
                                            v-model="selectedPrice.qty"
                                            rules="required|numeric|min_value:1"
                                            :label="trans('admin::app.catalog.products.edit.price.group.create.qty')"
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error control-name="qty"></x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <x-admin::form.control-group class="flex-1">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.catalog.products.edit.price.group.create.price-type')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="value_type"
                                            v-model="selectedPrice.value_type"
                                            rules="required"
                                            :label="trans('admin::app.catalog.products.edit.price.group.create.price-type')"
                                        >
                                            <option value="fixed">
                                                @lang('admin::app.catalog.products.edit.price.group.create.fixed')
                                            </option>

                                            <option value="discount">
                                                @lang('admin::app.catalog.products.edit.price.group.create.discount')
                                            </option>
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error control-name="value_type"></x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <x-admin::form.control-group class="flex-1">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.catalog.products.edit.price.group.create.price')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="value"
                                            v-model="selectedPrice.value"
                                            ::rules="{required: true, decimal: true, min_value: 0, ...(selectedPrice.value_type === 'discount' ? {max_value: 100} : {})}"
                                            :label="trans('admin::app.catalog.products.edit.price.group.create.price')"
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error control-name="value"></x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>

                                {!! view_render_event('bagisto.admin.catalog.products.create_form.general.controls.before') !!}
                            </div>
                        </x-slot:content>
        
                        <x-slot:footer>
                            <!-- Modal Submission -->
                            <div class="flex gap-x-[10px] items-center">
                                <button
                                    type="button"
                                    class="text-red-600 font-semibold whitespace-nowrap px-[12px] py-[6px] border-[2px] border-transparent rounded-[6px] transition-all hover:bg-gray-100 dark:hover:bg-gray-950 cursor-pointer"
=======
                                        name="value_type"
                                        v-model="selectedPrice.value_type"
                                        rules="required"
                                        :label="trans('admin::app.catalog.products.edit.price.group.create.price-type')"
                                    >
                                        <option value="fixed">
                                            @lang('admin::app.catalog.products.edit.price.group.create.fixed')
                                        </option>

                                        <option value="discount">
                                            @lang('admin::app.catalog.products.edit.price.group.create.discount')
                                        </option>
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error control-name="value_type"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group class="flex-1">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.catalog.products.edit.price.group.create.price')
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="value"
                                        v-model="selectedPrice.value"
                                        ::rules="{required: true, decimal: true, min_value: 0, ...(selectedPrice.value_type === 'discount' ? {max_value: 100} : {})}"
                                        :label="trans('admin::app.catalog.products.edit.price.group.create.price')"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error control-name="value"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>

                            {!! view_render_event('bagisto.admin.catalog.products.create_form.general.controls.before') !!}
                        </x-slot:content>
        
                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <!-- Modal Submission -->
                            <div class="flex gap-x-2.5 items-center">
                                <button
                                    type="button"
                                    class="text-red-600 font-semibold whitespace-nowrap px-3 py-1.5 border-2 border-transparent rounded-md transition-all hover:bg-gray-100 dark:hover:bg-gray-950 cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @click="remove"
                                    v-if="selectedPrice.id"
                                >
                                    @lang('admin::app.catalog.products.edit.price.group.create.delete-btn')
                                </button>

                                <button 
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('admin::app.catalog.products.edit.price.group.create.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </div>
    </script>

    <script type="module">
        app.component('v-product-customer-group-price', {
            template: '#v-product-customer-group-price-template',

            data: function() {
                return {
                    groups: @json($customerGroupRepository->all()),

                    prices: @json($product->customer_group_prices),

                    selectedPrice: {
                        customer_group_id: null,
                        qty: 0,
                        value_type: 'fixed',
                        value: 0,
                    }
                }
            },

            methods: {
                getGroupNameById(id) {
                    let group = this.groups.find(group => group.id == id);

                    return group ? group.name : "@lang('admin::app.catalog.products.edit.price.group.all-groups')";
                },

                create(params) {
                    if (this.selectedPrice.id == undefined) {
                        params.id = 'price_' + this.prices.length;

                        this.prices.push(params);
                    } else {
                        const indexToUpdate = this.prices.findIndex(price => price.id === this.selectedPrice.id);

                        this.prices[indexToUpdate] = this.selectedPrice;
                    }

                    this.resetForm();

                    this.$refs.groupPriceCreateModal.close();
                },

                resetForm() {
                    this.selectedPrice = {
                        customer_group_id: null,
                        qty: 0,
                        value_type: 'fixed',
                        value: 0,
                    };
                },

                remove() {
                    this.$refs.groupPriceCreateModal.close();

                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            let index = this.prices.indexOf(this.selectedPrice);

                            this.prices.splice(index, 1);

                            this.resetForm();
                        }
                    });
                }
            }
        });
    </script>
@endPushOnce
