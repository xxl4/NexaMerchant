@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $avgRatings = round($reviewHelper->getAverageRating($product));
    $percentageRatings = $reviewHelper->getPercentageRating($product);
    $customAttributeValues = $productViewHelper->getAdditionalData($product);
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
<!--<base href="https://shoes.dotmalls.com" /> -->
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>


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
        fetch('https://shoes.dotmalls.com/common/send/everflow/init_checkout',{
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
<script src="https://cdn.checkout.com/js/framesv2.min.js"></script>
<script src="https://lander.heomai.com/template-common/js/frames-init.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://lander.heomai.com/template-common/js/stripe-init.js"></script>
<script src="https://lander.heomai.com/template-common/js/worldpay-init.js"></script>
<script src="https://lander.heomai.com/template-common/js/paypal-init.js"></script>
<script type="text/javascript" src="https://lander.heomai.com/template-common/js/op-payment-widget-v3.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://lander.heomai.com/template-common/css/op-payment-widget-v3.min.css">

<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout1/css/font-awesome.min.css">

<script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent))
            document.write('<script src="https://polyfill.io/v3/polyfill.min.js?features=RegExp.prototype.flags%2CNodeList.prototype.%40%40iterator%2CNodeList.prototype.forEach%2CString.prototype.normalize%2Cblissfuljs%2Cdocument.getElementsByClassName%2Cdocument.head%2Cdocument.querySelector%2Cdefault%2CElement.prototype.closest%2ClocalStorage%2Cfetch%2Ces5%2Ces6%2Ces7%2CURLSearchParams%2CURL%2CCustomEvent%2CEvent"><\/script>');
    </script>
<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout6/css/order.css">
<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout-common/css/order.css">
<style>
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
</head>
<body>
<div class="smb-body">
<div class="header-container">
<div class="header-container-bg"></div>
<style>
                .header-container-bg {
                    background-image : url(https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088470_784C3FC2E47AF3089556A5446F337E1A_750_750.jpg)
                }

                @media (max-width:1023px) {
                    .header-container-bg {
                        background-image : url(https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088466_1689762357_CJ02168-0719-HLP-2.jpg)
                    }
                }

                @media (max-width:767px) {
                    .header-container-bg {
                        background-image : url(https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088466_1689762357_CJ02168-0719-HLP-2.jpg)
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
<div class="main-container-progress-state-line active"></div>
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
<div class="main-container-progress-state-line"></div>
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
<img class="checkout-security-img" src="https://lander.heomai.com/template-common/checkout1/images/secure-icons.png" />
</div>
<div class="product-list js-list">
    <?php foreach($package_products as $key=>$package_product) { ?>
    <div data-id="<?php echo $package_product['id'];?>" class="list-item js-list-item item-5 <?php if($key==0) { ?> list-item--checked <?php } ?>" style="order: 0;">
        <div class="recommend_deal" style="display:flex;">
            <img class="recommend_deal_img" src="https://lander.heomai.com/template-common/checkout1/images/star.png">
            <div class="recommend_deal_font">
            RECOMMENDED DEAL </div>
        </div>
        <div class="list-item-content">
            <div class="list-item-title">
                <span class="list-item-title-name js-name">
                <?php echo $package_product['name'];?> <br/>
                </span>
            </div>
        <div class="list-item-footer">
            <div class="list-item-prices">
                <div class="old-price">
                <?php echo $package_product['old_price'];?> </div>
                <div class="new-price">
                <?php echo $package_product['new_price'];?> </div>
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
<a class="list-item-btn click_scroll" anchor=".shipping_information_block">
<div class="order_now">
ORDER NOW </div>
</a>
</div>
</div>
<div class="shipping-and-payment-wrapper">
<div class="shipping-and-payment">
<div class="payment-block">
<div class="payment-title">
PAYMENT </div>
<div class="paypal-wrapper" style>
<div id="paypal-error" style="color:#e51f28;display:none"></div>
<div class="paypal-card-submit" id="paypal-card-submit" style="width:100%;"></div>
</div>
<div class="split-line shipping_information_paypal_block" style>
<div class="split-content" style="left: 0 \9;top: 8px \9;width: 100% \9;">
OR PAY WITH CREDIT CARD </div>
</div>
<div class="checkout-block" id="checkout-block-up">
<button class="checkout-button">
<span>
CHECKOUT </span>
</button>
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
<img class="payment-img" src="https://lander.heomai.com/template-common/checkout1/images/gsc-en.png" />
</div>
<div class="shipping-block">
<div class="shipping-title">
SHIPPING </div>
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
<div class="shipping-info-item">
<input name="apt_other" class="shipping-info-input apt_other" />
<label id="apt_other-error" class="shipping-info-error">
</label>
<label class="shipping-info-label">
Apt / Suite / Other </label>
</div>
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
ORDER SUMMARY </div>
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
I agree with the <a href="https://lander.heomai.com/template-common/en/terms-of-service?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com">
Term of service </a>
& <a href="https://lander.heomai.com/template-common/en/refund-policy?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com">
Refund policy </a>
& <a href="https://lander.heomai.com/template-common/en/privacy-policy?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com">
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
Dotmalls offers a 30 day guarantee on all unused purchases. Simply send the item(s) back to us in the original packaging for a full refund or replacement, less S&H. </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="submit-block">
<div class="submit-content">
<div id="checkout-error" style="color:#e51f28;display:none;"></div>
<button class="submit-button" onclick="checkout()">
COMPLETE SECURE PURCHASE </button>
</div>
</div>
<div id="worldpay-warpper" style="margin-top:20px;"></div>
<div id="pay-after-warpper"></div>
<div class="summary-footer summary-footer-mb">
<div class="agree-block">
<input type="checkbox" checked>
I agree with the <a href="https://lander.heomai.com/template-common/en/terms-of-service?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com">
Term of service </a>
& <a href="https://lander.heomai.com/template-common/en/refund-policy?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com">
Refund policy </a>
& <a href="https://lander.heomai.com/template-common/en/privacy-policy?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com">
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
Dotmalls offers a 30 day guarantee on all unused purchases. Simply send the item(s) back to us in the original packaging for a full refund or replacement, less S&H. </div>
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
©2021 - Dotmalls
</div>
<style>
                    .phone-block {
                        color: #a9a9a9;
                        font-size: 12px;
                        font-family: Helvetica Bold;
                        margin: 0 0 15px;
                        text-align: center;
                        padding: 5px 0;
                    }
                    .phone-block a {
                        color: #a9a9a9;
                    }
                </style>
<div class="phone-block">
Phone: <a href="tel:(833) 493-2323">(833) 493-2323</a> (9:00am-5:00pm EST, Monday to Friday). </div>
<div class="terms-block">
<a href="/template-common/en/shipping-delivery?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com" target="_blank">
Shipping & Delivery </a>
<a href="/template-common/en/refund-policy?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com" target="_blank">
Refund policy </a>
<a href="/template-common/en/terms-of-service?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com" target="_blank">
Term of service </a>
<a href="/template-common/en/privacy-policy?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com" target="_blank">
Privacy Policy </a>
<a href="/template-common/en/contact-us?brand=Dotmalls&logo=https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png&email=support@dotmalls.com" target="_blank">
Contact Us </a>
</div>
<div class="dmca_logo">
<a href="https://www.dmca.com/Protection/Status.aspx?refurl=http://127.0.0.1:10801/me/Dotmalls/checkout/4766" target="_blank">
<img src="https://lander.heomai.com/template-common/checkout1/images/dmca-grey.png" />
</a>
</div>
</div>
</div>
<div class="comment-block" id="comment-block">
<div class="comment-content">
<div class="comment-img">
<img alt="product image" src="https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1689762374_1.jpg">
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
            /* max-height: 60%; */
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
        var products = [
            {   "id":5,
                "name":"2x {{ $product->name }}",
                "image":"{{ $productBaseImage['medium_image_url'] }}",
                "amount":"2",
                "old_price":"171.96",
                "new_price":"49.99",
                "tip1":"71% Savings",
                "tip2":"$24.99\/piece",
                "shipping_fee":"11.99",
                "popup_info":{
                    "name":null,
                    "old_price":null,
                    "new_price":null,
                    "img":null}
                },
            {"id":6,"name":"1x {{ $product->name }}","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762577_1.jpg","amount":"1","old_price":"85.98","new_price":"42.99","tip1":"50% Savings","tip2":"$42.99\/piece","shipping_fee":"10.99","popup_info":{"name":null,"old_price":null,"new_price":null,"img":null}},
            {"id":7,"name":"3x {{ $product->name }}","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762581_1.jpg","amount":"3","old_price":"257.94","new_price":"54.99","tip1":"79% Savings","tip2":"$18.33\/piece","shipping_fee":"13.99","popup_info":{"name":null,"old_price":null,"new_price":null,"img":null}},
            {"id":8,"name":"4x {{ $product->name }}","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762584_1.jpg","amount":"4","old_price":"343.92","new_price":"59.99","tip1":"83% Savings","tip2":"$14.99\/piece","shipping_fee":"15.99","popup_info":{"name":null,"old_price":null,"new_price":null,"img":null}}
        ]
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
            var products = [
                {"id":5,"name":"2x {{ $product->name }}","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762556_1.jpg","amount":"2","old_price":"171.96","new_price":"49.99","tip1":"71% Savings","tip2":"$24.99\/piece","shipping_fee":"11.99","popup_info":{"name":null,"old_price":null,"new_price":null,"img":null}},
                {"id":6,"name":"1x {{ $product->name }}","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762577_1.jpg","amount":"1","old_price":"85.98","new_price":"42.99","tip1":"50% Savings","tip2":"$42.99\/piece","shipping_fee":"10.99","popup_info":{"name":null,"old_price":null,"new_price":null,"img":null}},
                {"id":7,"name":"3x {{ $product->name }}","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762581_1.jpg","amount":"3","old_price":"257.94","new_price":"54.99","tip1":"79% Savings","tip2":"$18.33\/piece","shipping_fee":"13.99","popup_info":{"name":null,"old_price":null,"new_price":null,"img":null}},
                {"id":8,"name":"4x {{ $product->name }}","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762584_1.jpg","amount":"4","old_price":"343.92","new_price":"59.99","tip1":"83% Savings","tip2":"$14.99\/piece","shipping_fee":"15.99","popup_info":{"name":null,"old_price":null,"new_price":null,"img":null}}
            ]

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
            showAttributeSelecet('Article');
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
        function updateCountrySelect(data) {
            countries = data.data
            window.countries = countries;
            console.log(window.countries);
            var t = '<option value="">----</option>';
            countries.forEach(function(e) {
                t += "<option value=".concat(e.code, ">").concat(e.name, "</option>")
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

        fetch('/api/core/countries',{
            method: 'GET',
        })
        .then(function(data){
            return data.json()}
        ).then(function(data) {
            console.log(data);
            updateCountrySelect(data)
        })
    </script>
<script>
    function setAttributeTemplate(select_language, select_language_after, has_img_attribute_id, is_more_attribute, template, attribute_err_language) {
    var product_attributes = JSON.parse(JSON.stringify(window.product_attributes));
    console.log(product_attributes);
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
        product_template += '<select class="attribute-value-item-select attribute_select" onchange="attributeChange(this, '+(product_attribute.id == has_img_attribute_id)+', '+"'"+template+"'"+')" '+(product_attribute.id==has_img_attribute_id? ' data-has-img="true"' : '' )+'><option value="" '+ (!product_attribute.selected_option_id ? 'selected' : '') +' url="'+product_attribute.options[0].image+'"></option>';
        //if(product_attribute.id == has_img_attribute_id && !product_attribute.selected_option_id) {
            show_image = product_attribute.options[0].image;
        //}
            
        for(var j=0; j<product_attribute.options.length; j++) {
            var product_attribute_option = product_attribute.options[j];
            product_template += '<option value="'+product_attribute_option.name+'" '+ (product_attribute_option.id==product_attribute.selected_option_id? 'selected' : '') +' url="'+product_attribute_option.image+'" '+ (product_attribute_option.is_sold_out ? ' data-is-sold-out="true" ' : '')+'>'+product_attribute_option.name+'</option>';
            //if(product_attribute_option.id==product_attribute.selected_option_id && product_attribute.id == has_img_attribute_id) {
                show_image = product_attribute_option.image;
            //}
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
    console.log(product_template);
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
    console.log('showImgProp');
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
    /*
        window.product_attributes = [
            {"id":1,"name":"SIZE","options":[{"id":2,"name":"S","image":null,"is_sold_out":false},
            {"id":3,"name":"M","image":null},
            {"id":4,"name":"L","image":null},
            {"id":5,"name":"XL","image":null},
            {"id":6,"name":"2XL","image":null},
            {"id":7,"name":"3XL","image":null,"is_sold_out":false},
            {"id":8,"name":"4XL","image":null}
        ],
        "tip":"Size Chart",
        "tip_img":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1694769733_2168.jpg","selected_option_id":null},
        {"id":2,"name":"COLOR","options":[{"id":1,"name":"Black","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762488_1.jpg"},
        {"id":2,"name":"Pink","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762492_2.jpg"},
        {"id":3,"name":"Beige","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762495_3.jpg"},
        {"id":4,"name":"Gray","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762499_4.jpg"}],"tip":null,"tip_img":null,"selected_option_id":null}];
*/
/**
 * {"name":"Women's thin no wire lace bra - Black \/ S","sku_code":"CJ02168-C#black-S#m","sku_id":44113194877163,"attribute_name":"S,Black","key":"S_Black"}
 * 
 */
        <?php 
            $product_attributes = [];
            $skus = [];
            $config = app('Webkul\Product\Helpers\ConfigurableOption')->getConfigurationConfig($product);

            foreach($config['attributes'] as $key=>$attribute) {
                
                $product_attribute['id'] = $attribute['id'];
                $product_attribute['name'] = $attribute['code'];
                $options = [];
                foreach($attribute['options'] as $kk=> $option) {
                    $sku['name'] = $product->name." ".$option['label'];
                    $sku['attribute_name'] = $option['label'];
                    $sku['sku_id'] = $attribute['id']."_".$option['id'];
                    $sku['code'] = $attribute['id']."_".$option['id'];
                    $skus[] = $sku;
                    $option['name'] = $option['label'];
                    $option['is_sold_out'] = false;
                    if(isset($config['variant_images'][$attribute['id']][0]['small_image_url'])) {
                        $option['image'] = $config['variant_images'][$attribute['id']][0]['small_image_url'];
                    }else{
                        $option['image'] = "http://45.79.79.208:8002/cache/large/product/19/twokW7Nhvs8obbDx2V9whxfIwV0zyPTG7cQh5Wxd.webp";
                    }
                    $options[] = $option;
                }
                $product_attribute['options'] = $options;
                if(isset($config['variant_images'][$attribute['id']][0]['small_image_url'])) {
                    $product_attribute['image'] = $config['variant_images'][$attribute['id']][0]['small_image_url'];
                }else{
                    $product_attribute['image'] = "http://45.79.79.208:8002/cache/large/product/19/twokW7Nhvs8obbDx2V9whxfIwV0zyPTG7cQh5Wxd.webp";
                }
                
                $product_attributes[] = $product_attribute;
            }

            //var_dump($skus);exit;
            
            //exit;
        ?>

        window.product_attributes = <?php echo json_encode($product_attributes);?>;

        var is_more_attribute = 1;
        setAttributeTemplate('SELECT YOUR', '', '23', is_more_attribute ? true : false, 'common15', 'Sold out, please select another Attributes');
        showAttributeSelecet('Article');
    </script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z7L6BT187M"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z7L6BT187M');
</script>
<!-- End Google Analytics -->

<script>
        window.pay_type = 'worldpay';
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
        var paypal_pay_acc = getPaypalClientId('miaodian');
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
        script.src = 'https://www.paypal.com/sdk/js?client-id='+paypal_pay_acc+'&components=buttons,messages,funding-eligibility&currency='+currency+'&disable-funding=paylater';
        // script.src = 'https://www.paypal.com/sdk/js?client-id=AUbkpTo_D9-l80qERS91ipcrXuIfSC3WMmFbK7Ey4n8RS3TaoJDw8H2rpxdhsWBIZWZbb6E3V7CSmK4R&components=buttons,messages,funding-eligibility&currency='+currency+'&disable-funding=paylater';
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
                        gtag('event', 'initiate_checkout', {
                            'event_label': 'Initiate Checkout',
                            'event_category': 'ecommerce'
                        });
                        // obApi('track', 'Start Checkout'); 
                        var params = getOrderParams( paypal_type || 'paypal');
                        if(params.error) {
                            $('#'+ (error_id || 'paypal-error')).html(params.error.join('<br />'));
                            $('#'+ (error_id || 'paypal-error')).show();
                            throw new Error('Verification failed');
                        }
                        var url = '/order/add/addr_after?time=' + new Date().getTime();
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
                                    if(data.result === 200){
                                        var order_info = data.info;
                                        document.cookie="voluum_payout="+ params.total + params.currency + "; path=/";
                                        document.cookie="order_id="+ order_info._id.$oid + "; path=/";
                                        localStorage.setItem("order_id", order_info._id.$oid);
                                        localStorage.setItem("order_params", JSON.stringify(params));
                                        return order_info.client_secret;
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
                    onApprove: function(data, actions) {
                        if(!data.orderID) {
                            throw new Error('orderid is not exisit');
                        }
                        var request_params = {
                            client_secret : data.orderID,
                            id : localStorage.getItem('order_id'),
                        }
                        var request = '';
                        for(var i=0; i<Object.keys(request_params).length; i++) {
                            request += Object.keys(request_params)[i] + '=' + request_params[Object.keys(request_params)[i]] + '&';
                        }
                        request = request.substr(0,request.length - 1);
    
                        var url = '/pay/order/status?' + request;
    
                        $('#loading').show();
                        return fetch(url,{
                                method: 'get',
                                headers: {
                                    'content-type': 'application/json'
                                },
                            })
                            .then(function(res) {return res.json()})
                            .then(function(res) {
                                $('#loading').hide();
                                if(res.result === 200) {
                                    var info = res.info;
                                    if(info.pay_status) {
                                        Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id')+'&client_secret='+data.orderID);
                                    }
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
                            Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id'));
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
                    Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id'));
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
            var params = getOrderParams(pay_type);
            if(token){
                params[token_field] = token;
            }

            if(Object.keys(card).length) {
                params['card'] = card;
            }

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
                if(data.result === 200){
                    var order_info = data.info;
                    document.cookie="voluum_payout="+ params.total + params.currency + "; path=/";
                    document.cookie="order_id="+ order_info._id.$oid + "; path=/";
                    localStorage.setItem("order_id", order_info._id.$oid);
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
                            Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id'));
                        }
                    } else if (window.is_wintopay) {
                        Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id'));
                    } else if (window.is_pacypay) {
                        if(order_info.client_secret) {
                            Goto(order_info.client_secret, true);
                        }
                    } else if (window.is_worldpay){
                        $('#loading').hide();
                        document.querySelector(".submit-button").scrollIntoView({
                            behavior: "smooth"
                        })
                        worldpayInit({
                            helper_html: window.location.protocol + '//' + window.location.host + '/template-common/worldpay/helper.html',
                            redirect_url: order_info.client_secret,
                            target: 'worldpay-warpper',
                            language: 'en',
                            country: order_info.country,
                            resultCallback: function(responseData) {
                                var status = responseData.order.status;
                                if("success" == status) {
                                    Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id'));
                                } else {
                                    var pay_error = responseData.error.messages;

                                    if(pay_error && pay_error.length) {
                                        $('#checkout-error').html(pay_error.join('<br />')+'<br /><br />');
                                        $('#checkout-error').show();
                                    }
                                }
                            }
                        });
                    } else if (window.is_airwallex){
                        $('#loading').hide();
                        document.querySelector(".submit-button").scrollIntoView({
                            behavior: "smooth"
                        })
                        $('#airwallex-warpper').show();
                        airwallexElementCreate({
                            intent_id: order_info.payment_intent_id,
                            client_secret: order_info.client_secret,
                            currency: order_info.currency,
                        }, function(event) {
                            Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id'));
                        },  function(event){
                            console.log(event);
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
                            Goto('/template-common/en/thankyou1/?id='+localStorage.getItem('order_id'));
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
                if(window.countries[i].Code == country) {
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
                product_image : 'https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1689762374_1.jpg'
            };

            var total = product_info.product_price*1 + product_info.shipping_fee* 1;

            var phone_number = $(".phone_number").val();
            var phone_prefix = getPhonePrefix();


            
            var products = getSubmitProducts(product_info.product_price,product_info.amount);

            var product_price = product_info.product_price;
            
            var params = {
                first_name          : $(".first_name").val(),
                second_name         : $(".last_name").val(),
                email               : $(".email").val(),
                phone_full          : phone_number ? (phone_number.indexOf(phone_prefix) == 0 ? phone_number : (phone_prefix+phone_number)) : '',
                country             : $("#country-select").val(),
                city                : $(".city").val(),
                province            : $("#state-select").val(),
                address             : $(".address").val() ? $(".address").val() + ',' +$(".apt_other").val() : '',
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
                logo_image          : 'https://d1y4tm6t3pzfj.cloudfront.net/cpl/images/1692088119_logo.png',
                brand               : 'Dotmalls',
                description         : product_info.product_name,
                shopify_store_name  : 'lilndary.myshopify.com',
                produt_amount_base  : '1',
                domain_name         : document.domain || window.location.host,
                price_template      : '$price',
                omnisend            : 'lilndary',
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

            console.log("attribute_item");
            console.log(attribute_item);

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
                if(product_sku_map[skus[m].sku_id]) {
                    products[product_sku_map[skus[m].sku_id] - 1].amount++;
                } else {
                    var sku = {
                        img         : skus[m].img,
                        price       : unit_price,
                        amount      : 1,
                        description : skus[m].name,
                        product_id  : '<?php echo $product->id;?>',
                        product_sku : skus[m].sku_code,
                        variant_id  : skus[m].sku_id
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

            var skus = [
                {"name":"Women's thin no wire lace bra - Black \/ S","sku_code":"CJ02168-C#black-S#m","sku_id":44113194877163,"attribute_name":"S,Black","key":"S_Black"},
            {"name":"Women's thin no wire lace bra - Pink \/ S","sku_code":"CJ02168-C#pink-S#m","sku_id":44113194909931,"attribute_name":"S,Pink","key":"S_Pink"},
            {"name":"Women's thin no wire lace bra - Beige \/ S","sku_code":"CJ02168-C#beige-S#m","sku_id":44113194975467,"attribute_name":"S,Beige","key":"S_Beige"},
            {"name":"Women's thin no wire lace bra - Gray \/ S","sku_code":"CJ02168-C#gray-S#m","sku_id":44113194942699,"attribute_name":"S,Gray","key":"S_Gray"},
            {"name":"Women's thin no wire lace bra - Black \/ M","sku_code":"CJ02168-C#black-S#l","sku_id":44071643152619,"attribute_name":"M,Black","key":"M_Black"},
            {"name":"Women's thin no wire lace bra - Pink \/ M","sku_code":"CJ02168-C#pink-S#l","sku_id":44071643381995,"attribute_name":"M,Pink","key":"M_Pink"},
            {"name":"Women's thin no wire lace bra - Beige \/ M","sku_code":"CJ02168-C#beige-S#l","sku_id":44071643840747,"attribute_name":"M,Beige","key":"M_Beige"},
            {"name":"Women's thin no wire lace bra - Gray \/ M","sku_code":"CJ02168-C#gray-S#l","sku_id":44071643611371,"attribute_name":"M,Gray","key":"M_Gray"},
            {"name":"Women's thin no wire lace bra - Black \/ L","sku_code":"CJ02168-C#black-S#xl","sku_id":44071643185387,"attribute_name":"L,Black","key":"L_Black"},
            {"name":"Women's thin no wire lace bra - Pink \/ L","sku_code":"CJ02168-C#pink-S#xl","sku_id":44071643414763,"attribute_name":"L,Pink","key":"L_Pink"},
            {"name":"Women's thin no wire lace bra - Beige \/ L","sku_code":"CJ02168-C#beige-S#xl","sku_id":44071643873515,"attribute_name":"L,Beige","key":"L_Beige"},
            {"name":"Women's thin no wire lace bra - Gray \/ L","sku_code":"CJ02168-C#gray-S#xl","sku_id":44071643644139,"attribute_name":"L,Gray","key":"L_Gray"},
            {"name":"Women's thin no wire lace bra - Black \/ XL","sku_code":"CJ02168-C#black-S#2xl","sku_id":44071643218155,"attribute_name":"XL,Black","key":"XL_Black"},
            {"name":"Women's thin no wire lace bra - Pink \/ XL","sku_code":"CJ02168-C#pink-S#2xl","sku_id":44071643447531,"attribute_name":"XL,Pink","key":"XL_Pink"},
            {"name":"Women's thin no wire lace bra - Beige \/ XL","sku_code":"CJ02168-C#beige-S#2xl","sku_id":44071643906283,"attribute_name":"XL,Beige","key":"XL_Beige"},
            {"name":"Women's thin no wire lace bra - Gray \/ XL","sku_code":"CJ02168-C#gray-S#2xl","sku_id":44071643676907,"attribute_name":"XL,Gray","key":"XL_Gray"},
            {"name":"Women's thin no wire lace bra - Black \/ 2XL","sku_code":"CJ02168-C#black-S#3xl","sku_id":44071643250923,"attribute_name":"2XL,Black","key":"2XL_Black"},
            {"name":"Women's thin no wire lace bra - Pink \/ 2XL","sku_code":"CJ02168-C#pink-S#3xl","sku_id":44071643480299,"attribute_name":"2XL,Pink","key":"2XL_Pink"},
            {"name":"Women's thin no wire lace bra - Beige \/ 2XL","sku_code":"CJ02168-C#beige-S#3xl","sku_id":44071643939051,"attribute_name":"2XL,Beige","key":"2XL_Beige"},
            {"name":"Women's thin no wire lace bra - Gray \/ 2XL","sku_code":"CJ02168-C#gray-S#3xl","sku_id":44071643709675,"attribute_name":"2XL,Gray","key":"2XL_Gray"},
            {"name":"Women's thin no wire lace bra - Black \/ 3XL","sku_code":"CJ02168-C#black-S#4xl","sku_id":44071643283691,"attribute_name":"3XL,Black","key":"3XL_Black"},
            {"name":"Women's thin no wire lace bra - Pink \/ 3XL","sku_code":"CJ02168-C#pink-S#4xl","sku_id":44071643513067,"attribute_name":"3XL,Pink","key":"3XL_Pink"},
            {"name":"Women's thin no wire lace bra - Beige \/ 3XL","sku_code":"CJ02168-C#beige-S#4xl","sku_id":44071643971819,"attribute_name":"3XL,Beige","key":"3XL_Beige"},
            {"name":"Women's thin no wire lace bra - Gray \/ 3XL","sku_code":"CJ02168-C#gray-S#4xl","sku_id":44071643742443,"attribute_name":"3XL,Gray","key":"3XL_Gray"},
            {"name":"Women's thin no wire lace bra - Black \/ 4XL","sku_code":"CJ02168-C#black-S#5xl","sku_id":44071643316459,"attribute_name":"4XL,Black","key":"4XL_Black"},
            {"name":"Women's thin no wire lace bra - Pink \/ 4XL","sku_code":"CJ02168-C#pink-S#5xl","sku_id":44071643545835,"attribute_name":"4XL,Pink","key":"4XL_Pink"},
            {"name":"Women's thin no wire lace bra - Beige \/ 4XL","sku_code":"CJ02168-C#beige-S#5xl","sku_id":44071644004587,"attribute_name":"4XL,Beige","key":"4XL_Beige"},
            {"name":"Women's thin no wire lace bra - Gray \/ 4XL","sku_code":"CJ02168-C#gray-S#5xl","sku_id":44071643775211,"attribute_name":"4XL,Gray","key":"4XL_Gray"}
        ];
            var skus = <?php echo json_encode($skus);?>  
            
            var sku_maps = {};
            
            for(var i=0; i<skus.length; i++) {
                sku_maps[skus[i].key] = JSON.parse(JSON.stringify(skus[i]));
            }

            window.sku_maps = sku_maps;
            return window.sku_maps;
        }

        function getAttributeImg(attribute) {
            console.log(attribute);
            var product_attributes = [
                {"id":1,"name":"SIZE","options":[{"id":2,"name":"S","image":null,"is_sold_out":false},
                {"id":3,"name":"M","image":null},{"id":4,"name":"L","image":null},
                {"id":5,"name":"XL","image":null},
                {"id":6,"name":"2XL","image":null},
                {"id":7,"name":"3XL","image":null,"is_sold_out":false},
                {"id":8,"name":"4XL","image":null}],"tip":"Size Chart","tip_img":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1694769733_2168.jpg","selected_option_id":null},
                {"id":2,"name":"COLOR","options":[{"id":1,"name":"Black","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762488_1.jpg"},
                {"id":2,"name":"Pink","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762492_2.jpg"},
                {"id":3,"name":"Beige","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762495_3.jpg"},
                {"id":4,"name":"Gray","image":"https:\/\/d1y4tm6t3pzfj.cloudfront.net\/cpl\/images\/1689762499_4.jpg"}],"tip":null,"tip_img":null,"selected_option_id":null}];
            


            var product_attributes = <?php echo json_encode($product_attributes);?>;
            var show_img_attribute_id =  '23';
            var product_img = "{{ $productBaseImage['medium_image_url'] }}";

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

            console.log(product_img);

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
                if(window.countries[i].Code == country) {
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

        function sendFbInitiateCheckoutEvent() {
            var params = {
                _fbc:getCookie('_fbc'),
                fbclid: getQueryString('fbclid'),
                _fbp:getCookie('_fbp'),
                event_name : 'InitiateCheckout',
                pixel_ids: ['793435258214539','469388707483229','504538250963543'],
                source_url: window.location.href, 
                currency : 'USD',
            }

            fetchFbEvent(params);
        }

        function fetchFbEvent(params) {
            fetch('/common/send/fb/event',{
                body: JSON.stringify(params),
                method: 'POST',
                headers: {
                    'content-type': 'application/json'
                },
            })
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

                    var cancel_google_map = 0;
            if(!cancel_google_map) {
                // loadJS('https://maps.googleapis.com/maps/api/js?key=AIzaSyA-roWtlZOnh7W7am1tQepghp9DTkfOHIc&libraries=places', function() {
                //     setGoogleMap();
                // })
            }
        
        function setGoogleMap() {
            var input = document.querySelector('.address');

            var autocomplete = new window.google.maps.places.Autocomplete(input);
            autocomplete.setTypes(["geocode", "establishment"]);
            autocomplete.setFields(["address_component", "formatted_address"]);
            autocomplete.addListener("place_changed", function(){
                function getAddressComponentField(index, field, types_one) {
                    var place = autocomplete.getPlace();
                    var address_components =  place.address_components;

                    try {
                        var value = '';
                        if(address_components[index]) {
                            value = address_components[index][field];
                        }
                        if(!address_components[index] || address_components[index]['types'].indexOf(types_one) == -1) {
                            for (var i = 0; i < address_components.length; i++) {
                                var address_component = address_components[i];
                                if(address_component.types.indexOf(types_one) > -1) {
                                    value = address_components[i][field];
                                }
                            }
                        }
                        return value;
                    } catch {
                        return '';
                    }
                }
                var address = getAddressComponentField(0, 'long_name') + ' ' + getAddressComponentField(1, 'long_name');
                var city = getAddressComponentField(2, 'long_name');
                var state = getAddressComponentField(5, 'short_name');
                var country = getAddressComponentField(6, 'short_name', 'country');
                var zip_code = getAddressComponentField(7, 'long_name', 'postal_code');

                var country_replace_obj = {
                    'PR' : 'US'
                }

                $('.address').val(address);
                $('.address').change();
                $('.city').val(city);
                $('.city').change();
                $('#country-select').val(country_replace_obj[country] ? country_replace_obj[country] : country);
                $('#country-select').change();
                window.state_select = state;
                $('.zip_code').val(zip_code);
                $('.zip_code').change();
            })
        }
    </script>
<script>
        function payAfterSubmit() {
            $('#pay-after-submit-error').hide();
            $('#loading').show();
                    }
    </script>
</body>
</html>