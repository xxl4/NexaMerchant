<<<<<<< HEAD
<x-admin::layouts>    
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('admin::app.marketing.promotions.catalog-rules.edit.title')
    </x-slot:title>

    {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.before') !!}

    {{-- edit Catalog form --}}
=======
<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('admin::app.marketing.promotions.catalog-rules.edit.title')
    </x-slot>

    {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.before') !!}

    <!-- edit Catalog form -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <v-catalog-rule-edit-form></v-catalog-rule-edit-form>

    {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.after') !!}

    @pushOnce('scripts')
<<<<<<< HEAD
        {{-- v catalog rule edit form template --}}
        <script type="text/x-template" id="v-catalog-rule-edit-form-template">
            <div>
                <x-admin::form 
=======
        <!-- v catalog rule edit form template -->
        <script type="text/x-template" id="v-catalog-rule-edit-form-template">
            <div>
                <x-admin::form
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    :action="route('admin.marketing.promotions.catalog_rules.update', $catalogRule->id)"
                    method="PUT"
                    enctype="multipart/form-data"
                >

                    {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.create.create_form_controls.before') !!}

<<<<<<< HEAD
                    <div class="flex gap-[16px] justify-between items-center mt-3 max-sm:flex-wrap">
                        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                            @lang('admin::app.marketing.promotions.catalog-rules.edit.title')
                        </p>
                
                        <div class="flex gap-x-[10px] items-center">
=======
                    <div class="flex gap-4 justify-between items-center mt-3 max-sm:flex-wrap">
                        <p class="text-xl text-gray-800 dark:text-white font-bold">
                            @lang('admin::app.marketing.promotions.catalog-rules.edit.title')
                        </p>

                        <div class="flex gap-x-2.5 items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <!-- Cancel Button -->
                            <a
                                href="{{ route('admin.marketing.promotions.catalog_rules.index') }}"
                                class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
                            >
                                @lang('admin::app.marketing.promotions.catalog-rules.edit.back-btn')
                            </a>

                            <!-- Save buton -->
<<<<<<< HEAD
                            <button 
=======
                            <button
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                type="submit"
                                class="primary-button"
                            >
                                @lang('admin::app.marketing.promotions.catalog-rules.edit.save-btn')
                            </button>
                        </div>
                    </div>
<<<<<<< HEAD
        
                    <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
                        <div class=" flex flex-col gap-[8px] flex-1 max-xl:flex-auto">
=======

                    <div class="flex gap-2.5 mt-3.5 max-xl:flex-wrap">
                        <div class="flex flex-col gap-2 flex-1 max-xl:flex-auto">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.general.before') !!}

                            <!-- General Form -->
<<<<<<< HEAD
                            <div class="p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                                <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                                    @lang('admin::app.marketing.promotions.catalog-rules.edit.general')
                                </p>

                                <x-admin::form.control-group class="mb-[10px]">
=======
                            <div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                                <p class="text-base text-gray-800 dark:text-white font-semibold mb-4">
                                    @lang('admin::app.marketing.promotions.catalog-rules.edit.general')
                                </p>

                                <x-admin::form.control-group>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <x-admin::form.control-group.label class="required">
                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.name')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="text"
                                        name="name"
                                        :value="old('name') ?? $catalogRule->name"
                                        id="name"
                                        rules="required"
                                        :label="trans('admin::app.marketing.promotions.catalog-rules.edit.name')"
                                        :placeholder="trans('admin::app.marketing.promotions.catalog-rules.edit.name')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="name"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>

<<<<<<< HEAD
                                <x-admin::form.control-group class="mb-[10px]">
=======
                                <x-admin::form.control-group class="!mb-0">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    <x-admin::form.control-group.label>
                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.description')
                                    </x-admin::form.control-group.label>

                                    <x-admin::form.control-group.control
                                        type="textarea"
                                        name="description"
                                        :value="old('description') ?? $catalogRule->description"
                                        id="description"
                                        class="text-gray-600 dark:text-gray-300"
                                        :label="trans('admin::app.marketing.promotions.catalog-rules.edit.description')"
                                        :placeholder="trans('admin::app.marketing.promotions.catalog-rules.edit.description')"
                                    >
                                    </x-admin::form.control-group.control>

                                    <x-admin::form.control-group.error
                                        control-name="description"
                                    >
                                    </x-admin::form.control-group.error>
                                </x-admin::form.control-group>
                            </div>

                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.general.after') !!}
<<<<<<< HEAD
        
                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.conditions.before') !!}

                            <!-- Conditions -->
                            <div class="p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                                <div class="flex gap-[16px] items-center justify-between">
                                    <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
=======

                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.conditions.before') !!}

                            <!-- Conditions -->
                            <div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                                <div class="flex gap-4 items-center justify-between">
                                    <p class="text-base text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.conditions')
                                    </p>

                                    <x-admin::form.control-group class="!mb-0">
                                        <x-admin::form.control-group.control
                                            type="select"
                                            name="condition_type"
                                            id="condition_type"
<<<<<<< HEAD
                                            class="ltr:pr-[40px] rtl:pl-[40px] text-gray-400 dark:border-gray-800"
=======
                                            class="ltr:pr-10 rtl:pl-10 text-gray-400 dark:border-gray-800"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            :label="trans('admin::app.marketing.promotions.catalog-rules.condition-type')"
                                            :placeholder="trans('admin::app.marketing.promotions.catalog-rules.condition-type')"
                                            v-model="conditionType"
                                        >
                                            <option value="1">
                                                @lang('admin::app.marketing.promotions.catalog-rules.edit.all-conditions-true')
                                            </option>

                                            <option value="2">
                                                @lang('admin::app.marketing.promotions.catalog-rules.edit.any-conditions-true')
                                            </option>
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="condition_type"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
                                </div>
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <v-catalog-rule-condition-item
                                    v-for='(condition, index) in conditions'
                                    :condition="condition"
                                    :key="index"
                                    :index="index"
                                    @onRemoveCondition="removeCondition($event)"
                                >
                                </v-catalog-rule-condition-item>
<<<<<<< HEAD
                      
                                <div 
                                    class="secondary-button max-w-max mt-[15px]"
=======

                                <div
                                    class="secondary-button max-w-max mt-4"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @click="addCondition"
                                >
                                    @lang('admin::app.marketing.promotions.catalog-rules.edit.add-condition')
                                </div>
<<<<<<< HEAD
        
                            </div>
        
=======

                            </div>

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.conditions.after') !!}

                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.actions.before') !!}

                            <!-- Actions -->
<<<<<<< HEAD
                            <div class="p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                                <div class="grid gap-[6px]">
                                    <p class="mb-[16px] text-[16px] text-gray-800 dark:text-white font-semibold">
                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.actions')
                                    </p>
        
                                    <div class="flex  gap-[16px]  max-sm:flex-wrap">
                                        <div class="w-full mb-[10px]">
=======
                            <div class="p-4 bg-white dark:bg-gray-900 rounded box-shadow">
                                <div class="grid gap-1.5">
                                    <p class="mb-4 text-base text-gray-800 dark:text-white font-semibold">
                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.actions')
                                    </p>

                                    <div class="flex gap-4 max-sm:flex-wrap">
                                        <div class="w-full">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @php($selectedOption = old('action_type') ?? $catalogRule->action_type)

                                            <x-admin::form.control-group>
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('admin::app.marketing.promotions.catalog-rules.edit.action-type')
                                                </x-admin::form.control-group.label>
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                <x-admin::form.control-group.control
                                                    type="select"
                                                    name="action_type"
                                                    :value="old('action_type') ?? $selectedOption"
                                                    id="action_type"
                                                    class="h-[39px]"
                                                    rules="required"
                                                    :label="trans('admin::app.marketing.promotions.catalog-rules.edit.action-type')"
                                                >
                                                    <option
<<<<<<< HEAD
                                                        value="by_percent" 
=======
                                                        value="by_percent"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                        {{ $selectedOption == 'by_percent' ? 'selected' : '' }}
                                                    >
                                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.percentage-product-price')
                                                    </option>
<<<<<<< HEAD
            
                                                    <option 
=======

                                                    <option
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                        value="by_fixed"
                                                        {{ $selectedOption == 'by_fixed' ? 'selected' : '' }}
                                                    >
                                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.fixed-amount')
                                                    </option>
                                                </x-admin::form.control-group.control>
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                <x-admin::form.control-group.error
                                                    control-name="action_type"
                                                >
                                                </x-admin::form.control-group.error>
                                            </x-admin::form.control-group>
                                        </div>

<<<<<<< HEAD
                                        <div class="w-full mb-[10px]">
=======
                                        <div class="w-full">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            <x-admin::form.control-group>
                                                <x-admin::form.control-group.label class="required">
                                                    @lang('admin::app.marketing.promotions.catalog-rules.edit.discount-amount')
                                                </x-admin::form.control-group.label>
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                <x-admin::form.control-group.control
                                                    type="text"
                                                    name="discount_amount"
                                                    :value="old('discount_amount') ?? $catalogRule->discount_amount"
                                                    id="discount_amount"
                                                    rules="required"
                                                    :label="trans('admin::app.marketing.promotions.catalog-rules.edit.discount-amount')"
                                                    :placeholder="trans('admin::app.marketing.promotions.catalog-rules.edit.discount-amount')"
                                                >
                                                </x-admin::form.control-group.control>
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                <x-admin::form.control-group.error
                                                    control-name="discount_amount"
                                                >
                                                </x-admin::form.control-group.error>
                                            </x-admin::form.control-group>
                                        </div>

<<<<<<< HEAD
                                        <div class="w-full mb-[10px]">
=======
                                        <div class="w-full">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @php($selectedOption = old('end_other_rules') ?? $catalogRule->end_other_rules)

                                            <x-admin::form.control-group>
                                                <x-admin::form.control-group.label>
                                                    @lang('admin::app.marketing.promotions.catalog-rules.edit.end-other-rules')
                                                </x-admin::form.control-group.label>
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                <x-admin::form.control-group.control
                                                    type="select"
                                                    name="end_other_rules"
                                                    :value="old('end_other_rules') ?? $selectedOption"
                                                    id="end_other_rules"
                                                    class="h-[39px]"
                                                    :label="trans('admin::app.marketing.promotions.catalog-rules.edit.end-other-rules')"
                                                >
                                                    <option
                                                        value="0"
                                                        {{ ! $selectedOption ? 'selected' : '' }}
                                                    >
                                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.no')
                                                    </option>
<<<<<<< HEAD
            
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                    <option
                                                        value="1"
                                                        {{ $selectedOption ? 'selected' : '' }}
                                                    >
                                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.yes')
                                                    </option>
                                                </x-admin::form.control-group.control>
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                <x-admin::form.control-group.error
                                                    control-name="end_other_rules"
                                                >
                                                </x-admin::form.control-group.error>
                                            </x-admin::form.control-group>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.actions.after') !!}

                        </div>

                        <!-- Rightsub components -->
<<<<<<< HEAD
                        <div class="flex flex-col gap-[8px] w-[360px] max-w-full max-sm:w-full">
=======
                        <div class="flex flex-col gap-2 w-[360px] max-w-full max-sm:w-full">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.accordion.settings.before') !!}

                            <!-- Settings -->
                            <x-admin::accordion>
                                <x-slot:header>
<<<<<<< HEAD
                                    <div class="flex items-center justify-between p-[6px]">
                                        <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======
                                    <div class="flex items-center justify-between">
                                        <p class="p-2.5 text-base text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @lang('admin::app.marketing.promotions.catalog-rules.edit.settings')
                                        </p>
                                    </div>
                                </x-slot:header>
<<<<<<< HEAD
                            
                                <x-slot:content>
                                    <x-admin::form.control-group class="mb-[10px]">
=======

                                <x-slot:content>
                                    <x-admin::form.control-group>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.marketing.promotions.catalog-rules.edit.priority')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="sort_order"
                                            :value="old('sort_order') ?? $catalogRule->sort_order"
                                            id="sort_order"
                                            :label="trans('admin::app.marketing.promotions.catalog-rules.edit.priority')"
                                            :placeholder="trans('admin::app.marketing.promotions.catalog-rules.edit.priority')"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="sort_order"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>

                                    <!--Channels-->
<<<<<<< HEAD
                                    <div class="mb-[10px]">
                                        <p class="required block leading-[24px] text-gray-800 dark:text-white font-medium">
                                            @lang('admin::app.marketing.promotions.catalog-rules.edit.channels')
                                        </p>
                                        
                                        @php($selectedOptionIds = old('channels') ?: $catalogRule->channels->pluck('id')->toArray())
                                        
                                        @foreach(core()->getAllChannels() as $channel)
                                            <x-admin::form.control-group class="flex gap-[10px] !mb-0 p-[6px]">
=======
                                    <div class="mb-4">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.marketing.promotions.catalog-rules.edit.channels')
                                        </x-admin::form.control-group.label>

                                        @php($selectedOptionIds = old('channels') ?: $catalogRule->channels->pluck('id')->toArray())

                                        @foreach(core()->getAllChannels() as $channel)
                                            <x-admin::form.control-group class="flex gap-2.5 items-center !mb-2">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                <x-admin::form.control-group.control
                                                    type="checkbox"
                                                    name="channels[]"
                                                    :value="$channel->id"
                                                    :id="'channel_' . '_' . $channel->id"
                                                    :for="'channel_' . '_' . $channel->id"
                                                    rules="required"
                                                    :label="trans('admin::app.marketing.promotions.catalog-rules.edit.channels')"
                                                    :checked="in_array($channel->id, $selectedOptionIds)"
                                                >
                                                </x-admin::form.control-group.control>
<<<<<<< HEAD
                                
                                                <x-admin::form.control-group.label
                                                    :for="'channel_' . '_' . $channel->id"
                                                    class="!text-[14px] !text-gray-600 dark:!text-gray-300 font-semibold cursor-pointer"
                                                >
                                                    {{ core()->getChannelName($channel) }}
                                                </x-admin::form.control-group.label>
=======

                                                <label
                                                    class="text-xs text-gray-600 dark:text-gray-300 font-medium cursor-pointer"
                                                    for="{{ 'channel_' . '_' . $channel->id }}"
                                                >
                                                    {{ core()->getChannelName($channel) }}
                                                </label>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            </x-admin::form.control-group>
                                        @endforeach

                                        <x-admin::form.control-group.error
                                            control-name="channels[]"
                                        >
                                        </x-admin::form.control-group.error>
                                    </div>

                                    <!-- Customer Groups -->
<<<<<<< HEAD
                                    <div class="mb-[10px]">
                                        <p class="required block leading-[24px] text-gray-800 dark:text-white font-medium">
                                            @lang('admin::app.marketing.promotions.catalog-rules.edit.customer-groups')
                                        </p>
                                        
                                        @php($selectedOptionIds = old('customer_groups') ?: $catalogRule->customer_groups->pluck('id')->toArray())

                                        @foreach(app('Webkul\Customer\Repositories\CustomerGroupRepository')->all() as $customerGroup)
                                            <x-admin::form.control-group class="flex gap-[10px] !mb-0 p-[6px]">
=======
                                    <div class="mb-4">
                                        <x-admin::form.control-group.label class="required">
                                            @lang('admin::app.marketing.promotions.catalog-rules.edit.channels')
                                        </x-admin::form.control-group.label>

                                        @php($selectedOptionIds = old('customer_groups') ?: $catalogRule->customer_groups->pluck('id')->toArray())

                                        @foreach(app('Webkul\Customer\Repositories\CustomerGroupRepository')->all() as $customerGroup)
                                            <x-admin::form.control-group class="flex gap-2.5 items-center !mb-2">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                                <x-admin::form.control-group.control
                                                    type="checkbox"
                                                    name="customer_groups[]"
                                                    :value="$customerGroup->id"
                                                    :id="'customer_group_' . '_' . $customerGroup->id"
                                                    :for="'customer_group_' . '_' . $customerGroup->id"
                                                    :label="trans('admin::app.marketing.promotions.catalog-rules.edit.customer-groups')"
                                                    rules="required"
                                                    :checked="in_array($customerGroup->id, $selectedOptionIds)"
                                                >
                                                </x-admin::form.control-group.control>
<<<<<<< HEAD
                                
                                                <x-admin::form.control-group.label
                                                    :for="'customer_group_' . '_' . $customerGroup->id"
                                                    class="!text-[14px] !text-gray-600 dark:!text-gray-300 font-semibold cursor-pointer"
                                                >
                                                    {{ $customerGroup->name }}
                                                </x-admin::form.control-group.label>
=======

                                                <label
                                                    class="text-xs text-gray-600 dark:text-gray-300 font-medium cursor-pointer"
                                                    for="{{ 'customer_group_' . '_' . $customerGroup->id }}"
                                                >
                                                    {{ $customerGroup->name }}
                                                </label>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            </x-admin::form.control-group>
                                        @endforeach

                                        <x-admin::form.control-group.error
                                            control-name="customer_groups[]"
                                        >
                                        </x-admin::form.control-group.error>
                                    </div>

                                    <!-- Status -->
<<<<<<< HEAD
                                    <div class="mb-[10px]">
                                        <p class="block leading-[24px] text-gray-800 dark:text-white font-medium">
                                            @lang('admin::app.marketing.promotions.catalog-rules.create.status')
                                        </p>
    
                                        <x-admin::form.control-group class="flex gap-[10px] !mb-0 p-[6px]">
                                            <x-admin::form.control-group.control
                                                type="checkbox"
                                                name="status"
                                                :value="$catalogRule->status"
                                                id="status"
                                                for="status"
                                                label="status"
                                                :checked="(boolean) $catalogRule->status"
                                            >
                                            </x-admin::form.control-group.control>
                            
                                            <x-admin::form.control-group.label
                                                for="status"
                                                class="!text-[14px] !text-gray-600 dark:!text-gray-300 font-semibold cursor-pointer"
                                            >
                                                @lang('admin::app.marketing.promotions.catalog-rules.create.status')
                                            </x-admin::form.control-group.label>
    
                                            <x-admin::form.control-group.error
                                                control-name="status"
                                            >
                                            </x-admin::form.control-group.error>
                                        </x-admin::form.control-group>  
                                    </div>
=======
                                    <x-admin::form.control-group class="!mb-0">
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.marketing.promotions.catalog-rules.edit.status')
                                        </x-admin::form.control-group.label>

                                        <x-admin::form.control-group.control
                                            type="switch"
                                            name="status"
                                            :value="$catalogRule->status"
                                            :label="trans('admin::app.marketing.promotions.catalog-rules.edit.status')"
                                            :checked="(boolean) $catalogRule->status"
                                        >
                                        </x-admin::form.control-group.control>

                                        <x-admin::form.control-group.error
                                            control-name="status"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                </x-slot:content>
                            </x-admin::accordion>

                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.accordion.settings.after') !!}
<<<<<<< HEAD
                             
                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.accordion.marketing_time.before') !!}
                            
                            <!-- Marketing Time -->
                            <x-admin::accordion>
                                <x-slot:header>
                                    <div class="flex items-center justify-between p-[6px]">
                                        <p class="text-gray-600 dark:text-gray-300 text-[16px] p-[10px] font-semibold">
=======

                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.accordion.marketing_time.before') !!}

                            <!-- Marketing Time -->
                            <x-admin::accordion>
                                <x-slot:header>
                                    <div class="flex items-center justify-between">
                                        <p class="p-2.5 text-base text-gray-800 dark:text-white font-semibold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            @lang('admin::app.marketing.promotions.catalog-rules.edit.marketing-time')
                                        </p>
                                    </div>
                                </x-slot:header>
<<<<<<< HEAD
                            
                                <x-slot:content>
                                    <div class="flex gap-[16px]">
                                        <x-admin::form.control-group class="mb-[10px]">
                                            <x-admin::form.control-group.label>
                                                @lang('admin::app.marketing.promotions.catalog-rules.edit.from')
                                            </x-admin::form.control-group.label>
        
=======

                                <x-slot:content>
                                    <div class="flex gap-4">
                                        <x-admin::form.control-group class="!mb-0">
                                            <x-admin::form.control-group.label>
                                                @lang('admin::app.marketing.promotions.catalog-rules.edit.from')
                                            </x-admin::form.control-group.label>

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            <x-admin::form.control-group.control
                                                type="date"
                                                name="starts_from"
                                                :value="old('starts_from') ?? $catalogRule->starts_from"
                                                id="starts_from"
                                                :label="trans('admin::app.marketing.promotions.catalog-rules.edit.from')"
                                                :placeholder="trans('admin::app.marketing.promotions.catalog-rules.edit.from')"
                                            >
                                            </x-admin::form.control-group.control>
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            <x-admin::form.control-group.error
                                                control-name="starts_from"
                                            >
                                            </x-admin::form.control-group.error>
                                        </x-admin::form.control-group>

<<<<<<< HEAD
                                        <x-admin::form.control-group class="mb-[10px]">
                                            <x-admin::form.control-group.label>
                                                @lang('admin::app.marketing.promotions.catalog-rules.edit.to')
                                            </x-admin::form.control-group.label>
        
=======
                                        <x-admin::form.control-group class="!mb-0">
                                            <x-admin::form.control-group.label>
                                                @lang('admin::app.marketing.promotions.catalog-rules.edit.to')
                                            </x-admin::form.control-group.label>

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            <x-admin::form.control-group.control
                                                type="date"
                                                name="ends_till"
                                                :value="old('ends_till') ?? $catalogRule->ends_till"
                                                id="ends_till"
                                                :label="trans('admin::app.marketing.promotions.catalog-rules.edit.to')"
                                                :placeholder="trans('admin::app.marketing.promotions.catalog-rules.edit.to')"
                                            >
                                            </x-admin::form.control-group.control>
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                            <x-admin::form.control-group.error
                                                control-name="ends_till"
                                            >
                                            </x-admin::form.control-group.error>
                                        </x-admin::form.control-group>
                                    </div>
                                </x-slot:content>
                            </x-admin::accordion>

                            {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.edit.card.accordion.marketing_time.after') !!}

                        </div>
                    </div>

                    {!! view_render_event('bagisto.admin.marketing.promotions.catalog_rules.create.create_form_controls.after') !!}

                </x-admin::form>
            </div>
        </script>

<<<<<<< HEAD
        {{-- v catalog rule edit form component --}}
        <script type="module">
            app.component('v-catalog-rule-edit-form', {
                template: '#v-catalog-rule-edit-form-template',
                
=======
        <!-- v catalog rule edit form component -->
        <script type="module">
            app.component('v-catalog-rule-edit-form', {
                template: '#v-catalog-rule-edit-form-template',

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                data() {
                    return {
                        conditionType: {{ old('condition_type') ?: $catalogRule->condition_type }},

                        conditions: @json($catalogRule->conditions ?: [])
                    }
                },

                methods: {
                    addCondition() {
                        this.conditions.push({
                            'attribute': '',
                            'operator': '==',
                            'value': '',
                        });
                    },

                    removeCondition(condition) {
                        let index = this.conditions.indexOf(condition)

                        this.conditions.splice(index, 1)
                    },

                    onSubmit(e) {
                        this.$root.onSubmit(e)
                    },

                    onSubmit(e) {
                        this.$root.onSubmit(e)
                    },

                    redirectBack(fallbackUrl) {
                        this.$root.redirectBack(fallbackUrl)
                    }
                }
            })
        </script>

<<<<<<< HEAD
        {{-- v catalog rule condition item form template --}}
        <script type="text/x-template" id="v-catalog-rule-condition-item-template">
            <div class="flex gap-[16px] justify-between mt-[15px]">
                <div class="flex gap-[16px] flex-1 max-sm:flex-wrap max-sm:flex-1">
                    <select
                        :name="['conditions[' + index + '][attribute]']"
                        :id="['conditions[' + index + '][attribute]']"
                        class="custom-select flex w-1/3 min:w-1/3 h-[40px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-[40px] rtl:pl-[40px]"
=======
        <!-- v catalog rule condition item form template -->
        <script type="text/x-template" id="v-catalog-rule-condition-item-template">
            <div class="flex gap-4 justify-between mt-4">
                <div class="flex gap-4 flex-1 max-sm:flex-wrap max-sm:flex-1">
                    <select
                        :name="['conditions[' + index + '][attribute]']"
                        :id="['conditions[' + index + '][attribute]']"
                        class="custom-select flex w-1/3 min:w-1/3 h-10 py-1.5 px-3 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-10 rtl:pl-10"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-model="condition.attribute"
                    >
                        <option value="">@lang('admin::app.marketing.promotions.catalog-rules.edit.choose-condition-to-add')</option>

<<<<<<< HEAD
                        <optgroup 
                            v-for='(conditionAttribute, index) in conditionAttributes'
                            :label="conditionAttribute.label"
                        >
                            <option 
=======
                        <optgroup
                            v-for='(conditionAttribute, index) in conditionAttributes'
                            :label="conditionAttribute.label"
                        >
                            <option
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                v-for='(childAttribute, index) in conditionAttribute.children'
                                :value="childAttribute.key"
                                :text="childAttribute.label"
                            >
                            </option>
                        </optgroup>
                    </select>

<<<<<<< HEAD
                    <select 
                        :name="['conditions[' + index + '][operator]']"
                        class="custom-select flex w-1/3 min:w-1/3 h-[40px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-[40px] rtl:pl-[40px]"
                        v-model="condition.operator"
                        v-if="matchedAttribute"
                    >
                        <option 
=======
                    <select
                        :name="['conditions[' + index + '][operator]']"
                        class="custom-select flex w-1/3 min:w-1/3 h-10 py-1.5 px-3 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-10 rtl:pl-10"
                        v-model="condition.operator"
                        v-if="matchedAttribute"
                    >
                        <option
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            v-for='operator in conditionOperators[matchedAttribute.type]'
                            :value="operator.operator"
                            :text="operator.label"
                        >
                        </option>
                    </select>

                    <div v-if="matchedAttribute">
<<<<<<< HEAD
                        <input 
=======
                        <input
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            type="hidden"
                            :name="['conditions[' + index + '][attribute_type]']"
                            v-model="matchedAttribute.type"
                        >

                        <div v-if="matchedAttribute.key == 'product|category_ids'">
                            <x-admin::tree.view
<<<<<<< HEAD
                                value-field="id"
                                id-field="id"
                                ::name-field="'conditions[' + index + '][value]'"
                                input-type="checkbox"
                                ::items='matchedAttribute.options'
                                ::value='condition.value'
                                ::behavior="'no'"
=======
                                input-type="checkbox"
                                selection-type="individual"
                                ::name-field="'conditions[' + index + '][value]'"
                                value-field="id"
                                id-field="id"
                                ::items='matchedAttribute.options'
                                ::value='condition.value'
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                :fallback-locale="config('app.fallback_locale')"
                            >
                            </x-admin::tree.view>
                        </div>

                        <div v-else>
                            <div
<<<<<<< HEAD
                                v-if="matchedAttribute.type == 'text' 
=======
                                v-if="matchedAttribute.type == 'text'
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    || matchedAttribute.type == 'price'
                                    || matchedAttribute.type == 'decimal'
                                    || matchedAttribute.type == 'integer'"
                            >
                                <v-field
                                    :name="`conditions[${index}][value]`"
                                    v-slot="{ field, errorMessage}"
                                    :id="`conditions[${index}][value]`"
                                    :rules="matchedAttribute.type == 'price' ? 'regex:^[0-9]+(\.[0-9]+)?$' : ''
                                        || matchedAttribute.type == 'decimal' ? 'regex:^[0-9]+(\.[0-9]+)?$' : ''
                                        || matchedAttribute.type == 'integer' ? 'regex:^[0-9]+(\.[0-9]+)?$' : ''
                                        || matchedAttribute.type == 'text' ? 'regex:^([A-Za-z0-9_ \'\-]+)$' : ''"
                                    label="@lang('admin::app.marketing.promotions.catalog-rules.edit.conditions')"
                                    v-model="condition.value"
                                >
<<<<<<< HEAD
                                    <input 
                                        type="text"
                                        v-bind="field"
                                        :class="{ 'border border-red-500': errorMessage }"
                                        class="flex w-[289px] min:w-1/3 h-[40px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-[40px] rtl:pl-[40px]"
                                    />
                                </v-field>
                                
=======
                                    <input
                                        type="text"
                                        v-bind="field"
                                        :class="{ 'border border-red-500': errorMessage }"
                                        class="flex w-[289px] min:w-1/3 h-10 py-1.5 px-3 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-10 rtl:pl-10"
                                    />
                                </v-field>

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                <v-error-message
                                    :name="`conditions[${index}][value]`"
                                    class="mt-1 text-red-500 text-xs italic"
                                    as="p"
                                />
                            </div>

                            <div v-if="matchedAttribute.type == 'date'">
<<<<<<< HEAD
                                <input 
                                    type="date"
                                    :name="['conditions[' + index + '][value]']"
                                    class="border w-[289px] py-2 px-3 appearance-none rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400"
                                    v-model="condition.value"
                                />
                            </div>

                            <div v-if="matchedAttribute.type == 'datetime'">
                                <input 
                                    type="datetime"
                                    :name="['conditions[' + index + '][value]']"
                                    class="border w-[289px] py-2 px-3 appearance-none rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 transition-all hover:border-gray-400"
                                    v-model="condition.value"
                                />
                            </div>

                            <div v-if="matchedAttribute.type == 'boolean'">
                                <select 
                                    :name="['conditions[' + index + '][value]']"
                                    class="inline-flex gap-x-[4px] justify-between items-center max-h-[40px] w-full max-w-[196px] py-[6px] ltr:pl-[12px] rtl:pr-[12px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal cursor-pointer marker:shadow appearance-none focus:ring-2 focus:outline-none focus:ring-black transition-all hover:border-gray-400"
=======
                                <x-admin::flat-picker.date class="!w-[140px]" ::allow-input="false">
                                    <input
                                        type="date"
                                        :name="['conditions[' + index + '][value]']"
                                        class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
                                        v-model="condition.value"
                                    />
                                </x-admin::flat-picker.date>
                            </div>

                            <div v-if="matchedAttribute.type == 'datetime'">
                                <x-admin::flat-picker.date class="!w-[140px]" ::allow-input="false">
                                    <input
                                        type="datetime"
                                        :name="['conditions[' + index + '][value]']"
                                        class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
                                        v-model="condition.value"
                                    />
                                </x-admin::flat-picker.date>
                            </div>

                            <div v-if="matchedAttribute.type == 'boolean'">
                                <select
                                    :name="['conditions[' + index + '][value]']"
                                    class="custom-select inline-flex gap-x-1 justify-between items-center max-h-10 w-full max-w-[196px] py-1.5 ltr:pl-3	rtl:pr-3 px-3 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal cursor-pointer marker:shadow appearance-none focus:ring-2 focus:outline-none focus:ring-black transition-all hover:border-gray-400"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    v-model="condition.value"
                                >
                                    <option value="1">
                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.yes')
                                    </option>

                                    <option value="0">
                                        @lang('admin::app.marketing.promotions.catalog-rules.edit.no')
                                    </option>
                                </select>
                            </div>

                            <div v-if="matchedAttribute.type == 'select' || matchedAttribute.type == 'radio'">
                                <select
                                    :name="['conditions[' + index + '][value]']"
<<<<<<< HEAD
                                    class="custom-select flex w-[289px] min:w-1/3 h-[40px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-[40px] rtl:pl-[40px]"
=======
                                    class="custom-select flex w-[289px] min:w-1/3 h-10 py-1.5 px-3 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-10 rtl:pl-10"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    v-if="matchedAttribute.key != 'catalog|state'"
                                    v-model="condition.value"
                                >
                                    <option
                                        v-for='option in matchedAttribute.options'
                                        :value="option.id"
                                        :text="option.admin_name"
                                    >
                                    </option>
                                </select>

<<<<<<< HEAD
                                <select 
                                    :name="['conditions[' + index + '][value]']"
                                    class="custom-select flex w-[289px] min:w-1/3 h-[40px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-[40px] rtl:pl-[40px]"
                                    v-model="condition.value" 
=======
                                <select
                                    :name="['conditions[' + index + '][value]']"
                                    class="custom-select flex w-[289px] min:w-1/3 h-10 py-1.5 px-3 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-10 rtl:pl-10"
                                    v-model="condition.value"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    v-else
                                >
                                    <optgroup
                                        v-for='option in matchedAttribute.options'
                                        :label="option.admin_name"
                                    >
                                        <option
                                            v-for='state in option.states'
                                            :value="state.code"
                                            :text="state.admin_name"
                                        >
                                        </option>
                                    </optgroup>
                                </select>
                            </div>

                            <div v-if="matchedAttribute.type == 'multiselect' || matchedAttribute.type == 'checkbox'">
<<<<<<< HEAD
                                <select 
                                    :name="['conditions[' + index + '][value][]']"
                                    class="custom-select flex w-[289px] min:w-1/3 h-[40px] py-[6px] px-[12px] bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-[6px] text-[14px] text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-[40px] rtl:pl-[40px]"
=======
                                <select
                                    :name="['conditions[' + index + '][value][]']"
                                    class="custom-select flex w-[289px] min:w-1/3 h-10 py-1.5 px-3 bg-white dark:bg-gray-900 border dark:border-gray-800 rounded-md text-sm text-gray-600 dark:text-gray-300 font-normal transition-all hover:border-gray-400 ltr:pr-10 rtl:pl-10"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    v-model="condition.value"
                                    multiple
                                >
                                    <option
                                        v-for='option in matchedAttribute.options'
                                        :value="option.id"
                                        :text="option.admin_name"
                                    >
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

<<<<<<< HEAD
                <span 
                    class="icon-delete max-h-[36px] max-w-[36px] text-[24px] p-[6px] rounded-[6px] cursor-pointer transition-all hover:bg-gray-100 dark:hover:bg-gray-950 max-sm:place-self-center"
=======
                <span
                    class="icon-delete max-h-9 max-w-9 text-2xl p-1.5 rounded-md cursor-pointer transition-all hover:bg-gray-100 dark:hover:bg-gray-950 max-sm:place-self-center"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @click="removeCondition"
                >
                </span>
            </div>
        </script>

<<<<<<< HEAD
        {{-- v catalog rule condition item component --}}
=======
        <!-- v catalog rule condition item component -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <script type="module">
            app.component('v-catalog-rule-condition-item', {
                template: "#v-catalog-rule-condition-item-template",

                props: ['index', 'condition'],

                data() {
                    return {
                        conditionAttributes: @json(app('\Webkul\CatalogRule\Repositories\CatalogRuleRepository')->getConditionAttributes()),

                        attributeTypeIndexes: {
                            'product': 0
                        },

                        conditionOperators: {
                            'price': [{
                                    'operator': '==',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-equal-to')"
                                }, {
                                    'operator': '!=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-not-equal-to')"
                                }, {
                                    'operator': '>=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-greater-than')"
                                }, {
                                    'operator': '<=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-less-than')"
                                }, {
                                    'operator': '<=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.greater-than')"
                                }, {
                                    'operator': '<=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.less-than')"
                                }],
                            'decimal': [{
                                    'operator': '==',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-equal-to')"
                                }, {
                                    'operator': '!=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-not-equal-to')"
                                }, {
                                    'operator': '>=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-greater-than')"
                                }, {
                                    'operator': '<=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-less-than')"
                                }, {
                                    'operator': '>',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.greater-than')"
                                }, {
                                    'operator': '<',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.less-than')"
                                }],
                            'integer': [{
                                    'operator': '==',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-equal-to')"
                                }, {
                                    'operator': '!=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-not-equal-to')"
                                }, {
                                    'operator': '>=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-greater-than')"
                                }, {
                                    'operator': '<=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-less-than')"
                                }, {
                                    'operator': '>',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.greater-than')"
                                }, {
                                    'operator': '<',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.less-than')"
                                }],
                            'text': [{
                                    'operator': '==',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-equal-to')"
                                }, {
                                    'operator': '!=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-not-equal-to')"
                                }, {
                                    'operator': '{}',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.contain')"
                                }, {
                                    'operator': '!{}',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.does-not-contain')"
                                }],
                            'boolean': [{
                                    'operator': '==',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-equal-to')"
                                }, {
                                    'operator': '!=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-not-equal-to')"
                                }],
                            'date': [{
                                    'operator': '==',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-equal-to')"
                                }, {
                                    'operator': '!=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-not-equal-to')"
                                }, {
                                    'operator': '>=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-greater-than')"
                                }, {
                                    'operator': '<=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-less-than')"
                                }, {
                                    'operator': '>',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.greater-than')"
                                }, {
                                    'operator': '<',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.less-than')"
                                }],
                            'datetime': [{
                                    'operator': '==',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-equal-to')"
                                }, {
                                    'operator': '!=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-not-equal-to')"
                                }, {
                                    'operator': '>=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-greater-than')"
                                }, {
                                    'operator': '<=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.equals-or-less-than')"
                                }, {
                                    'operator': '>',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.greater-than')"
                                }, {
                                    'operator': '<',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.less-than')"
                                }],
                            'select': [{
                                    'operator': '==',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-equal-to')"
                                }, {
                                    'operator': '!=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-not-equal-to')"
                                }],
                            'radio': [{
                                    'operator': '==',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-equal-to')"
                                }, {
                                    'operator': '!=',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.is-not-equal-to')"
                                }],
                            'multiselect': [{
                                    'operator': '{}',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.contains')"
                                }, {
                                    'operator': '!{}',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.does-not-contain')"
                                }],
                            'checkbox': [{
                                    'operator': '{}',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.contains')"
                                }, {
                                    'operator': '!{}',
                                    'label': "@lang('admin::app.marketing.promotions.catalog-rules.edit.does-not-contain')"
                                }]
                        }
                    }
                },

                computed: {
                    matchedAttribute: function () {
                        if (this.condition.attribute == '')
                            return;

                        let self = this;

                        let attributeIndex = this.attributeTypeIndexes[this.condition.attribute.split("|")[0]];

                        let matchedAttribute = this.conditionAttributes[attributeIndex]['children'].filter(function (attribute) {
                            return attribute.key == self.condition.attribute;
                        });

                        if (matchedAttribute[0]['type'] == 'multiselect' || matchedAttribute[0]['type'] == 'checkbox') {
                            this.condition.operator = '{}';

                            this.condition.value = this.condition.value == '' && this.condition.value != undefined
                                    ? []
                                    : Array.isArray(this.condition.value) ? this.condition.value : [];
                        }

                        return matchedAttribute[0];
                    }
                },

                methods: {
                    removeCondition() {
                        this.$emit('onRemoveCondition', this.condition)
                    },
                }
            });
        </script>
    @endPushOnce
<<<<<<< HEAD
</x-admin::layouts>
=======
</x-admin::layouts>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
