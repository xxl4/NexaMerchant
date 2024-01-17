<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.settings.themes.index.title')
<<<<<<< HEAD
    </x-slot:title>
   
    <div class="flex justify-between items-center">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('admin::app.settings.themes.index.title')
        </p>
        
        <div class="flex gap-x-[10px] items-center">
            <div class="flex gap-x-[10px] items-center">
                {!! view_render_event('bagisto.admin.settings.themes.create.before') !!}

=======
    </x-slot>
   
    <div class="flex justify-between items-center">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            @lang('admin::app.settings.themes.index.title')
        </p>
        
        <div class="flex gap-x-2.5 items-center">
            <div class="flex gap-x-2.5 items-center">
                {!! view_render_event('bagisto.admin.settings.themes.create.before') !!}

                <!-- Create Button -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <v-create-theme-form>
                    <button
                        type="button"
                        class="primary-button"
                    >
                        @lang('admin::app.settings.themes.index.create-btn')
                    </button>  
                </v-create-theme-form>

                {!! view_render_event('bagisto.admin.settings.themes.create.after') !!}
<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </div>
        </div>
    </div>
    
    {!! view_render_event('bagisto.admin.settings.themes.list.before') !!}

    <x-admin::datagrid :src="route('admin.settings.themes.index')"></x-admin::datagrid>

    {!! view_render_event('bagisto.admin.settings.themes.list.after') !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-create-theme-form-template">
            <div>
                <!-- Theme Create Button -->
                @if (bouncer()->hasPermission('settings.themes.create'))
                    <button
                        type="button"
                        class="primary-button"
                        @click="$refs.themeCreateModal.toggle()"
                    >
                        @lang('admin::app.settings.themes.index.create-btn')
                    </button>
                @endif

<<<<<<< HEAD
=======
                <!-- Modal Form -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <form @submit="handleSubmit($event, create)">
                        <!-- Customer Create Modal -->
                        <x-admin::modal ref="themeCreateModal">
<<<<<<< HEAD
                            <x-slot:header>
                                <!-- Modal Header -->
                                <p class="text-[18px] text-gray-800 dark:text-white font-bold">
=======
                            <!-- Modal Header -->
                            <x-slot:header>
                                <p class="text-lg text-gray-800 dark:text-white font-bold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.settings.themes.create.title')
                                </p>
                            </x-slot:header>

<<<<<<< HEAD
                            <x-slot:content>
                                <!-- Modal Content -->
                                <div class="px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">
                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.settings.themes.create.name')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="name"
                                            rules="required"
                                            :label="trans('admin::app.settings.themes.create.name')"
                                            :placeholder="trans('admin::app.settings.themes.create.name')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.settings.themes.create.sort-order')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="sort_order"
                                            rules="required|numeric"
                                            :label="trans('admin::app.settings.themes.create.sort-order')"
                                            :placeholder="trans('admin::app.settings.themes.create.sort-order')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error control-name="sort_order"></x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.settings.themes.create.type.title')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="type"
                                            rules="required"
                                            value="product_carousel"
                                        >
                                            <option 
                                                v-for="(type, key) in themeTypes"
                                                :value="key"
                                                :text="type"
                                            >
                                            </option>
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error control-name="type"></x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <x-admin::form.control-group>
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.settings.themes.edit.channels')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="channel_id"
                                            rules="required"
                                            :value="1"
                                        >
                                            @foreach (core()->getAllChannels() as $channel)
                                                <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                            @endforeach 
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error control-name="type"></x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>
=======
                            <!-- Modal Content -->
                            <x-slot:content>
                                <!-- Name -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.themes.create.name')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="name"
                                        rules="required"
                                        :label="trans('admin::app.settings.themes.create.name')"
                                        :placeholder="trans('admin::app.settings.themes.create.name')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Sort Order -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.themes.create.sort-order')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="sort_order"
                                        rules="required|numeric"
                                        :label="trans('admin::app.settings.themes.create.sort-order')"
                                        :placeholder="trans('admin::app.settings.themes.create.sort-order')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="sort_order"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Type -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.themes.create.type.title')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="select"
                                        name="type"
                                        rules="required"
                                        value="product_carousel"
                                    >
                                        <option 
                                            v-for="(type, key) in themeTypes"
                                            :value="key"
                                            :text="type"
                                        >
                                        </option>
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="type"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>

                                <!-- Channels -->
                                <x-admin::form.control-group>
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.settings.themes.edit.channels')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="select"
                                        name="channel_id"
                                        rules="required"
                                        :value="1"
                                    >
                                        @foreach (core()->getAllChannels() as $channel)
                                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                        @endforeach 
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error control-name="type"></x-admin::form.control-group.error>
                                </x-admin::form.control-group>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            </x-slot:content>

                            <x-slot:footer>
                                <!-- Modal Submission -->
<<<<<<< HEAD
                                <div class="flex gap-x-[10px] items-center">
=======
                                <div class="flex gap-x-2.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <button
                                        type="submit"
                                        class="primary-button"
                                    >
                                        @lang('admin::app.settings.themes.create.save-btn')
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-admin::modal>
                    </form>
                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-create-theme-form', {
                template: '#v-create-theme-form-template',

                data() {
                    return {
                        themeTypes: {
                            product_carousel: "@lang('admin::app.settings.themes.create.type.product-carousel')",
                            category_carousel: "@lang('admin::app.settings.themes.create.type.category-carousel')",
                            static_content: "@lang('admin::app.settings.themes.create.type.static-content')",
                            image_carousel: "@lang('admin::app.settings.themes.create.type.image-carousel')",
                            footer_links: "@lang('admin::app.settings.themes.create.type.footer-links')",
<<<<<<< HEAD
=======
                            services_content: "@lang('admin::app.settings.themes.create.type.services-content')",
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        }
                    };
                },

                methods: {
                    create(params, { setErrors }) {
                        this.$axios.post('{{ route('admin.settings.themes.store') }}', params)
                            .then((response) => {
                                if (response.data.redirect_url) {
                                    window.location.href = response.data.redirect_url;
                                } 
                            })
                            .catch((error) => {
                                if (error.response.status == 422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    },
                },
            });
        </script>
    @endPushOnce
    
</x-admin::layouts>