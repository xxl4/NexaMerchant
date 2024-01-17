<x-admin::layouts>
<<<<<<< HEAD
    <x-slot:title>
        @lang('admin::app.sales.shipments.index.title')
    </x-slot:title>

    <div class="flex  gap-[16px] justify-between items-center max-sm:flex-wrap">
        <p class="py-[11px] text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('admin::app.sales.shipments.index.title')
        </p>

        <div class="flex gap-x-[10px] items-center">
=======
    <!-- Page Title -->
    <x-slot:title>
        @lang('admin::app.sales.shipments.index.title')
    </x-slot>

    <div class="flex  gap-4 justify-between items-center max-sm:flex-wrap">
        <p class="py-3 text-xl text-gray-800 dark:text-white font-bold">
            @lang('admin::app.sales.shipments.index.title')
        </p>

        <div class="flex gap-x-2.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('admin.sales.shipments.index') }}"></x-admin::datagrid.export>
        </div>
    </div>

    <x-admin::datagrid src="{{ route('admin.sales.shipments.index') }}"></x-admin::datagrid>

</x-admin::layouts>
