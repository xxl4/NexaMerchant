{!! view_render_event('bagisto.admin.catalog.product.edit.form.types.configurable.before', ['product' => $product]) !!}

<v-product-variations :errors="errors"></v-product-variations>

{!! view_render_event('bagisto.admin.catalog.product.edit.form.types.configurable.after', ['product' => $product]) !!}

@pushOnce('scripts')
<<<<<<< HEAD
    {{-- Variations Template --}}
    <script type="text/x-template" id="v-product-variations-template">
        <div class="relative bg-white dark:bg-gray-900  rounded-[4px] box-shadow">
            <!-- Panel Header -->
            <div class="flex flex-wrap gap-[10px] justify-between mb-[10px] p-[16px]">
                <div class="flex flex-col gap-[8px]">
                    <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                        @lang('admin::app.catalog.products.edit.types.configurable.title')
                    </p>

                    <p class="text-[12px] text-gray-500 dark:text-gray-300 font-medium">
=======
    <!-- Variations Template -->
    <script type="text/x-template" id="v-product-variations-template">
        <div class="relative bg-white dark:bg-gray-900 rounded box-shadow">
            <!-- Panel Header -->
            <div class="flex flex-wrap gap-2.5 justify-between mb-2.5 p-4">
                <div class="flex flex-col gap-2">
                    <p class="text-base text-gray-800 dark:text-white font-semibold">
                        @lang('admin::app.catalog.products.edit.types.configurable.title')
                    </p>

                    <p class="text-xs text-gray-500 dark:text-gray-300 font-medium">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang('admin::app.catalog.products.edit.types.configurable.info')
                    </p>
                </div>
                
                <!-- Add Button -->
<<<<<<< HEAD
                <div class="flex gap-x-[4px] items-center">
=======
                <div class="flex gap-x-1 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <div
                        class="secondary-button"
                        @click="$refs.variantCreateModal.open()"
                    >
                        @lang('admin::app.catalog.products.edit.types.configurable.add-btn')
                    </div>
                </div>
            </div>

            <template v-if="variants.length">
                <!-- Mass Action Vue Component -->
                <v-product-variations-mass-action
                    :super-attributes="superAttributes"
                    :variants="variants"
                >
                </v-product-variations-mass-action>

                <!-- Panel Content -->
                <div class="grid">
                    <v-product-variation-item
                        v-for='(variant, index) in variants'
                        :key="index"
                        :index="index"
                        :variant="variant"
                        :attributes="superAttributes"
                        @onRemoved="removeVariant"
                        :errors="errors"
                    ></v-product-variation-item>
                </div>
            </template>

            <!-- For Empty Variations -->
            <template v-else>
<<<<<<< HEAD
                <div class="grid gap-[14px] justify-center justify-items-center py-[40px] px-[10px]">
                    <!-- Placeholder Image -->
                    <img
                        src="{{ bagisto_asset('images/icon-add-product.svg') }}"
                        class="w-[80px] h-[80px] dark:invert dark:mix-blend-exclusion"
                    />

                    <!-- Add Variants Information -->
                    <div class="flex flex-col items-center">
                        <p class="text-[16px] text-gray-400 font-semibold">
=======
                <div class="grid gap-3.5 justify-center justify-items-center py-10 px-2.5">
                    <!-- Placeholder Image -->
                    <img
                        src="{{ bagisto_asset('images/icon-add-product.svg') }}"
                        class="w-20 h-20 dark:invert dark:mix-blend-exclusion"
                    />

                    <!-- Add Variants Information -->
                    <div class="flex flex-col gap-1.5 items-center">
                        <p class="text-base text-gray-400 font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.catalog.products.edit.types.configurable.empty-title')
                        </p>

                        <p class="text-gray-400">
                            @lang('admin::app.catalog.products.edit.types.configurable.empty-info')
                        </p>
                    </div>
                    
                    <!-- Add Row Button -->
                    <div
<<<<<<< HEAD
                        class="secondary-button text-[14px]"
=======
                        class="secondary-button text-sm"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @click="$refs.variantCreateModal.open()"
                    >
                        @lang('admin::app.catalog.products.edit.types.configurable.add-btn')
                    </div>
                </div>
            </template>

            <!-- Add Variant Form Modal -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
                <form @submit="handleSubmit($event, addVariant)">
                    <!-- Customer Create Modal -->
                    <x-admin::modal ref="variantCreateModal">
<<<<<<< HEAD
                        <x-slot:header>
                            <!-- Modal Header -->
                            <p class="text-[18px] text-gray-800 dark:text-white font-bold">
=======
                        <!-- Modal Header -->
                        <x-slot:header>
                            <p class="text-lg text-gray-800 dark:text-white font-bold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                @lang('admin::app.catalog.products.edit.types.configurable.create.title')
                            </p>
                        </x-slot:header>
        
<<<<<<< HEAD
                        <x-slot:content>
                            <!-- Modal Content -->
                            <div class="px-[16px] py-[10px] border-b-[1px] dark:border-gray-800  ">
                                <x-admin::form.control-group
                                    v-for='(attribute, index) in superAttributes'
                                >
                                    <x-admin::form.control-group.label class="required">
                                        @{{ attribute.admin_name }}
                                    </x-admin::form.control-group.label>

                                    <v-field
                                        as="select"
                                        :name="attribute.code"
                                        class="custom-select flex w-full min-h-[39px] py-[6px] px-[12px] bg-white dark:bg-gray-900  border dark:border-gray-800   rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
                                        :class="[errors[attribute.code] ? 'border border-red-500' : '']"
                                        rules="required"
                                        :label="attribute.admin_name"
                                    >
                                        <option
                                            v-for="option in attribute.options"
                                            :value="option.id"
                                        >
                                            @{{ option.admin_name }}
                                        </option>
                                    </v-field>

                                    <v-error-message
                                        :name="attribute.code"
                                        v-slot="{ message }"
                                    >
                                        <p
                                            class="mt-1 text-red-600 text-xs italic"
                                            v-text="message"
                                        >
                                        </p>
                                    </v-error-message>
                                </x-admin::form.control-group>
                            </div>
                        </x-slot:content>
        
                        <x-slot:footer>
                            <!-- Modal Submission -->
                            <div class="flex gap-x-[10px] items-center">
=======
                        <!-- Modal Content -->
                        <x-slot:content>
                            <x-admin::form.control-group
                                v-for='(attribute, index) in superAttributes'
                            >
                                <x-admin::form.control-group.label class="required">
                                    @{{ attribute.admin_name }}
                                </x-admin::form.control-group.label>

                                <v-field
                                    as="select"
                                    :name="attribute.code"
                                    class="custom-select flex w-full min-h-[39px] py-1.5 px-3 bg-white dark:bg-gray-900  border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
                                    :class="[errors[attribute.code] ? 'border border-red-500' : '']"
                                    rules="required"
                                    :label="attribute.admin_name"
                                >
                                    <option
                                        v-for="option in attribute.options"
                                        :value="option.id"
                                    >
                                        @{{ option.admin_name }}
                                    </option>
                                </v-field>

                                <v-error-message
                                    :name="attribute.code"
                                    v-slot="{ message }"
                                >
                                    <p
                                        class="mt-1 text-red-600 text-xs italic"
                                        v-text="message"
                                    >
                                    </p>
                                </v-error-message>
                            </x-admin::form.control-group>
                        </x-slot:content>
        
                        <!-- Modal Footer -->
                        <x-slot:footer>
                            <!-- Modal Submission -->
                            <div class="flex gap-x-2.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <button 
                                    type="submit"
                                    class="primary-button"
                                >
                                    @lang('admin::app.catalog.products.edit.types.configurable.create.save-btn')
                                </button>
                            </div>
                        </x-slot:footer>
                    </x-admin::modal>
                </form>
            </x-admin::form>
        </div>
    </script>

<<<<<<< HEAD
    {{-- Variations Mass Action Template --}}
    <script type="text/x-template" id="v-product-variations-mass-action-template">
        <!-- Mass Actions -->
        <div class="flex gap-[5px] items-center px-[16px]">
            <span
                class="flex icon-uncheckbox text-[24px] cursor-pointer select-none"
=======
    <!-- Variations Mass Action Template -->
    <script type="text/x-template" id="v-product-variations-mass-action-template">
        <!-- Mass Actions -->
        <div class="flex gap-1.5 items-center px-4">
            <span
                class="flex icon-uncheckbox text-2xl cursor-pointer select-none"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                :class="{
                    '!icon-checked text-blue-600': variants.length == selectedVariants.length,
                    '!icon-checkbox-partial text-blue-600': selectedVariants.length && variants.length != selectedVariants.length
                }"
                for="select-all-variants"
                @click="selectAll"
            >
            </span>

            <!-- Attribute Options Selector -->
            <x-admin::dropdown v-bind:close-on-click="false">
                <!-- Dropdown Toggler -->
                <x-slot:toggle>
                    <button
                        type="button"
<<<<<<< HEAD
                        class="flex items-center p-[6px] rounded-[6px] text-[12px] text-blue-600 font-semibold transition-all hover:bg-gray-100 dark:hover:bg-gray-950  focus:bg-gray-100 cursor-pointer"
                    >
                        @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.select-variants')

                        <i class="icon-sort-down text-[24px] text-blue-600"></i>
=======
                        class="flex items-center p-1.5 rounded-md text-xs text-blue-600 font-semibold transition-all hover:bg-gray-100 dark:hover:bg-gray-950  focus:bg-gray-100 cursor-pointer"
                    >
                        @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.select-variants')

                        <i class="icon-sort-down text-2xl text-blue-600"></i>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    </button>
                </x-slot:toggle>

                <!-- Dropdown Content -->
<<<<<<< HEAD
                <x-slot:content class="px-[0px] py-[15px]">
                    <template v-for="attribute in superAttributes">
                        <label
                            class="flex gap-[10px] items-center px-5 py-2 text-[14px] text-gray-600 dark:text-gray-300 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-950  select-none"
=======
                <x-slot:content class="px-0 py-4">
                    <template v-for="attribute in superAttributes">
                        <label
                            class="flex gap-2.5 items-center px-5 py-2 text-sm text-gray-600 dark:text-gray-300 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-950  select-none"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            :for="'attribute_' + attribute.id + '_option_' + option.id"
                            v-for="option in usedAttributeOptions(attribute)"
                        >
                            <div class="flex select-none">
                                <input
                                    type="checkbox"
                                    :id="'attribute_' + attribute.id + '_option_' + option.id"
                                    class="hidden peer"
                                    :checked="isAttributeOptionChecked(attribute, option)"
                                    @change="selectVariantsByAttributeOption(attribute, option)"
                                >

                                <label
<<<<<<< HEAD
                                    class="icon-uncheckbox text-[24px] peer-checked:icon-checked peer-checked:text-blue-600  cursor-pointer"
=======
                                    class="icon-uncheckbox text-2xl peer-checked:icon-checked peer-checked:text-blue-600  cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :for="'attribute_' + attribute.id + '_option_' + option.id"
                                >
                                </label>
                            </div>

<<<<<<< HEAD
                            <div class="flex gap-[5px] items-center">
=======
                            <div class="flex gap-1.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <span class="text-gray-800 dark:text-white">
                                    @{{ attribute.admin_name }}
                                </span>

<<<<<<< HEAD
                                <i class="icon-sort-right text-[18px]"></i>
=======
                                <i class="icon-sort-right text-lg"></i>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                                @{{ option.admin_name }}
                            </div>
                        </label>
                    </template>
                </x-slot:content>
            </x-admin::dropdown>

            <!-- Actions Selector -->
            <x-admin::dropdown v-if="selectedVariants.length">
                <!-- Dropdown Toggler -->
                <x-slot:toggle>
                    <button
                        type="button"
<<<<<<< HEAD
                        class="flex items-center p-[6px] rounded-[6px] text-[12px] text-blue-600 font-semibold transition-all hover:bg-gray-100 dark:hover:bg-gray-950  focus:bg-gray-100 cursor-pointer"
                    >
                        @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.select-action')

                        <i class="icon-sort-down text-[24px] text-blue-600"></i>
=======
                        class="flex items-center p-1.5 rounded-md text-xs text-blue-600 font-semibold transition-all hover:bg-gray-100 dark:hover:bg-gray-950  focus:bg-gray-100 cursor-pointer"
                    >
                        @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.select-action')

                        <i class="icon-sort-down text-2xl text-blue-600"></i>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    </button>
                </x-slot:toggle>

                <!-- Dropdown Content -->
                <x-slot:menu>
                    <x-admin::dropdown.menu.item
                        v-for="type in updateTypes"
                        @click="edit(type.key)"
                    >
                        @{{ type.title }}
                    </x-admin::dropdown.menu.item>
                </x-slot:menu>
            </x-admin::dropdown>

            <!-- Edit Drawer -->
            <x-admin::form
                v-slot="{ meta, errors, handleSubmit }"
                as="div"
            >
<<<<<<< HEAD
                <form @submit="handleSubmit($event, update)">
=======
                <form @submit="handleSubmit($event, updateAll)">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <!-- Edit Drawer -->
                    <x-admin::drawer
                        ref="updateVariantsDrawer"
                        class="text-left"
                    >
                        <!-- Drawer Header -->
                        <x-slot:header>
                            <div class="flex justify-between items-center">
<<<<<<< HEAD
                                <p class="text-[20px] font-medium dark:text-white">
                                    @{{ updateTypes[selectedType].title }}
                                </p>

                                <button class="mr-[45px] primary-button">
=======
                                <p class="text-xl font-medium dark:text-white">
                                    @{{ updateTypes[selectedType].title }}
                                </p>

                                <button
                                    class="ltr:mr-11 rtl:ml-11 primary-button"
                                    type="submit"
                                >
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang('admin::app.catalog.products.edit.types.configurable.edit.save-btn')
                                </button>
                            </div>
                        </x-slot:header>

                        <!-- Drawer Content -->
<<<<<<< HEAD
                        <x-slot:content class="p-[16px]">
                            <!-- Mass Update -->
=======
                        <x-slot:content class="p-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <x-admin::form
                                v-slot="{ meta, errors, handleSubmit }"
                                as="div"
                            >
                                <form @submit="handleSubmit($event, update)">
<<<<<<< HEAD
                                    <template v-if="selectedType == 'editPrices'">
                                        <div class="pb-[10px] border-b-[1px] dark:border-gray-800  ">
                                            <div class="flex gap-[10px] items-center">
                                                <x-admin::form.control-group class="flex-1 mb-0">
=======
                                    <!-- Mass Update -->
                                    <template v-if="selectedType == 'editPrices'">
                                        <div class="pb-2.5 border-b dark:border-gray-800">
                                            <div class="flex gap-2.5 items-end">
                                                <x-admin::form.control-group class="flex-1 !mb-0">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    <x-admin::form.control-group.label>
                                                        @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-sku')
                                                    </x-admin::form.control-group.label>
                        
<<<<<<< HEAD

                                                    <div class="relative">
                                                        <span class="absolute ltr:left-[15px] rtl:right-[15px] top-[50%] -translate-y-[50%] text-gray-500">
=======
                                                    <div class="relative">
                                                        <span class="absolute ltr:left-4 rtl:right-4 top-1/2 -translate-y-1/2 text-gray-500">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                            {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}
                                                        </span>

                                                        <x-admin::form.control-group.control
                                                            type="text"
                                                            name="price"
<<<<<<< HEAD
                                                            class="ltr:pl-[30px] rtl:pr-[30px]"
=======
                                                            class="ltr:pl-8 rtl:pr-8"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                            ::rules="{required: true, decimal: true, min_value: 0}"
                                                            :label="trans('admin::app.catalog.products.edit.types.configurable.mass-edit.price')"
                                                        >
                                                        </x-admin::form.control-group.control>
                                                    </div>
                                                </x-admin::form.control-group>

<<<<<<< HEAD
                                                <button class="secondary-button mt-[15px]">
=======
                                                <button class="secondary-button">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-btn')
                                                </button>
                                            </div>
                    
                                            <x-admin::form.control-group.error control-name="price"></x-admin::form.control-group.error>
                                        </div>
                                    </template>

                                    <template v-if="selectedType == 'editInventories'">
<<<<<<< HEAD
                                        <div class="pb-[10px] border-b-[1px] dark:border-gray-800  ">
                                            <div class="grid grid-cols-3 gap-[16px] mb-[10px]">
                                                <x-admin::form.control-group
                                                    class="mb-[0px]"
=======
                                        <div class="pb-2.5 border-b dark:border-gray-800">
                                            <div class="grid grid-cols-3 gap-4 mb-2.5">
                                                <x-admin::form.control-group
                                                    class="!mb-0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    v-for='inventorySource in inventorySources'
                                                >
                                                    <x-admin::form.control-group.label>
                                                        @{{ inventorySource.name }}
                                                    </x-admin::form.control-group.label>

                                                    <v-field
                                                        type="text"
                                                        :name="'inventories[' + inventorySource.id + ']'"
<<<<<<< HEAD
                                                        class="flex w-full min-h-[39px] py-[6px] px-[12px] bg-white dark:bg-gray-900  border dark:border-gray-800   rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
=======
                                                        class="flex w-full min-h-[39px] py-1.5 px-3 bg-white dark:bg-gray-900  border dark:border-gray-800   rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                        :class="[errors['inventories[' + inventorySource.id + ']'] ? 'border border-red-500' : '']"
                                                        rules="required|numeric|min:0"
                                                        :label="inventorySource.name"
                                                    >
                                                    </v-field>

                                                    <v-error-message
                                                        :name="'inventories[' + inventorySource.id + ']'"
                                                        v-slot="{ message }"
                                                    >
                                                        <p
                                                            class="mt-1 text-red-600 text-xs italic"
                                                            v-text="message"
                                                        >
                                                        </p>
                                                    </v-error-message>
                                                </x-admin::form.control-group>
                                            </div>

                                            <button class="secondary-button">
                                                @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-btn')
                                            </button>
                                        </div>
                                    </template>

                                    <template v-if="selectedType == 'addImages'">
<<<<<<< HEAD
                                        <div class="pb-[10px] border-b-[1px] dark:border-gray-800  ">
                                            <v-media-images
                                                name="images"
                                                class="mb-[10px]"
=======
                                        <div class="pb-2.5 border-b dark:border-gray-800">
                                            <v-media-images
                                                name="images"
                                                class="mb-2.5"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                v-bind:allow-multiple="true"
                                                :uploaded-images="updateTypes[selectedType].images"
                                            ></v-media-images>

                                            <button class="secondary-button">
                                                @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-btn')
                                            </button>
                                        </div>
                                    </template>
<<<<<<< HEAD
=======

                                    <template v-if="selectedType == 'editWeight'">
                                        <div class="pb-2.5 border-b dark:border-gray-800">
                                            <div class="flex gap-2.5 items-end">
                                                <x-admin::form.control-group class="flex-1 !mb-0">
                                                    <x-admin::form.control-group.label>
                                                        @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-weight')
                                                    </x-admin::form.control-group.label>
                        
                                                    <div class="relative">
                                                        <x-admin::form.control-group.control
                                                            type="text"
                                                            name="weight"
                                                            value="0"
                                                            ::rules="{ required: true, regex: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]+\.[0-9]*[1-9][0-9]*)$/ }"
                                                            :label="trans('admin::app.catalog.products.edit.types.configurable.mass-edit.weight')"
                                                        >
                                                        </x-admin::form.control-group.control>
                                                    </div>
                                                </x-admin::form.control-group>

                                                <button class="secondary-button">
                                                    @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-btn')
                                                </button>
                                            </div>
                    
                                            <x-admin::form.control-group.error control-name="weight"></x-admin::form.control-group.error>
                                        </div>
                                    </template>

                                    <template v-if="selectedType == 'editName'">
                                        <div class="pb-2.5 border-b dark:border-gray-800">
                                            <div class="flex gap-2.5 items-end">
                                                <x-admin::form.control-group class="flex-1 !mb-0">
                                                    <x-admin::form.control-group.label>
                                                        @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-name')
                                                    </x-admin::form.control-group.label>

                                                    <div class="relative">
                                                        <x-admin::form.control-group.control
                                                            type="text"
                                                            name="name"
                                                            ::rules="{ required: true }"
                                                            :label="trans('admin::app.catalog.products.edit.types.configurable.mass-edit.name')"
                                                        ></x-admin::form.control-group.control>
                                                    </div>
                                                </x-admin::form.control-group>

                                                <button class="secondary-button">
                                                    @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-btn')
                                                </button>
                                            </div>
                    
                                            <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                                        </div>
                                    </template>

                                    <template v-if="selectedType == 'editStatus'">
                                        <div class="pb-2.5 border-b dark:border-gray-800">
                                            <div class="flex gap-2.5 items-end">
                                                <x-admin::form.control-group class="flex-1 !mb-0">
                                                    <x-admin::form.control-group.label>
                                                        @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-status')
                                                    </x-admin::form.control-group.label>

                                                    <div class="relative">
                                                        <x-admin::form.control-group.control
                                                            type="select"
                                                            name="status"
                                                            ::rules="{ required: true }"
                                                            :label="trans('admin::app.catalog.products.edit.types.configurable.mass-edit.status')"
                                                        >
                                                            <option value="1">@lang('admin::app.catalog.products.edit.types.configurable.edit.enabled')</option>
                                                            <option value="0">@lang('admin::app.catalog.products.edit.types.configurable.edit.disabled')</option>g
                                                        </x-admin::form.control-group.control>
                                                    </div>
                                                </x-admin::form.control-group>

                                                <button class="secondary-button">
                                                    @lang('admin::app.catalog.products.edit.types.configurable.mass-edit.apply-to-all-btn')
                                                </button>
                                            </div>
                    
                                            <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                                        </div>
                                    </template>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                </form>
                            </x-admin::form>

                            <div
<<<<<<< HEAD
                                class="py-[16px] border-b-[1px] dark:border-gray-800   last:border-b-0"
                                :class="{'flex gap-[10px] justify-between items-center': selectedType == 'editPrices'}"
                                v-for="variant in selectedVariants"
                            >
                                <div class="text-[14px] text-gray-800">
                                    <span
                                        class="after:content-['_/_'] last:after:content-['']"
=======
                                class="py-4 border-b dark:border-gray-800 last:border-b-0"
                                :class="{'grid grid-cols-2 gap-3 justify-between items-center': [
                                        'editName', 'editSku',
                                ].includes(selectedType), 'flex justify-between items-center' : [
                                    'editWeight', 'editPrices', 'editStatus',
                                ].includes(selectedType)}"
                                v-for="variant in tempSelectedVariants"
                            >
                                <div class="text-sm text-gray-800">
                                    <span
                                        class="dark:text-white after:content-['_/_'] last:after:content-['']"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        v-for='(attribute, index) in superAttributes'
                                    >
                                        @{{ optionName(attribute, variant[attribute.code]) }}
                                    </span>
                                </div>

                                <template v-if="selectedType == 'editPrices'">
                                    <x-admin::form.control-group class="flex-1 mb-0 max-w-[115px]">
                                        <div class="relative">
<<<<<<< HEAD
                                            <span class="absolute ltr:left-[15px] rtl:right-[15px] top-[50%] -translate-y-[50%] text-gray-500">
=======
                                            <span class="absolute ltr:left-4 rtl:right-4 top-1/2 -translate-y-1/2 text-gray-500">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}
                                            </span>

                                            <v-field
                                                type="text"
                                                :name="'variants[' + variant.id + ']'"
<<<<<<< HEAD
                                                :value="variant.price"
                                                class="flex w-full min-h-[39px] py-[6px] ltr:pl-[30px] rtl:pr-[30px] bg-white dark:bg-gray-900  border dark:border-gray-800   rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
=======
                                                v-model="variant.price"
                                                class="flex w-full min-h-[39px] py-1.5 ltr:pl-8 rtl:pr-8 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                :class="[errors['variants[' + variant.id + ']'] ? 'border border-red-500' : '']"
                                                :rules="{required: true, decimal: true, min_value: 0}"
                                                label="@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.price')"
                                            >
                                            </v-field>
                                        </div>

                                        <v-error-message
                                            :name="'variants[' + variant.id + ']'"
                                            v-slot="{ message }"
                                        >
                                            <p
                                                class="mt-1 text-red-600 text-xs italic"
                                                v-text="message"
                                            >
                                            </p>
                                        </v-error-message>
                                    </x-admin::form.control-group>
                                </template>

<<<<<<< HEAD
                                <template v-if="selectedType == 'editInventories'">
                                    <x-admin::form.control-group class="mt-[10px] mb-0">
                                        <div class="grid grid-cols-3 gap-[16px] mb-[10px]">
                                            <x-admin::form.control-group
                                                class="mb-[0px]"
=======
                                <template v-if="selectedType == 'editWeight'">
                                    <x-admin::form.control-group class="flex-1 mb-0 max-w-[115px]">
                                        <div class="relative">
                                            <v-field
                                                type="text"
                                                :name="'variants[' + variant.id + ']'"
                                                v-model="variant.weight"
                                                class="flex w-full min-h-[39px] py-1.5 ltr:pl-2.5 rtl:pr-2.5 bg-white dark:bg-gray-900  border dark:border-gray-800   rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
                                                :class="[errors['variants[' + variant.id + ']'] ? 'border border-red-500' : '']"
                                                ::rules="{ required: true, regex: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]+\.[0-9]*[1-9][0-9]*)$/ }"
                                                label="@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.weight')"
                                            >
                                            </v-field>
                                        </div>

                                        <v-error-message
                                            :name="'variants[' + variant.id + ']'"
                                            v-slot="{ message }"
                                        >
                                            <p
                                                class="mt-1 text-red-600 text-xs italic"
                                                v-text="message"
                                            >
                                            </p>
                                        </v-error-message>
                                    </x-admin::form.control-group>
                                </template>

                                <template v-if="selectedType == 'editStatus'">
                                    <x-admin::form.control-group class="flex-1 mb-0 max-w-[115px]">
                                        <div class="relative">
                                            <v-field
                                                as="select"
                                                :name="'variants[' + variant.id + ']'"
                                                v-model="variant.status"
                                                class="custom-select flex w-full min-h-[39px] py-1.5 px-3 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
                                                :class="[errors['variants[' + variant.id + ']'] ? 'border border-red-500' : '']"
                                                ::rules="{ required: true, regex: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]+\.[0-9]*[1-9][0-9]*)$/ }"
                                                label="@lang('admin::app.catalog.products.edit.types.configurable.edit.enabled')"
                                            >
                                                <option value="1">@lang('admin::app.catalog.products.edit.types.configurable.edit.enabled')</option>
                                                <option value="0">@lang('admin::app.catalog.products.edit.types.configurable.edit.disabled')</option>
                                            </v-field>
                                        </div>

                                        <v-error-message
                                            :name="'variants[' + variant.id + ']'"
                                            v-slot="{ message }"
                                        >
                                            <p
                                                class="mt-1 text-red-600 text-xs italic"
                                                v-text="message"
                                            >
                                            </p>
                                        </v-error-message>
                                    </x-admin::form.control-group>
                                </template>

                                <template v-if="selectedType == 'editName'">
                                    <x-admin::form.control-group 
                                        class="flex-1 mb-0"
                                        ::class="{ 
                                            'max-w-[115px]' : selectedType !== 'editName',
                                            '!mb-0': selectedType === 'editName'
                                        }"
                                    >
                                        <div class="relative">
                                            <v-field
                                                type="text"
                                                :name="'variants[' + variant.id + ']'"
                                                v-model="variant.name"
                                                class="flex w-full min-h-[39px] py-1.5 ltr:pl-2.5 rtl:pr-2.5 bg-white dark:bg-gray-900  border dark:border-gray-800   rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
                                                :class="[errors['variants[' + variant.id + ']'] ? 'border border-red-500' : '']"
                                                ::rules="{ required: true, regex: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]+\.[0-9]*[1-9][0-9]*)$/ }"
                                                label="@lang('admin::app.catalog.products.edit.types.configurable.edit.variant-name')"
                                            >
                                            </v-field>
                                        </div>

                                        <v-error-message
                                            :name="'variants[' + variant.id + ']'"
                                            v-slot="{ message }"
                                        >
                                            <p
                                                class="mt-1 text-red-600 text-xs italic"
                                                v-text="message"
                                            >
                                            </p>
                                        </v-error-message>
                                    </x-admin::form.control-group>
                                </template>

                                <template v-if="selectedType == 'editInventories'">
                                    <x-admin::form.control-group class="mt-2.5 mb-0">
                                        <div class="grid grid-cols-3 gap-4 mb-2.5">
                                            <x-admin::form.control-group
                                                class="!mb-0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                v-for='inventorySource in inventorySources'
                                            >
                                                <x-admin::form.control-group.label>
                                                    @{{ inventorySource.name }}
                                                </x-admin::form.control-group.label>

                                                <v-field
                                                    type="text"
                                                    :name="'variants[' + variant.id + '][' + inventorySource.id + ']'"
<<<<<<< HEAD
                                                    :value="variant.inventories[inventorySource.id]"
                                                    class="flex w-full min-h-[39px] py-[6px] px-[12px] bg-white dark:bg-gray-900  border dark:border-gray-800   rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
=======
                                                    v-model="variant.inventories[inventorySource.id]"
                                                    class="flex w-full min-h-[39px] py-1.5 px-3 bg-white dark:bg-gray-900  border dark:border-gray-800   rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    :class="[errors['variants[' + variant.id + '][' + inventorySource.id + ']'] ? 'border border-red-500' : '']"
                                                    rules="required|numeric|min:0"
                                                    :label="inventorySource.name"
                                                >
                                                </v-field>

                                                <v-error-message
                                                    :name="'variants[' + variant.id + '][' + inventorySource.id + ']'"
                                                    v-slot="{ message }"
                                                >
                                                    <p
                                                        class="mt-1 text-red-600 text-xs italic"
                                                        v-text="message"
                                                    >
                                                    </p>
                                                </v-error-message>
                                            </x-admin::form.control-group>
                                        </div>
                                    </x-admin::form.control-group>
                                </template>
<<<<<<< HEAD
=======

                                <template v-if="selectedType == 'editSku'">
                                    <x-admin::form.control-group 
                                        class="flex-1 mb-0"
                                        ::class="{ 
                                            'max-w-[115px]' : selectedType !== 'editSku',
                                            '!mb-0': selectedType === 'editSku'
                                        }"
                                    >
                                        <div class="relative">
                                            <v-field
                                                type="text"
                                                :name="'variants[' + variant.id + ']'"
                                                v-model="variant.sku"
                                                class="flex w-full min-h-[39px] py-1.5 ltr:pl-2.5 rtl:pr-2.5 bg-white dark:bg-gray-900  border dark:border-gray-800   rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
                                                :class="[errors['variants[' + variant.id + ']'] ? 'border border-red-500' : '']"
                                                ::rules="{ required: true, regex: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]+\.[0-9]*[1-9][0-9]*)$/ }"
                                                label="@lang('admin::app.catalog.products.edit.types.configurable.edit.variant-sku')"
                                                v-slugify
                                            >
                                            </v-field>
                                        </div>

                                        <v-error-message
                                            :name="'variants[' + variant.id + ']'"
                                            v-slot="{ message }"
                                        >
                                            <p
                                                class="mt-1 text-red-600 text-xs italic"
                                                v-text="message"
                                            >
                                            </p>
                                        </v-error-message>
                                    </x-admin::form.control-group>
                                </template>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                
                                <template v-if="selectedType == 'addImages'">
                                    <v-media-images
                                        name="images"
<<<<<<< HEAD
                                        class="mt-[10px]"
=======
                                        class="mt-2.5"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        v-bind:allow-multiple="true"
                                        :uploaded-images="variant.temp_images"
                                    ></v-media-images>
                                </template>
                            </div>
                        </x-slot:content>
                    </x-admin::drawer>
                </form>
            </x-admin::form>
        </div>
    </script>

<<<<<<< HEAD
    {{-- Variation Item Template --}}
    <script type="text/x-template" id="v-product-variation-item-template"> 
        <div class="flex gap-[10px] justify-between px-[16px] py-[24px] border-b-[1px] border-slate-300 dark:border-gray-800">

            <!-- Information -->
            <div class="flex gap-[10px]">
=======
    <!-- Variation Item Template -->
    <script type="text/x-template" id="v-product-variation-item-template"> 
        <div class="flex gap-2.5 justify-between px-4 py-6 border-b border-slate-300 dark:border-gray-800">

            <!-- Information -->
            <div class="flex gap-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <!-- Form Hidden Fields -->
                <input type="hidden" :name="'variants[' + variant.id + '][sku]'" :value="variant.sku"/>

                <input type="hidden" :name="'variants[' + variant.id + '][name]'" :value="variant.name"/>

                <input type="hidden" :name="'variants[' + variant.id + '][price]'" :value="variant.price"/>

                <input type="hidden" :name="'variants[' + variant.id + '][weight]'" :value="variant.weight"/>

                <input type="hidden" :name="'variants[' + variant.id + '][status]'" :value="variant.status"/>

                <template v-for="attribute in attributes">
                    <input type="hidden" :name="'variants[' + variant.id + '][' + attribute.code + ']'" :value="variant[attribute.code]"/>
                </template>

                <template v-for="inventorySource in inventorySources">
                    <input type="hidden" :name="'variants[' + variant.id + '][inventories][' + inventorySource.id + ']'" :value="variant.inventories[inventorySource.id]"/>
                </template>

                <template v-for="(image, index) in variant.images">
                    <input type="hidden" :name="'variants[' + variant.id + '][images][files][' + image.id + ']'" v-if="! image.is_new"/>

                    <input
                        type="file"
                        :name="'variants[' + variant.id + '][images][files][]'"
                        :id="$.uid + '_imageInput_' + index"
                        class="hidden"
                        accept="image/*"
                        :ref="$.uid + '_imageInput_' + index"
                    />
                </template>
                <!-- //Ends Form Hidden Fields -->

                <!-- Selection Checkbox -->
                <div class="select-none">
                    <input
                        type="checkbox"
                        :id="'variant_' + variant.id"
                        class="hidden peer"
                        v-model="variant.selected"
                    >

                    <label
<<<<<<< HEAD
                        class="icon-uncheckbox text-[24px] peer-checked:icon-checked peer-checked:text-blue-600  cursor-pointer"
=======
                        class="icon-uncheckbox text-2xl peer-checked:icon-checked peer-checked:text-blue-600  cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        :for="'variant_' + variant.id"
                    ></label>
                </div>

                <!-- Image -->
                <div
<<<<<<< HEAD
                    class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded-[4px] overflow-hidden"
=======
                    class="w-full h-[60px] max-w-[60px] max-h-[60px] relative rounded overflow-hidden"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    :class="{'border border-dashed border-gray-300 dark:border-gray-800 dark:invert dark:mix-blend-exclusion': ! variant.images.length}"
                >
                    <template v-if="! variant.images.length">
                        <img src="{{ bagisto_asset('images/product-placeholders/front.svg') }}">
                    
<<<<<<< HEAD
                        <p class="w-full absolute bottom-[5px] text-[6px] text-gray-400 text-center font-semibold">
=======
                        <p class="w-full absolute bottom-1.5 text-[6px] text-gray-400 text-center font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.catalog.products.edit.types.configurable.image-placeholder')
                        </p>
                    </template>

                    <template v-else>
                        <img :src="variant.images[0].url">

                        <span
<<<<<<< HEAD
                            class="absolute bottom-[1px] ltr:left-[1px] rtl:right-[1px] text-[12px] font-bold text-white bg-darkPink rounded-full px-[6px]"
=======
                            class="absolute bottom-px ltr:left-px rtl:right-px text-xs font-bold text-white leading-normal bg-darkPink rounded-full px-1.5"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            v-text="variant.images.length"
                        >
                        </span>
                    </template>
                </div>

                <!-- Details -->
<<<<<<< HEAD
                <div class="grid gap-[6px] place-content-start">
                    <p
                        class="text-[16x] text-gray-800 dark:text-white font-semibold"
=======
                <div class="grid gap-1.5 place-content-start">
                    <p
                        class="text-base text-gray-800 dark:text-white font-semibold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-text="variant.name ?? 'N/A'"
                    >
                    </p>

                    <p class="text-gray-600 dark:text-gray-300">
                        @{{ "@lang('admin::app.catalog.products.edit.types.configurable.sku')".replace(':sku', variant.sku) }}
                    </p>

                    <v-error-message
                        :name="'variants[' + variant.id + '].sku'"
                        v-slot="{ message }"
                    >
                        <p
                            class="mt-1 text-red-600 text-xs italic"
                            v-text="message"
                        >
                        </p>
                    </v-error-message>

<<<<<<< HEAD
                    <div class="flex gap-[6px] place-items-start">
=======
                    <div class="flex gap-1.5 place-items-start">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <span
                            class="label-active"
                            v-if="isDefault"
                        >
                            Default
                        </span>

                        <p class="text-gray-600 dark:text-gray-300">
                            <span
                                class="after:content-[',_'] last:after:content-['']"
                                v-for='(attribute, index) in attributes'
                            >
                                @{{ attribute.admin_name + ': ' + optionName(attribute, variant[attribute.code]) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
<<<<<<< HEAD
            <div class="grid gap-[4px] place-content-start text-right">
=======
            <div class="grid gap-1 place-content-start text-right">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <p class="text-gray-800 font-semibold dark:text-white">
                    @{{ $admin.formatPrice(variant.price) }}  
                </p>

                <p class="text-gray-800 font-semibold dark:text-white">
                    @{{ "@lang('admin::app.catalog.products.edit.types.configurable.qty')".replace(':qty', totalQty) }}
                </p>

<<<<<<< HEAD
                <div class="flex gap-[10px]">
=======
                <div class="flex gap-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <!-- Remove -->
                    <p
                        class="text-red-600 cursor-pointer transition-all hover:underline"
                        @click="remove"
                    >
                        @lang('admin::app.catalog.products.edit.types.configurable.delete-btn')
                    </p>
                    
                    <!-- Edit -->
                    <div>
                        <p
                            class="text-emerald-600 cursor-pointer transition-all hover:underline"
                            @click="$refs.editVariantDrawer.open()"
                        >
                            @lang('admin::app.catalog.products.edit.types.configurable.edit-btn')
                        </p>

                        <!-- Edit Drawer -->
                        <x-admin::form
                            v-slot="{ meta, errors, handleSubmit }"
                            as="div"
                        >
                            <form @submit="handleSubmit($event, update)">
                                <!-- Edit Drawer -->
                                <x-admin::drawer
                                    ref="editVariantDrawer"
                                    class="text-left"
                                >
                                    <!-- Drawer Header -->
                                    <x-slot:header>
                                        <div class="flex justify-between items-center">
<<<<<<< HEAD
                                            <p class="text-[20px] font-medium dark:text-white">
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.title')
                                            </p>

                                            <button class="mr-[45px] primary-button">
=======
                                            <p class="text-xl font-medium dark:text-white">
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.title')
                                            </p>

                                            <button class="ltr:mr-11 rtl:ml-11 primary-button">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.save-btn')
                                            </button>
                                        </div>
                                    </x-slot:header>

                                    <!-- Drawer Content -->
<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <x-slot:content>
                                        <x-admin::form.control-group.control
                                            type="hidden"
                                            name="id"
                                            ::value="variant.id"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group>
                                            <x-admin::form.control-group.label class="required">
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.name')
                                            </x-admin::form.control-group.label>
                
                                            <x-admin::form.control-group.control
                                                type="text"
                                                name="name"
                                                ::value="variant.name"
                                                rules="required"
                                                :label="trans('admin::app.catalog.products.edit.types.configurable.edit.name')"
                                            >
                                            </x-admin::form.control-group.control>
                
                                            <x-admin::form.control-group.error control-name="name"></x-admin::form.control-group.error>
                                        </x-admin::form.control-group>

                                        <x-admin::form.control-group>
                                            <x-admin::form.control-group.label class="required">
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.sku')
                                            </x-admin::form.control-group.label>
                
                                            <x-admin::form.control-group.control
                                                type="text"
                                                name="sku"
                                                ::value="variant.sku"
                                                rules="required"
                                                :label="trans('admin::app.catalog.products.edit.types.configurable.edit.sku')"
                                            >
                                            </x-admin::form.control-group.control>
                
                                            <x-admin::form.control-group.error control-name="sku"></x-admin::form.control-group.error>
                                        </x-admin::form.control-group>

<<<<<<< HEAD
                                        <div class="flex gap-[16px] mb-[10px]">
=======
                                        <div class="flex gap-4 mb-2.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            <x-admin::form.control-group class="flex-1">
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('admin::app.catalog.products.edit.types.configurable.edit.price')
                                                </x-admin::form.control-group.label>
                    
                                                <x-admin::form.control-group.control
                                                    type="text"
                                                    name="price"
                                                    ::value="variant.price"
                                                    ::rules="{required: true, decimal: true, min_value: 0}"
                                                    :label="trans('admin::app.catalog.products.edit.types.configurable.edit.price')"
                                                >
                                                </x-admin::form.control-group.control>
                    
                                                <x-admin::form.control-group.error control-name="price"></x-admin::form.control-group.error>
                                            </x-admin::form.control-group>

                                            <x-admin::form.control-group class="flex-1">
                                                <x-admin::form.control-group.label>
                                                    @lang('admin::app.catalog.products.edit.types.configurable.edit.status')
                                                </x-admin::form.control-group.label>
                    
                                                <x-admin::form.control-group.control
                                                    type="select"
                                                    name="status"
                                                    ::value="variant.status"
                                                    rules="required"
                                                    :label="trans('admin::app.catalog.products.edit.types.configurable.edit.status')"
                                                >
                                                    <option value="1">
                                                        @lang('admin::app.catalog.products.edit.types.configurable.edit.enabled')
                                                    </option>

                                                    <option value="0">
                                                        @lang('admin::app.catalog.products.edit.types.configurable.edit.disabled')
                                                    </option>
                                                </x-admin::form.control-group.control>
                    
                                                <x-admin::form.control-group.error control-name="status"></x-admin::form.control-group.error>
                                            </x-admin::form.control-group>
                                        </div>

                                        <x-admin::form.control-group>
                                            <x-admin::form.control-group.label class="required">
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.weight')
                                            </x-admin::form.control-group.label>
                
                                            <x-admin::form.control-group.control
                                                type="text"
                                                name="weight"
                                                ::value="variant.weight"
                                                ::rules="{ required: true, regex: /^([0-9]*[1-9][0-9]*(\.[0-9]+)?|[0]+\.[0-9]*[1-9][0-9]*)$/ }"
                                                :label="trans('admin::app.catalog.products.edit.types.configurable.edit.weight')"
                                            >
                                            </x-admin::form.control-group.control>
                
                                            <x-admin::form.control-group.error control-name="weight"></x-admin::form.control-group.error>
                                        </x-admin::form.control-group>

                                        <!-- Inventories -->
<<<<<<< HEAD
                                        <div class="grid mt-[20px]">
                                            <p class="mb-[10px] text-gray-800 dark:text-white font-semibold">
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.quantities')
                                            </p>

                                            <div class="grid grid-cols-3 gap-[16px] mb-[10px]">
                                                <x-admin::form.control-group
                                                    class="mb-[0px]"
=======
                                        <div class="grid mt-5">
                                            <p class="mb-2.5 text-gray-800 dark:text-white font-semibold">
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.quantities')
                                            </p>

                                            <div class="grid grid-cols-3 gap-4 mb-2.5">
                                                <x-admin::form.control-group
                                                    class="!mb-0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    v-for='inventorySource in inventorySources'
                                                >
                                                    <x-admin::form.control-group.label>
                                                        @{{ inventorySource.name }}
                                                    </x-admin::form.control-group.label>

                                                    <v-field
                                                        type="text"
                                                        :name="'inventories[' + inventorySource.id + ']'"
                                                        v-model="variant.inventories[inventorySource.id]"
<<<<<<< HEAD
                                                        class="flex w-full min-h-[39px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
=======
                                                        class="flex w-full min-h-[39px] py-1.5 px-3 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                        :class="[errors['inventories[' + inventorySource.id + ']'] ? 'border border-red-500' : '']"
                                                        rules="numeric|min:0"
                                                        :label="inventorySource.name"
                                                    >
                                                    </v-field>

                                                    <v-error-message
                                                        :name="'inventories[' + inventorySource.id + ']'"
                                                        v-slot="{ message }"
                                                    >
                                                        <p
                                                            class="mt-1 text-red-600 text-xs italic"
                                                            v-text="message"
                                                        >
                                                        </p>
                                                    </v-error-message>
                                                </x-admin::form.control-group>
                                            </div>
                                        </div>

                                        <!-- Images -->
<<<<<<< HEAD
                                        <div class="mb-[10px]">
                                            <p class="mb-[10px] text-gray-800 dark:text-white font-semibold">
=======
                                        <div class="mb-2.5">
                                            <p class="mb-2.5 text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.images')
                                            </p>

                                            <v-media-images
                                                name="images"
                                                v-bind:allow-multiple="true"
                                                :uploaded-images="variant.images"
                                            ></v-media-images>
                                        </div>

                                        <!-- Actions -->
                                        <div
<<<<<<< HEAD
                                            class="mt-[10px] text-[14px] text-gray-800 dark:text-white font-semibold"
=======
                                            class="mt-2.5 text-sm text-gray-800 dark:text-white font-semibold"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            v-if="typeof variant.id !== 'string'"
                                        >
                                            @lang('admin::app.catalog.products.edit.types.configurable.edit.edit-info')

                                            <a
                                                :href="'{{ route('admin.catalog.products.edit', ':id') }}'.replace(':id', variant.id)" 
                                                class="inline-block text-blue-500 hover:text-blue-600 hover:underline"
                                                target="_blank"
                                            >
                                                @lang('admin::app.catalog.products.edit.types.configurable.edit.edit-link-title')
                                            </a>
                                        </div>
                                    </x-slot:content>
                                </x-admin::drawer>
                            </form>
                        </x-admin::form>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-product-variations', {
            template: '#v-product-variations-template',

            props: ['errors'],

            data () {
                return {
                    defaultId: parseInt('{{ $product->additional['default_variant_id'] ?? null }}'),

                    variants: @json($product->variants()->with(['attribute_family', 'images', 'inventories'])->get()),

                    superAttributes: @json($product->super_attributes()->with(['options', 'options.attribute', 'options.translations'])->get()),

                    selectedVariant: {
                        id: null,
                        name: '',
                        sku: '',
                        price: 0,
                        status: 1,
                        weight: 0,
                        inventories: {},
                        images: []
                    },
                }
            },

            methods: {
                addVariant(params, { resetForm }) {
                    let self = this;

                    let filteredVariants = this.variants.filter(function (variant) {
                        let matchCount = 0;

                        for (let key in params) {
                            if (variant[key] == params[key]) {
                                matchCount++;
                            }
                        }

                        return matchCount == self.superAttributes.length;
                    })

                    if (filteredVariants.length) {
                        this.$emitter.emit('add-flash', { type: 'warning', message: "@lang('admin::app.catalog.products.edit.types.configurable.create.variant-already-exists')" });

                        return;
                    }

                    const optionIds = Object.values(params);

                    this.variants.push(Object.assign({
                        id: 'variant_' + this.variants.length,
                        sku: '{{ $product->sku }}' + '-variant-' + optionIds.join('-'),
                        name: '',
                        price: 0,
                        status: 1,
                        weight: 0,
                        inventories: {},
                        images: []
                    }, params));

                    resetForm();

                    this.$refs.variantCreateModal.close();
                },

                removeVariant(variant) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.variants.splice(this.variants.indexOf(variant), 1);
                        },
                    });
                },
            }
        });

        app.component('v-product-variations-mass-action', {
            template: '#v-product-variations-mass-action-template',

            props: ['superAttributes', 'variants'],

<<<<<<< HEAD
            data: function () {
                return {
                    inventorySources: @json($inventorySources),

                    updateTypes: {
                        editPrices: {
                            key: 'editPrices',
=======
            data() {
                return {
                    inventorySources: @json($inventorySources),

                    selectedType: '',
                    
                    tempSelectedVariants: [],

                    updateTypes: {
                        editName: {
                            key: 'editName',
                            value: 'name',
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.edit-names')"
                        },

                        editSku: {
                            key: 'editSku',
                            value: 'sku',
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.edit-sku')"
                        },

                        editPrices: {
                            key: 'editPrices',
                            value: 'price',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.edit-prices')"
                        },

                        editInventories: {
                            key: 'editInventories',
<<<<<<< HEAD
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.edit-inventories')"
                        },

                        addImages: {
                            key: 'addImages',
=======
                            value: 'edit-inventories',
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.edit-inventories')"
                        },

                        editWeight: {
                            key: 'editWeight',
                            value: 'weight',
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.edit-weight')",
                        },

                        editStatus: {
                            key: 'editStatus',
                            value: 'status',
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.edit-status')",
                        },

                        addImages: {
                            key: 'addImages',
                            value: 'images',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.add-images')",
                            images: []
                        },

                        removeImages: {
                            key: 'removeImages',
<<<<<<< HEAD
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.remove-images')"
=======
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.remove-images')",
                            value: 'remove-images',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        },

                        removeVariants: {
                            key: 'removeVariants',
<<<<<<< HEAD
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.remove-variants')"
                        }
                    },

                    selectedType: ''
                }
=======
                            value: 'remove-variants',
                            title: "@lang('admin::app.catalog.products.edit.types.configurable.mass-edit.remove-variants')",
                        }
                    },
                };
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            },

            computed: {
                selectedVariants() {
                    return this.variants.filter(function(variant) {
                        variant.temp_images = [];

                        return variant.selected;
                    });
<<<<<<< HEAD
                }
=======
                },
            },

            watch: {
                selectedVariants(newSelectedVariants) {
                    this.tempSelectedVariants = JSON.parse(JSON.stringify(newSelectedVariants));
                },
            },

            mounted() {
                this.tempSelectedVariants = this.selectedVariants;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            },

            methods: {
                usedAttributeOptions(attribute) {
                    const options = [];

                    for (const option of attribute.options) {
                        if (this.variants.some(variant => variant[attribute.code] === option.id)) {
                            if (! options.includes(option)) {
                                options.push(option);
                            }
                        }
                    }

                    return options;
                },

                selectAll() {
                    let isSelected = this.selectedVariants.length <= 0;

<<<<<<< HEAD
                    this.variants.forEach(function (variant) {
                        variant.selected = isSelected;
                    });
=======
                    this.variants.forEach(variant => variant.selected = isSelected);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                },

                selectVariantsByAttributeOption(attribute, option) {
                    let self = this;

                    let isAttributeOptionChecked = self.isAttributeOptionChecked(attribute, option);

                    this.variants.forEach(function (variant) {
                        if (variant[attribute.code] == option.id) {
                            variant.selected = ! isAttributeOptionChecked;
                        }
                    });
                },

                isAttributeOptionChecked(attribute, option) {
                    let variants = this.variants.filter(function (variant) {
                        return variant[attribute.code] == option.id;
                    });

                    if (! variants.length) {
                        return false;
                    }
                    
                    let isSelected = true;

                    variants.forEach(function (variant) {
                        if (! variant.selected) {
                            isSelected = false;
                        }
                    });

                    return isSelected;
                },

                edit(type) {
                    this.$emitter.emit('open-confirm-modal', {
                        agree: () => {
                            this.selectedType = type;

<<<<<<< HEAD
                            if (['editPrices', 'editInventories', 'addImages'].includes(type)) {
=======
                            if ([
                                'editName',
                                'editSku',
                                'editPrices',
                                'editInventories',
                                'editWeight',
                                'editStatus',
                                'addImages',
                            ].includes(type)) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                this.$refs.updateVariantsDrawer.open();
                            } else {
                                this[this.selectedType]();
                            }
                        }
                    });
                },

                update(params) {
<<<<<<< HEAD
                    this[this.selectedType](params);

                    this.$refs.updateVariantsDrawer.close();
=======
                    switch (this.selectedType) {
                        case 'addImages':
                            this.tempSelectedVariants.forEach((variant) => {
                                if (this.updateTypes.addImages.images.length) {
                                    variant.images = variant.images.concat(this.updateTypes.addImages.images);

                                    variant.images.temp_images = [];

                                    this.updateTypes.addImages.images.forEach(element => {
                                        variant.temp_images.push(element);
                                    });
                                } else {
                                    variant.images = variant.images.concat(variant.temp_images);
                                }

                                variant.temp_images = [];
                            });

                            break;

                        case 'editInventories': 
                            this.tempSelectedVariants.forEach((variant) => {
                                variant.inventories = {
                                    ...variant?.inventories,
                                    ...(params?.inventories ?? params.variants[variant.id]),
                                };
                            });

                            break;
                    
                        default:
                            this.tempSelectedVariants.forEach((variant) => {
                                let updateType = this.updateTypes[this.selectedType].value;

                                variant[updateType] = params[updateType] ?? params.variants[variant.id];
                            });

                            break;
                    }
                },

                updateAll(params) {
                    this[this.selectedType](params);

                    this.$refs.updateVariantsDrawer.close();

                    this.selectedVariants.forEach((variant) => variant.selected = false);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                },

                editPrices(params) {
                    this.selectedVariants.forEach(function (variant) {
                        variant.price = params?.price ?? params.variants[variant.id];
<<<<<<< HEAD

                        variant.selected = false;
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    });
                },

                editInventories(params) {
                    this.selectedVariants.forEach(function (variant) {
<<<<<<< HEAD
                        variant.inventories = params?.inventories ?? params.variants[variant.id];

                        variant.selected = false;
                    });
                },

                addImages(params) {
                    let self = this;

                    this.selectedVariants.forEach(function (variant) {
                        if (self.updateTypes.addImages.images.length) {
                            variant.images = variant.images.concat(self.updateTypes.addImages.images);
                        } else {
                            variant.images = variant.images.concat(variant.temp_images);

                            variant.temp_images = [];
                        }

                        variant.selected = false;
=======
                        variant.inventories = {
                            ...variant?.inventories,
                            ...(params?.inventories ?? params.variants[variant.id]),
                        };
                    });
                },

                editWeight(params) {
                    this.selectedVariants.forEach(function (variant) {
                        variant.weight = params?.weight ?? params.variants[variant.id];
                    });
                },

                editName(params) {
                    this.selectedVariants.forEach(function (variant) {
                        variant.name = params?.name ?? params.variants[variant.id];
                    });
                },

                editSku(params) {
                    this.selectedVariants.forEach(function (variant) {
                        variant.sku = params?.sku ?? params.variants[variant.id];
                    });
                },

                editStatus(params) {
                    this.selectedVariants.forEach(function (variant) {
                        variant.status = params?.status ?? params.variants[variant.id];
                    });
                },
                
                addImages(params) {
                    this.selectedVariants.forEach((variant) => {
                        if (this.updateTypes.addImages.images.length) {
                            variant.images = variant.images.concat(this.updateTypes.addImages.images);

                            variant.images.temp_images = [];

                            this.updateTypes.addImages.images.forEach(element => {
                                variant.temp_images.push(element);
                            });
                        } else {
                            variant.images = variant.images.concat(variant.temp_images);
                        }

                        variant.temp_images = [];
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    });

                    this.updateTypes.addImages.images = [];
                },

                removeImages() {
                    this.selectedVariants.forEach(function (variant) {
                        variant.images = [];
<<<<<<< HEAD

                        variant.selected = false;
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    });
                },

                removeVariants() {
<<<<<<< HEAD
                    let self = this;

                    this.selectedVariants.forEach(function (variant) {
                        if (variant.selected) {
                            let index = self.variants.indexOf(variant);

                            self.variants.splice(index, 1);
=======
                    this.selectedVariants.forEach((variant) => {
                        if (variant.selected) {
                            let index = this.variants.indexOf(variant);

                            this.variants.splice(index, 1);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        }
                    });
                },

<<<<<<< HEAD
                optionName: function (attribute, optionId) {
=======
                optionName(attribute, optionId) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    return attribute.options.find(function (option) {
                        return option.id == optionId;
                    })?.admin_name;
                },
<<<<<<< HEAD
            }
=======
            },
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        });

        app.component('v-product-variation-item', {
            template: '#v-product-variation-item-template',

            props: [
                'variant',
                'attributes',
                'errors',
            ],

            data() {
                return {
                    inventorySources: @json($inventorySources),
                }
            },

            created() {
                let inventories = {};
                
                if (Array.isArray(this.variant.inventories)) {
                    this.variant.inventories.forEach(function (inventory) {
                        inventories[inventory.inventory_source_id] = inventory.qty;
                    });

                    this.variant.inventories = inventories; 
                }
            },

            mounted() {
                if (typeof this.variant.id === 'string' || this.variant.id instanceof String) {
                    this.$refs.editVariantDrawer.open();
                }
            },

            computed: {
                isDefault() {
                    return this.variant.id == this.$parent.defaultId;
                },

                totalQty() {
                    let totalQty = 0;

                    for (let key in this.variant.inventories) {
                        totalQty += parseInt(this.variant.inventories[key]);
                    }

                    return totalQty;
                }
            },

            watch: {
                variant: {
                    handler: function(newValue) {
                        let self = this;

                        setTimeout(function() {
                            self.setFiles();
                        })
                    },
                    deep: true
                }
            },

            methods: {
                optionName: function (attribute, optionId) {
                    return attribute.options.find(function (option) {
                        return option.id == optionId;
                    })?.admin_name;
                },

                update(params) {
                    Object.assign(this.variant, params);

                    this.$refs.editVariantDrawer.close();
                },

                setFiles() {
                    let self = this;

                    this.variant.images.forEach(function (image, index) {
                        if (image.file instanceof File) {
                            image.is_new = 1;

                            const dataTransfer = new DataTransfer();

                            dataTransfer.items.add(image.file);

                            self.$refs[self.$.uid + '_imageInput_' + index][0].files = dataTransfer.files;
                        } else {
                            image.is_new = 0;
                        }
                    });
                },

                remove: function () {
                    this.$emit('onRemoved', this.variant);
                },
            }
        });
    </script>
@endPushOnce