<x-admin::layouts>
    <x-slot:title>
        @lang('lp::app.admin.edit.title')
    </x-slot:title>


    <div class="card-body">
        <form class="form" method="POST" action="{{route('admin.lp.update', $page->id)}}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Lp Name" name="name" value="<?php echo $page->name;?>">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" placeholder="Lp Slug" name="slug" value="<?php echo $page->slug;?>">
        </div>
        <div class="form-group">
            <label for="slug">Goto url</label>
            <input type="text" class="form-control" id="goto_url" placeholder="Lp Goto url" name="goto_url" value="<?php echo $page->goto_url;?>">
        </div>
        <div class="form-group">
            <label for="slug">Type</label>
            <input type="text" class="form-control" id="type" placeholder="Lp Type" name="type" value="<?php echo $page->type;?>">
        </div>
        <div class="form-group">
            <label for="html">Html</label>
            <textarea id="html" name="html" class="form-control" rows="60" >
                <?php echo $page->html;?>
            </textarea>
        </div>

        
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>


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

<script src="/themes/manage/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  
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
      // Summernote
      <?php if($page->type=='customize') { ?>
        $('#html').summernote({
            "height": 500,
            "focus": true,
            "toolbar": [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]

        });
      <?php }else { ?>



      var editor = CodeMirror.fromTextArea(document.getElementById("html"), {
                mode: "htmlmixed",
                theme: "material",
                lineNumbers: true,
                autoCloseTags: true,
                matchBrackets: true,
                historyEventDelay: 1000,
                extraKeys: {
                    "Ctrl-Space": "autocomplete",
                    "Ctrl-F": "findPersistent", // 绑定 Ctrl-F 快捷键到搜索功能
                    "Ctrl-G": "findNext", // 绑定 Ctrl-G 快捷键到查找下一个
                    "Shift-Ctrl-G": "findPrev", // 绑定 Shift-Ctrl-G 快捷键到查找上一个
                    "Ctrl-H": "replace", // 绑定 Ctrl-H 快捷键到替换
                    "Shift-Ctrl-F": "replaceAll" // 绑定 Shift-Ctrl-F 快捷键到全部替换
                },
                autoRefresh: true
                
        });

        // editor.on("change", function() {
        //     editor.setSize(null, 5000);
        // });

        <?php } ?>
  
      
    })
  </script>
</x-admin::layouts>
