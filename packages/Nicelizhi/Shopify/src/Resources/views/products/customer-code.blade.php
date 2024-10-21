<x-admin::layouts>
    <x-slot:title>
        @lang('Shopify::app.admin.edit.title')
    </x-slot:title>

    <div class="card-body">
        <form class="form" method="POST" action="{{route('admin.shopify.products.checkout-customer-code', $product_id)}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <?php foreach($checkoutItems as $key=>$checkoutItem) { 
            
            $checkoutItem = json_decode($checkoutItem, true);

            //var_dump($checkoutItem);
        ?> 
        <h1><?php echo $key;?></h1>
        <?php   
            foreach($checkoutItem as $kk=>$value) {
        ?>
            <div class="form-group">
                <label for="<?php echo $kk;?>"><?php echo $kk;?>:</label>
                <input class="form-control" id="<?php echo $kk;?>" name="checkoutItems[<?php echo $key;?>][<?php echo $kk;?>]" value="<?php echo $value;?>" />
          <?php } ?>  
          <hr />
        <?php   } ?>


        <div class="card-footer">
            <button type="button" id="save" class="btn btn-primary">Save</button>
        </div>


        </form>



                 <!-- jQuery -->
   <script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
   <script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
  




    <script>
    $(function () {

        

        $('#save').click(function(){
            var checkoutItems = {};
            $('input[name^="checkoutItems"]').each(function(){
                var name = $(this).attr('name');
                var value = $(this).val();
                checkoutItems[name] = value;
            });
            $.ajax({
                url: "{{route('admin.shopify.products.checkout-customer-code', $product_id)}}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    checkoutItems: checkoutItems
                },
                success: function(data){
                    console.log(data);
                    alert(data.message);
                    window.location.reload();
                },
                error: function(data){
                    alert('Save error');
                }
            });
        });


    });
    </script>


</x-admin::layouts>