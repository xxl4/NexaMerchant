<x-admin::layouts>

<<<<<<< HEAD
    {{-- Page Title --}}
    <x-slot:title>
        @lang('admin::app.settings.roles.edit.title')
    </x-slot:title>
    
    {!! view_render_event('bagisto.admin.settings.roles.edit.before') !!}

    {{-- Edit Role for  --}}
=======
    <!-- Page Title -->
    <x-slot:title>
        @lang('admin::app.settings.roles.edit.title')
    </x-slot>

    {!! view_render_event('bagisto.admin.settings.roles.edit.before') !!}

    <!-- Edit Role for  -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <v-edit-user-role></v-edit-user-role>

    {!! view_render_event('bagisto.admin.settings.roles.edit.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-edit-user-role-template">
            <div>
<<<<<<< HEAD
                <x-admin::form 
                    method="PUT" 
=======
                <x-admin::form
                    method="PUT"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    :action="route('admin.settings.roles.update', $role->id)"
                >

                {!! view_render_event('admin.settings.roles.edit.edit_form_controls.before') !!}

                <div class="flex justify-between items-center">
<<<<<<< HEAD
                    <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                        @lang('admin::app.settings.roles.edit.title')
                    </p>

                    <div class="flex gap-x-[10px] items-center">
=======
                    <p class="text-xl text-gray-800 dark:text-white font-bold">
                        @lang('admin::app.settings.roles.edit.title')
                    </p>

                    <div class="flex gap-x-2.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <!-- Cancel Button -->
                        <a
                            href="{{ route('admin.settings.roles.index') }}"
                            class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
                        >
                            @lang('admin::app.settings.roles.edit.back-btn')
                        </a>

                        <!-- Save Button -->
<<<<<<< HEAD
                        <button 
                            type="submit" 
                            class="py-[6px] px-[12px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer"
=======
                        <button
                            type="submit"
                            class="primary-button"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        >
                            @lang('admin::app.settings.roles.edit.save-btn')
                        </button>
                    </div>
                </div>

                <!-- body content -->
<<<<<<< HEAD
                <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
                    <!-- Left sub-component -->
                    <div class=" flex flex-col gap-[8px] flex-1 max-xl:flex-auto">

                        {!! view_render_event('bagisto.admin.settings.roles.edit.card.access-control.before') !!}
    
                        <!-- Access Control Input Fields -->
                        <div class="p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                            <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                                @lang('admin::app.settings.roles.edit.access-control')
                            </p>

                            <div class="mb-[10px]">
                                <x-admin::form.control-group class="mb-[10px]">
                                    <x-admin::form.control-group.label>
                                        @lang('admin::app.settings.roles.edit.permissions')
                                    </x-admin::form.control-group.label>
                                    <x-admin::form.control-group.control
                                        type="select"
                                        name="permission_type" 
                                        id="permission_type"
                                        :label="trans('admin::app.settings.roles.edit.permissions')"
                                        :placeholder="trans('admin::app.settings.roles.edit.permissions')"
                                        v-model="permission_type"
                                    >
                                        <option value="custom">@lang('admin::app.settings.roles.edit.custom')</option>
                                        <option value="all">@lang('admin::app.settings.roles.edit.all')</option>
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="permission_type"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>
                            
                            <!-- Tree structure -->
                            <div 
                                class="mb-[10px]"
                                v-if="permission_type == 'custom'"
                            >
                                <x-admin::tree.view
                                    value-field="key"
                                    id-field="key"
                                    :items="json_encode($acl->items)"
                                    :value="json_encode($role->permissions)" 
=======
                <div class="flex gap-2.5 mt-3.5 max-xl:flex-wrap">
                    <!-- Left sub-component -->
                    <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">

                        {!! view_render_event('bagisto.admin.settings.roles.edit.card.access-control.before') !!}

                        <!-- Access Control Input Fields -->
                        <div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                            <p class="text-base text-gray-800 dark:text-white font-semibold mb-4">
                                @lang('admin::app.settings.roles.edit.access-control')
                            </p>

                            <!-- Permission Type -->
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label>
                                    @lang('admin::app.settings.roles.edit.permissions')
                                </x-admin::form.control-group.label>
                                <x-admin::form.control-group.control
                                    type="select"
                                    name="permission_type"
                                    id="permission_type"
                                    :label="trans('admin::app.settings.roles.edit.permissions')"
                                    :placeholder="trans('admin::app.settings.roles.edit.permissions')"
                                    v-model="permission_type"
                                >
                                    <option value="custom">@lang('admin::app.settings.roles.edit.custom')</option>
                                    <option value="all">@lang('admin::app.settings.roles.edit.all')</option>
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="permission_type"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                            
                            <!-- Tree structure -->
                            <div v-if="permission_type == 'custom'">
                                <x-admin::tree.view
                                    input-type="checkbox"
                                    value-field="key"
                                    id-field="key"
                                    :items="json_encode($acl->items)"
                                    :value="json_encode($role->permissions)"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :fallback-locale="config('app.fallback_locale')"
                                >
                                </x-admin::tree.view>
                            </div>
                        </div>

                        {!! view_render_event('bagisto.admin.settings.roles.edit.card.access-control.after') !!}

                    </div>

                    <!-- Right sub-component -->
<<<<<<< HEAD
                    <div class="flex flex-col gap-[8px] w-[360px] max-w-full max-sm:w-full">
=======
                    <div class="flex flex-col gap-2 w-[360px] max-w-full max-sm:w-full">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                        {!! view_render_event('bagisto.admin.settings.roles.edit.card.accordion.general.before') !!}

                        <x-admin::accordion>
                            <x-slot:header>
<<<<<<< HEAD
                                <div class="flex items-center justify-between p-[6px]">
                                    <p class="p-[10px] text-gray-600 dark:text-gray-300 text-[16px] font-semibold">
=======
                                <div class="flex items-center justify-between">
                                    <p class="p-2.5 text-base text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @lang('admin::app.settings.roles.edit.general')
                                    </p>
                                </div>
                            </x-slot:header>
<<<<<<< HEAD
                    
                            <x-slot:content>
                                <div class="mb-[10px]">
                                    <x-admin::form.control-group class="mb-[10px]">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.settings.roles.edit.name')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="name"
                                            value="{{ old('name') ?: $role->name }}"
                                            id="name"
                                            rules="required"
                                            :label="trans('admin::app.settings.roles.edit.name')"
                                            :placeholder="trans('admin::app.settings.roles.edit.name')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="name"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                
                                    <x-admin::form.control-group class="mb-[10px]">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.settings.roles.edit.description')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="textarea"
                                            name="description"
                                            value="{{ old('description') ?: $role->description }}"
                                            id="description"
                                            rules="required"
                                            :label="trans('admin::app.settings.roles.edit.description')"
                                            :placeholder="trans('admin::app.settings.roles.edit.description')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="description"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>
=======

                            <x-slot:content>
                                <!-- Name -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.roles.edit.name')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="name"
                                        value="{{ old('name') ?: $role->name }}"
                                        id="name"
                                        rules="required"
                                        :label="trans('admin::app.settings.roles.edit.name')"
                                        :placeholder="trans('admin::app.settings.roles.edit.name')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="name"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Description -->
                                <x-admin::form.control-group class="!mb-0">
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.roles.edit.description')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="textarea"
                                        name="description"
                                        value="{{ old('description') ?: $role->description }}"
                                        id="description"
                                        rules="required"
                                        :label="trans('admin::app.settings.roles.edit.description')"
                                        :placeholder="trans('admin::app.settings.roles.edit.description')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="description"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            </x-slot:content>
                        </x-admin::accordion>

                        {!! view_render_event('bagisto.admin.settings.roles.edit.card.accordion.general.after') !!}

                    </div>
                </div>

                {!! view_render_event('admin.settings.roles.edit.edit_form_controls.after') !!}

                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-edit-user-role', {
                template: '#v-edit-user-role-template',

                data() {
                    return {
                        permission_type: "{{ $role->permission_type }}"
                    };
                }
            })
        </script>
    @endPushOnce
<<<<<<< HEAD
</x-admin::layouts>
=======
</x-admin::layouts>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
