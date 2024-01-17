<x-admin::layouts>
<<<<<<< HEAD
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('admin::app.marketing.communications.subscribers.index.title')
    </x-slot:title>

    <div class="flex gap-[16px] justify-between items-center max-sm:flex-wrap">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
=======
    <!-- Title of the page -->
    <x-slot:title>
        @lang('admin::app.marketing.communications.subscribers.index.title')
    </x-slot>

    <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            @lang('admin::app.marketing.communications.subscribers.index.title')
        </p>
    </div>

    <v-subscribers>
<<<<<<< HEAD
        {{-- DataGrid Shimmer --}}
=======
        <!-- DataGrid Shimmer -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <x-admin::shimmer.datagrid/>
    </v-subscribers>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-subscribers-template">
            <div>
                <!-- DataGrid -->
                <x-admin::datagrid
                    src="{{ route('admin.marketing.communications.subscribers.index') }}"
                    ref="datagrid"
                >
<<<<<<< HEAD
                    @php
                        $hasPermission = bouncer()->hasPermission('marketing.communications.subscribers.edit') || bouncer()->hasPermission('marketing.communications.subscribers.delete');
                    @endphp

                    <!-- DataGrid Header -->
                    <template #header="{ columns, records, sortPage, applied}">
                        <div class="row grid grid-cols-{{ $hasPermission ? '4' : '3' }} grid-rows-1 gap-[10px] items-center px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold">
                            <div
                                class="flex gap-[10px] cursor-pointer"
                                v-for="(columnGroup, index) in ['id', 'status', 'email']"
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
                            <p v-text="record.status"></p>
            
                            <!-- Email -->
                            <p v-text="record.email"></p>
            
                            <!-- Actions -->
                            <div class="flex justify-end">
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
                            class="row grid gap-2.5 items-center px-4 py-4 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                                :style="`grid-template-columns: repeat(${gridsCount}, minmax(0, 1fr))`"
                        >
                            <!-- Id -->
                            <p v-text="record.id"></p>

                            <!-- Status -->
                            <p v-text="record.status"></p>

                            <!-- Email -->
                            <p v-text="record.email"></p>

                            <!-- Actions -->
                            <div class="flex justify-end">
                                @if (bouncer()->hasPermission('marketing.communications.subscribers.edit'))
                                    <a @click="editModal(record.actions.find(action => action.index === 'edit')?.url)">
                                        <span
                                            :class="record.actions.find(action => action.index === 'edit')?.icon"
                                            class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
                                        >
                                        </span>
                                    </a>
                                @endif

                                @if (bouncer()->hasPermission('marketing.communications.subscribers.delete'))
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

                <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                    ref="modalForm"
                >
                    <form
                        @submit="handleSubmit($event, update)"
                        ref="subscriberCreateForm"
                    >
                        <!-- Create Group Modal -->
<<<<<<< HEAD
                        <x-admin::modal ref="groupCreateModal">          
                            <x-slot:header>
                                <!-- Modal Header -->
                                <p class="text-[18px] text-gray-800 dark:text-white font-bold">
                                    @lang('admin::app.marketing.communications.subscribers.index.edit.title')
                                </p>    
                            </x-slot:header>
            
                            <x-slot:content>
                                <!-- Modal Content -->
                                <div class="px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">
                                    <!-- Id -->
                                    <x-admin::form.control-group.control
                                        type="hidden"
                                        name="id"
                                    >
                                    </x-admin::form.control-group.control>

                                    <!-- Email -->
                                    <x-admin::form.control-group class="mb-[10px]">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.marketing.communications.subscribers.index.edit.email')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="hidden"
                                            name="id"
                                            v-model="selectedSubscriber.id"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="email"
                                            :value="old('email')"
                                            rules="required"
                                            class="mb-1 cursor-not-allowed"
                                            v-model="selectedSubscriber.email"
                                            :label="trans('admin::app.marketing.communications.subscribers.index.edit.email')"
                                            disabled
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error
                                            control-name="email"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <!-- Subscribed -->
                                    <x-admin::form.control-group class="mb-[10px]">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.marketing.communications.subscribers.index.edit.subscribed')
                                        </x-admin::form.control-group.label>

                                        @php 
                                            $selectedOption = old('status');
                                        @endphp

                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="is_subscribed"
                                            class="cursor-pointer mb-1"
                                            rules="required"
                                            v-model="selectedSubscriber.is_subscribed"
                                            :label="trans('admin::app.marketing.communications.subscribers.index.edit.subscribed')"
                                        >
                                            @foreach (['true', 'false'] as $state)
                                                <option 
                                                    value="{{ $state == 'true' ? 1 : 0 }}"
                                                >
                                                    @lang('admin::app.marketing.communications.subscribers.index.edit.' . $state)
                                                </option>
                                            @endforeach
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error
                                            control-name="is_subscribed"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>
                            </x-slot:content>
            
                            <x-slot:footer>
                                <!-- Modal Submission -->
                                <div class="flex gap-x-[10px] items-center">
                                    <button 
=======
                        <x-admin::modal ref="groupCreateModal">
                            <!-- Modal Header -->
                            <x-slot:header>
                                <p class="text-lg text-gray-800 dark:text-white font-bold">
                                    @lang('admin::app.marketing.communications.subscribers.index.edit.title')
                                </p>
                            </x-slot:header>

                            <!-- Modal Content -->
                            <x-slot:content>
                                <!-- Id -->
                                <x-admin::form.control-group.control
                                    type="hidden"
                                    name="id"
                                >
                                </x-admin::form.control-group.control>

                                <!-- Email -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.marketing.communications.subscribers.index.edit.email')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="hidden"
                                        name="id"
                                        v-model="selectedSubscriber.id"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="email"
                                        :value="old('email')"
                                        rules="required"
                                        class="mb-1 cursor-not-allowed"
                                        v-model="selectedSubscriber.email"
                                        :label="trans('admin::app.marketing.communications.subscribers.index.edit.email')"
                                        disabled
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="email"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Subscribed -->
                                <x-admin::form.control-group class="!mb-0">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.marketing.communications.subscribers.index.edit.subscribed')
                                    </x-admin::form.control-group.label>

                                    @php
                                        $selectedOption = old('status');
                                    @endphp

                                    <x-admin::form.control-group.control
                                        type="select"
                                        name="is_subscribed"
                                        class="cursor-pointer mb-1"
                                        rules="required"
                                        v-model="selectedSubscriber.is_subscribed"
                                        :label="trans('admin::app.marketing.communications.subscribers.index.edit.subscribed')"
                                    >
                                        @foreach (['true', 'false'] as $state)
                                            <option
                                                value="{{ $state == 'true' ? 1 : 0 }}"
                                            >
                                                @lang('admin::app.marketing.communications.subscribers.index.edit.' . $state)
                                            </option>
                                        @endforeach
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="is_subscribed"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </x-slot:content>

                            <!-- Modal Footer -->
                            <x-slot:footer>
                                <div class="flex gap-x-2.5 items-center">
                                    <button
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        type="submit"
                                        class="primary-button"
                                    >
                                        @lang('admin::app.marketing.communications.subscribers.index.edit.save-btn')
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-admin::modal>
                    </form>
                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-subscribers', {
                template: '#v-subscribers-template',

                data() {
                    return {
                        selectedSubscriber: {},
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
                    update(params, { resetForm, setErrors  }) {
                        let formData = new FormData(this.$refs.subscriberCreateForm);

                        formData.append('_method', 'put');

                        this.$axios.post("{{ route('admin.marketing.communications.subscribers.update') }}", formData)
                        .then((response) => {
                            this.$refs.groupCreateModal.close();

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
                                this.selectedSubscriber = response.data.data;

                                this.$refs.groupCreateModal.toggle();
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
                    }
                }
            })
        </script>
    @endPushOnce
<<<<<<< HEAD
</x-admin::layouts>
=======
</x-admin::layouts>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
