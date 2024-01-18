<<<<<<< HEAD
{{-- SEO Meta Content --}}
=======
<!-- SEO Meta Content -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@push('meta')
    <meta name="description" content="@lang('shop::app.compare.title')"/>

    <meta name="keywords" content="@lang('shop::app.compare.title')"/>
@endPush

<x-shop::layouts>
<<<<<<< HEAD
    {{-- Page Title --}}
    <x-slot:title>
        @lang('shop::app.compare.title')
    </x-slot:title>

    {{-- Breadcrumb --}}
    <div class="flex justify-center mt-[20px] max-lg:hidden">
		<div class="flex gap-x-[10px] items-center">
            <x-shop::breadcrumbs name="compare"></x-shop::breadcrumbs>
		</div>
	</div>

    {{-- Compare Component --}}
    <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px] mt-[30px]">
=======
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.compare.title')
    </x-slot>

    <!-- Breadcrumb -->
    <div class="flex justify-center mt-5 max-lg:hidden">
        {!! view_render_event('bagisto.shop.customers.account.compare.breadcrumbs.before') !!}

		<div class="flex gap-x-2.5 items-center">
            <x-shop::breadcrumbs name="compare"></x-shop::breadcrumbs>
		</div>

        {!! view_render_event('bagisto.shop.customers.account.compare.breadcrumbs.after') !!}
	</div>

    <!-- Compare Component -->
    <div class="container px-[60px] max-lg:px-8 max-sm:px-4 mt-8">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <v-compare>
            <!---- Shimmer Effect -->
            <x-shop::shimmer.compare
                :attributeCount="count($comparableAttributes)"
            >
            </x-shop::shimmer.compare>
        </v-compare>
    </div>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-compare-template">
            <div>
<<<<<<< HEAD

                {!! view_render_event('bagisto.shop.customers.account.compare.view.before') !!}

                <div v-if="! isLoading">
                    <div class="flex justify-between items-center">
                        <h2 class="text-[26px] font-medium">
                            @lang('shop::app.compare.title')
                        </h2>

                        <div
                            class="secondary-button flex gap-x-[10px] items-center py-[12px] px-[20px] border-[#E9E9E9] font-normal whitespace-nowrap"
                            v-if="items.length"
                            @click="removeAll"
                        >
                            <span class="icon-bin text-[24px]"></span>
                            @lang('shop::app.compare.delete-all')
                        </div>
                    </div>

                    <div
                        class="grid mt-[60px] overflow-auto journal-scroll"
                        v-if="items.length"
                    >
                        <template v-for="attribute in comparableAttributes">
                            <!---- Product Card -->
                            <div
                                class="flex items-center max-w-full border-b-[1px] border-[#E9E9E9]"
                                v-if="attribute.code == 'product'"
                            >
                                <div class="min-w-[304px] max-w-full max-sm:hidden">
                                    <p class="text-[14px] font-medium">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>
                                <div class="flex gap-[12px] border-l-[1px] border-[#E9E9E9] max-sm:border-0">
=======
                {!! view_render_event('bagisto.shop.customers.account.compare.before') !!}

                <div v-if="! isLoading">
                    <div class="flex justify-between items-center">

                        {!! view_render_event('bagisto.shop.customers.account.compare.title.before') !!}

                        <h1 class="text-2xl font-medium">
                            @lang('shop::app.compare.title')
                        </h1>

                        {!! view_render_event('bagisto.shop.customers.account.compare.title.after') !!}

                        {!! view_render_event('bagisto.shop.customers.account.compare.remove_all.before') !!}

                        <div
                            class="secondary-button flex gap-x-2.5 items-center py-3 px-5 border-[#E9E9E9] font-normal whitespace-nowrap"
                            v-if="items.length"
                            @click="removeAll"
                        >
                            <span class="icon-bin text-2xl"></span>
                            @lang('shop::app.compare.delete-all')
                        </div>

                        {!! view_render_event('bagisto.shop.customers.account.compare.remove_all.after') !!}
                    </div>

                    <div
                        class="grid mt-16 overflow-auto journal-scroll"
                        v-if="items.length"
                    >
                        <template v-for="attribute in comparableAttributes">
                            <!-- Product Card -->
                            <div
                                class="flex items-center max-w-full border-b border-[#E9E9E9]"
                                v-if="attribute.code == 'product'"
                            >
                                {!! view_render_event('bagisto.shop.customers.account.compare.attribute_name.before') !!}

                                <div class="min-w-[304px] max-w-full max-sm:hidden">
                                    <p class="text-sm font-medium">
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>

                                {!! view_render_event('bagisto.shop.customers.account.compare.attribute_name.after') !!}

                                <div class="flex gap-3 ltr:border-l-[1px] rtl:border-r-[1px] border-[#E9E9E9] max-sm:border-0">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <div
                                        class="relative group"
                                        v-for="product in items"
                                    >
                                        <span
<<<<<<< HEAD
                                            class="hidden absolute top-[60px] right-[20px] justify-center items-center w-[30px] h-[30px] rounded-md bg-white cursor-pointer icon-cancel text-[25px] group-hover:flex group-hover:z-[1] transition-all duration-300"
                                            @click="remove(product.id)"
                                        ></span>

                                        <x-shop::products.card class="min-w-[311px] max-w-[311px] pt-0 pr-0 p-[20px] max-sm:pl-0"></x-shop::products.card>
=======
                                            class="hidden absolute top-16 ltr:right-5 rtl:left-5 justify-center items-center w-[30px] h-[30px] rounded-md bg-white cursor-pointer icon-cancel text-2xl group-hover:flex group-hover:z-[1] transition-all duration-300"
                                            @click="remove(product.id)"
                                        ></span>

                                        <x-shop::products.card class="min-w-[311px] max-w-[311px] pt-0 ltr:pr-0 rtl:pl-0 p-5 max-sm:ltr:pl-0 max-sm:rtl:pr-0"></x-shop::products.card>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </div>
                                </div>
                            </div>

<<<<<<< HEAD
                            <!---- Comparable Attributes -->
                            <div
                                class="flex items-center max-w-full border-b-[1px] border-[#E9E9E9] last:border-none"
                                v-else
                            >
                                <div class="min-w-[304px] max-w-full max-sm:hidden">
                                    <p class="text-[14px] font-medium">
=======
                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.before') !!}

                            <!-- Comparable Attributes -->
                            <div
                                class="flex items-center max-w-full border-b border-[#E9E9E9] last:border-none"
                                v-else
                            >
                                <div class="min-w-[304px] max-w-full max-sm:hidden">
                                    <p class="text-sm font-medium">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @{{ attribute.name ?? attribute.admin_name }}
                                    </p>
                                </div>

<<<<<<< HEAD
                                <div class="flex gap-[12px] border-l-[1px] border-[#E9E9E9] max-sm:border-0">
                                    <div
                                        class="w-[311px] max-w-[311px] pr-0 p-[20px] max-sm:pl-0"
                                        v-for="(product, index) in items"
                                    >
                                        <p class="hidden mb-[5px] text-[14px] font-medium max-sm:block">
                                            @{{ attribute.name ?? attribute.admin_name }} :
                                        </p>

                                        <p class="text-[14px]">
                                            @{{ product[attribute.code] ?? 'N/A' }}
=======
                                <div class="flex gap-3 ltr:border-l-[1px] rtl:border-r-[1px] border-[#E9E9E9] max-sm:border-0">
                                    <div
                                        class="w-[311px] max-w-[311px] ltr:pr-0 rtl:pl-0 p-5 max-sm:ltr:pl-0 max-sm:rtl:pr-0"
                                        v-for="(product, index) in items"
                                    >
                                        <p class="hidden mb-1.5 text-sm font-medium max-sm:block">
                                            @{{ attribute.name ?? attribute.admin_name }} :
                                        </p>

                                        <p
                                            class="text-sm"
                                            v-html="product[attribute.code] ?? 'N/A'"
                                        >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        </p>
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD
=======

                            {!! view_render_event('bagisto.shop.customers.account.compare.comparable_attribute.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </template>
                    </div>

                    <div
<<<<<<< HEAD
                        class="grid items-center justify-items-center place-content-center w-[100%] m-auto h-[476px] text-center"
                        v-else
                    >
                        <img src="{{ bagisto_asset('images/thank-you.png') }}"/>
                        
                        <p class="text-[20px]">@lang('shop::app.compare.empty-text')</p>
=======
                        class="grid items-center justify-items-center place-content-center w-full m-auto h-[476px] text-center"
                        v-else
                    >
                        <img
                            src="{{ bagisto_asset('images/thank-you.png') }}"
                            alt="@lang('shop::app.compare.empty-text')"
                        />
                        
                        <p
                            class="text-xl"
                            role="heading"
                        >
                            @lang('shop::app.compare.empty-text')
                        </p>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    </div>
                </div>

                <div v-else>
                    <!---- Shimmer Effect -->
                    <x-shop::shimmer.compare
                        :attributeCount="count($comparableAttributes)"
                    >
                    </x-shop::shimmer.compare>
                </div>

<<<<<<< HEAD
                {!! view_render_event('bagisto.shop.customers.account.compare.view.after') !!}

=======
                {!! view_render_event('bagisto.shop.customers.account.compare.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </div>
        </script>

        <script type="module">
            app.component("v-compare", {
                template: '#v-compare-template',

                data() {
                    return  {
                        comparableAttributes: [
                            ...[{'code': 'product', 'name': 'Product'}],
                            ...@json($comparableAttributes)
                        ],

                        items: [],

                        isCustomer: '{{ auth()->guard('customer')->check() }}',

                        isLoading: true,
                    }
                },

                mounted() {
                    this.getItems();
                },

                methods: {
                    getItems() {
                        let productIds = [];
                        
                        if (! this.isCustomer) {
                            productIds = this.getStorageValue('compare_items');
                        }
                        
                        this.$axios.get("{{ route('shop.api.compare.index') }}", {
                                params: {
                                    product_ids: productIds,
                                },
                            })
                            .then(response => {
                                this.isLoading = false;

                                this.items = response.data.data;
                            })
                            .catch(error => {});
                    },

                    remove(productId) {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                if (! this.isCustomer) {
                                    const index = this.items.findIndex((item) => item.id === productId);

                                    this.items.splice(index, 1);

                                    let items = this.getStorageValue()
                                        .filter(item => item != productId);

                                    localStorage.setItem('compare_items', JSON.stringify(items));

                                    return;
                                }

                                this.$axios.post("{{ route('shop.api.compare.destroy') }}", {
                                        '_method': 'DELETE',
                                        'product_id': productId,
                                    })
                                    .then(response => {
                                        this.items = response.data.data;

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {
                                        this.$emitter.emit('add-flash', { type: 'error', message: response.data.message });
                                    });
                            }
                        });
                    },

                    removeAll() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                if (! this.isCustomer) {
                                    localStorage.removeItem('compare_items');

                                    this.items = [];

                                    this.$emitter.emit('add-flash', { type: 'success', message:  "@lang('shop::app.compare.remove-all-success')" });

                                    return;
                                }
                                
                                this.$axios.post("{{ route('shop.api.compare.destroy_all') }}", {
                                        '_method': 'DELETE',
                                    })
                                    .then(response => {
                                        this.items = [];

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                    })
                                    .catch(error => {});
                            }
                        });
                    },

                    getStorageValue() {
                        let value = localStorage.getItem('compare_items');

                        if (! value) {
                            return [];
                        }

                        return JSON.parse(value);
                    },
                }
            });
        </script>
    @endpushOnce
</x-shop::layouts>
