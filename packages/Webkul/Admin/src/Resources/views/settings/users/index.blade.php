<x-admin::layouts>
<<<<<<< HEAD
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('admin::app.settings.users.index.title')
    </x-slot:title>

    <v-users>
        <div class="flex justify-between items-center">
            <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                @lang('admin::app.settings.users.index.title')
            </p>
    
            <div class="flex gap-x-[10px] items-center">
                {{-- Create User Button --}}
=======
    <!-- Title of the page -->
    <x-slot:title>
        @lang('admin::app.settings.users.index.title')
    </x-slot>

    <v-users>
        <div class="flex justify-between items-center">
            <p class="text-xl text-gray-800 dark:text-white font-bold">
                @lang('admin::app.settings.users.index.title')
            </p>

            <div class="flex gap-x-2.5 items-center">
                <!-- Create User Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @if (bouncer()->hasPermission('settings.users.users.create'))
                    <button
                        type="button"
                        class="primary-button"
                    >
                        @lang('admin::app.settings.users.index.create.title')
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
    </v-users>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-users-template">
            <div class="flex justify-between items-center">
<<<<<<< HEAD
                <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                    @lang('admin::app.settings.users.index.title')
                </p>

                <div class="flex gap-x-[10px] items-center">
=======
                <p class="text-xl text-gray-800 dark:text-white font-bold">
                    @lang('admin::app.settings.users.index.title')
                </p>

                <div class="flex gap-x-2.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <!-- User Create Button -->
                    @if (bouncer()->hasPermission('settings.users.users.create'))
                        <button
                            type="button"
                            class="primary-button"
                            @click="resetForm();$refs.userUpdateOrCreateModal.open()"
                        >
                            @lang('admin::app.settings.users.index.create.title')
                        </button>
                    @endif
                </div>
            </div>

            <!-- Datagrid -->
            <x-admin::datagrid
                src="{{ route('admin.settings.users.index') }}"
                ref="datagrid"
            >
                @php
                    $hasPermission = bouncer()->hasPermission('settings.users.users.edit') || bouncer()->hasPermission('settings.users.users.delete');
                @endphp
                <!-- DataGrid Header -->
                <template #header="{columns, records, sortPage, applied}">
<<<<<<< HEAD
                    <div class="row grid grid-cols-{{ $hasPermission ? '6' : '5' }} grid-rows-1 gap-[10px] items-center px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold">
                        <div
                            class="flex gap-[10px] cursor-pointer"
=======
                    <div class="row grid grid-cols-{{ $hasPermission ? '6' : '5' }} grid-rows-1 gap-2.5 items-center px-4 py-2.5 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 font-semibold">
                        <div
                            class="flex gap-2.5 cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            v-for="(columnGroup, index) in ['user_id', 'user_name', 'status', 'email', 'role_name']"
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

                        <!-- Actions -->
                        @if ($hasPermission)
<<<<<<< HEAD
                            <p class="flex gap-[10px] justify-end">
=======
                            <p class="flex gap-2.5 justify-end">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @lang('admin::app.components.datagrid.table.actions')
                            </p>
                        @endif
                    </div>
                </template>

                <!-- DataGrid Body -->
                <template #body="{ columns, records, performAction }">
                    <div
                        v-for="record in records"
<<<<<<< HEAD
                        class="row grid gap-[10px] items-center px-[16px] py-[16px] border-b-[1px] dark:border-gray-800 text-gray-600 dark:text-gray-300 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                        :style="'grid-template-columns: repeat(' + (record.actions.length ? 6 : 5) + ', 1fr);'"
=======
                        class="row grid gap-2.5 items-center px-4 py-4 border-b dark:border-gray-800 text-gray-600 dark:text-gray-300 transition-all hover:bg-gray-50 dark:hover:bg-gray-950"
                        :style="'grid-template-columns: repeat(' + (record.actions.length ? 6 : 5) + ', minmax(0, 1fr));'"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    >
                        <!-- Id -->
                        <p v-text="record.user_id"></p>

                        <!-- User Profile -->
                        <p>
<<<<<<< HEAD

                            <div 
                                class="flex gap-[10px] items-center"
                            >
                                <div 
                                    class="inline-block w-[36px] h-[36px] rounded-full border-3 border-gray-800 align-middle text-center mr-2 overflow-hidden"
                                    v-if="record.user_img"
                                >
                                    <img
                                        class="w-[36px] h-[36px]"
=======
                            <div class="flex gap-2.5 items-center">
                                <div
                                    class="inline-block w-9 h-9 rounded-full border-3 border-gray-800 align-middle text-center mr-2 overflow-hidden"
                                    v-if="record.user_img"
                                >
                                    <img
                                        class="w-9 h-9"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        :src="record.user_img"
                                        alt="record.user_name"
                                    />
                                </div>
<<<<<<< HEAD
        
                                <div 
=======

                                <div
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    class="profile-info-icon"
                                    v-else
                                >
                                    <button
<<<<<<< HEAD
                                        class="flex justify-center items-center w-[36px] h-[36px] bg-blue-400 rounded-full text-[14px] text-white font-semibold cursor-pointer leading-6 transition-all hover:bg-blue-500 focus:bg-blue-500">
                                        @{{ record.user_name[0].toUpperCase() }}
=======
                                        class="flex justify-center items-center w-9 h-9 bg-blue-400 rounded-full text-sm text-white font-semibold cursor-pointer leading-6 transition-all hover:bg-blue-500 focus:bg-blue-500"
                                        v-text="record.user_name[0].toUpperCase()"
                                    >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </button>
                                </div>

                                <div
                                    class="text-sm"
                                    v-text="record.user_name"
                                >
<<<<<<< HEAD
                                </div> 
=======
                                </div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            </div>
                        </p>

                        <!-- Status -->
                        <p v-text="record.status"></p>

                        <!-- Email -->
                        <p v-text="record.email"></p>

                        <!-- Role -->
                        <p v-text="record.role_name"></p>

                        <!-- Actions -->
                        <div class="flex justify-end">
<<<<<<< HEAD
                            <a @click="id=1; editModal(record.actions.find(action => action.title === 'Edit')?.url)">
                                <span
                                    :class="record.actions.find(action => action.title === 'Edit')?.icon"
                                    class="cursor-pointer rounded-[6px] p-[6px] text-[24px] transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
=======
                            <a @click="id=1; editModal(record.actions.find(action => action.index === 'edit')?.url)">
                                <span
                                    :class="record.actions.find(action => action.index === 'edit')?.icon"
                                    class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                </span>
                            </a>

<<<<<<< HEAD
                            <a @click="performAction(record.actions.find(action => action.method === 'DELETE'))">
                                <span
                                    :class="record.actions.find(action => action.method === 'DELETE')?.icon"
                                    class="cursor-pointer rounded-[6px] p-[6px] text-[24px] transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
=======
                            <a @click="performAction(record.actions.find(action => action.index === 'delete'))">
                                <span
                                    :class="record.actions.find(action => action.index === 'delete')?.icon"
                                    class="cursor-pointer rounded-md p-1.5 text-2xl transition-all hover:bg-gray-200 dark:hover:bg-gray-800 max-sm:place-self-center"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                </span>
                            </a>
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
<<<<<<< HEAD
                <form 
=======
                <form
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @submit="handleSubmit($event, updateOrCreate)"
                    ref="userCreateForm"
                >
                    <!-- User Create Modal -->
                    <x-admin::modal ref="userUpdateOrCreateModal">
<<<<<<< HEAD
                        <x-slot:header>
                            <!-- Modal Header -->
                            <p 
                                class="text-[18px] text-gray-800 dark:text-white font-bold"
                                v-if="isUpdating"
                            >
                                @lang('admin::app.settings.users.index.edit.title')
                            </p>    

                            <p 
                                class="text-[18px] text-gray-800 dark:text-white font-bold"
                                v-else
                            >
                                @lang('admin::app.settings.users.index.create.title')
                            </p>    
                            
                        </x-slot:header>
        
                        <x-slot:content>
                            <!-- Modal Content -->
                            <div class="px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">
                                <!-- Name -->
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.users.index.create.name')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="hidden"
                                        name="id"
                                        v-model="data.user.id"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="name"
                                        id="name"
                                        rules="required"
                                        :label="trans('admin::app.settings.users.index.create.name')" 
                                        :placeholder="trans('admin::app.settings.users.index.create.name')"
                                        v-model="data.user.name"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="name"
=======
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p
                                class="text-lg text-gray-800 dark:text-white font-bold"
                                v-if="isUpdating"
                            >
                                @lang('admin::app.settings.users.index.edit.title')
                            </p>

                            <p
                                class="text-lg text-gray-800 dark:text-white font-bold"
                                v-else
                            >
                                @lang('admin::app.settings.users.index.create.title')
                            </p>

                        </x-slot:header>

                        <!-- Modal Content -->
                        <x-slot:content>
                            <!-- Name -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.settings.users.index.create.name')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="hidden"
                                    name="id"
                                    v-model="data.user.id"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.control
                                    type="text"
                                    name="name"
                                    id="name"
                                    rules="required"
                                    :label="trans('admin::app.settings.users.index.create.name')"
                                    :placeholder="trans('admin::app.settings.users.index.create.name')"
                                    v-model="data.user.name"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="name"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <!-- Email -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.settings.users.index.create.email')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="email"
                                    name="email"
                                    id="email"
                                    rules="required|email"
                                    :label="trans('admin::app.settings.users.index.create.email')"
                                    placeholder="email@example.com"
                                    v-model="data.user.email"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="email"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>

                            <div class="flex gap-4">
                                <!-- Password -->
                                <x-admin::form.control-group class="flex-1 mb-2.5">
                                    <x-admin::form.control-group.label>
                                        @lang('admin::app.settings.users.index.create.password')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="password"
                                        name="password"
                                        id="password"
                                        ref="password"
                                        rules="min:6"
                                        :label="trans('admin::app.settings.users.index.create.password')"
                                        :placeholder="trans('admin::app.settings.users.index.create.password')"
                                        v-model="data.user.password"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="password"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

<<<<<<< HEAD
                                <!-- Email -->
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.users.index.create.email')
                                    </x-admin::form.control-group.label>
        
                                    <x-admin::form.control-group.control
                                        type="email"
                                        name="email"
                                        id="email"
                                        rules="required|email"
                                        :label="trans('admin::app.settings.users.index.create.email')"
                                        placeholder="email@example.com"
                                        v-model="data.user.email"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="email"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <div class="flex gap-[16px]">
                                    <!-- Password -->
                                    <x-admin::form.control-group class="flex-1 mb-[10px]">
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.settings.users.index.create.password')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="password"
                                            name="password"
                                            id="password" 
                                            ref="password"
                                            rules="min:6"
                                            :label="trans('admin::app.settings.users.index.create.password')"
                                            :placeholder="trans('admin::app.settings.users.index.create.password')"
                                            v-model="data.user.password"
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error
                                            control-name="password"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
    
                                    <!-- Confirm Password -->
                                    <x-admin::form.control-group class="flex-1 mb-[10px]">
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.settings.users.index.create.confirm-password')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="password"
                                            name="password_confirmation"
                                            id="password_confirmation" 
                                            rules="confirmed:@password"
                                            :label="trans('admin::app.settings.users.index.create.password')"
                                            :placeholder="trans('admin::app.settings.users.index.create.confirm-password')"
                                            v-model="data.user.password_confirmation"
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error
                                            control-name="password_confirmation"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>

                                <div class="flex gap-[16px]">

                                    <!-- Role -->
                                    <x-admin::form.control-group class="flex-1 w-full mb-[10px]">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.settings.users.index.create.role')
                                        </x-admin::form.control-group.label>

                                        <v-field
                                            name="role_id" 
                                            rules="required"
                                            label="@lang('admin::app.settings.users.index.create.role')"
                                            v-model="data.user.role_id"
                                        >
                                            <select
                                                name="role_id" 
                                                class="flex w-full min-h-[39px] py-2 px-3 border rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400 dark:hover:border-gray-400 focus:border-gray-400 dark:focus:border-gray-400 dark:bg-gray-900 dark:border-gray-800"
                                                :class="[errors['options[sort]'] ? 'border border-red-600 hover:border-red-600' : '']"
                                                v-model="data.user.role_id"
                                            >
                                                <option value="" disabled>@lang('admin::app.settings.taxes.categories.index.create.select')</option>

                                                <option 
                                                    v-for="role in roles"
                                                    :value="role.id"
                                                    :text="role.name"
                                                >
                                                </option>
                                            </select>
                                        </v-field>
            
                                        <x-admin::form.control-group.error
                                            control-name="role_id"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <template v-if="currentUserId != data.user.id">
                                        <x-admin::form.control-group class="w-full flex-1 !mb-[0px]">
                                            <x-admin::form.control-group.label>
                                                @lang('admin::app.settings.users.index.create.status')
                                            </x-admin::form.control-group.label>

                                            <div class="gap-[10px] w-full mt-[10px]">    
                                                <x-admin::form.control-group.control
                                                    type="switch"
                                                    name="status"
                                                    :value="1"
                                                    :label="trans('admin::app.settings.users.index.create.status')"
                                                    ::checked="data.user.status"
                                                    v-model="data.user.status"
                                                >
                                                </x-admin::form.control-group.control>
                
                                                <x-admin::form.control-group.error
                                                    control-name="status"
                                                >
                                                </x-admin::form.control-group.error>
                                            </div>
                                        </x-admin::form.control-group>
                                    </template>

                                    <template v-else>
                                        <input type="hidden" name="status" v-model="data.user.status">
                                    </template>
                                </div>

                                <x-admin::form.control-group>
                                    <div class="hidden">
                                        <x-admin::media.images
                                            name="image"
                                            ::uploaded-images='data.images'
                                        >
                                        </x-admin::media.images>
                                    </div>

                                    <v-media-images
                                        name="image"
                                        :uploaded-images='data.images'
                                    >
                                    </v-media-images>

                                    <p class="required my-3 text-[14px] text-gray-400">
                                        @lang('admin::app.settings.users.index.create.upload-image-info')
                                    </p>
                                </x-admin::form.control-group>
                            </div>
                        </x-slot:content>
        
                        <x-slot:footer>
                            <!-- Modal Submission -->
                            <div class="flex gap-x-[10px] items-center">
                                <button 
=======
                                <!-- Confirm Password -->
                                <x-admin::form.control-group class="flex-1">
                                    <x-admin::form.control-group.label>
                                        @lang('admin::app.settings.users.index.create.confirm-password')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        rules="confirmed:@password"
                                        :label="trans('admin::app.settings.users.index.create.password')"
                                        :placeholder="trans('admin::app.settings.users.index.create.confirm-password')"
                                        v-model="data.user.password_confirmation"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="password_confirmation"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>

                            <div class="flex gap-4">
                                <!-- Role -->
                                <x-admin::form.control-group class="flex-1 w-full">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.users.index.create.role')
                                    </x-admin::form.control-group.label>

                                    <v-field
                                        name="role_id"
                                        rules="required"
                                        label="@lang('admin::app.settings.users.index.create.role')"
                                        v-model="data.user.role_id"
                                    >
                                        <select
                                            name="role_id"
                                            class="flex w-full min-h-[39px] py-2 px-3 border rounded-md text-sm text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400 dark:hover:border-gray-400 focus:border-gray-400 dark:focus:border-gray-400 dark:bg-gray-900 dark:border-gray-800"
                                            :class="[errors['options[sort]'] ? 'border border-red-600 hover:border-red-600' : '']"
                                            v-model="data.user.role_id"
                                        >
                                            <option value="" disabled>@lang('admin::app.settings.taxes.categories.index.create.select')</option>

                                            <option
                                                v-for="role in roles"
                                                :value="role.id"
                                                :text="role.name"
                                            >
                                            </option>
                                        </select>
                                    </v-field>

                                    <x-admin::form.control-group.error
                                        control-name="role_id"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <template v-if="currentUserId != data.user.id">
                                    <x-admin::form.control-group class="w-full flex-1 !mb-0">
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.settings.users.index.create.status')
                                        </x-admin::form.control-group.label>

                                        <div class="gap-2.5 w-full mt-2.5">
                                            <x-admin::form.control-group.control
                                                type="switch"
                                                name="status"
                                                :value="1"
                                                :label="trans('admin::app.settings.users.index.create.status')"
                                                ::checked="data.user.status"
                                                v-model="data.user.status"
                                            >
                                            </x-admin::form.control-group.control>

                                            <x-admin::form.control-group.error
                                                control-name="status"
                                            >
                                            </x-admin::form.control-group.error>
                                        </div>
                                    </x-admin::form.control-group>
                                </template>

                                <template v-else>
                                    <input type="hidden" name="status" v-model="data.user.status">
                                </template>
                            </div>

                            <x-admin::form.control-group>
                                <div class="hidden">
                                    <x-admin::media.images
                                        name="image"
                                        ::uploaded-images='data.images'
                                    >
                                    </x-admin::media.images>
                                </div>

                                <v-media-images
                                    name="image"
                                    :uploaded-images='data.images'
                                >
                                </v-media-images>

                                <p class="required my-3 text-sm text-gray-400">
                                    @lang('admin::app.settings.users.index.create.upload-image-info')
                                </p>
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
                                    @lang('admin::app.settings.users.index.create.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>

            <!-- User Delete Password Form -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
<<<<<<< HEAD
                <form 
=======
                <form
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @submit="handleSubmit($event, UserConfirmModal)"
                    ref="confirmPassword"
                >
                    <x-admin::modal ref="confirmPasswordModal">
                        <!-- Modal Header -->
                        <x-slot:header>
<<<<<<< HEAD
                            <p class="text-[18px] text-gray-800 dark:text-white font-bold">
                                @lang('Confirm Password Before DELETE')
                            </p>  
                            
                        </x-slot:header>
        
                        <x-slot:content>
                            <!-- Modal Content -->
                            <div class="px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">
                                <!-- Password -->
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('Enter Current Password')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="password"
                                        name="password"
                                        id="password"
                                        rules="required"
                                        :label="trans('Password')" 
                                        :placeholder="trans('Password')"
                                    >
                                    </x-admin::form.control-group.control>
        
                                    <x-admin::form.control-group.error
                                        control-name="password"
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
                            <p class="text-lg text-gray-800 dark:text-white font-bold">
                                @lang('Confirm Password Before DELETE')
                            </p>

                        </x-slot:header>

                        <!-- Modal Content -->
                        <x-slot:content>
                            <!-- Password -->
                            <x-admin::form.control-group class="mb-2.5">
                                <x-admin::form.control-group.label class="required">
                                    @lang('Enter Current Password')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="password"
                                    name="password"
                                    id="password"
                                    rules="required"
                                    :label="trans('Password')"
                                    :placeholder="trans('Password')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="password"
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
                                    @lang('Confirm Delete This Account')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </script>

        <script type="module">
            app.component('v-users', {
                template: '#v-users-template',

                data() {
                    return {
                        isUpdating: false,
<<<<<<< HEAD
                        
                        roles: @json($roles),
                        
=======

                        roles: @json($roles),

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        data: {
                            user: {},
                            images: [],
                        },

                        currentUserId: "{{ auth()->guard('admin')->user()->id }}",
                    }
                },

                methods: {
                    updateOrCreate(params, { setErrors }) {
                        let formData = new FormData(this.$refs.userCreateForm);

                        if (params.id) {
                            formData.append('_method', 'put');
                        }

                        this.$axios.post(params.id ? "{{ route('admin.settings.users.update') }}" : "{{ route('admin.settings.users.store') }}", formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                }
                            })
                            .then((response) => {
                                this.$refs.userUpdateOrCreateModal.close();

                                this.$refs.datagrid.get();

                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                this.resetForm();
                            })
                            .catch(error => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },

                    editModal(url) {
                        this.isUpdating = true;

                        this.$axios.get(url)
                            .then((response) => {
                                this.data = {
                                    ...response.data,
                                        images: response.data.user.image_url
                                        ? [{ id: 'image', url: response.data.user.image_url }]
                                        : [],
                                        user: {
                                            ...response.data.user,
                                            password:'',
                                            password_confirmation:'',
                                        },
                                };

                                this.$refs.modalForm.setValues(response.data.user);

                                this.$refs.userUpdateOrCreateModal.toggle();
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

                    UserConfirmModal() {
                        let formData = new FormData(this.$refs.confirmPassword);

                        formData.append('_method', 'put');
<<<<<<< HEAD
                        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        this.$axios.post("{{ route('admin.settings.users.destroy')}}", formData)
                            .then((response) => {
                                this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                window.location.href = response.data.redirectUrl;
                            })
                            .catch(error => {
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });

                                this.$refs.confirmPasswordModal.toggle();
                            });
                    },

                    resetForm() {
                        this.isUpdating = false;
<<<<<<< HEAD
                        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        this.data = {
                            user: {},
                            images: [],
                        };
                    },
                },
            });
        </script>
    @endPushOnce
<<<<<<< HEAD
</x-admin::layouts>
=======
</x-admin::layouts>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
