@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $productBaseImage = product_image()->getProductBaseImage($product);
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}" class="has-reviews has-faq">
    <head>
        <title>{{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url()->to('/') }}">
        <meta name="currency-code" content="{{ core()->getCurrentCurrencyCode() }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
        <link 
                type="image/x-icon"
                href="/storage/configuration/kXMSPSveA3eaK1w2RbcdiiIAv6OPs5UJRiaqANId.png" 
                rel="shortcut icon"
                sizes="16x16"
            >
        
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' />
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/jquery.colorbox.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/example1/colorbox.min.css" rel="stylesheet">
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '410784348009950');
    fbq('init', '946596946391407');
    fbq('init', '1481572959432110');
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=410784348009950&ev=PageView&noscript=1"/>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=946596946391407&ev=PageView&noscript=1"/>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1481572959432110&ev=PageView&noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->
    <!-- Facebook Pixel Code -->
<script>
  fbq('track', 'PageView');
  fbq('track', 'ViewContent');
</script>

<script src="https://lander.heomai.com/template-common/js/frames-init.js"></script>
<script src="https://lander.heomai.com/template-common/js/paypal-init.js"></script>

<?php if($app_env=='demo') { ?>
<script src="https://checkout-demo.airwallex.com/assets/elements.bundle.min.js"></script>
<?php }else{ ?>
<script src="https://checkout.airwallex.com/assets/elements.bundle.min.js"></script>
<?php } ?>



<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout1/css/font-awesome.min.css">

<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout6/css/order.css?v=12">
<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout-common/css/order.css">
<style>
        body {
            font-family: "Poppins"
        }
        .list-item {
            border: 6px solid transparent !important;
            border-radius: 5 !important;
            box-shadow: -4px 3px 9px 0 rgba(0, 0, 0, 0.31)
        }

        .list-item.item-5 {
            border-radius: 12px;
            overflow: hidden;
            border-radius: 8px;
            background-image: linear-gradient(white, white), linear-gradient(180deg, #bd8f2f 0, #f9f1b2 66%, #bd8f2f 100%);
            background-origin: border-box;
            background-clip: content-box, border-box;
            border: none !important;
            padding-top: 10px;
        }

        .list-item.item-5 .choose-top-title {
            background: #C49B3F !important
        }

        .list-item.item-5.list-item--checked .choose-top-title {
            background: #30BD51 !important
        }

        .list-item.list-item--checked,
        .list-item.list-item--focus {
            border: 6px solid #30BD51 !important;
            border-radius: 5px !important;
            box-shadow: none !important;
            background: #FFFEF4 !important
        }

        .list-item.item-5.list-item--checked,
        .list-item.item-5.list-item--focus {
            padding: 0 !important
        }

        .list-item.list-item--checked .list-item-btn,
        .list-item.list-item--focus .list-item-btn {
            background-color: #0896FF !important;
            border: none !important
        }

        .list-item.list-item--checked .list-item-btn .txt-select,
        .list-item.list-item--focus .list-item-btn .txt-select {
            display: none !important
        }

        .list-item.list-item--checked .list-item-btn .txt-order,
        .list-item.list-item--focus .list-item-btn .txt-order,
        .list-item.list-item--checked .list-item-btn .img-order,
        .list-item.list-item--focus .list-item-btn .img-order {
            display: block !important
        }

        .list-item--checked .recommend_deal {
            background: #30BD51 !important;
        }

        .recommend_deal {
            background: #C49B3F !important;
        }

        @media (max-width:1023px) {
            .list-item.list-item--checked,
            .list-item.list-item--focus {
                padding: 15px 10px 15px 20px !important
            }
        }
    </style>
<style>
        .attribute-err {
            display:none;
            font-size: .8rem;
            word-break: break-word;
            color: #cc4b37;
            margin: 0;
        }
    </style>
<script>
        function getQueryParameterTop(param) {
            let href = '';
            if (location.href.indexOf('?')) {
                href = location.href.substr(location.href.indexOf('?'));
            }
            const value = href.match(new RegExp('[\?\&]' + param + '=([^\&]*)(\&?)', 'i'));
            return value ? value[1] : null;
        }
    </script>
<style>
        .header-container-title {
            background-color: transparent;
        }
        .header-container-title-content {
            display: none !important;
        }
        .header-img {
            display: block;
        }
        .header-en-img, .header-pt-img, .header-es-img, .header-ja-img {
            background-image: url(/template-common/checkout-common/img/2023/header-real-en-img.jpg);
        }

        .header-de-img {
            background-image: url(/template-common/checkout-common/img/2023/header-real-de-img.jpg);
        }

        .header-fr-img {
            background-image: url(/template-common/checkout-common/img/2023/header-real-fr-img.jpg);
        }

        @media (max-width: 768px) {
            .header-img {
                padding-top: 14.4%;
            }
            .header-en-img, .header-pt-img, .header-es-img, .header-ja-img {
                background-image: url(/template-common/checkout-common/img/2023/header-real-mb-en-img.jpg);
            }
            
            .header-de-img {
                background-image: url(/template-common/checkout-common/img/2023/header-real-mb-de-img.jpg);
            }
            
            .header-fr-img {
                background-image: url(/template-common/checkout-common/img/2023/header-real-mb-fr-img.jpg);
            }
        }
    </style>

<script type="text/javascript"> (function(c,l,a,r,i,t,y){ c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)}; t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i; y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y); })(window, document, "clarity", "script", "kruepex7cm"); </script>
</head>
<body>
<div class="smb-body">
<div class="header-container">
<div class="header-container-bg"></div>
<style>
    .header-container-bg {
        background-image : url(/storage/<?php echo isset($productBgAttribute->text_value) ? $productBgAttribute->text_value : "" ;?>)
    }
    .modal-dialog {
        text-align: left;
        margin-top: 5rem;
    }

    .paypal-card-submit {
        max-width: 600px;
    }


    @media (max-width:1023px) {
        .header-container-bg {
            background-image : url(/storage/<?php echo isset($productBgAttribute_mobile->text_value) ? $productBgAttribute_mobile->text_value : "" ;?>)
        }
        .modal-dialog {
            max-width: 800px; /* New width for default modal */
        }
        .paypal-card-submit {
            max-width: 600px;
        }
    }

    @media (max-width:767px) {
        .header-container-bg {
            background-image : url(/storage/<?php echo isset($productBgAttribute_mobile->text_value) ? $productBgAttribute_mobile->text_value : "" ;?>)
        }
        .modal-dialog {
            max-width: 600px; /* New width for default modal */
        }
        .paypal-card-submit {
            max-width: 300px;
        }
    }
</style>

</div>
<div class="main-container">
<div class="main-container-progress-box">
<div class="main-container-progress-inner">
<div class="main-container-progress-state state-1">
<div class="main-container-progress-state-content">
<div class="main-container-progress-state-content-circle">
<a class="main-container-progress-state-content-circle-a click_scroll" anchor=".select_quantity_block">
<img src="https://lander.heomai.com/template-common/checkout1/images/stick-gr-dk.png" />
</a>
</div>
<div class="main-container-progress-state-content-step-title black">
@lang('onebuy::app.product.step.Select Quantity')</div>
</div>
<div class="main-container-progress-state-line active" style="height: 470px;"></div>
</div>
<div class="main-container-progress-state state-2">
<div class="main-container-progress-state-content">
<div class="main-container-progress-state-content-circle">
<a class="main-container-progress-state-content-circle-a click_scroll" anchor=".item-8">
<img src="https://lander.heomai.com/template-common/checkout1/images/no-2.png" />
</a>
</div>
<div class="main-container-progress-state-content-step-title">
 @lang('onebuy::app.product.step.Payment') </div>
</div>
<div class="main-container-progress-state-line" style="height:250px;"></div>
</div>
<div class="main-container-progress-state state-3">
<div class="main-container-progress-state-content">
<div class="main-container-progress-state-content-circle">
<a class="main-container-progress-state-content-circle-a click_scroll" anchor=".shipping_information_block">
<img src="https://lander.heomai.com/template-common/checkout1/images/no-3.png" />
</a>
</div>
<div class="main-container-progress-state-content-step-title">
 @lang('onebuy::app.product.step.Shipping Information') </div>
</div>
<div class="main-container-progress-state-line"></div>
</div>
<div class="main-container-progress-state state-4">
<div class="main-container-progress-state-content">
<div class="main-container-progress-state-content-circle">
<a class="main-container-progress-state-content-circle-a click_scroll" anchor=".place_order_block">
<img src="https://lander.heomai.com/template-common/checkout1/images/no-4.png" />
</a>
</div>
<div class="main-container-progress-state-content-step-title">
 @lang('onebuy::app.product.step.Place Order')  </div>
</div>
</div>
</div>
</div>
<div class="product-wrapper">
<div class="product-content">
<div class="checkout-security">
<div class="checkout-security-title">
<img class="checkout-security-title-img" src="https://lander.heomai.com/template-common/checkout1/images/secure-checkout.png" />
<div class="checkout-security-title-font">
 @lang('onebuy::app.product.order.Secure Checkout') </div>
</div>
<img class="checkout-security-img" src="https://lander.heomai.com/template-common/checkout1/images/secure-icons.png?v=1111" />
</div>
<div class="product-list js-list">
    <?php foreach($package_products as $key=>$package_product) { ?>
    <div data-id="<?php echo $package_product['id'];?>" class="list-item js-list-item item-<?php echo $key+5;?><?php if($key==0) { ?> list-item--checked <?php } ?>" style="order: 0;">
        <?php if($key==0) { ?>
        <div class="recommend_deal" style="display:flex;">
            <img class="recommend_deal_img" src="https://lander.heomai.com/template-common/checkout1/images/star.png">
            <div class="recommend_deal_font">
             @lang('onebuy::app.product.order.RECOMMENDED DEAL') </div>
        </div>
        <?php } ?>
        <div class="list-item-content">
            <div class="list-item-title">
                <span class="list-item-title-name js-name" style="font-weight:bold;">
                <?php echo $package_product['name'];?> <br/>
                </span>
            </div>
        <div class="list-item-footer">
            <div class="list-item-prices">
                <div class="old-price">
                <?php echo $package_product['old_price_format'];?> </div>
                <div class="new-price">
                <?php echo $package_product['new_price_format'];?> </div>
            </div>
        </div>
        <style>
            .tip1_wrapper_0 {
                display: flex;
            }
            .tip2_wrapper_0 {
                display: flex;
            }
            .tip2_wrapper_0 .tip1 {
                color: #00c1f1;
            }
        </style>
        <div class="tip_wrapper tip1_wrapper_0">
            <img src="https://lander.heomai.com/template-common/checkout1/images/checkmark.png">
            <div class="tip1 js-tip1"><?php echo $package_product['tip1'];?></div>
        </div>
        <div class="tip_wrapper tip2_wrapper_0">
            <img src="https://lander.heomai.com/template-common/checkout1/images/checkmark.png">
            <div class="tip1 js-tip1"><?php echo $package_product['tip2'];?></div>
        </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="attribute-select">
</div>
    <!-- <a class="list-item-btn click_scroll" anchor=".shipping-and-payment">
        <div class="order_now">
        ORDER NOW </div>
    </a> -->
    <div class="split-line shipping_information_paypal_block" style="padding-top:20px;">
        <div style="left: 0 \9;top: 8px \9;width: 100% \9; font-size:20px;font-weight:bold;">
         @lang('onebuy::app.product.order.Express Checkout') </div>
    </div>
    <div class="paypal-wrapper" style="display:block;text-align:-webkit-center;padding: 0;margin-top: 20px;margin: 0;margin-top: 20px;">
        <div id="paypal-error" style="color:#e51f28;display:none"></div>
        <div class="paypal-card-submit" id="paypal-card-submit"></div>
    </div>
</div>
</div>
<div class="shipping-and-payment-wrapper">
<div class="shipping-and-payment">
    <br />
    <br />
<div class="payment-block" style="display:none;">
<div class="payment-title">
 @lang('onebuy::app.product.order.Or Pay With Credit Card') </div>


<div class="checkout-block" id="checkout-block-up">
<!-- <button class="checkout-button">
<span>
CHECKOUT </span>
</button> -->
<script>
$('#checkout-block-up').on('click', function() {
    document.querySelector(".shipping_information_block").scrollIntoView({
        behavior: "smooth"
    })
})
</script>
<div class="checkout-content">
<form>
<div class="checkout-title">
<div class="checkout-title-font">
@lang('onebuy::app.product.order.Credit Card Information'): </div>
<img src="https://lander.heomai.com/template-common/checkout1/images/paypal_creditcard_images_jcb.png" />
</div>
<div id="cc-form" style="display:none">
<div id="card-number-cc" class="pay_cc"></div>
<div class="pay_cc_wrapper">
<div class="pay_cc pay_cc_half" id="card-expiry-cc">
</div>
<div class="pay_cc pay_cc_half" id="card-cvc-cc">
</div>
</div>
</div>
<div class="checkout-pay" style="display:none">
<div class="pay_checkout card-number-frame" id="card-number-frame">
</div>
<div class="pay_checkout_wrapper">
<div class="pay_checkout pay_checkout_half expiry-date-frame" id="expiry-date-frame">
</div>
<div class="pay_checkout pay_checkout_half cvv-frame" id="cvv-frame">
</div>
</div>
</div>
<div class="stripe-pay" style="display:none">
<div class="pay_stripe" id="card-number-stripe">
</div>
<div class="pay_stripe_wrapper">
<div class="pay_stripe pay_stripe_half" id="card-expiry-stripe">
</div>
<div class="pay_stripe pay_stripe_half" id="card-cvc-stripe">
</div>
</div>
</div>
<div id="checkout-card-error">
 @lang('onebuy::app.product.order.Your Card Info is invaild') </div>
</form>
</div>
</div>
<div class="split-line-safe shipping_information_block">
<div class="split-line-safe-content">
 @lang('onebuy::app.product.order.GUARANTEED')<span style="color: #00d2be;">
 @lang('onebuy::app.product.order.SAFE')</span>
 @lang('onebuy::app.product.order.CHECKOUT') </div>
</div>
<img class="payment-img" src="https://lander.heomai.com/template-common/checkout1/images/gsc-en.png?v=111" />
</div>
<div class="shipping-block" style="max-width:512px;">
<div class="shipping-title">
@lang('onebuy::app.product.order.Shipping')</div>
<div class="shipping-tip">
@lang('onebuy::app.product.order.Enter your contact information'):
</div>
<div class="shipping-info-form">
<form>
<div class="shipping-info-item">
<input name="email" type="email" class="shipping-info-input email" />
<label id="email-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
@lang('onebuy::app.product.order.Email') </label>
</div>
<div class="shipping-info-item">
<input name="first_name" class="shipping-info-input first_name" oninput="checkoutName(this)" />
<label id="first_name-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
@lang('onebuy::app.product.order.First Name') </label>
</div>
<div class="shipping-info-item">
<input name="last_name" class="shipping-info-input last_name" oninput="checkoutName(this)" />
<label id="last_name-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
@lang('onebuy::app.product.order.Last Name') </label>
</div>
<div class="shipping-info-item">
<input name="phone_number" type="tel" class="shipping-info-input phone_number" />
<label id="phone_number-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
@lang('onebuy::app.product.order.Phone Number') </label>
</div>
<div class="shipping-info-item">
<input name="address" class="shipping-info-input address" placeholder />
<label id="address-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
@lang('onebuy::app.product.order.Street Address') </label>
</div>
<!-- <div class="shipping-info-item">
<input name="apt_other" class="shipping-info-input apt_other" />
<label id="apt_other-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
Apt / Suite / Other </label>
</div> -->
<div class="shipping-info-item">
<input name="city" class="shipping-info-input city" oninput="checkoutCity(this)" />
<label id="city-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
@lang('onebuy::app.product.order.City') </label>
</div>
<div class="shipping-info-item">
<select class="shipping-info-select" name="country" id="country-select"></select>
<label id="country-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
@lang('onebuy::app.product.order.Country') </label>
</div>
<div class="shipping-info-flex place_order_block">
<div class="shipping-info-item shipping-info-flex-half">
<select class="shipping-info-select" name="state" id="state-select"></select>
<label id="state-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
@lang('onebuy::app.product.order.State/Province') </label>
</div>
<div class="shipping-info-item shipping-info-flex-half">
<input name="zip_code" class="shipping-info-input zip_code" />
<label id="zip_code-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
 @lang('onebuy::app.product.order.Zip/Postal Code')</label>
</div>
</div>
<input type="hidden" id="id_card" name="id_card" /> 
<input type="hidden" id="id_expiry" name="id_expiry" /> 
<input type="hidden" id="id_cvc" name="id_cvc" /> 
</form>
</div>
<div class="summary-block">
<div class="summary-block-sticky">
<div class="summary-wrapper">
<div class="summary-title">
@lang('onebuy::app.product.order.Order Summary') </div>
<div class="summary-content">
<ul class="summary-list">
<li class="summary-list-item">
<div class="product-name_block">
<span class="product-name js-product-name"></span>
<div class="edit-block">
<a class="click_scroll" anchor=".main-container">
 @lang('onebuy::app.product.order.EDIT')</a>
</div>
</div>
<div class="qty-price">
<div class="qty">
 @lang('onebuy::app.product.order.QTY'):
<span class="js-product-qty"></span>
</div>
<span class="product-price js-product-price"></span>
</div>
</li>
</ul>
<div class="summary-total">
<div class="summary-total-content">
<div class="summary-total-item">
<span class="summary-total-item-name">
@lang('onebuy::app.product.order.Subtotal'):
</span>
<span class="summary-total-item-price js-old-price product-price"></span>
</div>
<div class="summary-total-item">
<span class="summary-total-item-name">
@lang('onebuy::app.product.order.Discount'):
</span>
<span class="summary-total-item-price js-discount-price red product-price"></span>
</div>
<div class="summary-total-item">
<span class="summary-total-item-name">
@lang('onebuy::app.product.order.Shipping'):
</span>
<span class="summary-total-item-price js-shipping-price red"></span>
</div>
<div class="summary-total-item summary-total-item-shipping-insurance" style="display:none">
<span class="summary-total-item-name">
@lang('onebuy::app.product.order.Shipping Insurance'):
</span>
<span class="summary-total-item-price js-shipping-insurance-fee"></span>
</div>
<div class="summary-total-item coupon-price-item" style="display:none">
<span class="summary-total-item-name">
@lang('onebuy::app.product.order.Coupon'):
</span>
<span class="summary-total-item-price js-coupon-price red"></span>
</div>
<div class="summary-total-item">
<span class="summary-total-item-name">
@lang('onebuy::app.product.order.Total'):
</span>
<span class="summary-total-item-price js-total red product-price"></span>
</div>
</div>
</div>
<div class="summary-footer">
<div class="agree-block">
<input type="checkbox" checked>
I agree with the <a href="/onebuy/page/refund-policy?locale={{ app()->getLocale() }}" target="_blank">
 @lang('onebuy::app.product.order.Refund policy')  </a>
& <a href="/onebuy/page/privacy-policy?locale={{ app()->getLocale() }}" target="_blank" >
 @lang('onebuy::app.product.order.Privacy Policy') </a>
. </div>
<div class="guarantee-block">
<img class="guarantee-img" src="https://lander.heomai.com/template-common/checkout1/images/warranty-30days.png" />
<div class="guarantee-font">
<div class="guarantee-tip">
<strong>
@lang('onebuy::app.product.order.30 DAY GUARANTEE'):
</strong>
 @lang('onebuy::app.product.order.Hatmeo offers 30')</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<style type="text/css">
        #accordion {
            border-bottom-color: rgb(0, 0, 0);
            border-bottom-style: none;
            border-bottom-width: 0px;
            border-image-outset: 0;
            border-image-repeat: stretch;
            border-image-slice: 100%;
            border-image-source: none;
            border-image-width: 1;
            border-left-color: rgb(0, 0, 0);
            border-left-style: none;
            border-left-width: 0px;
            border-right-color: rgb(0, 0, 0);
            border-right-style: none;
            border-right-width: 0px;
            border-top-color: rgb(0, 0, 0);
            border-top-style: none;
            border-top-width: 0px;
            box-sizing: border-box;
            border-width: thin;
            border-style: solid;
            border-color: rgb(222, 222, 222);
            background-color: rgba(0, 0, 0, 0.043);
        }
		a:hover,a:focus{
		    text-decoration: none;
		    outline: none;
		}
		#accordion .panel{
		    border: none;
		    box-shadow: none;
		    border-radius: 0;
		    margin-bottom: -5px;
            font-family: "Poppins";
		}
		#accordion .panel-heading{
		    padding: 0;
		    border-radius: 0;
		    border: none;
		    text-align: center;
            /* padding-top: 10px; */
		}
        #accordion .panel-title {
            background-color:rgb(255, 255, 255);
            border-block-start-color: rgb(222, 222, 222);
            border-block-start-style: solid;
            border-block-start-width: 0.666667px;
            border-top-color: rgb(222, 222, 222);
            border-top-style: solid;
            border-top-width: 0.666667px;
            box-sizing: border-box;
        }

        #accordion .action {

        }

		#accordion .panel-title .panel-title-header {
		    display: block;
		    padding: 17px 20px;
		    font-size: 16px;
		    font-weight: bold;
		    color: #000;
		    /* background: rgb(240, 245, 255); */
		    /* border: 1px solid #0d6efd; */
		    position: relative;
            width: 100%;
            text-align: left;
		}
		#accordion .panel-title a:hover{
		    /* background: rgb(23, 115, 176); */
		}

        #accordion .panel-title .action {
            background: rgb(240, 245, 255);
		    border: 1px solid #0d6efd;
        }
		
		#accordion .panel-title a.collapsed:after{
		    transform: rotate(0deg);
		}
		#accordion .panel-body{
		    /* background: #167ea0; */
		    padding: 10px; 
		    border: none;
		    position: relative;
            /* border: 1px solid cadetblue; */
		}
		#accordion .panel-body p{
		    font-size: 14px;
		    color: #fff;
		    line-height: 25px;
		    background: #3296b7;
		    padding: 30px;
		    margin: 0;
		}
		#accordion .panel-collapse .panel-body p{
		    opacity: 0;
		    transform: scale(0.9);
		    transition: all 0.5s ease-in-out 0s;
		}
		#accordion .panel-collapse.in .panel-body p{
		    opacity: 1;
		    transform: scale(1);
		}
        #accordion a {
            text-decoration: auto;
        }
        #accordion .panel-collapse {
            /* background-color: rgba(0, 0, 0, 0.043); */
        }
	</style>
	<!--[if IE]>
		<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->

    <div class="shipping-title" style="padding-top:10px;">
@lang('onebuy::app.product.step.Payment')</div>
<div class="shipping-tip">
@lang('onebuy::app.product.order.All transactions are secure and encrypted'):
</div>
<div class="htmleaf-container">
            <form id="myForm">

	        <div class="full-container">
	            <div class="row">
	                <div class="col-md-offset-3 col-md-12">
	                    <div class="panel-group" id="accordion">


                        <div class="panel panel-default">
	                            <div class="panel-heading" role="tab" id="headingThree">
	                                <h4 class="panel-title">
                                        <div class="panel-title-header" id="headingThree2">
                                            <div class="form-check form-check-inline" style="width: 100%;">
                                                <input class="form-check-input" type="radio" value="airwallex-klarna" id="airwallex-klarna" checked name="payment_method">
                                                <label class="form-check-label" for="airwallex-klarna">
                                                <span>@lang('onebuy::app.product.payment.klarna.title')</span>
                                                <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/Klarna.png" style="max-height:24px" /></div>
                                                </label>
                                            </div>
                                        </div>

	                                    
	                                </h4>
	                            </div>
	                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
	                                <div class="panel-body">
	                                    <p>
                                        <div>
                                            @lang('onebuy::app.product.payment.klarna.description')
                                        </div>
                                        </p>
	                                </div>
	                            </div>
	                        </div>

                            <div class="panel panel-default">
	                            <div class="panel-heading" role="tab" id="headingTwo">
	                                <h4 class="panel-title">
                                        <div class="panel-title-header" id="headingOne2">
                                            <div class="form-check form-check-inline" style="width: 100%;">
                                                <input class="form-check-input" type="radio" value="paypal_standard" id="payal_standard" name="payment_method">
                                                <label class="form-check-label" for="payal_standard">
                                                <span>@lang('onebuy::app.product.payment.paypal.title') </span>
                                                <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/paypal.png" style="max-height:24px" /></div>
                                                </label>

                                                

                                            </div>
                                            
                                        </div>

	                                    
	                                </h4>
	                            </div>
	                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
	                                <div class="panel-body">
	                                    <p>
                                        <div>
                                            @lang('onebuy::app.product.payment.paypal.description')
                                        </div>
                                        </p>
	                                </div>
	                            </div>
	                        </div>


	                        <div class="panel panel-default">
	                            <div class="panel-heading"  id="headingOne">
	                                <h4 class="panel-title">
	                                    <div class="panel-title-header" id="headingOne1">
                                            <div class="form-check form-check-inline" style="width: 100%;">
                                                <input class="form-check-input" type="radio" name="payment_method" id="payment_method_airwallex" value="airwallex">
                                                <label class="form-check-label" for="payment_method_airwallex">
                                                    <span>@lang('onebuy::app.product.payment.creditCard.title')</span>

                                                    <div class="text-right" style="min-width:190px; display: inline;float: right;">
                                                        <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/0169695890db3db16bfe.svg" />
                                                        <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/ae9ceec48b1dc489596c.svg" />
                                                        <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/f11b90c2972f3811f2d5.svg" />
                                                        <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/37fc65d0d7ac30da3b0c.svg" />
                                                    </div>

                                                </label>
                                            </div>
                                            
                                        </div>
	                                </h4>
	                            </div>
	                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	                                <div class="panel-body">
                                    <div style={containerStyle}>
                                        <div>@lang('onebuy::app.product.payment.creditCard.card_number')</div>
                                        <div id="cardNumber" class="form-floating input-group has-icon-left" style="
            border: 1px solid #a7abad;
            color: #222;
            height: 32px;
            line-height: 22px;
            width: 100%;
            font-size: 14px;
            padding: 3px 8px;
            outline: 0;
            font-family: Arial, sans-serif;
            font-weight: 400;
            box-sizing: border-box;
            background-color: #fff;
            -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
            line-height: 1.25;padding: 1rem 0.75rem "></div>
                                    </div>
                                    <div style={containerStyle}>
                                        <div>@lang('onebuy::app.product.payment.creditCard.Expiry')</div>
                                        <div id="cardExpiry" style="
            border: 1px solid #a7abad;
            color: #222;
            height: 32px;
            line-height: 22px;
            width: 100%;
            font-size: 14px;
            padding: 3px 8px;
            outline: 0;
            font-family: Arial, sans-serif;
            font-weight: 400;
            box-sizing: border-box;
            background-color: #fff;
            -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
            line-height: 1.25;padding: 1rem 0.75rem "></div>
                                    </div>
                                    <div style={containerStyle}>
                                        <div>@lang('onebuy::app.product.payment.creditCard.cvc')</div>
                                        <div id="cardCvc" style="
            border: 1px solid #a7abad;
            color: #222;
            height: 32px;
            line-height: 22px;
            width: 100%;
            font-size: 14px;
            padding: 3px 8px;
            outline: 0;
            font-family: Arial, sans-serif;
            font-weight: 400;
            box-sizing: border-box;
            background-color: #fff;
            -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
            line-height: 1.25;padding: 1rem 0.75rem "></div>
                                    </div>
	                                </div>
	                            </div>
	                        </div>

	                        


                            
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
        </form>
	</div>

    <div class="submit-block">
        <div class="submit-content">
            
            <div class="zoom-fade submit-button" id="payment-button" style="text-align:center;">@lang('onebuy::app.product.payment.complete_secure_purchase')</div>
            <div id="checkout-error" style="color:#e51f28;display:none;"></div>
        </div>
    </div>


<div id="pay-after-warpper"></div>
<div class="summary-footer summary-footer-mb">
<div class="agree-block">
<input type="checkbox" checked>
I agree with the <a href="/onebuy/page/refund-policy?locale={{ app()->getLocale() }}" target="_blank">
@lang('onebuy::app.product.order.Refund policy') </a>
& <a href="/onebuy/page/privacy-policy?locale={{ app()->getLocale() }}" target="_blank"  >
 @lang('onebuy::app.product.order.Privacy Policy') </a>
. </div>

<div class="guarantee-block">
<img class="guarantee-img" src="https://lander.heomai.com/template-common/checkout1/images/warranty-30days.png" />
<div class="guarantee-font">
<div class="guarantee-tip">
<strong>
@lang('onebuy::app.product.order.30 DAY GUARANTEE'):
</strong>
Hatmeo offers a 30 day guarantee on all unused purchases. Simply send the item(s) back to us in the original packaging for a full refund or replacement, less S&H. </div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="https://lander.heomai.com/template-common/js/myFoldpanel.js"></script>


<link rel="stylesheet" type="text/css" href="/checkout/v1/app/desktop/css/main.css?v=1704676786" />

<style>
@media (max-width: 767px) {
    .testi-sec {
        padding: 8px;
    }
    .testi-row {
        padding: 0;
    }
}
@media (min-width: 1024px) {
    .testi-sec {
        padding: 0;
    }
    .testi-row {
        padding: 0;
    }
}
</style>

<section class="main">
<div class="row">

<div class="col-md-6 col-lg-6">

                    <div id="block--reviews" class="reviews">

                        <div class="step-title">

                             @lang('onebuy::app.product.order.What customers are saying about') Hatmeo <?php echo $product['name']; ?>
                        </div>

                        <hr class="mt-2">
                        <!-- NEW TESTIMONIAL SECTION STARTS HERE -->
                        <div class="testi-sec" style="">
                        <?php foreach($comments as $key=>$comment) { 
                            $comment = json_decode($comment);    
                            //var_dump($comment);exit;
                        ?>
                            <div class="testi-row" style="justify-content:left;">
                                <div class="testi-row-lft" style="width:180px;">
                                    <div class="testi-lft-abt">
                                        <p class="testi-pics"><?php echo substr($comment->name, 0, 1);?></p>
                                        <p class="t-name"><?php echo $comment->name;?></p>
                                        <p class="t-vryfd">
                                            <img src="/checkout/v1/app/desktop/images/vrfy-seal-c.png" alt=""> Verified Buyer
                                        </p>
                                    </div>
                                    <div class="test-prod" style="">
                                        <div class="t-prod-dv">
                                            <img src="/checkout/v1/app/desktop/images/t-prod1.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="testi-row-rght">
                                    <span><?php echo $comment->title;?></span>
                                    <img src="/checkout/v1/app/desktop/images/star.png" class="t-star">
                                    <p class="testi-paragraph" style="font-size:14px;line-height:18px;"><?php echo $comment->content;?></p>
                                   
                                </div>
                            </div>

                        <?php } ?>
                            
                        </div>
                        <!-- NEW TESTIMONIAL SECTION STARTS HERE -->

                    </div>

                </div>


<div id="block--faq" class="faqs col-md-5 bg-white border p-3">

<div class="h2 text-center mb-4" style="font-family: oswald;">

     @lang('onebuy::app.product.order.What customers are saying about')

</div>

<div class="accordion accordion-flush" id="faqs">

    <?php foreach($faqItems as $key=>$item) {
        $item = json_decode($item);    
    ?>

    <div class="accordion-item">

        <h2 class="accordion-header" id="compatability">

            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $key;?>" <?php if($key==0) { ?> aria-expanded="true" <?php } ?> aria-controls="faq<?php echo $key;?>">

                <?php echo $item->q;?>

            </button>

        </h2>

        <div id="faq<?php echo $key;?>" class="accordion-collapse collapse <?php if($key==0) { ?>show<?php } ?>" aria-labelledby="compatability" data-bs-parent="#faqs">

            <div class="accordion-body" style="font-size:14px;">

                <?php echo $item->a;?>

            </div>

        </div>

    </div>
<?php } ?>


</div>

</div>
    </div>

</section>

</div>
@include('onebuy::footer-container')
</div>
<div class="comment-block" id="comment-block">
<div class="comment-content">
<div class="comment-img">
<img alt="product image" src="{{ $productBaseImage['small_image_url'] }}">
</div>
<div class="comment-desc">
<div class="comment-details">
<span class="comment-firstName">firstName</span>
<span class="comment-lastName">lastName</span>
. from
<span class="comment-location">location</span>
<br/>
just purchased:
<strong class="comment-productName">product name</strong>
</div>
<div class="comment-time">
 @lang('onebuy::app.product.order.JUST NOW') </div>
</div>
</div>
</div>
<div class="loading-box" id="loading">
<div class="loading-gif"></div>
</div>
<div id="img-prop" onclick="hideImgProp()">
<img id="prop-img" src />
</div>
<style>
        #img-prop {
            display: none;
            position: fixed;
            background: rgba(0,0,0,0.6);
            text-align: center;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: 999999999999999999;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        #prop-img {
            max-height: 60%;
            max-width: 100%;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
<div class="payoneer-popup">
<div class="payoneer-container">
<div class="payoneer-close" onclick="hidePayoneerPopup()"><i class="fa fa-times"></i></div>
<div class="payoneer-pay-container">
<div class="payoneer-card-container"></div>
<div id="payoneerSubmitBtnContainer" class="submit-buttons-container">
<button id="payoneerSubmitBtn" class="submit-button" type="button">
 @lang('onebuy::app.product.order.COMPLETE SECURE PURCHASE') </button>
</div>
</div>
</div>
</div>
<style>
        .payoneer-popup {
            display: none;
            position: fixed;
            background: rgba(0,0,0,0.6);
            text-align: center;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: 202;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .payoneer-container {
            display: flex;
            max-height: 70%;
            width: 700px;
            max-width: 90%;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px 10px;
            background-color: #fff;
            overflow: hidden;
        }
        .payoneer-close {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 20px;
            padding: 5px 10px;
            cursor: pointer;
            color: black;
            font-weight: 700;
            text-shadow: 0 1px 0 #fff;
            line-height: 1;
            z-index: 1;
        }
        .payoneer-pay-container {
            flex:1;
            max-height: 100%;
            overflow-y: auto;
        }
    </style>
<script>
        function hidePayoneerPopup() {
            document.querySelector('.payoneer-popup').style.display = 'none';
        }
    </script>
<div id="stripe-3ds-popup">
<div id="stripe-3ds-container"></div>
</div>
<style>
        #stripe-3ds-popup {
            display: none;
            position: fixed;
            background: rgba(0,0,0,0.6);
            text-align: center;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: 202;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        #stripe-3ds-container {
            display: flex;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            overflow: hidden;
        }
    </style>
<script>

        var products = <?php echo json_encode($package_products);?>;
        var product_names = products.map(function(item) {return item.name})
        var comment_setting = {"productNames":product_names,"firstNames":["James","Mary","Robert","Jennifer","Michael","Elizabeth","Thomas","Nancy","Charles"],"lastNames":["A","B","C","D","E","F","G","H","K","L","M","N","O","P","R","S","T","V","W","Y"],"locations":["Florida, US","North Carolina, US","New York, US","Washington, US","Texas, US","Kentucky, US","North Coast, CA","Central Coast, CA","Klamath Mountains, CA","Central Sierra, CA","Central California, CA"]};
        function setComment(e) {
            if (!(c = document.getElementById("loading-bar")) || "block" !== c.style.display) {
                var t = e.productNames[Math.floor(Math.random() * e.productNames.length)],
                    r = e.firstNames[Math.floor(Math.random() * e.firstNames.length)],
                    n = e.lastNames[Math.floor(Math.random() * e.lastNames.length)],
                    o = e.locations[Math.floor(Math.random() * e.locations.length)],
                    a = Math.floor(40 * Math.random() + 5);

                    $('.comment-firstName').html(r || "");
                    $('.comment-lastName').html(n || "");
                    $('.comment-location').html(o || "");
                    $('.comment-productName').html(t || "");
                    $('#comment-block').addClass("notify");
                setTimeout(function() {
                    $('#comment-block').removeClass("notify")
                }, 5400)
            }
        }

        setComment(comment_setting)
        var commentInterval = setInterval(function() {
            setComment(comment_setting), /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && clearInterval(commentInterval)
        }, 15000 + 5400)
    </script>
<script>
        function getSelectProduct() {
            var selected_id = $('.list-item--checked').data('id');
            var products = <?php echo json_encode($package_products);?>;
            
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                if(product.id == selected_id) {
                    return product;
                }
            }

            return false;
        }

        function getFormatPrice(price) {
            var price_template = '{{ core()->currencySymbol(core()->getCurrentCurrencyCode()) }}price',
                price_prefix = '';
            if(price*1 < 0) {
                price = Math.abs(price);
                price_prefix = '-';
            }
            
            return price_prefix + price_template.replace('price', (price*1).toFixed(2));
        }

        function changeOrderSummary() {
            var product = getSelectProduct();
            var produt_amount_base = '1';
            if(!produt_amount_base) {
                produt_amount_base = 1;
            }

            var shipping_fee = product.shipping_fee;
            
            var total = product.new_price*1 + shipping_fee*1;
                        
            $('.js-product-name').html($('.list-item--checked .js-name').text());
            $('.js-product-qty').html(product.amount*produt_amount_base);
            $('.js-product-price').html(getFormatPrice(product.new_price));
            $('.js-old-price').html(getFormatPrice(product.old_price));
            $('.js-discount-price').html(getFormatPrice(product.new_price - product.old_price));
            $('.js-shipping-price').html(getFormatPrice(shipping_fee));
            $('.js-total').html(getFormatPrice(total));
                    }

        $('.js-list-item').on('click', function() {
            $('.js-list-item').each(function() {
                $(this).removeClass('list-item--checked');
            })

            $(this).addClass('list-item--checked');
            showAttributeSelecet('Itme');
            changeOrderSummary();
        })

        changeOrderSummary();
    </script>
<script>
        $('.shipping-info-item input, .shipping-info-item select').on('change', function() {
            var value = $(this).val();
            if(value) {
                $(this).addClass("shipping-info-exist-value");
                $(this).removeClass('shipping-info-input-error');
                $(this).parent().find('.shipping-info-error').hide();
            } else {
                $(this).removeClass("shipping-info-exist-value");
            }

            if($(this).attr('id') == 'country-select') {
                $('.shipping-info-item .zip_code').removeClass('shipping-info-input-error');
                $('.shipping-info-item .zip_code').parent().find('.shipping-info-error').hide();
            }
        })
        $('.shipping-info-item input').on('input', function() {
            $(this).removeClass('shipping-info-input-error');
            $(this).parent().find('.shipping-info-error').hide();
        })
        function updateCountrySelect(countries) {
            //countries = data.data
            window.countries = countries;
      
            var t = '<option value="">----</option>';
            countries.forEach(function(e) {
                //t += "<option value=".concat(e.code, ">").concat(e.name, "</option>")
                t += "<option value=".concat(e.countryCode, ">").concat(e.countryName, "</option>")
            });

            $('#country-select').html(t);
            $('#country-select').on('change', function() {
                getStateSelect();
            })

            var cur_country = '<?php echo $default_country;?>';
            if(cur_country) {
                $('#country-select').val(cur_country);
                $('#country-select').parent(".shipping-info-item").find(".shipping-info-label").css({
                    "font-size": "0.8rem",
                    top: "5px"
                })
                getStateSelect();
            }
        }

        function updateStateSelect(states) {
            if(states && states.length) {
                if(!window.states) {
                    showProvince();
                }
                window.states = states;
                var t = '<option value="">----</option>';
                states.forEach(function(e) {
                    t += "<option value=".concat(e.StateCode, ">").concat(e.StateName, "</option>")
                });

                $('#state-select').html(t);
                if(window.state_select) {
                    $('#state-select').val(window.state_select);
                    $('#state-select').change();
                    window.state_select = '';
                }
            } else {
                window.states = false;
                hideProvince();
            }
        }

        function showProvince() {
            $('#state-select').parent().show();
            $('#state-select').parent().next().addClass('shipping-info-flex-half');
        }

        function hideProvince() {
            $('#state-select').parent().hide();
            $('#state-select').parent().next().removeClass('shipping-info-flex-half');
        }

        function getStateSelect() {
            if($("#country-select").val()) {
                getCountryStates(updateStateSelect);
                
            }
        }

        function getCountryStates(callback) {
            var url = '/template-common/checkout1/state/' + $("#country-select").val().toLowerCase() + '.json';
            fetch(url,{
                method: 'GET',
            })
            .then(function(data){return data.json()}).then(function(data) {callback(data)}).catch(function(err){callback()})
        }

        //fetch('/api/core/countries',{
        fetch('/template-common/checkout1/state/countries.json',{
            method: 'GET',
        })
        .then(function(data){
            return data.json()}
        ).then(function(data) {
            //console.log(data);
            updateCountrySelect(data)
        })
    </script>
<script>
    function setAttributeTemplate(select_language, select_language_after, has_img_attribute_id, is_more_attribute, template, attribute_err_language) {
        var product_attributes = JSON.parse(JSON.stringify(window.product_attributes));
        
        //console.log(product_attributes);
        var product_template = '<div class="attribute-item">';
        if(is_more_attribute) {
            product_template += '<div class="attribute-item-title">{article}</div>';
        }
        var show_image = '';

        for (var i = 0; i < product_attributes.length; i++) {
            var product_attribute = product_attributes[i];
            product_template += '<div class="attribute_item_wrapper">';
            product_template += '<div class="attribute-value-item-title">'+select_language+' ' + (product_attribute.name || '') + select_language_after;
            
            if(product_attribute.tip) {
                product_template += ' <span style="text-decoration: underline;font-size: 14px;cursor:pointer;color:#0000ff;" onclick="showImgProp(&quot;'+"/storage/"+product_attribute.tip_img+'&quot;)">'+product_attribute.tip+'</span>'
            }
            
            product_template += '</div>';
            // product_template += '<select class="attribute-value-item-select attribute_select" onchange="attributeChange(this, '+(product_attribute.id == has_img_attribute_id)+', '+"'"+template+"'"+')" '+(product_attribute.id==has_img_attribute_id? ' data-has-img="true"' : '' )+'><option value="" '+ (!product_attribute.selected_option_id ? 'selected' : '') +' url="'+product_attribute.options[0].image+'"></option>';
            product_template += '<select class="attribute-value-item-select attribute_select" onchange="attributeChange(this, '+(product_attribute.id == has_img_attribute_id)+', '+"'"+template+"'"+')" '+(product_attribute.id==has_img_attribute_id? ' data-has-img="true"' : '' )+'>';
            if(product_attribute.id == has_img_attribute_id && !product_attribute.selected_option_id) {
                show_image = product_attribute.options[0].image;
            }
                
            for(var j=0; j<product_attribute.options.length; j++) {
                var product_attribute_option = product_attribute.options[j];
                product_template += '<option value="'+product_attribute_option.name+'" '+ (product_attribute_option.id==product_attribute.selected_option_id? 'selected' : '') +' url="'+product_attribute_option.image+'" '+ (product_attribute_option.is_sold_out ? ' data-is-sold-out="true" ' : '')+'>'+product_attribute_option.name+'</option>';
                if(product_attribute_option.id==product_attribute.selected_option_id && product_attribute.id == has_img_attribute_id) {
                    show_image = product_attribute_option.image;
                }
            }
                
            product_template += '</select>';
            if(template == 'common15') {
                product_template += '<p class="attribute-err">'+attribute_err_language+'</p>'
            }
            product_template += '</div>';

            if(product_attribute.id == has_img_attribute_id && show_image) {
                product_template += '<div class="img-wrapper"><img src="'+ show_image +'" /></div>'
            }
        }
        //console.log(product_template);
        window.product_template = product_template;
    }

function getCurAttributeSelect(article_str) {
    if(!article_str) {
        article_str = 'PAIR';
    }
    var amount = $('.attribute-select .attribute-item').length + 1;
    return window.product_template.replace('{article}', article_str + ' '+amount)
}

function showAttributeSelecet(article_str) {
    var product_info   = getSelectProduct();
    if(!product_info) {
        setTimeout(function() {
            showAttributeSelecet();
        }, 100)
        return;
    }
    
    var cur_amount     = $('.attribute-select .attribute-item').length;
    var product_amount = product_info.amount;
    
    var handle = null;
    if(product_amount-cur_amount >0) {
        handle = function () {
            $('.attribute-select').append(getCurAttributeSelect(article_str));
        }
    } else {
        handle = function () {
            $('.attribute-select .attribute-item')[$('.attribute-select .attribute-item').length-1].remove();
        }
    }
    for (var i = 0; i < Math.abs(product_amount-cur_amount); i++) {
        handle();
    }
}

function attributeChange(target, is_img_attribute, template) {
    if(template == 'common5') {
        changeHtmlShow();
    }
    if(template == 'common15' && isProductSoldOut) {

        isProductSoldOut();
    }
    if(is_img_attribute) {
        var attribute_img = $(target).find('option:selected').attr('url');
    
        $(target).parent().next().find('img').attr('src', attribute_img);
    }
}

function isProductSoldOut() {
    var is_sold_out = false;
    var attribute_item = $('.attribute-select .attribute-item');
    for(var i=0; i< attribute_item.length; i++) {
        var option_select = $(attribute_item[i]).find('.attribute_select  option:selected');
        for(var j=0; j<option_select.length; j++) {
            $(option_select[j]).parent().parent().find('.attribute-err').hide();
            if($(option_select[j]).data('is-sold-out')) {
                $(option_select[j]).parent().parent().find('.attribute-err').show();
                is_sold_out = true;
            }
        }
    }
    return is_sold_out;
}

function getQueryString(name) {
    var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
    var r = window.location.search.substr(1).match(reg);

    if (r != null) {
    return unescape(r[2]);
    }
    return null;
}

function GetRequest() {
    var url = location.search; //Ã¨Å½Â·Ã¥Ââ€“urlÃ¤Â¸Â­"?"Ã§Â¬Â¦Ã¥ÂÅ½Ã§Å¡â€žÃ¥Â­â€”Ã¤Â¸Â²
    var theRequest = new Object();
    if (url.indexOf("?") != -1) {
        if(url.indexOf('cko-session-id') > -1) {
            var new_url = url.substr(1);
            var new_url_arr = new_url.split('&');
            for (var new_url_arr_index = 0; new_url_arr_index < new_url_arr.length; new_url_arr_index++) {
                var new_url_one = new_url_arr[new_url_arr_index];
                if(new_url_one.indexOf('cko-session-id') > -1) {
                    new_url_arr.splice(new_url_arr_index, 1);
                }
            }

            url = '?'+new_url_arr.join('&');
        }

        return url.substr(1);
    }
    return '';
}

function showImgProp(img) {
    //console.log('showImgProp');
    document.getElementById('prop-img').src = img;
    document.getElementById('img-prop').style.display = 'block';
}

function hideImgProp() {
    document.getElementById('img-prop').style.display = 'none';
}

function GotoNotRequest(url) {
    try {
        var userAgent = navigator && navigator.userAgent;
        var link = url;

        window.top.location.assign(link);
        returnValueClear();

        window.turn_inter = setTimeout(function() {
            window.top.location.href = link;
            returnValueClear();
        }, 1000)

        window.no_href_turn_inter = setTimeout(function() {
            window.top.location = link;
            returnValueClear();
        }, 2000)

        window.a_turn_inter = setTimeout(function() {
            turnByCreatA(link, order_id);
            returnValueClear();
        }, 3000)

        window.no_top_turn_inter = setTimeout(function() {
            window.location.href = link;
            returnValueClear();
        }, 4000)
    } catch (error) {
        window.top.location.href = url;
    }
}
</script>
<script>
        window.product_attributes = <?php echo json_encode($product_attributes);?>;

        var is_more_attribute = 1;
        setAttributeTemplate('@lang('onebuy::app.product.order.SELECT YOUR')', '', '23', is_more_attribute ? true : false, 'common15', 'Sold out, please select another Attributes');
        showAttributeSelecet('@lang('onebuy::app.product.order.Item')');
    </script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P6343Y2GKT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P6343Y2GKT');
</script>

<script>
        window.pay_type = 'airwallex';
        window.is_paypal_standard = pay_type == 'paypal_standard' ? true : false;
        window.is_checkout_pay = pay_type == 'checkout' ? true : false;
        window.is_payoneer_pay = pay_type == 'payoneer' ? true : false;
        window.is_paypal_card_pay = pay_type == 'paypal_card' ? true : false;
        window.is_wintopay = pay_type == 'wintopay' ? true : false;
        window.is_pacypay = pay_type == 'pacypay' ? true : false;
        window.is_worldpay = pay_type == 'worldpay' ? true : false;
        window.is_airwallex = pay_type == 'airwallex' ? true : false;
        window.is_stripe_pay = pay_type == 'stripe' ? true : false;
        window.is_stripe_local = pay_type == 'stripe_local' ? true : false;
        window.is_airwallex_klarna = pay_type =="airwallex_klarna" ? true : false;

        var currency = '{{ core()->getCurrentCurrencyCode() }}';
        var paypal_pay_acc = "<?php echo $paypal_client_id;?>"; // test

        var script = document.createElement('script');
        if (script.readyState) { // IE
            script.onreadystatechange = function () {
                if (script.readyState === 'loaded' || script.readyState === 'complete') {
                    script.onreadystatechange = null;
                    creatPaypalCardButton();
                }
            } 
        } else { // 其他浏览器
            script.onload = function () {
                creatPaypalCardButton();
            }
        }
        script.type = 'text/javascript';
        // script.src = 'https://www.paypal.com/sdk/js?client-id=Ac3a2fQqrAO_2skbKS4hb5okCBnRUdh_i78Vvjhh-s1xc4fqZc39OyawwGL4kdHGvlPiRsv6CmogaJZz&components=buttons,messages,funding-eligibility&currency='+currency+'&disable-funding=paylater';
        script.src = 'https://www.paypal.com/sdk/js?client-id='+paypal_pay_acc+'&components=buttons,messages,funding-eligibility&currency='+currency;
        // script.src = 'https://www.paypal.com/sdk/js?client-id=AUbkpTo_D9-l80qERS91ipcrXuIfSC3WMmFbK7Ey4n8RS3TaoJDw8H2rpxdhsWBIZWZbb6E3V7CSmK4R&components=buttons,messages,funding-eligibility&currency='+currency+'&disable-funding=paylater';
        script.async = 1;
        document.body.appendChild(script);

        function creatPaypalCardButton() {
            var that = this;
            var FUNDING_SOURCES = [
                {fundingSource: paypal.FUNDING.PAYPAL},
            ]


            
            
                        
            FUNDING_SOURCES.forEach(function(item) {
                var error_id = item.error_id;
                var render_id = item.render_id;
                var paypal_type = item.paypal_type;
                var fundingSource = item.fundingSource;



                paypal.Buttons({
                    style: {
                        layout:  fundingSource === paypal.FUNDING.CARD ? 'vertical' : 'horizontal',
                    },
                    fundingSource: fundingSource === paypal.FUNDING.CARD ? paypal.FUNDING.CARD : undefined,
    
                    // Call your server to set up the transaction
                    createOrder: function(data, actions) {
                        sendInitiateCheckoutEvent();

                        gtag('event', 'initiate_paypal_checkout', {
                            'event_label': 'Initiate paypal Checkout',
                            'event_category': 'ecommerce'
                        });

                        fbq('track', 'InitiateCheckout');
                        // obApi('track', 'Start Checkout'); 
                        var params = getOrderParams( paypal_type || 'paypal');
                        if(params.error) {
                            $('#'+ (error_id || 'paypal-error')).html(params.error.join('<br />'));
                            $('#'+ (error_id || 'paypal-error')).show();
                            throw new Error('Verification failed');
                        }
                        var url = '/onebuy/order/addr/after?_token={{ csrf_token() }}&time=' + new Date().getTime();
                        $('#loading').show(); 
                        $('#'+ (error_id || 'paypal-error')).hide();

                        return  fetch(url,{
                                    body: JSON.stringify(params),
                                    method: 'POST',
                                    headers: {
                                        'content-type': 'application/json'
                                    },
                                })
                                .then(function(res){return res.json()})
                                .then(function(res) {
                                    $('#loading').hide();
                                    var data = res;
                                    //console.log(data)
                                    if(data.statusCode === 201){
                                        var order_info = data.result;
                                        //console.log(order_info);
                                        //console.log(order_info.purchase_units[0].amount);
                                        document.cookie="voluum_payout="+ order_info.purchase_units[0].amount.value + order_info.purchase_units[0].amount.currency_code + "; path=/";
                                        document.cookie="order_id="+ order_info.id + "; path=/";
                                        localStorage.setItem("order_id", order_info.id);
                                        localStorage.setItem("order_params", JSON.stringify(params));

                                        return order_info.id;
                                    } else {
                                        var pay_error = JSON.parse(data.error);
                                        var pay_error_message = pay_error.details;

                                        if(pay_error_message && pay_error_message.length) {
                                            var show_pay_error_message_arr = [];
    
                                            for(var pay_error_message_i = 0; pay_error_message_i < pay_error_message.length; pay_error_message_i++) {
                                                show_pay_error_message_arr.push("Field:"+pay_error_message[pay_error_message_i].field + "<br /> Value" + pay_error_message[pay_error_message_i].value + '. <br />' + pay_error_message[pay_error_message_i].description + '<br /><br />')
                                            }
    
                                            $('#'+ (error_id || 'paypal-error')).html(show_pay_error_message_arr.join(''));
                                            $('#'+ (error_id || 'paypal-error')).show();
                                        }
                                    }
                                })
                    },
    
                    // Call your server to finalize the transaction
                    /**
                     *
                     * 
                     */
                    onApprove: function(data, actions) {
                        console.log("on app rove");
                        if(!data.orderID) {
                            throw new Error('orderid is not exisit');
                        }
                        var orderData = {
                            paymentID: data.orderID,
                            orderID: data.orderID,
                        };
                        var request_params = {
                            client_secret : data.orderID,
                            id : localStorage.getItem('order_id'),
                            orderData: orderData,
                        }
                        var request = '';
                        for(var i=0; i<Object.keys(request_params).length; i++) {
                            request += Object.keys(request_params)[i] + '=' + request_params[Object.keys(request_params)[i]] + '&';
                        }
                        request = request.substr(0,request.length - 1);
                        //console.log(request);

    
                        var url = '/onebuy/order/status?' + request + "&_token={{ csrf_token() }}";
                        var url = "/paypal/smart-button/capture-order?_token={{ csrf_token() }}";
                        var url = "/onebuy/order/status?_token={{ csrf_token() }}";
    
                        $('#loading').show();
                        return fetch(url,{
                                method: 'post',
                                body: JSON.stringify(request_params),
                                headers: {
                                    'content-type': 'application/json'
                                },
                            })
                            .then(function(res) {return res.json()})
                            .then(function(res) {
                                //console.log(res);
                                $('#loading').hide();
                                if(res.success == true) {
                                    //var info = res.info;
                                    //if(info.pay_status) {
                                        //Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id')+'&client_secret='+data.orderID);
                                        //Goto('/onebuy/checkout/success?id='+localStorage.getItem('order_id'));
                                        Goto('/checkout/v1/success/'+localStorage.getItem('order_id'));
                                    //}
                                }
                                if(res.error == 'INSTRUMENT_DECLINED') {
                                    $('#'+ (error_id || 'paypal-error')).html("The instrument presented  was either declined by the processor or bank, or it can't be used for this payment.<br><br> Please confirm your account or bank card has sufficient balance, and try again.");
                                    $('#'+ (error_id || 'paypal-error')).show();
                                }
                            })
                    },
    
                    onError: function(err) {
                        console.log('error from the onError callback', err);
                    }
    
                }).render('#' + (render_id || 'paypal-card-submit'));
            })
        }


        function onCardTokenized(event) {
            $('#loading').hide();
            if(event.token) {
                createOrder(event.token);
            } else {
                $('#checkout-card-error').show();
                document.querySelector(".checkout-content").style.display = "block";
                document.querySelector(".checkout-block").scrollIntoView({
                    behavior: "smooth"
                })
            }
        }

       

        function postOrderPayFailed(pay_type) {
            var order_id = localStorage.getItem('order_id');
            if(order_id) {
                var url = '/order/pay/fail_notice';
                var params = {
                    id : order_id,
                    pay_type: pay_type,
                };
                fetch(url,{
                    body: JSON.stringify(params),
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json'
                    },
                })
            }
        }

        // 添加到购买车中
        function addToCart(pay_type) {
            var product = getSelectProduct();
            var shipping_fee = product.shipping_fee;
            
            var product_info = {
                product_name  : product.name,
                product_price : product.new_price,
                product_sku  : '',
                product_id  : '<?php echo $product->id;?>',
                sku_id  : '',
                currency : '{{ core()->getCurrentCurrencyCode() }}',
                shipping_fee : shipping_fee,
                amount : product.amount,
                product_image : '{{ $productBaseImage['small_image_url'] }}'
            };

            var total = product_info.product_price*1 + product_info.shipping_fee* 1;

            var phone_number = $(".phone_number").val();
            var phone_prefix = getPhonePrefix();


            
            var products = getSubmitProducts(product_info.product_price,product_info.amount);

            var url = '/api/checkout/cart?_token={{ csrf_token() }}&time=' + new Date().getTime();

            $('#loading').show();
            fetch(url,{
                body: JSON.stringify(products),
                method: 'POST',
                headers: {
                    'content-type': 'application/json'
                },
            })
            .then(function(res){return res.json()})
            .then(function(res) {
                console.log(res);
            });

        }


        $(".email").on("focus", function(){
            console.log("email focus");
        });

        $(".email").on("blur", function(){
            console.log("email blur");
            var email = $(".email").val();
            if(email.length > 0) {
                fbq('track', 'AddPaymentInfo');
            }
        });

        

        function checkout() {
            sendInitiateCheckoutEvent();
            gtag('event', 'initiate_checkout', {
                'event_label': 'Initiate Checkout',
                'event_category': 'ecommerce'
            });
            fbq('track', 'InitiateCheckout');
            // obApi('track', 'Start Checkout'); 
            var pay_type = 'worldpay';
            var params = getOrderParams(pay_type);
            if(params.error && params.error.length) {
                $('#checkout-error').html(params.error.join('<br />'));
                $('#checkout-error').show();
                return;
            }

            $('#loading').show();
            $('#checkout-error').hide();

            

            if(window.is_checkout_pay) {
                Frames.submitCard();
                Frames.enableSubmitForm();
            } else if(window.is_wintopay) {
                cc_form.submit('/post', {}, function(status, data) {
                    $('#loading').hide();
                    createOrder('', '', 'wintopay', data.json);
                }, function(err) {
                    $('#loading').hide();
                    console.log(err);
                });
            } else if(window.is_pacypay) {
                createOrder('', '', 'pacypay');
            } else if(window.is_worldpay){
                createOrder('', '', 'worldpay');
            }else if(window.is_paypal_standard) {
                createOrder('', '', 'paypal_standard');
            }else if(window.is_airwallex_klarna) {
                createOrder('', '', 'airwallex_klarna');
            }else if(window.is_airwallex){
                $('#airwallex-warpper').hide();
                createOrder('', '', 'airwallex');
            } else if(window.is_stripe_local){
                if(typeof changeStripeAcc == 'function') {
                    changeStripeAcc('viusd')
                }
                createOrder('', '', 'stripe_local');
                $('.pay-after-submit-button').hide();
            } else {
                stripeCreateOrderBefore(createOrder, params, function(error) {
                    $('#loading').hide();
                    $('#checkout-error').html(error);
                    $('#checkout-error').show();
                });
                // createOrder('', 'stripe_charge_token', 'stripe');
                // stripe.createToken(cardNumber).then(function(result) {
                //     if (result.error) {
                //         // Inform the customer that there was an error.
                //         $('#checkout-error').html(result.error.message+'<br /><br />');
                //         $('#checkout-error').show();
                //         $('#loading').hide();
                //     } else {
                //         // Send the token to your server.
                //         createOrder(result.token.id, 'stripe_charge_token', 'stripe');
                //     }
                // });
            }
        }

        function createOrder(token, token_field="checkout_frames_token", pay_type="checkout", card={}) {

            //商品加入到购车中
            //addToCart(pay_type);

            var params = getOrderParams(pay_type);
            if(token){
                params[token_field] = token;
            }

            if(Object.keys(card).length) {
                params['card'] = card;
            }

            params['pay_type'] = pay_type;
            console.log(JSON.stringify(params));
            //return false;

            var url = '/onebuy/order/add/sync?_token={{ csrf_token() }}&time=' + new Date().getTime();

            if(pay_type=="payoneer" || pay_type == 'pacypay') {
                url = '/order/add/async?time=' + new Date().getTime();
            }

            $('#loading').show();
            fetch(url,{
                body: JSON.stringify(params),
                method: 'POST',
                headers: {
                    'content-type': 'application/json'
                },
            })
            .then(function(res){return res.json()})
            .then(function(res) {
                var data = res;
                console.log(data);
                if(data.result === 200){
                    var order_info = data.order;

                    console.log(order_info);
                    console.log(window.is_airwallex_klarna);

                    if(window.is_paypal_standard) {
                        var paypal_form = '<form action="'+data.pay_url+'" method="post" style="display:none" >';
                        console.log(data.form);
                        $.each(data.form, function(k, v) {

                            if(k=='cancel_return') v = window.location.href;
                            
                            /// do stuff
                            paypal_form +='<input type="hidden" name="'+k+'" value="'+v+'">';
                        });
                            // 
                        paypal_form += '</form>';
                        console.log(paypal_form);
                        $(paypal_form).appendTo('body').submit();
                        return false;
                    }

                    if(window.is_airwallex_klarna) {

                        document.cookie="voluum_payout="+ order_info.grand_total + order_info.order_currency_code + "; path=/";
                        document.cookie="order_id="+ order_info.id + "; path=/";
                        localStorage.setItem("order_id", order_info.id);
                        localStorage.setItem("order_params", JSON.stringify(params));

                        url = "/onebuy/order/confirm?_token={{ csrf_token() }}&payment_intent_id="+data.payment_intent_id+"&order_id="+data.order.id;
                        fetch(url, {
                            method: 'GET',
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then(function(res){return res.json()})
                        .then(function(res) {

                            console.log(res);

                            console.log(res.payment.next_action.url);

                            Goto(res.payment.next_action.url);

                        });

                        




                        return false;


                    }

                    document.cookie="voluum_payout="+ order_info.grand_total + order_info.order_currency_code + "; path=/";
                    document.cookie="order_id="+ order_info.id + "; path=/";
                    localStorage.setItem("order_id", order_info.id);
                    localStorage.setItem("order_params", JSON.stringify(params));

                    

                    if (window.is_airwallex){
                        
                        document.querySelector(".submit-button").scrollIntoView({
                            behavior: "smooth"
                        })
                        //$('#airwallex-warpper').show();

                        console.log(order_info);

                        Airwallex.confirmPaymentIntent({
                            element: cardNumber,
                            id: data.payment_intent_id,
                            client_secret: data.client_secret,
                        }).then((response) => {
                        // STEP #6b: Listen to the request response
                        /* handle confirm response in your business flow */
                        //window.alert(JSON.stringify(response));
                            $('#loading').hide();
                            console.log('success');
                            console.log(JSON.stringify(response))
                            //cb.errorHandler("Success");
                            //alert("Success"); 

                            gtag('event', 'initiate_pay_success', {
                                'event_label': "Initiate cc success"+data.order.id,
                                'event_category': 'ecommerce'
                            });

                            window.location.href="/checkout/v1/success/"+data.order.id;

                        }).catch((response) => {
                            $('#loading').hide();
                            console.log("catch");
                            console.log(JSON.stringify(response))

                            //cb.errorHandler(response.message);
                            //alert(response.message);

                            //$("#checkout-error").val(response.message);

                            $('#checkout-error').html(response.message+'<br /><br />');
                            $('#checkout-error').show();
                            // var cbErrors = new Array();
                            // cbErrors.push(response.message);
                            // cb.errorHandler(cbErrors);

                            gtag('event', 'initiate_pay_error', {
                                'event_label': response.message,
                                'event_category': 'ecommerce'
                            });
                            // cb.errorHandler(response.message);
                            return false;

                        });
                    } 
                } else {
                    $('#loading').hide();
                    var pay_error = data.error;

                    if(pay_error && pay_error.length) {
                        $('#checkout-error').html(pay_error.join('<br />')+'<br /><br />');
                        $('#checkout-error').show();
                    }
                }
            })
        }

        function getPhonePrefix() {
            var country  = $("#country-select").val();
            
            for(var i=0; i<window.countries.length; i++) {
                if(window.countries[i].countryCode == country) {
                    return window.countries[i].phonePrefix;
                }
            }

            return '';
        }

        function getOrderParams(pay_type, is_chain_payment, cancel_check_scroll = false) {
            
            var product = getSelectProduct();

            var shipping_fee = product.shipping_fee;
            
            var product_info = {
                product_name  : product.name,
                product_price : product.new_price,
                product_sku  : '',
                product_id  : '<?php echo $product->id;?>',
                sku_id  : '',
                currency : '{{ core()->getCurrentCurrencyCode() }}',
                shipping_fee : shipping_fee,
                amount : product.amount,
                product_image : '{{ $productBaseImage['small_image_url'] }}'
            };

            var total = product_info.product_price*1 + product_info.shipping_fee* 1;

            var phone_number = $(".phone_number").val();
            var phone_prefix = getPhonePrefix();


            
            var products = getSubmitProducts(product_info.product_price,product_info.amount);

            //console.log("order products");
            //console.log(products);

            var product_price = product_info.product_price;

            console.log("order product_price");
            console.log(product_price);
            
            var params = {
                first_name          : $(".first_name").val(),
                second_name         : $(".last_name").val(),
                email               : $(".email").val(),
                phone_full          : phone_number ? (phone_number.indexOf(phone_prefix) == 0 ? phone_number : (phone_prefix+phone_number)) : '',
                country             : $("#country-select").val(),
                city                : $(".city").val(),
                province            : $("#state-select").val(),
                address             : $(".address").val() ? $(".address").val() : '',
                code                : $(".zip_code").val(),
                product_delivery    : product_info.shipping_fee,
                currency            : product_info.currency,
                product_price       : product_price,
                total               : total.toFixed(2),
                amount              : product_info.amount,
                payment_return_url  : window.location.protocol + '//' + window.location.host + '/template-common/en/thankyou1/?' + GetRequest(),
                payment_cancel_url  : window.location.href,
                phone_prefix        : phone_prefix,//todo
                payment_method      : pay_type,
                products            : products,
                logo_image          : '',
                brand               : 'Hatmeo',
                description         : product_info.product_name,
                shopify_store_name  : '',
                produt_amount_base  : '1',
                domain_name         : document.domain || window.location.host,
                price_template      : '{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}price',
                omnisend            : '',
                payment_account     : 'viusd',
            }
            console.log(params);

            if(getQueryString('utm_campaign')) {
                params['utm_campaign'] = getQueryString('utm_campaign');
            }
            if(getQueryString('smb_material_number')) {
                var smb_material_number = getQueryString('smb_material_number')
                params['smb_material_number'] = smb_material_number.split(',');
            }

            if(getQueryString('_ef_transaction_id')) {
                params['ef_transaction_id'] = getQueryString('_ef_transaction_id');
            }

            var paypal_pay_type_arr = ['paypal', 'paypal_card'];
            if(paypal_pay_type_arr.indexOf(pay_type) > -1) {
                params['payment_account'] = 'miaodian';
            }

            params['error'] = checkoutProducts(params);

            
            var checkout_function = {
                paypal : function(){return false},
                checkout : checkOrderParams,
                stripe : checkOrderParams,
                payoneer : checkOrderParams,
                paypal_card : checkOrderParams,
                wintopay : checkOrderParams,
                pacypay: checkOrderParams,
            }
            if(!params['error']) {
                params['error'] = checkout_function[pay_type] ? checkout_function[pay_type](params, is_chain_payment, cancel_check_scroll) : checkOrderParams(params, is_chain_payment, cancel_check_scroll);
            } else {
                var checkout_err = checkout_function[pay_type] ? checkout_function[pay_type](params, is_chain_payment, cancel_check_scroll) : checkOrderParams(params, is_chain_payment, cancel_check_scroll);
                if(checkout_err) {
                    params['error'] = params['error'].concat(checkout_err);
                }
            }

            if(!params['error']) {
                params['error'] = checkoutAmount(params);
            } else {
                var amount_err = checkoutAmount(params);
                if(amount_err) {
                    params['error'] = params['error'].concat(amount_err);
                }
            }

            return params;
        }

        function checkoutProducts(params) {
            console.log(params);
            return false;
            var products = params.products;
            for(var i=0; i<products.length; i++) {
                if(!products[i].product_sku) {
                    return ["Attribute cannot be empty, please select your product"]
                }
            }

            try{
                if(isProductSoldOut && isProductSoldOut()) {
                    return ["Sorry, the Attributes you selected is sold out, please select again"]
                }
            } catch (err) {

            }
            
            return false;
        }

        function checkoutAmount(params) {
            let product_amount = 0;
            for (let i = 0; i < params.products.length; i++) {
                let product = params.products[i];
                product_amount += product.amount*1;
            }

            var params_amount = params.amount;
            
            if(params_amount != product_amount) {
                return ["The actual quantity of the product does not match the selected quantity, please re-select the quantity and attributes of the product."];
            }

            return false;
        }

        function clearError() {
            $('.shipping-info-item input, .shipping-info-item select').each(function() {
                $(this).removeClass('shipping-info-input-error');
                $(this).parent().find('.shipping-info-error').hide();
            })
        }

        function checkoutName(input) {
            var name = $(input).val();
            name = name.replace(/\，|\,|\—|\-|\.|\。|[0-9]/g, '');
            $(input).val(name);
        }

        function checkoutCity(input) {
            var city = $(input).val();
            city = city.replace(/\，|\,|\—|\-|\.|\。|[0-9]/g, '');
            $(input).val(city);
        }

        function checkOrderParams(params, is_chain_payment, cancel_check_scroll) {
            clearError();
            var has_error = false;
            var error_log = [],show_error=[];
            if(!params.first_name){
                has_error = true;
                showError('first_name-error', "This field is required.");
                error_log.push('first_name is empty');
            }
            if(!params.second_name){
                has_error = true;
                showError('last_name-error', "This field is required.");
                error_log.push('second_name is empty');
            }
            if(!params.email){
                has_error = true;
                showError('email-error',  "This field is required.");
                error_log.push('email is empty');
            }

            var email_format = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/
            if(!email_format.test(params.email)) {
                has_error = true;
                showError('email-error', "Please enter a valid email address.");
                error_log.push('email is Invaild');
            }

            if(!params.phone_full){
                has_error = true;
                showError('phone_number-error',  "This field is required.");
                error_log.push('phone_full is empty');
            }

            // var phone_format = /^[0-9\+\-\(\)\s]+$/;
            // if(!phone_format.test(params.phone_full)){
            //     has_error = true;
            //     showError('phone_number-error',  "Please enter valid phoneNumber");
            //     error_log.push('phone_full is Invaild');
            // }

            if(!params.country){
                has_error = true;
                showError('country-error',  "This field is required.");
                error_log.push('country is empty');
            }
            if(!params.city){
                has_error = true;
                showError('city-error',  "This field is required.");
                error_log.push('city is empty');
            }
            if(window.states) {
                if(!params.province){
                    has_error = true;
                    showError('state-error',  "This field is required.");
                    error_log.push('province is empty');
                }
            }
            if(!params.address){
                has_error = true;
                showError('address-error',  "This field is required.");
                error_log.push('address is empty');
            }
            if(!params.code){
                has_error = true;
                showError('zip_code-error',  "This field is required.");
                error_log.push('code is empty');
            }

            var code_format = new RegExp(getCountriesField('codeFormat'));
            if(code_format && !code_format.test(params.code)) {
                has_error = true;
                showError('zip_code-error',  "Please enter valid zip/postcode ");
                error_log.push('code is invaild');
            }

            if(has_error) {
                show_error.push("Your Info is invaild");
                if(!cancel_check_scroll) {
                    document.querySelector(".shipping-tip").scrollIntoView({
                        behavior: "smooth"
                    })
                }
            }

            if((params.payment_method == 'checkout' && !Frames.isCardValid()) || (params.payment_method == 'stripe' && !(window.card_number_vaild && window.card_expriy_vaild && window.card_cvc_vaild)) || (params.payment_method == 'wintopay' && !cc_form_obj.isValid())) {
                has_error = true;
                error_log.push('card is invaild');
                show_error.push("Your Card Info is invaild");
                $('#checkout-card-error').show();
                document.querySelector(".checkout-content").style.display = "block";
                if(!cancel_check_scroll) {
                    document.querySelector(".checkout-block").scrollIntoView({
                        behavior: "smooth"
                    })
                }
            }

            if(has_error) {
                error_log.push({params:params});
                //fetchCheckoutError(error_log);
            }

            return has_error && show_error
        }

        function showError(id, error_log) {
            $('#'+id).html(error_log);
            $('#'+id).show();
            $('#'+id).parent().find('input').addClass("shipping-info-input-error");
        }

        function getSubmitProducts(total, amount) {
            var unit_price = (total / amount).toFixed(4);

            var skus = [];
            var attribute_item = $('.attribute-select .attribute-item');
            var sku_maps = getSKuMaps();

            // console.log("sku maps");
            // console.log(sku_maps);

            // console.log("attribute_item");
            // console.log(attribute_item);
            // console.log("attribute_item");

            for(var i=0; i< attribute_item.length; i++) {
                var sku_key_arr = [];
                var img_key = '';
                var attribute_select = $(attribute_item[i]).find('.attribute_select');
                for(var j=0; j<attribute_select.length; j++) {
                    sku_key_arr.push($(attribute_select[j]).val());
                    if($(attribute_select[j]).data('has-img')) {
                        img_key = $(attribute_select[j]).val();
                    }
                }

                var sku = {};
                if(sku_maps[sku_key_arr.join('_')]) {
                    sku = JSON.parse(JSON.stringify(sku_maps[sku_key_arr.join('_')]));
                }
                sku['img'] = getAttributeImg(img_key);
                skus.push(sku);
            }

            console.log("product skus");
            console.log(skus);

            var products = [], product_sku_map = {};

            for(var m=0; m<skus.length; m++) {
                console.log("skus length" + skus.length);
                if(product_sku_map[skus[m].sku_id]) {
                    products[product_sku_map[skus[m].sku_id] - 1].amount++;
                } else {
                    if(skus[m].sku_id==""||skus[m].sku_id==null||skus[m].sku_id==undefined) {
                        alert("please select product color and size");
                        return false;
                    }
                    var sku = {
                        img         : skus[m].img,
                        price       : unit_price,
                        amount      : 1,
                        description : skus[m].name,
                        product_id  : '<?php echo $product->id;?>',
                        product_sku : skus[m].sku_code,
                        variant_id  : skus[m].sku_id,
                        attr_id     : skus[m].attr_id
                    };
                    products.push(sku);
                    product_sku_map[skus[m].sku_id] = products.length;
                }
            }

            return products
        }

        function getSKuMaps() {
            if(window.sku_maps) {
                return window.sku_maps
            }


            var skus = <?php echo json_encode($skus);?>
            
            var sku_maps = {};
            
            for(var i=0; i<skus.length; i++) {
                sku_maps[skus[i].key] = JSON.parse(JSON.stringify(skus[i]));
                // console.log("sku map");
                // console.log(JSON.parse(JSON.stringify(skus[i])));
            }

            window.sku_maps = sku_maps;
            return window.sku_maps;
        }

        function getAttributeImg(attribute) {
            var product_attributes = <?php echo json_encode($product_attributes);?>;
            var show_img_attribute_id =  '23';
            var product_img = "{{ $productBaseImage['small_image_url'] }}";

            for (var i = 0; i < product_attributes.length; i++) {
                var product_attribute = product_attributes[i];
                if(product_attribute.id = show_img_attribute_id) {
                    for (var j = 0; j < product_attribute.options.length; j++) {
                        var option = product_attribute.options[j];
                        console.log(option);
                        if(option.name == attribute) {
                            return option.image || product_img;
                        }
                    }
                }
            }

            return product_img;
        }

        function turnByCreatA(link, order_id) {
            var a = document.createElement("a");
            a.href = link;
            document.body.appendChild(a);
            a.click();
            a.remove();
        }

        function Goto(url, no_request) {
            var order_id = localStorage ? localStorage.getItem('order_id') : null;
            try {
                var userAgent = navigator && navigator.userAgent;
                var link = url;
                if(!no_request) {
                    link += "&" + GetRequest();
                }

                window.top.location.assign(link);
                returnValueClear(order_id);

                window.turn_inter = setTimeout(function() {
                    window.top.location.href = link;
                    returnValueClear(order_id);
                }, 1000)

                window.no_href_turn_inter = setTimeout(function() {
                    window.top.location = link;
                    returnValueClear(order_id);
                }, 2000)

                window.a_turn_inter = setTimeout(function() {
                    turnByCreatA(link, order_id);
                    returnValueClear(order_id);
                }, 3000)

                window.no_top_turn_inter = setTimeout(function() {
                    window.location.href = link;
                    returnValueClear(order_id);
                }, 4000)
            } catch (error) {
                window.top.location.href = url + "&" + GetRequest();
            }
            
        }

        function returnValueClear(order_id) {
            if(window.event && window.event.returnValue) {
                window.event.returnValue = false;
            }
        }

        function getCountriesField(field) {
            var country  = $("#country-select").val();
            
            for(var i=0; i<window.countries.length; i++) {
                if(window.countries[i].countryCode == country) {
                    return window.countries[i][field];
                }
            }

            return '';
        }

        window.onpageshow = function () {
            clearTimeout(window.turn_inter);
            clearTimeout(window.no_href_turn_inter);
            clearTimeout(window.a_turn_inter);
            clearTimeout(window.no_top_turn_inter);
        }
    </script>
<script>
        function sendInitiateCheckoutEvent() {
            //sendInitcheckout2Everflow();
            // sendFbInitiateCheckoutEvent();
        }


        function getCookie(name) {
            var strCookie=document.cookie;

            var arrCookie=strCookie.split(";");

            for(var i=0;i<arrCookie.length;i++){

                var c=arrCookie[i].trim().split("=");

                if(c[0]==name){

                    return c[1];

                }

            }

            return "";
        }
    </script>
<script>
        $(".click_scroll").click(function(e) {
            var t = $("#wrapper"),
                r = $(this).attr("href"),
                n = $(this).attr("target"),
                o = $(this).attr("anchor");
            if (r && r.match(/({\[(\s|\S)*?\]})/g) && e.preventDefault(), !t.length) {
                if (o && "#" === o[0] || "." === o[0]) {
                    var l = $(o);
                    if (l.length) {
                        var u = l.offset().top;
                        $("body, html").animate({
                            scrollTop: u + "px"
                        }, 800)
                    } else window.location.replace("" + r + o);
                    e.preventDefault()
                }
            }
        })
    </script>
<script>
    var ele_arr = [document.querySelector('.main-container-progress-box'), document.querySelector('.payment-block'), document.querySelector('.shipping-block'), document.querySelector('.summary-block')]
    window.addEventListener('scroll', function(e) {
        ele_arr.forEach(function(item, index) {
            var elm_font = document.querySelector('.state-'+(index+1)+' .main-container-progress-state-content-step-title')
            var elm_line = document.querySelector('.state-'+(index+1)+' .main-container-progress-state-line')
            var elm_img = document.querySelector('.state-'+(index+1)+' .main-container-progress-state-content-circle-a img')
            if(item) {
                if (item.getBoundingClientRect().top - window.innerHeight <= 0) {
                    elm_line && elm_line.classList.add('active')
                    elm_img && (elm_img.style.opacity = '0')
                    elm_font.classList.add("black")
                } else {
                    elm_line && elm_line.classList.remove('active')
                    elm_img && (elm_img.style.opacity = '1')
                    elm_font.classList.remove("black")
                }
            }
        })
    });
</script>
<script>
        function loadJS( url, callback ){
            var script = document.createElement('script'),
                fn = callback || function(){};

            script.type = 'text/javascript';

            //IE
            if(script.readyState){
                script.onreadystatechange = function(){
                    if( script.readyState == 'loaded' || script.readyState == 'complete' ){
                        script.onreadystatechange = null;
                        fn();
                    }
                };
            }else{
                //其他浏览器
                script.onload = function(){
                    fn();
                };
            }

            script.src = url;
            document.getElementsByTagName('head')[0].appendChild(script);
        }
    </script>
<script>
        function payAfterSubmit() {
            $('#pay-after-submit-error').hide();
            $('#loading').show();
                    }
    </script>
    <script>(function(){"use strict";function n(n,e){var r;void 0===e&&(e="uclick");var c=null===(r=n.match(/\?.+?$/))||void 0===r?void 0:r[0];return c?Array.from(c.matchAll(new RegExp("[?&](clickid|"+e+")=([^=&]*)","g"))).map((function(n){return{name:n[1],value:n[2]}})):[]}function e(n){var e=n();return 0===e.length?{}:e.reduce((function(n,e){var r;return Object.assign(n,((r={})[e.name]=""+e.value,r))}),{})}function r(r){void 0===r&&(r="uclick");var c,t,u=e((function(){return(function(n){return void 0===n&&(n="uclick"),Array.from(document.cookie.matchAll(new RegExp("(?:^|; )(clickid|"+n+")=([^;]*)","g"))).map((function(n){return{name:n[1],value:n[2]}}))})(r)})),i=e((function(){return n(document.referrer,r)})),o=e((function(){return n(document.location.search,r)}));return(c=[r,"clickid"],t=[u,i,o],c.reduce((function(n,e){return n.concat(t.map((function(n){return[e,n]})))}),[])).map((function(n){return{name:n[0],value:n[1][n[0]]}})).find((function(n){return n.value}))||null}var c,t,u,i;(i=document.createElement("img")).src=(t=""+"https://track.heomai2021.com/"+"click"+".php?payout=OPTIONAL",(u=r(c="uclick"))?t+"&cnv_id="+(u.name===c?"OPTIONAL":u.value)+(u.name===c?"&"+c+"="+u.value:""):t+"&cnv_id=OPTIONAL"),i.referrerPolicy="no-referrer-when-downgrade"})();</script>
    <script>
            Airwallex.init({
            env: '<?php echo $app_env;?>', // Setup which Airwallex env('staging' | 'demo' | 'prod') to integrate with
            origin: window.location.origin, // Setup your event target to receive the browser events message
            });

            const cardNumber = Airwallex.createElement('cardNumber',{
                allowedCardNetworks:['visa','maestro','mastercard','amex','unionpay','jcb']
            });
            const cardExpiry = Airwallex.createElement('expiry');
            const cardCvc = Airwallex.createElement('cvc');

            const domcardNumber = cardNumber.mount('cardNumber'); // This 'cardNumber' id MUST MATCH the id on your cardNumber 
            const domcardExpiry = cardExpiry.mount('cardExpiry'); // Same as above
            const domcardCvv = cardCvc.mount('cardCvc'); // Same as above


            // STEP #7: Add an event listener to ensure the element is mounted
            domcardNumber.addEventListener('onReady', (event) => {
                /*
                ... Handle event
                */
                //window.alert(event.detail);
                console.log(event.detail);
            });

            // STEP #8: Add an event listener to listen to the changes in each of the input fields
            domcardNumber.addEventListener('onChange', (event) => {
                /*
                ... Handle event
                */
                //window.alert(event.detail);
                console.log(event.detail)
                //console.log(JSON.stringify(event));
                console.log(event.detail.complete)
                if(event.detail.complete==true) {
                    $("#id_card").val(event.detail.complete);
                    $("#cardNumber").removeClass("shipping-info-input-error");
                }
                if(event.detail.complete==false) {
                    $("#id_card").val(event.detail.complete);
                    $("#cardNumber").addClass("shipping-info-input-error");
                }
                
            });

            domcardExpiry.addEventListener('onChange', (event) => {
                /*
                ... Handle event
                */
                //window.alert(event.detail);
                console.log(event.detail)
                //console.log(JSON.stringify(event));
                console.log(event.detail.complete)
                $("#id_expiry").val(event.detail.complete);

                if(event.detail.complete==true) {
                    $("#id_expiry").val(event.detail.complete);
                    $("#cardExpiry").removeClass("shipping-info-input-error");
                }

                if(event.detail.complete==false) {
                    $("#id_expiry").val(event.detail.complete);
                    $("#cardExpiry").removeClass("shipping-info-input-error");
                }
            });

            //id_cvc
            domcardCvv.addEventListener('onChange', (event) => {
                /*
                ... Handle event
                */
                //window.alert(event.detail);
                console.log(event.detail)
                //console.log(JSON.stringify(event));
                console.log(event.detail.complete)
                //$("#id_cvc").val(event.detail.complete);

                if(event.detail.complete==true) {
                    $("#id_cvc").val(event.detail.complete);
                    $("#cardCvc").removeClass("shipping-info-input-error");
                }

                if(event.detail.complete==false) {
                    $("#id_cvc").val(event.detail.complete);
                    $("#cardCvc").removeClass("shipping-info-input-error");
                }
            });

    </script>
   
   <script>
    $(document).ready(function(){

        //$("#collapseOne").show();
        $("#collapseThree").show();
        //$("#headingOne1").addClass("action");
        $("#headingThree2").addClass("action");
        $("#payment-button").addClass("airwallex-pay");

        $("#payment_method_airwallex").on("click", function(){
            console.log("click headingOne ");
            $("#collapseOne").show();
            $("#collapseTwo").hide();
            $("#collapseThree").hide();

            $("#headingOne1").addClass("action");
            $("#headingThree2").removeClass("action");
            $("#headingOne2").removeClass("action");

        });

        $("#payal_standard").on("click", function(){
            $("#collapseOne").hide();
            $("#collapseTwo").show();
            $("#collapseThree").hide();

            $("#headingOne2").addClass("action");
            $("#headingOne1").removeClass("action");
            $("#headingThree2").removeClass("action");

        });

        $("#airwallex-klarna").on("click", function(){
            $("#collapseOne").hide();
            $("#collapseTwo").hide();
            $("#collapseThree").show();

            $("#headingThree2").addClass("action");
            $("#headingOne1").removeClass("action");
            $("#headingOne2").removeClass("action");
        })

        $("#payment-button").on("click", function(){
            var payment_method = $('input[name=payment_method]:checked', '#myForm').val();
            console.log("payment method" + payment_method);
            if(payment_method=="airwallex") {
                var id_card = $("#id_card").val();
                var id_expiry = $("#id_expiry").val();
                var id_cvc = $("#id_cvc").val();
                console.log(id_card);
                console.log(id_expiry);
                console.log(id_cvc);
                if(id_card!="true" && id_expiry!="true" && id_cvc!="true") {
                    
                    if(id_card!="true") $("#cardExpiry").addClass("shipping-info-input-error");
                    if(id_expiry!="true") $("#cardNumber").addClass("shipping-info-input-error");
                    if(id_cvc!="true") $("#cardCvc").addClass("shipping-info-input-error");
                    return false;
                }
                console.log("airwallex-pay");
                gtag('event', 'initiate_airwallex_checkout', {
                    'event_label': 'Initiate airwallex Checkout',
                    'event_category': 'ecommerce'
                });
            }
            if(payment_method=="paypal_standard") {
                gtag('event', 'initiate_paypal_standard_checkout', {
                    'event_label': 'Initiate paypal_standard Checkout',
                    'event_category': 'ecommerce'
                });
                //fbq('track', 'InitiateCheckout');

                window.pay_type = "paypal_standard";
                window.is_paypal_standard = true;
                console.log("paypal standard payment "+window.pay_type);
                console.log("paypal standard payment "+window.is_paypal_standard);
            }
            if(payment_method=='airwallex-klarna') {
                gtag('event', 'initiate_airwallex_klarna_checkout', {
                    'event_label': 'Initiate airwallex_klarna Checkout',
                    'event_category': 'ecommerce'
                });
                window.pay_tpe = "airwallex_klarna";
                window.is_airwallex_klarna = true;

            }

            checkout();
        })
    });

</script>
    

</body>
</html>