@props(['position' => 'left'])

<v-tabs
    position="{{ $position }}"
    {{ $attributes }}
>
    <x-admin::shimmer.tabs/>
</v-tabs>

@pushOnce('scripts')
    <script 
        type="text/x-template"
        id="v-tabs-template"
    >
        <div>
            <div
<<<<<<< HEAD
                class="flex gap-[15px] justify-center pt-[8px] bg-neutral-100 max-sm:hidden"
=======
                class="flex gap-4 justify-center pt-2 bg-neutral-100 max-sm:hidden"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                :style="positionStyles"
            >
                <div
                    v-for="tab in tabs"
<<<<<<< HEAD
                    class="pb-[14px] px-[10px] text-[16px] font-medium text-gray-300 cursor-pointer"
                    :class="{'border-navyBlue border-b-[2px] text-black transition': tab.isActive }"
=======
                    class="pb-3.5 px-2.5 text-base  font-medium text-gray-300 cursor-pointer"
                    :class="{'border-navyBlue border-b-2 text-black transition': tab.isActive }"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-text="tab.title"
                    @click="change(tab)"
                >
                </div>
            </div>

            <div>
                {{ $slot }}
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-tabs', {
            template: '#v-tabs-template',

            props: ['position'],

            data() {
                return {
                    tabs: []
                }
            },

            computed: {
                positionStyles() {
                    return [
                        `justify-content: ${this.position}`
                    ];
                },
            },

            methods: {
                change(selectedTab) {
                    this.tabs.forEach(tab => {
                        tab.isActive = (tab.title == selectedTab.title);
                    });
                },
            },
        });
    </script>
@endPushOnce
