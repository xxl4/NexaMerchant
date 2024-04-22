{{-- Purchase Funnel Vue Component --}}
<v-reporting-sales-purchase-funnel>
    {{-- Shimmer --}}
    <x-admin::shimmer.reporting.sales.purchase-funnel/>
</v-reporting-sales-purchase-funnel>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('admin::app.reporting.sales.index.purchase-funnel')</h3>
    </div>
    
    <div class="card-body">

        <p><code>@lang('admin::app.reporting.sales.index.total-visits')</code></p>
        <div class="progress">
            <div class="progress-bar bg-primary progress-bar-striped total-visits" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                <span class="sr-only">40% Complete (success)</span>
            </div>
        </div>

        <p><code>@lang('admin::app.reporting.sales.index.product-views')</code></p>
        <div class="progress">
            <div class="progress-bar bg-primary progress-bar-striped product-views" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                <span class="sr-only">40% Complete (success)</span>
            </div>
        </div>

        <p><code>@lang('admin::app.reporting.sales.index.added-to-cart')</code></p>
        <div class="progress">
            <div class="progress-bar bg-primary progress-bar-striped added-to-cart" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                <span class="sr-only">40% Complete (success)</span>
            </div>
        </div>

        <p><code>@lang('admin::app.reporting.sales.index.purchased')</code></p>
        <div class="progress">
            <div class="progress-bar bg-primary progress-bar-striped purchased" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                <span class="sr-only">40% Complete (success)</span>
            </div>
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
        filtets.type = 'purchase-funnel'

        $.ajax({
            url: "{{ route('admin.reporting.sales.stats') }}",
            data: filtets,
            async: true,
            dataType: 'json',
            type: "get",
        }).done(function (data) {

            $(".total-visits").attr("style", "width:" + data.statistics.visitors.total + "%");
            $(".total-visits").attr("aria-valuenow", data.statistics.visitors.total);
            $(".total-visits").attr("aria-valuemax", data.statistics.visitors.progress);

            $(".added-to-cart").attr("style", "width:" + data.statistics.carts.total + "%");
            $(".added-to-cart").attr("aria-valuenow", data.statistics.carts.total);
            $(".added-to-cart").attr("aria-valuemax", data.statistics.carts.progress);

            $(".product-views").attr("style", "width:" + data.statistics.product_visitors.total + "%");
            $(".product-views").attr("aria-valuenow", data.statistics.product_visitors.total);
            $(".product-views").attr("aria-valuemax", data.statistics.product_visitors.progress);

            $(".purchased").attr("style", "width:" + data.statistics.orders.total + "%");
            $(".purchased").attr("aria-valuenow", data.statistics.orders.total);
            $(".purchased").attr("aria-valuemax", data.statistics.orders.progress);
            
            



        })




    });
</script>



{{-- @pushOnce('scripts')
    <script type="text/x-template" id="v-reporting-sales-purchase-funnel-template">
        <!-- Shimmer -->
        <template v-if="isLoading">
            <x-admin::shimmer.reporting.sales.purchase-funnel/>
        </template>

        <!-- Purchase Funnel Section -->
        <template v-else>
            <div class="flex-1 relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                <!-- Header -->
                <p class="text-[16px] text-gray-600 dark:text-white font-semibold mb-[16px]">
                    @lang('admin::app.reporting.sales.index.purchase-funnel')
                </p>
                
                <!-- Content -->
                <div class="grid grid-cols-4 gap-[24px]">
                    <!-- Total Visits -->
                    <div class="flex flex-col gap-[16px]">
                        <div class="grid gap-[2px]">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                @{{ report.statistics.visitors.total }}
                            </p>

                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
                                @lang('admin::app.reporting.sales.index.total-visits')
                            </p>
                        </div>

                        <div class="w-full relative bg-slate-100 aspect-[0.5/1]">
                            <div
                                class="w-full absolute bottom-0 bg-emerald-400"
                                :style="{ 'height': report.statistics.visitors.progress + '%' }"
                            ></div>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300">
                            @lang('admin::app.reporting.sales.index.total-visits-info')
                        </p>
                    </div>

                    <!-- Total Product Visits -->
                    <div class="flex flex-col gap-[16px]">
                        <div class="grid gap-[2px]">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                @{{ report.statistics.product_visitors.total }}
                            </p>

                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
                                @lang('admin::app.reporting.sales.index.product-views')
                            </p>
                        </div>

                        <div class="w-full relative bg-slate-100 aspect-[0.5/1]">
                            <div
                                class="w-full absolute bottom-0 bg-emerald-400"
                                :style="{ 'height': (report.statistics.product_visitors.progress).toFixed(2) + '%' }"
                            ></div>
                        </div>

                        <p
                            class="text-gray-600 dark:text-gray-300"
                            v-html="'@lang('admin::app.reporting.sales.index.product-views-info')'.replace(':progress', '<span class=\'text-emerald-400 font-semibold\'>' + report.statistics.product_visitors.progress + '%</span>')"
                        ></p>
                    </div>

                    <!-- Total Added To Cart -->
                    <div class="flex flex-col gap-[16px]">
                        <div class="grid gap-[2px]">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                @{{ report.statistics.carts.total }}
                            </p>

                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
                                @lang('admin::app.reporting.sales.index.added-to-cart')
                            </p>
                        </div>

                        <div class="w-full relative bg-slate-100 aspect-[0.5/1]">
                            <div
                                class="w-full absolute bottom-0 bg-emerald-400"
                                :style="{ 'height': (report.statistics.carts.progress).toFixed(2) + '%' }"
                            ></div>
                        </div>

                        <p
                            class="text-gray-600 dark:text-gray-300"
                            v-html="'@lang('admin::app.reporting.sales.index.added-to-cart-info')'.replace(':progress', '<span class=\'text-emerald-400 font-semibold\'>' + report.statistics.carts.progress + '%</span>')"
                        ></p>
                    </div>

                    <!-- Total Purchased -->
                    <div class="flex flex-col gap-[16px]">
                        <div class="grid gap-[2px]">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                @{{ report.statistics.orders.total }}
                            </p>

                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
                                @lang('admin::app.reporting.sales.index.purchased')
                            </p>
                        </div>

                        <div class="w-full relative bg-slate-100 dark:text-gray-300 aspect-[0.5/1]">
                            <div
                                class="w-full absolute bottom-0 bg-emerald-400"
                                :style="{ 'height': report.statistics.orders.progress + '%' }"
                            ></div>
                        </div>

                        <p
                            class="text-gray-600 dark:text-gray-300"
                            v-html="'@lang('admin::app.reporting.sales.index.purchased-info')'.replace(':progress', '<span class=\'text-emerald-400 font-semibold\'>' + report.statistics.orders.progress + '%</span>')"
                        ></p>
                    </div>
                </div>

                <!-- Date Range Section -->
                <div class="flex gap-[20px] justify-end mt-[24px]">
                    <div class="flex gap-[4px] items-center">
                        <span class="w-[14px] h-[14px] rounded-[3px] bg-emerald-400"></span>

                        <p class="text-[12px] dark:text-gray-300">
                            @{{ report.date_range.current }}
                        </p>
                    </div>
                </div>
            </div>
        </template>
    </script>

    <script type="module">
        app.component('v-reporting-sales-purchase-funnel', {
            template: '#v-reporting-sales-purchase-funnel-template',

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

                    filtets.type = 'purchase-funnel';

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