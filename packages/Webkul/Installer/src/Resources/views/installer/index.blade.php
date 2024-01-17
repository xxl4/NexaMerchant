<!DOCTYPE html>
<<<<<<< HEAD
<html>
    <head>
        <title>Bagisto Installer</title>
=======
<html
    lang="{{ app()->getLocale() }}"
    dir="{{ in_array(app()->getLocale(), ['ar', 'fa', 'he']) ? 'rtl' : 'ltr' }}"
>
    <head>
        <title>@lang('installer::app.installer.index.title')</title>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
        <meta name="csrf-token" content="{{ csrf_token() }}">
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <meta name="base-url" content="{{ url()->to('/') }}">

        @stack('meta')

        @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'], 'installer')

<<<<<<< HEAD
        {{-- <link 
            type="image/x-icon"
            href="{{ Storage::url($favicon) }}" 
            rel="shortcut icon"
            sizes="16x16"
        > --}}

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        <link
            href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap"
            rel="stylesheet"
        />

<<<<<<< HEAD
        <link 
            type="image/x-icon"
            href="{{ asset('images/logo.svg') }}" 
            rel="shortcut icon"
            sizes="16x16"
        />
        
        @stack('styles')
    </head>

    <body>
        <div id="app" class="container">
            <div class="flex [&amp;>*]:w-[50%] justify-center items-center">
=======
        <link
            type="image/x-icon"
            href="{{ bagisto_asset('images/installer/favicon.ico', 'installer') }}"
            rel="shortcut icon"
            sizes="16x16"
        />

        @stack('styles')
    </head>

    @php
        $locales = [
            'ar'    => 'arabic',
            'bn'    => 'bengali',
            'pt_BR' => 'portuguese',
            'zh_CN' => 'chinese',
            'nl'    => 'dutch',
            'en'    => 'english',
            'fr'    => 'french',
            'de'    => 'german',
            'he'    => 'hebrew',
            'hi_IN' => 'hindi',
            'it'    => 'italian',
            'ja'    => 'japanese',
            'fa'    => 'persian',
            'pl'    => 'polish',
            'ru'    => 'russian',
            'sin'   => 'sinhala',
            'es'    => 'spanish',
            'tr'    => 'turkish',
            'uk'    => 'ukrainian',
        ];

        $currencies = [
            'CNY' => 'chinese-yuan',
            'AED' => 'dirham',
            'EUR' => 'euro',
            'INR' => 'rupee',
            'IRR' => 'iranian',
            'AFN' => 'israeli',
            'JPY' => 'japanese-yen',
            'GBP' => 'pound',
            'RUB' => 'russian-ruble',
            'SAR' => 'saudi',
            'TRY' => 'turkish-lira',
            'USD' => 'usd',
            'UAH' => 'ukrainian-hryvnia',
        ];
    @endphp

    <body>
        <div id="app" class="container fixed">
            <div class="flex [&amp;>*]:w-[50%] gap-[50px] justify-center items-center">
                <!-- Vue Component -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <v-server-requirements></v-server-requirements>
            </div>
        </div>

        @pushOnce('scripts')
            <script type="text/x-template" id="v-server-requirements-template">
                <!-- Left Side Welcome to Installation -->
                <div class="flex flex-col justify-center">
                    <div class="grid items-end max-w-[362px] m-auto h-[100vh]">
<<<<<<< HEAD
                        <div class="grid gap-[16px]">
                            <img
                                src="{{ bagisto_asset('images/bagisto-logo.svg', 'installer') }}"
                                alt="Bagisto Logo"
                            >

                            <div class="grid gap-[6px]">
                                <p class="text-gray-800 text-[20px] font-bold">
                                    Welcome to Installation
                                </p>

                                <p class="text-gray-600 text-[14px]">
                                    We are happy to see you here!
                                </p>
                            </div>

                            <p class="text-gray-600 text-[14px]">
                                Bagisto installation typically involves several steps. Here's a general outline of the installation process for Bagisto:
                            </p>

                            <div class="grid gap-[12px]">
                                <!-- Server Environment -->
                                <div
                                    class="flex gap-[4px] text-[14px] text-gray-600"
                                    :class="[stepStates.environment == 'active' ? 'font-bold' : '', 'text-gray-600']"
                                >
                                    <span v-if="stepStates.environment !== 'complete'">
                                        <span
                                            class="text-[20px]"
                                            :class="stepStates.environment === 'pending' ? 'icon-checkbox' : 'icon-processing'"
=======
                        <div class="grid gap-4">
                            <img
                                src="{{ bagisto_asset('images/installer/bagisto-logo.svg', 'installer') }}"
                                alt="@lang('installer::app.installer.index.bagisto-logo')"
                            >

                            <div class="grid gap-1.5">
                                <p class="text-gray-800 text-[20px] font-bold">
                                    @lang('installer::app.installer.index.installation-title')
                                </p>

                                <p class="text-gray-600 text-[14px]">
                                    @lang('installer::app.installer.index.installation-info')
                                </p>
                            </div>

                            <div class="grid gap-3">
                                <div
                                    class="flex gap-1 text-[14px] text-gray-600"
                                    :class="[stepStates.start == 'active' ? 'font-bold' : '', 'text-gray-600']"
                                >
                                    <span v-if="stepStates.start !== 'complete'">
                                        <span
                                            class="text-[20px]"
                                            :class="stepStates.start === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        >
                                        </span>
                                    </span>

                                    <span v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </span>

<<<<<<< HEAD
                                    <p>Server Requirements</p>
                                </div>

                                <!-- ENV Setup -->
                                <div
                                    class="flex gap-[4px] text-[14px] text-gray-600"
                                    :class="[stepStates.envSetup == 'active' ? 'font-bold' : '', 'text-gray-600']"
                                >
                                    <span v-if="stepStates.envSetup !== 'complete'">
                                        <span
                                            class="text-[20px]"
                                            :class="stepStates.envSetup === 'pending' ? 'icon-checkbox' : 'icon-processing'"
=======
                                    <p>@lang('installer::app.installer.index.start.main')</p>
                                </div>

                                <!-- Server Environment -->
                                <div
                                    class="flex gap-1 text-[14px] text-gray-600"
                                    :class="[stepStates.systemRequirements == 'active' ? 'font-bold' : '', 'text-gray-600']"
                                >
                                    <span v-if="stepStates.systemRequirements !== 'complete'">
                                        <span
                                            class="text-[20px]"
                                            :class="stepStates.systemRequirements === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        >
                                        </span>
                                    </span>

                                    <span v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </span>

<<<<<<< HEAD
                                    <p>Environment Configuration</p>
=======
                                    <p>@lang('installer::app.installer.index.server-requirements.title')</p>
                                </div>

                                <!-- ENV Database Configuration -->
                                <div
                                    class="flex gap-1 text-[14px] text-gray-600"
                                    :class="[stepStates.envDatabase == 'active' ? 'font-bold' : '', 'text-gray-600']"
                                >
                                    <span v-if="stepStates.envDatabase !== 'complete'">
                                        <span
                                            class="text-[20px]"
                                            :class="stepStates.envDatabase === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
                                        >
                                        </span>
                                    </span>

                                    <span v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </span>

                                    <p>
                                        @lang('installer::app.installer.index.environment-configuration.title')
                                    </p>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                </div>

                                <!-- Ready For Installation -->
                                <div
<<<<<<< HEAD
                                    class="flex gap-[4px] text-[14px] text-gray-600"
=======
                                    class="flex gap-1 text-[14px] text-gray-600"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :class="[stepStates.readyForInstallation == 'active' ? 'font-bold' : '', 'text-gray-600']"
                                >
                                    <span v-if="stepStates.readyForInstallation !== 'complete'">
                                        <span
                                            class="text-[20px]"
<<<<<<< HEAD
                                            :class="stepStates.readyForInstallation === 'pending' ? 'icon-checkbox' : 'icon-processing'"
=======
                                            :class="stepStates.readyForInstallation === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        >
                                        </span>
                                    </span>

                                    <span v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </span>

<<<<<<< HEAD
                                    <p>Ready for Installation</p>
                                </div>

                                <!-- Create Admin Configuration -->
                                <div
                                    class="flex gap-[4px] text-[14px] text-gray-600"
=======
                                    <p>@lang('installer::app.installer.index.ready-for-installation.title')</p>
                                </div> 

                                <!-- Create Admin Configuration -->
                                <div
                                    class="flex gap-1 text-[14px] text-gray-600"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :class="[stepStates.createAdmin == 'active' ? 'font-bold' : '', 'text-gray-600']"
                                >
                                    <span v-if="stepStates.createAdmin !== 'complete'">
                                        <span
                                            class="text-[20px]"
<<<<<<< HEAD
                                            :class="stepStates.createAdmin === 'pending' ? 'icon-checkbox' : 'icon-processing'"
=======
                                            :class="stepStates.createAdmin === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        >
                                        </span>
                                    </span>

                                    <span v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </span>

<<<<<<< HEAD
                                    <p>Create Administrator</p>
                                </div>

                                <!-- Email Configuration -->
                                <div
                                    class="flex gap-[4px] text-[14px] text-gray-600"
                                    :class="[stepStates.emailConfiguration == 'active' ? 'font-bold' : '', 'text-gray-600']"
                                >
                                    <span v-if="stepStates.emailConfiguration !== 'complete'">
                                        <span
                                            class="text-[20px]"
                                            :class="stepStates.emailConfiguration === 'pending' ? 'icon-checkbox' : 'icon-processing'"
                                        >
                                        </span>
                                    </span>

                                    <span v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </span>

                                    <p>Email Configuration</p>
=======
                                    <p>@lang('installer::app.installer.index.create-administrator.title')</p>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                </div>

                                <!-- Installation Completed -->
                                <div
<<<<<<< HEAD
                                    class="flex gap-[4px] text-[14px] text-gray-600"
=======
                                    class="flex gap-1 text-[14px] text-gray-600"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    :class="[stepStates.installationCompleted == 'active' ? 'font-bold' : '', 'text-gray-600']"
                                >
                                    <span v-if="stepStates.installationCompleted !== 'complete'">
                                        <span
                                            class="text-[20px]"
<<<<<<< HEAD
                                            :class="stepStates.installationCompleted === 'pending' ? 'icon-checkbox' : 'icon-processing'"
=======
                                            :class="stepStates.installationCompleted === 'pending' ? 'icon-checkbox-normal' : 'icon-right'"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        >
                                        </span>
                                    </span>

                                    <span v-else>
                                        <span class="icon-tick text-green-500"></span>
                                    </span>

<<<<<<< HEAD
                                    <p>Installation Completed</p>
=======
                                    <p>@lang('installer::app.installer.index.installation-completed.title')</p>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                </div>

                            </div>
                        </div>

                        <p class="place-self-end w-full text-left mb-[24px]">
                            <a
<<<<<<< HEAD
                                class="text-blue-500"
                                href="https://bagisto.com/en/"
                            >
                                Bagisto
                            </a> 
                            
                            a Community Project by

                            <a
                                class="text-blue-500"
                                href="https://webkul.com/"
                            >
                                Webkul
=======
                                class="bg-white underline text-blue-600"
                                href="https://bagisto.com/en/"
                            >
                                @lang('installer::app.installer.index.bagisto')
                            </a>

                            <span>@lang('installer::app.installer.index.bagisto-info')</span>

                            <a
                                class="bg-white underline text-blue-600"
                                href="https://webkul.com/"
                            >
                                @lang('installer::app.installer.index.webkul')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Right Side Components -->
<<<<<<< HEAD
                <!-- Server Requirements -->
                <div class="w-full max-w-[568px] bg-white rounded-[8px] shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300" v-if="currentStep == 'environment'">
                    <div class="flex justify-between items-center gap-[10px] px-[16px] py-[11px] border-b-[1px] border-gray-300">
                        <p class="text-[20px] text-gray-800 font-bold">
                            Server Requirements
                        </p>
                    </div>

                    <div class="flex flex-col gap-[15px] px-[30px] py-[16px] border-b-[1px] border-gray-300 h-[486px] overflow-y-auto">
                        <div class="flex gap-[4px]">
                            <span class="{{ $phpVersion['supported'] ? 'icon-tick text-[20px] text-green-500' : '' }}"></span>

                            <p class="text-[14px] text-gray-600 font-semibold">
                                PHP <span class="font-normal">(8.1 or higher)</span>
=======
                <!-- Start -->
                <div class="w-full max-w-[568px] bg-white rounded-lg shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300" v-if="currentStep == 'start'">
                    <x-installer::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                        ref="start"
                    >
                        <form
                            @submit.prevent="handleSubmit($event, setLocale)"
                            enctype="multipart/form-data"
                            ref="multiLocaleForm"
                        >
                            <div class="flex justify-between items-center gap-2.5 px-4 py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    @lang('installer::app.installer.index.start.welcome-title')
                                </p>
                            </div>

                            <div class="flex flex-col gap-3 items-center h-[384px] px-[30px] py-4 overflow-y-auto">
                                <div class="container overflow-hidden">
                                    <div class="flex flex-col gap-3 justify-end h-[100px]">
                                        <p class="text-gray-600 text-[14px] text-center">
                                            @lang('installer::app.installer.index.installation-description')
                                        </p>
                                    </div>

                                    <div class="flex flex-col gap-3 justify-center h-[284px] px-[30px] py-4 overflow-y-auto">
                                        <!-- Application Name -->
                                        <x-installer::form.control-group class="mb-2.5">
                                            <x-installer::form.control-group.label>
                                                @lang('Installation Wizard language')
                                            </x-installer::form.control-group.label>

                                            <x-installer::form.control-group.control
                                                type="select"
                                                name="locale"
                                                rules="required"
                                                :value="app()->getLocale()"
                                                :label="trans('installer::app.installer.index.start.locale')"
                                                value="{{ app()->getLocale() }}"
                                                @change="$refs.multiLocaleForm.submit();"
                                            >
                                                <option value="" disabled>@lang('installer::app.installer.index.start.select-locale')</option>

                                                @foreach ($locales as $value => $label)
                                                    <option value="{{ $value }}">
                                                        @lang("installer::app.installer.index.$label")
                                                    </option>
                                                @endforeach
                                            </x-installer::form.control-group.control>

                                            <x-installer::form.control-group.error
                                                control-name="locale"
                                            >
                                            </x-installer::form.control-group.error>
                                        </x-installer::form.control-group>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="flex px-4 py-2.5 justify-end items-center">
                                <button
                                    type="button"
                                    class="px-3 py-1.5 bg-blue-600 border border-blue-700 rounded-md text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                    tabindex="0"
                                    @click="nextForm"
                                >
                                    @lang('installer::app.installer.index.continue')
                                </button>
                            </div>
                        </form>
                    </x-installer::form>
                </div>

                <!-- Systme Requirements -->
                <div class="w-full max-w-[568px] bg-white rounded-lg shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300" v-if="currentStep == 'systemRequirements'">
                    <div class="flex justify-between items-center gap-2.5 px-4 py-[11px] border-b-[1px] border-gray-300">
                        <p class="text-[20px] text-gray-800 font-bold">
                            @lang('installer::app.installer.index.server-requirements.title')
                        </p>
                    </div>

                    <div class="flex flex-col gap-[15px] px-[30px] py-4 border-b-[1px] border-gray-300 h-[486px] overflow-y-auto">
                        <div class="flex gap-1">
                            <span class="{{ $phpVersion['supported'] ? 'icon-tick text-[20px] text-green-500' : '' }}"></span>

                            <p class="text-[14px] text-gray-600 font-semibold">
                                @lang('installer::app.installer.index.server-requirements.php') <span class="font-normal">(@lang('installer::app.installer.index.server-requirements.php-version'))</span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            </p>
                        </div>

                        @foreach ($requirements['requirements'] as $requirement)
                            @foreach ($requirement as $key => $item)
<<<<<<< HEAD
                                <div class="flex gap-[4px]">
                                    <span class="{{ $item ? 'icon-tick text-green-500' : 'icon-cross text-red-500' }} text-[20px]"></span>

                                    <p class="text-[14px] text-gray-600 font-semibold">
                                        {{ $key }}
                                    </p>
                                </div>    
=======
                                <div class="flex gap-1">
                                    <span class="{{ $item ? 'icon-tick text-green-500' : 'icon-cross text-red-500' }} text-[20px]"></span>

                                    <p class="text-[14px] text-gray-600 font-semibold">
                                        @lang('installer::app.installer.index.server-requirements.' . $key)
                                    </p>
                                </div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            @endforeach
                        @endforeach
                    </div>

                    @php
                        $hasRequirement = false;

                        foreach ($requirements['requirements']['php'] as $value) {
                            if (!$value) {
                                $hasRequirement = true;
                                break;
                            }
                        }
                    @endphp

<<<<<<< HEAD
                    <div class="flex px-[16px] py-[10px] justify-end items-center">
                        <div 
                            class="{{ $hasRequirement ? 'opacity-50 cursor-not-allowed' : ''}} px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer {{ $hasRequirement ?: 'hover:opacity-90' }}"
                            @click="nextForm"
                        >
                            Continue
=======
                    <div class="flex px-4 py-2.5 justify-between items-center">
                        <div
                            class="text-[12px] text-blue-600 font-semibold cursor-pointer"
                            role="button"
                            aria-label="@lang('installer::app.installer.index.back')"
                            tabindex="0"
                            @click="back"
                        >
                            @lang('installer::app.installer.index.back')
                        </div>

                        <div
                            class="{{ $hasRequirement ? 'opacity-50 cursor-not-allowed' : ''}} px-3 py-1.5 bg-blue-600 border border-blue-700 rounded-md text-gray-50 font-semibold cursor-pointer {{ $hasRequirement ?: 'hover:opacity-90' }}"
                            @click="nextForm"
                            tabindex="0"
                        >
                            @lang('installer::app.installer.index.continue')
                        </div>
                    </div>
                </div>

                <!-- Environment Configuration Database -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-lg shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'envDatabase'"
                >
                    <x-installer::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                        ref="envDatabase"
                    >
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex justify-between items-center gap-2.5 px-4 py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    @lang('installer::app.installer.index.environment-configuration.title')
                                </p>
                            </div>

                            <div class="flex flex-col gap-3 px-[30px] py-4 border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                                <!-- Database Connection-->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.environment-configuration.database-connection')
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="select"
                                        name="db_connection"
                                        ::value="envData.db_connection ?? 'mysql'"
                                        rules="required"
                                        :label="trans('installer::app.installer.index.environment-configuration.database-connection')"
                                        :placeholder="trans('installer::app.installer.index.environment-configuration.database-connection')"
                                    >
                                        <option
                                            value="mysql"
                                            selected
                                        >
                                            @lang('installer::app.installer.index.environment-configuration.mysql')
                                        </option>

                                        <option value="pgsql">@lang('installer::app.installer.index.environment-configuration.pgsql')</option>
                                        <option value="sqlsrv">@lang('installer::app.installer.index.environment-configuration.sqlsrv')</option>
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_connection"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Hostname-->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.environment-configuration.database-hostname')
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_hostname"
                                        ::value="envData.db_hostname ?? '127.0.0.1'"
                                        rules="required"
                                        :label="trans('installer::app.installer.index.environment-configuration.database-hostname')"
                                        :placeholder="trans('installer::app.installer.index.environment-configuration.database-hostname')"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_hostname"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Port-->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.environment-configuration.database-port')
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_port"
                                        ::value="envData.db_port ?? '3306'"
                                        rules="required"
                                        :label="trans('installer::app.installer.index.environment-configuration.database-port')"
                                        :placeholder="trans('installer::app.installer.index.environment-configuration.database-port')"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_port"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database name-->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.environment-configuration.database-name')
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_name"
                                        ::value="envData.db_name"
                                        rules="required"
                                        :label="trans('installer::app.installer.index.environment-configuration.database-name')"
                                        :placeholder="trans('installer::app.installer.index.environment-configuration.database-name')"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_name"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Prefix-->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label>
                                        @lang('installer::app.installer.index.environment-configuration.database-prefix')
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_prefix"
                                        ::value="envData.db_prefix"
                                        :label="trans('installer::app.installer.index.environment-configuration.database-prefix')"
                                        :placeholder="trans('installer::app.installer.index.environment-configuration.database-prefix')"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_prefix"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Username-->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.environment-configuration.database-username')
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_username"
                                        ::value="envData.db_username"
                                        rules="required"
                                        :label="trans('installer::app.installer.index.environment-configuration.database-username')"
                                        :placeholder="trans('installer::app.installer.index.environment-configuration.database-username')"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_username"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Password-->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.environment-configuration.database-password')
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="password"
                                        name="db_password"
                                        ::value="envData.db_password"
                                        rules="required"
                                        :label="trans('installer::app.installer.index.environment-configuration.database-password')"
                                        :placeholder="trans('installer::app.installer.index.environment-configuration.database-password')"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_password"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>
                            </div>

                            <div class="flex px-4 py-2.5 justify-between items-center">
                                <div
                                    class="text-[12px] text-blue-600 font-semibold cursor-pointer"
                                    role="button"
                                    :aria-label="@lang('installer::app.installer.index.back')"
                                    tabindex="0"
                                    @click="back"
                                >
                                    @lang('installer::app.installer.index.back')
                                </div>

                                <button
                                    type="submit"
                                    class="px-3 py-1.5 bg-blue-600 border border-blue-700 rounded-md text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                    tabindex="0"
                                >
                                    @lang('installer::app.installer.index.continue')
                                </button>
                            </div>
                        </form>
                    </x-installer::form>
                </div>

                <!-- Ready For Installation -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-lg shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'readyForInstallation'"
                >
                    <x-installer::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                        ref="envDatabase"
                    >
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex justify-between items-center gap-2.5 px-4 py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    @lang('installer::app.installer.index.ready-for-installation.install')
                                </p>
                            </div>

                            <div class="flex flex-col gap-[15px] justify-center px-[30px] py-4 border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                                <div class="flex flex-col gap-4">
                                    <p class="text-[18px] text-gray-800 font-semibold">
                                        @lang('installer::app.installer.index.ready-for-installation.install-info')
                                    </p>

                                    <div class="grid gap-2.5">
                                        <label class="text-[14px] text-gray-600">
                                            @lang('installer::app.installer.index.ready-for-installation.install-info-button')
                                        </label>

                                        <div class="grid gap-3">
                                            <div class="flex gap-1 text-[14px] text-gray-600">
                                                <span class="icon-right text-[20px]"></span>

                                                <p>@lang('installer::app.installer.index.ready-for-installation.create-databsae-table')</p>
                                            </div>

                                            <div class="flex gap-1 text-[14px] text-gray-600">
                                                <span class="icon-right text-[20px]"></span>

                                                <p>@lang('installer::app.installer.index.ready-for-installation.populate-database-table')</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex px-4 py-2.5 justify-between items-center">
                                <div
                                    class="text-[12px] text-blue-600 font-semibold cursor-pointer"
                                    role="button"
                                    :aria-label="@lang('installer::app.installer.index.back')"
                                    tabindex="0"
                                    @click="back"
                                >
                                    Back
                                </div>

                                <button
                                    type="submit"
                                    class="px-3 py-1.5 bg-blue-600 border border-blue-700 rounded-md text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                >
                                    @lang('installer::app.installer.index.ready-for-installation.start-installation')
                                </button>
                            </div>
                        </form>
                    </x-installer::form>
                </div>

                <!-- Installation Processing -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-lg shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'installProgress'"
                >
                    <div class="flex justify-between items-center gap-2.5 px-4 py-[11px] border-b-[1px] border-gray-300">
                        <p class="text-[20px] text-gray-800 font-bold">
                            @lang('installer::app.installer.index.installation-processing.title')
                        </p>
                    </div>

                    <div class="flex flex-col gap-[15px] justify-center px-[30px] py-4 h-[484px] overflow-y-auto">
                        <div class="flex flex-col gap-4">
                            <p class="text-[18px] text-gray-800 font-bold">
                                @lang('installer::app.installer.index.installation-processing.bagisto')
                            </p>

                            <div class="grid gap-2.5">
                                <!-- Spinner -->
                                <img
                                    class="animate-spin h-5 w-5 text-navyBlue"
                                    src="{{ bagisto_asset('images/installer/spinner.svg', 'installer') }}"
                                    alt="Loading"
                                />

                                <p class="text-[14px] text-gray-600">
                                    @lang('installer::app.installer.index.installation-processing.bagisto-info')
                                </p>
                            </div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </div>
                    </div>
                </div>

                <!-- Environment Configuration .ENV -->
                <div
<<<<<<< HEAD
                    class="w-full max-w-[568px] bg-white rounded-[8px] shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'envSetup'"
=======
                    class="w-full max-w-[568px] bg-white rounded-lg shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'envConfiguration'"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                >
                    <x-installer::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                        ref="envSetup"
                    >
                        <form
                            @submit.prevent="handleSubmit($event, nextForm)"
                            enctype="multipart/form-data"
                        >
<<<<<<< HEAD
                            <div class="flex justify-between items-center gap-[10px] px-[16px] py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    Environment Configuration
                                </p>
                            </div>

                            <div class="flex flex-col gap-[12px] px-[30px] py-[16px] border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                                <!-- Application Name -->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Application Name
=======
                            <div class="flex justify-between items-center gap-2.5 px-4 py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    @lang('installer::app.installer.index.environment-configuration.title')
                                </p>
                            </div>

                            <div class="flex flex-col gap-3 px-[30px] py-4 border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                                <!-- Application Name -->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.environment-configuration.application-name')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="app_name"
                                        ::value="envData.app_name ?? 'Bagisto'"
                                        rules="required"
<<<<<<< HEAD
                                        label="Application Name"
                                        placeholder="Bagisto"
=======
                                        :label="trans('installer::app.installer.index.environment-configuration.application-name')"
                                        :placeholder="trans('installer::app.installer.index.environment-configuration.bagisto')"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="app_name"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Application Default URL -->
<<<<<<< HEAD
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Default URL
=======
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.environment-configuration.default-url')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="app_url"
                                        ::value="envData.app_url ?? 'https://localhost'"
                                        rules="required"
<<<<<<< HEAD
                                        label="Default URL"
                                        placeholder="https://localhost"
=======
                                        :label="trans('installer::app.installer.index.environment-configuration.default-url')"
                                        :placeholder="trans('installer::app.installer.index.environment-configuration.default-url-link')"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="app_url"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

<<<<<<< HEAD
                                <!-- Application Default Currency -->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Default Currency
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="select"
                                        name="app_currency"
                                        ::value="envData.app_currency ?? 'USD'"
                                        rules="required"
                                        label="Default Currency"
                                    >
                                        <option value="USD" selected>US Dollar</option>
                                        <option value="EUR">Euro</option>
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="app_currency"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Application Default Timezone -->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Default Timezone
                                    </x-installer::form.control-group.label>
                                    
=======
                                <!-- Application Default Timezone -->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.environment-configuration.default-timezone')
                                    </x-installer::form.control-group.label>

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    @php
                                        date_default_timezone_set('UTC');

                                        $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);

                                        $current = date_default_timezone_get();
                                    @endphp

                                    <x-installer::form.control-group.control
                                        type="select"
                                        name="app_timezone"
                                        ::value="envData.app_timezone ?? $current"
                                        rules="required"
<<<<<<< HEAD
                                        label="Default Timezone"
                                        >
=======
                                        :aria-label="trans('installer::app.installer.index.environment-configuration.default-timezone')"
                                        :label="trans('installer::app.installer.index.environment-configuration.default-timezone')"
                                    >
                                        <option value="" disabled>Select Timezone</option>

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                        @foreach($tzlist as $key => $value)
                                            <option
                                                value="{{ $value }}"
                                                {{ $value === $current ? 'selected' : '' }}
                                            >
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="app_timezone"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

<<<<<<< HEAD
                                <!-- Application Default Locale -->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Default Locale
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="select"
                                        name="app_locale"
                                        ::value="envData.app_locale ?? 'en'"
                                        rules="required"
                                        label="Default Locale"
                                    >
                                        <option value="en" selected>English</option>
                                        <option value="fr">French</option>
                                        <option value="nl">Dutch</option>
                                        <option value="es">Türkçe</option>
                                        <option value="es">Espanol</option>
                                        <option value="fr">German</option>
                                        <option value="en">Italian</option>
                                        <option value="ar">Russian</option>
                                        <option value="nl">Ukrainian</option>
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="app_locale"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>
                            </div>
                            
                            <div class="flex px-[16px] py-[10px] justify-between items-center">
                                <div
                                    class="text-[12px] text-blue-600 font-semibold cursor-pointer"
                                    @click="back"
                                >
                                    Back
                                </div>

                                <button 
                                    type="submit"
                                    class="px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                >
                                    Continue
                                </button>
                            </div>
                            
                        </form>
                    </x-installer::form>
                </div>

                <!-- Environment Configuration Database -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-[8px] shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'envDatabase'"
                >
                    <x-installer::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                        ref="envDatabase"
                    >
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex justify-between items-center gap-[10px] px-[16px] py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    Environment Configuration
                                </p>
                            </div>
    
                            <div class="flex flex-col gap-[12px] px-[30px] py-[16px] border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                                <!-- Database Connection-->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Database Connection
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="select"
                                        name="db_connection"
                                        ::value="envData.db_connection ?? 'mysql'"
                                        rules="required"
                                        label="Database Connection"
                                        placeholder="Database Connection"
                                    >
                                        <option
                                            value="mysql"
                                            selected
                                        >
                                            Mysql
                                        </option>

                                        <option value="sqlite">SQlite</option>

                                        <option value="pgsql">pgSQL</option>

                                        <option value="sqlsrv">SQLSRV</option>
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_connection"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Hostname-->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Database Hostname
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_hostname"
                                        ::value="envData.db_hostname ?? '127.0.0.1'"
                                        rules="required"
                                        label="Database Hostname"
                                        placeholder="Database Hostname"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_hostname"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Port-->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Database Port
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_port"
                                        ::value="envData.db_port ?? '3306'"
                                        rules="required"
                                        label="Database Port"
                                        placeholder="Database Port"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_port"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database name-->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Database Name
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_name"
                                        ::value="envData.db_name"
                                        rules="required"
                                        label="Database Name"
                                        placeholder="Database Name"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_name"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Prefix-->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label>
                                        Database Prefix
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_prefix"
                                        ::value="envData.db_prefix"
                                        label="Database Prefix"
                                        placeholder="Database Prefix"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_prefix"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Username-->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Database Username
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="db_username"
                                        ::value="envData.db_username"
                                        rules="required"
                                        label="Database Username"
                                        placeholder="Database Username"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_username"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Database Password-->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Database Password
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="password"
                                        name="db_password"
                                        ::value="envData.db_password"
                                        rules="required"
                                        label="Database Password"
                                        placeholder="Database Password"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="db_password"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>
                            </div>

                            <div class="flex px-[16px] py-[10px] justify-between items-center">
                                <div
                                    class="text-[12px] text-blue-600 font-semibold cursor-pointer"
                                    @click="back"
                                >
                                    Back
                                </div>
    
                                <button
                                    type="submit"
                                    class="px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                >
                                    Continue
                                </button>
                            </div>
                        </form>
                    </x-installer::form>      
                </div>

                <!-- Ready For Installation -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-[8px] shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'readyForInstallation'"
                >
                    <x-installer::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                        ref="envDatabase"
                    >
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex justify-between items-center gap-[10px] px-[16px] py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    Installation
                                </p>
                            </div>

                            <div class="flex flex-col gap-[15px] justify-center px-[30px] py-[16px] border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                                <div class="flex flex-col gap-[16px]">
                                    <p class="text-[18px] text-gray-800 font-semibold">
                                        Bagisto for Installation
                                    </p>

                                    <div class="grid gap-[10px]">
                                        <label class="text-[14px] text-gray-600">
                                            Click the button below to
                                        </label>

                                        <div class="grid gap-[12px]">
                                            <div class="flex gap-[4px] text-[14px] text-gray-600">
                                                <span class="icon-processing text-[20px]"></span>

                                                <p>Create the database table</p>
                                            </div>

                                            <div class="flex gap-[4px] text-[14px] text-gray-600">
                                                <span class="icon-processing text-[20px]"></span>

                                                <p>Populate the database tables</p>
                                            </div>

                                            <div class="flex gap-[4px] text-[14px] text-gray-600">
                                                <span class="icon-processing text-[20px]"></span>

                                                <p>Publishing the vendor files</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex px-[16px] py-[10px] justify-between items-center">
                                <div
                                    class="text-[12px] text-blue-600 font-semibold cursor-pointer"
                                    @click="back"
                                >
                                    Back
                                </div>

                                <button
                                    type="submit"
                                    class="px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                >
                                    Start Installation
                                </button>
                            </div>
=======
                                <div class="p-1.5" :style="warning['container'], warning['message']">
                                    <i class="icon-limited !text-black"></i>

                                    @lang('installer::app.installer.index.environment-configuration.warning-message')
                                </div>

                                <div class="flex gap-2.5">
                                    <!-- Application Default Locale -->
                                    <x-installer::form.control-group class="w-full">
                                        <x-installer::form.control-group.label class="required">
                                            @lang('installer::app.installer.index.environment-configuration.default-locale')
                                        </x-installer::form.control-group.label>
    
                                        <x-installer::form.control-group.control
                                            type="select"
                                            name="app_locale"
                                            value="{{ app()->getLocale() }}"
                                            rules="required"
                                            :aria-label="trans('installer::app.installer.index.environment-configuration.default-locale')"
                                            :label="trans('installer::app.installer.index.environment-configuration.default-locale')"
                                        >
                                            @foreach ($locales as $value => $label)
                                                <option value="{{ $value }}">
                                                    @lang("installer::app.installer.index.$label")
                                                </option>
                                            @endforeach
                                        </x-installer::form.control-group.control>
    
                                        <x-installer::form.control-group.error
                                            control-name="app_locale"
                                        >
                                        </x-installer::form.control-group.error>
                                    </x-installer::form.control-group>

                                    <!-- Application Default Currency -->
                                    <x-installer::form.control-group class="w-full">
                                        <x-installer::form.control-group.label class="required">
                                            @lang('installer::app.installer.index.environment-configuration.default-currency')
                                        </x-installer::form.control-group.label>

                                        <x-installer::form.control-group.control
                                            type="select"
                                            name="app_currency"
                                            ::value="envData.app_currency ?? 'USD'"
                                            :aria-label="trans('installer::app.installer.index.environment-configuration.default-currency')"
                                            rules="required"
                                            :label="trans('installer::app.installer.index.environment-configuration.default-currency')"
                                        >
                                            <option value="" disabled>Select Currencies</option>
    
                                            @foreach ($currencies as $value => $label)
                                                <option value="{{ $value }}" @if($value == 'USD') selected @endif>
                                                    @lang("installer::app.installer.index.environment-configuration.$label")
                                                </option>
                                            @endforeach
                                        </x-installer::form.control-group.control>
    
                                        <x-installer::form.control-group.error
                                            control-name="app_currency"
                                        >
                                        </x-installer::form.control-group.error>
                                    </x-installer::form.control-group>
                                </div>

                                <div class="flex gap-2.5">
                                    <x-installer::form.control-group class="w-full">
                                        <x-installer::form.control-group.label class="required">
                                            @lang('installer::app.installer.index.environment-configuration.allowed-locales')
                                        </x-installer::form.control-group.label>

                                        <!-- Allowed Locales -->
                                        @foreach ($locales as $key => $locale)
                                            <x-installer::form.control-group class="flex gap-2.5 w-max !mb-0 p-1.5 cursor-pointer select-none">
                                                @php
                                                    $selectedOption = ($key == config('app.locale')) ? 1: 0;
                                                @endphp

                                                <x-installer::form.control-group.control
                                                    type="hidden"
                                                    name="{{ $key }}"
                                                    :value="$selectedOption"
                                                >
                                                </x-installer::form.control-group.control>

                                                <x-installer::form.control-group.control
                                                    type="checkbox"
                                                    name="{{ $key }}"
                                                    id="allowed_locale[{{ $key }}]"
                                                    for="allowed_locale[{{ $key }}]"
                                                    value="1"
                                                    :checked="(boolean) $selectedOption"
                                                    :disabled="(boolean) $selectedOption"
                                                    @change="pushAllowedLocales"
                                                >
                                                </x-installer::form.control-group.control>

                                                <x-installer::form.control-group.label
                                                    for="allowed_locale[{{ $key }}]"
                                                    class="!text-[14px] !font-semibold cursor-pointer"
                                                >
                                                    @lang("installer::app.installer.index.$locale")
                                                </x-installer::form.control-group.label>
                                            </x-installer::form.control-group>
                                        @endforeach
                                    </x-installer::form.control-group>

                                    <x-installer::form.control-group class="w-full">
                                        <x-installer::form.control-group.label class="required">
                                            @lang('installer::app.installer.index.environment-configuration.allowed-currencies')
                                        </x-installer::form.control-group.label>
    
                                        <!-- Allowed Currencies -->
                                        @foreach ($currencies as $key => $currency)
                                            <x-installer::form.control-group class="flex gap-2.5 w-max !mb-0 p-1.5 cursor-pointer select-none">
                                                @php
                                                    $selectedOption = ($key == config('app.currency')) ? 1 : 0;
                                                @endphp

                                                <x-installer::form.control-group.control
                                                    type="hidden"
                                                    name="{{ $key }}"
                                                    :value="$selectedOption"
                                                >
                                                </x-installer::form.control-group.control>

                                                <x-installer::form.control-group.control
                                                    type="checkbox"
                                                    name="{{ $key }}"
                                                    id="currency[{{ $key }}]"
                                                    for="currency[{{ $key }}]"
                                                    value="1"
                                                    :checked="(boolean) $selectedOption"
                                                    :disabled="(boolean) $selectedOption"
                                                    @change="pushAllowedCurrency"
                                                >
                                                </x-installer::form.control-group.control>

                                                <x-installer::form.control-group.label
                                                    for="currency[{{ $key }}]"
                                                    class="!text-[14px] !font-semibold cursor-pointer"
                                                >
                                                    @lang("installer::app.installer.index.environment-configuration.$currency")
                                                </x-installer::form.control-group.label>
                                            </x-installer::form.control-group>
                                        @endforeach
                                    </x-installer::form.control-group>
                                </div>
                            </div>

                            <div class="flex px-4 py-2.5 justify-end items-center">
                                <button
                                    type="submit"
                                    class="px-3 py-1.5 bg-blue-600 border border-blue-700 rounded-md text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                    tabindex="0"
                                >
                                    @lang('installer::app.installer.index.continue')
                                </button>
                            </div>

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </form>
                    </x-installer::form>
                </div>

<<<<<<< HEAD
                <!-- Installation Processing -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-[8px] shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'installProgress'"
                >
                    <div class="flex justify-between items-center gap-[10px] px-[16px] py-[11px] border-b-[1px] border-gray-300">
                        <p class="text-[20px] text-gray-800 font-bold">
                            Installation
                        </p>
                    </div>

                    <div class="flex flex-col gap-[15px] justify-center px-[30px] py-[16px] h-[484px] overflow-y-auto">
                        <div class="flex flex-col gap-[16px]">
                            <p class="text-[18px] text-gray-800 font-bold">
                                Installing Bagisto
                            </p>
                            
                            <div class="grid gap-[10px]">
                                <svg class="animate-spin h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    >
                                    </circle>
        
                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                    >
                                    </path>
                                </svg>

                                <p class="text-[14px] text-gray-600">
                                    Creating the database tables, this can take a few moments
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- installation Log -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-[8px] shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'installationLog'"
                >
                    <div
                        class="flex flex-col gap-[15px] px-[30px] py-[16px] border-b-[1px] border-gray-300 h-[486px] overflow-y-auto" v-if="seederLog"
                    >
                        <p
                            class="h-full"
                            v-html="seederLog"
                        >
                        </p>
                    </div>

                    <div class="flex px-[16px] py-[10px] justify-end items-center">
                        <button 
                            type="submit"
                            class="px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                            @click="nextForm"
                        >
                            Continue
                        </button>
                    </div>
                </div>

                <!-- Create Administrator -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-[8px] shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
=======
                <!-- Create Administrator -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-lg shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    v-if="currentStep == 'createAdmin'"
                >
                    <x-installer::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                        ref="createAdmin"
                    >
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
<<<<<<< HEAD
                            <div class="flex justify-between items-center gap-[10px] px-[16px] py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    Create Administrator
                                </p>
                            </div>

                            <div class="flex flex-col gap-[12px] px-[30px] py-[16px] border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                                <!-- Admin -->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Admin
=======
                            <div class="flex justify-between items-center gap-2.5 px-4 py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    @lang('installer::app.installer.index.create-administrator.title')
                                </p>
                            </div>

                            <div class="flex flex-col gap-3 px-[30px] py-4 border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                                <!-- Admin -->
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.create-administrator.admin')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="admin"
                                        value="Admin"
                                        rules="required"
<<<<<<< HEAD
                                        label="Admin"
                                        placeholder="Bagisto"
=======
                                        :label="trans('installer::app.installer.index.create-administrator.admin')"
                                        :placeholder="trans('installer::app.installer.index.create-administrator.bagisto')"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="admin"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Email -->
<<<<<<< HEAD
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Email
=======
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.create-administrator.email')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="email"
                                        value="admin@example.com"
                                        rules="required"
<<<<<<< HEAD
                                        label="Email"
                                        placeholder="admin@example.com'"
=======
                                        :label="trans('installer::app.installer.index.create-administrator.email')"
                                        :placeholder="trans('installer::app.installer.index.create-administrator.email-address')"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="email"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Password -->
<<<<<<< HEAD
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Password
=======
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.create-administrator.password')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="password"
                                        name="password"
                                        :value="old('password')"
                                        rules="required"
<<<<<<< HEAD
                                        label="Password"
=======
                                        :label="trans('installer::app.installer.index.create-administrator.password')"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="password"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Confirm Password -->
<<<<<<< HEAD
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Confirm Password
=======
                                <x-installer::form.control-group class="mb-2.5">
                                    <x-installer::form.control-group.label class="required">
                                        @lang('installer::app.installer.index.create-administrator.confirm-password')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="password"
                                        name="confirm_password"
                                        :value="old('confirm_password')"
                                        rules="required|confirmed:@password"
<<<<<<< HEAD
                                        label="Confirm Password"
=======
                                        :label="trans('installer::app.installer.index.create-administrator.confirm-password')"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="confirm_password"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>
                            </div>
<<<<<<< HEAD
                            
                            <div class="flex px-[16px] py-[10px] justify-end items-center">
                                <button 
                                    type="submit"
                                    class="px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                >
                                    Continue
                                </button>
                            </div>
                            
                        </form>
                    </x-installer::form>
                </div>

                <!-- Email Configuration Form -->
                <div
                    class="w-full max-w-[568px] bg-white rounded-[8px] shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'emailConfiguration'"
                >
                    <x-installer::form
                        v-slot="{ meta, errors, handleSubmit }"
                        as="div"
                        ref="emailConfiguration"
                    >
                        <form
                            @submit.prevent="handleSubmit($event, FormSubmit)"
                            enctype="multipart/form-data"
                        >
                            <div class="flex justify-between items-center gap-[10px] px-[16px] py-[11px] border-b-[1px] border-gray-300">
                                <p class="text-[20px] text-gray-800 font-bold">
                                    Email Configuration
                                </p>
                            </div>

                            <div class="flex flex-col gap-[12px] px-[30px] py-[16px] border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                                <!-- Admin -->
                                <div class="flex gap-[6px]">
                                    <x-installer::form.control-group class="w-full mb-[10px]">
                                        <x-installer::form.control-group.label class="required">
                                            Outgoing mail server
                                        </x-installer::form.control-group.label>

                                        <x-installer::form.control-group.control
                                            type="text"
                                            name="mail_host"
                                            value="smpt.mailtrap.io"
                                            rules="required"
                                            label="Outgoing mail server"
                                            placeholder="smpt.mailtrap.io"
                                        >
                                        </x-installer::form.control-group.control>

                                        <x-installer::form.control-group.error
                                            control-name="mail_host"
                                        >
                                        </x-installer::form.control-group.error>
                                    </x-installer::form.control-group>

                                    <!-- Email -->
                                    <x-installer::form.control-group class="w-full mb-[10px]">
                                        <x-installer::form.control-group.label class="required">
                                            Server port
                                        </x-installer::form.control-group.label>

                                        <x-installer::form.control-group.control
                                            type="number"
                                            name="mail_port"
                                            value="3306"
                                            rules="required"
                                            label="Server port"
                                            placeholder="3306"
                                        >
                                        </x-installer::form.control-group.control>

                                        <x-installer::form.control-group.error
                                            control-name="mail_port"
                                        >
                                        </x-installer::form.control-group.error>
                                    </x-installer::form.control-group>
                                </div>

                                <!-- Password -->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Encryption
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="select"
                                        name="mail_encryption"
                                        value="tls"
                                        rules="required"
                                        label="Encryption"
                                    >
                                        <option value="tls" selected>TLS</option>
                                        <option value="ssl">SSL</option>
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="mail_encryption"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Store Email Address -->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Store Email Address
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="mail_from_address"
                                        :value="old('mail_from_address')"
                                        rules="required"
                                        label="Store Email Address"
                                        placeholder="store@example.com"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="mail_from_address"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Username -->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Username
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="text"
                                        name="mail_username"
                                        :value="old('mail_username')"
                                        rules="required"
                                        label="Username"
                                        placeholder="store@example.com"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="mail_username"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>

                                <!-- Password -->
                                <x-installer::form.control-group class="mb-[10px]">
                                    <x-installer::form.control-group.label class="required">
                                        Password
                                    </x-installer::form.control-group.label>

                                    <x-installer::form.control-group.control
                                        type="password"
                                        name="mail_password"
                                        :value="old('mail_password')"
                                        rules="required"
                                        label="Password"
                                        placeholder="store@example.com"
                                    >
                                    </x-installer::form.control-group.control>

                                    <x-installer::form.control-group.error
                                        control-name="mail_password"
                                    >
                                    </x-installer::form.control-group.error>
                                </x-installer::form.control-group>
                            </div>
                            
                            <div class="flex px-[16px] py-[10px] justify-end items-center">
                                <button 
                                    type="submit"
                                    class="px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                >
                                    Save configuration
                                </button>
                            </div>
                            
=======

                            <div class="flex px-4 py-2.5 justify-end items-center">
                                <button
                                    type="submit"
                                    class="px-3 py-1.5 bg-blue-600 border border-blue-700 rounded-md text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                    tabindex="0"
                                >
                                    @lang('installer::app.installer.index.continue')
                                </button>
                            </div>

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </form>
                    </x-installer::form>
                </div>

                <!-- Installation Completed -->
                <div
<<<<<<< HEAD
                    class="w-full max-w-[568px] bg-white rounded-[8px] shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'installationCompleted'"
                >
                    <div class="flex justify-between items-center gap-[10px] px-[16px] py-[11px] border-b-[1px] border-gray-300">
                        <p class="text-[20px] text-gray-800 font-bold">
                            Installation
                        </p>
                    </div>

                    <div class="flex flex-col gap-[15px] justify-center px-[30px] py-[16px] border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                        <div class="flex flex-col gap-[16px]">
=======
                    class="w-full max-w-[568px] bg-white rounded-lg shadow-[0px_8px_10px_0px_rgba(0,0,0,0.05)] border-[1px] border-gray-300"
                    v-if="currentStep == 'installationCompleted'"
                >
                    <div class="flex justify-between items-center gap-2.5 px-4 py-[11px] border-b-[1px] border-gray-300">
                        <p class="text-[20px] text-gray-800 font-bold">
                            @lang('installer::app.installer.index.installation-completed.title')
                        </p>
                    </div>

                    <div class="flex flex-col gap-[15px] justify-center px-[30px] py-4 border-b-[1px] border-gray-300 h-[484px] overflow-y-auto">
                        <div class="flex flex-col gap-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <div class="flex items-center justify-center rounded-full border border-green-500 w-[30px] h-[30px]">
                                <span class="icon-tick text-[20px] text-green-500 font-semibold"></span>
                            </div>

<<<<<<< HEAD
                            <div class="grid gap-[10px]">
                                <p class="text-[18px] text-gray-800 font-semibold">
                                    Installing Completed
                                </p>

                                <p class="text-[14px] text-gray-600">
                                    Bagisto is successfully installed on your system.
                                </p>

                                <div class="flex justify-between items-center max-w-[288px]">
                                    <a
                                        href="{{ URL('/admin/login')}}"
                                        class="px-[12px] py-[6px] bg-white border border-blue-700 rounded-[6px] text-blue-600 font-semibold cursor-pointer hover:opacity-90"
                                    >
                                        Admin Panel
=======
                            <div class="grid gap-2.5">
                                <p class="text-[18px] text-gray-800 font-semibold">
                                    @lang('installer::app.installer.index.installation-completed.title')
                                </p>

                                <p class="text-[14px] text-gray-600">
                                    @lang('installer::app.installer.index.installation-completed.title-info')
                                </p>

                                <div class="flex gap-4 items-center">
                                    <a
                                        href="{{ URL('/admin/login')}}"
                                        class="px-3 py-1.5 bg-white border border-blue-700 rounded-md text-blue-600 font-semibold cursor-pointer hover:opacity-90"
                                    >
                                        @lang('installer::app.installer.index.installation-completed.admin-panel')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </a>

                                    <a
                                        href="{{ URL('/')}}"
<<<<<<< HEAD
                                        class="px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                    >
                                        Customer Panel
=======
                                        class="px-3 py-1.5 bg-blue-600 border border-blue-700 rounded-md text-gray-50 font-semibold cursor-pointer hover:opacity-90"
                                    >
                                        @lang('installer::app.installer.index.installation-completed.customer-panel')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

<<<<<<< HEAD
                    <div class="flex px-[16px] py-[10px] justify-between items-center">
=======
                    <div class="flex px-4 py-2.5 justify-between items-center">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <a
                            href="https://forums.bagisto.com"
                            class="text-[12px] text-blue-600 font-semibold cursor-pointer"
                        >
<<<<<<< HEAD
                            Bagisto Forums
=======
                            @lang('installer::app.installer.index.installation-completed.bagisto-forums')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </a>

                        <a
                            href="https://bagisto.com/en/extensions"
<<<<<<< HEAD
                            class="px-[12px] py-[6px] bg-white border border-blue-700 rounded-[6px] text-blue-600 font-semibold cursor-pointer hover:opacity-90"
                        >
                            Explore Bagisto Extentions
=======
                            class="px-3 py-1.5 bg-white border border-blue-700 rounded-md text-blue-600 font-semibold cursor-pointer hover:opacity-90"
                        >
                            @lang('installer::app.installer.index.installation-completed.explore-bagisto-extensions')
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        </a>
                    </div>
                </div>
            </script>

            <script type="module">
                app.component('v-server-requirements', {
                    template: '#v-server-requirements-template',
<<<<<<< HEAD
            
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    data() {
                        return {
                            step: '',

<<<<<<< HEAD
                            currentStep: 'environment',

                            envData: {},

                            stepStates: {
                                environment: 'active',
                                envSetup: 'pending',
                                readyForInstallation: 'pending',
                                createAdmin: 'pending',
                                emailConfiguration: 'pending',
                                installationCompleted: 'pending',
                            },
                            
                            steps: [
                                'environment',
                                'envSetup',
                                'envDatabase',
                                'readyForInstallation',
                                'installProgress',
                                'installationLog',
                                'createAdmin',
                                'emailConfiguration',
                                'installationCompleted',
                            ],

                            seederLog: {},
                        }
                    },

=======
                            currentStep: 'start',

                            envData: {},

                            locales: {
                                allowed: [],
                            },

                            currencies: {
                                allowed: [],
                            },

                            stepStates: {
                                start: 'active',
                                systemRequirements: 'pending',
                                envDatabase: 'pending',
                                readyForInstallation: 'pending',
                                envConfiguration: 'pending',
                                createAdmin: 'pending',
                                installationCompleted: 'pending',
                            },

                            steps: [
                                'start',
                                'systemRequirements',
                                'envDatabase',
                                'readyForInstallation',
                                'installProgress',
                                'envConfiguration',
                                'createAdmin',
                                'installationCompleted',
                            ],

                            warning: {
                                container: 'background: #fde68a',

                                message: 'color: #1F2937',
                            },
                        }
                    },

                    mounted() {
                        const preventUnload = (event) => {
                            event.preventDefault();
                        };

                        window.addEventListener('beforeunload', preventUnload);
                    },

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    methods: {
                        FormSubmit(params, { setErrors }) {
                            const stepActions = {
                                envDatabase: () => {
                                    if (params.db_connection === 'mysql') {
<<<<<<< HEAD
                                        this.completeStep('envSetup', 'readyForInstallation', 'active', 'complete', setErrors);
=======
                                        this.completeStep('envDatabase', 'readyForInstallation', 'active', 'complete', setErrors);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

                                        this.envData = { ...this.envData, ...params };
                                    } else {
                                        setErrors({ 'db_connection': ["Bagisto currently supports MySQL only."] });
                                    }
                                },

                                readyForInstallation: (setErrors) => {
                                    this.currentStep = 'installProgress';

<<<<<<< HEAD
                                    this.startInstallation(setErrors);
                                },

                                createAdmin: (setErrors) => {
                                    this.completeStep('createAdmin', 'emailConfiguration', 'active', 'complete', setErrors);

                                    this.saveAdmin(params, setErrors);
                                },

                                emailConfiguration: (setErrors) => {
                                    this.completeStep('emailConfiguration', 'installationCompleted', 'active', 'complete', setErrors);


                                    this.saveSmtp(params, setErrors);
                                },
=======
                                    this.startMigration(setErrors);
                                },

                                createAdmin: (setErrors) => {
                                    this.completeStep('createAdmin', 'installationCompleted', 'active', 'complete', setErrors);

                                    this.saveAdmin(params, setErrors);
                                },
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            };

                            const index = this.steps.find(step => step === this.currentStep);

                            if (stepActions[index]) {
                                stepActions[index]();
                            }
                        },

                        nextForm(params) {
                            const stepActions = {
<<<<<<< HEAD
                                environment: () => {
                                    this.completeStep('environment', 'envSetup', 'active', 'complete');
                                },

                                envSetup: () => {
                                    this.envData = { ...params };

                                    this.currentStep = 'envDatabase';
                                },

                                installationLog: () => {
                                    this.completeStep('readyForInstallation', 'createAdmin', 'active', 'complete');
                                },
=======
                                start: () => {
                                    this.completeStep('start', 'systemRequirements', 'active', 'complete');
                                },

                                systemRequirements: () => {
                                    this.completeStep('systemRequirements', 'envDatabase', 'active', 'complete');
                                    
                                    this.currentStep = 'envDatabase';
                                },

                                envConfiguration: () => {
                                    this.envData = { ...params };

                                    let data = {
                                        allowed_locales: this.locales.allowed,
                                        allowed_currencies: this.currencies.allowed,
                                    };

                                    this.startSeeding(data, this.envData);
                                },

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            };

                            const index = this.steps.find(step => step === this.currentStep);

                            if (stepActions[index]) {
                                stepActions[index]();
                            }
                        },

<<<<<<< HEAD
=======
                        pushAllowedCurrency() {
                            const currencyName = event.target.name;

                            const index = this.currencies.allowed.indexOf(currencyName);

                            if (index === -1) {
                                this.currencies.allowed.push(currencyName);
                            } else {
                                this.currencies.allowed.splice(index, 1);
                            }
                        },

                        pushAllowedLocales() {
                            const localeName = event.target.name;

                            if (! Array.isArray(this.locales.allowed)) {
                            this.locales.allowed = [];
                            }

                            const index = this.locales.allowed.indexOf(localeName);

                            if (index === -1) {
                                this.locales.allowed.push(localeName);
                            } else {
                                this.locales.allowed.splice(index, 1);
                            }
                        },

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        completeStep(fromStep, toStep, toState, nextState, setErrors) {
                            this.stepStates[fromStep] = nextState;

                            this.currentStep = toStep;

                            this.stepStates[toStep] = toState;
                        },

<<<<<<< HEAD
                        startInstallation(setErrors) {
                            this.$axios.post("{{ route('installer.env_file_setup') }}", this.envData)
                                .then((response) => {
                                    this.runMigartion(setErrors);
                                })
                                .catch(error => {
                                    setErrors(error.response.data.errors);
                                });
=======
                        startMigration(setErrors) {
                            this.currentStep = 'installProgress';

                            this.$axios.post("{{ route('installer.env_file_setup') }}", this.envData)
                                .then((response) => {
                                    this.runMigartion(setErrors);
                            })
                            .catch(error => {
                                setErrors(error.response.data.errors);
                            });
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        },

                        runMigartion(setErrors) {
                            this.$axios.post("{{ route('installer.run_migration') }}")
                                .then((response) => {
<<<<<<< HEAD
                                    this.seederLog = response.data;

                                    this.currentStep = 'installationLog';
                                })
                                .catch(error => {
                                    this.currentStep = 'envDatabase';

                                    this.$axios.post("{{ route('installer.delete_env_file') }}")
                                        .then((response) => {
                                            alert(error.response.data.error ?? error.response.data);
                                        })
                                        .catch((deleteError) => {
                                            alert('Error deleting .env file:', deleteError);
                                        });

=======
                                    this.completeStep('readyForInstallation', 'envConfiguration', 'active', 'complete');

                                    this.currentStep = 'envConfiguration';
                                })
                                .catch(error => {
                                    alert(error.response.data.error);

                                    this.currentStep = 'envDatabase';
                                });
                        },

                        startSeeding(selectedParams, allParameters) {
                            this.$axios.post("{{ route('installer.run_seeder') }}", {
                                'allParameters': allParameters,
                                'selectedParameters': selectedParams
                            })
                                .then((response) => {
                                    this.completeStep('envConfiguration', 'createAdmin', 'active', 'complete');

                                    this.currentStep = 'createAdmin';
                            })
                                .catch(error => {
                                    setErrors(error.response.data.errors);
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                });
                        },

                        saveAdmin(params, setErrors) {
                            this.$axios.post("{{ route('installer.admin_config_setup') }}", params)
                                .then((response) => {
<<<<<<< HEAD
                                    this.currentStep = 'emailConfiguration';
=======
                                    this.currentStep = 'installationCompleted';
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                                })
                                .catch(error => {
                                    setErrors(error.response.data.errors);
                                });
                        },

<<<<<<< HEAD
                        saveSmtp(params, setErrors) {
                            this.$axios.post("{{ route('installer.smtp_config_setup') }}", params)
                                .then((response) => {
                                })
                                .catch(error => {
                                    setErrors(error.response.data.errors);
                                });
=======
                        setLocale(params) {
                            const newLocale = params.locale;
                            const url = new URL(window.location.href);

                            if (! url.searchParams.has('locale')) {
                                url.searchParams.set('locale', newLocale);
                                window.location.href = url.toString();
                            }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        },

                        back() {
                            if (this.$refs[this.currentStep] && this.$refs[this.currentStep].setValues) {
                                this.$refs[this.currentStep].setValues(this.envData);
                            }

                            let index = this.steps.indexOf(this.currentStep);

<<<<<<< HEAD
                            if (index >0) {
                                this.currentStep = this.steps[index -1];
                            }
                        },
=======
                            if (index > 0) {
                                this.currentStep = this.steps[index - 1];
                            }
                        }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    },
                });
            </script>
        @endPushOnce

        @stack('scripts')
    </body>
</html>
