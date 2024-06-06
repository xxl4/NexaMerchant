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
                <form action="{{ route('admin.shopify.products.comments', ['product_id' => $product_id, 'act_type' => $act_type]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-header">
                    Upload Comments 
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="comments_list_file">Comments List File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="comments_list_file" id="comments_list_file">
                                <label class="custom-file-label" for="comments_list_file">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comments_list_file">Replace</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="checkbox" class="input" name="force" id="force" value="1"> Force
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="version" value="<?php echo $act_prod_type; ?>">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <button type="button" class="btn btn-secondary manual-sync-comment">Manual Sync Comment</button>
                </div>
            </form>
            </div>

            {{-- <h3>Comments List</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($comments as $key => $comment) {
                            $comment = json_decode($comment);
                            echo "<tr>";
                            echo "<td>".$key."</td>";
                            echo "<td>".$comment->name."</td>";
                            echo "<td>".$comment->title."</td>";
                            echo "<td>".$comment->content."</td>";
                            echo "</tr>";
                        }
                    ?>
            </table> --}}
            <h3>From Shopify Comments</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>Rank</th>
                        <th>Images</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($reviews as $key => $comment) {
                            echo "<tr>";
                            echo "<td>".$comment->id."</td>";
                            echo "<td>".$comment->name."</td>";
                            echo "<td>".$comment->title."</td>";
                            echo "<td>".$comment->comment."</td>";
                            echo "<td>".$comment->status."</td>";
                            echo "<td>".$comment->created_at."</td>";
                            echo "<td>".$comment->rating."</td>";
                            

                            echo "<td>";

                                foreach($comment->images as $image) {
                                    echo "<img src='".$image->url."' style='width: 100px; height: 100px;'>";
                                }

                            echo "</td>";

                            echo "<td><buttont class='comment_delte btn' value='".$comment->id."'>Delete</button></td>";
                            
                            echo "</tr>";
                        }
                    ?>

        </div>
      </div>
    </div>
  </section>

  <!-- jQuery -->
<script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('.manual-sync-comment').click(function() {
            var force = 0;
            if($("#force").is(':checked'))
                force = 1;

            console.log("manual-sync-comment");
            $.ajax({
                url: "{{ route('admin.shopify.products.comments.manual', ['product_id' => $product_id, 'act_type' => 'manual_sync']) }}&force="+force,
                type: 'GET',
                success: function(data) {
                    alert('Sync Comment From Shopify, will cost a few minutes, please wait for');
                }
            });
        });

        $('.comment_delte').click(function(){
            var comment_id = $(this).attr("value");
            console.log(comment_id);
            $.ajax({
                url: "{{ route('admin.shopify.products.comments.delete') }}?comment_id="+comment_id,
                type: 'GET',
                success: function(data) {
                    alert(data.message);
                    window.location.reload();
                }
            });
        });
    });
</script>

</x-admin::layouts>