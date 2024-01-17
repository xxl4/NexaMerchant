<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.reporting.customers.index.title')
<<<<<<< HEAD
    </x-slot:title>

    {{-- Page Header --}}
    <div class="flex gap-[16px] justify-between items-center mb-[20px] max-sm:flex-wrap">
        <div class="grid gap-[6px]">
            <p class="pt-[6px] text-[20px] text-gray-800 dark:text-white font-bold leading-[24px]">
=======
    </x-slot>

    <!-- Page Header -->
    <div class="flex gap-4 justify-between items-center mb-5 max-sm:flex-wrap">
        <div class="grid gap-1.5">
            <p class="pt-1.5 text-xl text-gray-800 dark:text-white font-bold leading-6">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @lang('admin::app.reporting.customers.index.title')
            </p>
        </div>

        <!-- Actions -->
        <v-reporting-filters>
<<<<<<< HEAD
            {{-- Shimmer --}}
            <div class="flex gap-[6px]">
                <div class="shimmer w-[140px] h-[39px] rounded-[6px]"></div>
                <div class="shimmer w-[140px] h-[39px] rounded-[6px]"></div>
=======
            <!-- Shimmer -->
            <div class="flex gap-1.5">
                <div class="shimmer w-[140px] h-[39px] rounded-md"></div>
                <div class="shimmer w-[140px] h-[39px] rounded-md"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </div>
        </v-reporting-filters>
    </div>

<<<<<<< HEAD
    {{-- Customers Stats Vue Component --}}
    <div class="flex flex-col gap-[15px] flex-1 max-xl:flex-auto">
=======
    <!-- Customers Stats Vue Component -->
    <div class="flex flex-col gap-4 flex-1 max-xl:flex-auto">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <!-- Customers Section -->
        @include('admin::reporting.customers.total-customers')

        <!-- Customers With Most Sales and Customers With Most Orders Sections Container -->
<<<<<<< HEAD
        <div class="flex justify-between gap-[15px] flex-1 [&>*]:flex-1 max-xl:flex-auto">
=======
        <div class="flex justify-between gap-4 flex-1 [&>*]:flex-1 max-xl:flex-auto">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <!-- Customers With Most Sales Section -->
            @include('admin::reporting.customers.most-sales')

            <!-- Customers With Most Orders Section -->
            @include('admin::reporting.customers.most-orders')
        </div>

        <!-- Customers Traffic Section -->
        @include('admin::reporting.customers.total-traffic')

        <!-- Top Customer Groups Sections Container -->
<<<<<<< HEAD
        <div class="flex justify-between gap-[15px] flex-1 [&>*]:flex-1 max-xl:flex-auto">
=======
        <div class="flex justify-between gap-4 flex-1 [&>*]:flex-1 max-xl:flex-auto">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <!-- Top Customer Groups Section -->
            @include('admin::reporting.customers.top-customer-groups')

            <!-- Customer with Most Reviews Section -->
            @include('admin::reporting.customers.most-reviews')
        </div>
    </div>

    @pushOnce('scripts')
        <script type="module" src="{{ bagisto_asset('js/chart.js') }}"></script>

        <script type="text/x-template" id="v-reporting-filters-template">
<<<<<<< HEAD
            <div class="flex gap-[6px]">
                <x-admin::flat-picker.date class="!w-[140px]" ::allow-input="false">
                    <input
                        class="flex min-h-[39px] w-full rounded-[6px] border px-3 py-2 text-[14px] text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
=======
            <div class="flex gap-1.5">
                <x-admin::flat-picker.date class="!w-[140px]" ::allow-input="false">
                    <input
                        class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-model="filters.start"
                        placeholder="@lang('admin::app.reporting.customers.index.start-date')"
                    />
                </x-admin::flat-picker.date>

                <x-admin::flat-picker.date class="!w-[140px]" ::allow-input="false">
                    <input
<<<<<<< HEAD
                        class="flex min-h-[39px] w-full rounded-[6px] border px-3 py-2 text-[14px] text-gray-600 transition-all hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
=======
                        class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 dark:hover:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        v-model="filters.end"
                        placeholder="@lang('admin::app.reporting.customers.index.end-date')"
                    />
                </x-admin::flat-picker.date>
            </div>
        </script>

        <script type="module">
            app.component('v-reporting-filters', {
                template: '#v-reporting-filters-template',

                data() {
                    return {
                        filters: {
                            start: "{{ $startDate->format('Y-m-d') }}",
                            
                            end: "{{ $endDate->format('Y-m-d') }}",
                        }
                    }
                },

                watch: {
                    filters: {
                        handler() {
                            this.$emitter.emit('reporting-filter-updated', this.filters);
                        },

                        deep: true
                    }
                },
            });
        </script>
    @endPushOnce
</x-admin::layouts>
