{{-- Abandoned Carts Vue Component --}}
<v-reporting-sales-abandoned-carts>
    {{-- Shimmer --}}
    <x-admin::shimmer.reporting.sales.abandoned-carts/>
</v-reporting-sales-abandoned-carts>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('admin::app.reporting.sales.index.abandoned-carts')</h3>
    </div>
    
    <div class="card-body">
        <div class="abandoned-carts">

        </div>
    </div>
</div>

<!-- jQuery -->
<script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/themes/manage/AdminLTE/plugins/chart.js/Chart.min.js"></script>
<script src="/themes/manage/AdminLTE/dist/js/adminlte.min.js?v=3.2.0"></script>
<script>
    $(function () {
        


        var filtets = Object.assign({}, filtets);
        url = window.location.search;
        const searchParams = new URLSearchParams(url);
        var filtets = Object.assign({}, filtets);
        filtets.start = searchParams.get('start_date');
        filtets.end = searchParams.get('end_date');
        filtets.type = 'abandoned-carts'

        $.ajax({
            url: "{{ route('admin.reporting.sales.stats') }}",
            data: filtets,
            async: true,
            dataType: 'json',
            type: "get",
        }).done(function (data) {

            $(".abandoned-carts").html();

            var products = data.statistics.products;

            var html = "";

            products.forEach(function(currentValue, index, arr){
                console.log(currentValue, index, arr);

                progress = currentValue.progress;

                if(progress > 100) progress = 100;

                html += '<p><code>'+ currentValue.name +'</code></p><div class="progress"><div class="progress-bar bg-primary progress-bar-striped purchased" role="progressbar" aria-valuenow="'+ currentValue.count +'" aria-valuemin="0" aria-valuemax="100" style="width: '+ progress +'%"><span class="sr-only">'+ progress +'% Complete (success)</span></div></div>';



            });

            $(".abandoned-carts").html(html);
            
            



        })




    });
</script>

{{-- @pushOnce('scripts')
    <script type="text/x-template" id="v-reporting-sales-abandoned-carts-template">
        <!-- Shimmer -->
        <template v-if="isLoading">
            <x-admin::shimmer.reporting.sales.abandoned-carts/>
        </template>

        <!-- Abandoned Carts Section -->
        <template v-else>
            <div class="flex-1 relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                <div class="flex items-center justify-between mb-[16px]">
                    <p class="text-[16px] text-gray-600 dark:text-white font-semibold">
                        @lang('admin::app.reporting.sales.index.abandoned-carts')
                    </p>

                    <a
                        href="{{ route('admin.reporting.sales.view', ['type' => 'abandoned-carts']) }}"
                        class="text-[14px] text-blue-600 cursor-pointer transition-all hover:underline"
                    >
                        @lang('admin::app.reporting.sales.index.view-details')
                    </a>
                </div>

                <!-- Content -->
                <div class="grid gap-[16px]">
                    <!-- Stats -->
                    <div class="flex gap-[16px] justify-between">
                        <!-- Abandoned Revenue -->
                        <div class="grid gap-[4px]">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                @{{ report.statistics.sales.formatted_total }}
                            </p>

                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
                                @lang('admin::app.reporting.sales.index.abandoned-revenue')
                            </p>
                            
                            <div class="flex gap-[2px] items-center">
                                <span
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.sales.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>

                                <p
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.sales.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    @{{ report.statistics.sales.progress.toFixed(2) }}%
                                </p>
                            </div>
                        </div>

                        <!-- Abandoned Cart -->
                        <div class="grid gap-[4px]">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                @{{ report.statistics.carts.current }}
                            </p>

                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
                                @lang('admin::app.reporting.sales.index.abandoned-carts')
                            </p>
                            
                            <div class="flex gap-[2px] items-center">
                                <span
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.carts.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>

                                <p
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.carts.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    @{{ report.statistics.carts.progress.toFixed(2) }}%
                                </p>
                            </div>
                        </div>

                        <!-- Abandoned Rate -->
                        <div class="grid gap-[4px]">
                            <div class="flex gap-[2px]">
                                <p
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.rate.progress >= 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    @{{ report.statistics.rate.current.toFixed(2) }}%
                                </p>

                                <span
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.carts.progress >= 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>
                            </div>

                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
                                @lang('admin::app.reporting.sales.index.abandoned-rate')
                            </p>
                            
                            <div class="flex gap-[2px] items-center">
                                <p
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.rate.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    @{{ report.statistics.rate.progress.toFixed(2) }}%
                                </p>

                                <span
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.carts.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>
                            </div>
                        </div>
                    </div>

                    <!-- Header -->
                    <p class="py-[10px] text-[16px] text-gray-600 dark:text-white font-semibold mt-[16px]">
                        @lang('admin::app.reporting.sales.index.abandoned-products')
                    </p>

                    <!-- Abandoned Products -->
                    <template v-if="report.statistics.products.length">
                        <div class="grid gap-[27px]">
                            <div
                                class="grid"
                                v-for="product in report.statistics.products"
                            >
                                <p class="dark:text-white">@{{ product.name }}</p>

                                <div class="flex gap-[20px] items-center">
                                    <div class="w-full h-[8px] relative bg-slate-100">
                                        <div
                                            class="h-[8px] absolute left-0 bg-blue-500"
                                            :style="{ 'width': product.progress + '%' }"
                                        ></div>
                                    </div>

                                    <p class="text-[14px] text-gray-600 dark:text-gray-300 font-semibold">
                                        @{{ product.count }}
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
                    <div class="flex gap-[20px] justify-end">
                        <div class="flex gap-[4px] items-center">
                            <span class="w-[14px] h-[14px] rounded-[3px] bg-blue-500"></span>

                            <p class="text-[12px] dark:text-gray-300">
                                @{{ report.date_range.current }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </script>

    <script type="module">
        app.component('v-reporting-sales-abandoned-carts', {
            template: '#v-reporting-sales-abandoned-carts-template',

            data() {
                return {
                    report: [],

                    isLoading: true,
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

                    filtets.type = 'abandoned-carts';

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
@endPushOnce --}}