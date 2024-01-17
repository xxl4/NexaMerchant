<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.settings.currencies.index.title')
<<<<<<< HEAD
    </x-slot:title>
=======
    </x-slot>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

    {!! view_render_event('bagisto.admin.settings.currencies.create.before') !!}

    <v-currencies>
<<<<<<< HEAD
        <div class="flex  gap-[16px] justify-between items-center max-sm:flex-wrap">
            <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                @lang('admin::app.settings.currencies.index.title')
            </p>

            <div class="flex gap-x-[10px] items-center">
                <!-- Craete currency Button -->
                @if (bouncer()->hasPermission('settings.currencies.create'))
                    <button 
=======
        <div class="flex  gap-4 justify-between items-center max-sm:flex-wrap">
            <p class="text-xl text-gray-800 dark:text-white font-bold">
                @lang('admin::app.settings.currencies.index.title')
            </p>

            <div class="flex gap-x-2.5 items-center">
                <!-- Create currency Button -->
                @if (bouncer()->hasPermission('settings.currencies.create'))
                    <button
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        type="button"
                        class="primary-button"
                    >
                        @lang('admin::app.settings.currencies.index.create-btn')
                    </button>
                @endif
            </div>
        </div>

<<<<<<< HEAD
        {{-- DataGrid Shimmer --}}
=======
        <!-- DataGrid Shimmer -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <x-admin::shimmer.datagrid/>
    </v-currencies>

    {!! view_render_event('bagisto.admin.settings.currencies.create.after') !!}

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-currencies-template"
        >
<<<<<<< HEAD
            <div class="flex gap-[16px] justify-between items-center max-sm:flex-wrap">
                <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                    @lang('admin::app.settings.currencies.index.title')
                </p>

                <div class="flex gap-x-[10px] items-center">
                    <!-- Craete currency Button -->
                    @if (bouncer()->hasPermission('settings.currencies.create'))
                        <button 
                            type="button"
                            class="primary-button"
                            @click="id=0; selectedCurrency={}; $refs.currencyUpdateOrCreateModal.toggle()"
=======
            <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
                <p class="text-xl text-gray-800 dark:text-white font-bold">
                    @lang('admin::app.settings.currencies.index.title')
                </p>

                <div class="flex gap-x-2.5 items-center">
                    <!-- Create currency Button -->
                    @if (bouncer()->hasPermission('settings.currencies.create'))
                        <button
                            type="button"
                            class="primary-button"
                            @click="selectedCurrencies=0; selectedCurrency={}; $refs.currencyUpdateOrCreateModal.toggle()"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        >
                            @lang('admin::app.settings.currencies.index.create-btn')
                        </button>
                    @endif
                </div>
            </div>
<<<<<<< HEAD
    
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <x-admin::datagrid
                :src="route('admin.settings.currencies.index')"
                ref="datagrid"
            >
<<<<<<< HEAD
                @php
                    $hasPermission = bouncer()->hasPermission('settings.currencies.edit') || bouncer()->hasPermission('settings.currencies.delete');
                @endphp

                <!-- DataGrid Header -->
                <template #header="{ columns, records, sortPage, applied}">
                    <div class="row grid grid-cols-{{ $hasPermission ? '4' : '3' }} grid-rows-1 gap-[10px] items-center px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold">
                        <div
                            class="flex gap-[10px] cursor-pointer"
                            v-for="(columnGroup, index) in ['id', 'code', 'name']"
                        >
                            <p class="text-gray-600 dark:text-gray-300">
                                <span class="[&>*]:after:content-['_/_']">
                                    <span
                                        class="after:content-['/'] last:after:content-['']"
                                        :class="{
                                            'text-gray-800 dark:text-white font-medium': applied.sort.column == columnGroup,
                                            'cursor-pointer hover:text-gray-800 dark:hover:text-white': columns.find(columnTemp => columnTemp.index === columnGroup)?.sortable,
                                        }"
                                        @click="
                                            columns.find(columnTemp => columnTemp.index === columnGroup)?.sortable ? sortPage(columns.find(columnTemp => columnTemp.index === columnGroup)): {}
                                        "
                                    >
                                        @{{ columns.find(columnTemp => columnTemp.index === columnGroup)?.label }}
                                    </span>
                                </span>

                                <!-- Filter Arrow Icon -->
                                <i
                                    class="ltr:ml-[5px] rtl:mr-[5px] text-[16px] text-gray-800 dark:text-white align-text-bottom"
                                    :class="[applied.sort.order === 'asc' ? 'icon-down-stat': 'icon-up-stat']"
                                    v-if="columnGroup.includes(applied.sort.column)"
                                ></i>
                            </p>
                        </div>

                        <!-- Actions -->
                        @if ($hasPermission)
                            <p class="flex gap-[10px] justify-end">
                                @lang('admin::app.components.datagrid.table.actions')
                            </p>
                        @endif
                    </div>
                </template>

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <!-- DataGrid Body -->
                <template #body="{ columns, records, performAction }">
                    <div
                        v-for="record in records"
<<<<<<< HEAD
                        class="row grid gap-[10px] items-center px-[16px] py-[16px] border-b-[1px] dark:border-gray-800 text-gray-600 dark:text-gray-300 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                        :style="'grid-template-columns: repeat(' + (record.actions.length ? 4 : 3) + ', 1fr);'"
=======
                        class="row grid gap-2.5 items-center px-4 py-4 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                        :style="`grid-template-columns: repeat(${gridsCount}, minmax(0, 1fr))`"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    >
                        <!-- Id -->
                        <p v-text="record.id"></p>

                        <!-- Code -->
                        <p v-text="record.code"></p>

                        <!-- Name -->
                        <p v-text="record.name"></p>

                        <!-- Actions -->
                        <div class="flex justify-end">
<<<<<<< HEAD
                            <a @click="id=1; editModal(record.actions.find(action => action.title === 'Edit')?.url)">
                                <span
                                    :class="record.actions.find(action => action.title === 'Edit')?.icon"
                                    class="cursor-pointer rounded-[6px] p-[6px] text-[24px] transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                >
                                </span>
                            </a>

                            <a @click="performAction(record.actions.find(action => action.method === 'DELETE'))">
                                <span
                                    :class="record.actions.find(action => action.method === 'DELETE')?.icon"
                                    class="cursor-pointer rounded-[6px] p-[6px] text-[24px] transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                >
                                </span>
                            </a>
=======
                            @if (bouncer()->hasPermission('settings.currencies.edit'))
                                <a @click="selectedCurrencies=1; editModal(record.actions.find(action => action.index === 'edit')?.url)">
                                    <span
                                        :class="record.actions.find(action => action.index === 'edit')?.icon"
                                        class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                    >
                                    </span>
                                </a>
                            @endif

                            @if (bouncer()->hasPermission('settings.currencies.delete'))
                                <a @click="performAction(record.actions.find(action => action.index === 'delete'))">
                                    <span
                                        :class="record.actions.find(action => action.index === 'delete')?.icon"
                                        class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                    >
                                    </span>
                                </a>
                            @endif
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </div>
                    </div>
                </template>
            </x-admin::datagrid>

            <!-- Modal Form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
                ref="modalForm"
            >
                <form
                    @submit="handleSubmit($event, updateOrCreate)"
                    ref="currencyCreateForm"
                >
                    <x-admin::modal ref="currencyUpdateOrCreateModal">
<<<<<<< HEAD
                        <x-slot:header>
                            <p
                                class="text-[18px] text-gray-800 dark:text-white font-bold"
                                v-if="id"
=======
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p
                                class="text-lg text-gray-800 dark:text-white font-bold"
                                v-if="selectedCurrencies"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            >
                                @lang('admin::app.settings.currencies.index.edit.title')
                            </p>

<<<<<<< HEAD
                            <p 
                                class="text-[18px] text-gray-800 dark:text-white font-bold"
=======
                            <p
                                class="text-lg text-gray-800 dark:text-white font-bold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-else
                            >
                                @lang('admin::app.settings.currencies.index.create.title')
                            </p>
                        </x-slot:header>

<<<<<<< HEAD
                        <x-slot:content>
                            <div class="px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">
                                {!! view_render_event('bagisto.admin.settings.currencies.create.before') !!}

                                <x-admin::form.control-group.control
                                    type="hidden"
                                    name="id"
                                    v-model="selectedCurrency.id"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.currencies.index.create.code')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="code"
                                        :value="old('code')"
                                        rules="required"
                                        v-model="selectedCurrency.code"
                                        :label="trans('admin::app.settings.currencies.index.create.code')"
                                        :placeholder="trans('admin::app.settings.currencies.index.create.code')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="code"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required"> 
                                        @lang('admin::app.settings.currencies.index.create.name')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="name"
                                        :value="old('name')"
                                        rules="required"
                                        v-model="selectedCurrency.name"
                                        :label="trans('admin::app.settings.currencies.index.create.name')"
                                        :placeholder="trans('admin::app.settings.currencies.index.create.name')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="name"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label>
                                        @lang('admin::app.settings.currencies.index.create.symbol')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="symbol"
                                        :value="old('symbol')"
                                        v-model="selectedCurrency.symbol"
                                        :label="trans('admin::app.settings.currencies.index.create.symbol')"
                                        :placeholder="trans('admin::app.settings.currencies.index.create.symbol')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="symbol"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label>
                                        @lang('admin::app.settings.currencies.index.create.decimal')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="decimal"
                                        :value="old('decimal')"
                                        v-model="selectedCurrency.decimal"
                                        :label="trans('admin::app.settings.currencies.index.create.decimal')"
                                        :placeholder="trans('admin::app.settings.currencies.index.create.decimal')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="decimal"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                {!! view_render_event('bagisto.admin.settings.currencies.create.after') !!}
                            </div>
                        </x-slot:content>

                        <x-slot:footer>
                            <div class="flex gap-x-[10px] items-center">
                               <button 
=======
                        <!-- Modal Content -->
                        <x-slot:content>
                            {!! view_render_event('bagisto.admin.settings.currencies.create.before') !!}

                            <x-admin::form.control-group.control
                                type="hidden"
                                name="id"
                                v-model="selectedCurrency.id"
                            >
                            </x-admin::form.control-group.control>

                            <!-- Code -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.settings.currencies.index.create.code')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="code"
                                    :value="old('code')"
                                    rules="required"
                                    v-model="selectedCurrency.code"
                                    :label="trans('admin::app.settings.currencies.index.create.code')"
                                    :placeholder="trans('admin::app.settings.currencies.index.create.code')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="code"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Name -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.settings.currencies.index.create.name')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="name"
                                    :value="old('name')"
                                    rules="required"
                                    v-model="selectedCurrency.name"
                                    :label="trans('admin::app.settings.currencies.index.create.name')"
                                    :placeholder="trans('admin::app.settings.currencies.index.create.name')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="name"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Symbol -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('admin::app.settings.currencies.index.create.symbol')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="symbol"
                                    :value="old('symbol')"
                                    v-model="selectedCurrency.symbol"
                                    :label="trans('admin::app.settings.currencies.index.create.symbol')"
                                    :placeholder="trans('admin::app.settings.currencies.index.create.symbol')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="symbol"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Decimal -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('admin::app.settings.currencies.index.create.decimal')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="decimal"
                                    :value="old('decimal')"
                                    v-model="selectedCurrency.decimal"
                                    :label="trans('admin::app.settings.currencies.index.create.decimal')"
                                    :placeholder="trans('admin::app.settings.currencies.index.create.decimal')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="decimal"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            {!! view_render_event('bagisto.admin.settings.currencies.create.after') !!}
                        </x-slot:content>

                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <div class="flex gap-x-2.5 items-center">
                               <button
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('admin::app.settings.currencies.index.create.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </script>

        <script type="module">
            app.component('v-currencies', {
                template: '#v-currencies-template',

                data() {
                    return {
                        selectedCurrency: {},
<<<<<<< HEAD
                    }
                },

=======

                        selectedCurrencies: 0,
                    }
                },

                computed: {
                    gridsCount() {
                        let count = this.$refs.datagrid.available.columns.length;

                        if (this.$refs.datagrid.available.actions.length) {
                            ++count;
                        }

                        if (this.$refs.datagrid.available.massActions.length) {
                            ++count;
                        }

                        return count;
                    },
                },

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                methods: {
                    updateOrCreate(params, { resetForm, setErrors  }) {
                        let formData = new FormData(this.$refs.currencyCreateForm);

                        if (params.id) {
                            formData.append('_method', 'put');
                        }

                        this.$axios.post(params.id ? "{{ route('admin.settings.currencies.update') }}" : "{{ route('admin.settings.currencies.store') }}", formData)
                        .then((response) => {
                            this.$refs.currencyUpdateOrCreateModal.close();

                            this.$refs.datagrid.get();

                            this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                            resetForm();
                        })
                        .catch(error => {
<<<<<<< HEAD
                            if (error.response.status ==422) {
=======
                            if (error.response.status == 422) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                setErrors(error.response.data.errors);
                            }
                        });
                    },

                    editModal(url) {
                        this.$axios.get(url)
                            .then((response) => {
                                this.selectedCurrency = response.data;

                                this.$refs.currencyUpdateOrCreateModal.toggle();
                            })
                            .catch(error => {
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message })
                            });
                    },
                }
            })
        </script>
    @endPushOnce
<<<<<<< HEAD
</x-admin::layouts>
=======
</x-admin::layouts>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
