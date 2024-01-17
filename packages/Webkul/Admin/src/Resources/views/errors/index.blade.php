<x-admin::layouts.anonymous>
<<<<<<< HEAD
    {{-- Page Title --}}
=======
    <!-- Page Title -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-slot:title>
        @lang("admin::app.errors.{$errorCode}.title")
    </x-slot>

<<<<<<< HEAD
    {{-- Error page Information --}}
	<div class="flex justify-center items-center h-[100vh] bg-white dark:bg-gray-900 ">
        <div class="flex gap-[20px] items-center max-w-[745px]">
            <div class="w-full">
                <img
                    src="{{ bagisto_asset('images/logo.svg') }}"
                    class="mb-[25px]"
=======
    <!-- Error page Information -->
	<div class="flex justify-center items-center h-[100vh] bg-white dark:bg-gray-900">
        <div class="flex gap-5 items-center max-w-[745px]">
            <div class="w-full">
                <img
                    src="{{ bagisto_asset('images/logo.svg') }}"
                    class="mb-6"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                >

				<div class="text-[38px] text-gray-800 dark:text-white font-bold">
                    {{ $errorCode }}
                </div>

<<<<<<< HEAD
                <p class="mb-[25px] text-[14px] text-gray-800">
                    @lang("admin::app.errors.{$errorCode}.description")
                </p>

                <div class="mb-[25px]">
                    <div class="flex gap-[10px] items-center">
                        <a
                            onclick="history.back()"
                            class="text-[14px] text-blue-600 font-semibold transition-all hover:underline"
=======
                <p class="mb-6 text-sm text-gray-800">
                    @lang("admin::app.errors.{$errorCode}.description")
                </p>

                <div class="mb-6">
                    <div class="flex gap-2.5 items-center">
                        <a
                            onclick="history.back()"
                            class="text-sm text-blue-600 font-semibold transition-all hover:underline"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        >
                            @lang('admin::app.errors.go-back')
                        </a>

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                <circle cx="3" cy="3.5" r="3" fill="#9CA3AF"/>
                            </svg>
                        </span>

                        <a
                            href="{{ route('admin.dashboard.index') }}"
<<<<<<< HEAD
                            class="text-[14px] text-blue-600 font-semibold transition-all hover:underline"
=======
                            class="text-sm text-blue-600 font-semibold transition-all hover:underline"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        >
                            @lang('admin::app.errors.dashboard')
                        </a>
                    </div>
                </div>

<<<<<<< HEAD
                <p class="text-[14px] text-gray-800">
=======
                <p class="text-sm text-gray-800">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    @lang('admin::app.errors.support', [
                        'link'  => 'mailto:support@example.com',
                        'email' => 'support@example.com',
                        'class' => 'text-blue-600 font-semibold transition-all hover:underline',
                    ])
                </p>
            </div>

            <div class="w-full">
                <img src="{{ bagisto_asset('images/error.svg') }}" />
            </div>
        </div>
	</div>
</x-admin::layouts.anonymous>