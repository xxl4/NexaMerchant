<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.reporting.customers.index.title')
    </x-slot:title>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
            </div>
            <div class="col-md-5">
                <div class="card-body">
                    <form action="{{ route('admin.reporting.sales.index') }}" class="form-inline" method="GET">
                    <div class="form-group">
                        <div class="input-group date" id="start_date" data-target-input="nearest">
                            <input type="date" class="form-control datetimepicker-input" name="start_date" data-target="#start_date" placeholder="Start Date" />
                            <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group date" id="end_date" data-target-input="nearest">
                            <input type="date" class="form-control datetimepicker-input" name="end_date" data-target="#end_date" placeholder="End Date" />
                            <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">

        <div class="col-md-12">

            @include('admin::reporting.customers.total-customers')
        </div>
        <div class="col-md-6">
            @include('admin::reporting.customers.most-sales')
        </div>
        <div class="col-md-6">
            @include('admin::reporting.customers.most-orders')
        </div>
        <div class="col-md-12">
            @include('admin::reporting.customers.total-traffic')
        </div>

        {{-- <div class="col-md-6">
            @include('admin::reporting.customers.top-customer-groups')
        </div>
        <div class="col-md-6">
            @include('admin::reporting.customers.most-reviews')
        </div> --}}
        


        </div>
        </div>
    </section>


          <!-- jQuery -->
<script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/themes/manage/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Select2 -->
<script src="/themes/manage/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="/themes/manage/AdminLTE/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="/themes/manage/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/themes/manage/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script>
    $(function () {

        url = window.location.search;
        const searchParams = new URLSearchParams(url);
        var filtets = Object.assign({}, filtets);
        filtets.start = searchParams.get('start_date');
        filtets.end = searchParams.get('end_date');

        if(filtets.end==null) {
            filtets.end = "{{ $endDate }}";
        }

        if(filtets.start==null) {
            filtets.start = "{{ $startDate }}";
        }


        

        //Date picker
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD',
            defaultDate: filtets.start,
           // value: '{{ $startDate }}'
        });
        //$('#start_date').datetimepicker("setDate", "{{ $startDate }}");
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD',
            defaultDate: filtets.end,
            //value: '{{ $endDate }}'
        });
    });
</script>

</x-admin::layouts>
