<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.notifications.title')
    </x-slot:title>

    {!! view_render_event('bagisto.admin.marketing.notifications.create.before') !!}

    

    {!! view_render_event('bagisto.admin.marketing.notifications.create.after') !!}

        <!-- DataTables -->
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>@lang('admin::app.notifications.title')</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">@lang('admin::app.notifications.title')</li>
                  </ol>
              </div>
          </div>
      </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">@lang('admin::app.notifications.title')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="tables" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Increment ID</th>
                      <th>Status</th>
                      <th>Client</th>
                      <th>order_currency_code</th>
                      <th>grand_total</th>
                      <th>base_grand_total</th>
                      <th>Transaction Id</th>
                      <th>method_title</th>
                      <th>Payment Method</th>
                      <th>shipping_method</th>
                      <th>track_number</th>
                      <th>created_at</th>
                      <th>Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

    <!-- jQuery -->
    <script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="/themes/manage/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/themes/manage/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</x-admin::layouts>