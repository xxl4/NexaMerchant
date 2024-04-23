{{-- Sold Products Quantity Vue Component --}}
<v-reporting-products-total-sold-quantity>
    {{-- Shimmer --}}
    <x-admin::shimmer.reporting.products.sold-quantities/>
</v-reporting-products-total-sold-quantity>


<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">@lang('admin::app.reporting.products.index.total-sold-quantities')</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove">
    <i class="fas fa-times"></i>
    </button>
    </div>
    </div>
    <div class="card-body">
    <div class="chart">
        <canvas id="totalorders" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
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
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */
  
      //--------------
      //- AREA CHART -
      //--------------
  
      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#totalorders').get(0).getContext('2d')

      var areaChartData = {}
  
      
  
      var areaChartOptions = {
      maintainAspectRatio : false,
      aspectRatio: 3.17,
      responsive : true,
      plugins: {
        legend: {
            display: false
        }
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

     // {{ route('admin.reporting.sales.stats') }}
     var filtets = Object.assign({}, filtets);
     filtets.type = 'total-sold-quantities'

     $.ajax({
        url: "{{ route('admin.reporting.products.stats') }}",
        data: filtets,
        async: true,
        dataType: 'json',
        type: "get",
    }).done(function (data) {

        //console.log(data);
        
        labels = [];
        current = [];
        previous = [];

        data.statistics.over_time.current.map((label) => {
            //console.log(label);
            labels.push(label.label);
            current.push(label.total);
        });

        data.statistics.over_time.previous.map((label) => {
            //console.log(label);
            //labels.push(label.label);
            previous.push(label.total);
        });

        areaChartData = {
            labels  : labels,
            datasets: [
            {
                lineTension: 0.2,
                pointStyle: false,
                borderWidth: 2,
                borderColor: '#0E9CFF',
                backgroundColor: 'rgba(14, 156, 255, 0.3)',
                fill: true,
                data: current,
                label: data.date_range.current
            },{
                lineTension: 0.2,
                pointStyle: false,
                borderWidth: 2,
                borderColor: '#34D399',
                backgroundColor: 'rgba(52, 211, 153, 0.3)',
                fill: true,
                data: previous,
                label: data.date_range.previous
            },
            ]
        }

        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })

    });

    console.log(areaChartData);
  
      // This will get the first returned node in the jQuery collection.
      
  
      
    })
  </script>

{{-- @pushOnce('scripts')
    <script type="text/x-template" id="v-reporting-products-total-sold-quantity-template">
        <!-- Shimmer -->
        <template v-if="isLoading">
            <x-admin::shimmer.reporting.products.sold-quantities/>
        </template>

        <!-- Sold Products Quantity Section -->
        <template v-else>
            <div class="flex-1 relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                <!-- Header -->
                <div class="flex items-center justify-between mb-[16px]">
                    <p class="text-[16px] text-gray-600 dark:text-white font-semibold">
                        @lang('admin::app.reporting.products.index.total-sold-quantities')
                    </p>

                    <a
                        href="{{ route('admin.reporting.products.view', ['type' => 'total-sold-quantities']) }}"
                        class="text-[14px] text-blue-600 cursor-pointer transition-all hover:underline"
                    >
                        @lang('admin::app.reporting.products.index.view-details')
                    </a>
                </div>
                
                <!-- Content -->
                <div class="grid gap-[16px]">
                    <div class="flex gap-[16px]">
                        <p class="text-[30px] text-gray-600 dark:text-gray-300 font-bold leading-9">
                            @{{ report.statistics.quantities.current }}
                        </p>
                        
                        <div class="flex gap-[2px] items-center">
                            <span
                                class="text-[16px] text-emerald-500"
                                :class="[report.statistics.quantities.progress < 0 ? 'icon-down-stat text-red-500 dark:!text-red-500' : 'icon-up-stat text-emerald-500 dark:!text-emerald-500']"
                            ></span>

                            <p
                                class="text-[16px] text-emerald-500"
                                :class="[report.statistics.quantities.progress < 0 ?  'text-red-500' : 'text-emerald-500']"
                            >
                                @{{ report.statistics.quantities.progress.toFixed(2) }}%
                            </p>
                        </div>
                    </div>

                    <p class="text-[16px] text-gray-600 dark:text-gray-300 font-semibold">
                        @lang('admin::app.reporting.products.index.quantities-sold-over-time')
                    </p>

                    <!-- Line Chart -->
                    <x-admin::charts.line
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
        app.component('v-reporting-products-total-sold-quantity', {
            template: '#v-reporting-products-total-sold-quantity-template',

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

                    filtets.type = 'total-sold-quantities';

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