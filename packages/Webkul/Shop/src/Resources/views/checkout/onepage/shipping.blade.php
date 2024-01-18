{!! view_render_event('bagisto.shop.checkout.shipping.method.before') !!}

<v-shipping-method ref="vShippingMethod">
<<<<<<< HEAD
    {{-- Shipping Method Shimmer Effect --}}
=======
    <!-- Shipping Method Shimmer Effect -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-shop::shimmer.checkout.onepage.shipping-method/>
</v-shipping-method>

{!! view_render_event('bagisto.shop.checkout.shipping.method.after') !!}

@pushOnce('scripts')
    <script type="text/x-template" id="v-shipping-method-template">
<<<<<<< HEAD
        <div class="mt-[30px]">
=======
        <div class="mb-7">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <template v-if="! isShowShippingMethod && isShippingMethodLoading">
                <!-- Shipping Method Shimmer Effect -->
                <x-shop::shimmer.checkout.onepage.shipping-method/>
            </template>

            <template v-if="isShowShippingMethod">
<<<<<<< HEAD
                <x-shop::accordion>
                    <x-slot:header>
                        <div class="flex justify-between items-center">
                            <h2 class="text-[26px] font-medium max-sm:text-[20px]">
=======
                {!! view_render_event('bagisto.shop.checkout.onepage.shipping-method.accordion.before') !!}

                <x-shop::accordion class="!border-b-0">
                    <x-slot:header class="!p-0">
                        <div class="flex justify-between items-center">
                            <h2 class="text-2xl font-medium max-sm:text-xl">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @lang('shop::app.checkout.onepage.shipping.shipping-method')
                            </h2>
                        </div>
                    </x-slot:header>

<<<<<<< HEAD
                    <x-slot:content>
                        <div class="flex flex-wrap gap-[30px] mt-[30px]">
=======
                    <x-slot:content class="!p-0 mt-8">
                        <div class="flex flex-wrap gap-8">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <div
                                class="relative max-w-[218px] max-sm:max-w-full max-sm:flex-auto select-none"
                                v-for="shippingMethod in shippingMethods"
                            >
<<<<<<< HEAD

                                {!! view_render_event('bagisto.shop.checkout.shipping-method.before') !!}
=======
                                {!! view_render_event('bagisto.shop.checkout.onepage.shipping-method.before') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                                <div v-for="rate in shippingMethod.rates">
                                    <input 
                                        type="radio"
                                        name="shipping_method"
                                        :id="rate.method"
                                        :value="rate.method"
                                        class="hidden peer"
                                        @change="store(rate.method)"
                                    >

                                    <label 
<<<<<<< HEAD
                                        class="icon-radio-unselect absolute ltr:right-[20px] rtl:left-[20px] top-[20px] text-[24px] text-navyBlue peer-checked:icon-radio-select cursor-pointer"
=======
                                        class="icon-radio-unselect absolute ltr:right-5 rtl:left-5 top-5 text-2xl text-navyBlue peer-checked:icon-radio-select cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        :for="rate.method"
                                    >
                                    </label>

                                    <label 
<<<<<<< HEAD
                                        class="block p-[20px] border border-[#E9E9E9] rounded-[12px] cursor-pointer"
                                        :for="rate.method"
                                    >
                                        <span class="icon-flate-rate text-[60px] text-navyBlue"></span>

                                        <p class="text-[25px] mt-[5px] font-semibold max-sm:text-[20px]">
                                            @{{ rate.base_formatted_price }}
                                        </p>
                                        
                                        <p class="text-[12px] mt-[10px] font-medium">
=======
                                        class="block p-5 border border-[#E9E9E9] rounded-xl cursor-pointer"
                                        :for="rate.method"
                                    >
                                        <span class="icon-flate-rate text-6xl text-navyBlue"></span>

                                        <p class="text-2xl mt-1.5 font-semibold max-sm:text-xl">
                                            @{{ rate.base_formatted_price }}
                                        </p>
                                        
                                        <p class="text-xs mt-2.5 font-medium">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            <span class="font-medium">@{{ rate.method_title }}</span> - @{{ rate.method_description }}
                                        </p>
                                    </label>
                                </div>

<<<<<<< HEAD
                                {!! view_render_event('bagisto.shop.checkout.shipping-method.after') !!}

=======
                                {!! view_render_event('bagisto.shop.checkout.onepage.shipping-method.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            </div>
                        </div>
                    </x-slot:content>
                </x-shop::accordion>
<<<<<<< HEAD
=======

                {!! view_render_event('bagisto.shop.checkout.onepage.shipping-method.accordion.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-shipping-method', {
            template: '#v-shipping-method-template',

            data() {
                return {
                    shippingMethods: [],

                    isShowShippingMethod: false,

                    isShippingMethodLoading: false,
                }
            },

            methods: {
                store(selectedShippingMethod) {
                    this.$parent.$refs.vCartSummary.canPlaceOrder = false;

                    this.$parent.$refs.vPaymentMethod.isShowPaymentMethod = false;

                    this.$parent.$refs.vPaymentMethod.isPaymentMethodLoading = true;

                    this.$axios.post("{{ route('shop.checkout.onepage.shipping_methods.store') }}", {    
                            shipping_method: selectedShippingMethod,
                        })
                        .then(response => {
                            this.$parent.getOrderSummary();
<<<<<<< HEAD
=======
                            
                            this.$emitter.emit('after-shipping-method-selected', selectedShippingMethod);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                            this.$parent.$refs.vPaymentMethod.payment_methods = response.data.payment_methods;
                                
                            this.$parent.$refs.vPaymentMethod.isShowPaymentMethod = true;

                            this.$parent.$refs.vPaymentMethod.isPaymentMethodLoading = false;
                        })
                        .catch(error => {});
                },
            },
        });
    </script>
@endPushOnce
