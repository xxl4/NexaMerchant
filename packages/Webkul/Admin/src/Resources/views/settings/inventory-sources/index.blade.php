<x-admin::layouts>
<<<<<<< HEAD
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('admin::app.settings.inventory-sources.index.title')
    </x-slot:title>

    <div class="flex gap-[16px] justify-between items-center max-sm:flex-wrap">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('admin::app.settings.inventory-sources.index.title')
        </p>

        {{-- Create Button --}}
=======
    <!-- Title of the page -->
    <x-slot:title>
        @lang('admin::app.settings.inventory-sources.index.title')
    </x-slot>

    <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            @lang('admin::app.settings.inventory-sources.index.title')
        </p>

        <!-- Create Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        @if (bouncer()->hasPermission('settings.inventory_sources.create'))
            <a href="{{ route('admin.settings.inventory_sources.create') }}">
                <div class="primary-button">
                    @lang('admin::app.settings.inventory-sources.index.create-btn')
                </div>
            </a>
        @endif
    </div>

    {!! view_render_event('bagisto.admin.settings.inventory_sources.list.before') !!}

    <x-admin::datagrid :src="route('admin.settings.inventory_sources.index')"></x-admin::datagrid>

    {!! view_render_event('bagisto.admin.settings.inventory_sources.list.after') !!}

</x-admin::layouts>