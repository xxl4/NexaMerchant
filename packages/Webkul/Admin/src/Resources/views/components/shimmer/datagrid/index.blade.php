@props(['isMultiRow' => false])

<div>
    <x-admin::shimmer.datagrid.toolbar/>

<<<<<<< HEAD
    <div class="flex mt-[16px]">
        <div class="w-full">
            <div class="table-responsive grid w-full box-shadow rounded-[4px] bg-white dark:bg-gray-900 overflow-hidden">
=======
    <div class="flex mt-4">
        <div class="w-full">
            <div class="table-responsive grid w-full box-shadow rounded bg-white dark:bg-gray-900 overflow-hidden">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <x-admin::shimmer.datagrid.table.head :isMultiRow="$isMultiRow"></x-admin::shimmer.datagrid.table.head>

                <x-admin::shimmer.datagrid.table.body :isMultiRow="$isMultiRow"></x-admin::shimmer.datagrid.table.body>
            </div>
        </div>
    </div>
</div>
