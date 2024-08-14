{{-- Top Selling Products By Revenue Vue Component --}}
<v-reporting-product-top-selling-by-revenue>
    {{-- Shimmer --}}
    <x-admin::shimmer.reporting.products.top-selling-by-revenue/>
</v-reporting-product-top-selling-by-revenue>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('admin::app.reporting.products.index.top-selling-products-by-revenue')</h3>
    </div>
    
    <div class="card-body">

        <div class="top-selling-products-by-revenue">

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
        filtets.type = 'top-selling-products-by-revenue'

        $.ajax({
            url: "{{ route('admin.reporting.products.stats') }}",
            data: filtets,
            async: true,
            dataType: 'json',
            type: "get",
        }).done(function (data) {

            $(".top-selling-products-by-revenue").html();

            var statistics = data.statistics;

            var html = "";

            statistics.forEach(function(currentValue, index, arr){
                console.log(currentValue, index, arr);

                progress = currentValue.progress;

                if(progress > 100) progress = 100;

                html += '<p><code>'+ currentValue.name + "(" +  currentValue.formatted_revenue +' ) </code></p><div class="progress"><div class="progress-bar bg-primary progress-bar-striped purchased" role="progressbar" aria-valuenow="'+ currentValue.count +'" aria-valuemin="0" aria-valuemax="100" style="width: '+ progress +'%"><span class="sr-only">'+ progress +'% Complete (success)</span></div></div>';



            });

            $(".top-selling-products-by-revenue").html(html);
            
            



        })




    });
</script>

{{-- @pushOnce('scripts')
    <script type="text/x-template" id="v-reporting-product-top-selling-by-revenue-template">
        <!-- Shimmer -->
        <template v-if="isLoading">
            <x-admin::shimmer.reporting.products.top-selling-by-revenue/>
        </template>

        <!-- Top Selling Products By Revenue Section -->
        <template v-else>
            <div class="flex-1 relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                <!-- Header -->
                <div class="flex items-center justify-between mb-[16px]">
                    <p class="text-[16px] text-gray-600 dark:text-white font-semibold">
                        @lang('admin::app.reporting.products.index.top-selling-products-by-revenue')
                    </p>

                    <a
                        href="{{ route('admin.reporting.products.view', ['type' => 'top-selling-products-by-revenue']) }}"
                        class="text-[14px] text-blue-600 cursor-pointer transition-all hover:underline"
                    >
                        @lang('admin::app.reporting.products.index.view-details')
                    </a>
                </div>

                <!-- Content -->
                <div class="grid gap-[16px]">
                    <!-- Top Selling Products By Revenue -->
                    <template v-if="report.statistics.length">
                        <!-- Customers -->
                        <div class="grid gap-[27px]">
                            <div
                                class="grid"
                                v-for="product in report.statistics"
                            >
                                <p class="dark:text-white">@{{ product.name }}</p>

                                <div class="flex gap-[20px] items-center">
                                    <div class="w-full h-[8px] relative bg-slate-100">
                                        <div
                                            class="h-[8px] absolute left-0 bg-emerald-500"
                                            :style="{ 'width': product.progress + '%' }"
                                        ></div>
                                    </div>

                                    <p class="text-[14px] text-gray-600 dark:text-gray-300 font-semibold">
                                        @{{ product.formatted_revenue }}
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
                            <span class="w-[14px] h-[14px] rounded-[3px] bg-emerald-400"></span>

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
        app.component('v-reporting-product-top-selling-by-revenue', {
            template: '#v-reporting-product-top-selling-by-revenue-template',

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

                    filtets.type = 'top-selling-products-by-revenue';

                    this.$axios.get("{{ route('admin.reporting.products.stats') }}", {
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