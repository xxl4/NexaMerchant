<x-shop::layouts>
<<<<<<< HEAD
    {{-- Page Title --}}
=======
    <!-- Page Title -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-slot:title>
        {{ $title ?? '' }}
    </x-slot>

<<<<<<< HEAD
    {{-- Page Content --}}
    <div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
        <x-shop::layouts.account.breadcrumb />

        <div class="flex gap-[40px] items-start mt-[30px] max-lg:gap-[20px] max-md:grid">
=======
    <!-- Page Content -->
    <div class="container px-[60px] max-lg:px-8 max-sm:px-4">
        <x-shop::layouts.account.breadcrumb />

        <div class="flex gap-10 items-start mt-8 max-lg:gap-5 max-md:grid">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <x-shop::layouts.account.navigation />

            <div class="flex-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-shop::layouts>
