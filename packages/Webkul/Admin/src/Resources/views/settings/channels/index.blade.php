<x-admin::layouts>

<<<<<<< HEAD
    {{-- Page Title --}}
    <x-slot:title>
        @lang('admin::app.settings.channels.index.title')
    </x-slot:title>

    <div class="flex justify-between items-center">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('admin::app.settings.channels.index.title')
        </p>
        
        <div class="flex gap-x-[10px] items-center">
            {{-- Create New Channel Button --}}
=======
    <!-- Page Title -->
    <x-slot:title>
        @lang('admin::app.settings.channels.index.title')
    </x-slot>

    <div class="flex justify-between items-center">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            @lang('admin::app.settings.channels.index.title')
        </p>
        
        <div class="flex gap-x-2.5 items-center">
            <!-- Create New Channel Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            @if (bouncer()->hasPermission('settings.channels.create'))
                <a 
                    href="{{ route('admin.settings.channels.create') }}"
                    class="primary-button"
                >
                    @lang('admin::app.settings.channels.index.create-btn')
                </a>
            @endif
        </div>
    </div>

    {!! view_render_event('bagisto.settings.channels.list.before') !!}
    
    <x-admin::datagrid src="{{ route('admin.settings.channels.index') }}"></x-admin::datagrid>

    {!! view_render_event('bagisto.settings.channels.list.after') !!}

</x-admin::layouts>