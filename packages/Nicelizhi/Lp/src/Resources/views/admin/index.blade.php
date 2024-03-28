<x-admin::layouts>
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('lp::app.admin.index.title')
    </x-slot:title>

 

    {!! view_render_event('bagisto.admin.lp.pages.list.before') !!}

   
    
    {!! view_render_event('bagisto.admin.lp.pages.list.after') !!}

</x-admin::layouts>
