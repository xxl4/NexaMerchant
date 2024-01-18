<<<<<<< HEAD
{{-- SEO Meta Content --}}
=======
<!-- SEO Meta Content -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@push('meta')
    <meta name="description" content="@lang('shop::app.checkout.onepage.index.checkout')"/>

    <meta name="keywords" content="@lang('shop::app.checkout.onepage.index.checkout')"/>
@endPush

<x-shop::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="false"
>
<<<<<<< HEAD
    {{-- Page Title --}}
=======
    <!-- Page Title -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-slot:title>
        @lang('shop::app.checkout.onepage.index.checkout')
    </x-slot>

<<<<<<< HEAD
    {{-- Page Header --}}
    <div class="lex flex-wrap">
        <div class="w-full flex justify-between px-[60px] py-[17px] border border-t-0 border-b-[1px] border-l-0 border-r-0 max-lg:px-[30px] max-sm:px-[15px]">
            <div class="flex items-center gap-x-[54px] max-[1180px]:gap-x-[35px]">
                <a
                    href="{{ route('shop.home.index') }}"
                    class="flex min-h-[30px]"
                    aria-label="Bagisto "
                >
                    <img
                        src="{{ bagisto_asset('images/logo.svg') }}"
                        alt="Bagisto "
=======
    {!! view_render_event('bagisto.shop.checkout.onepage.header.before') !!}

    <!-- Page Header -->
    <div class="lex flex-wrap">
        <div class="w-full flex justify-between px-[60px] py-4 border border-t-0 border-b border-l-0 border-r-0 max-lg:px-8 max-sm:px-4">
            <div class="flex items-center gap-x-14 max-[1180px]:gap-x-9">
                <a
                    href="{{ route('shop.home.index') }}"
                    class="flex min-h-[30px]"
                    aria-label="@lang('shop::checkout.onepage.index.bagisto')"
                >
                    <img
                        src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                        alt="{{ config('app.name') }}"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        width="131"
                        height="29"
                    >
                </a>
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
        {{-- Breadcrumbs --}}
        <x-shop::breadcrumbs name="checkout"></x-shop::breadcrumbs>

        <v-checkout>
            {{-- Shimmer Effect --}}
=======
    {!! view_render_event('bagisto.shop.checkout.onepage.header.after') !!}

    <div class="container px-[60px] max-lg:px-8 max-sm:px-4">

        {!! view_render_event('bagisto.shop.checkout.onepage.breadcrumbs.before') !!}

        <!-- Breadcrumbs -->
        <x-shop::breadcrumbs name="checkout"></x-shop::breadcrumbs>

        {!! view_render_event('bagisto.shop.checkout.onepage.breadcrumbs.after') !!}

        <v-checkout>
            <!-- Shimmer Effect -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <x-shop::shimmer.checkout.onepage/>
        </v-checkout>
    </div>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-checkout-template">
<<<<<<< HEAD
            <div class="grid grid-cols-[1fr_auto] gap-[30px] max-lg:grid-cols-[1fr]">
=======
            <div class="grid grid-cols-[1fr_auto] gap-8 max-lg:grid-cols-[1fr]">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <div    
                    class="overflow-y-auto"
                    ref="scrollBottom"
                >
<<<<<<< HEAD
                    @include('shop::checkout.onepage.addresses.index')

                    @include('shop::checkout.onepage.shipping')

                    @include('shop::checkout.onepage.payment')

=======
                    {!! view_render_event('bagisto.shop.checkout.onepage.addresses.before') !!}

                    @include('shop::checkout.onepage.addresses.index')

                    {!! view_render_event('bagisto.shop.checkout.onepage.addresses.after') !!}

                    {!! view_render_event('bagisto.shop.checkout.onepage.shipping_method.before') !!}

                    @include('shop::checkout.onepage.shipping')

                    {!! view_render_event('bagisto.shop.checkout.onepage.shipping_method.after') !!}

                    {!! view_render_event('bagisto.shop.checkout.onepage.payment_method.before') !!}

                    @include('shop::checkout.onepage.payment')

                    {!! view_render_event('bagisto.shop.checkout.onepage.payment_method.before') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                </div>
                
                @include('shop::checkout.onepage.summary')
            </div>
        </script>

        <script type="module">
            app.component('v-checkout', {
                template: '#v-checkout-template',

                data() {
                    return {
                        cart: {},

                        isCartLoading: true,
                    }
                },

                created() {
                    this.getOrderSummary();
                }, 

                methods: {
                    getOrderSummary() {
                        this.$axios.get("{{ route('shop.checkout.onepage.summary') }}")
                            .then(response => {
                                this.cart = response.data.data;

                                this.isCartLoading = false;

                                let container = this.$refs.scrollBottom;

                                if (container) {
                                    container.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'end'
                                    });
                                }
                            })
                            .catch(error => console.log(error));
                    },
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
