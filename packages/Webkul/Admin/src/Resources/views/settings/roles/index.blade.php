<x-admin::layouts>
<<<<<<< HEAD

    {{-- Page Title --}}
    <x-slot:title>
        @lang('admin::app.settings.roles.index.title')
    </x-slot:title>

    <div class="flex justify-between items-center">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('admin::app.settings.roles.index.title')
        </p>
        
        <div class="flex gap-x-[10px] items-center">
            {{-- Add Role Button --}}
=======
    <!-- Page Title -->
    <x-slot:title>
        @lang('admin::app.settings.roles.index.title')
    </x-slot>

    <div class="flex justify-between items-center">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            @lang('admin::app.settings.roles.index.title')
        </p>
        
        <div class="flex gap-x-2.5 items-center">
            <!-- Add Role Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            @if (bouncer()->hasPermission('settings.roles.create')) 
                <a 
                    href="{{ route('admin.settings.roles.create') }}"
                    class="primary-button"
                >
                    @lang('admin::app.settings.roles.index.create-btn')
                </a>
            @endif
        </div>
    </div>

    {!! view_render_event('bagisto.admin.settings.roles.list.before') !!}
    
    <x-admin::datagrid src="{{ route('admin.settings.roles.index') }}"></x-admin::datagrid>

    {!! view_render_event('bagisto.admin.settings.roles.list.after') !!}

</x-admin::layouts>