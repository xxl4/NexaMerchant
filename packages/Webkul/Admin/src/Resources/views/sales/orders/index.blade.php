<x-admin::layouts>
<<<<<<< HEAD
    <x-slot:title>
        @lang('admin::app.sales.orders.index.title')
    </x-slot:title>

    <div class="flex  gap-[16px] justify-between items-center max-sm:flex-wrap">
        <p class="py-[11px] text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('admin::app.sales.orders.index.title')
        </p>

        <div class="flex gap-x-[10px] items-center">
=======
    <!-- Page Title -->
    <x-slot:title>
        @lang('admin::app.sales.orders.index.title')
    </x-slot>

    <div class="flex  gap-4 justify-between items-center max-sm:flex-wrap">
        <p class="py-3 text-xl text-gray-800 dark:text-white font-bold">
            @lang('admin::app.sales.orders.index.title')
        </p>

        <div class="flex gap-x-2.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <!-- Export Modal -->
            <x-admin::datagrid.export src="{{ route('admin.sales.orders.index') }}"></x-admin::datagrid.export>
        </div>
    </div>

    <x-admin::datagrid :src="route('admin.sales.orders.index')" :isMultiRow="true">
<<<<<<< HEAD
        {{-- Datagrid Header --}}
        <template #header="{ columns, records, sortPage, selectAllRecords, applied, isLoading}">
             <template v-if="! isLoading">
                <div class="row grid grid-cols-[0.5fr_0.5fr_1fr] grid-rows-1 items-center px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">
                    <div
                        class="flex gap-[10px] items-center select-none"
=======
        <!-- Datagrid Header -->
        <template #header="{ columns, records, sortPage, selectAllRecords, applied, isLoading}">
             <template v-if="! isLoading">
                <div class="row grid grid-cols-[0.5fr_0.5fr_1fr] grid-rows-1 items-center px-4 py-2.5 border-b dark:border-gray-800">
                    <div
                        class="flex gap-2.5 items-center select-none"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-for="(columnGroup, index) in [['increment_id', 'created_at', 'status'], ['base_grand_total', 'method', 'channel_name'], ['full_name', 'customer_email', 'location', 'image']]"
                    >
                        <p class="text-gray-600 dark:text-gray-300">
                            <span class="[&>*]:after:content-['_/_']">
                                <template v-for="column in columnGroup">
                                    <span
                                        class="after:content-['/'] last:after:content-['']"
                                        :class="{
                                            'text-gray-800 dark:text-white font-medium': applied.sort.column == column,
                                            'cursor-pointer hover:text-gray-800 dark:hover:text-white': columns.find(columnTemp => columnTemp.index === column)?.sortable,
                                        }"
                                        @click="
                                            columns.find(columnTemp => columnTemp.index === column)?.sortable ? sortPage(columns.find(columnTemp => columnTemp.index === column)): {}
                                        "
                                    >
                                        @{{ columns.find(columnTemp => columnTemp.index === column)?.label }}
                                    </span>
                                </template>
                            </span>

                            <i
<<<<<<< HEAD
                                class="ltr:ml-[5px] rtl:mr-[5px] text-[16px] text-gray-800 dark:text-white align-text-bottom"
=======
                                class="ltr:ml-1.5 rtl:mr-1.5 text-base  text-gray-800 dark:text-white align-text-bottom"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :class="[applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                v-if="columnGroup.includes(applied.sort.column)"
                            ></i>
                        </p>
                    </div>
                </div>
            </template>

<<<<<<< HEAD
            {{-- Datagrid Head Shimmer --}}
=======
            <!-- Datagrid Head Shimmer -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <template v-else>
                <x-admin::shimmer.datagrid.table.head :isMultiRow="true"></x-admin::shimmer.datagrid.table.head>
            </template>
        </template>

        <template #body="{ columns, records, setCurrentSelectionMode, applied, isLoading }">
            <template v-if="! isLoading">
                <div
<<<<<<< HEAD
                    class="row grid grid-cols-4 px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                    v-for="record in records"
                >
                    {{-- Order Id, Created, Status Section --}}
                    <div class="">
                        <div class="flex gap-[10px]">
                            <div class="flex flex-col gap-[6px]">
                                <p
                                    class="text-[16px] text-gray-800 dark:text-white font-semibold"
=======
                    class="row grid grid-cols-4 px-4 py-2.5 border-b dark:border-gray-800 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                    v-for="record in records"
                >
                    <!-- Order Id, Created, Status Section -->
                    <div class="">
                        <div class="flex gap-2.5">
                            <div class="flex flex-col gap-1.5">
                                <p
                                    class="text-base text-gray-800 dark:text-white font-semibold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                    @{{ "@lang('admin::app.sales.orders.index.datagrid.id')".replace(':id', record.increment_id) }}
                                </p>

                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-text="record.created_at"
                                >
                                </p>

                                <p
                                    v-if="record.is_closure"
                                    v-html="record.status"
                                >
                                </p>

                                <p
                                    v-else
                                    v-text="record.status"
                                >
                                </p>
                            </div>
                        </div>
                    </div>

<<<<<<< HEAD
                    {{-- Total Amount, Pay Via, Channel --}}
                    <div class="">
                        <div class="flex flex-col gap-[6px]">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
=======
                    <!-- Total Amount, Pay Via, Channel -->
                    <div class="">
                        <div class="flex flex-col gap-1.5">
                            <p class="text-base text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @{{ $admin.formatPrice(record.base_grand_total) }}
                            </p>

                            <p class="text-gray-600 dark:text-gray-300">
                                @lang('admin::app.sales.orders.index.datagrid.pay-by', ['method' => ''])@{{ record.method }}
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.channel_name"
                            >
                            </p>
                        </div>
                    </div>

<<<<<<< HEAD
                    {{-- Custoemr, Email, Location Section --}}
                    <div class="">
                        <div class="flex flex-col gap-[6px]">
                            <p
                                class="text-[16px] text-gray-800 dark:text-white"
=======
                    <!-- Custoemr, Email, Location Section -->
                    <div class="">
                        <div class="flex flex-col gap-1.5">
                            <p
                                class="text-base  text-gray-800 dark:text-white"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-text="record.full_name"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.customer_email"
                            >
                            </p>

                            <p
                                class="text-gray-600 dark:text-gray-300"
                                v-text="record.location"
                            >
                            </p>
                        </div>
                    </div>

<<<<<<< HEAD
                    {{-- Imgaes Section --}}
                    <div class="flex gap-x-[16px] justify-between items-center">
                        <div class="flex flex-col gap-[6px]">
=======
                    <!-- Imgaes Section -->
                    <div class="flex gap-x-2 justify-between items-center">
                        <div class="flex flex-col gap-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <p
                                v-if="record.is_closure"
                                class="text-gray-600 dark:text-gray-300"
                                v-html="record.image"
                            >
                            </p>

                            <p
                                v-else
                                class="text-gray-600 dark:text-gray-300"
                                v-html="record.image"
                            >
                            </p>

                        </div>

                        <a :href=`{{ route('admin.sales.orders.view', '') }}/${record.id}`>
<<<<<<< HEAD
                            <span class="icon-sort-right text-[24px] ltr:ml-[4px] rtl:mr-[4px] p-[6px] cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800 hover:rounded-[6px]"></span>
=======
                            <span class="icon-sort-right text-2xl ltr:ml-1 rtl:mr-1 p-1.5 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800 hover:rounded-md"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </a>
                    </div>
                </div>
            </template>

<<<<<<< HEAD
            {{-- Datagrid Body Shimmer --}}
=======
            <!-- Datagrid Body Shimmer -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <template v-else>
                <x-admin::shimmer.datagrid.table.body :isMultiRow="true"></x-admin::shimmer.datagrid.table.body>
            </template>
        </template>
    </x-admin::datagrid>
</x-admin::layouts>
