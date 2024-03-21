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


{{--    <div class="content-wrapper" style="min-height: 1302.31px;">--}}


        <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>


                    <table cellpadding="3" cellspacing="0" border="0" style="width: 67%; margin: 0 auto 2em auto;">
                        <thead>
                        <tr>
                            <th>Target</th>
                            <th>Search text</th>
                            <th>Treat as regex</th>
                            <th>Use smart search</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        <tr id="filter_global">--}}
{{--                            <td>Global search</td>--}}
{{--                            <td align="center"><input type="text" class="global_filter" id="global_filter"></td>--}}
{{--                            <td align="center"><input type="checkbox" class="global_filter" id="global_regex"></td>--}}
{{--                            <td align="center"><input type="checkbox" class="global_filter" id="global_smart" checked="checked"></td>--}}
{{--                        </tr>--}}
                        <tr id="filter_col1" data-column="0">
                            <td>id</td>
                            <td align="center"><input type="text" class="column_filter" id="col0_filter"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col0_regex"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col0_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col2" data-column="1">
                            <td>Status</td>
                            <td align="center"><input type="text" class="column_filter" id="col1_filter"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col1_regex"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col1_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col3" data-column="2">
                            <td>Sku</td>
                            <td align="center"><input type="text" class="column_filter" id="col2_filter"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col2_regex"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col2_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col4" data-column="3">
                            <td>Type</td>
                            <td align="center"><input type="text" class="column_filter" id="col3_filter"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col3_regex"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col3_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col5" data-column="4">
                            <td>Name</td>
                            <td align="center"><input type="text" class="column_filter" id="col4_filter"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col4_regex"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col4_smart" checked="checked"></td>
                        </tr>
                        <tr id="filter_col6" data-column="5">
                            <td>Price</td>
                            <td align="center"><input type="text" class="column_filter" id="col5_filter"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col5_regex"></td>
                            <td align="center"><input type="checkbox" class="column_filter" id="col5_smart" checked="checked"></td>
                        </tr>
                        </tbody>
                    </table>


                    <div class="card-body">
                        <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>status</th>
                                <th>sku</th>
                                <th>type</th>
                                <th>name</th>
                                <th>price</th>
                                <th>locale</th>
                            </tr>
                            </thead>

                        </table>

                    </div>

                </div>
            </div>
        </div>
        </div>
        </section>
{{--    </div>--}}






{{--         $(document).ready(function() {--}}


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

    <!--

    <script type="text/javascript">
            var table1 = $('#example').DataTable({
            ajax: 'products',
            columns: [
                { data: 'attribute_family' },
                { data: 'base_image' },
                { data: 'category_id' },
                { data: 'category_name' },
                { data: 'channel' },
                { data: 'images_count' },
                { data: 'locale' },
                { data: 'name' },
                { data: 'price' },
                { data: 'product_id' },
                { data: 'quantity' },
                { data: 'sku' },
                { data: 'status' },
                { data: 'type' },
                { data: 'url_key' },
                { data: 'visible_individually' },
            ],
            "columnDefs": [
                {
                    "targets": 1, // 图片列的索引
                    "render": function(data, type, row, meta) {
                        return '<img src="' + data + '" alt="Image" width="100" height="100">';
                    }
                }
            ],
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
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


        // });
    </script>
-->

</x-admin::layouts>
