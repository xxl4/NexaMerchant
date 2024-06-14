<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.customers.customers.index.title')
    </x-slot:title>

    <!-- DataTables -->
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>@lang('admin::app.customers.customers.index.title')</h1>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="tables" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Gender</th>
                          <th>Date of Birth</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Status</th>
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
              url: "{{ route('admin.customers.customers.index') }}",
              type: 'GET'
            },
            columns: [
              {
                data: 'id'
              },
              {
                data: 'first_name'
              },
              {
                data: 'last_name'
              },{
                data: 'gender'
              }
              ,{
                data: 'date_of_birth'
              },
              {
                data: 'email'
              },{
                data: 'phone'
              },{
                data: 'status'
              }
              ,
              {
                data: 'created_at'
              },{
                data: 'oid',
                render: function(data, type, row, meta) {
                  return '<a href="./orders/view/'+data+'" class="btn btn-primary btn-sm confirmation">View</a> ';
                }
              }
            ],
            lengthMenu: [
                [20, 50, 100],
                [20, 50, 100]
            ],
            order: [[8, 'desc']],
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

