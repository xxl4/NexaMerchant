<x-admin::layouts>
<<<<<<< HEAD
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('admin::app.marketing.communications.templates.edit.title')
    </x-slot:title>

    {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.before') !!}

    {{-- Input Form --}}
=======
    <!-- Title of the page -->
    <x-slot:title>
        @lang('admin::app.marketing.communications.templates.edit.title')
    </x-slot>

    {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.before') !!}

    <!-- Input Form -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-admin::form
        :action="route('admin.marketing.communications.email_templates.update', $template->id)"
        method="PUT"
    >

        {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.edit_form_controls.before') !!}

        <div class="flex justify-between items-center">
<<<<<<< HEAD
            <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                @lang('admin::app.marketing.communications.templates.edit.title')
            </p>

            <div class="flex gap-x-[10px] items-center">
                {{-- Cancel Button --}}
=======
            <p class="text-xl text-gray-800 dark:text-white font-bold">
                @lang('admin::app.marketing.communications.templates.edit.title')
            </p>

            <div class="flex gap-x-2.5 items-center">
                <!-- Cancel Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <a
                    href="{{ route('admin.marketing.communications.email_templates.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
                >
                    @lang('admin::app.marketing.communications.templates.edit.back-btn')
                </a>

<<<<<<< HEAD
                {{-- Save Button --}}
                <button
                    type="submit"
                    class="py-[6px] px-[12px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer"
=======
                <!-- Save Button -->
                <button
                    type="submit"
                    class="primary-button"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                >
                    @lang('admin::app.marketing.communications.templates.edit.save-btn')
                </button>
            </div>
        </div>

<<<<<<< HEAD
        {{-- body content --}}
        <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
            {{-- Left sub-component --}}
            <div class=" flex flex-col gap-[8px] flex-1 max-xl:flex-auto">

                {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.card.content.before') !!}

                {{--Content --}}
                <div class="p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                    <div class="w-full">
                        {{-- Template Textarea --}}
=======
        <!-- body content -->
        <div class="flex gap-2.5 mt-3.5 max-xl:flex-wrap">
            <!-- Left sub-component -->
            <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">

                {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.card.content.before') !!}

                <!--Content -->
                <div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                    <div class="w-full">
                        <!-- Template Textarea -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="required">
                                @lang('admin::app.marketing.communications.templates.create.content')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="textarea"
                                name="content"
                                value="{{ old('content') ?: $template->content }}"
                                rules="required"
                                id="content"
                                :label="trans('admin::app.marketing.communications.templates.edit.content')"
                                :placeholder="trans('admin::app.marketing.communications.templates.edit.content')"
                                :tinymce="true"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="content"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                </div>

                {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.card.content.after') !!}

            </div>

<<<<<<< HEAD
            {{-- Right sub-component --}}
            <div class="flex flex-col gap-[8px] w-[360px] max-w-full max-sm:w-full">
                {{-- General --}}

                {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.card.accordion.general.before') !!}

                <div class="bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                    <x-admin::accordion>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <p class="p-[10px] text-gray-800 dark:text-white text-[16px] font-semibold">
=======
            <!-- Right sub-component -->
            <div class="flex flex-col gap-2 w-[360px] max-w-full max-sm:w-full">
                <!-- General -->

                {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.card.accordion.general.before') !!}

                <div class="bg-white dark:bg-gray-900 rounded box-shadow">
                    <x-admin::accordion>
                        <x-slot:header>
                            <div class="flex items-center justify-between">
                                <p class="p-2.5 text-gray-800 dark:text-white text-base  font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.marketing.communications.templates.edit.general')
                                </p>
                            </div>
                        </x-slot:header>

                        <x-slot:content>
<<<<<<< HEAD
                            <div class="w-full mb-[10px]">
                                {{-- Template Name --}}
=======
                            <div class="w-full mb-2.5">
                                <!-- Template Name -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.marketing.communications.templates.edit.name')
                                    </x-admin::form.control-group.label>
                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="name"
                                        value="{{ old('name') ?: $template->name }}"
                                        rules="required"
                                        :label="trans('admin::app.marketing.communications.templates.edit.name')"
                                        :placeholder="trans('admin::app.marketing.communications.templates.edit.name')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="name"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

<<<<<<< HEAD
                                {{-- Template Status --}}
=======
                                <!-- Template Status -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.marketing.communications.templates.edit.status')
                                    </x-admin::form.control-group.label>

                                    @php $selectedOption = old('status') ?: $template->status @endphp

                                    <x-admin::form.control-group.control
                                        type="select"
                                        name="status"
                                        rules="required"
                                        :value="$selectedOption"
                                        :label="trans('admin::app.marketing.communications.templates.edit.status')"
                                    >
                                        @foreach (['active', 'inactive', 'draft'] as $state)
                                            <option
                                                value="{{ $state }}"
                                            >
                                                @lang('admin::app.marketing.communications.templates.edit.' . $state)
                                            </option>
                                        @endforeach
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="status"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>
                        </x-slot:content>
                    </x-admin::accordion>
                </div>
                
                {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.card.accordion.general.after') !!}

            </div>
        </div>


        {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.edit_form_controls.before') !!}

    </x-admin::form>

    {!! view_render_event('bagisto.admin.marketing.communications.templates.edit.after') !!}

</x-admin::layouts>
