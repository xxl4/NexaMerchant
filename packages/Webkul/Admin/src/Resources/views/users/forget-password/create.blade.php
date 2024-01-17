<x-admin::layouts.anonymous>
<<<<<<< HEAD
    {{-- Page Title --}}
    <x-slot:title>
        @lang('admin::app.users.forget-password.create.page-title')
    </x-slot:title>

    <div class="flex justify-center items-center h-[100vh]">
        <div class="flex flex-col gap-[20px] items-center">
            {{-- Logo --}}
            <img 
                class="w-max" 
                src="{{ bagisto_asset('images/logo.svg') }}" 
                alt="Bagisto Logo"
            >

            <div class="flex flex-col min-w-[300px] bg-white dark:bg-gray-900 rounded-[6px] box-shadow">
                {{-- Forget Password Form --}}
                <x-admin::form :action="route('admin.forget_password.store')">
                    <div class="p-[16px]  ">
                        <p class="text-[20px] text-gray-800 dark:text-white font-bold ">
=======
    <!-- Page Title -->
    <x-slot:title>
        @lang('admin::app.users.forget-password.create.page-title')
    </x-slot>

    <div class="flex justify-center items-center h-[100vh]">
        <div class="flex flex-col gap-5 items-center">
            <!-- Logo -->
            @if ($logo = core()->getConfigData('general.design.admin_logo.logo_image'))
                <img
                    class="w-[110px] h-10"
                    src="{{ Storage::url($logo) }}"
                    alt="{{ config('app.name') }}"
                />
            @else
                <img
                    class="w-max" 
                    src="{{ bagisto_asset('images/logo.svg') }}"
                    alt="{{ config('app.name') }}"
                />
            @endif

            <div class="flex flex-col min-w-[300px] bg-white dark:bg-gray-900 rounded-md box-shadow">
                <!-- Forget Password Form -->
                <x-admin::form :action="route('admin.forget_password.store')">
                    <div class="p-4">
                        <p class="text-xl text-gray-800 dark:text-white font-bold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.users.forget-password.create.title')
                        </p>
                    </div>

<<<<<<< HEAD
                    <div class="p-[16px] border-t-[1px] border-b-[1px] dark:border-gray-800">
                        <div class="mb-[10px]">
                            {{-- Registered Email --}}
                            <x-admin::form.control-group>
                                <x-admin::form.control-group.label class="required">
                                    @lang('admin::app.users.forget-password.create.email')
                                </x-admin::form.control-group.label>

                                <x-admin::form.control-group.control
                                    type="email"
                                    name="email" 
                                    :value="old('email')"
                                    id="email"
                                    class="w-[254px] max-w-full" 
                                    rules="required|email" 
                                    :label="trans('admin::app.users.forget-password.create.email')"
                                    :placeholder="trans('admin::app.users.forget-password.create.email')"
                                >
                                </x-admin::form.control-group.control>

                                <x-admin::form.control-group.error
                                    control-name="email"
                                >
                                </x-admin::form.control-group.error>
                            </x-admin::form.control-group>
                        </div>
                    </div>
                    <div class="flex justify-between items-center p-[16px]">
                        {{-- Back to Sign In link --}}
                        <a 
                            class="text-[12px] text-blue-600 font-semibold leading-[24px] cursor-pointer"
=======
                    <div class="p-4 border-y dark:border-gray-800">
                        <!-- Registered Email -->
                        <x-admin::form.control-group>
                            <x-admin::form.control-group.label class="required">
                                @lang('admin::app.users.forget-password.create.email')
                            </x-admin::form.control-group.label>

                            <x-admin::form.control-group.control
                                type="email"
                                name="email" 
                                :value="old('email')"
                                id="email"
                                class="w-[254px] max-w-full" 
                                rules="required|email" 
                                :label="trans('admin::app.users.forget-password.create.email')"
                                :placeholder="trans('admin::app.users.forget-password.create.email')"
                            >
                            </x-admin::form.control-group.control>

                            <x-admin::form.control-group.error
                                control-name="email"
                            >
                            </x-admin::form.control-group.error>
                        </x-admin::form.control-group>
                    </div>
                    <div class="flex justify-between items-center p-4">
                        <!-- Back to Sign In link -->
                        <a 
                            class="text-xs text-blue-600 font-semibold leading-6 cursor-pointer"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            href="{{ route('admin.session.create') }}"
                        >
                            @lang('admin::app.users.forget-password.create.sign-in-link')
                        </a>

<<<<<<< HEAD
                        {{-- Form Submit Button --}}
                        <button 
                            class="px-[14px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer">
=======
                        <!-- Form Submit Button -->
                        <button 
                            class="px-3.5 py-1.5 bg-blue-600 border border-blue-700 rounded-md text-gray-50 font-semibold cursor-pointer">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @lang('admin::app.users.forget-password.create.submit-btn')
                        </button>
                    </div>
                </x-admin::form>
            </div>
        </div>
    </div>
</x-admin::layouts.anonymous>