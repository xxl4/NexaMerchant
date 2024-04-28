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

        {{-- <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script> --}}

                <!-- Theme style -->
        <link rel="stylesheet" href="/themes/manage/AdminLTE/dist/css/adminlte.min.css">
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

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        {!! view_render_event('bagisto.shop.layout.body.before') !!}

        <div id="app" class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="{{ bagisto_asset('images/logo.svg') }}" alt="LOGO" height="160" width="160">
            </div>


            {!! view_render_event('bagisto.shop.layout.content.before') !!}

            {{-- Page Header Blade Component --}}
            <x-admin::layouts.header />

            
                {{-- Page Sidebar Blade Component --}}
                <x-admin::layouts.sidebar />

                <div class="content-wrapper">
                    {{-- Added dynamic tabs for third level menus  --}}
                    {{-- Todo @suraj-webkul need to optimize below statement. --}}
                    @if (! request()->routeIs('admin.configuration.index'))
                        <x-admin::layouts.tabs />
                    @endif

                    {{-- Page Content Blade Component --}}
                    {{ $slot }}
                </div>
            

            {!! view_render_event('bagisto.shop.layout.content.after') !!}

            <x-admin::layouts.footer />

        </div>

        {!! view_render_event('bagisto.shop.layout.body.after') !!}

        @stack('scripts')

        <!-- AdminLTE App -->
        <script src="/themes/manage/AdminLTE/dist/js/adminlte.js"></script>

       
    </body>
</html>
