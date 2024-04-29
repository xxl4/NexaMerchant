@php
    $currentLocale = core()->getRequestedLocale();

    $selectedOptionIds = [];
@endphp

<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.cms.edit.title')
    </x-slot:title>

    {{ $currentLocale->name }}
    <div class="card-body">

        @foreach (core()->getAllLocales() as $locale)
            <a
                href="?{{ Arr::query(['locale' => $locale->code]) }}"
                class="btn  {{ $locale->code == $currentLocale->code ? 'btn-primary' : ''}}"
            >
                {{ $locale->name }}
            </a>
        @endforeach

        <form class="form" method="POST" action="{{route('admin.cms.update', $page->cms_page_id)}}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">Page Title</label>
            <input type="text" class="form-control" id="page_title" placeholder="Page Title" name="<?php echo $currentLocale->code."[page_title]";?>" value="<?php echo $page->page_title;?>">
        </div>
        <div class="form-group">
            <label for="slug">Url Key</label>
            <input type="text" class="form-control" id="url_key" placeholder="Url Key" name="<?php echo $currentLocale->code."[url_key]";?>" value="<?php echo $page->url_key;?>">
        </div>
        
        <div class="form-group">
            <label for="slug">Locale</label>
            <input type="text" class="form-control" id="locale" placeholder="Locale" name="locale" value="{{ $currentLocale->code }}">
        </div>

        <div class="form-group">
            <label for="html_content">Html</label>
            <textarea id="html_content" name="<?php echo $currentLocale->code."[html_content]";?>" class="form-control" rows="30" >
                <?php echo $page->html_content;?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="channels">Channels</label>
            <ul class="list-group">
            @foreach(core()->getAllChannels() as $channel)
            <li class="list-group-item">
             <input type="checkbox" class="form-check-input" name="channels[]" value="{{ $channel->id }}" <?php if(in_array($channel->id, $selectedOptionIds)){ echo "checked"; } ?> /> {{ core()->getChannelName($channel) }}
            </li>
            @endforeach
            </ul>
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
  

 <script>
    $(function () {
      // Summernote
      $('#html_content').summernote({
        "height": 500
      })
  
      
    })
  </script>
</x-admin::layouts>
