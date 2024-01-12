@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $productBaseImage = product_image()->getProductBaseImage($product);
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}">
    <head>
        <title>{{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url()->to('/') }}">
        <meta name="currency-code" content="{{ core()->getCurrentCurrencyCode() }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
        <link rel="alternate icon" class="js-site-favicon" type="image/png" href="/favicon.png">
        <link rel="icon" class="js-site-favicon" type="image/svg+xml" href="/favicon.svg">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' />
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script>
    function sendInitcheckout2Everflow() {
        function getQueryString(name) {
            var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
            var r = window.location.search.substr(1).match(reg);

            if (r != null) {
            return unescape(r[2]);
            }
            return null;
        }

        var params = {
            ef_transaction_id : getQueryString('_ef_transaction_id')
        }

        /*
        fetch('https://shoes.Hatmeo.com/common/send/everflow/init_checkout',{
            body: JSON.stringify(params),
            method: 'POST',
            headers: {
                'content-type': 'application/json'
            },
        })
        */
    }

    function sendEvent2Everflow(event_name) {
        function getQueryString(name) {
            var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
            var r = window.location.search.substr(1).match(reg);

            if (r != null) {
            return unescape(r[2]);
            }
            return null;
        }

        if(getQueryString('_ef_transaction_id')) {
            var params = {
                ef_transaction_id : getQueryString('_ef_transaction_id'),
                event_name: event_name
            }
    
            fetch('/common/send/everflow/event',{
                body: JSON.stringify(params),
                method: 'POST',
                headers: {
                    'content-type': 'application/json'
                },
            })
        }
    }

    sendEvent2Everflow('add_to_cart');
</script>
<script src="https://lander.heomai.com/template-common/js/frames-init.js"></script>
<script src="https://lander.heomai.com/template-common/js/paypal-init.js"></script>

<script src="https://checkout.airwallex.com/assets/elements.bundle.min.js"></script>
<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout1/css/font-awesome.min.css">

<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout6/css/order.css?v=11">
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
<script>
        window.addEventListener('error', function(e) {
            var error_params = {}

            if(!(e.target instanceof HTMLScriptElement || e.target instanceof HTMLLinkElement || e.target instanceof HTMLImageElement)) {
                error_params = {
                    error_message  : e.message,
                    error_filename : e.filename,
                    error_lineno   : e.lineno,
                    error_colno    : e.colno,
                }
            } else {
                error_params = {
                    error_message: '加载失败',
                    error_filename: e.target.src || e.target.href
                }
            }

            fetchError(error_params);
        }, true)

        window.addEventListener('unhandledrejection', function(event) { 
            fetchError({message:event.reason})
        });

        function fetchError(params) {
            params['page'] = 'checkout-4766';
            // fetch('/order/page/error',{
            //     body: JSON.stringify(params),
            //     method: 'POST',
            //     headers: {
            //         'content-type': 'application/json'
            //     },
            // })
        }

        function fetchCheckoutError(params) {
            params.push({page:'checkout1-4766'})
            // fetch('/checkout/purchase/error',{
            //     body: JSON.stringify(params),
            //     method: 'POST',
            //     headers: {
            //         'content-type': 'application/json'
            //     },
            // })
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

<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "kdssdtdq6l");
</script>
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
Select Quantity </div>
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
Payment </div>
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
Shipping Information </div>
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
Place Order </div>
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
Secure Checkout </div>
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
            RECOMMENDED DEAL </div>
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
        Express Checkout </div>
    </div>
    <div class="paypal-wrapper" style="display:block;text-align:-webkit-center;padding: 0;margin-top: 20px;margin: 0;margin-top: 20px;">
        <div id="paypal-error" style="color:#e51f28;display:none"></div>
        <div class="paypal-card-submit" id="paypal-card-submit"></div>
    </div>
</div>
</div>
<div class="shipping-and-payment-wrapper">
<div class="shipping-and-payment">
<div class="payment-block">
<div class="payment-title">
Or Pay With Credit Card </div>


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
Credit Card Information: </div>
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
Your Card Info is invaild </div>
</form>
</div>
</div>
<div class="split-line-safe shipping_information_block">
<div class="split-line-safe-content">
GUARANTEED <span style="color: #00d2be;">
SAFE </span>
CHECKOUT </div>
</div>
<img class="payment-img" src="https://lander.heomai.com/template-common/checkout1/images/gsc-en.png?v=111" />
</div>
<div class="shipping-block">
<div class="shipping-title">
Shipping </div>
<div class="shipping-tip">
Enter your contact information:
</div>
<div class="shipping-info-form">
<form>
<div class="shipping-info-item">
<input name="email" type="email" class="shipping-info-input email" />
<label id="email-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
Email </label>
</div>
<div class="shipping-info-item">
<input name="first_name" class="shipping-info-input first_name" oninput="checkoutName(this)" />
<label id="first_name-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
First Name </label>
</div>
<div class="shipping-info-item">
<input name="last_name" class="shipping-info-input last_name" oninput="checkoutName(this)" />
<label id="last_name-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
Last Name </label>
</div>
<div class="shipping-info-item">
<input name="phone_number" type="tel" class="shipping-info-input phone_number" />
<label id="phone_number-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
Phone Number </label>
</div>
<div class="shipping-info-item">
<input name="address" class="shipping-info-input address" placeholder />
<label id="address-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
Street Address </label>
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
City </label>
</div>
<div class="shipping-info-item">
<select class="shipping-info-select" name="country" id="country-select"></select>
<label id="country-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
Country </label>
</div>
<div class="shipping-info-flex place_order_block">
<div class="shipping-info-item shipping-info-flex-half">
<select class="shipping-info-select" name="state" id="state-select"></select>
<label id="state-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
State/Province </label>
</div>
<div class="shipping-info-item shipping-info-flex-half">
<input name="zip_code" class="shipping-info-input zip_code" />
<label id="zip_code-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
Zip/Postal Code </label>
</div>
</div>
</form>
</div>
<div class="summary-block">
<div class="summary-block-sticky">
<div class="summary-wrapper">
<div class="summary-title">
Order Summary </div>
<div class="summary-content">
<ul class="summary-list">
<li class="summary-list-item">
<div class="product-name_block">
<span class="product-name js-product-name"></span>
<div class="edit-block">
<a class="click_scroll" anchor=".main-container">
EDIT </a>
</div>
</div>
<div class="qty-price">
<div class="qty">
QTY:
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
Subtotal:
</span>
<span class="summary-total-item-price js-old-price"></span>
</div>
<div class="summary-total-item">
<span class="summary-total-item-name">
Discount:
</span>
<span class="summary-total-item-price js-discount-price red"></span>
</div>
<div class="summary-total-item">
<span class="summary-total-item-name">
Shipping:
</span>
<span class="summary-total-item-price js-shipping-price"></span>
</div>
<div class="summary-total-item summary-total-item-shipping-insurance" style="display:none">
<span class="summary-total-item-name">
Shipping Insurance:
</span>
<span class="summary-total-item-price js-shipping-insurance-fee"></span>
</div>
<div class="summary-total-item coupon-price-item" style="display:none">
<span class="summary-total-item-name">
Coupon:
</span>
<span class="summary-total-item-price js-coupon-price red"></span>
</div>
<div class="summary-total-item">
<span class="summary-total-item-name">
Total:
</span>
<span class="summary-total-item-price js-total"></span>
</div>
</div>
</div>
<div class="summary-footer">
<div class="agree-block">
<input type="checkbox" checked>
I agree with the <a href="#" data-toggle="modal" data-target="#PrivacyPolicyModalCenter">
Term of service </a>
& <a href="#" data-toggle="modal" data-target="#RefundpolicyModalCenter">
Refund policy </a>
& <a href="#"  data-toggle="modal" data-target="#PrivacyPolicyModalCenter">
Privacy Policy </a>
. </div>
<div class="guarantee-block">
<img class="guarantee-img" src="https://lander.heomai.com/template-common/checkout1/images/warranty-30days.png" />
<div class="guarantee-font">
<div class="price-tip">
All pricing is in <strong>
United States Dollars </strong>
. </div>
<div class="guarantee-tip">
<strong>
30 DAY GUARANTEE:
</strong>
Hatmeo offers a 30 day guarantee on all unused purchases. Simply send the item(s) back to us in the original packaging for a full refund or replacement, less S&H. </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="submit-block" style="padding-bottom: 5px;">
    <div class="submit-content">
        <div id="checkout-error" style="color:#e51f28;display:none;"></div>
        <button class="submit-button" onclick="checkout()">COMPLETE SECURE PURCHASE </button>
    </div>
</div>
<div class="submit-block">
    <div class="submit-content">
        <div id="checkout-error" style="color:#e51f28;display:none;"></div>
        <div class="pay-width-paypal-standard">
            <img src="/checkout/v1/app/desktop/images/paypal_standard.png" />
        </div>
        <!-- <button class="submit-button" onclick="checkout()">Pay With Paypal Standard </button> -->
    </div>
</div>
<div id="airwallex-warpper"></div>
<div id="dropIn" style="padding-top:20px;"></div>
<p id="error"></p>
<div id="pay-after-warpper"></div>
<div class="summary-footer summary-footer-mb">
<div class="agree-block">
<input type="checkbox" checked>
I agree with the <a href="#" data-toggle="modal" data-target="#PrivacyPolicyModalCenter">
Term of service </a>
& <a href="#"  data-toggle="modal" data-target="#RefundpolicyModalCenter">
Refund policy </a>
& <a href="#"  data-toggle="modal" data-target="#PrivacyPolicyModalCenter">
Privacy Policy </a>
. </div>
<div class="price-tip tc">
All pricing is in <strong>
United States Dollars </strong>
. </div>
<div class="guarantee-block">
<img class="guarantee-img" src="https://lander.heomai.com/template-common/checkout1/images/warranty-30days.png" />
<div class="guarantee-font">
<div class="guarantee-tip">
<strong>
30 DAY GUARANTEE:
</strong>
Hatmeo offers a 30 day guarantee on all unused purchases. Simply send the item(s) back to us in the original packaging for a full refund or replacement, less S&H. </div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="https://lander.heomai.com/template-common/js/myFoldpanel.js"></script>
<div class="section_faq">
<script>
                    $(function() {
                        $('dl#my-foldpanel').foldpanel({
                            init:true,     	 //是否开启初始化功能,默认关闭
                            init_index: 0, // 传的数字代表初始化展开的索引，0就是第一个，仅在init:true下生效
                            time: 400, // panel展开动画时间, 默认为 100ms
                            dbclose: true // 在此点击关闭, 默认为 true
                        });
                    })
                </script>
<style>
                    .section_faq{
                        max-width: 970px;
                        margin: 0 auto;
                        padding: 0 15px;
                    }
                    
                    .dt_lists{
                        padding-left: 0;
                        padding-bottom: 15px;
                        background: #f5f5f5;
                        padding: 10px;
                        margin-top: 20px;
                    }
                    .dt_lists:hover{
                        cursor: pointer;
                    }
                    .dd_items{
                        border-bottom: 1px dashed #b0b0b0;
                        text-align:left;
                        display:none;
                        margin-left: 0;
                        line-height: 26px;
                        color: #191919;
                        padding: 10px 0 10px 15px;
                    }
                </style>
<div class="container">
<h2 style="visibility: visible; animation-name: slideInUp;text-align: center;"></h2>
<dl class="foldpanel" id="my-foldpanel" style="visibility: visible; animation-name: slideInUp;">
</dl>
</div>
</div>
</div>
<div class="footer-container">
<div class="copyright-block">
©2016- Hatmeo
</div>
<style>
    .phone-block {
        color: #000;
        font-size: 14px;
        font-family: Helvetica Bold;
        margin: 0 0 15px;
        text-align: center;
        padding: 5px 0;
    }
    .phone-block a {
        color: #a9a9a9;
        font-size: 14px;
    }
    .terms-block a{
        color: #FFF;
        font-weight:blod;
    }
</style>
<div class="phone-block">
    <!--Phone: <a href="tel:(833) 493-2323">(833) 493-2323</a> (9:00am-5:00pm EST, Monday to Friday). --> </div>
    <div class="terms-block">
            <a href="#" class="btn" data-toggle="modal" data-target="#shippingdeliverModalCenter" >
        Shipping & Delivery </a>
            <a href="#" class="btn" data-toggle="modal" data-target="#RefundpolicyModalCenter">
        Refund policy </a>
            <a href="#" class="btn" data-toggle="modal" data-target="#TermofserviceModalCenter">
        About US </a>
            <a href="#" class="btn" data-toggle="modal" data-target="#PrivacyPolicyModalCenter">
        Privacy Policy </a>
            <a href="#" class="btn" data-toggle="modal" data-target="#contactusModalCenter" >
        Contact Us </a>
    </div>
    <div class="dmca_logo">
        <a href="https://www.dmca.com/Protection/Status.aspx" target="_blank">
            <img src="https://lander.heomai.com/template-common/checkout1/images/dmca-grey.png" />
        </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="shippingdeliverModalCenter" tabindex="-1" role="dialog" aria-labelledby="shippingdeliverModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shippingdeliverModalCenterTitle">Shipping info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

      Here are our shipping service options. Please note that delivery times are given as an indication and may be subject to delays in special circumstances.

      <p>Standard delivery:</p>

      Cost: $9.99  Delivery time: 5-10 days Free delivery . Once your order has been shipped, you will immediately receive a shipping notification via email. We thank you for your patience. 


<p>Fast delivery times and methods</p>

We want your order to be delivered as quickly as possible. Therefore, almost all orders ship within 1 business day. There are some countries where we cannot deliver at the moment. As long as your country appears in the list of countries when you enter your shipping address, we can deliver to you! Due to international customs regulations, we cannot offer a free exchange service for international orders. Return or exchange costs are the responsibility of the recipient. Customs fees and import duties are the responsibility of the recipient and vary depending on the country and the order. We ask that you understand that customs duties and taxes are not refundable. We ship to almost every country in the world and use the services of a large, trusted international carrier to ensure your packages arrive quickly and safely at their destination.

After successfully placing your order, you will receive an email confirmation from us. If you have any special requests regarding your order, please let us know as soon as possible before your items are being processed.

Note: For orders containing multiple items, processing time will depend on the longest processing time among the items. We perform strict quality control on your items and ensure they are properly packaged before shipping. We are happy to inform you that most orders are now shipped within 24 hours. Please note that for some small orders it may still take 3-5 business days depending on stock. We ask you to believe in us - it's worth the wait. Please note that processing time does not include delivery time. If you experience any issues with your order, you can submit a ticket to our support center for further assistance. Our dedicated customer service team will contact you within 24 hours.


We work with major international shipping companies and offer different shipping options. During the ordering process, you will be able to select your preferred delivery method on the order information page. Note: During holiday periods, shipping times may be affected as manufacturers and delivery services limit operations during these times. Although this is unfortunately beyond our control, we will do our best to resolve this issue. If you have any other questions, feel free to send them to customer@hatmeo.com.

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="RefundpolicyModalCenter" tabindex="-1" role="dialog" aria-labelledby="RefundpolicyModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="RefundpolicyModalCenterTitle">Refund policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <p>Eligible returns of products purchased on Hatmeo should be made by mail. Items must be returned in accordance with the requirements outlined below, within 30 days from the date of delivery to a specified address which our customer service will provide. Customers need to apply through (customer@hatmeo.com) and get consent by our customer serivice. We will NOT provide any return label, and customers need to send the tracking number to our customer service by email. If customers return products to an address without our permission, we have rights to refuse the returns or refund. 
            </p>
            <p>Please return merchandise in its original box if possible and include the provided return slip with returns instructions.</p>

            <p>Exchange: Customers should bear the return shipping fees and $9.99 resend shipping fee themselves; we will re-send products to customers once we receive the products. Returned merchandise must meet the below requirements in order to be accepted for a refund.
            </p>
            <p>Returns: The address on the package is only the address of the last processing center, not the return address. To get the return address, please contact our customer service via customer@hatmeo.com.
            </p>
            <p>Customers should bear the return shipping fees themselves; we will refund(deduct the $9.99 shipping fee we paid when shipping the goods include free-shipping products) to customers once we receive the products. Returned merchandise must meet the below requirements in order to be accepted for a refund.
            </p>
            <p>All items must be in original condition with original tags attached. Merchandise that has been worn, used, altered or damaged will not be accepted.</p>
            </p>
            <p>Once we receive the items and inspect them you will receive your refund. Allow up to 5 business days after receipt in our warehouse to process the refund. The refund will be applied to your original credit card or payment method. 
            </p>
            <p>（Please note that due to the hygiene and safety of other customers, we do not offer returns or exchanges on any panties sold on this site. If the product itself has quality problems, please contact our customer service. We will send you a new package or refund you.）
            </p>
            <p>Please note that refunds are not offered for merchandise returned after the 30-day period.</p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="TermofserviceModalCenter" tabindex="-1" role="dialog" aria-labelledby="TermofserviceModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TermofserviceModalCenterTitle">About US</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            

            <p>Hatmeo is a global online retail company that delivers products directly to consumers around the world. Founded in 2016, Hatmeo has offered customers a convenient way to shop for a wide selection of lifestyle products at attractive prices through different websites, which are available in multiple major languages.</p>
            <p>Hatmeo's mission:</p>
            <p> Hatmeo offers products in the categories of bras,shoes and other general merchandise.
            Hatmeo's innovative data-driven business model allows itself to offer products, at scale for optimal marketing, merchandising, and fulfillment.
            Hatmeo's unique strengths:
            Hatmeo is bringing the best merchandise partners, manufacturers and brands of all sizes to your doorstops because of our:
            Ability to Manufacture the best products
            Experience in managing complex logistical supply chains
            Consumer-to-Manufacturing </p>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="PrivacyPolicyModalCenter" tabindex="-1" role="dialog" aria-labelledby="PrivacyPolicyModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PrivacyPolicyModalCenterTitle">Privacy Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <p>Section 1 - How do we handle your data?</p>

            <p>When you make a purchase in our store, we collect the personal data that you provide, such as your name, address, and email address, as part of the buying and selling process.
            When you browse our store, we also automatically receive your computer's IP address to provide us with information about your browser and operating system.
            Email marketing (if applicable): With your permission, we may send you emails about our store, new products, and other updates.</p>

            <p>Section 2 - Consent</p>

            <p>How do you get my consent?
            If we ask for personal information for another reason, such as for marketing purposes, we will directly ask for your explicit consent, or we will give you the opportunity to refuse.</p>

            <p>How can I withdraw my consent?
            If you change your mind after subscribing, you can withdraw your consent by contacting us at any time at info@wmbra.de, and we will unsubscribe you from our mailing lists.

            <p>Section 3 - Disclosure
            We may disclose your personal information if we are legally required to do so or if you violate our terms of use.</p>

            <p>Payment:</p>

            <p>If you choose a direct payment gateway to complete your purchase, Shopify will store your credit card data. They are encrypted according to the Payment Card Industry Data Security Standard (PCI-DSS). The data related to your purchase transaction is stored only for the duration necessary to complete your transaction. Once your transaction is completed, your transaction data will be deleted.</p>

            <p>All direct payment gateways adhere to the standards set by PCI-DSS, which is managed by the Payment Card Industry Security Standards Council, a joint effort of payment card brands such as Visa, MasterCard, American Express, and Discover.</p>

            <p>The PCI-DSS requirements help ensure the secure processing of payment information for our store and its service providers.</p>

            <p>Section 4 - Third-party services</p>

            <p>In general, the third-party providers we use will only collect, use, and disclose your information to the extent necessary to enable them to provide the services they provide to us.</p>

            <p>Certain third-party providers, such as payment gateways and other payment processors, have their own privacy policies regarding the information we are required to provide to them for your purchase-related transactions.</p>

            <p>We recommend that you carefully read their privacy policies to understand how they will handle your personal information.</p>

            <p>It is important to note that some providers may be located in a country different from where you are located or have facilities located in a different country than where you or we are. If you choose to engage in a transaction that involves the services of a third-party provider, then your information may be subject to the laws of the country or facility where that provider is located.</p>

            <p>For example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, the personal information you used to make that transaction may be disclosed under American legislation, including the Patriot Act.</p>

            <p>Once you leave our store's website or are redirected to a third-party website or application, you are no longer governed by this privacy policy or the terms of use of our website.</p>

            <p>Section 5 - Security</p>

            <p>To protect your personal information, we take reasonable precautions and follow industry best practices to ensure that it is not lost, misused, accessed, disclosed, altered, or destroyed inappropriately.</p>

            <p>If you provide us with your credit card information, it is encrypted using SSL (Secure Socket Layer) technology and stored with AES-256 encryption. While no method of transmitting data over the Internet or electronic storage is completely secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.</p>

            <p>Section 6 - Age Consent</p>

            <p>By using our site, you warrant that you are at least the age of majority in your country of residence, or that you have reached the age of majority in your country of residence and have given your consent for your minor children to use this site.</p>

            <p>Section 7 - Changes to this Privacy Policy</p>

            <p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make significant changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.</p>

            <p>If our store is acquired by another company or merges with another company, your information may be transferred to the new owners so that we can continue to sell products to you.</p>

            <p>Questions and contact information</p>

            <p>If you would like to access, correct, modify, or delete your personal information, file a complaint, or simply get more information, please contact our Data Protection Officer at customer@hatmeo.com.</p>

            <p> By using our site, you (the visitor) consent to the processing of your IP address by third parties to determine your location for currency conversion purposes. You also consent to this currency being stored in a session cookie in your browser (this temporary cookie will be automatically removed when you close your browser). We do this to maintain consistency while browsing our site and convert prices into your local currency (the visitor).</p>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>    

    <!-- Modal -->
<div class="modal fade" id="contactusModalCenter" tabindex="-1" role="dialog" aria-labelledby="contactusModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactusModalCenterTitle">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Our 24/7 customer service team ensures you have the best shopping experience!</p>
      <p>Email: customer@hatmeo.com </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</div>
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
JUST NOW </div>
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
COMPLETE SECURE PURCHASE </button>
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
            var price_template = '$price',
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

            var cur_country = 'US';
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
                product_template += ' <span style="text-decoration: underline;font-size: 14px;cursor:pointer;color:#0000ff;" onclick="showImgProp(&quot;'+product_attribute.tip_img+'&quot;)">'+product_attribute.tip+'</span>'
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
    console.log("attribute change")
    console.log(target);
    console.log(is_img_attribute);
    console.log(template);
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
        setAttributeTemplate('SELECT YOUR', '', '23', is_more_attribute ? true : false, 'common15', 'Sold out, please select another Attributes');
        showAttributeSelecet('Item');
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
        window.is_paypal_standard_pay = pay_type == 'paypal_standard' ? true : false;
        window.is_checkout_pay = pay_type == 'checkout' ? true : false;
        window.is_payoneer_pay = pay_type == 'payoneer' ? true : false;
        window.is_paypal_card_pay = pay_type == 'paypal_card' ? true : false;
        window.is_wintopay = pay_type == 'wintopay' ? true : false;
        window.is_pacypay = pay_type == 'pacypay' ? true : false;
        window.is_worldpay = pay_type == 'worldpay' ? true : false;
        window.is_airwallex = pay_type == 'airwallex' ? true : false;
        window.is_stripe_pay = pay_type == 'stripe' ? true : false;
        window.is_stripe_local = pay_type == 'stripe_local' ? true : false;

        var currency = 'USD';
        var paypal_pay_acc = "AQQSyBOPRLNaH1zE6JXa6QQ9QY04nfgF_J5SBZzILZXPM3Jkp7yaU0BOAgh43wFyuaUnpgeO5ZqywpgW";
        var paypal_pay_acc = "AdgqTmBT75iYoiq_dgPSCOoGYXDnlVuxRw5yOAH3BPNVLb4Ie9g8uhLR9LxsqX2NPFr8XzhngwtBO5qe";
        //var paypal_pay_acc = "AUJbEnrfr7UfGYTUT09supZXuAGrUMyw2y4BWeHBvWk_uyxZTWC5gzKk1hduPcTXZzOVZiyv19tj4udn";
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

                                        // check the address info
                        var email = $(".email").val();
                        if(email.length < 1) {
                            //alert("email is empty");
                            //return false;
                        }
                        


                        sendInitiateCheckoutEvent();
                        gtag('event', 'initiate_checkout', {
                            'event_label': 'Initiate paypal Checkout',
                            'event_category': 'ecommerce'
                        });
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
                                        Goto('/onebuy/checkout/success?id='+localStorage.getItem('order_id'));
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

                    if(window.is_checkout_pay) {
                getPublickKey();
        
                Frames.addEventHandler(Frames.Events.CARD_TOKENIZED, onCardTokenized);
                Frames.addEventHandler(Frames.Events.CARD_VALIDATION_CHANGED, onCardValidationChange);
            } else if (window.is_wintopay) {
                window.cc_form_is_valid = true;
                var cc_form_obj = vgsInit({validCallback: function() {
                    $('#checkout-card-error').hide();
                }});
                var cc_form = cc_form_obj.cc_form;
            } else {
                if(window.is_stripe_pay) {
                    if(typeof changeStripeAcc == 'function') {
                        changeStripeAcc('viusd')
                    }
                    stripeInit();
                }
            }
        
        function onCardValidationChange() {
            if(Frames.isCardValid()) {
                $('#checkout-card-error').hide();
            }
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

        function initPayoneerPaymentPage(listId) {
            document.querySelector('.payoneer-card-container').innerHTML = '<div id="payoneerPaymentNetworks" class="payment-networks-container"></div>';

            checkoutList('payoneerPaymentNetworks', {
                payButton: 'payoneerSubmitBtn',
                payButtonContainer: 'payoneerSubmitBtnContainer',
                baseUrl: 'https://api.live.oscato.com/pci/v1/',
                // baseUrl: 'https://api.sandbox.oscato.com/pci/v1/',
                listId: listId,
                // listUrl: listURL,
                widgetCssUrl: 'https://boutiquesgift.com/css/widget.min.css',
                proceedFunction: function(res) {
                    console.log("payoneer response:");
                    console.log(res);
                    switch (res.interaction.code) {
                        case 'PROCEED':
                            // 当交互代码是'PROCEED'时，代码在此处
                            // 支付成功
                            Goto('/onebuy/checkout/success?id='+localStorage.getItem('order_id'));
                            break;
                
                        case 'ABORT':
                            // 当交互代码是'ABORT'时，代码在此处                
                        case 'TRY_OTHER_ACCOUNT':
                        case 'RETRY':
                            // 当交互代码是'TRY_OTHER_ACCOUNT'或'RETRY'时，代码在此处
                        case 'TRY_OTHER_NETWORK':
                        case 'RELOAD':
                            // 当交互代码是'TRY_OTHER_NETWORK'或'RELOAD'时，代码在此处
                        case 'VERIFY':
                            // 当交互代码是'VERIFY'时，代码在此处
                            hidePayoneerPopup();
                            var payoneer_err_info ="Please double check your information and try again";
                            $('#checkout-error').html(payoneer_err_info);
                            $('#checkout-error').show();
                            postOrderPayFailed('payoneer');
                            break;
                    }
                }
            });
            document.querySelector('.payoneer-popup').style.display = 'block';
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

        function testCheckout() {
            pay_type = "test"
            var params = getOrderParams(pay_type);
            if(params.error && params.error.length) {
                $('#checkout-error').html(params.error.join('<br />'));
                $('#checkout-error').show();
                return;
            }
            $('#loading').show();
            $('#checkout-error').hide();


            

            
            testCreateOrder('test');
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
                currency : 'USD',
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

        

        function testCreateOrder(pay_type) {
            var params = getOrderParams(pay_type);
            params["page_id"]='4766';

            var url = '/onebuy/order/add/sync?_token={{ csrf_token() }}&time=' + new Date().getTime();

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
                if(data.result === 200){
                    var order_info = data.info;
                    document.cookie="voluum_payout="+ params.total + params.currency + "; path=/";
                    document.cookie="order_id="+ order_info._id.$oid + "; path=/";
                    localStorage.setItem("order_id", order_info._id.$oid);
                    localStorage.setItem("order_params", JSON.stringify(params));

                    $('#loading').hide();
                    Goto('/onebuy/checkout/success?id='+localStorage.getItem('order_id'));
                }else {
                    $('#loading').hide();
                    var pay_error = data.error;
                    if(pay_error && pay_error.length) {
                        $('#checkout-error').html(pay_error.join('<br />')+'<br /><br />');
                        $('#checkout-error').show();
                    }
                }
            })
        }

        // 实现 paypal standar payment
        $(".pay-width-paypal-standard").on("click", function(){
            window.pay_type = "paypal_standard";
            checkout();
        });

        function checkout() {
            sendInitiateCheckoutEvent();
            gtag('event', 'initiate_checkout', {
                'event_label': 'Initiate Checkout',
                'event_category': 'ecommerce'
            });
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

            if(window.is_payoneer_pay) {
                createOrder('', '', 'payoneer');
                return;
            }

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
            } else if(window.is_airwallex){
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

            //params['pay_type'] = pay_type;

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
                    document.cookie="voluum_payout="+ order_info.grand_total + order_info.order_currency_code + "; path=/";
                    document.cookie="order_id="+ order_info.id + "; path=/";
                    localStorage.setItem("order_id", order_info.id);
                    localStorage.setItem("order_params", JSON.stringify(params));

                    if(window.is_payoneer_pay) {
                        $('#loading').hide();
                        initPayoneerPaymentPage(order_info.client_secret);
                        return;
                    }
                    if(window.is_checkout_pay) {
                        if(order_info.payment_3ds) {
                            if(order_info.payment_3ds.redirect_url) {
                                GotoNotRequest(order_info.payment_3ds.redirect_url);
                            }
                        } else {
                            Goto('/onebuy/checkout/success?id='+localStorage.getItem('order_id'));
                        }
                    } else if (window.is_wintopay) {
                        Goto('/onebuy/checkout/success?id='+localStorage.getItem('order_id'));
                    } else if (window.is_pacypay) {
                        if(order_info.client_secret) {
                            Goto(order_info.client_secret, true);
                        }
                    } else if (window.is_worldpay){
                        console.log(data)
                        $('#loading').hide();
                        document.querySelector(".submit-button").scrollIntoView({
                            behavior: "smooth"
                        })
                        worldpayInit({
                            helper_html: window.location.protocol + '//' + window.location.host + '/worldpay/helper.html',
                            redirect_url: data.client_secret,
                            target: 'worldpay-warpper',
                            language: 'en',
                            country: order_info.order_currency_code,
                            resultCallback: function(responseData) {
                                var status = responseData.order.status;
                                if("success" == status) {
                                    Goto('/onebuy/checkout/success?id='+localStorage.getItem('order_id'));
                                } else {
                                    var pay_error = responseData.error.messages;

                                    if(pay_error && pay_error.length) {
                                        $('#checkout-error').html(pay_error.join('<br />')+'<br /><br />');
                                        $('#checkout-error').show();
                                    }
                                }
                            }
                        });
                    }else if(window.is_paypal_standard) {

                    }else if (window.is_airwallex){
                        $('#loading').hide();
                        document.querySelector(".submit-button").scrollIntoView({
                            behavior: "smooth"
                        })
                        $('#airwallex-warpper').show();

                        console.log(order_info);

                        try {
                            // STEP #2: Initialize the Airwallex global context for event communication
                            Airwallex.init({
                            env: 'prod', // Setup which Airwallex env('staging' | 'demo' | 'prod') to integrate with
                            origin: window.location.origin, // Setup your event target to receive the browser events message
                            fonts: [
                                // Customizes the font for the payment elements
                                {
                                src:
                                    'https://checkout-demo.airwallex.com/fonts/CircularXXWeb/CircularXXWeb-Regular.woff2',
                                family: 'AxLLCircular',
                                weight: 400,
                                },
                            ],
                            });
                            

                            // STEP #4: Create 'dropIn' element
                            const dropIn = Airwallex.createElement('dropIn', {
                            // Required, dropIn use intent Id, client_secret and currency to prepare checkout
                            intent_id: data.payment_intent_id,
                            client_secret: data.client_secret,
                            methods: ["card","googlepay","applepay"],
                            currency: data.currency,
                            // customer_id:"cus_hkdm6lm7hglgq1tsh22",
                            googlePayRequestOptions: {
                            countryCode: data.country,
                            merchantInfo: {
                                merchantName: "Example Merchant",
                                },
                                buttonType: 'buy', // Indicate the type of button you want displayed on your payments form. Like 'buy'
                            },
                            applePayRequestOptions: {
                                buttonType: 'buy', // Indicate the type of button you want displayed on your payments form. Like 'buy'
                                countryCode: data.country,  // The merchant's two-letter ISO 3166 country code. Like 'HK'
                                totalPriceLabel: 'COMPANY, INC.' // Provide a business name for the label field.
                                },
                        // components:['card'],
                            withBilling:true,
                            //requiredBillingContactFields: ['name','email','address']
                            //country_code:'',
                            });
                            // STEP #5: Mount 'dropIn' element
                            dropIn.mount('dropIn'); // This 'dropIn' id MUST MATCH the id on your empty container created in Step 3
                        } catch (error) {
                            document.getElementById('loading').style.display = 'none'; // Example: hide loading state
                            document.getElementById('error').style.display = 'block'; // Example: show error
                            document.getElementById('error').innerHTML = error.message; // Example: set error message
                            console.error('There was an error', error);
                        }


                        // STEP #6: Add an event listener to handle events when the element is mounted
                        window.addEventListener('onReady', (event) => {
                            /*
                            ... Handle event
                            */
                            document.getElementById('dropIn').style.display = 'block'; // Example: show element when mounted
                            document.getElementById('loading').style.display = 'none'; // Example: hide loading tag when element is mounted
                            console.log('Element is ready', event.detail);
                        });

                        // STEP #7: Add an event listener to handle events when the payment is successful.
                        window.addEventListener('onSuccess', (event) => {
                            /*
                            ... Handle event on success
                            */
                            //document.getElementById('success').style.display = 'block'; // Example: show success block

                            console.log("success");
                            console.log(event.detail);

                            Goto('/onebuy/checkout/success?id='+localStorage.getItem('order_id'));

                            // window.alert(JSON.stringify(event.detail));
                        });

                        // STEP #8: Add an event listener to handle events when the payment has failed.
                        window.addEventListener('onError', (event) => {
                            /*
                            ... Handle event on error
                            */
                            const { error } = event.detail;
                            document.getElementById('error').style.display = 'block'; // Example: show error block
                            document.getElementById('error').innerHTML = error.message; // Example: set error message
                            console.error('There was an error', error);
                        });

                       

                       

                    } else if (window.is_stripe_local){
                        var client_secret = order_info.client_secret;
                        var stripe_init_data = {
                            name        : params.first_name + ' ' + params.second_name,
                            email       : params.email,
                            country     : params.country,
                            state       : params.province,
                            code        : params.code,
                            address     : params.address,
                            city        : params.city
                        }
                        stripeElementsInit(client_secret, stripe_init_data);
                        $('#loading').hide();
                        document.querySelector(".submit-button").scrollIntoView({
                            behavior: "smooth"
                        });
                        $('.pay-after-submit-button').show();
                    } else {
                        var client_secret = order_info.client_secret;
                        var need_3ds_stripe = order_info.stripe_extra_info.need_3ds;
                        if(need_3ds_stripe) {
                            window.removeEventListener('message', messageListener);
                            window.addEventListener('message', messageListener, false);
                            create3DSPopup(order_info.stripe_extra_info.next_action.redirect_to_url.url);
                        } else {
                            Goto('/onebuy/checkout/success?id='+localStorage.getItem('order_id'));
                        }
                        // stripe.handleCardPayment(client_secret, cardNumber).then(function(result) {
                        //     if (result.error) {
                        //         $('#checkout-error').html(result.error.message+'<br /><br />');
                        //         $('#checkout-error').show();
                        //         $('#loading').hide();
                        //     } else {
                        // Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id'));
                        //     }
                        // });
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
                currency : 'USD',
                shipping_fee : shipping_fee,
                amount : product.amount,
                product_image : '{{ $productBaseImage['small_image_url'] }}'
            };

            var total = product_info.product_price*1 + product_info.shipping_fee* 1;

            var phone_number = $(".phone_number").val();
            var phone_prefix = getPhonePrefix();


            
            var products = getSubmitProducts(product_info.product_price,product_info.amount);

            console.log("order products");
            console.log(products);

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
                price_template      : '$price',
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

            var phone_format = /^[0-9\+\-\(\)\s]+$/;
            if(!phone_format.test(params.phone_full)){
                has_error = true;
                showError('phone_number-error',  "Please enter valid phoneNumber");
                error_log.push('phone_full is Invaild');
            }

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
                fetchCheckoutError(error_log);
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

            console.log("sku maps");
            console.log(sku_maps);

            console.log("attribute_item");
            console.log(attribute_item);
            console.log("attribute_item");

            for(var i=0; i< attribute_item.length; i++) {
                var sku_key_arr = [];
                var img_key = '';
                var attribute_select = $(attribute_item[i]).find('.attribute_select');
                console.log("attribute select 11111111 ");
                console.log(attribute_select);
                console.log("attribute select 111111112 ");
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
            sendInitcheckout2Everflow();
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
</body>
</html>