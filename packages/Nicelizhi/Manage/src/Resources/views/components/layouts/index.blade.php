<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}" class="{{ (request()->cookie('dark_mode') ?? 0) ? 'dark' : '' }}">
    <head>
        <title>{{ $title ?? '' }}</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url()->to('/') }}">
        <meta name="currency-code" content="{{ core()->getBaseCurrencyCode() }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

        @stack('meta')

        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="/themes/manage/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">


        @if ($favicon = core()->getConfigData('general.design.admin_logo.favicon', core()->getCurrentChannelCode()))
            <link 
                type="image/x-icon"
                href="{{ Storage::url($favicon) }}" 
                rel="shortcut icon"
                sizes="16x16"
            >
        @else
            <link 
                type="image/x-icon"
                href="{{ bagisto_asset('images/favicon.ico') }}" 
                rel="shortcut icon"
                sizes="16x16"
            />
        @endif
        
        @stack('styles')

        <style>
            {!! core()->getConfigData('general.content.custom_scripts.custom_css') !!}
        </style>

        {!! view_render_event('bagisto.shop.layout.head') !!}
    </head>

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        {!! view_render_event('bagisto.shop.layout.body.before') !!}

        <div id="app" class="wrapper">

            <!-- Preloader -->
            {{-- <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="{{ bagisto_asset('images/logo.svg') }}" alt="LOGO" height="160" width="160">
            </div> --}}


            {!! view_render_event('bagisto.shop.layout.content.before') !!}

            {{-- Page Header Blade Component --}}
            <x-admin::layouts.header />

            
                {{-- Page Sidebar Blade Component --}}
                <x-admin::layouts.sidebar />

                <div class="flex-1 max-w-full px-[16px] pt-[11px] pb-[22px] bg-white dark:bg-gray-950 ltr:pl-[286px] rtl:pr-[286px] max-lg:!px-[16px] transition-all duration-300 group-[.sidebar-collapsed]/container:ltr:pl-[85px] group-[.sidebar-collapsed]/container:rtl:pr-[85px]">
                    {{-- Added dynamic tabs for third level menus  --}}
                    {{-- Todo @suraj-webkul need to optimize below statement. --}}
                    @if (! request()->routeIs('admin.configuration.index'))
                        <x-admin::layouts.tabs />
                    @endif

                    {{-- Page Content Blade Component --}}
                    {{ $slot }}
                </div>
            

            {!! view_render_event('bagisto.shop.layout.content.after') !!}
        </div>

        {!! view_render_event('bagisto.shop.layout.body.after') !!}

        @stack('scripts')

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="/themes/manage/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/themes/manage/AdminLTE/dist/js/adminlte.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="/themes/manage/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="/themes/manage/AdminLTE/plugins/raphael/raphael.min.js"></script>
        <script src="/themes/manage/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="/themes/manage/AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="/themes/manage/AdminLTE/plugins/chart.js/Chart.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="/themes/manage/AdminLTE/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/themes/manage/AdminLTE/dist/js/pages/dashboard2.js"></script>

    </body>
</html>
