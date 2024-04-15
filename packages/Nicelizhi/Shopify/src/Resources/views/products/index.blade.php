<x-admin::layouts>

    {{-- Page Title --}}
    <x-slot:title>
        @lang('admin::app.settings.channels.index.title')
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
                      <h3 class="card-title">@lang('admin::app.settings.channels.index.title')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="tables" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Product ID</th>
                          <th>Title</th>
                          <th>handle</th>
                          <th>Status</th>
                          <th>Checkout</th>
                          <th>updated at</th>
                          <th>Action</th>
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
          url: "{{ route('admin.shopify.products.index') }}",
          type: 'GET'
        },
        columns: [
          {
            data: 'product_id'
          },
          {
            data: 'title'
          },{
            data: 'handle',
            render: function(data, type, row, meta) {
              return '<a href="<?php echo $shopifyStore->shopify_app_host_name?>'+data+'" target="_blank">'+data+'</a>';
            }
          }
          ,
          {
            data: 'status'
          },{
            data: 'product_id',
            render: function(data, type, row, meta) {
              return '<a href="./products/checkout-url-get/'+data+'" target="_blank" class="btn btn-primary btn-sm">Checkout URl</a>';
            }
          }
          ,
          {
            data: 'updated_at'
          },
          {
            data: "product_id",
            render: function(data, type, row, meta) {
              return '<a href="./products/sync/'+data+'" class="btn btn-primary btn-sm">Sync</a> <a href="./products/images/'+data+'" class="btn btn-primary btn-sm">Images</a> <a href="./products/comments/'+data+'" class="btn btn-primary btn-sm">Comments</a> ';
            }
          }
        ],
        lengthMenu: [
            [20, 50, 100],
            [20, 50, 100]
        ],
        order: [[3, 'desc']],
        processing: true,
        serverSide: true,
        
        






      });
    
    });
  </script>
    
</x-admin::layouts>