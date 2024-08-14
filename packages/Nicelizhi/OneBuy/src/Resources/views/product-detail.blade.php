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
  <link type="image/x-icon" href="/favicon.png" rel="shortcut icon" sizes="16x16" />
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' />
  <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/jquery.colorbox.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/example1/colorbox.min.css" rel="stylesheet">


  <?php if ($app_env == 'demo') { ?>
    <script src="https://checkout-demo.airwallex.com/assets/elements.bundle.min.js"></script>
  <?php } else { ?>
    <script src="https://checkout.airwallex.com/assets/elements.bundle.min.js"></script>
  <?php } ?>


  <link rel="stylesheet" href="/template-common/checkout6/css/order.css?v=13">
  <link rel="stylesheet" href="/template-common/checkout-common/css/order.css">
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

    .attribute-err {
      display: none;
      font-size: .8rem;
      word-break: break-word;
      color: #cc4b37;
      margin: 0;
    }

    .header-container-title {
      background-color: transparent;
    }

    .header-container-title-content {
      display: none !important;
    }

    .header-img {
      display: block;
    }

    .header-en-img,
    .header-pt-img,
    .header-es-img,
    .header-ja-img {
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

      .header-en-img,
      .header-pt-img,
      .header-es-img,
      .header-ja-img {
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
    (function(c, l, a, r, i, t, y) {
      c[a] = c[a] || function() {
        (c[a].q = c[a].q || []).push(arguments)
      };
      t = l.createElement(r);
      t.async = 1;
      t.src = "https://www.clarity.ms/tag/" + i;
      y = l.getElementsByTagName(r)[0];
      y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "kruepex7cm");
  </script>
</head>

<body>
  <div class="smb-body">
    <div class="header-container">
      <div class="header-container-title">
        <div class="header-container-title-content tc select_quantity_block" style="display: none;"></div>

      </div>
      <div class="header-container-bg"></div>
      <style>
        .header-container-bg {
          background-image: url(<?php echo isset($productBgAttribute->text_value) ? "/storage/" . $productBgAttribute->text_value : "/checkout/onebuy/banners/" . $default_country . "_pc.jpg"; ?>)
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
            background-image: url(<?php echo isset($productBgAttribute_mobile->text_value) ? "/storage/" . $productBgAttribute_mobile->text_value : "/checkout/onebuy/banners/" . $default_country . "_mobile.jpg"; ?>)
          }

          .modal-dialog {
            max-width: 800px;
            /* New width for default modal */
          }

          .paypal-card-submit {
            max-width: 600px;
          }
        }

        @media (max-width:767px) {
          .header-container-bg {
            background-image: url(<?php echo isset($productBgAttribute_mobile->text_value) ? "/storage/" . $productBgAttribute_mobile->text_value : "/checkout/onebuy/banners/" . $default_country . "_mobile.jpg"; ?>)
          }

          .modal-dialog {
            max-width: 600px;
            /* New width for default modal */
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
                  <img src="/template-common/checkout1/images/stick-gr-dk.png" />
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
                  <img src="/template-common/checkout1/images/no-2.png" />
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
                  <img src="/template-common/checkout1/images/no-3.png" />
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
                  <img src="/template-common/checkout1/images/no-4.png" />
                </a>
              </div>
              <div class="main-container-progress-state-content-step-title">
                @lang('onebuy::app.product.step.Place Order') </div>
            </div>
          </div>
        </div>
      </div>
      <div class="product-wrapper">
        <div class="product-content">
          <div class="checkout-security">
            <div class="checkout-security-title">
              <img class="checkout-security-title-img" src="/template-common/checkout1/images/secure-checkout.png" />
              <div class="checkout-security-title-font">
                @lang('onebuy::app.product.order.Secure Checkout') </div>
            </div>
            <img class="checkout-security-img" src="/template-common/checkout1/images/secure-icons.png?v=1114" />
          </div>
          <div class="product-list js-list">
            <?php foreach ($package_products as $key => $package_product) { ?>
              <div data-id="<?php echo $package_product['id']; ?>" class="list-item js-list-item item-<?php echo $key + 5; ?><?php if ($key == 0) { ?> list-item--checked <?php } ?>" style="order: 0;">
                <?php if ($key == 0) { ?>
                  <div class="recommend_deal" style="display:flex;">
                    <img class="recommend_deal_img" src="/template-common/checkout1/images/star.png">
                    <div class="recommend_deal_font">
                      @lang('onebuy::app.product.order.RECOMMENDED DEAL') </div>
                  </div>
                <?php } ?>
                <div class="list-item-content">
                  <div class="list-item-title">
                    <span class="list-item-title-name js-name" style="font-weight:bold;">
                      <?php echo $package_product['name']; ?> <br />
                    </span>
                  </div>
                  <div class="list-item-footer">
                    <div class="list-item-prices">
                      <div class="old-price">
                        <?php echo $package_product['old_price_format']; ?> </div>
                      <div class="new-price" style="margin-left: 5px;">
                        <?php echo $package_product['new_price_format']; ?> </div>
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

                    @media (max-width:1023px) {
                      .summary-wrapper {
                        box-shadow: 1px 2px 3px 0 rgb(0 0 0 / 31%);
                        background-color: #fff;
                        padding: 0;
                        position: relative;
                        overflow: hidden;
                        border-radius: 15px !important;
                        /* background-image: linear-gradient(white, white), linear-gradient(180deg, #bd8f2f 0, #f9f1b2 66%, #bd8f2f 100%) !important; */
                        background-origin: border-box !important;
                        background-clip: content-box, border-box !important;
                        border: double 3px transparent !important;
                      }

                      .summary-list-item {
                        margin: 0px, 5px;
                      }

                      .summary-total {
                        margin: 10px -3px 0;
                        padding: 7px 15px;
                      }
                    }
                  </style>
                  <div class="tip_wrapper tip1_wrapper_0">
                    <img src="/template-common/checkout1/images/checkmark.png">
                    <div class="tip1 js-tip1"><?php echo $package_product['tip1']; ?>@lang("onebuy::app.product.Savings")</div>
                    <img style="margin-left: 10px;" src="/template-common/checkout1/images/checkmark.png">
                    <div class="tip1 js-tip1"><?php echo $package_product['tip2']; ?>@lang("onebuy::app.product.piece")</div>
                  </div>
                  <!-- <div class="tip_wrapper tip2_wrapper_0">
                    
                  </div> -->
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="attribute-select">
          </div>
          <div class="split-line shipping_information_paypal_block" style="padding-top:20px;">
            <div style="left: 0 \9;top: 8px \9;width: 100% \9; font-size:20px;">
              @lang('onebuy::app.product.order.Express Checkout') </div>
          </div>
          <div class="paypal-wrapper" style="display:block;text-align:-webkit-center;padding: 0;margin-top: 10px;margin: 0;">
            <div id="paypal-error" style="color:#e51f28;display:none"></div>
            <div class="paypal-card-submit" id="paypal-card-submit"></div>
          </div>
        </div>
      </div>
      <div class="shipping-and-payment-wrapper shipping_information_block">
        <div class="shipping-and-payment">
          <br />
          <br />
          <div class="payment-block" style="display:none;">
            <div class="payment-title">
              @lang('onebuy::app.product.order.Or Pay With Credit Card')
            </div>
            <div class="checkout-block" id="checkout-block-up">
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
                    <img src="/template-common/checkout1/images/paypal_creditcard_images_jcb.png" />
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
            <div class="split-line-safe">
              <div class="split-line-safe-content">
                @lang('onebuy::app.product.order.GUARANTEED')<span style="color: #00d2be;">
                  @lang('onebuy::app.product.order.SAFE')</span>
                @lang('onebuy::app.product.order.CHECKOUT') </div>
            </div>
            <img class="payment-img" src="/template-common/checkout1/images/gsc-en.png?v=111" />
          </div>
          <div class="shipping-block" style="max-width:512px;">
            <div class="shipping-title">
              @lang('onebuy::app.product.order.Shipping')</div>
            <div class="shipping-tip">
              @lang('onebuy::app.product.order.Enter your contact information').
            </div>
            <div class="shipping-info-form">
              <form>
                <div class="shipping-info-item">
                  <input onblur="inputBlur()" name="email" type="email" class="shipping-info-input email" />
                  <label id="email-error" class="shipping-info-error">
                  </label>
                  <label class="shipping-info-label">
                    @lang('onebuy::app.product.order.Email') </label>
                </div>
                <div class="shipping-info-item">
                  <input onblur="inputBlur()" name="first_name" class="shipping-info-input first_name" oninput="checkoutName(this)" />
                  <label id="first_name-error" class="shipping-info-error">
                  </label>
                  <label class="shipping-info-label">
                    @lang('onebuy::app.product.order.First Name') </label>
                </div>
                <div class="shipping-info-item">
                  <input onblur="inputBlur()" name="last_name" class="shipping-info-input last_name" oninput="checkoutName(this)" />
                  <label id="last_name-error" class="shipping-info-error">
                  </label>
                  <label class="shipping-info-label">
                    @lang('onebuy::app.product.order.Last Name') </label>
                </div>
                <div class="shipping-info-item">
                  <input onblur="inputBlur()" name="phone_number" type="tel" class="shipping-info-input phone_number" />
                  <label id="phone_number-error" class="shipping-info-error">
                  </label>
                  <label class="shipping-info-label">
                    @lang('onebuy::app.product.order.Phone Number') </label>
                </div>
                <div class="tips" style="color: red">@lang('onebuy::app.product.order.Street Address tips')</div>
                <div class="shipping-info-item">
                  <input onblur="inputBlur()" name="address" class="shipping-info-input address" placeholder />
                  <label id="address-error" class="shipping-info-error">
                  </label>
                  <label class="shipping-info-label">@lang('onebuy::app.product.order.Street Address') </label>
                </div>
                <div class="shipping-info-item">
                  <input onblur="inputBlur()" name="city" class="shipping-info-input city" oninput="checkoutCity(this)" />
                  <label id="city-error" class="shipping-info-error">
                  </label>
                  <label class="shipping-info-label">
                    @lang('onebuy::app.product.order.City') </label>
                </div>
                <div class="shipping-info-item">
                  <select onchange="inputBlur()" class="shipping-info-select" name="country" id="country-select"></select>
                  <label id="country-error" class="shipping-info-error">
                  </label>
                  <label class="shipping-info-label">
                    @lang('onebuy::app.product.order.Country') </label>
                </div>
                <div class="shipping-info-flex">
                  <div class="shipping-info-item shipping-info-flex-half">
                    <select onchange="inputBlur()" class="shipping-info-select" name="state" id="state-select"></select>
                    <label id="state-error" class="shipping-info-error"></label>
                    <label class="shipping-info-label">@lang('onebuy::app.product.order.State/Province') </label>
                  </div>
                  <div class="shipping-info-item shipping-info-flex-half">
                    <input onblur="inputBlur()" name="zip_code" pattern="[0-9]{5}" type="number" class="shipping-info-input zip_code" />
                    <label id="zip_code-error" class="shipping-info-error">
                    </label>
                    <label class="shipping-info-label">@lang('onebuy::app.product.order.Zip/Postal Code')</label>
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
                      <li class="summary-list-item">
                        <span class="js-sku" style="color: gray;"></span>
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
                        @lang('onebuy::app.product.order.I agree with the') <a href="/onebuy/page/refund-policy?locale=<?php echo strtolower($default_country); ?>" class="ajax">
                          @lang('onebuy::app.product.order.Refund policy')</a>
                        & <a href="/onebuy/page/shipping-policy?locale=<?php echo strtolower($default_country); ?>" class="ajax">
                          @lang('checkout::app.v2.Shipping') </a>
                        .
                      </div>
                      <div class="guarantee-block">
                        <img class="guarantee-img" src="/template-common/checkout1/images/warranty-30days.png" />
                        <div class="guarantee-font">
                          <div class="guarantee-tip">
                            <strong>
                              @lang('onebuy::app.product.order.30 DAY GUARANTEE'):
                            </strong>
                            <?php echo $brand; ?> @lang('onebuy::app.product.order.Hatmeo offers 30')
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="big_img_url" big_url="" style="display:none;"></div>

            <div class="shipping-title place_order_block" style="padding-top:10px;">
              @lang('onebuy::app.product.step.Payment')</div>
            <div class="shipping-tip">
              @lang('onebuy::app.product.order.All transactions are secure and encrypted').
            </div>

            @include("onebuy::payments-".strtolower($default_country))

            <script>
              $(document).ready(function() {

                function showBillProvince() {
                  $('#bill-state-select').parent().show();
                  $('#bill-state-select').parent().next().addClass('shipping-info-flex-half');
                }

                function hideBillProvince() {
                  $('#bill-state-select').parent().hide();
                  $('#bill-state-select').parent().next().removeClass('shipping-info-flex-half');
                }

                function updateBillStateSelect(states) {
                  if (states && states.length) {
                    if (!window.states) {
                      showBillProvince();
                    }
                    window.states = states;
                    var t = '<option value="">----</option>';
                    states.forEach(function(e) {
                      t += "<option value=".concat(e.StateCode, ">").concat(e.StateName, "</option>")
                    });

                    $('#bill-state-select').html(t);
                    if (window.state_select) {
                      $('#bill-state-select').val(window.state_select);
                      $('#bill-state-select').change();
                      window.state_select = '';
                    }
                  } else {
                    window.states = false;
                    hideBillProvince();
                  }
                }

                function getBillStateSelect() {
                  if ($("#bill-country-select").val()) {
                    getBillCountryStates(updateBillStateSelect);

                  }
                }

                function getBillCountryStates(callback) {
                  var url = '/template-common/checkout1/state/' + $("#bill-country-select").val().toLowerCase() + '_{{ app()->getLocale() }}' + '.json';
                  fetch(url, {
                      method: 'GET',
                    })
                    .then(function(data) {
                      return data.json()
                    }).then(function(data) {
                      callback(data)
                    }).catch(function(err) {
                      callback()
                    })
                }



                $("#shipping_address_other").on("click", function() {

                  if ($("#shipping_address_other").is(':checked')) {
                    $("#bill_address").show();
                    window.shipping_address = "other";
                  } else {
                    $("#bill_address").hide();
                    window.shipping_address = "default";
                  }
                  console.log(" shipping address " + window.shipping_address);
                  //copy the data info to bill address

                  var $options = $("#country-select > option").clone();

                  $('#bill-country-select').append($options);

                  $('#bill-country-select').on('change', function() {
                    getBillStateSelect();
                  })

                  getBillStateSelect(); // 

                  window.shipping_address = "other";

                })

                $("#shipping_address_default").on("click", function() {
                  $("#bill_address").hide();
                  window.shipping_address = "default";
                })

                <?php if ($payments_default == 'airwallex-klarna') { ?>

                  $("#collapseThree").show();
                  $("#headingThree2").addClass("action");
                  $("#payment-button").addClass("airwallex-pay");

                <?php } elseif ($payments_default == 'payal_standard') { ?>
                  $("#collapseTwo").show();
                  $("#headingOne2").addClass("action");

                <?php } elseif ($payments_default == 'payment_method_airwallex') { ?>
                  $("#collapseOne").show();
                  $("#headingOne1").addClass("action");

                <?php } ?>

                $("#payment_method_airwallex").on("click", function() {
                  console.log("click headingOne ");
                  $("#collapseOne").show();
                  $("#collapseTwo").hide();
                  $("#collapseThree").hide();
                  $("#airwallex_dropin_collapse").hide();

                  $("#headingOne1").addClass("action");
                  $("#headingThree2").removeClass("action");
                  $("#headingOne2").removeClass("action");
                  $("#airwallex_dropin_2").removeClass("action");

                  $("#payment-button").addClass("submit-button");

                  $("#payment-button").html("@lang('onebuy::app.product.payment.complete_secure_purchase')");

                });

                $("#payal_standard").on("click", function() {
                  $("#collapseOne").hide();
                  $("#collapseTwo").show();
                  $("#collapseThree").hide();
                  $("#airwallex_dropin_collapse").hide();

                  $("#headingOne2").addClass("action");
                  $("#headingOne1").removeClass("action");
                  $("#headingThree2").removeClass("action");
                  $("#airwallex_dropin_2").removeClass("action");

                  $("#payment-button").removeClass("submit-button");

                  $("#payment-button").css("width", "500px");

                  //payment-button
                  $("#payment-button").empty();


                  paypal.Buttons({
                    style: {
                      layout: 'horizontal',
                      tagline: false,
                      height: 55
                    },

                    onInit(data, actions) {

                      // Disable the buttons
                      actions.disable();

                      // Listen for changes to the checkbox
                      // document.querySelector('#check').addEventListener('change', function(event) {
                      //     // Enable or disable the button when it is checked or unchecked
                      //     if (event.target.checked)  {
                      //     actions.enable();
                      //     } else  {
                      //     actions.disable();
                      //     }
                      // });
                      var params = getOrderParams('paypal_stand');

                      var can_paypal = 0;
                      var email_can = 0;
                      var first_name_can = 0;
                      var last_name_can = 0;
                      var phone_number_can = 0;
                      var address_can = 0;
                      var city_can = 0;
                      var zip_code_can = 0;



                      $(".email").on('change', function() {
                        var value = $(".email").val();
                        if (value.length > 0) email_can = 1;
                        console.log(value);
                        var params = getOrderParams('paypal_stand');
                        if (!params.error) {
                          actions.enable();
                        }
                      });

                      $(".first_name").on('change', function() {
                        var value = $(".first_name").val();
                        if (value.length > 0) first_name_can = 1;
                        console.log(value);
                        var params = getOrderParams('paypal_stand');
                        if (!params.error) {
                          actions.enable();
                        }
                      });

                      $(".last_name").on('change', function() {
                        var value = $(".last_name").val();
                        if (value.length > 0) last_name_can = 1;
                        console.log(value);
                        var params = getOrderParams('paypal_stand');
                        if (!params.error) {
                          actions.enable();
                        }
                      });
                      $(".phone_number").on('change', function() {
                        var value = $(".phone_number").val();
                        if (value.length > 0) phone_number_can = 1;
                        console.log(value);
                        var params = getOrderParams('paypal_stand');
                        if (!params.error) {
                          actions.enable();
                        }
                      });
                      $(".address").on('change', function() {
                        var value = $(".address").val();
                        if (value.length > 0) address_can = 1;
                        console.log(value);
                        var params = getOrderParams('paypal_stand');
                        if (!params.error) {
                          actions.enable();
                        }
                      });
                      $(".city").on('change', function() {
                        var value = $(".city").val();
                        if (value.length > 0) city_can = 1;
                        console.log(value);
                        var params = getOrderParams('paypal_stand');
                        if (!params.error) {
                          actions.enable();
                        }
                      });
                      $(".zip_code").on('change', function() {
                        var value = $(".zip_code").val();
                        if (value.length > 0) zip_code_can = 1;
                        console.log(value);
                        var params = getOrderParams('paypal_stand');
                        if (!params.error) {
                          actions.enable();
                        }
                      });

                      $("#state-select").on('change', function() {
                        var params = getOrderParams('paypal_stand');
                        if (!params.error) {
                          actions.enable();
                        }
                      })



                      if (params.error) {
                        //$('#checkout-error').html(params.error.join('<br />'));
                        //$('#checkout-error').show();
                        actions.disable();
                        //throw new Error('Verification failed');
                      } else {
                        actions.enable();
                      }
                    },
                    onError(err) {
                      $('#loading').hide();
                      console.log("paypal " + JSON.stringify(err));
                    },
                    onCancel: function(data) {
                      $('#loading').hide();
                    },
                    onClick() {
                      var params = getOrderParams('paypal_stand');
                      console.log("on click " + JSON.stringify(params));
                      if (params.error) {
                        $('#checkout-error').html(params.error.join('<br />'));
                        $('#checkout-error').show();
                      }


                      console.log("post crm system");

                      // params = {
                      //     "channel_id": "<?php echo $crm_channel; ?>",
                      //     "token": "<?php echo $refer; ?>",
                      //     "type": 2
                      // };
                      // fetch('https://crm.heomai.com/api/user/action',{
                      //         body: JSON.stringify(params),
                      //         method: 'POST',
                      //         headers: {
                      //             'content-type': 'application/json'
                      //         },
                      // })

                    },

                    // Call your server to set up the transaction
                    createOrder: function(data, actions) {
                      $('#loading').show();
                      var params = getOrderParams('paypal_stand');
                      var url = '/onebuy/order/addr/after?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime() + "&force=" + localStorage.getItem("force");
                      return fetch(url, {
                        body: JSON.stringify(params),
                        method: 'POST',
                        headers: {
                          'content-type': 'application/json'
                        }
                      }).then(function(res) {
                        return res.json();
                      }).then(function(res) {
                        crmTrack('add_pay')
                        //$('#loading').hide();
                        var data = res;
                        if (data.statusCode === 201) {
                          var order_info = data.result;
                          //console.log(order_info);
                          //console.log(order_info.purchase_units[0].amount);
                          // document.cookie = "voluum_payout=" + order_info.purchase_units[0].amount.value + order_info.purchase_units[0].amount.currency_code + "; path=/";
                          // document.cookie = "order_id=" + order_info.id + "; path=/";
                          localStorage.setItem("order_id", order_info.id);
                          // localStorage.setItem("order_params", JSON.stringify(params));

                          return order_info.id;
                        } else {
                          if (data.code == '202') {
                            if (confirm(data.error) == true) {
                              localStorage.setItem("force", 1);
                            }
                          }

                          var pay_error = JSON.parse(data.error);
                          var pay_error_message = pay_error.details;

                          if (pay_error_message && pay_error_message.length) {
                            var show_pay_error_message_arr = [];

                            for (var pay_error_message_i = 0; pay_error_message_i < pay_error_message.length; pay_error_message_i++) {
                              show_pay_error_message_arr.push("Field:" + pay_error_message[pay_error_message_i].field + "<br /> Value" + pay_error_message[pay_error_message_i].value + '. <br />' + pay_error_message[pay_error_message_i].description + '<br /><br />')
                            }

                            $('#checkout-error').html(show_pay_error_message_arr.join(''));
                            $('#checkout-error').show();
                          }
                        }


                      });
                    },

                    // Call your server to finalize the transaction
                    onApprove: function(data, actions) {

                      var orderData = {
                        paymentID: data.orderID,
                        orderID: data.orderID,
                      };
                      var request_params = {
                        client_secret: data.orderID,
                        id: localStorage.getItem('order_id'),
                        orderData: orderData,
                        data: data,
                      }
                      $('#loading').show();
                      var url = "/onebuy/order/status?_token={{ csrf_token() }}";
                      return fetch(url, {
                        method: 'post',
                        body: JSON.stringify(request_params),
                        headers: {
                          'content-type': 'application/json'
                        },
                      }).then(function(res) {
                        return res.json();
                      }).then(function(res) {
                        $('#loading').hide();
                        if (res.success == true) {
                          //Goto('/checkout/v1/success/'+localStorage.getItem('order_id'));
                          window.location.href = '/onebuy/checkout/v1/success/' + localStorage.getItem('order_id');
                          return true;
                          //actions.redirect('/checkout/v1/success/'+localStorage.getItem('order_id'));
                        }
                        if (res.error == 'INSTRUMENT_DECLINED') {

                          $('#checkout-error').html("The instrument presented  was either declined by the processor or bank, or it can't be used for this payment.<br><br> Please confirm your account or bank card has sufficient balance, and try again.");
                          $('#checkout-error').show();
                        }
                      });
                    }
                  }).render('#payment-button');

                });

                $("#airwallex-klarna").on("click", function() {
                  $("#collapseOne").hide();
                  $("#collapseTwo").hide();
                  $("#collapseThree").show();
                  $("#airwallex_dropin_collapse").hide();

                  $("#headingThree2").addClass("action");
                  $("#headingOne1").removeClass("action");
                  $("#headingOne2").removeClass("action");
                  $("#airwallex_dropin_2").removeClass("action");

                  $("#payment-button").addClass("submit-button");

                  $("#payment-button").html("@lang('onebuy::app.product.payment.complete_secure_purchase')");

                })

                $('#airwallex_dropin').on("click", function() {
                  $("#collapseOne").hide();
                  $("#collapseTwo").hide();
                  $("#collapseThree").hide();
                  $("#airwallex_dropin_collapse").show();

                  $("#airwallex_dropin_2").addClass("action");
                  $("#headingThree2").removeClass("action");
                  $("#headingOne1").removeClass("action");
                  $("#headingOne2").removeClass("action");
                })

                $("#payment-button").on("click", function() {
                  var payment_method = $('input[name=payment_method]:checked', '#myForm').val();
                  var shipping_address = $('input[name=shipping_address]:checked', '#myForm').val(); //shipping address chose

                  if ($("#shipping_address_other").is(':checked')) {
                    //$("#bill_address").show();
                    window.shipping_address = "other";
                    shipping_address = window.shipping_address;
                  } else {
                    //$("#bill_address").hide();
                    window.shipping_address = "default";
                    shipping_address = window.shipping_address;
                  }

                  window.shipping_address = shipping_address;
                  console.log("payment method" + payment_method);
                  console.log("shipping address" + shipping_address);

                  if (payment_method == "airwallex") {
                    var id_card = $("#id_card").val();
                    var id_expiry = $("#id_expiry").val();
                    var id_cvc = $("#id_cvc").val();
                    console.log(id_card);
                    console.log(id_expiry);
                    console.log(id_cvc);
                    if (id_card != "true" && id_expiry != "true" && id_cvc != "true") {

                      if (id_card != "true") $("#cardExpiry").addClass("shipping-info-input-error");
                      if (id_expiry != "true") $("#cardNumber").addClass("shipping-info-input-error");
                      if (id_cvc != "true") $("#cardCvc").addClass("shipping-info-input-error");
                      return false;
                    }
                    console.log("airwallex-pay");
                    gtag('event', 'initiate_airwallex_checkout', {
                      'event_label': 'Initiate airwallex Checkout',
                      'event_category': 'ecommerce'
                    });
                  }
                  if (payment_method == "paypal_standard") {
                    gtag('event', 'initiate_paypal_standard_checkout', {
                      'event_label': 'Initiate paypal_standard Checkout',
                      'event_category': 'ecommerce'
                    });
                    //fbq('track', 'InitiateCheckout');

                    window.pay_type = "paypal_standard";
                    window.is_paypal_standard = true;
                    console.log("paypal standard payment " + window.pay_type);
                    console.log("paypal standard payment " + window.is_paypal_standard);
                  }
                  if (payment_method == 'airwallex_dropin') {
                    gtag('event', 'initiate_airwallex_dropin_checkout', {
                      'event_label': 'Initiate airwallex_dropin Checkout',
                      'event_category': 'ecommerce'
                    });
                    //fbq('track', 'InitiateCheckout');

                    window.pay_type = "airwallex_dropin";
                    window.is_airwallex_dropin = true;
                    console.log("airwallex_dropin payment " + window.airwallex_dropin);
                    console.log("airwallex_dropin payment " + window.is_airwallex_dropin);
                  }
                  if (payment_method == 'airwallex-klarna') {
                    gtag('event', 'initiate_airwallex_klarna_checkout', {
                      'event_label': 'Initiate airwallex_klarna Checkout',
                      'event_category': 'ecommerce'
                    });
                    window.pay_tpe = "airwallex_klarna";
                    window.is_airwallex_klarna = true;

                  }
                  if (payment_method == 'airwallex_dropin') {
                    gtag('event', 'initiate_airwallex_dropin_checkout', {
                      'event_label': 'Initiate airwallex_dropin Checkout',
                      'event_category': 'ecommerce'
                    });
                    window.pay_tpe = "airwallex_dropin";
                    window.is_airwallex_klarna = true;
                  }



                  checkout();
                })
              });
            </script>


            <div id="pay-after-warpper"></div>
            <div class="summary-footer summary-footer-mb">
              <div class="agree-block">
                <input type="checkbox" checked>
                @lang('onebuy::app.product.order.I agree with the') <a href="/onebuy/page/refund-policy?locale=<?php echo strtolower($default_country); ?>" class="ajax">
                  @lang('onebuy::app.product.order.Refund policy') </a>
                & <a href="/onebuy/page/shipping-policy?locale=<?php echo strtolower($default_country); ?>" class="ajax">
                  @lang('checkout::app.v2.Shipping') </a>
                .
              </div>

              <div class="guarantee-block">
                <img class="guarantee-img" src="/template-common/checkout1/images/warranty-30days.png" />
                <div class="guarantee-font">
                  <div class="guarantee-tip">
                    <strong>
                      @lang('onebuy::app.product.order.30 DAY GUARANTEE'):
                    </strong>
                    <?php echo $brand; ?> @lang('onebuy::app.product.order.Hatmeo offers 30')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="/template-common/js/myFoldpanel.js"></script>
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
      <div class="faqandcommon">
        <section class="main">
          <div class="row">
            @include('onebuy::comments/v2')
            @include('onebuy::faqs/v2')
          </div>
        </section>
      </div>


    </div>
    @include('onebuy::footer-container-'.strtolower($default_country))
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
          <br />
          just purchased:
          <strong class="comment-productName">product name</strong>
        </div>
        <div class="comment-time">@lang('onebuy::app.product.order.JUST NOW') </div>
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
      background: rgba(0, 0, 0, 0.6);
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
      background: rgba(0, 0, 0, 0.6);
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
      flex: 1;
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
      background: rgba(0, 0, 0, 0.6);
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
    function crmTrack(type) {
      console.log(type, 'crmTrack')
      var postParams = {
        channel_id: "<?php echo $crm_channel; ?>",
        token: "<?php echo $refer; ?>",
        type: type
      };
      console.log(JSON.stringify(postParams), 'JSON.stringify(postParams)==')
      fetch('https://crm.heomai.com/api/user/action', {
        body: JSON.stringify(postParams),
        method: 'POST',
        headers: {
          'content-type': 'application/json'
        },
      })
    }
    var products = <?php echo json_encode($package_products); ?>;
    var product_names = products.map(function(item) {
      return item.name
    })
    var comment_setting = {
      "productNames": product_names,
      "firstNames": ["James", "Mary", "Robert", "Jennifer", "Michael", "Elizabeth", "Thomas", "Nancy", "Charles"],
      "lastNames": ["A", "B", "C", "D", "E", "F", "G", "H", "K", "L", "M", "N", "O", "P", "R", "S", "T", "V", "W", "Y"],
      "locations": ["Florida, US", "North Carolina, US", "New York, US", "Washington, US", "Texas, US", "Kentucky, US", "North Coast, CA", "Central Coast, CA", "Klamath Mountains, CA", "Central Sierra, CA", "Central California, CA"]
    };

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
    window.mobileCheck = function() {
      let check = false;
      (function(a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
      })(navigator.userAgent || navigator.vendor || window.opera);
      return check;
    };

    if (window.mobileCheck == false) {
      setComment(comment_setting)
      var commentInterval = setInterval(function() {
        setComment(comment_setting), /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && clearInterval(commentInterval)
      }, 15000000 + 5400)
    }
  </script>
  <script>
    function getSelectProduct() {
      var selected_id = $('.list-item--checked').data('id');
      var products = <?php echo json_encode($package_products); ?>;

      for (var i = 0; i < products.length; i++) {
        var product = products[i];
        if (product.id == selected_id) {
          return product;
        }
      }

      return false;
    }

    function getFormatPrice(price) {
      var price_template = '{{ core()->currencySymbol(core()->getCurrentCurrencyCode()) }}price',
        price_prefix = '';
      if (price * 1 < 0) {
        price = Math.abs(price);
        price_prefix = '-';
      }

      return price_prefix + price_template.replace('price', (price * 1).toFixed(2));
    }
  </script>
  <script>
    $('.shipping-info-item input, .shipping-info-item select').on('change', function() {
      var value = $(this).val();
      if (value) {
        $(this).addClass("shipping-info-exist-value");
        $(this).removeClass('shipping-info-input-error');
        $(this).parent().find('.shipping-info-error').hide();
      } else {
        $(this).removeClass("shipping-info-exist-value");
      }

      if ($(this).attr('id') == 'country-select') {
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

      var cur_country = '<?php echo $default_country; ?>';
      if (cur_country) {
        $('#country-select').val(cur_country);
        $('#country-select').parent(".shipping-info-item").find(".shipping-info-label").css({
          "font-size": "0.8rem",
          top: "5px"
        })
        getStateSelect();
      }
    }

    function updateStateSelect(states) {
      if (states && states.length) {
        if (!window.states) {
          showProvince();
        }
        window.states = states;
        var t = '<option value="">----</option>';
        states.forEach(function(e) {
          t += "<option value=".concat(e.StateCode, ">").concat(e.StateName, "</option>")
        });

        $('#state-select').html(t);
        if (window.state_select) {
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
      if ($("#country-select").val()) {
        getCountryStates(updateStateSelect);

      }
    }

    function getCountryStates(callback) {
      var url = '/template-common/checkout1/state/' + $("#country-select").val().toLowerCase() + '_{{ app()->getLocale() }}' + '.json';
      fetch(url, {
          method: 'GET',
        })
        .then(function(data) {
          return data.json()
        }).then(function(data) {
          callback(data)
        }).catch(function(err) {
          callback()
        })
    }

    //fetch('/api/core/countries',{
    fetch('/template-common/checkout1/state/countries_<?php echo strtolower($default_country); ?>.json', {
        method: 'GET',
      })
      .then(function(data) {
        return data.json()
      }).then(function(data) {
        //console.log(data);
        updateCountrySelect(data)
      })
  </script>
  <script>
    function setAttributeTemplate(select_language, select_language_after, has_img_attribute_id, is_more_attribute, template, attribute_err_language) {
      var product_attributes = JSON.parse(JSON.stringify(window.product_attributes));
      // console.log("product_attributes");
      // console.log(product_attributes);
      // console.log(select_language);
      // //console.log(product_attribute.name);
      // console.log(select_language_after);
      var product_template = '<div class="attribute-item">';
      if (is_more_attribute) {
        product_template += '<div class="attribute-item-title">{article}</div>';
      }
      var show_image = '';
      var show_large_image = '';

      for (var i = 0; i < product_attributes.length; i++) {
        var product_attribute = product_attributes[i];
        product_template += '<div class="attribute_item_wrapper">';
        product_template += '<div class="attribute-value-item-title">' + select_language + ' ' + (product_attribute.label || '') + select_language_after;

        if (product_attribute.tip) {
          product_template += ' <span style="text-decoration: underline;font-size: 14px;cursor:pointer;color:#0000ff;" onclick="showImgProp(&quot;' + "/storage/" + product_attribute.tip_img + '&quot;)">' + product_attribute.tip + '</span>'
        }

        product_template += '</div>';
        // product_template += '<select class="attribute-value-item-select attribute_select" onchange="attributeChange(this, '+(product_attribute.id == has_img_attribute_id)+', '+"'"+template+"'"+')" '+(product_attribute.id==has_img_attribute_id? ' data-has-img="true"' : '' )+'><option value="" '+ (!product_attribute.selected_option_id ? 'selected' : '') +' url="'+product_attribute.options[0].image+'"></option>';
        product_template += '<select class="attribute-value-item-select attribute_select" onchange="attributeChange(this, ' + (product_attribute.id == has_img_attribute_id) + ', ' + "'" + template + "'" + ')" ' + (product_attribute.id == has_img_attribute_id ? ' data-has-img="true"' : '') + '>';
        if (product_attribute.id == has_img_attribute_id && !product_attribute.selected_option_id) {
          show_image = product_attribute.options[0].image;
          show_large_image = product_attribute.options[0].large_image;
          //console.log("img 0");
          //console.log(product_attribute.options[0]);
        }
        console.log("attr id " + product_attribute.id);

        for (var j = 0; j < product_attribute.options.length; j++) {
          var product_attribute_option = product_attribute.options[j];
          product_template += '<option id="' + product_attribute_option.id + '" value="' + product_attribute_option.name + '" ' + (product_attribute_option.id == product_attribute.selected_option_id ? 'selected' : '') + ' url="' + product_attribute_option.image + '" ' + (product_attribute_option.is_sold_out ? ' data-is-sold-out="true" ' : '') + '>' + product_attribute_option.name + '</option>';
          if (product_attribute_option.id == product_attribute.selected_option_id && product_attribute.id == has_img_attribute_id) {
            show_image = product_attribute_option.image;
            show_large_image = product_attribute_option.large_image;
            //console.log("img 2");
            //console.log(product_attribute_option);
          }
          console.log("attr options id " + product_attribute_option.id + " value" + product_attribute_option.name);
        }
        //console.log("large_image" + show_large_image)

        product_template += '</select>';
        if (template == 'common15') {
          product_template += '<p class="attribute-err">' + attribute_err_language + '</p>'
        }
        product_template += '</div>';

        if (product_attribute.id == has_img_attribute_id && show_image) {


          product_template += '<div class="img-wrapper"><img src="' + show_image + '" class="show_big_img" /></div>'
        }
      }
      //console.log(product_template);
      window.product_template = product_template;
    }

    function getCurAttributeSelect(article_str) {
      if (!article_str) {
        article_str = 'PAIR';
      }
      var amount = $('.attribute-select .attribute-item').length + 1;
      return window.product_template.replace('{article}', article_str + ' ' + amount)
    }

    function showAttributeSelecet(article_str) {
      var product_info = getSelectProduct();
      if (!product_info) {
        setTimeout(function() {
          showAttributeSelecet();
        }, 100)
        return;
      }

      var cur_amount = $('.attribute-select .attribute-item').length;
      var product_amount = product_info.amount;

      var handle = null;
      if (product_amount - cur_amount > 0) {
        handle = function() {
          $('.attribute-select').append(getCurAttributeSelect(article_str));
        }
      } else {
        handle = function() {
          $('.attribute-select .attribute-item')[$('.attribute-select .attribute-item').length - 1].remove();
        }
      }
      for (var i = 0; i < Math.abs(product_amount - cur_amount); i++) {
        handle();
      }
    }

    function attributeChange(target, is_img_attribute, template) {
      crmTrack('add_cart')
      console.log("attributeChange")
      console.log(target);
      console.log(is_img_attribute);
      console.log(template);
      // console.log(target.find('option:selected'));
      if (template == 'common5') {
        changeHtmlShow();
      }
      if (template == 'common15' && isProductSoldOut) {

        isProductSoldOut();
      }
      if (is_img_attribute) {
        var attribute_img = $(target).find('option:selected').attr('url');
        $("#big_img_url").attr("big_url", attribute_img);
        $(target).parent().next().find('img').attr('src', attribute_img);

      }

      changeOrderSummary("sku_select");


    }

    function isProductSoldOut() {
      var is_sold_out = false;
      var attribute_item = $('.attribute-select .attribute-item');
      for (var i = 0; i < attribute_item.length; i++) {
        var option_select = $(attribute_item[i]).find('.attribute_select  option:selected');
        for (var j = 0; j < option_select.length; j++) {
          $(option_select[j]).parent().parent().find('.attribute-err').hide();
          if ($(option_select[j]).data('is-sold-out')) {
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
        if (url.indexOf('cko-session-id') > -1) {
          var new_url = url.substr(1);
          var new_url_arr = new_url.split('&');
          for (var new_url_arr_index = 0; new_url_arr_index < new_url_arr.length; new_url_arr_index++) {
            var new_url_one = new_url_arr[new_url_arr_index];
            if (new_url_one.indexOf('cko-session-id') > -1) {
              new_url_arr.splice(new_url_arr_index, 1);
            }
          }

          url = '?' + new_url_arr.join('&');
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

    $(document).ready(function() {
      $(".show_big_img").click(function() {
        //console.log("click...");
        img = $(this).attr('src');
        //console.log(img);
        showImgProp(img)
      });

      $(document).on("click", ".show_big_img", function() {
        //console.log("click...");
        img = $(this).attr('src');
        //console.log(img);
        showImgProp(img)
      });

    });


    function showImgProp2() {
      img = $(this).attr("img");
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
    function isMobile() {
      var userAgent = navigator.userAgent || navigator.vendor || window.opera;
      var isTouchDevice = 'ontouchstart' in document.documentElement;
      var screenWidth = window.innerWidth;

      var isMobileDevice = /android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(userAgent);
      var isSmallScreen = screenWidth < 768;

      return (isTouchDevice && isSmallScreen) || isMobileDevice;
    }
    window.product_attributes = <?php echo json_encode($product_attributes); ?>;

    var is_more_attribute = 1;
    setAttributeTemplate("@lang('onebuy::app.product.order.SELECT YOUR')", '', '23', is_more_attribute ? true : false, 'common15', 'Sold out, please select another Attributes');
    if (isMobile()) {
      console.log('mobile============');
      $('.attribute-select').remove()
      $('.item-5').after('<div class="attribute-select"></div>')

    }
    showAttributeSelecet("@lang('onebuy::app.product.order.Item')");
  </script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gtag; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    <?php if (empty($refer)) { ?>
      gtag('config', '<?php echo $gtag; ?>', {
        "debug_mode": true
      });
    <?php } else { ?>
      gtag('config', '<?php echo $gtag; ?>', {
        "user_id": "<?php echo $refer; ?>",
        "debug_mode": true
      });
    <?php } ?>
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
    window.is_airwallex_klarna = pay_type == "airwallex_klarna" ? true : false;

    var currency = '{{ core()->getCurrentCurrencyCode() }}';
    var paypal_pay_acc = "<?php echo $paypal_client_id; ?>"; // test

    var script = document.createElement('script');
    if (script.readyState) { // IE
      script.onreadystatechange = function() {
        if (script.readyState === 'loaded' || script.readyState === 'complete') {
          script.onreadystatechange = null;
          creatPaypalCardButton();
        }
      }
    } else { // 其他浏览器
      script.onload = function() {
        creatPaypalCardButton();
      }
    }
    script.type = 'text/javascript';
    // script.src = 'https://www.paypal.com/sdk/js?client-id=Ac3a2fQqrAO_2skbKS4hb5okCBnRUdh_i78Vvjhh-s1xc4fqZc39OyawwGL4kdHGvlPiRsv6CmogaJZz&components=buttons,messages,funding-eligibility&currency='+currency+'&disable-funding=paylater';
    script.src = 'https://www.paypal.com/sdk/js?client-id=' + paypal_pay_acc + '&components=buttons,messages,funding-eligibility&currency=' + currency;
    // script.src = 'https://www.paypal.com/sdk/js?client-id=AUbkpTo_D9-l80qERS91ipcrXuIfSC3WMmFbK7Ey4n8RS3TaoJDw8H2rpxdhsWBIZWZbb6E3V7CSmK4R&components=buttons,messages,funding-eligibility&currency='+currency+'&disable-funding=paylater';
    script.async = 1;
    document.body.appendChild(script);

    function creatPaypalCardButton() {
      var that = this;
      var FUNDING_SOURCES = [{
        fundingSource: paypal.FUNDING.PAYPAL
      }, ]





      FUNDING_SOURCES.forEach(function(item) {
        var error_id = item.error_id;
        var render_id = item.render_id;
        var paypal_type = item.paypal_type;
        var fundingSource = item.fundingSource;



        paypal.Buttons({
          style: {
            layout: fundingSource === paypal.FUNDING.CARD ? 'vertical' : 'horizontal',
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
            var params = getOrderParams(paypal_type || 'paypal');
            if (params.error) {
              $('#' + (error_id || 'paypal-error')).html(params.error.join('<br />'));
              $('#' + (error_id || 'paypal-error')).show();
              throw new Error('Verification failed');
            }
            var url = '/onebuy/order/addr/after?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime() + "&force=" + localStorage.getItem("force");
            $('#loading').show();
            $('#' + (error_id || 'paypal-error')).hide();

            return fetch(url, {
                body: JSON.stringify(params),
                method: 'POST',
                headers: {
                  'content-type': 'application/json'
                },
              })
              .then(function(res) {
                return res.json()
              })
              .then(function(res) {
                crmTrack('add_pay')
                //$('#loading').hide();
                var data = res;
                //console.log(data)
                if (data.statusCode === 201) {
                  var order_info = data.result;
                  //console.log(order_info);
                  //console.log(order_info.purchase_units[0].amount);
                  // document.cookie = "voluum_payout=" + order_info.purchase_units[0].amount.value + order_info.purchase_units[0].amount.currency_code + "; path=/";
                  // document.cookie = "order_id=" + order_info.id + "; path=/";
                  localStorage.setItem("order_id", order_info.id);
                  // localStorage.setItem("order_params", JSON.stringify(params));

                  return order_info.id;
                } else {

                  if (data.code == '202') {
                    if (confirm(data.error) == true) {
                      localStorage.setItem("force", 1);
                    }
                  }


                  var pay_error = JSON.parse(data.error);
                  var pay_error_message = pay_error.details;

                  if (pay_error_message && pay_error_message.length) {
                    var show_pay_error_message_arr = [];

                    for (var pay_error_message_i = 0; pay_error_message_i < pay_error_message.length; pay_error_message_i++) {
                      show_pay_error_message_arr.push("Field:" + pay_error_message[pay_error_message_i].field + "<br /> Value" + pay_error_message[pay_error_message_i].value + '. <br />' + pay_error_message[pay_error_message_i].description + '<br /><br />')
                    }

                    $('#' + (error_id || 'paypal-error')).html(show_pay_error_message_arr.join(''));
                    $('#' + (error_id || 'paypal-error')).show();
                  }
                }
              })
          },

          // Call your server to finalize the transaction
          /**
           * @link https://developer.paypal.com/demo/checkout/#/pattern/server
           * 
           */
          onApprove: function(data, actions) {
            //console.log("on app rove");
            if (!data.orderID) {
              throw new Error('orderid is not exisit');
            }
            var orderData = {
              paymentID: data.orderID,
              orderID: data.orderID,
            };
            var request_params = {
              client_secret: data.orderID,
              id: localStorage.getItem('order_id'),
              orderData: orderData,
              data: data,
            }
            var request = '';
            for (var i = 0; i < Object.keys(request_params).length; i++) {
              request += Object.keys(request_params)[i] + '=' + request_params[Object.keys(request_params)[i]] + '&';
            }
            request = request.substr(0, request.length - 1);
            //console.log(request);


            var url = "/onebuy/order/status?_token={{ csrf_token() }}&currency={{ core()->getCurrentCurrencyCode() }}";

            $('#loading').show();
            return fetch(url, {
                method: 'post',
                body: JSON.stringify(request_params),
                headers: {
                  'content-type': 'application/json'
                },
              })
              .then(function(res) {
                return res.json()
              })
              .then(function(res) {

                $('#loading').hide();

                var errorDetail = Array.isArray(res.details) && res.details[0];

                if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                  return actions.restart(); // Recoverable state, per:
                  // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                }

                if (errorDetail) {
                  var msg = 'Sorry, your transaction could not be processed.';
                  if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                  if (res.debug_id) msg += ' (' + res.debug_id + ')';
                  return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                }

                //console.log(res);

                if (res.success == true) {
                  window.location.href = '/onebuy/checkout/v1/success/' + localStorage.getItem('order_id');
                  return true;
                  //actions.redirect('/checkout/v1/success/'+localStorage.getItem('order_id'));
                }
                if (res.error == 'INSTRUMENT_DECLINED') {
                  $('#' + (error_id || 'paypal-error')).html("The instrument presented  was either declined by the processor or bank, or it can't be used for this payment.<br><br> Please confirm your account or bank card has sufficient balance, and try again.");
                  $('#' + (error_id || 'paypal-error')).show();
                }
              })
          },

          onClick() {

          },

          onError: function(err) {
            console.log('error from the onError callback', err);

            $('#loading').hide();
          },
          onCancel: function(data) {
            $('#loading').hide();
          }

        }).render('#' + (render_id || 'paypal-card-submit'));
      })
    }


    function onCardTokenized(event) {
      $('#loading').hide();
      if (event.token) {
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
      if (order_id) {
        var url = '/order/pay/fail_notice';
        var params = {
          id: order_id,
          pay_type: pay_type,
        };
        fetch(url, {
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
        product_name: product.name,
        product_price: product.new_price,
        product_sku: '',
        product_id: '<?php echo $product->id; ?>',
        sku_id: '',
        currency: '{{ core()->getCurrentCurrencyCode() }}',
        shipping_fee: shipping_fee,
        amount: product.amount,
        product_image: "{{ $productBaseImage['small_image_url'] }}"
      };

      var total = product_info.product_price * 1 + product_info.shipping_fee * 1;

      var phone_number = $(".phone_number").val();
      var phone_prefix = getPhonePrefix();



      var products = getSubmitProducts(product_info.product_price, product_info.amount);

      var url = '/api/checkout/cart?_token={{ csrf_token() }}&time=' + new Date().getTime();

      $('#loading').show();
      fetch(url, {
          body: JSON.stringify(products),
          method: 'POST',
          headers: {
            'content-type': 'application/json'
          },
        })
        .then(function(res) {
          return res.json()
        })
        .then(function(res) {
          //console.log(res);
        });

    }


    $(".email").on("focus", function() {
      //console.log("email focus");
    });

    $(".email").on("blur", function() {
      console.log("email blur");
      var email = $(".email").val();
      // if (email.length > 0) {
      //   fbq('track', 'AddPaymentInfo');

      //   params = {
      //     "channel_id": "<?php echo $crm_channel; ?>",
      //     "token": "<?php echo $refer; ?>",
      //     "type": "add_user_info"
      //   };
      //   fetch('https://crm.heomai.com/api/user/action', {
      //     body: JSON.stringify(params),
      //     method: 'POST',
      //     headers: {
      //       'content-type': 'application/json'
      //     },
      //   })

      // }
    });

    function valueIsEmpty() {
      let firstName = $(".first_name").val(),
        secondName = $(".last_name").val(),
        email = $(".email").val(),
        phoneFull = $(".phone_number").val(),
        country = $("#country-select").val(),
        city = $(".city").val(),
        province = $("#state-select").val(),
        address = $(".address").val(),
        code = $(".zip_code").val()
      return firstName && secondName && email && phoneFull && country && city && province && address && code
    }

    function inputBlur() {
      const isEmpty = valueIsEmpty()
      console.log(isEmpty, 'isEmpty');
      if (isEmpty) {
        crmTrack('add_user_info')
      }
    }

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
      if (params.error && params.error.length) {
        $('#checkout-error').html(params.error.join('<br />'));
        $('#checkout-error').show();
        return;
      }

      $('#loading').show();
      $('#checkout-error').hide();



      if (window.is_checkout_pay) {
        Frames.submitCard();
        Frames.enableSubmitForm();
      } else if (window.is_wintopay) {
        cc_form.submit('/post', {}, function(status, data) {
          $('#loading').hide();
          createOrder('', '', 'wintopay', data.json);
        }, function(err) {
          $('#loading').hide();
          console.log(err);
        });
      } else if (window.is_pacypay) {
        createOrder('', '', 'pacypay');
      } else if (window.is_worldpay) {
        createOrder('', '', 'worldpay');
      } else if (window.is_paypal_standard) {
        createOrder('', '', 'paypal_standard');
      } else if (window.is_airwallex_klarna) {
        createOrder('', '', 'airwallex_klarna');
      } else if (window.is_airwallex) {
        $('#airwallex-warpper').hide();
        createOrder('', '', 'airwallex');
      } else if (window.is_stripe_local) {
        if (typeof changeStripeAcc == 'function') {
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

    function createOrder(token, token_field = "checkout_frames_token", pay_type = "checkout", card = {}) {

      //商品加入到购车中
      //addToCart(pay_type);

      var params = getOrderParams(pay_type);
      //return false;
      if (token) {
        params[token_field] = token;
      }

      if (Object.keys(card).length) {
        params['card'] = card;
      }

      params['pay_type'] = pay_type;
      //console.log(JSON.stringify(params));
      //return false;

      var url = '/onebuy/order/add/sync?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime() + "&force=" + localStorage.getItem("force");

      if (pay_type == "payoneer" || pay_type == 'pacypay') {
        url = '/order/add/async?time=' + new Date().getTime();
      }

      $('#loading').show();
      fetch(url, {
          body: JSON.stringify(params),
          method: 'POST',
          headers: {
            'content-type': 'application/json'
          },
        })
        .then(function(res) {
          return res.json()
        })
        .then(function(res) {
          var data = res;
          //console.log(data);
          if (data.result === 200) {
            var order_info = data.order;

            //console.log(order_info);
            //console.log(window.is_airwallex_klarna);

            if (window.is_paypal_standard) {
              var paypal_form = '<form action="' + data.pay_url + '" method="post" style="display:none" >';
              //console.log(data.form);
              $.each(data.form, function(k, v) {

                if (k == 'cancel_return') v = window.location.href;

                /// do stuff
                paypal_form += '<input type="hidden" name="' + k + '" value="' + v + '">';
              });
              // 
              paypal_form += '</form>';
              //console.log(paypal_form);
              $(paypal_form).appendTo('body').submit();
              return false;
            }

            if (window.is_airwallex_klarna) {

              document.cookie = "voluum_payout=" + order_info.grand_total + order_info.order_currency_code + "; path=/";
              document.cookie = "order_id=" + order_info.id + "; path=/";
              localStorage.setItem("order_id", order_info.id);
              localStorage.setItem("order_params", JSON.stringify(params));

              url = "/onebuy/order/confirm?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&payment_intent_id=" + data.payment_intent_id + "&order_id=" + data.order.id;
              fetch(url, {
                  method: 'GET',
                  headers: {
                    'content-type': 'application/json'
                  }
                }).then(function(res) {
                  return res.json()
                })
                .then(function(res) {

                  //console.log(res);

                  //console.log(res.payment.next_action.url);
                  crmTrack('add_pay')
                  Goto(res.payment.next_action.url);

                });

              return false;


            }

            // document.cookie = "voluum_payout=" + order_info.grand_total + order_info.order_currency_code + "; path=/";
            // document.cookie = "order_id=" + order_info.id + "; path=/";
            localStorage.setItem("order_id", order_info.id);
            // localStorage.setItem("order_params", JSON.stringify(params));


            if (window.is_airwallex) {
              crmTrack('add_pay')
              document.querySelector(".submit-button").scrollIntoView({
                behavior: "smooth"
              })

              Airwallex.confirmPaymentIntent({
                element: cardNumber,
                id: data.payment_intent_id,
                client_secret: data.client_secret,
                <?php if (strtolower($default_country) == 'us') { ?>
                  payment_method: {
                    billing: {
                      email: data.billing.email,
                      first_name: data.billing.first_name,
                      last_name: data.billing.last_name,
                      // date_of_birth: '1990-01-01',
                      // phone_number: '13999999999',
                      address: {
                        city: data.billing.city,
                        country_code: data.billing.country,
                        postcode: data.billing.postcode,
                        state: data.billing.state,
                        street: data.billing.address1
                      }
                    }
                  }
                <?php } ?>

              }).then((response) => {
                console.log(12332121221);
                $('#loading').hide();
                gtag('event', 'initiate_pay_success', {
                  'event_label': "Initiate cc success" + data.order.id,
                  'event_category': 'ecommerce'
                });

                window.location.href = "/onebuy/checkout/v1/success/" + data.order.id;
                return false;

              }).catch((response) => {
                $('#loading').hide();
                console.log("catch");
                console.log(JSON.stringify(response))


                $('#checkout-error').html(response.message + '<br /><br />');
                $('#checkout-error').show();


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
            alert(data.error)
            localStorage.setItem("force", 1)
            // if (pay_error && pay_error.length) {
            //   $('#checkout-error').html(pay_error.join('<br />') + '<br /><br />');
            //   $('#checkout-error').show();
            // }
          }
        })
    }

    function getPhonePrefix() {
      return '';
      var country = $("#country-select").val();

      for (var i = 0; i < window.countries.length; i++) {
        if (window.countries[i].countryCode == country) {
          return window.countries[i].phonePrefix;
        }
      }

      return '';
    }

    function getOrderParams(pay_type, is_chain_payment, cancel_check_scroll = false) {

      var product = getSelectProduct();

      var shipping_fee = product.shipping_fee;

      var product_info = {
        product_name: product.name,
        product_price: product.new_price,
        product_sku: '',
        product_id: '<?php echo $product->id; ?>',
        sku_id: '',
        currency: '{{ core()->getCurrentCurrencyCode() }}',
        shipping_fee: shipping_fee,
        amount: product.amount,
        product_image: "{{ $productBaseImage['small_image_url'] }}"
      };

      var total = product_info.product_price * 1 + product_info.shipping_fee * 1;

      var phone_number = $(".phone_number").val();
      var phone_prefix = getPhonePrefix();



      var products = getSubmitProducts(product_info.product_price, product_info.amount);

      var shipping_address = "";

      if ($("#shipping_address_other").is(':checked')) {
        //$("#bill_address").show();
        window.shipping_address = "other";
        shipping_address = window.shipping_address;
        //console.log("shipping address" + shipping_address);
      }


      var product_price = product_info.product_price;

      var params = {
        first_name: $(".first_name").val(),
        second_name: $(".last_name").val(),
        email: $(".email").val(),
        phone_full: phone_number ? (phone_number.indexOf(phone_prefix) == 0 ? phone_number : (phone_prefix + phone_number)) : '',
        country: $("#country-select").val(),
        city: $(".city").val(),
        province: $("#state-select").val(),
        address: $(".address").val() ? $(".address").val() : '',
        code: $(".zip_code").val(),
        product_delivery: product_info.shipping_fee,
        currency: product_info.currency,
        product_price: product_price,
        total: total.toFixed(2),
        amount: product_info.amount,
        payment_return_url: window.location.protocol + '//' + window.location.host + '/template-common/en/thankyou1/?' + GetRequest(),
        payment_cancel_url: window.location.href,
        phone_prefix: phone_prefix, //todo
        payment_method: pay_type,
        products: products,
        logo_image: '',
        brand: '@lang("onebuy::app.product.brand")',
        description: product_info.product_name,
        shopify_store_name: '',
        produt_amount_base: '1',
        domain_name: document.domain || window.location.host,
        price_template: '{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}price',
        omnisend: '',
        payment_account: '',
        shipping_address: shipping_address,
        bill_first_name: $(".bill-first_name").val(),
        bill_second_name: $(".bill-last_name").val(),
        bill_country: $("#bill-country-select").val(),
        bill_city: $(".bill-city").val(),
        bill_province: $("#bill-state-select").val(),
        bill_address: $(".bill-address").val() ? $(".address").val() : '',
        bill_code: $(".bill-zip_code").val(),

      }

      if (getQueryString('utm_campaign')) {
        params['utm_campaign'] = getQueryString('utm_campaign');
      }
      if (getQueryString('smb_material_number')) {
        var smb_material_number = getQueryString('smb_material_number')
        params['smb_material_number'] = smb_material_number.split(',');
      }

      if (getQueryString('_ef_transaction_id')) {
        params['ef_transaction_id'] = getQueryString('_ef_transaction_id');
      }

      var paypal_pay_type_arr = ['paypal', 'paypal_card'];
      if (paypal_pay_type_arr.indexOf(pay_type) > -1) {
        params['payment_account'] = 'miaodian';
      }

      params['error'] = checkoutProducts(params);


      var checkout_function = {
        paypal: function() {
          return false
        },
        checkout: checkOrderParams,
        stripe: checkOrderParams,
        payoneer: checkOrderParams,
        paypal_card: checkOrderParams,
        wintopay: checkOrderParams,
        pacypay: checkOrderParams,
        paypal_stand: checkOrderParams,
      }
      if (!params['error']) {
        params['error'] = checkout_function[pay_type] ? checkout_function[pay_type](params, is_chain_payment, cancel_check_scroll) : checkOrderParams(params, is_chain_payment, cancel_check_scroll);
      } else {
        var checkout_err = checkout_function[pay_type] ? checkout_function[pay_type](params, is_chain_payment, cancel_check_scroll) : checkOrderParams(params, is_chain_payment, cancel_check_scroll);
        if (checkout_err) {
          params['error'] = params['error'].concat(checkout_err);
        }
      }


      if (!params['error']) {
        params['error'] = checkoutAmount(params);

        // postparams = {
        //   "channel_id": "<?php echo $crm_channel; ?>",
        //   "token": "<?php echo $refer; ?>",
        //   "type": "add_pay"
        // };
        // fetch('https://crm.heomai.com/api/user/action', {
        //   body: JSON.stringify(postparams),
        //   method: 'POST',
        //   headers: {
        //     'content-type': 'application/json'
        //   },
        // })

      } else {
        var amount_err = checkoutAmount(params);
        if (amount_err) {
          params['error'] = params['error'].concat(amount_err);
        }



      }

      return params;
    }

    function checkoutProducts(params) {
      console.log(params);
      return false;
      var products = params.products;
      for (var i = 0; i < products.length; i++) {
        if (!products[i].product_sku) {
          return ["Attribute cannot be empty, please select your product"]
        }
      }

      try {
        if (isProductSoldOut && isProductSoldOut()) {
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
        product_amount += product.amount * 1;
      }

      var params_amount = params.amount;

      if (params_amount != product_amount) {
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
      var error_log = [],
        show_error = [];
      if (!params.first_name) {
        has_error = true;
        showError('first_name-error', "This field is required.");
        error_log.push('first_name is empty');
      }
      if (!params.second_name) {
        has_error = true;
        showError('last_name-error', "This field is required.");
        error_log.push('second_name is empty');
      }
      if (!params.email) {
        has_error = true;
        showError('email-error', "This field is required.");
        error_log.push('email is empty');
      }

      var email_format = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/
      if (!email_format.test(params.email)) {
        has_error = true;
        showError('email-error', "Please enter a valid email address.");
        error_log.push('email is Invaild');
      }

      if (!params.phone_full) {
        has_error = true;
        showError('phone_number-error', "This field is required.");
        error_log.push('phone_full is empty');
      }

      // var phone_format = /^[0-9\+\-\(\)\s]+$/;
      // if(!phone_format.test(params.phone_full)){
      //     has_error = true;
      //     showError('phone_number-error',  "Please enter valid phoneNumber");
      //     error_log.push('phone_full is Invaild');
      // }

      if (!params.country) {
        has_error = true;
        showError('country-error', "This field is required.");
        error_log.push('country is empty');
      }
      if (!params.city) {
        has_error = true;
        showError('city-error', "This field is required.");
        error_log.push('city is empty');
      }
      if (window.states) {
        if (!params.province) {
          has_error = true;
          showError('state-error', "This field is required.");
          error_log.push('province is empty');
        }
      }
      if (!params.address) {
        has_error = true;
        showError('address-error', "This field is required.");
        error_log.push('address is empty');
      }
      if (!params.code) {
        has_error = true;
        showError('zip_code-error', "This field is required.");
        error_log.push('code is empty');
      }

      var code_format = new RegExp(getCountriesField('codeFormat'));
      if (code_format && !code_format.test(params.code)) {
        has_error = true;
        showError('zip_code-error', "Please enter valid zip/postcode ");
        error_log.push('code is invaild');
      }

      // do the bill address info
      if (params.shipping_address == "other") {
        if (!params.bill_first_name) {
          has_error = true;
          showError('first_name-error', "This field is required.");
          error_log.push('Bill first_name is empty');
        }
        if (!params.bill_second_name) {
          has_error = true;
          showError('last_name-error', "This field is required.");
          error_log.push('Bill second_name is empty');
        }
        if (!params.bill_country) {
          has_error = true;
          showError('bill-country-error', "This field is required.");
          error_log.push('Bill country is empty');
        }
        if (!params.bill_city) {
          has_error = true;
          showError('bill-city-error', "This field is required.");
          error_log.push('Bill city is empty');
        }
        if (window.bill_states) {
          if (!params.province) {
            has_error = true;
            showError('bill-state-error', "This field is required.");
            error_log.push('Bill province is empty');
          }
        }
        if (!params.bill_address) {
          has_error = true;
          showError('bill-address-error', "This field is required.");
          error_log.push('Bill address is empty');
        }
        if (!params.bill_code) {
          has_error = true;
          showError('bill-zip_code-error', "This field is required.");
          error_log.push('Bill code is empty');
        }
      }

      if (has_error) {
        show_error.push("Your Info is invaild");
        if (!cancel_check_scroll) {
          document.querySelector(".shipping-tip").scrollIntoView({
            behavior: "smooth"
          })
        }
      }

      if ((params.payment_method == 'checkout' && !Frames.isCardValid()) || (params.payment_method == 'stripe' && !(window.card_number_vaild && window.card_expriy_vaild && window.card_cvc_vaild)) || (params.payment_method == 'wintopay' && !cc_form_obj.isValid())) {
        has_error = true;
        error_log.push('card is invaild');
        show_error.push("Your Card Info is invaild");
        $('#checkout-card-error').show();
        document.querySelector(".checkout-content").style.display = "block";
        if (!cancel_check_scroll) {
          document.querySelector(".checkout-block").scrollIntoView({
            behavior: "smooth"
          })
        }
      }

      if (has_error) {
        error_log.push({
          params: params
        });
        //fetchCheckoutError(error_log);
      }

      return has_error && show_error
    }

    function showError(id, error_log) {
      $('#' + id).html(error_log);
      $('#' + id).show();
      $('#' + id).parent().find('input').addClass("shipping-info-input-error");
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

      for (var i = 0; i < attribute_item.length; i++) {
        var sku_key_arr = [];
        var img_key = '';
        var attribute_select = $(attribute_item[i]).find('.attribute_select');
        for (var j = 0; j < attribute_select.length; j++) {
          sku_key_arr.push($(attribute_select[j]).val());
          if ($(attribute_select[j]).data('has-img')) {
            img_key = $(attribute_select[j]).val();
          }
        }

        var sku = {};
        if (sku_maps[sku_key_arr.join('_')]) {
          sku = JSON.parse(JSON.stringify(sku_maps[sku_key_arr.join('_')]));
        }
        sku['img'] = getAttributeImg(img_key);
        skus.push(sku);
      }

      console.log("product skus");
      console.log(skus);

      var products = [],
        product_sku_map = {};

      for (var m = 0; m < skus.length; m++) {
        console.log("skus length" + skus.length);
        if (product_sku_map[skus[m].sku_id]) {
          products[product_sku_map[skus[m].sku_id] - 1].amount++;
        } else {
          if (skus[m].sku_id == "" || skus[m].sku_id == null || skus[m].sku_id == undefined) {
            alert("please select product color and size");
            return false;
          }
          var sku = {
            img: skus[m].img,
            price: unit_price,
            amount: 1,
            description: skus[m].name,
            product_id: '<?php echo $product->id; ?>',
            product_sku: skus[m].sku_code,
            variant_id: skus[m].sku_id,
            attribute_name: skus[m].attribute_name,
            attr_id: skus[m].attr_id
          };
          products.push(sku);
          product_sku_map[skus[m].sku_id] = products.length;
        }
      }

      return products
    }

    function getSKuMaps() {
      if (window.sku_maps) {
        return window.sku_maps
      }


      var skus = <?php echo json_encode($skus); ?>

      var sku_maps = {};

      for (var i = 0; i < skus.length; i++) {
        sku_maps[skus[i].key] = JSON.parse(JSON.stringify(skus[i]));
        // console.log("sku map");
        // console.log(JSON.parse(JSON.stringify(skus[i])));
      }

      window.sku_maps = sku_maps;
      return window.sku_maps;
    }

    function getAttributeImg(attribute) {
      var product_attributes = <?php echo json_encode($product_attributes); ?>;
      var show_img_attribute_id = '23';
      var product_img = "{{ $productBaseImage['small_image_url'] }}";

      for (var i = 0; i < product_attributes.length; i++) {
        var product_attribute = product_attributes[i];
        if (product_attribute.id = show_img_attribute_id) {
          for (var j = 0; j < product_attribute.options.length; j++) {
            var option = product_attribute.options[j];
            console.log(option);
            if (option.name == attribute) {
              return option.image || product_img;
            }
          }
        }
      }

      return product_img;
    }

    //
    function changeOrderSummary(position = "") {
      var product = getSelectProduct();
      var produt_amount_base = '1';
      if (!produt_amount_base) {
        produt_amount_base = 1;
      }

      var shipping_fee = product.shipping_fee;

      var total = product.new_price * 1 + shipping_fee * 1;

      $('.js-product-name').html($('.list-item--checked .js-name').text());
      $('.js-product-qty').html(product.amount * produt_amount_base);
      $('.js-product-price').html(getFormatPrice(product.new_price));
      $('.js-old-price').html(getFormatPrice(product.old_price));
      $('.js-discount-price').html(getFormatPrice(product.new_price - product.old_price));
      $('.js-shipping-price').html(getFormatPrice(shipping_fee));
      $('.js-total').html(getFormatPrice(total));


      var product = getSelectProduct();

      var shipping_fee = product.shipping_fee;

      var product_info = {
        product_name: product.name,
        product_price: product.new_price,
        product_sku: '',
        product_id: '<?php echo $product->id; ?>',
        sku_id: '',
        currency: '{{ core()->getCurrentCurrencyCode() }}',
        shipping_fee: shipping_fee,
        amount: product.amount,
        product_image: "{{ $productBaseImage['small_image_url'] }}"
      };

      var total = product_info.product_price * 1 + product_info.shipping_fee * 1;
      var products = getSubmitProducts(product_info.product_price, product_info.amount);

      // console.log("select product ");
      // console.log(products);
      // console.log("select product ");

      var sku_html = "";
      $('.js-sku').empty();

      products.forEach(function(currentValue, index, arr) {
        gitem = [];
        console.log(currentValue);
        console.log(index);
        console.log(arr);
        sku_html += products[index].attribute_name + " / " + products[index].amount + "<br>";
      })

      $('.js-sku').html(sku_html);

      gtag("event", "view_item", {
        value: product.amount,
        currency: "{{ core()->getCurrentCurrencyCode() }}",
        items: [{
          item_id: "<?php echo $product->sku; ?>",
          item_name: product.name,
          price: product.new_price,
          quantity: product.amount * produt_amount_base
        }]
      });

      var add_to_cart_crm = localStorage.getItem("add_to_cart_<?php echo $product->id; ?>");

      if (position == 'sku_select') {
        if (add_to_cart_crm != "1") {
          // params = {
          //   "channel_id": "<?php echo $crm_channel; ?>",
          //   "token": "<?php echo $refer; ?>",
          //   "type": "add_cart"
          // };
          // fetch('https://crm.heomai.com/api/user/action', {
          //   body: JSON.stringify(params),
          //   method: 'POST',
          //   headers: {
          //     'content-type': 'application/json'
          //   },
          // })

          localStorage.setItem("add_to_cart_<?php echo $product->id; ?>", "1");
        }
      }
    }

    $('.js-list-item').on('click', function() {
      let trackFlag = <?php echo json_encode($product_attributes); ?>;
      console.log(trackFlag, 'trackFlag');
      if (trackFlag?.length <= 0) {
        crmTrack('add_cart')
      }
      $('.js-list-item').each(function() {
        $(this).removeClass('list-item--checked');
      })
      if (isMobile()) {
        console.log('mobile============');
        $('.attribute-select').remove()
        $(this).after('<div class="attribute-select"></div>')

      }
      $(this).addClass('list-item--checked');
      showAttributeSelecet("@lang('onebuy::app.product.order.Item')");
      changeOrderSummary();
    })

    changeOrderSummary();

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
        if (!no_request) {
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
      if (window.event && window.event.returnValue) {
        window.event.returnValue = false;
      }
    }

    function getCountriesField(field) {
      var country = $("#country-select").val();

      for (var i = 0; i < window.countries.length; i++) {
        if (window.countries[i].countryCode == country) {
          return window.countries[i][field];
        }
      }

      return '';
    }

    window.onpageshow = function() {
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
      var strCookie = document.cookie;

      var arrCookie = strCookie.split(";");

      for (var i = 0; i < arrCookie.length; i++) {

        var c = arrCookie[i].trim().split("=");

        if (c[0] == name) {

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
        console.log("click scroll");
        console.log(r)
        console.log(o)
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
        var elm_font = document.querySelector('.state-' + (index + 1) + ' .main-container-progress-state-content-step-title')
        var elm_line = document.querySelector('.state-' + (index + 1) + ' .main-container-progress-state-line')
        var elm_img = document.querySelector('.state-' + (index + 1) + ' .main-container-progress-state-content-circle-a img')
        if (item) {
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
    function loadJS(url, callback) {
      var script = document.createElement('script'),
        fn = callback || function() {};

      script.type = 'text/javascript';

      //IE
      if (script.readyState) {
        script.onreadystatechange = function() {
          if (script.readyState == 'loaded' || script.readyState == 'complete') {
            script.onreadystatechange = null;
            fn();
          }
        };
      } else {
        //其他浏览器
        script.onload = function() {
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
  <script>
    (function() {
      "use strict";

      function n(n, e) {
        var r;
        void 0 === e && (e = "uclick");
        var c = null === (r = n.match(/\?.+?$/)) || void 0 === r ? void 0 : r[0];
        return c ? Array.from(c.matchAll(new RegExp("[?&](clickid|" + e + ")=([^=&]*)", "g"))).map((function(n) {
          return {
            name: n[1],
            value: n[2]
          }
        })) : []
      }

      function e(n) {
        var e = n();
        return 0 === e.length ? {} : e.reduce((function(n, e) {
          var r;
          return Object.assign(n, ((r = {})[e.name] = "" + e.value, r))
        }), {})
      }

      function r(r) {
        void 0 === r && (r = "uclick");
        var c, t, u = e((function() {
            return (function(n) {
              return void 0 === n && (n = "uclick"), Array.from(document.cookie.matchAll(new RegExp("(?:^|; )(clickid|" + n + ")=([^;]*)", "g"))).map((function(n) {
                return {
                  name: n[1],
                  value: n[2]
                }
              }))
            })(r)
          })),
          i = e((function() {
            return n(document.referrer, r)
          })),
          o = e((function() {
            return n(document.location.search, r)
          }));
        return (c = [r, "clickid"], t = [u, i, o], c.reduce((function(n, e) {
          return n.concat(t.map((function(n) {
            return [e, n]
          })))
        }), [])).map((function(n) {
          return {
            name: n[0],
            value: n[1][n[0]]
          }
        })).find((function(n) {
          return n.value
        })) || null
      }
      var c, t, u, i;
      (i = document.createElement("img")).src = (t = "" + "https://track.heomai2021.com/" + "click" + ".php?payout=OPTIONAL", (u = r(c = "uclick")) ? t + "&cnv_id=" + (u.name === c ? "OPTIONAL" : u.value) + (u.name === c ? "&" + c + "=" + u.value : "") : t + "&cnv_id=OPTIONAL"), i.referrerPolicy = "no-referrer-when-downgrade"
    })();
  </script>
  <script>
    Airwallex.init({
      env: '<?php echo $app_env; ?>', // Setup which Airwallex env('staging' | 'demo' | 'prod') to integrate with
      origin: window.location.origin, // Setup your event target to receive the browser events message
    });

    const cardNumber = Airwallex.createElement('cardNumber', {
      allowedCardNetworks: ['visa', 'maestro', 'mastercard', 'amex', 'unionpay', 'jcb']
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
      if (event.detail.complete == true) {
        $("#id_card").val(event.detail.complete);
        $("#cardNumber").removeClass("shipping-info-input-error");
      }
      if (event.detail.complete == false) {
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

      if (event.detail.complete == true) {
        $("#id_expiry").val(event.detail.complete);
        $("#cardExpiry").removeClass("shipping-info-input-error");
      }

      if (event.detail.complete == false) {
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

      if (event.detail.complete == true) {
        $("#id_cvc").val(event.detail.complete);
        $("#cardCvc").removeClass("shipping-info-input-error");
      }

      if (event.detail.complete == false) {
        $("#id_cvc").val(event.detail.complete);
        $("#cardCvc").removeClass("shipping-info-input-error");
      }
    });
  </script>
  <?php if (!empty($ob_adv_id)) { ?>

    <?php
    $ob_adv_ids = explode(',', $ob_adv_id);
    foreach ($ob_adv_ids as $key => $ob_adv_id) {
    ?>

      <script data-obct type="text/javascript">
        /** DO NOT MODIFY THIS CODE**/ ! function(_window, _document) {
          var OB_ADV_ID = '<?php echo $ob_adv_id; ?>';
          if (_window.obApi) {
            var toArray = function(object) {
              return Object.prototype.toString.call(object) === '[object Array]' ? object : [object];
            };
            _window.obApi.marketerId = toArray(_window.obApi.marketerId).concat(toArray(OB_ADV_ID));
            return;
          }
          var api = _window.obApi = function() {
            api.dispatch ? api.dispatch.apply(api, arguments) : api.queue.push(arguments);
          };
          api.version = '1.1';
          api.loaded = true;
          api.marketerId = OB_ADV_ID;
          api.queue = [];
          var tag = _document.createElement('script');
          tag.async = true;
          tag.src = '//amplify.outbrain.com/cp/obtp.js';
          tag.type = 'text/javascript';
          var script = _document.getElementsByTagName('script')[0];
          script.parentNode.insertBefore(tag, script);
        }(window, document);

        obApi('track', 'PAGE_VIEW');
      </script>
  <?php }
  } ?>
  <!-- Facebook Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    <?php
    $fb_ids_arr = explode(',', $fb_ids);
    foreach ($fb_ids_arr as $key => $fb_id) {
    ?>
      fbq('init', '<?php echo $fb_id; ?>');
    <?php } ?>
  </script>
  <noscript>
    <?php foreach ($fb_ids_arr as $key => $fb_id) { ?>
      <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $fb_id; ?>&ev=PageView&noscript=1" />
    <?php } ?>
  </noscript>
  <!-- End Facebook Pixel Code -->
  <!-- Facebook Pixel Code -->
  <script>
    fbq('track', 'PageView');
    fbq('track', 'ViewContent');
  </script>

  <?php if (!empty($quora_adv_id)) { ?>

    <script>
      ! function(q, e, v, n, t, s) {
        if (q.qp) return;
        n = q.qp = function() {
          n.qp ? n.qp.apply(n, arguments) : n.queue.push(arguments);
        };
        n.queue = [];
        t = document.createElement(e);
        t.async = !0;
        t.src = v;
        s = document.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s);
      }(window, 'script', 'https://a.quora.com/qevents.js');
      <?php
      $quora_adv_arr = explode(',', $quora_adv_id);
      foreach ($quora_adv_arr as $key => $quora_id) {
      ?>
        qp('init', '<?php echo $quora_id; ?>');
      <?php } ?>

      qp('track', 'ViewContent');
    </script>
    <?php foreach ($quora_adv_arr as $key => $quora_id) { ?>
      <noscript><img height="1" width="1" style="display:none" src="https://q.quora.com/_/ad/<?php echo $quora_id; ?>/pixel?tag=ViewContent&noscript=1" /></noscript>
    <?php } ?>
    <!-- End of Quora Pixel Code -->
  <?php } ?>

</body>

</html>