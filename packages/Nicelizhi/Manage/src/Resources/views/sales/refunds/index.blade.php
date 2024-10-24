<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.sales.refunds.index.title')
    </x-slot:title>

     <!-- DataTables -->
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">@lang('admin::app.sales.refunds.index.title')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="tables" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Order  ID</th>
                          <th>state</th>
                          <th>grand_total</th>
                          <th>comment</th>
                          <th>is_refund_money</th>
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
          url: "{{ route('admin.sales.refunds.index') }}",
          type: 'GET'
        },
        columns: [
          {
            data: 'id'
          },
          {
            data: 'order_id'
          },
          {
            data: 'state'
          }
          ,{
            data: 'grand_total'
          },
          {
            data: 'comment'
          },{
            data: 'is_refund_money'
          }
          ,
          {
            data: 'created_at'
          },{
            data: 'id',
            render: function(data, type, row, meta) {
              return "";
              //return '<a href="./orders/view/'+data+'" class="btn btn-primary btn-sm">View</a><a href="./orders/confirm-payment/'+data+'" class="btn btn-danger btn-sm" title="Confirm Payment">Confim</a> ';
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
    
    });
  </script>

</x-admin::layouts>
