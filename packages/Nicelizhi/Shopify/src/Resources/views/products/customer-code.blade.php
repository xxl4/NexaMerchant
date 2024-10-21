<x-admin::layouts>
    <x-slot:title>
        @lang('Shopify::app.admin.edit.title')
    </x-slot:title>

    <div class="card-body">
        <form class="form" method="POST" action="{{route('admin.shopify.products.checkout-customer-code', $product_id)}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <?php foreach($checkoutItems as $key=>$checkoutItem) { ?>
            <div class="form-group">
                <label for="<?php echo $key;?>"><?php echo $key;?></label>
                <textarea id="<?php echo $key;?>" name="checkoutItems[<?php echo $key;?>]" class="form-control" rows="5" placeholder="">{{$checkoutItem}}</textarea>
            </div>
        <?php } ?>
        <div class="card-footer">
            <button type="button" id="save" class="btn btn-primary">Save</button>
        </div>
        </form>



                 <!-- jQuery -->
   <script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
   <script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
  
      <!-- 引入 CodeMirror CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/material.min.css" rel="stylesheet">
  <!-- 引入 CodeMirror JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/edit/closetag.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/edit/matchbrackets.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/show-hint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/hint/html-hint.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/display/autorefresh.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/search/search.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/search/searchcursor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/search/jump-to-line.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/dialog/dialog.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/addon/dialog/dialog.min.css" rel="stylesheet">

    <style>
        .CodeMirror {
            height: auto;
        }
    </style>  

    <script>
    $(function () {

        <?php foreach($checkoutItems as $key=>$checkoutItem) { ?>
            var editor<?php echo $key;?> = CodeMirror.fromTextArea(document.getElementById('<?php echo $key;?>'), {
                mode: "application/json",
                theme: "material",
                indentUnit : 2, // 缩进单位为2
                smartIndent : true, 
                lint: true,
                gutters:["CodeMirror-linenumbers", "CodeMirror-foldgutter","CodeMirror-lint-markers"],
                lineNumbers: true,
                autoCloseTags: true,
                matchBrackets: true,
                historyEventDelay: 1000,
                matchBrackets:true,
                extraKeys: {
                    "Ctrl-Space": "autocomplete",
                    "Ctrl-F": "findPersistent", // 绑定 Ctrl-F 快捷键到搜索功能
                    "Ctrl-G": "findNext", // 绑定 Ctrl-G 快捷键到查找下一个
                    "Shift-Ctrl-G": "findPrev", // 绑定 Shift-Ctrl-G 快捷键到查找上一个
                    "Ctrl-H": "replace", // 绑定 Ctrl-H 快捷键到替换
                    "Shift-Ctrl-F": "replaceAll" // 绑定 Shift-Ctrl-F 快捷键到全部替换
                },
                autoRefresh: true,
                showHint: true,
            });
        <?php } ?>

        $('#save').click(function(){
            var checkoutItems = {};
            <?php foreach($checkoutItems as $key=>$checkoutItem) { ?>
                checkoutItems['<?php echo $key;?>'] = editor<?php echo $key;?>.getValue();
                console.log(editor<?php echo $key;?>.getValue());
            <?php } ?>
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
                },
                error: function(data){
                    alert('Save error');
                }
            });
        });


    });
    </script>


</x-admin::layouts>