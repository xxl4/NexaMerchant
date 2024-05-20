<x-admin::layouts>
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('lp::app.admin.index.title')
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
                      <h3 class="card-title">@lang('lp::app.admin.index.title')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="tables" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Title</th>
                          <th>Slug</th>
                          <th>Status</th>
                          <th>goto_url</th>
                          <th>Type</th>
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
          url: "{{ route('admin.lp.index') }}",
          type: 'GET'
        },
        columns: [
          {
            data: 'name'
          },
          {
            data: 'slug',
            render: function (data, type, row) {
              return `<a href="` + data + `" target="_blank">` + data + `</a>`;
            }
          },
          {
            data: 'status'
          },
          {
            data: 'goto_url'
          },
          {
            data: 'type'
          },
          {
            data: 'updated_at'
          },
          {
            data: "id",
            render: function(data, type, row, meta) {
              return '<a href="./lp/edit/'+data+'" class="btn btn-primary btn-sm">View</a> <a href="./lp/copy/'+data+'" class="btn btn-primary btn-sm">Copy</a>';
            }
          }
        ],
        lengthMenu: [
            [20, 50, 100],
            [20, 50, 100]
        ],
        order: [[4, 'desc']],
        processing: true,
        serverSide: true,
        
        






      });
    
    });
  </script>

</x-admin::layouts>
