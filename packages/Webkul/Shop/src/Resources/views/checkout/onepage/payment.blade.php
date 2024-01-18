{!! view_render_event('bagisto.shop.checkout.payment.method.before') !!}

<v-payment-method ref="vPaymentMethod">
    <x-shop::shimmer.checkout.onepage.payment-method/>
</v-payment-method>

{!! view_render_event('bagisto.shop.checkout.payment.method.after') !!}

@pushOnce('scripts')
    <script type="text/x-template" id="v-payment-method-template">
<<<<<<< HEAD
        <div class="mt-[30px] mb-[30px]">
=======
        <div class="mb-7">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <template v-if="! isShowPaymentMethod && isPaymentMethodLoading">
                <!-- Payment Method shimmer Effect -->
                <x-shop::shimmer.checkout.onepage.payment-method/>
            </template>
    
            <template v-if="isShowPaymentMethod">
                <div>
<<<<<<< HEAD
                    <x-shop::accordion>
                        <x-slot:header>
                            <div class="flex justify-between items-center">
                                <h2 class="text-[26px] font-medium max-sm:text-[20px]">
=======
                    {!! view_render_event('bagisto.shop.checkout.onepage.payment_method.accordion.before') !!}

                    <x-shop::accordion class="!border-b-0">
                        <x-slot:header class="!p-0">
                            <div class="flex justify-between items-center">
                                <h2 class="text-2xl font-medium max-sm:text-xl">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('shop::app.checkout.onepage.payment.payment-method')
                                </h2>
                            </div>
                        </x-slot:header>
        
<<<<<<< HEAD
                        <x-slot:content>
                            <div class="flex flex-wrap gap-[29px] mt-[30px]">
=======
                        <x-slot:content class="!p-0 mt-8">
                            <div class="flex flex-wrap gap-7">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <div 
                                    class="relative max-sm:max-w-full max-sm:flex-auto cursor-pointer"
                                    v-for="(payment, index) in payment_methods"
                                >

                                    {!! view_render_event('bagisto.shop.checkout.payment-method.before') !!}

                                    <input 
                                        type="radio" 
                                        name="payment[method]" 
                                        :value="payment.payment"
                                        :id="payment.method"
                                        class="hidden peer"    
                                        @change="store(payment)"
                                    >
        
                                    <label 
                                        :for="payment.method" 
<<<<<<< HEAD
                                        class="absolute ltr:right-[20px] rtl:left-[20px] top-[20px] icon-radio-unselect text-[24px] text-navyBlue peer-checked:icon-radio-select cursor-pointer"
=======
                                        class="absolute ltr:right-5 rtl:left-5 top-5 icon-radio-unselect text-2xl text-navyBlue peer-checked:icon-radio-select cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                    </label>

                                    <label 
                                        :for="payment.method" 
<<<<<<< HEAD
                                        class="w-[190px] p-[20px] block border border-[#E9E9E9] rounded-[12px] max-sm:w-full cursor-pointer"
                                    >

                                        <img
                                            class="max-w-[55px] max-h-[45px]"
                                            :src="paymentImages[payment.method] || '{{ bagisto_asset('images/paypal.png') }}'"
=======
                                        class="w-[190px] p-5 block border border-[#E9E9E9] rounded-xl max-sm:w-full cursor-pointer"
                                    >

                                        {!! view_render_event('bagisto.shop.checkout.onepage.payment-method.image.before') !!}

                                        <img
                                            class="max-w-[55px] max-h-[45px]"
                                            :src="payment.image"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            width="55"
                                            height="55"
                                            :alt="payment.method_title"
                                            :title="payment.method_title"
<<<<<<< HEAD
                                        >
                                        
                                        <p class="text-[14px] font-semibold mt-[5px]">
                                            @{{ payment.method_title }}
                                        </p>
                                        
                                        <p class="text-[12px] font-medium mt-[10px]">
                                            @{{ payment.description }}
                                        </p>
=======
                                        />

                                        {!! view_render_event('bagisto.shop.checkout.onepage.payment-method.image.after') !!}

                                        {!! view_render_event('bagisto.shop.checkout.onepage.payment-method.title.before') !!}

                                        <p class="text-sm font-semibold mt-1.5">
                                            @{{ payment.method_title }}
                                        </p>
                                        
                                        {!! view_render_event('bagisto.shop.checkout.onepage.payment-method.title.after') !!}

                                        {!! view_render_event('bagisto.shop.checkout.onepage.payment-method.description.before') !!}

                                        <p class="text-xs font-medium mt-2.5">
                                            @{{ payment.description }}
                                        </p> 

                                        {!! view_render_event('bagisto.shop.checkout.onepage.payment-method.description.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </label>

                                    {!! view_render_event('bagisto.shop.checkout.payment-method.after') !!}

                                    <!-- Todo implement the additionalDetails -->
                                    {{-- \Webkul\Payment\Payment::getAdditionalDetails($payment['method'] --}}
                                </div>
                            </div>
                        </x-slot:content>
                    </x-shop::accordion>
<<<<<<< HEAD
=======

                    {!! view_render_event('bagisto.shop.checkout.onepage.index.payment_method.accordion.before') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                </div>
            </template>
        </div>
    </script>

    <script type="module">
        app.component('v-payment-method', {
            template: '#v-payment-method-template',

            data() {
                return {
                    paymentMethods: [],

<<<<<<< HEAD
                    paymentImages: {
                        moneytransfer: "{{ bagisto_asset('images/money-transfer.png') }}",
                        cashondelivery: "{{ bagisto_asset('images/cash-on-delivery.png') }}",
                    },

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    isShowPaymentMethod: false,

                    isPaymentMethodLoading: false,
                }
            },

            methods: {
                store(selectedPaymentMethod) {
                    this.$axios.post("{{ route('shop.checkout.onepage.payment_methods.store') }}", {
                            payment: selectedPaymentMethod
                        })
                        .then(response => {
                            this.$parent.$refs.vCartSummary.selectedPaymentMethod = selectedPaymentMethod;

<<<<<<< HEAD
=======
                            this.$emitter.emit('after-payment-method-selected', selectedPaymentMethod);

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            if (response.data.cart) {
                                this.$parent.$refs.vCartSummary.canPlaceOrder = true;
                            }
                        })
                        .catch(error => console.log(error));
                },
            },
        });
    </script>
@endPushOnce
