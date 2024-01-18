@if ($product->type == 'bundle')
    {!! view_render_event('bagisto.shop.products.view.bundle-options.before', ['product' => $product]) !!}

    <v-product-bundle-options :errors="errors"></v-product-bundle-options>

    {!! view_render_event('bagisto.shop.products.view.bundle-options.after', ['product' => $product]) !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-product-bundle-options-template">
<<<<<<< HEAD
            <div class="mt-[30px]">
=======
            <div class="mt-8">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <v-product-bundle-option-item
                    v-for="(option, index) in options"
                    :option="option"
                    :errors="errors"
                    :key="index"
                    @onProductSelected="productSelected(option, $event)">
                </v-product-bundle-option-item>

                <div class="flex justify-between items-center my-[20px]">
<<<<<<< HEAD
                    <p class="text-[14px]">
                        @lang('Total Amount')
                    </p>

                    <p class="text-[18px] font-medium">
=======
                    <p class="text-sm">
                        @lang('Total Amount')
                    </p>

                    <p class="text-lg font-medium">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @{{ formattedTotalPrice }}
                    </p>
                </div>

<<<<<<< HEAD
                <ul class="grid gap-[10px] text-[16px]">
                    <li v-for="option in options">
                        <span class="inline-block mb-[5px]">
=======
                <ul class="grid gap-2.5 text-base">
                    <li v-for="option in options">
                        <span class="inline-block mb-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @{{ option.label }}
                        </span>

                        <template v-for="product in option.products">
                            <div
                                class="text-[#6E6E6E]"
                                :key="product.id"
                                v-if="product.is_default"
                            >
                                @{{ product.qty + ' x ' + product.name }}
                            </div>
                        </template>
                    </li>
                </ul>
            </div>
        </script>

        <script type="text/x-template" id="v-product-bundle-option-item-template">
<<<<<<< HEAD
            <div class="mt-[30px] border-b-[1px] border-[#E9E9E9] pb-[15px]">
                <div>
                    <label class="block text-[16px] mb-[5px]">
=======
            <div class="mt-8 border-b border-[#E9E9E9] pb-4">
                <div>
                    <label class="block text-base mb-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @{{ option.label }}
                    </label>

                    <div v-if="option.type == 'select'">
                        <v-field
                            as="select"
                            :name="'bundle_options[' + option.id + '][]'"
<<<<<<< HEAD
                            class="custom-select block w-full p-[14px] pr-[36px] bg-white border border-[#E9E9E9] rounded-lg text-[16px] text-[#6E6E6E] focus:ring-blue-500 focus:border-blue-500 max-md:border-0 max-md:outline-none max-md:w-[110px] cursor-pointer"
=======
                            class="custom-select block w-full p-3.5 ltr:pr-9 rtl:pl-9 bg-white border border-[#E9E9E9] rounded-lg text-base text-[#6E6E6E] focus:ring-blue-500 focus:border-blue-500 max-md:border-0 max-md:outline-none max-md:w-[110px] cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            :class="[errors['bundle_options[' + option.id + '][]'] ? 'border border-red-500' : '']"
                            :rules="{'required': option.is_required}"
                            v-model="selectedProduct"
                            :label="option.label"
                        >
                            <option
                                value="0"
                                v-if="! option.is_required"
                            >
                                @lang('shop::app.products.view.type.bundle.none')
                            </option>

                            <option
                                v-for="product in option.products"
                                :value="product.id"
                            >
                                @{{ product.name + ' + ' + product.price.final.formatted_price }}
                            </option>
                        </v-field>
                    </div>

                    <div v-if="option.type == 'radio'">
<<<<<<< HEAD
                        <div class="grid gap-[10px]">
                            <span
                                class="flex gap-x-[15px]"
=======
                        <div class="grid gap-2.5">
                            <span
                                class="flex gap-x-4"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-if="! option.is_required"
                            >
                                <input
                                    type="radio"
                                    :name="'bundle_options[' + option.id + '][]'"
                                    value="0"
                                    :id="'bundle_options[' + option.id + '][]'"
                                    class="hidden peer"
                                    v-model="selectedProduct"
                                >

<<<<<<< HEAD
                                <span class="icon-radio-unselect text-[24px] text-navyBlue peer-checked:icon-radio-select"></span>

                                <label
                                    class="text-[#6E6E6E]"
=======
                                <label
                                    class="icon-radio-unselect text-2xl text-navyBlue peer-checked:icon-radio-select"
                                    :for="'bundle_options[' + option.id + '][]'"
                                >
                                </label>

                                <label
                                    class="text-[#6E6E6E] cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :for="'bundle_options[' + option.id + '][]'"
                                >
                                    @lang('shop::app.products.view.type.bundle.none')
                                </label>
                            </span>

                            <span
<<<<<<< HEAD
                                class="flex gap-x-[15px] select-none"
=======
                                class="flex gap-x-4 select-none"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-for="(product, index) in option.products"
                            >
                                <v-field
                                    type="radio"
                                    :name="'bundle_options[' + option.id + '][]'"
                                    v-slot="{ field }"
                                    :value="product.id"
                                    v-model="selectedProduct"
                                    :rules="{'required': option.is_required}"
                                    :label="option.label"
                                >
                                    <input
                                        type="radio"
                                        :name="'bundle_options[' + option.id + '][]'"
                                        v-bind="field"
                                        :value="product.id"
                                        :id="'bundle_options[' + option.id + '][' + index + ']'"
                                        class="sr-only peer"
                                    />
                                </v-field>

                                <label
<<<<<<< HEAD
                                    class="icon-radio-unselect text-[24px] text-navyBlue peer-checked:icon-radio-select cursor-pointer"
=======
                                    class="icon-radio-unselect text-2xl text-navyBlue peer-checked:icon-radio-select cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :for="'bundle_options[' + option.id + '][' + index + ']'"
                                >
                                </label>

<<<<<<< HEAD
                                <label class="text-[#6E6E6E]" :for="'bundle_options[' + option.id + '][' + index + ']'">
=======
                                <label
                                    class="text-[#6E6E6E] cursor-pointer"
                                    :for="'bundle_options[' + option.id + '][' + index + ']'"
                                >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @{{ product.name }}

                                    <span class="text-black">
                                        @{{ '+ ' + product.price.final.formatted_price }}
                                    </span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div v-if="option.type == 'checkbox'">
<<<<<<< HEAD
                        <div class="grid gap-[10px]">
                            <div
                                class="flex gap-x-[15px] select-none"
=======
                        <div class="grid gap-2.5">
                            <div
                                class="flex gap-x-4 select-none"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-for="(product, index) in option.products"
                            >
                                <v-field
                                    type="checkbox"
                                    :name="'bundle_options[' + option.id + '][]'"
                                    v-slot="{ field }"
                                    :value="product.id"
                                    v-model="selectedProduct"
<<<<<<< HEAD
                                    :rules="{'required': option.is_required}"
=======
                                    :rules="option.is_required ? 'required' : ''"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :label="option.label"
                                >
                                    <input
                                        type="checkbox"
                                        :name="'bundle_options[' + option.id + '][]'"
                                        v-bind="field"
                                        :value="product.id"
                                        :id="'bundle_options[' + option.id + '][' + index + ']'"
                                        class="sr-only peer"
                                    />
                                </v-field>

                                <label
<<<<<<< HEAD
                                    class="icon-uncheck text-[24px] text-navyBlue peer-checked:icon-check-box peer-checked:text-navyBlue cursor-pointer"
=======
                                    class="icon-uncheck text-2xl text-navyBlue peer-checked:icon-check-box peer-checked:text-navyBlue cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :for="'bundle_options[' + option.id + '][' + index + ']'"
                                >
                                </label>

                                <label 
<<<<<<< HEAD
                                    class="text-[#6E6E6E]" 
=======
                                    class="text-[#6E6E6E] cursor-pointer" 
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :for="'bundle_options[' + option.id + '][' + index + ']'"
                                >
                                    @{{ product.name }}

                                    <span class="text-black">
                                        @{{ '+ ' + product.price.final.formatted_price }}
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div v-if="option.type == 'multiselect'">
                        <v-field
<<<<<<< HEAD
                            as="select"
                            multiple
                            :name="'bundle_options[' + option.id + '][]'"
                            class="block w-full p-[14px] pr-[36px] bg-white border border-[#E9E9E9] rounded-lg text-[16px] text-[#6E6E6E] focus:ring-blue-500 focus:border-blue-500 max-md:border-0 max-md:outline-none max-md:w-[110px] cursor-pointer"
                            :class="[errors['bundle_options[' + option.id + '][]'] ? 'border border-red-500' : '']"
                            :rules="{'required': option.is_required}"
                            v-model="selectedProduct"
                            :label="option.label"
                        >
                            <option
                                value="0"
                                v-if="! option.is_required"
                            >
                                @lang('shop::app.products.view.type.bundle.none')
                            </option>

                            <option
                                v-for="(product, index2) in option.products"
                                :value="product.id"
                            >
                                @{{ product.name }}

                                <span class="text-black">
                                    @{{ '+ ' + product.price.final.formatted_price }}
                                </span>
                            </option>
=======
                            :name="'bundle_options[' + option.id + '][]'"
                            :label="option.label"
                            :rules="{'required': option.is_required}"
                            v-model="selectedProduct"
                        >
                            <select
                                :name="'bundle_options[' + option.id + '][]'"
                                class="block w-full p-3.5 ltr:pr-9 rtl:pl-9 bg-white border border-[#E9E9E9] rounded-lg text-base text-[#6E6E6E] focus:ring-blue-500 focus:border-blue-500 max-md:border-0 max-md:outline-none max-md:w-[110px] cursor-pointer"
                                :class="[errors['bundle_options[' + option.id + '][]'] ? 'border border-red-500' : '']"
                                v-model="selectedProduct"
                                multiple
                            >
                                <option
                                    value="0"
                                    v-if="! option.is_required"
                                >
                                    @lang('shop::app.products.view.type.bundle.none')
                                </option>

                                <option
                                    v-for="(product, index2) in option.products"
                                    :value="product.id"
                                >
                                    @{{ product.name }}

                                    <span class="text-black">
                                        @{{ '+ ' + product.price.final.formatted_price }}
                                    </span>
                                </option>
                            </select>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </v-field>
                    </div>

                    <v-error-message
                        :name="'bundle_options[' + option.id + '][]'"
                        v-slot="{ message }"
                    >
                        <p
                            class="mt-1 text-red-500 text-xs italic"
                            v-text="message"
                        >
                        </p>
                    </v-error-message>
                </div>

                <div v-if="option.type == 'select' || option.type == 'radio'">
                    <x-shop::quantity-changer
                        ::name="'bundle_option_qty[' + option?.id + ']'"
                        ::value="productQty"
<<<<<<< HEAD
                        class="gap-x-[16px] w-max rounded-[12px] py-[10px] px-[17px] mt-5 !border-[#E9E9E9]"
=======
                        class="gap-x-4 w-max rounded-xl py-2.5 px-4 mt-5 !border-[#E9E9E9]"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @change="qtyUpdated($event)"
                    >
                    </x-shop::quantity-changer>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-product-bundle-options', {
                template: '#v-product-bundle-options-template',

                props: ['errors'],

                data: function() {
                    return {
                        config: @json(app('Webkul\Product\Helpers\BundleOption')->getBundleConfig($product)),

                        options: [],

                    }
                },

                computed: {
                    formattedTotalPrice: function() {
                        var total = 0;

                        for (var key in this.options) {
                            for (var key1 in this.options[key].products) {
                                if (! this.options[key].products[key1].is_default)
                                    continue;

                                total += this.options[key].products[key1].qty * this.options[key].products[key1].price.final.price;
                            }
                        }

                        return this.$shop.formatPrice(total);
                    }
                },

                created: function() {
                    for (var key in this.config.options) {
                        this.options.push(this.config.options[key]);
                    }
                },

                methods: {
                    productSelected: function(option, value) {
                        var selectedProductIds = Array.isArray(value) ? value : [value];

                        for (var key in option.products) {
                            option.products[key].is_default = selectedProductIds.indexOf(option.products[key].id) > -1 ? 1 : 0;
                        }
                    }
                }
            });

            app.component('v-product-bundle-option-item', {
                template: '#v-product-bundle-option-item-template',

                props: ['option', 'errors'],

                data: function() {
                    return {
                        selectedProduct: (this.option.type == 'checkbox' || this.option.type == 'multiselect')  ? [] : null,
                    };
                },

                computed: {
                    productQty: function() {
                        let qty = 0;

                        this.option.products.forEach((product, key) => {
                            if (this.selectedProduct == product.id) {
                                qty =  this.option.products[key].qty;
                            }
                        });

                        return qty;
                    }
                },

                watch: {
                    selectedProduct: function (value) {
                        this.$emit('onProductSelected', value);
                    }
                },

                created: function() {
                    for (var key in this.option.products) {
                        if (! this.option.products[key].is_default)
                            continue;

                        if (this.option.type == 'checkbox' || this.option.type == 'multiselect') {
                            this.selectedProduct.push(this.option.products[key].id)
                        } else {
                            this.selectedProduct = this.option.products[key].id
                        }
                    }
                },

                methods: {
                    qtyUpdated: function(qty) {
                        if (! this.option.products.find(data => data.id == this.selectedProduct)) {
                            return;
                        }

                        this.option.products.find(data => data.id == this.selectedProduct).qty = qty;
                    }
                }
            });
        </script>
    @endPushOnce
@endif
