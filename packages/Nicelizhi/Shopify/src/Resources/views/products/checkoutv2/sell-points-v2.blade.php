<x-admin::layouts>


    {{-- Page Title --}}
    <x-slot:title>
        
    </x-slot:title>

     <!-- DataTables -->
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            
            
            <div class="card card-default">
                <form action="{{ route('admin.shopify.products.sell-points', ['product_id' => $product_id, 'act_type' => $act_type]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Pc Images</h3>
                    </div>
                    <div class="card-body">
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                
                                    <?php foreach($sell_points as $key=>$sell_point) { ?>
                                    <div class="form-group">
                                        <label for="pc_banner">Sell Point <?php echo $key;?>  </label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="input form-control" name="sell_points[<?php echo $key;?>]" value="<?php echo $sell_point;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>



                                
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>

   

          


        </div>
      </div>
    </div>
  </section>




        <!-- jQuery -->
<script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<script>

    $(function () {
        
        //const dropzone = new Dropzone("span.fileinput-button", { url: "/file/post" });
    });
</script>

</x-admin::layouts>