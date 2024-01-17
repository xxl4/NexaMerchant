<<<<<<< HEAD
<div class="fixed top-[57px] h-full bg-white dark:bg-gray-900  pt-[8px] w-[270px] shadow-[0px_8px_10px_0px_rgba(0,_0,_0,_0.2)] z-[1000] max-lg:hidden transition-all duration-300 group-[.sidebar-collapsed]/container:w-[70px]">
    <div class="h-[calc(100vh-100px)] overflow-auto journal-scroll group-[.sidebar-collapsed]/container:overflow-visible">
        <nav class="grid gap-[7px] w-full">
            {{-- Navigation Menu --}}
            <?php 
            
            // var_dump($menu);

            ?>
            @foreach ($menu->items as $menuItem)
                <div class="relative px-[16px] group/item">
                    <a
                        href="{{ $menuItem['url'] }}"
                        class="flex gap-[10px] p-[6px] items-center cursor-pointer hover:rounded-[8px] {{ $menu->getActive($menuItem) == 'active' ? 'bg-blue-600 rounded-[8px]' : ' hover:bg-gray-100 hover:dark:bg-gray-950' }} peer"
                    >
                        <span class="{{ $menuItem['icon'] }} text-[24px] {{ $menu->getActive($menuItem) ? 'text-white' : ''}}"></span>
=======
<div class="fixed top-14 h-full bg-white dark:bg-gray-900 pt-4 w-[270px] shadow-[0px_8px_10px_0px_rgba(0,_0,_0,_0.2)] z-[1000] max-lg:hidden transition-all duration-300 group-[.sidebar-collapsed]/container:w-[70px]">
    <div class="h-[calc(100vh-100px)] overflow-auto journal-scroll group-[.sidebar-collapsed]/container:overflow-visible">
        <nav class="grid gap-2 w-full">
            <!-- Navigation Menu -->
            @foreach ($menu->items as $menuItem)
                <div
                    class="px-4 group/item {{ $menu->getActive($menuItem) ? 'active' : 'inactive' }}"
                    onmouseenter="adjustSubMenuPosition(event)"
                >
                    <a
                        href="{{ $menuItem['url'] }}"
                        class="flex gap-2.5 p-1.5 items-center cursor-pointer hover:rounded-lg {{ $menu->getActive($menuItem) == 'active' ? 'bg-blue-600 rounded-lg' : ' hover:bg-gray-100 hover:dark:bg-gray-950' }} peer"
                    >
                        <span class="{{ $menuItem['icon'] }} text-2xl {{ $menu->getActive($menuItem) ? 'text-white' : ''}}"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        
                        <p class="text-gray-600 dark:text-gray-300 font-semibold whitespace-nowrap group-[.sidebar-collapsed]/container:hidden {{ $menu->getActive($menuItem) ? 'text-white' : ''}}">
                            @lang($menuItem['name'])
                        </p>
                    </a>

<<<<<<< HEAD
                    <?php
                    


                    ?>

                    @if (count($menuItem['children']))
                        <div class="{{ $menu->getActive($menuItem) ? ' !grid bg-gray-100 dark:bg-gray-950' : '' }} hidden min-w-[180px] ltr:pl-[40px] rtl:pr-[40px] pb-[7px] rounded-b-[8px] z-[100] overflow-hidden group-[.sidebar-collapsed]/container:!hidden group-[.sidebar-collapsed]/container:absolute group-[.sidebar-collapsed]/container:top-0 group-[.sidebar-collapsed]/container:ltr:left-[70px] group-[.sidebar-collapsed]/container:rtl:right-[70px] group-[.sidebar-collapsed]/container:p-[0] group-[.sidebar-collapsed]/container:bg-white dark:group-[.sidebar-collapsed]/container:bg-gray-900 group-[.sidebar-collapsed]/container:border-[1px] group-[.sidebar-collapsed]/container:ltr:rounded-r-[8px] group-[.sidebar-collapsed]/container:rtl:rounded-l-[8px] group-[.sidebar-collapsed]/container:border-gray-300 group-[.sidebar-collapsed]/container:dark:border-gray-800 group-[.sidebar-collapsed]/container:rounded-none group-[.sidebar-collapsed]/container:ltr:shadow-[34px_10px_14px_rgba(0,0,0,0.01),19px_6px_12px_rgba(0,0,0,0.03),9px_3px_9px_rgba(0,0,0,0.04),2px_1px_5px_rgba(0,0,0,0.05),0px_0px_0px_rgba(0,0,0,0.05)] group-[.sidebar-collapsed]/container:rtl:shadow-[-34px_10px_14px_rgba(0,0,0,0.01),-19px_6px_12px_rgba(0,0,0,0.03),-9px_3px_9px_rgba(0,0,0,0.04),-2px_1px_5px_rgba(0,0,0,0.05),-0px_0px_0px_rgba(0,0,0,0.05)] group-[.sidebar-collapsed]/container:group-hover/item:!grid">
                            <?php 
                            
                            //var_dump($menuItem['children']);

                            ?>
                            @foreach ($menuItem['children'] as $subMenuItem)
                                <a
                                    href="{{ $subMenuItem['url'] }}"
                                    class="text-[14px] text-{{ $menu->getActive($subMenuItem) ? 'blue':'gray' }}-600 dark:text-{{ $menu->getActive($subMenuItem) ? 'blue':'gray' }}-300 whitespace-nowrap py-[4px] group-[.sidebar-collapsed]/container:px-[20px] group-[.sidebar-collapsed]/container:py-[10px] hover:bg-gray-100 dark:hover:bg-gray-950"
=======
                    @if (count($menuItem['children']))
                        <div class="{{ $menu->getActive($menuItem) ? '!grid bg-gray-100 dark:bg-gray-950' : '' }} hidden min-w-[180px] ltr:pl-10 rtl:pr-10 pb-2 rounded-b-lg z-[100] overflow-hidden group-[.sidebar-collapsed]/container:!hidden group-[.sidebar-collapsed]/container:fixed group-[.sidebar-collapsed]/container:ltr:!left-[70px] group-[.sidebar-collapsed]/container:rtl:!right-[70px] group-[.sidebar-collapsed]/container:p-[0] group-[.sidebar-collapsed]/container:bg-white dark:group-[.sidebar-collapsed]/container:bg-gray-900 group-[.sidebar-collapsed]/container:border group-[.sidebar-collapsed]/container:ltr:rounded-r-lg group-[.sidebar-collapsed]/container:rtl:rounded-l-lg group-[.sidebar-collapsed]/container:border-gray-300 group-[.sidebar-collapsed]/container:dark:border-gray-800 group-[.sidebar-collapsed]/container:rounded-none group-[.sidebar-collapsed]/container:ltr:shadow-[34px_10px_14px_rgba(0,0,0,0.01),19px_6px_12px_rgba(0,0,0,0.03),9px_3px_9px_rgba(0,0,0,0.04),2px_1px_5px_rgba(0,0,0,0.05),0px_0px_0px_rgba(0,0,0,0.05)] group-[.sidebar-collapsed]/container:rtl:shadow-[-34px_10px_14px_rgba(0,0,0,0.01),-19px_6px_12px_rgba(0,0,0,0.03),-9px_3px_9px_rgba(0,0,0,0.04),-2px_1px_5px_rgba(0,0,0,0.05),-0px_0px_0px_rgba(0,0,0,0.05)] group-[.sidebar-collapsed]/container:group-hover/item:!grid group-[.inactive]/item:hidden group-[.inactive]/item:fixed group-[.inactive]/item:ltr:left-[270px] group-[.inactive]/item:rtl:right-[270px] group-[.inactive]/item:p-[0] group-[.inactive]/item:bg-white dark:group-[.inactive]/item:bg-gray-900 group-[.inactive]/item:border group-[.inactive]/item:ltr:rounded-r-lg group-[.inactive]/item:rtl:rounded-l-lg group-[.inactive]/item:border-gray-300 group-[.inactive]/item:dark:border-gray-800 group-[.inactive]/item:rounded-none group-[.inactive]/item:ltr:shadow-[34px_10px_14px_rgba(0,0,0,0.01),19px_6px_12px_rgba(0,0,0,0.03),9px_3px_9px_rgba(0,0,0,0.04),2px_1px_5px_rgba(0,0,0,0.05),0px_0px_0px_rgba(0,0,0,0.05)] group-[.inactive]/item:rtl:shadow-[-34px_10px_14px_rgba(0,0,0,0.01),-19px_6px_12px_rgba(0,0,0,0.03),-9px_3px_9px_rgba(0,0,0,0.04),-2px_1px_5px_rgba(0,0,0,0.05),-0px_0px_0px_rgba(0,0,0,0.05)] group-[.inactive]/item:group-hover/item:!grid">
                            @foreach ($menuItem['children'] as $subMenuItem)
                                <a
                                    href="{{ $subMenuItem['url'] }}"
                                    class="text-sm text-{{ $menu->getActive($subMenuItem) ? 'blue':'gray' }}-600 dark:text-{{ $menu->getActive($subMenuItem) ? 'blue':'gray' }}-300 whitespace-nowrap py-1 group-[.sidebar-collapsed]/container:px-5 group-[.sidebar-collapsed]/container:py-2.5 group-[.inactive]/item:px-5 group-[.inactive]/item:py-2.5 hover:text-blue-600 dark:hover:bg-gray-950"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                >
                                    @lang($subMenuItem['name'])
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </nav>
    </div>

<<<<<<< HEAD
    {{-- Collapse menu --}}
=======
    <!-- Collapse menu -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <v-sidebar-collapse></v-sidebar-collapse>
</div>

@pushOnce('scripts')
    <script type="text/x-template" id="v-sidebar-collapse-template">
        <div
<<<<<<< HEAD
            class="bg-white dark:bg-gray-900  fixed w-full max-w-[270px] bottom-0 px-[16px] hover:bg-gray-100 dark:hover:bg-gray-950 border-t-[1px] border-gray-200 dark:border-gray-800 transition-all duration-300 cursor-pointer"
            :class="{'max-w-[70px]': isCollapsed}"
            @click="toggle"
        >
            <div class="flex gap-[10px] p-[6px] items-center">
                <span
                    class="icon-collapse transition-all text-[24px]"
=======
            class="bg-white dark:bg-gray-900 fixed w-full max-w-[270px] bottom-0 px-4 hover:bg-gray-100 dark:hover:bg-gray-950 border-t border-gray-200 dark:border-gray-800 transition-all duration-300 cursor-pointer"
            :class="{'max-w-[70px]': isCollapsed}"
            @click="toggle"
        >
            <div class="flex gap-2.5 p-1.5 items-center">
                <span
                    class="icon-collapse transition-all text-2xl"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    :class="[isCollapsed ? 'ltr:rotate-[180deg] rtl:rotate-[0]' : 'ltr:rotate-[0] rtl:rotate-[180deg]']"
                ></span>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-sidebar-collapse', {
            template: '#v-sidebar-collapse-template',

            data() {
                return {
                    isCollapsed: {{ request()->cookie('sidebar_collapsed') ?? 0 }},
                }
            },

            methods: {
                toggle() {
                    this.isCollapsed = parseInt(this.isCollapsedCookie()) ? 0 : 1;

                    var expiryDate = new Date();

                    expiryDate.setMonth(expiryDate.getMonth() + 1);

                    document.cookie = 'sidebar_collapsed=' + this.isCollapsed + '; path=/; expires=' + expiryDate.toGMTString();

                    this.$root.$refs.appLayout.classList.toggle('sidebar-collapsed');
                },

                isCollapsedCookie() {
                    const cookies = document.cookie.split(';');

                    for (const cookie of cookies) {
                        const [name, value] = cookie.trim().split('=');

                        if (name === 'sidebar_collapsed') {
                            return value;
                        }
                    }
                    
                    return 0;
                },
            },
        });
    </script>
<<<<<<< HEAD
=======

    <script>
        const adjustSubMenuPosition = (event) => {
            let menuContainer = event.currentTarget;

            let subMenuContainer = menuContainer.lastElementChild;

            if (subMenuContainer) {
                const menuTopOffset = menuContainer.getBoundingClientRect().top;

                const subMenuHeight = subMenuContainer.offsetHeight;

                const availableHeight = window.innerHeight - menuTopOffset;

                let subMenuTopOffset = menuTopOffset;

                if (subMenuHeight > availableHeight) {
                    subMenuTopOffset = menuTopOffset - (subMenuHeight - availableHeight);
                }

                subMenuContainer.style.top = `${subMenuTopOffset}px`;
            }
        };
    </script>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@endpushOnce