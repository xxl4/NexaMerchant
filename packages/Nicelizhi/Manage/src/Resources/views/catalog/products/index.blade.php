<x-admin::layouts>

    <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>

        <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>


                    <div class="card-body">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>产品</th>
                                <th>状态</th>
                                <th>渠道</th>
                                <th>类别</th>
                                <th>厂商</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                        </table>

                    </div>

                </div>
            </div>
        </div>
        </div>
        </section>


        <script>
            $(function () {
            $("#example").DataTable({
                keys: true,
                ajax: {
                    url: "{{ route('admin.catalog.products.index') }}",
                    type: 'GET'
                },
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ],
                order: [[0, 'desc']],
                processing: true,
                serverSide: true,

                "columns": [
                    { "data": "product_id" },
                    { "data": "name" },
                    { "data": "status" },
                    { "data": "channel" },
                    { "data": "type" },
                    { "data": "sku" },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return '<a href="products/edit/' + row.product_id + '" class="btn btn-primary">Edit</a>';
                        }
                    }
                ],


                // "columnDefs": [
                //     {
                //         "targets": 1, // 图片列的索引
                //         "render": function(data, type, row, meta) {
                //             return '<img src="' + data + '" alt="Image" width="50" height="50">';
                //         }
                //     }
                // ],


                // "dom": 'Bfrtip',
                // "buttons": [
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                // ],

            });


                function filterGlobal(table) {
                    let filter = document.querySelector('#global_filter');
                    let regex = document.querySelector('#global_regex');
                    let smart = document.querySelector('#global_smart');

                    table.search(filter.value, regex.checked, smart.checked).draw();
                }

                function filterColumn(table, i) {
                    let filter = document.querySelector('#col' + i + '_filter');
                    let regex = document.querySelector('#col' + i + '_regex');
                    let smart = document.querySelector('#col' + i + '_smart');

                    table.column(i).search(filter.value, regex.checked, smart.checked).draw();
                }

                let table = new DataTable('#example');

                document.querySelectorAll('input.global_filter').forEach((el) => {
                    el.addEventListener(el.type === 'text' ? 'keyup' : 'change', () =>
                        filterGlobal(table)
                    );
                });

                document.querySelectorAll('input.column_filter').forEach((el) => {
                    let tr = el.closest('tr');
                    let columnIndex = tr.getAttribute('data-column');

                    el.addEventListener(el.type === 'text' ? 'keyup' : 'change', () =>
                        filterColumn(table, columnIndex)
                    );
                });

        });




        </script>

</x-admin::layouts>
