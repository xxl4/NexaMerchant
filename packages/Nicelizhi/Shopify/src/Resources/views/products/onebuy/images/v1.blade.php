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
            
            
            <div class="card card-default">
                <form action="{{ route('admin.shopify.products.images', ['product_id' => $product_id, 'act_type' => $act_type]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Pc Images</h3>
                    </div>
                    <div class="card-body">
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                
                                    <div class="form-group">
                                        <label for="exampleInputFile">Pc Banner</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="pc_banner" id="pc_banner" accept="image/*">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="images">
                                            <?php 
                                                
                                                    if(!is_null($productBgAttribute)) {
                                                        echo "<img src='".asset("storage/".$productBgAttribute->text_value)."' width='100' height='100' />";
                                                    }

                                                ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Mobile Banner</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="mobile_bg" id="mobile_bg" accept="image/*">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="images">
                                            <?php 
                                                
                                                    if(!is_null($productBgAttribute_mobile)) {
                                                        echo "<img src='".asset("storage/".$productBgAttribute_mobile->text_value)."' width='100' height='100' />";
                                                    }

                                                ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Size Banner</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="product_size" id="product_size" accept="image/*">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="images">
                                            <?php 
                                                
                                                    if(!is_null($productSizeImage)) {
                                                        echo "<img src='".asset("storage/".$productSizeImage->text_value)."' width='100' height='100' />";
                                                    }

                                                ?>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="hidden" name="version" value="<?php echo $act_prod_type; ?>">
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