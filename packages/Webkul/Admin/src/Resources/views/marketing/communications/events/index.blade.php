<x-admin::layouts>
<<<<<<< HEAD
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('admin::app.marketing.communications.events.index.title')
    </x-slot:title>

    <v-events>
        <div class="flex gap-[16px] justify-between max-sm:flex-wrap">
            <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                @lang('admin::app.marketing.communications.events.index.title')
            </p>
    
            <div class="flex gap-x-[10px] items-center">
=======
    <!-- Title of the page -->
    <x-slot:title>
        @lang('admin::app.marketing.communications.events.index.title')
    </x-slot>

    <v-events>
        <div class="flex gap-4 justify-between max-sm:flex-wrap">
            <p class="text-xl text-gray-800 dark:text-white font-bold">
                @lang('admin::app.marketing.communications.events.index.title')
            </p>

            <div class="flex gap-x-2.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <!-- Create Button -->
                @if (bouncer()->hasPermission('marketing.communications.events.create'))
                    <div class="primary-button">
                        @lang('admin::app.marketing.communications.events.index.create-btn')
                    </div>
                @endif
            </div>
        </div>

<<<<<<< HEAD
        {{-- DataGrid Shimmer --}}
=======
        <!-- DataGrid Shimmer -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <x-admin::shimmer.datagrid/>
    </v-events>

    @pushOnce('scripts')
<<<<<<< HEAD
        <script 
            type="text/x-template" 
            id="v-events-template"
        >
            <div class="flex gap-[16px] justify-between max-sm:flex-wrap">
                <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                    @lang('admin::app.marketing.communications.events.index.title')
                </p>
        
                <div class="flex gap-x-[10px] items-center">
=======
        <script
            type="text/x-template"
            id="v-events-template"
        >
            <div class="flex gap-4 justify-between max-sm:flex-wrap">
                <p class="text-xl text-gray-800 dark:text-white font-bold">
                    @lang('admin::app.marketing.communications.events.index.title')
                </p>

                <div class="flex gap-x-2.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <!-- Create Button -->
                    @if (bouncer()->hasPermission('marketing.communications.events.create'))
                        <div
                            class="primary-button"
                            @click="selectedEvents={}; $refs.emailEvents.toggle()"
                        >
                            @lang('admin::app.marketing.communications.events.index.create-btn')
                        </div>
                    @endif
                </div>
            </div>

            {!! view_render_event('admin.marketing.communications.events.list.before') !!}

            <!-- Datagrid -->
            <x-admin::datagrid
                src="{{ route('admin.marketing.communications.events.index') }}"
                ref="datagrid"
            >
<<<<<<< HEAD
                @php
                    $hasPermission = bouncer()->hasPermission('marketing.communications.events.edit') || bouncer()->hasPermission('marketing.communications.events.delete');
                @endphp

                <!-- Datagrid Header -->
                <template #header="{ columns, records, sortPage, applied}">
                    <div class="row grid grid-cols-{{ $hasPermission ? '4' : '3' }} grid-rows-1 gap-[10px] items-center px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold">
                        <div
                            class="flex gap-[10px] cursor-pointer"
                            v-for="(columnGroup, index) in ['id', 'name', 'date']"
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
                    >
                        <!-- Id -->
                        <p v-text="record.id"></p>
        
                        <!-- Status -->
                        <p v-text="record.name"></p>
        
                        <!-- Email -->
                        <p v-text="record.date"></p>
        
                        <!-- Actions -->
                        <div class="flex justify-end">
                            <a @click="id=1; editModal(record.actions.find(action => action.title === 'Edit')?.url)">
                                <span
                                    :class="record.actions.find(action => action.title === 'Edit')?.icon"
                                    class="cursor-pointer rounded-[6px] p-[6px] text-[24px] transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                    :title="record.actions.find(action => action.title === 'Edit')?.title"
                                >
                                </span>
                            </a>

                            <a @click="performAction(record.actions.find(action => action.method === 'DELETE'))">
                                <span
                                    :class="record.actions.find(action => action.method === 'DELETE')?.icon"
                                    class="cursor-pointer rounded-[6px] p-[6px] text-[24px] transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                    :title="record.actions.find(action => action.method === 'DELETE')?.title"
                                >
                                </span>
                            </a>
                        </div>
=======
                        class="row grid gap-2.5 items-center px-4 py-4 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                            :style="`grid-template-columns: repeat(${gridsCount}, minmax(0, 1fr))`"
                    >
                        <!-- Id -->
                        <p v-text="record.id"></p>

                        <!-- Status -->
                        <p v-text="record.name"></p>

                        <!-- Email -->
                        <p v-text="record.date"></p>

                        <!-- Actions -->
                        @if (
                            bouncer()->hasPermission('marketing.communications.events.edit') 
                            || bouncer()->hasPermission('marketing.communications.events.delete')
                        )
                            <div class="flex justify-end">
                                @if (bouncer()->hasPermission('marketing.communications.events.edit'))
                                    <a @click="id=1; editModal(record.actions.find(action => action.index === 'edit')?.url)">
                                        <span
                                            :class="record.actions.find(action => action.index === 'edit')?.icon"
                                            class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                            :title="record.actions.find(action => action.title === '@lang('admin::app.marketing.communications.events.index.datagrid.edit')')?.title"
                                        >
                                        </span>
                                    </a>
                                @endif

                                @if (bouncer()->hasPermission('marketing.communications.events.delete'))
                                    <a @click="performAction(record.actions.find(action => action.index === 'delete'))">
                                        <span
                                            :class="record.actions.find(action => action.index === 'delete')?.icon"
                                            class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                            :title="record.actions.find(action => action.title === '@lang('admin::app.marketing.communications.events.index.datagrid.delete')')?.title"
                                        >
                                        </span>
                                    </a>
                                @endif
                            </div>
                        @endif
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    </div>
                </template>
            </x-admin::datagrid>

            {!! view_render_event('admin.marketing.communications.events.list.after') !!}

            {!! view_render_event('admin.marketing.communications.events.create.before') !!}

            <!-- Email Events form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
                ref="modalForm"
            >
                <form
                    @submit="handleSubmit($event, updateOrCreate)"
                    ref="eventCreateForm"
                >

                    {!! view_render_event('bagisto.admin.marketing.communications.events.create_form_controls.before') !!}

                    <x-admin::modal ref="emailEvents">
<<<<<<< HEAD
                        <x-slot:header>
                            <p
                                class="text-[18px] text-gray-800 dark:text-white font-bold"
=======
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p
                                class="text-lg text-gray-800 dark:text-white font-bold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-if="selectedEvents"
                            >
                                @lang('admin::app.marketing.communications.events.index.create.title')
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
                                @lang('admin::app.settings.users.index.create.title')
                            </p>
                        </x-slot:header>

<<<<<<< HEAD
                        <x-slot:content>
                            <div class="px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">

                                <!-- Id -->
                                <x-admin::form.control-group.control
                                    type="hidden"
                                    name="id"
                                    v-model="selectedEvents.id"
                                >
                                </x-admin::form.control-group.control>

                                <!-- Event Name -->
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.marketing.communications.events.index.create.name')
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="name"
                                        :value="old('name')"
                                        rules="required"
                                        v-model="selectedEvents.name"
                                        :label="trans('admin::app.marketing.communications.events.index.create.name')"
                                        :placeholder="trans('admin::app.marketing.communications.events.index.create.name')"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="name"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
        
                                <!-- Event Description -->
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.marketing.communications.events.index.create.description')
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="textarea"
                                        name="description"
                                        :value="old('description')"
                                        rules="required"
                                        id="description"
                                        class="h-[100px]"
                                        v-model="selectedEvents.description"
                                        :label="trans('admin::app.marketing.communications.events.index.create.description')"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error 
                                        control-name="description"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Event Date -->
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.marketing.communications.events.index.create.date')
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="date"
                                        name="date"
                                        :value="old('date')"
                                        rules="required"
                                        class="cursor-pointer"
                                        v-model="selectedEvents.date"
                                        :label="trans('admin::app.marketing.communications.events.index.create.date')"
                                        :placeholder="trans('admin::app.marketing.communications.events.index.create.date')"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="date"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>
                        </x-slot:content>
                        
                        <x-slot:footer>
                            <!-- Save Button -->
=======
                        <!-- Modal Content -->
                        <x-slot:content>
                            <!-- Id -->
                            <x-admin::form.control-group.control
                                type="hidden"
                                name="id"
                                v-model="selectedEvents.id"
                            >
                            </x-admin::form.control-group.control>

                            <!-- Event Name -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.marketing.communications.events.index.create.name')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="name"
                                    :value="old('name')"
                                    rules="required"
                                    v-model="selectedEvents.name"
                                    :label="trans('admin::app.marketing.communications.events.index.create.name')"
                                    :placeholder="trans('admin::app.marketing.communications.events.index.create.name')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="name"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Event Description -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.marketing.communications.events.index.create.description')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="textarea"
                                    name="description"
                                    :value="old('description')"
                                    rules="required"
                                    id="description"
                                    class="h-[100px]"
                                    v-model="selectedEvents.description"
                                    :label="trans('admin::app.marketing.communications.events.index.create.description')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="description"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Event Date -->
                            <x-admin::form.control-group class="!mb-0">
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.marketing.communications.events.index.create.date')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="date"
                                    name="date"
                                    :value="old('date')"
                                    rules="required"
                                    class="cursor-pointer"
                                    v-model="selectedEvents.date"
                                    :label="trans('admin::app.marketing.communications.events.index.create.date')"
                                    :placeholder="trans('admin::app.marketing.communications.events.index.create.date')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="date"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </x-slot:content>

                        <!-- Modal Footer -->
                        <x-slot:footer>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <button class="primary-button">
                                @lang('admin::app.marketing.communications.events.index.create.save-btn')
                            </button>
                        </x-slot:footer>
                    </x-admin::modal>

                    {!! view_render_event('bagisto.admin.marketing.communications.events.create_form_controls.after') !!}

                </form>
            </x-admin::form>

            {!! view_render_event('admin.marketing.communications.events.create.after') !!}

        </script>

        <script type="module">
            app.component('v-events', {
                template: '#v-events-template',

                data() {
                    return {
                        selectedEvents: {},
                    }
                },

<<<<<<< HEAD
=======
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
                    updateOrCreate(params, { resetForm, setErrors }) {
                        let formData = new FormData(this.$refs.eventCreateForm);

                        if (params.id) {
                            formData.append('_method', 'put');
                        }

                        this.$axios.post(params.id ? "{{ route('admin.marketing.communications.events.update')}}" : "{{ route('admin.marketing.communications.events.store') }}", formData)
                            .then((response) => {
                                this.$refs.emailEvents.toggle();

                                this.$refs.datagrid.get();

                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },

                    editModal(url) {
                        this.$axios.get(url)
                            .then((response) => {
                                if (response.data.id) {
                                    this.selectedEvents = response.data;

                                    this.$refs.emailEvents.toggle();
                                } else {
                                    this.$emitter.emit('add-flash', { type: 'error', message: response.data.message });
                                }
                            })
<<<<<<< HEAD
                            .catch(error => [
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message })
                            ]);
=======
                            .catch(error => this.$emitter.emit('add-flash', { 
                                type: 'error', message: error.response.data.message 
                            }));
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
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
