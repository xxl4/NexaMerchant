<x-admin::layouts>
    <x-slot:title>
      @lang('admin::app.sales.orders.index.title')
    </x-slot:title>

    <!-- DataTables -->
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <section class="content-header">
      <div class="container-fluid">
          <div class="mb-2 row">
              <div class="col-sm-6">
                  <h1> @lang('admin::app.sales.orders.index.title')</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">@lang('admin::app.sales.orders.index.title')</li>
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
                      <h3 class="card-title"> @lang('admin::app.sales.orders.index.title')</h3>
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

    <script>
        $(function () {   
          $("#tables").DataTable({
            autoWidth: true,
            keys: true,
            ajax: {
              url: "{{ route('admin.sales.orders.index') }}",
              type: 'GET'
            },
            columns: [
              {
                data: 'id'
              },
              {
                data: 'increment_id'
              },
              {
                data: 'status'
              },
              {
                data: 'customer_email',
                render: function(data, type, row, meta) {
                  return "<p>" + data + "</p>" + row['customer_first_name'] + ' ' +  row['customer_last_name'];
                }
              },{
                data: 'order_currency_code'
              }
              ,{
                data: 'grand_total'
              },
              {
                data: 'base_grand_total'
              },{
                data: 'captures_id',
                render: function(data, type, row, meta) {
                  if(row['method']=='airwallex') return row['transaction_id'];
                  return data;
                }
              },{
                data: 'method_title'
              }
              ,
              {
                data: 'method'
              },{
                data: 'shipping_method'
              },
              {
                data: 'track_number'
              },
              {
                data: 'created_at'
              },{
                data: 'oid',
                render: function(data, type, row, meta) {
                  return '<a href="./orders/view/'+data+'" class="btn btn-primary btn-sm confirmation">View</a><a href="./orders/confirm-payment/'+data+'" class="btn btn-danger btn-sm" title="Confirm Payment">Confim</a> ';
                }
              }
            ],
            lengthMenu: [
                [20, 50, 100],
                [20, 50, 100]
            ],
            order: [[0, 'desc']],
            processing: true,
            serverSide: true,
          });

          $('.dataTables_filter input[type="search"]').css(
            {'width':'450px','display':'inline-block'}
          );

          $('.confirmation').on('click', function () {
            return confirm('Are you sure?');
        });
          
        
        });
      </script>

</x-admin::layouts>

