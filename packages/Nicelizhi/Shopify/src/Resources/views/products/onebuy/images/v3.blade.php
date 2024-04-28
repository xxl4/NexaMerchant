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
                                        <label for="pc_banner">Pc Banner</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="pc_banner" id="pc_banner" accept="image/*">
                                                <label class="custom-file-label" for="pc_banner">Choose file</label>
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
                                        <label for="mobile_bg">Mobile Banner</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="mobile_bg" id="mobile_bg" accept="image/*">
                                                <label class="custom-file-label" for="mobile_bg">Choose file</label>
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
                                        <label for="product_1">Product 1</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="product_1" id="product_1" accept="image/*">
                                                <label class="custom-file-label" for="product_1">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="images">
                                            <?php 
                                            //var_dump($product_image_lists);    
                                            if(isset($product_image_lists[0]['key'])) {
                                                echo "<img src='".asset("storage/".$product_image_lists[0]['value'])."' width='100' height='100' />";
                                            } 

                                            ?>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label for="product_2">Product 2</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="product_2" id="product_2" accept="image/*">
                                                <label class="custom-file-label" for="product_2">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="images">
                                            <?php 
                                                
                                                if(isset($product_image_lists[1]['key'])) {
                                                echo "<img src='".asset("storage/".$product_image_lists[1]['value'])."' width='100' height='100' />";
                                            } 

                                            ?>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label for="product_3">Product 3</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="product_3" id="product_3" accept="image/*">
                                                <label class="custom-file-label" for="product_3">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="images">
                                            <?php 
                                                
                                                if(isset($product_image_lists[2]['key'])) {
                                                echo "<img src='".asset("storage/".$product_image_lists[2]['value'])."' width='100' height='100' />";
                                            } 

                                            ?>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label for="product_4">Product 4</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="product_4" id="product_4" accept="image/*">
                                                <label class="custom-file-label" for="product_4">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="images">
                                            <?php 
                                                if(isset($product_image_lists[3]['key'])) {
                                                echo "<img src='".asset("storage/".$product_image_lists[3]['value'])."' width='100' height='100' />";
                                            } 
                                                    

                                            ?>
                                        </div>
                                    </div> 
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="hidden" name="version" value="<?php echo $version; ?>">
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