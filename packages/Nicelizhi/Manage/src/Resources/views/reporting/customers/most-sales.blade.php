{{-- Customers with Most Sales Vue Component --}}
<v-reporting-customers-with-most-sales>    {{-- Shimmer --}}
    <x-admin::shimmer.reporting.customers.most-sales/>
</v-reporting-customers-with-most-sales>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">@lang('admin::app.reporting.customers.index.customers-with-most-sales')</h3>
    </div>
    
    <div class="card-body">

        <div class="customers-with-most-sales">

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
        filtets.type = 'customers-with-most-sales'

        $.ajax({
            url: "{{ route('admin.reporting.customers.stats') }}",
            data: filtets,
            async: true,
            dataType: 'json',
            type: "get",
        }).done(function (data) {

            $(".customers-with-most-sales").html();

            var statistics = data.statistics;

            var html = "";

            statistics.forEach(function(currentValue, index, arr){
                console.log(currentValue, index, arr);

                progress = currentValue.progress;

                if(progress > 100) progress = 100;

                html += '<p><code>'+ currentValue.full_name + "(" +  currentValue.formatted_total +' ) </code></p><div class="progress"><div class="progress-bar bg-primary progress-bar-striped purchased" role="progressbar" aria-valuenow="'+ currentValue.count +'" aria-valuemin="0" aria-valuemax="100" style="width: '+ progress +'%"><span class="sr-only">'+ progress +'% Complete (success)</span></div></div>';

            });

            $(".customers-with-most-sales").html(html);
            
            



        })




    });
</script>

{{-- @pushOnce('scripts')
    <script type="text/x-template" id="v-reporting-customers-with-most-sales-template">
        <!-- Shimmer -->
        <template v-if="isLoading">
            <x-admin::shimmer.reporting.customers.most-sales/>
        </template>

        <!-- Customers with Most Sales Section -->
        <template v-else>
            <div class="flex-1 relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                <!-- Header -->
                <div class="flex items-center justify-between mb-[16px]">
                    <p class="text-[16px] text-gray-600 dark:text-white font-semibold">
                        @lang('admin::app.reporting.customers.index.customers-with-most-sales')
                    </p>

                    <a
                        href="{{ route('admin.reporting.customers.view', ['type' => 'customers-with-most-sales']) }}"
                        class="text-[14px] text-blue-600 cursor-pointer transition-all hover:underline"
                    >
                        @lang('admin::app.reporting.customers.index.view-details')
                    </a>
                </div>
                
                <!-- Content -->
                <div class="grid gap-[16px]">
                    <!-- Customers with Most Sales -->
                    <template v-if="report.statistics.length">
                        <!-- Customers -->
                        <div class="grid gap-[27px]">
                            <div
                                class="grid"
                                v-for="customer in report.statistics"
                            >
                                <p class="dark:text-white">@{{ customer.full_name }}</p>

                                <div class="flex gap-[20px] items-center">
                                    <div class="w-full h-[8px] relative bg-slate-100">
                                        <div
                                            class="h-[8px] absolute left-0 bg-emerald-500"
                                            :style="{ 'width': customer.progress + '%' }"
                                        ></div>
                                    </div>

                                    <p class="text-[14px] text-gray-600 dark:text-gray-300 font-semibold">
                                        @{{ customer.formatted_total }}
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
        app.component('v-reporting-customers-with-most-sales', {
            template: '#v-reporting-customers-with-most-sales-template',

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

                    filtets.type = 'customers-with-most-sales';

                    this.$axios.get("{{ route('admin.reporting.customers.stats') }}", {
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