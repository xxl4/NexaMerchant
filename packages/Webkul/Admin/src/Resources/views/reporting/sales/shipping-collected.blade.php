<<<<<<< HEAD
{{-- Shipping Collected Vue Component --}}
=======
<!-- Shipping Collected Vue Component -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
<v-reporting-sales-shipping-collected>
    <!-- Shimmer -->
    <x-admin::shimmer.reporting.sales.shipping-collected/>
</v-reporting-sales-shipping-collected>

@pushOnce('scripts')
    <script type="text/x-template" id="v-reporting-sales-shipping-collected-template">
        <!-- Shimmer -->
        <template v-if="isLoading">
            <x-admin::shimmer.reporting.sales.shipping-collected/>
        </template>

        <!-- Shipping Collected Section -->
        <template v-else>
<<<<<<< HEAD
            <div class="flex-1 relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                <!-- Header -->
                <div class="flex items-center justify-between mb-[16px]">
                    <p class="text-[16px] text-gray-600 dark:text-white font-semibold">
=======
            <div class="flex-1 relative p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <p class="text-base text-gray-600 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.reporting.sales.index.shipping-collected')
                    </p>

                    <a
                        href="{{ route('admin.reporting.sales.view', ['type' => 'shipping-collected']) }}"
<<<<<<< HEAD
                        class="text-[14px] text-blue-600 cursor-pointer transition-all hover:underline"
=======
                        class="text-sm text-blue-600 cursor-pointer transition-all hover:underline"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    >
                        @lang('admin::app.reporting.sales.index.view-details')
                    </a>
                </div>

                <!-- Content -->
<<<<<<< HEAD
                <div class="grid gap-[16px]">
                    <div class="flex gap-[16px] justify-between">
                        <p class="text-[30px] text-gray-600 dark:text-gray-300 font-bold leading-9">
                            @{{ report.statistics.shipping_collected.formatted_total }}
                        </p>
                        
                        <div class="flex gap-[2px] items-center">
                            <span
                                class="text-[16px] text-emerald-500"
=======
                <div class="grid gap-4">
                    <div class="flex gap-4 justify-between">
                        <p class="text-3xl text-gray-600 dark:text-gray-300 font-bold leading-9">
                            @{{ report.statistics.shipping_collected.formatted_total }}
                        </p>
                        
                        <div class="flex gap-0.5 items-center">
                            <span
                                class="text-base  text-emerald-500"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :class="[report.statistics.shipping_collected.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                            ></span>

                            <p
<<<<<<< HEAD
                                class="text-[16px] text-emerald-500"
                                :class="[report.statistics.shipping_collected.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                            >
                                @{{ report.statistics.shipping_collected.progress.toFixed(2) }}%
=======
                                class="text-base  text-emerald-500"
                                :class="[report.statistics.shipping_collected.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                            >
                                @{{ Math.abs(report.statistics.shipping_collected.progress.toFixed(2)) }}%
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            </p>
                        </div>
                    </div>

<<<<<<< HEAD
                    <p class="text-[16px] text-gray-600 dark:text-gray-300 font-semibold">
=======
                    <p class="text-base text-gray-600 dark:text-gray-300 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.reporting.sales.index.shipping-collected-over-time')
                    </p>

                    <!-- Line Chart -->
                    <x-admin::charts.line
                        ::labels="chartLabels"
                        ::datasets="chartDatasets"
                    />

                    <!-- Chart Date Range -->
<<<<<<< HEAD
                    <div class="flex gap-[20px] justify-center">
                        <div class="flex gap-[4px] items-center">
                            <span class="w-[14px] h-[14px] rounded-[3px] bg-emerald-400"></span>

                            <p class="text-[12px] dark:text-gray-300">
=======
                    <div class="flex gap-5 justify-center">
                        <div class="flex gap-1 items-center">
                            <span class="w-3.5 h-3.5 rounded-md bg-emerald-400"></span>

                            <p class="text-xs dark:text-gray-300">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @{{ report.date_range.previous }}
                            </p>
                        </div>

<<<<<<< HEAD
                        <div class="flex gap-[4px] items-center">
                            <span class="w-[14px] h-[14px] rounded-[3px] bg-sky-400"></span>

                            <p class="text-[12px] dark:text-gray-300">
=======
                        <div class="flex gap-1 items-center">
                            <span class="w-3.5 h-3.5 rounded-md bg-sky-400"></span>

                            <p class="text-xs dark:text-gray-300">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @{{ report.date_range.current }}
                            </p>
                        </div>
                    </div>

                    <!-- Top Shipping Methods -->
<<<<<<< HEAD
                    <p class="py-[10px] text-[16px] text-gray-600 dark:text-white font-semibold">
=======
                    <p class="py-2.5 text-base  text-gray-600 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.reporting.sales.index.top-shipping-methods')
                    </p>

                    <!-- Methods -->
                    <template v-if="report.statistics.top_methods.length">
<<<<<<< HEAD
                        <div class="grid gap-[27px]">
=======
                        <div class="grid gap-7">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <div
                                class="grid"
                                v-for="method in report.statistics.top_methods"
                            >
                                <p class="dark:text-white">@{{ method.title }}</p>

<<<<<<< HEAD
                                <div class="flex gap-[20px] items-center">
                                    <div class="w-full h-[8px] relative bg-slate-100">
                                        <div
                                            class="h-[8px] absolute left-0 bg-emerald-500"
=======
                                <div class="flex gap-5 items-center">
                                    <div class="w-full h-2 relative bg-slate-100">
                                        <div
                                            class="h-2 absolute left-0 bg-emerald-500"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            :style="{ 'width': method.progress + '%' }"
                                        ></div>
                                    </div>

<<<<<<< HEAD
                                    <p class="text-[14px] text-gray-600 dark:text-gray-300 font-semibold">
=======
                                    <p class="text-sm text-gray-600 dark:text-gray-300 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @{{ method.formatted_total }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Empty State -->
                    <template v-else>
                        @include('admin::reporting.empty')
                    </template>

                    <!-- Date Range -->
<<<<<<< HEAD
                    <div class="flex gap-[20px] justify-end">
                        <div class="flex gap-[4px] items-center">
                            <span class="w-[14px] h-[14px] rounded-[3px] bg-emerald-400"></span>

                            <p class="text-[12px] dark:text-gray-300">
=======
                    <div class="flex gap-5 justify-end">
                        <div class="flex gap-1 items-center">
                            <span class="w-3.5 h-3.5 rounded-md bg-emerald-400"></span>

                            <p class="text-xs dark:text-gray-300">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @{{ report.date_range.current }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </script>

    <script type="module">
        app.component('v-reporting-sales-shipping-collected', {
            template: '#v-reporting-sales-shipping-collected-template',

            data() {
                return {
                    report: [],

                    isLoading: true,
                }
            },

            computed: {
                chartLabels() {
                    return this.report.statistics.over_time.current.map(({ label }) => label);
                },

                chartDatasets() {
                    return [{
                        data: this.report.statistics.over_time.current.map(({ total }) => total),
                        lineTension: 0.2,
                        pointStyle: false,
                        borderWidth: 2,
                        borderColor: '#0E9CFF',
                        backgroundColor: 'rgba(14, 156, 255, 0.3)',
                        fill: true,
                    }, {
                        data: this.report.statistics.over_time.previous.map(({ total }) => total),
                        lineTension: 0.2,
                        pointStyle: false,
                        borderWidth: 2,
                        borderColor: '#34D399',
                        backgroundColor: 'rgba(52, 211, 153, 0.3)',
                        fill: true,
                    }];
                }
            },

            mounted() {
                this.getStats({});

                this.$emitter.on('reporting-filter-updated', this.getStats);
            },

            methods: {
                getStats(filtets) {
                    this.isLoading = true;

                    var filtets = Object.assign({}, filtets);

                    filtets.type = 'shipping-collected';

                    this.$axios.get("{{ route('admin.reporting.sales.stats') }}", {
                            params: filtets
                        })
                        .then(response => {
                            this.report = response.data;

                            this.isLoading = false;
                        })
                        .catch(error => {});
                }
            }
        });
    </script>
@endPushOnce