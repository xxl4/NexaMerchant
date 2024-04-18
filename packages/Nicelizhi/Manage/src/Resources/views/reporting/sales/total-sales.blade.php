{{-- Total Sales Stats Vue Component --}}
<v-reporting-sales-total-sales>
    <!-- Shimmer -->
    <x-admin::shimmer.reporting.sales.total-sales/>
</v-reporting-sales-total-sales>
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">@lang('admin::app.reporting.sales.index.total-sales')</h3>
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
        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {}
  
      
  
      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : false,
            }
          }]
        }
      }

     // {{ route('admin.reporting.sales.stats') }}
     var filtets = Object.assign({}, filtets);
     filtets.type = 'total-sales'

     $.ajax({
        url: "{{ route('admin.reporting.sales.stats') }}",
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
                data                : current
            },{
                lineTension: 0.2,
                pointStyle: false,
                borderWidth: 2,
                borderColor: '#34D399',
                backgroundColor: 'rgba(52, 211, 153, 0.3)',
                fill: true,
            data                : previous
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