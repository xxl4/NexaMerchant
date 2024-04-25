{{-- Total Customer Vue Component --}}
<v-reporting-customers-total-traffic>
    {{-- Shimmer --}}
    <x-admin::shimmer.reporting.customers.total-traffic/> 
</v-reporting-customers-total-traffic>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">@lang('admin::app.reporting.customers.index.total-customers')</h3>
        <div class="card-tools">
            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button> --}}
        </div>
    </div>
    <div class="card-body">
    <div class="chart">
        <canvas id="customers-traffic" style="min-height: 550px; height: 550px; max-height: 550px; max-width: 100%;"></canvas>
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
        var areaChartCanvas = $('#customers-traffic').get(0).getContext('2d')

        var areaChartData = {}

        var areaChartOptions = {
            aspectRatio: 3.17,
            plugins: {
                legend: {
                    display: false
                },

                {{-- tooltip: {
                    enabled: false,
                } --}}
            },
            
            scales: {
                x: {
                    beginAtZero: true,

                    border: {
                        dash: [8, 4],
                    }
                },

                y: {
                    beginAtZero: true,
                    border: {
                        dash: [8, 4],
                    }
                }
            }
        }


        url = window.location.search;
     const searchParams = new URLSearchParams(url);
     var filtets = Object.assign({}, filtets);
     filtets.start = searchParams.get('start_date');
     filtets.end = searchParams.get('end_date');
     filtets.type = 'customers-traffic'

     $.ajax({
        url: "{{ route('admin.reporting.customers.stats') }}",
        data: filtets,
        async: true,
        dataType: 'json',
        type: "get",
    }).done(function (data) {

        console.log(data);
        
        labels = [];
        current = [];
        previous = [];

        data.statistics.over_time.current.label.map((label) => {
            //console.log(label);
            labels.push(label);
            //current.push(label.total);
        });

        data.statistics.over_time.current.total.map((total) => {
            //console.log(label);
            //labels.push(label.label);
            current.push(total);
        });

        data.statistics.over_time.previous.total.map((total) => {
            //console.log(label);
            //labels.push(label.label);
            previous.push(total);
        });

        areaChartData = {
            labels  : labels,
            datasets: [
            {
                pointStyle: false,
                backgroundColor: '#34D399',
                fill: true,
                data: current,
                label: data.date_range.current
                //label: labels
            },{
                pointStyle: false,
                backgroundColor: '#0E9CFF',
                fill: true,
                data: previous,
                label: data.date_range.previous
               // label: labels
            },
            ]
        }

        //console.log(areaChartData);

        new Chart(areaChartCanvas, {
            type: 'bar',
            data: areaChartData,
            options: areaChartOptions
        })

    });

    });
</script>


{{-- @pushOnce('scripts')
    <script type="text/x-template" id="v-reporting-customers-total-traffic-template">
        <!-- Shimmer -->
        <template v-if="isLoading">
            <x-admin::shimmer.reporting.customers.total-traffic/> 
        </template>

        <!-- Total Customer Section -->
        <template v-else>
            <div class="flex-1 relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                <!-- Header -->
                <div class="flex items-center justify-between mb-[16px]">
                    <p class="text-[16px] text-gray-600 dark:text-white font-semibold">
                        @lang('admin::app.reporting.customers.index.customers-traffic')
                    </p>
                </div>
                
                <!-- Content -->
                <div class="grid gap-[16px]">
                    <div class="flex gap-[16px] justify-between">
                        <!-- Total Visitors -->
                        <div class="grid gap-[4px]">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                @{{ report.statistics.total.current }}
                            </p>

                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
                                @lang('admin::app.reporting.customers.index.total-visitors')
                            </p>
                            
                            <div class="flex gap-[2px] items-center">
                                <span
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.total.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>

                                <p
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.total.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    @{{ report.statistics.total.progress.toFixed(2) }}%
                                </p>
                            </div>
                        </div>

                        <!-- Unique Visitors -->
                        <div class="grid gap-[4px]">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                                @{{ report.statistics.unique.current }}
                            </p>

                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
                                @lang('admin::app.reporting.customers.index.unique-visitors')
                            </p>
                            
                            <div class="flex gap-[2px] items-center">
                                <span
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.unique.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                                ></span>

                                <p
                                    class="text-[16px] text-emerald-500"
                                    :class="[report.statistics.unique.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                                >
                                    @{{ report.statistics.unique.progress.toFixed(2) }}%
                                </p>
                            </div>
                        </div>
                    </div>

                    <p class="text-[16px] text-gray-600 dark:text-gray-300 font-semibold">
                        @lang('admin::app.reporting.customers.index.traffic-over-week')
                    </p>

                    <!-- Bar Chart -->
                    <x-admin::charts.bar
                        ::labels="chartLabels"
                        ::datasets="chartDatasets"
                    />

                    <!-- Date Range -->
                    <div class="flex gap-[20px] justify-center">
                        <div class="flex gap-[4px] items-center">
                            <span class="w-[14px] h-[14px] rounded-[3px] bg-emerald-400"></span>

                            <p class="text-[12px] dark:text-gray-300">
                                @{{ report.date_range.previous }}
                            </p>
                        </div>

                        <div class="flex gap-[4px] items-center">
                            <span class="w-[14px] h-[14px] rounded-[3px] bg-sky-400"></span>

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
        app.component('v-reporting-customers-total-traffic', {
            template: '#v-reporting-customers-total-traffic-template',

            data() {
                return {
                    report: [],

                    isLoading: true,
                }
            },

            computed: {
                chartLabels() {
                    return this.report.statistics.over_time.previous['label'];
                },

                chartDatasets() {
                    return [{
                        data: this.report.statistics.over_time.previous['total'],
                        pointStyle: false,
                        backgroundColor: '#34D399',
                        fill: true,
                    }, {
                        data: this.report.statistics.over_time.current['total'],
                        pointStyle: false,
                        backgroundColor: '#0E9CFF',
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

                    filtets.type = 'customers-traffic';

                    this.$axios.get("{{ route('admin.reporting.customers.stats') }}", {
                            params: filtets
                        })
                        .then(response => {
                            this.report = response.data;

                            this.isLoading = false;
                        })
                        .catch(error => {});
                },
            }
        });
    </script>
@endPushOnce --}}