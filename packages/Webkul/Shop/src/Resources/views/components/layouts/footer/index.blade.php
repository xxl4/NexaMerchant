{!! view_render_event('bagisto.shop.layout.footer.before') !!}

<<<<<<< HEAD
{{--
    The category repository is injected directly here because there is no way
    to retrieve it from the view composer, as this is an anonymous component.
--}}
@inject('themeCustomizationRepository', 'Webkul\Shop\Repositories\ThemeCustomizationRepository')

{{--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
--}}
=======
<!--
    The category repository is injected directly here because there is no way
    to retrieve it from the view composer, as this is an anonymous component.
-->
@inject('themeCustomizationRepository', 'Webkul\Theme\Repositories\ThemeCustomizationRepository')

<!--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
-->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@php
    $customization = $themeCustomizationRepository->findOneWhere([
        'type'       => 'footer_links',
        'status'     => 1,
        'channel_id' => core()->getCurrentChannel()->id,
    ]); 
@endphp

<<<<<<< HEAD
<footer class="mt-[36px] bg-lightOrange  max-sm:mt-[30px]">
    @if ($customization)
        <div class="flex gap-x-[25px] gap-y-[30px] justify-between p-[60px] max-1060:flex-wrap max-1060:flex-col-reverse max-sm:px-[15px]">
            <div class="flex gap-[85px] items-start flex-wrap max-1180:gap-[25px] max-1060:justify-between">
                @if ($customization->options)
                    @foreach ($customization->options as $footerLinkSection)
                        <ul class="grid gap-[20px] text-[14px]">
                            @php
                                usort($footerLinkSection, function ($a, $b) {
                                    return $a['sort_order'] - $b['sort_order'];
                                });
                            @endphp
                            
                            @foreach ($footerLinkSection as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">
                                        {{ $link['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>    
                    @endforeach
                @endif
            </div>
            
            {{-- News Letter subscription --}}
            @if(core()->getConfigData('customer.settings.newsletter.subscription'))
                <div class="grid gap-[10px]">
                    <p class="max-w-[288px] leading-[45px] text-[30px] italic text-navyBlue">
                        @lang('shop::app.components.layouts.footer.newsletter-text')
                    </p>

                    <p class="text-[12px]">
                        @lang('shop::app.components.layouts.footer.subscribe-stay-touch')
                    </p>

                    <x-shop::form
                        :action="route('shop.subscription.store')"
                        class="mt-[10px] rounded max-sm:mt-[30px]"
                    >
                        <label for="organic-search" class="sr-only">Search</label>

                        <div class="relative w-full">

                        <x-shop::form.control-group.control
                            type="email"
                            name="email"
                            class=" blockw-[420px] max-w-full px-[20px] py-[20px] pr-[110px] bg-[#F1EADF] border-[2px] border-[#E9DECC] rounded-[12px] text-xs font-medium max-1060:w-full"
                            rules="required|email"
                            label="Email"
                            placeholder="email@example.com"
                        >
                        </x-shop::form.control-group.control>

                        <x-shop::form.control-group.error
                            control-name="email"
                        >
                        </x-shop::form.control-group.error>

                            <button
                                type="submit"
                                class=" absolute flex items-center top-[8px] w-max px-[26px] py-[13px] bg-white rounded-[12px] text-[12px] font-medium rtl:left-[8px] ltr:right-[8px]"
                            >
                                @lang('shop::app.components.layouts.footer.subscribe')
                            </button>
                        </div>
                    </x-shop::form>
                </div>
            @endif
        </div>
    @endif

    <div class="flex justify-between  px-[60px] py-[13px] bg-[#F1EADF]">
        <p class="text-[14px] text-[#4D4D4D]">
            @lang('shop::app.components.layouts.footer.footer-text')
        </p>
=======
<footer class="mt-9 bg-lightOrange max-sm:mt-8">
    <div class="flex gap-x-6 gap-y-8 justify-between p-[60px] max-1060:flex-wrap max-1060:flex-col-reverse max-sm:px-4">
        <div class="flex gap-24 items-start flex-wrap max-1180:gap-6 max-1060:justify-between">
            @if ($customization?->options)
                @foreach ($customization->options as $footerLinkSection)
                    <ul class="grid gap-5 text-sm">
                        @php
                            usort($footerLinkSection, function ($a, $b) {
                                return $a['sort_order'] - $b['sort_order'];
                            });
                        @endphp
                        
                        @foreach ($footerLinkSection as $link)
                            <li>
                                <a href="{{ $link['url'] }}">
                                    {{ $link['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>    
                @endforeach
            @endif
        </div>
        
        {!! view_render_event('bagisto.shop.layout.footer.newsletter_subscription.before') !!}

        <!-- News Letter subscription -->
        @if (core()->getConfigData('customer.settings.newsletter.subscription'))
            <div class="grid gap-2.5">
                <p
                    class="max-w-[288px] leading-[45px] text-3xl italic text-navyBlue"
                    role="heading"
                    aria-level="2"
                >
                    @lang('shop::app.components.layouts.footer.newsletter-text')
                </p>

                <p class="text-xs">
                    @lang('shop::app.components.layouts.footer.subscribe-stay-touch')
                </p>

                <x-shop::form
                    :action="route('shop.subscription.store')"
                    class="mt-2.5 rounded max-sm:mt-8"
                >
                    <label for="organic-search" class="sr-only">Search</label>

                    <div class="relative w-full">

                    <x-shop::form.control-group.control
                        type="email"
                        name="email"
                        class="blockw-[420px] max-w-full px-5 py-5 p-28 bg-[#F1EADF] border-[2px] border-[#E9DECC] rounded-xl text-xs font-medium max-1060:w-full"
                        rules="required|email"
                        label="Email"
                        :aria-label="trans('shop::app.components.layouts.footer.email')"
                        placeholder="email@example.com"
                    >
                    </x-shop::form.control-group.control>

                    <x-shop::form.control-group.error
                        control-name="email"
                    >
                    </x-shop::form.control-group.error>

                        <button
                            type="submit"
                            class=" absolute flex items-center top-2 w-max px-7 py-3.5 bg-white rounded-xl text-xs font-medium rtl:left-2 ltr:right-2"
                        >
                            @lang('shop::app.components.layouts.footer.subscribe')
                        </button>
                    </div>
                </x-shop::form>
            </div>
        @endif
        
        {!! view_render_event('bagisto.shop.layout.footer.newsletter_subscription.after') !!}
    </div>

    <div class="flex justify-between  px-[60px] py-3.5 bg-[#F1EADF]">
        {!! view_render_event('bagisto.shop.layout.footer.footer_text.before') !!}

        <p class="text-sm text-[#4D4D4D]">
            @lang('shop::app.components.layouts.footer.footer-text')
        </p>

        {!! view_render_event('bagisto.shop.layout.footer.footer_text.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    </div>
</footer>

{!! view_render_event('bagisto.shop.layout.footer.after') !!}
<<<<<<< HEAD

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P6343Y2GKT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P6343Y2GKT');
</script>
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
