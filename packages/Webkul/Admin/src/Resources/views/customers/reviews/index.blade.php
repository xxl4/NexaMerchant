<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.customers.reviews.index.title')
<<<<<<< HEAD
    </x-slot:title>

    <div class="flex  gap-[16px] justify-between items-center max-sm:flex-wrap">
        <p class="py-[11px] text-[20px] text-gray-800 dark:text-white font-bold">
=======
    </x-slot>

    <div class="flex  gap-4 justify-between items-center max-sm:flex-wrap">
        <p class="py-3 text-xl text-gray-800 dark:text-white font-bold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            @lang('admin::app.customers.reviews.index.title')
        </p>
    </div>

    {!! view_render_event('admin.customers.reviews.edit.before') !!}

    <v-review-edit-drawer></v-review-edit-drawer>

    {!! view_render_event('admin.customers.groups.edit.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-review-edit-drawer-template">

            {!! view_render_event('admin.customers.reviews.list.before') !!}

            <x-admin::datagrid
                src="{{ route('admin.customers.customers.review.index') }}"
                :isMultiRow="true"
                ref="review_data"
            >
                @php 
<<<<<<< HEAD
                    $hasPermission = bouncer()->hasPermission('customers.reviews.mass-update') || bouncer()->hasPermission('customers.reviews.mass-delete');
=======
                    $hasPermission = bouncer()->hasPermission('customers.reviews.edit') || bouncer()->hasPermission('customers.reviews.delete');
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @endphp

                <!-- Datagrid Header -->
                <template #header="{ columns, records, sortPage, selectAllRecords, applied, isLoading }">
                    <template v-if="! isLoading">
<<<<<<< HEAD
                        <div class="row grid grid-rows-1 grid-cols-[2fr_1fr_minmax(150px,_4fr)_0.5fr] items-center px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">
                            <div
                                class="flex gap-[10px] items-center"
=======
                        <div class="row grid grid-rows-1 grid-cols-[2fr_1fr_minmax(150px,_4fr)_0.5fr] items-center px-4 py-2.5 border-b dark:border-gray-800">
                            <div
                                class="flex gap-2.5 items-center"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-for="(columnGroup, index) in [['customer_full_name', 'product_name', 'product_review_status'], ['rating', 'created_at', 'product_review_id'], ['title', 'comment']]"
                            >
                                @if ($hasPermission)
                                    <label
<<<<<<< HEAD
                                        class="flex gap-[4px] w-max items-center cursor-pointer select-none"
=======
                                        class="flex gap-1 w-max items-center cursor-pointer select-none"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        for="mass_action_select_all_records"
                                        v-if="! index"
                                    >
                                        <input 
                                            type="checkbox" 
                                            name="mass_action_select_all_records"
                                            id="mass_action_select_all_records"
                                            class="hidden peer"
                                            :checked="['all', 'partial'].includes(applied.massActions.meta.mode)"
                                            @change="selectAllRecords"
                                        >
                            
                                        <span
<<<<<<< HEAD
                                            class="icon-uncheckbox cursor-pointer rounded-[6px] text-[24px]"
=======
                                            class="icon-uncheckbox cursor-pointer rounded-md text-2xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            :class="[
                                                applied.massActions.meta.mode === 'all' ? 'peer-checked:icon-checked peer-checked:text-blue-600' : (
                                                    applied.massActions.meta.mode === 'partial' ? 'peer-checked:icon-checkbox-partial peer-checked:text-blue-600' : ''
                                                ),
                                            ]"
                                        >
                                        </span>
                                    </label>
                                @endif

                                <!-- Product Name, Review Status -->
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

                    <!-- Datagrid Head Shimmer -->
                    <template v-else>
                        <x-admin::shimmer.datagrid.table.head :isMultiRow="true"></x-admin::shimmer.datagrid.table.head>
                    </template>
                </template>

                <template #body="{ columns, records, setCurrentSelectionMode, applied, isLoading, performAction }">
                    <template v-if="! isLoading">
                        <div
<<<<<<< HEAD
                            class="row grid grid-cols-[2fr_1fr_minmax(150px,_4fr)_0.5fr] px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                            v-for="record in records"
                        >
                            <!-- Name, Product, Description -->
                            <div class="flex gap-[10px]">
=======
                            class="row grid grid-cols-[2fr_1fr_minmax(150px,_4fr)_0.5fr] px-4 py-2.5 border-b dark:border-gray-800 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                            v-for="record in records"
                        >
                            <!-- Name, Product, Description -->
                            <div class="flex gap-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @if ($hasPermission)
                                    <input 
                                        type="checkbox" 
                                        :name="`mass_action_select_record_${record.product_review_id}`"
                                        :id="`mass_action_select_record_${record.product_review_id}`"
                                        :value="record.product_review_id"
                                        class="hidden peer"
                                        v-model="applied.massActions.indices"
                                        @change="setCurrentSelectionMode"
                                    >
                        
                                    <label 
<<<<<<< HEAD
                                        class="icon-uncheckbox rounded-[6px] text-[24px] cursor-pointer peer-checked:icon-checked peer-checked:text-blue-600"
=======
                                        class="icon-uncheckbox rounded-md text-2xl cursor-pointer peer-checked:icon-checked peer-checked:text-blue-600"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        :for="`mass_action_select_record_${record.product_review_id}`"
                                    ></label>
                                @endif

<<<<<<< HEAD
                                <div class="flex flex-col gap-[6px]">
                                    <p
                                        class="text-[16px] text-gray-800 dark:text-white font-semibold"
=======
                                <div class="flex flex-col gap-1.5">
                                    <p
                                        class="text-base text-gray-800 dark:text-white font-semibold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        v-text="record.customer_full_name"
                                    >
                                    </p>
                                    <p
                                        class="text-gray-600 dark:text-gray-300"
                                        v-text="record.product_name"
                                    >
                                    </p>

                                    <p v-html="record.product_review_status"></p>
                                </div>
                            </div>

                            <!-- Rating, Date, Id Section -->
<<<<<<< HEAD
                            <div class="flex flex-col gap-[6px]">
=======
                            <div class="flex flex-col gap-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <div class="flex">
                                    <x-admin::star-rating 
                                        :is-editable="false"
                                        ::value="record.rating"
                                    >
                                    </x-admin::star-rating>
                                </div>

                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-text="record.created_at"
                                >
                                </p>

                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                >
                                    @{{ "@lang('admin::app.customers.reviews.index.datagrid.review-id')".replace(':review_id', record.product_review_id) }}
                                </p>
                            </div>

                            <!-- Title, Description -->
<<<<<<< HEAD
                            <div class="flex flex-col gap-[6px]">
                                <p
                                    class="text-[16px] text-gray-800 dark:text-white font-semibold"
=======
                            <div class="flex flex-col gap-1.5">
                                <p
                                    class="text-base text-gray-800 dark:text-white font-semibold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    v-text="record.title"
                                >
                                </p>

                                <p
                                    class="text-gray-600 dark:text-gray-300"
                                    v-text="record.comment"
                                >
                                </p>
                            </div>

<<<<<<< HEAD
                            <div class="flex gap-[5px] place-content-end items-center self-center">
                                <!-- Review Delete Button -->
                                <a @click="performAction(record.actions.find(action => action.method === 'DELETE'))">
                                    <span
                                        :class="record.actions.find(action => action.method === 'DELETE')?.icon"
                                        class="text-[24px] ltr:ml-[4px] rtl:mr-[4px] p-[6px] rounded-[6px] cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800"
=======
                            <div class="flex gap-1.5 place-content-end items-center self-center">
                                <!-- Review Delete Button -->
                                <a @click="performAction(record.actions.find(action => action.index === 'delete'))">
                                    <span
                                        :class="record.actions.find(action => action.index === 'delete')?.icon"
                                        class="text-2xl ltr:ml-1 rtl:mr-1 p-1.5 rounded-md cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                    </span>
                                </a>

                                <!-- View Button -->
                                <a
<<<<<<< HEAD
                                    v-if="record.actions.find(action => action.title === 'Edit')"
                                    @click="edit(record.actions.find(action => action.title === 'Edit')?.url)"
                                >
                                    <span class="icon-sort-right text-[24px] ltr:ml-[4px] rtl:mr-[4px] p-[6px] rounded-[6px] cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800">
=======
                                    v-if="record.actions.find(action => action.index === 'edit')"
                                    @click="edit(record.actions.find(action => action.index === 'edit')?.url)"
                                >
                                    <span class="icon-sort-right text-2xl ltr:ml-1 rtl:mr-1 p-1.5 rounded-md cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </span>
                                </a>
                            </div>
                        </div>
                    </template>

                    <!-- Datagrid Body Shimmer -->
                    <template v-else>
                        <x-admin::shimmer.datagrid.table.body :isMultiRow="true"></x-admin::shimmer.datagrid.table.body>
                    </template>
                </template>
            </x-admin::datagrid>

            {!! view_render_event('admin.customers.reviews.list.after') !!}

            <!-- Drawer content -->
<<<<<<< HEAD
            <div class=" flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
=======
            <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <form
                        @submit="handleSubmit($event, update)"
                        ref="reviewCreateForm"
                    >
                        <x-admin::drawer ref="review">
                            <!-- Drawer Header -->
                            <x-slot:header>
                                <div class="flex justify-between items-center">
<<<<<<< HEAD
                                    <p class="text-[20px] font-medium dark:text-white">
                                        @lang('admin::app.customers.reviews.index.edit.title')
                                    </p>
                
                                    <button class="mr-[45px] primary-button">
=======
                                    <p class="text-xl font-medium dark:text-white">
                                        @lang('admin::app.customers.reviews.index.edit.title')
                                    </p>
                
                                    <button class="ltr:mr-11 rtl:ml-11 primary-button">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @lang('admin::app.customers.reviews.index.edit.save-btn')
                                    </button>
                                </div>
                            </x-slot:header>

                            <!-- Drawer Content -->
                            <x-slot:content>
<<<<<<< HEAD
                                <div class="flex flex-col gap-[16px] px-[5px] py-[10px]">
                                    <div class="grid grid-cols-2 gap-[16px]">
                                        <div class="">
                                            <!-- Customer Name -->
                                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
=======
                                <div class="flex flex-col gap-4 px-1.5 py-2.5">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="">
                                            <!-- Customer Name -->
                                            <p class="text-xs text-gray-600 dark:text-gray-300 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                @lang('admin::app.customers.reviews.index.edit.customer')
                                            </p>

                                            <p 
                                                class="text-gray-800 font-semibold dark:text-white" 
                                                v-text="review.name !== '' ? review.name : 'N/A'"
                                            >
                                            </p>
                                        </div>

                                        <div class="">
<<<<<<< HEAD
                                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
=======
                                            <p class="text-xs text-gray-600 dark:text-gray-300 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                @lang('admin::app.customers.reviews.index.edit.product')
                                            </p>

                                            <p 
                                                class="text-gray-800 font-semibold dark:text-white" 
                                                v-text="review.product.name"
                                            >
                                            </p>
                                        </div>
                
                                        <div class="">
<<<<<<< HEAD
                                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
=======
                                            <p class="text-xs text-gray-600 dark:text-gray-300 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                @lang('admin::app.customers.reviews.index.edit.id')
                                            </p>

                                            <p 
                                                class="text-gray-800 font-semibold dark:text-white" 
                                                v-text="review.id"
                                            >
                                            </p>
                                        </div>
                
                                        <div class="">
<<<<<<< HEAD
                                            <p class="text-[12px] text-gray-600 dark:text-gray-300 font-semibold">
=======
                                            <p class="text-xs text-gray-600 dark:text-gray-300 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                @lang('admin::app.customers.reviews.index.edit.date')
                                            </p>

                                            <p 
                                                class="text-gray-800 font-semibold dark:text-white" 
                                                v-text="review.date"
                                            >
                                            </p>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <x-admin::form.control-group.control
                                            type="hidden"
                                            name="id"
                                            ::value="review.id"
                                            rules="required"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group>
                                            <x-admin::form.control-group.label class="required">
                                                @lang('admin::app.customers.reviews.index.edit.status')
                                            </x-admin::form.control-group.label>
                                            <x-admin::form.control-group.control
                                                type="select"
                                                name="status"
                                                ::value="review.status"
                                                rules="required"
                                            >
                                                <option value="approved" >
                                                    @lang('admin::app.customers.reviews.index.edit.approved')
                                                </option>
                
                                                <option value="disapproved">
                                                    @lang('admin::app.customers.reviews.index.edit.disapproved')
                                                </option>
                
                                                <option value="pending">
                                                    @lang('admin::app.customers.reviews.index.edit.pending')
                                                </option>
                                            </x-admin::form.control-group.control>
                
                                            <x-admin::form.control-group.error
                                                control-name="status"
                                            >
                                            </x-admin::form.control-group.error>
                                        </x-admin::form.control-group>
                                    </div>
                
<<<<<<< HEAD
                                    <div class="w-full ">
=======
                                    <div class="w-full">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        <p class="text-gray-600 dark:text-gray-300 font-semibold">
                                            @lang('admin::app.customers.reviews.index.edit.rating') 
                                        </p>

                                        <div class="flex">
                                            <x-admin::star-rating 
                                                :is-editable="false"
                                                ::value="review.rating"
                                            >
                                            </x-admin::star-rating>
                                        </div>
                                    </div>
                
                                    <div class="w-full">
<<<<<<< HEAD
                                        <p class="block text-[12px] text-gray-800 dark:text-white font-medium leading-[24px]">
=======
                                        <p class="block text-xs text-gray-800 dark:text-white font-medium leading-6">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @lang('admin::app.customers.reviews.index.edit.review-title') 
                                        </p>

                                        <p 
                                            class="text-gray-800 font-semibold dark:text-white" 
                                            v-text="review.title"
                                        >
                                        </p>
                                    </div>
                
                                    <div class="w-full">
<<<<<<< HEAD
                                        <p class="block text-[12px] text-gray-600 dark:text-gray-300 font-semibold leading-[24px]">
=======
                                        <p class="block text-xs text-gray-600 dark:text-gray-300 font-semibold leading-6">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @lang('admin::app.customers.reviews.index.edit.review-comment')     
                                        </p>

                                        <p 
                                            class="text-gray-800 dark:text-white" 
                                            v-text="review.comment"
                                        >
                                        </p>
                                    </div>

                                    <div
                                        class="w-full"
                                        v-if="review.images.length"
                                    >
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.customers.reviews.index.edit.images')     
                                        </x-admin::form.control-group.label>
                                    
                                        <div class="flex flex-wrap gap-4">
                                            <div v-for="image in review.images" :key="image.id">
                                                <img
                                                    v-if="image.type === 'image'"
<<<<<<< HEAD
                                                    class="h-[60px] w-[60px] rounded-[4px]"
=======
                                                    class="h-[60px] w-[60px] rounded"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    :src="image.url"
                                                    alt="Image"
                                                />

                                                <video
                                                    v-else
<<<<<<< HEAD
                                                    class="h-[60px] w-[60px] rounded-[4px]"
=======
                                                    class="h-[60px] w-[60px] rounded"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    controls
                                                    autoplay
                                                >
                                                    <source
                                                        :src="image.url"
                                                        type="video/mp4"
                                                    >
                                                </video>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </x-slot:content>
                        </x-admin::drawer>
                    </form>
                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-review-edit-drawer', {
                template: '#v-review-edit-drawer-template',

                data() {
                    return {
                        review: {},
                    }
                },

                methods: {
                    edit(url) {
                        this.$axios.get(url)
                            .then((response) => {
                                this.$refs.review.open(),

                                this.review = response.data.data
                            })
                            .catch(error => {
                                if (error.response.status ==422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                   
                    },

                    update(params) {
                        let formData = new FormData(this.$refs.reviewCreateForm);

                        formData.append('_method', 'put');

                        this.$axios.post(`{{ route('admin.customers.customers.review.update', '') }}/${params.id}`, formData)
                            .then((response) => {
                                this.$refs.review.close();

                                this.$refs.review_data.get();

                                this.$emitter.emit('add-flash', { type: 'success', message: 'Review Updated Successfully' });
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },
                }
            })
        </script>
    @endPushOnce
</x-admin::layouts>