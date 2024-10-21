<x-admin::layouts>

    {{-- Page Title --}}
    <x-slot:title>
        Shopify Home
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
                      <h3 class="card-title">Shopify Home</h3>
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
                          <th>Clean Cache</th>
                          <th>V1</th>
                          <th>V2</th>
                          <th>V3</th>
                          <th>V4</th>
                          <th>V5</th>
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
          },
          {
            data: 'product_id',
            render: function(data, type, row, meta) {
              return '<a href="./products/clean-cache/'+data+'" class="btn btn-danger btn-sm" target="_blank">Clean Cache</a>';
            }
          },
          {
            data: 'product_id',
            render: function(data, type, row, meta) {
              return '<a href="./products/checkout-url-get/'+data+'/onebuy" target="_blank" class="btn btn-primary btn-sm">V1</a>';
            }
          }
          ,{
            data: 'product_id',
            render: function(data, type, row, meta) {
              return '<a href="/checkout/v2/'+ data +'" target="_blank" class="btn btn-primary btn-sm">V2</a>';
            }
          }
          ,{
            data: 'product_id',
            render: function(data, type, row, meta) {
              return '<a href="/checkout/v3/'+data+'" target="_blank" class="btn btn-primary btn-sm">V3</a>';
            }
          }
          ,{
            data: 'product_id',
            render: function(data, type, row, meta) {
              return '<a href="/checkout/v4/'+data+'" target="_blank" class="btn btn-primary btn-sm">V4</a>';
            }
          },
          {
            data: 'product_id',
            render: function(data, type, row, meta) {
              return '<a href="https://shop-v5.hatmeo.com/checkout/dollar/'+data+'" target="_blank" class="btn btn-sm">USA V5 USD</a><a href="https://shop-v5.hatmeo.com/checkout/adollar/'+data+'" target="_blank" class="btn btn-sm">USA V5 AUD</a><a href="https://offer-v5.hatme.de/checkout/euro/'+data+'" target="_blank" class="btn btn-sm">DE V5</a><a href="https://offer-v5.botma.fr/checkout/euro/'+data+'" target="_blank" class="btn btn-sm">FR V5</a><a href="https://shop-v5.yooje.uk/checkout/pound/'+data+'" target="_blank" class="btn btn-sm">UK V5</a><a href="https://shop-v5.wmcer.com/checkout/euro/'+data+'" target="_blank" class="btn btn-sm">ES V5</a>';
            }
          }
          ,
          {
            data: 'updated_at'
          },
          {
            data: "product_id",
            render: function(data, type, row, meta) {
              return '<a href="./products/sync/'+data+'" title="product sync"><i class="fas fa-sync"></i></a> <a href="./products/images/'+data+'/onebuy" title="product images"><i class="fas fa-images"></i></a> <a href="./products/comments/'+data+'/onebuy?locale={{ app()->getLocale() }}" title="product comments"><i class="fas fa-comments"></i></a> <a href="./products/info/'+data+'/onebuy?locale={{ app()->getLocale() }}" title="product info"><i class="fas fa-info-circle"></i> </a> <a href="./products/sell-points/'+data+'/onebuy?locale={{ app()->getLocale() }}" title="sell points"> <i class="fa fa-building"></i> </a> <a href="./products/checkout-customer-code/'+data+'?locale={{ app()->getLocale() }}" title="Customize"> <i class="fa fa-code"></i> </a> ';
            }
          }
        ],
        lengthMenu: [
            [20, 50, 100],
            [20, 50, 100]
        ],
        order: [[10, 'desc']],
        processing: true,
        serverSide: true,
        
        






      });
    
    });
  </script>
    
</x-admin::layouts>