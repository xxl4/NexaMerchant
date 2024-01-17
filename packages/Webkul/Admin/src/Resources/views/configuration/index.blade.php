<x-admin::layouts>
<<<<<<< HEAD
    {{-- Title of the page. --}}
    <x-slot:title>
        @lang('admin::app.configuration.index.title')
    </x-slot:title>

    {{-- Heading of the page --}}
    <div class="flex justify-between items-center mb-[26px]">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
=======
    <!-- Title of the page. -->
    <x-slot:title>
        @lang('admin::app.configuration.index.title')
    </x-slot>

    <!-- Heading of the page -->
    <div class="flex justify-between items-center mb-7">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            @lang('admin::app.configuration.index.title')
        </p>
    </div>

<<<<<<< HEAD
    {{-- Page Content --}}
    <div class="grid gap-y-[30px]">
        @foreach ($config->items as $itemKey => $item)
            <div>
                <div class="grid gap-[4px]">
                    {{-- Title of the Main Card --}}
=======
    <!-- Page Content -->
    <div class="grid gap-y-8">
        @foreach ($config->items as $itemKey => $item)
            <div>
                <div class="grid gap-1">
                    <!-- Title of the Main Card -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <p class="text-gray-600 dark:text-gray-300 font-semibold">
                        @lang($item['name'] ?? '')
                    </p>

<<<<<<< HEAD
                    {{-- Info of the Main Card --}}
=======
                    <!-- Info of the Main Card -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <p class="text-gray-600 dark:text-gray-300">
                        @lang($item['info'] ?? '')
                    </p>
                </div>

<<<<<<< HEAD
                <div class="grid grid-cols-4 gap-[48px] flex-wrap justify-between p-[16px] mt-[8px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow max-1580:grid-cols-3 max-xl:grid-cols-2 max-sm:grid-cols-1">
                    {{-- Menus cards --}}
                    @foreach ($item['children'] as $childKey =>  $child)
                        <a 
                            class="flex items-center gap-[8px] max-w-[360px] p-[8px] rounded-[8px] transition-all hover:bg-gray-100 dark:hover:bg-gray-950"
=======
                <div class="grid grid-cols-4 gap-12 flex-wrap justify-between p-4 mt-2 bg-white dark:bg-gray-900 rounded box-shadow max-1580:grid-cols-3 max-xl:grid-cols-2 max-sm:grid-cols-1">
                    <!-- Menus cards -->
                    @foreach ($item['children'] as $childKey =>  $child)
                        <a 
                            class="flex items-center gap-2 max-w-[360px] p-2 rounded-lg transition-all hover:bg-gray-100 dark:hover:bg-gray-950"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            href="{{ route('admin.configuration.index', ($itemKey . '/' . $childKey)) }}"
                        >
                            @if (isset($child['icon']))
                                <img
                                    class="w-[60px] h-[60px] dark:invert dark:mix-blend-exclusion"
                                    src="{{ bagisto_asset('images/' . $child['icon'] ?? '') }}"
                                >
                            @endif

                            <div class="grid">
<<<<<<< HEAD
                                <p class="mb-[5px] text-[16px] text-gray-800 dark:text-white font-semibold">
                                    @lang($child['name'])
                                </p>
                                
                                <p class="text-[12px] text-gray-600 dark:text-gray-300">
=======
                                <p class="mb-1.5 text-base text-gray-800 dark:text-white font-semibold">
                                    @lang($child['name'])
                                </p>
                                
                                <p class="text-xs text-gray-600 dark:text-gray-300">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @lang($child['info'] ?? '')
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-admin::layouts>