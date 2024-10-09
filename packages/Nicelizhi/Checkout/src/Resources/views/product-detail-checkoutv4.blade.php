<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}">

<head>
  <title></title>
  <link rel="icon prefetch" id="favicon-icon" href="/checkout/v2/images/favicon_de.webp" type="image/png" sizes="16x16" />
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="base-url" content="{{ url()->to('/') }}">
  <meta name="currency-code" content="{{ core()->getCurrentCurrencyCode() }}">
  <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta http-equiv="content-language" content="en-us" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="HandheldFriendly" content="true" />
  <meta property="og:title" content="Fur Sweep Collar" />
  <meta property="og:description" content="Fur Sweep Collar" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:image" content="/offer/1/app/desktop/images/thumb.png" />
  <meta name="color-scheme" content="light only" />
  <link rel="stylesheet" href="/checkout/v2/css/v3.css?v=2">
  <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/checkout.css?v=12" />
  <link rel="prefetch" href="/checkout/v2/images/favicon_de.webp">
  <link rel="prefetch" href="/checkout/v2/images/favicon.webp">
  <link rel="prefetch" href="/checkout/v2/images/googlePay.webp">
  <link rel="prefetch" href="/checkout/v2/images/applePay.webp">
  <link rel="prefetch" href="/checkout/v2/images/logo_{{ app()->getLocale() }}.webp">
  <!-- <link href="https://cdn.jsdelivr.net/npm/flag-icon-css@4.1.7/css/flag-icons.min.css" rel="stylesheet" /> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/example1/colorbox.min.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@4.1.7/css/flag-icons.min.css" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@4.1.7/css/flag-icons.min.css">
  </noscript>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/example1/colorbox.min.css" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/example1/colorbox.min.css">
  </noscript>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.0.4/css/swiper.css" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.0.4/css/swiper.css" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.0.4/css/swiper.css">
  </noscript>
  <!-- <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/slick.min.css" /> -->
  <link rel="stylesheet" href="/checkout/v2/css/slick.min.css" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="/checkout/v2/css/slick.min.css">
  </noscript>
  <!-- <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/upsell-new-02.css?v=6" /> -->
  <link rel="stylesheet" href="/checkout/v2/css/upsell-new-02.css?v=6" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="/checkout/v2/css/upsell-new-02.css?v=6">
  </noscript>
  <!-- <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/extra-style.css?v=1" /> -->
  <link rel="stylesheet" href="/checkout/v2/css/extra-style.css?v=1" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="/checkout/v2/css/extra-style.css?v=1">
  </noscript>
  <!-- <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/fonts.css?v=1" /> -->
  <link rel="stylesheet" href="/checkout/v2/css/fonts.css?v=1" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="/checkout/v2/css/fonts.css?v=1">
  </noscript>
  <!-- <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/custom.css?v=1" /> -->
  <link rel="stylesheet" href="/checkout/v2/css/custom.css?v=1" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="/checkout/v2/css/custom.css?v=1">
  </noscript>
  <!-- <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/new_addon.css?v=1" /> -->
  <link rel="stylesheet" href="/checkout/v2/css/new_addon.css?v=1" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="/checkout/v2/css/new_addon.css?v=1">
  </noscript>
  <!-- <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/all.min.css" /> -->
  <link rel="stylesheet" href="/checkout/v2/css/all.min.css" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="/checkout/v2/css/all.min.css">
  </noscript>
  <!-- <link rel="stylesheet prefetch" type="text/css" href="/checkout/v2/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="/checkout/v2/css/bootstrap.min.css?v=1" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="/checkout/v2/css/bootstrap.min.css?v=1">
  </noscript>
  <!-- <link rel="stylesheet prefetch" href="/checkout/v2/css/app2.css?v=5" /> -->
  <link rel="stylesheet" href="/checkout/v2/css/app2.css?v=6" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="/checkout/v2/css/app2.css?v=6">
  </noscript>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" media="none" onload="if(media!='all')media='all'">
  <noscript>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  </noscript>
  <style>
    img {
      /* aspect-ratio: attr(width)/attr(height); */
      object-fit: contain;
    }

    /* .sw-box {
      height: 48.33333vw;
    } */

    .sw-box {
      width: 100%;
      height: 500px;
      background-color: #e0e0e0;
      animation: pulse 1.5s infinite;
    }

    .share-item {
      margin-right: 5px;
    }

    /* .share-icons {
      display: flex;
      gap: 10px;
    }

    .share-icons a {
      text-decoration: none;
      color: inherit;
    }

    .share-icons i {
      font-size: 24px;
    } */

    /* .share-item {
      margin-right: 5px;
    } */

    .shopify-container {
      width: 100%;
      height: 1000px;
      background-color: #e0e0e0;
      animation: pulse 1.5s infinite;
    }

    .shopify-content {
      width: 100%;
      float: left;
    }

    .shopify-content img {
      width: 100% !important;
      margin: 0 auto;
      height: auto;
    }

    .prod-name {
      word-wrap: break-word;
    }

    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }

    .pagination button {
      background-color: #1773B0;
    }

    .pagination button,
    .pagination input {
      margin: 0 5px;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 4px;
      font-size: 12px;
    }

    .pagination input {
      width: 60px;
      text-align: center;
    }

    .btn-fixed {
      position: fixed;
      bottom: 0;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.6);
      display: none;
      transition: opacity 0.3s ease;
    }

    #btn-bx {
      padding: 0 0 10px 0;
    }

    #comn-btn1 {
      font-size: 18px;
      line-height: 26px;
      font-weight: 800;
      border-radius: 8px;
      background: #1773b0;
      letter-spacing: .8px;
      animation: 2s infinite bounce, 3s infinite shadow-pulse;
      outline: 0;
      text-decoration: none;
      height: auto;
    }

    .header-middle {
      display: flex;
      flex-direction: column;
    }

    .icon-container {
      position: fixed;
      top: 12%;
      right: -30px;
      font-size: 24px;
      color: #1773B0;
      cursor: pointer;
      z-index: 999;
      transition: all 0.2s;
    }

    .icon-fixed {
      right: 8px;
    }

    .icon-toggle {
      transform: scale(1.5);
    }

    .image-toggle {
      right: -200px !important;
    }

    .image-area {
      position: fixed;
      top: 20%;
      right: 0;
      /* width: 100px;
      height: 100px;
      border: 1px solid red; */
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: flex-end;
      z-index: 999;
      transition: all 0.2s;
    }

    .image-area img {
      position: relative;
      right: 0;
      width: 50px;
      transition: all 1s;
      margin-bottom: 10px;
      border-radius: 5px;
    }

    .image-area img.active {
      right: 0;
      width: 200px;
    }

    .image-area img.fixed {
      width: 50px;
      transition: all 1s;
    }

    .image-area img.enlarged {
      width: 200px;
      transition: all 1s;
    }

    /* @media(max-width:600px) {
      .sw-box {
        height: 110vw;
      }
    }

    @media(min-width:600px) and (max-width:768px) {
      .sw-box {
        height: 660px;
      }
    }

    @media (min-width: 768px) and (max-width: 1028px) {
      .sw-box {
        height: 510px;
      }
    }

    @media (min-width: 1020px) and (max-width: 1200px) {
      .sw-box {
        height: 610px;
      }
    } */

    @keyframes pulse {
      0% {
        background-color: #e0e0e0;
      }

      50% {
        background-color: #f0f0f0;
      }

      100% {
        background-color: #e0e0e0;
      }
    }

    @media(max-width:768px) {
      .top-left-button {
        display: none;
      }

      .herder-content {
        justify-content: center;
      }
    }
  </style>
</head>

<body>
  <div class="header-container">
    <div class="container">
      <div class="herder-content">
        <img src="/checkout/v2/images/logo_<?php echo strtolower($default_country); ?>.webp" width="100" height="50" alt="" />
        <div class="top-left-button">
          <!-- <p class="header-text-hide">@lang('checkout::app.v3.Description')</p> -->
          <a class="header-text-hide" onclick="reviewToggle()" id="header-text" href="#shopify-title-item1">@lang('checkout::app.v3.Reviews')</a>
          <div class="top-left-button-box">
            <a style="color: #fff;" href="#pkg-hdng1">@lang('checkout::app.v3.Buy Now')</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="checkout-section">
    <div class="container">
      <div class="left-sec">
        <div id="sticky" style="position:sticky;top: 55px;">
          <div class="clearfix vehicle-detail-banner banner-content">
            <div class="banner-slider">
              <div class="slider-banner-image1">
                <div class="sw-box" style="width:100%;">
                </div>
              </div>
            </div>
          </div>
          <div class=" Schritt-top-box">
            <div class="description-img-box">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 24C19.5817 28.4183 12.4183 28.4183 8 24C3.58172 19.5817 3.58172 12.4183 8 8C12.4183 3.58172 19.5817 3.58172 24 8" stroke="#4A4A4A" stroke-width="2.5" stroke-linecap="round" />
                <path d="M17.3222 15.9213L17.3219 15.9212L15.1141 15.3107L15.1132 15.3104C14.3915 15.1138 14.0132 14.6502 14.0132 14.2378C14.0132 13.9486 14.1781 13.662 14.4927 13.4378C14.8066 13.2141 15.2524 13.0679 15.7545 13.0679H16.2307C17.0952 13.0679 17.7601 13.4901 17.9283 13.9618C18.0381 14.2824 18.3552 14.4878 18.6838 14.4878H18.6982C18.9471 14.4878 19.1749 14.3742 19.322 14.2002L19.3223 14.2004L19.3301 14.1902C19.4794 13.994 19.5221 13.7542 19.459 13.522L19.4566 13.5131L19.4535 13.5045C19.1015 12.5052 18.0518 11.7728 16.7982 11.5988V11.1723C16.7982 10.7362 16.4208 10.418 15.9998 10.418H15.9854C15.5644 10.418 15.1871 10.7362 15.1871 11.1723V11.5976C13.6553 11.8039 12.4165 12.8679 12.4165 14.2378C12.4165 15.4035 13.3476 16.4093 14.6646 16.7617C14.6649 16.7618 14.6652 16.7619 14.6654 16.7619L16.8853 17.3718C16.8854 17.3718 16.8855 17.3718 16.8857 17.3719C17.5923 17.5682 17.9721 18.0312 17.9721 18.4447V18.4712C17.9721 18.7071 17.8531 18.9597 17.6535 19.1455C17.268 19.4624 16.7661 19.6399 16.2363 19.628L16.2363 19.628H16.2307H16.2163H15.7401C14.8769 19.628 14.2245 19.2064 14.0565 18.7327L14.0559 18.7311C13.9448 18.4244 13.6279 18.2212 13.3014 18.2212H13.287C13.0525 18.2212 12.8157 18.3117 12.659 18.5139C12.5023 18.7029 12.4633 18.9619 12.5278 19.1793L12.5276 19.1794L12.5314 19.1903C12.8828 20.2021 13.9445 20.9352 15.1871 21.0989V21.497C15.1871 21.9331 15.5644 22.2513 15.9854 22.2513H15.9998C16.2104 22.2513 16.3941 22.1725 16.5462 22.0501L16.5526 22.0449L16.5587 22.0393C16.7107 21.8995 16.7982 21.7002 16.7982 21.497V21.1128C17.5274 21.0178 18.2121 20.7174 18.7479 20.2382C19.277 19.7803 19.567 19.1436 19.5831 18.4773L19.5832 18.4773V18.4712V18.458C19.5832 17.2762 18.6342 16.286 17.3222 15.9213Z" fill="#009EE0" stroke="#009EE0" stroke-width="0.5" />
                <path d="M26.7562 4.50957C26.7562 3.81922 26.1965 3.25958 25.5062 3.25958C24.8158 3.25958 24.2562 3.81922 24.2562 4.50957H26.7562ZM25.5062 9.66621V10.9162C26.1965 10.9162 26.7562 10.3566 26.7562 9.66621H25.5062ZM20.3495 8.41621C19.6592 8.41621 19.0995 8.97585 19.0995 9.66621C19.0995 10.3566 19.6592 10.9162 20.3495 10.9162V8.41621ZM24.2562 4.50957V9.66621H26.7562V4.50957H24.2562ZM25.5062 8.41621H20.3495V10.9162H25.5062V8.41621Z" fill="#4A4A4A" />
              </svg>
              <p class="item-text">@lang('checkout::app.v3.30-Day Return')</p>
            </div>
            <div class="description-img-box">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M30.7693 16.6469V23.1246C30.7693 23.4682 30.6278 23.7977 30.376 24.0407C30.1242 24.2837 29.7827 24.4202 29.4266 24.4202H28.084C28.084 25.451 27.6596 26.4395 26.9042 27.1684C26.1488 27.8973 25.1243 28.3068 24.056 28.3068C22.9877 28.3068 21.9632 27.8973 21.2078 27.1684C20.4524 26.4395 20.028 25.451 20.028 24.4202H11.9721C11.9721 25.451 11.5477 26.4395 10.7923 27.1684C10.0369 27.8973 9.0124 28.3068 7.94411 28.3068C6.87583 28.3068 5.8513 27.8973 5.09591 27.1684C4.34052 26.4395 3.91614 25.451 3.91614 24.4202H2.57349C2.21739 24.4202 1.87588 24.2837 1.62408 24.0407C1.37229 23.7977 1.23083 23.4682 1.23083 23.1246V7.57805C1.23083 6.54724 1.6552 5.55866 2.41059 4.82978C3.16598 4.10089 4.19052 3.69141 5.2588 3.69141H17.3427C18.411 3.69141 19.4355 4.10089 20.1909 4.82978C20.9463 5.55866 21.3707 6.54724 21.3707 7.57805V10.1691H24.056C24.6813 10.1691 25.2981 10.3096 25.8574 10.5795C26.4167 10.8493 26.9032 11.2411 27.2784 11.7238L30.5008 15.8695C30.54 15.9259 30.5716 15.9868 30.5947 16.0509L30.6753 16.1934C30.7346 16.3379 30.7664 16.4915 30.7693 16.6469V16.6469ZM9.28677 24.4202C9.28677 24.1639 9.20803 23.9134 9.06049 23.7004C8.91296 23.4873 8.70326 23.3213 8.45793 23.2232C8.21259 23.1252 7.94262 23.0995 7.68217 23.1495C7.42172 23.1995 7.18249 23.3229 6.99471 23.5041C6.80694 23.6852 6.67906 23.9161 6.62726 24.1674C6.57545 24.4187 6.60204 24.6792 6.70366 24.9159C6.80528 25.1527 6.97737 25.355 7.19817 25.4974C7.41897 25.6397 7.67856 25.7157 7.94411 25.7157C8.30021 25.7157 8.64172 25.5792 8.89352 25.3362C9.14531 25.0933 9.28677 24.7638 9.28677 24.4202ZM18.6854 7.57805C18.6854 7.23445 18.5439 6.90492 18.2921 6.66196C18.0403 6.41899 17.6988 6.2825 17.3427 6.2825H5.2588C4.90271 6.2825 4.56119 6.41899 4.3094 6.66196C4.0576 6.90492 3.91614 7.23445 3.91614 7.57805V21.8291H4.96342C5.34095 21.4283 5.80112 21.108 6.31442 20.8889C6.82772 20.6698 7.38282 20.5566 7.94411 20.5566C8.50541 20.5566 9.06051 20.6698 9.57381 20.8889C10.0871 21.108 10.5473 21.4283 10.9248 21.8291H18.6854V7.57805ZM21.3707 15.3513H26.7413L25.1301 13.2785C25.0051 13.1175 24.8429 12.987 24.6565 12.897C24.47 12.8071 24.2644 12.7602 24.056 12.7602H21.3707V15.3513ZM25.3987 24.4202C25.3987 24.1639 25.3199 23.9134 25.1724 23.7004C25.0248 23.4873 24.8152 23.3213 24.5698 23.2232C24.3245 23.1252 24.0545 23.0995 23.7941 23.1495C23.5336 23.1995 23.2944 23.3229 23.1066 23.5041C22.9188 23.6852 22.7909 23.9161 22.7391 24.1674C22.6873 24.4187 22.7139 24.6792 22.8155 24.9159C22.9172 25.1527 23.0893 25.355 23.3101 25.4974C23.5309 25.6397 23.7904 25.7157 24.056 25.7157C24.4121 25.7157 24.7536 25.5792 25.0054 25.3362C25.2572 25.0933 25.3987 24.7638 25.3987 24.4202ZM28.084 17.9424H21.3707V21.544C22.1631 20.8607 23.2032 20.5072 24.2645 20.5606C25.3258 20.614 26.3222 21.0699 27.0367 21.8291H28.084V17.9424Z" fill="#4A4A4A" />
                <rect x="5.33325" y="8" width="11.3333" height="5.33333" fill="#009EE0" />
                <rect x="5.33325" y="14" width="5.33333" height="5.33333" fill="#009EE0" />
                <rect x="11.3333" y="14" width="5.33333" height="5.33333" fill="#009EE0" />
              </svg>
              <p class="item-text">@lang('checkout::app.v3.Quality Guarantee')</p>
            </div>
            <div class="description-img-box">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.3846 8.86914L8.43634 9.2065C6.46906 9.30202 4.9231 10.9249 4.9231 12.8945V18.8043C4.9231 20.6714 6.31696 22.2447 8.17049 22.4697L21.7089 24.113C23.9084 24.38 25.8462 22.6632 25.8462 20.4476V16.4882V10.393" stroke="#4A4A4A" stroke-width="3.69231" />
                <path d="M10.1538 15.4724L13.0307 19.0279L22.1846 8.61523" stroke="#009EE0" stroke-width="3.69231" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <p class="item-text">@lang('checkout::app.v3.Secure Payment')</p>
            </div>
          </div>
        </div>
      </div>
      <div class="right-sec">
        <p class="prod-name hide-mob"></p>
        <p class="str-rvw hide-mob go-rew" onclick="reviewToggle()"><svg width="98px" height="16px" viewBox="0 0 512 96" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Trustpilot_ratings_5star-RGB" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g fill-rule="nonzero">
                <rect id="Rectangle-path" fill="#00B67A" x="0" y="0" width="96" height="96"></rect>
                <rect id="Rectangle-path" fill="#00B67A" x="104" y="0" width="96" height="96"></rect>
                <rect id="Rectangle-path" fill="#00B67A" x="208" y="0" width="96" height="96"></rect>
                <rect id="Rectangle-path" fill="#00B67A" x="312" y="0" width="96" height="96"></rect>
                <rect id="Rectangle-path" fill="#00B67A" x="416" y="0" width="96" height="96"></rect>
                <path d="M48,64.7 L62.6,61 L68.7,79.8 L48,64.7 Z M81.6,40.4 L55.9,40.4 L48,16.2 L40.1,40.4 L14.4,40.4 L35.2,55.4 L27.3,79.6 L48.1,64.6 L60.9,55.4 L81.6,40.4 L81.6,40.4 L81.6,40.4 L81.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
                <path d="M152,64.7 L166.6,61 L172.7,79.8 L152,64.7 Z M185.6,40.4 L159.9,40.4 L152,16.2 L144.1,40.4 L118.4,40.4 L139.2,55.4 L131.3,79.6 L152.1,64.6 L164.9,55.4 L185.6,40.4 L185.6,40.4 L185.6,40.4 L185.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
                <path d="M256,64.7 L270.6,61 L276.7,79.8 L256,64.7 Z M289.6,40.4 L263.9,40.4 L256,16.2 L248.1,40.4 L222.4,40.4 L243.2,55.4 L235.3,79.6 L256.1,64.6 L268.9,55.4 L289.6,40.4 L289.6,40.4 L289.6,40.4 L289.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
                <path d="M360,64.7 L374.6,61 L380.7,79.8 L360,64.7 Z M393.6,40.4 L367.9,40.4 L360,16.2 L352.1,40.4 L326.4,40.4 L347.2,55.4 L339.3,79.6 L360.1,64.6 L372.9,55.4 L393.6,40.4 L393.6,40.4 L393.6,40.4 L393.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
                <path d="M464,64.7 L478.6,61 L484.7,79.8 L464,64.7 Z M497.6,40.4 L471.9,40.4 L464,16.2 L456.1,40.4 L430.4,40.4 L451.2,55.4 L443.3,79.6 L464.1,64.6 L476.9,55.4 L497.6,40.4 L497.6,40.4 L497.6,40.4 L497.6,40.4 Z" id="Shape" fill="#FFFFFF"></path>
              </g>
            </g>
          </svg>@lang('checkout::app.v2.12,421 Verified Customer Reviews')</p>
        </p>
        <div class="header-middle">
          <p class="text-Schritt-top">@lang('checkout::app.v2.You Can See By')</p>
          <img src="" width="0" height="48" alt="" />
        </div>
        <div class="fl mt10">

          <div class="pr-price-single m120">
            <p></p>
            <p></p>
            <p>
              <span>@lang('checkout::app.v2.Save'):</span>
              <span id="pr-price1"></span>
              <span id="pr-price2"></span>
            </p>
          </div>
        </div>
        <div class="three-description-box">
        </div>


        <div class="btn-bx">
          <a href="#product2" class="comn-btn" id="comn-btn2">@lang('checkout::app.v3.Buy Now')</a>
        </div>
        <div class="fl mt10">
          <div class="order-msg mb10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1773B0" class="bi bi-fire" viewBox="0 0 16 16">
              <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
            </svg>
            <strong id="order-msg-number" style="margin-left: 8px;"></strong>
            <span class="ml5"> @lang('checkout::app.v3.sold in last') &nbsp;</span>
            <strong id="order-msg-hour"></strong>
            <span>&nbsp;@lang('checkout::app.v3.hours')</span>
          </div>
          <div class="user-view mb10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1773B0" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
            </svg>
            <strong class="user-view-num" style="margin-left: 5px;"></strong>
            <span>@lang('checkout::app.v3.People Looking For This Product')</span>
          </div>
          <div class="shippingMsg mt10 mb10">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1773B0" class="bi bi-clock" viewBox="0 0 16 16">
              <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
            </svg>
            <span style="margin-left: 5px;">@lang('checkout::app.v3.Estimated Delivery between')</span>
            <strong id="shipping-date1" style="color:#1773B0"></strong>
            <span style="color:#1773B0">-</span>
            <strong id="shipping-date2" style="color:#1773B0"></strong>
          </div>
          <div class="share-icons">
            <span class="share-item">@lang('checkout::app.v3.Share'):</span>
            <a class="share-item" href="javascript:void(0)" onclick="shareOnFacebook()" title="Share on Facebook"><i class="fab fa-facebook"></i></a>
            <a class="share-item" href="javascript:void(0)" onclick="shareOnLinkedIn()" title="Share on LinkedIn"><i class="fab fa-linkedin"></i></a>
            <a class="share-item" href="javascript:void(0)" onclick="shareOnTwitter()" title="Share on Twitter"><i class="fab fa-twitter"></i></a>
            <a class="share-item" href="javascript:void(0)" onclick="shareByEmail()" title="Share by Email"><i class="fas fa-envelope"></i></a>
            <a class="share-item" href="javascript:void(0)" onclick="shareOnPinterest()" title="Share on Pinterest"><i class="fab fa-pinterest"></i></a>
          </div>
        </div>


        <div class="payment-icon-box">
          <div class="payment-top">
            <img src="/checkout/v2/images/secure-checkout.png" width="14" height="14" alt="">
            <p>@lang('checkout::app.v3.Secure Checkout')</p>
          </div>
          <img src="/checkout/v2/images/payment6.svg" width="40" height="10" alt="">
          <img src="/checkout/v2/images/payment2.svg" width="40" height="31" alt="">
          <img src="/checkout/v2/images/payment3.svg" width="78" height="25" alt="">
          <img src="/checkout/v2/images/payment4.svg" width="78" height="19" alt="">
          <img src="/checkout/v2/images/payment5.svg" width="78" height="26" alt="">
        </div>

        <div class="shopify-title fl">
          <div class="shopify-title-item bor-bom-3" id="shopify-title-item1">
            <p style="margin-left: 5px;">@lang('checkout::app.v3.Description')</p>
          </div>
          <div class="shopify-title-item" id="shopify-title-item2">
            <p class="container_title" onclick="reviewToggle()">
              @lang('onebuy::app.product.order.What customers are saying about')
            </p>
          </div>
        </div>
        <div class="shopify-container fl"></div>
        <div id="iduzu" class="section" style="width: 100%;float: right;margin-bottom:10px; display: flex;">
        </div>
        <!-- review -->
        <div class="section" id="reviews-box" style="width: 100%;float: right; display:none">
          <div class="reviews-content"></div>
          <div class="pagination" style="display: none;">
            <button id="prev-page">@lang('checkout::app.v3.Prev')</button>
            <span id="page-info"></span>
            <button id="next-page">@lang('checkout::app.v3.Next')</button>
            <input type="number" id="page-input" min="1" value="1">
            <button id="jump-page">@lang('checkout::app.v3.Jump')</button>
          </div>

        </div>
        <p class="pkg-hdng" id="pkg-hdng1" style="border-top: 1px solid #ccc; padding-top: 10px">
          <span class="pkg-step">
            @lang('checkout::app.v2.Step')1:
          </span>
          @lang('checkout::app.v2.Choose your package')
          <a style="margin-left:5px;color:#1773B0; font-size:13px" href="javascript:void(0)" id="size-chart" onclick="sizeCharImgPreview()">
            @lang('checkout::app.v2.size chart')
          </a>
        </p>
        <div class="pkg-opt">
          <div class="cb-first-item"></div>
          <div class="buyopt packageClass cb-package-container choose-p" id="product2">
            <div class="recommended">@lang('checkout::app.v2.Most Recommended')</div>
            <p class="product-selected" id="p2-select">@lang('checkout::app.v2.Selected')</p>
            <div class="buy-opt-left">
              <p>
                <strong id="p-name2"></strong>
                <br />
                <span class="p-off" id="b-off2"></span>
                <span class="cb-discountPercentage"></span>
              </p>
            </div>
            <div class="buy-opt-rgt">
              <p class="pkg-prc">
                <span class="cb-reg-price" id="cb-reg-price2"></span> <br />
                <span class="cb-buy-each font-weight-bold"></span><span class="font-weight-bold" id="cb-buy-each2"></span>
              </p>
            </div>
          </div>
          <div class="buy-select buy-relative" id="buy-select2">
            <div class="buy-se-box">
              <div class="se-box" id="select2-item1">
                <p class="se-title">@lang('checkout::app.v2.item')1</p>
              </div>
            </div>

            <div class="buy-se-box" id="p2-i2">
              <div class="se-box" id="select2-item2">
                <p class="se-title">@lang('checkout::app.v2.item')2</p>
              </div>
            </div>
          </div>

          <div class="buyopt packageClass cb-package-container" id="product1">
            <p class="product-selected" id="p1-select">@lang('checkout::app.v2.Selected')</p>
            <div class="buy-opt-left">
              <p>
                <strong id="p-name1"></strong>
                <br />
                <span class="p-off" id="b-off1"></span>
                <span class="cb-discountPercentage"></span>
              </p>
            </div>
            <div class="buy-opt-rgt">
              <p class="pkg-prc">
                <span class="cb-reg-price" id="cb-reg-price1"></span> <br />
                <span class="cb-buy-each font-weight-bold"></span><span class="font-weight-bold" id="cb-buy-each1"></span>
              </p>
            </div>
          </div>
          <div class="buy-select buy-relative" id="buy-select1">
            <div class="buy-se-box">
              <div class="se-box" id="select1-item1">
                <p class="se-title">@lang('checkout::app.v2.item')1</p>
              </div>
            </div>
          </div>

          <div class="buyopt packageClass cb-package-container" id="product3">
            <p class="product-selected" id="p3-select">@lang('checkout::app.v2.Selected')</p>
            <div class="buy-opt-left">
              <p>
                <strong id="p-name3"></strong>
                <br />
                <span class="p-off" id="b-off3"></span>
                <span class="cb-discountPercentage"></span>
              </p>
            </div>
            <div class="buy-opt-rgt">
              <p class="pkg-prc">
                <span class="cb-reg-price" id="cb-reg-price3"></span> <br />
                <span class="cb-buy-each font-weight-bold"></span><span class="font-weight-bold" id="cb-buy-each3"></span>
              </p>
            </div>
          </div>
          <div class="buy-select buy-relative" id="buy-select3">
            <div class="buy-se-box">
              <div class="se-box" id="select3-item1">
                <p class="se-title">@lang('checkout::app.v2.item')1</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select3-item2">
                <p class="se-title">@lang('checkout::app.v2.item')2</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select3-item3">
                <p class="se-title">@lang('checkout::app.v2.item')3</p>
              </div>
            </div>
          </div>
          <div class="buyopt packageClass cb-package-container" id="product4">
            <p class="product-selected" id="p4-select">@lang('checkout::app.v2.Selected')</p>
            <div class="buy-opt-left">
              <p>
                <strong id="p-name4"></strong>
                <br />
                <span class="p-off" id="b-off4"></span>
                <span class="cb-discountPercentage"></span>
              </p>
            </div>
            <div class="buy-opt-rgt">
              <p class="pkg-prc">
                <span class="cb-reg-price" id="cb-reg-price4"></span> <br />
                <span class="cb-buy-each font-weight-bold"></span><span class="font-weight-bold" id="cb-buy-each4"></span>
              </p>
            </div>
          </div>
          <div class="buy-select buy-relative" id="buy-select4">
            <div class="buy-se-box">
              <div class="se-box" id="select4-item1">
                <p class="se-title">@lang('checkout::app.v2.item')1</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select4-item2">
                <p class="se-title">@lang('checkout::app.v2.item')2</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select4-item3">
                <p class="se-title">@lang('checkout::app.v2.item')3</p>
              </div>
            </div>
            <div class="buy-se-box">
              <div class="se-box" id="select4-item4">
                <p class="se-title">@lang('checkout::app.v2.item')4</p>
              </div>
            </div>
          </div>
          <p class="button-top">@lang('checkout::app.v2.Express checkout')</p>
          <div class="zoom-fade submit-button fl" id="payment-button" style="text-align: center;margin-top: 12px; width:100%;height:73px;"></div>
          <div style="float:left;">
            <div style="display: flex;align-items: center;">
              <input type="checkbox" name="payment_vault" value="1" checked onchange="paymentVault(this)">
              <p style="margin-left: 5px;">@lang('checkout::app.v4.Save my card for future payments')</p>
            </div>
          </div>
          <div id="loading">
            <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 100000; background:#ddd;opacity: 0.3;" id="loading-box" class="flex-center">
              <div class="box">
                <div class="loader loader-01"></div>
              </div>
            </div>
          </div>

        </div>

        <p class="bdr-line"></p>

        <p class="pkg-hdng"><span class="pkg-step">@lang('checkout::app.v2.Step')2:</span> @lang('checkout::app.v2.Enter customer information')</p>
        <form class="form">
          <div class="formBox">
            <div class="fl input-box">
              <label>
                <input onblur="inputBlur(event)" class="input-item" name="firstName" id="firstName" type="text" placeholder="" required="" />
                <span class="input-span">@lang('checkout::app.v2.First Name')</span>
              </label>
            </div>
            <div class="fl input-box">
              <label>
                <input onblur="inputBlur(event)" class="input-item" name="lastName" id="lastName" type="text" placeholder="" required="" />
                <span class="input-span">@lang('checkout::app.v2.Last Name')</span>
              </label>
            </div>
            <div class="fl input-box">
              <label>
                <input onblur="inputBlur(event)" class="input-item" name="email" id="email" type="email" placeholder="" required="" />
                <span class="input-span">@lang('checkout::app.v2.Email')</span>
              </label>
            </div>
            <div class="fl input-box">
              <label>
                <input onblur="inputBlur(event)" class="input-item" name="phone" id="phone" type="tel" placeholder="" required="" />
                <span class="input-span">@lang('checkout::app.v2.Phone')</span>
              </label>
            </div>
            <p class="bdr-line"></p>
            <div class="payment-flds-box">
              <p class="pkg-hdng"><span class="pkg-step">@lang('checkout::app.v2.Step')3:</span> @lang('checkout::app.v2.Enter your shipping information')</p>
              <div class="fl input-box" style="margin-top: 15px;">
                <label>
                  <input onblur="inputBlur(event)" oninput="addressChange(event)" class="input-item" name="shippingAddress1" type="text" placeholder="" required="" />
                  <span class="input-span">@lang('checkout::app.v2.Address')</span>
                </label>
                <p class="email-warn" style="margin-top: -8px; display:none;">@lang('checkout::app.v2.Add a house number if you have one')</p>
              </div>
              <div class="fl input-box">
                <label>
                  <input onblur="inputBlur(event)" class="input-item" name="shippingCity" type="text" placeholder="" required="" />
                  <span class="input-span">@lang('checkout::app.v2.City')</span>
                </label>
              </div>
              <div class="frm-flds fl">
                <label for="shippingCountry" class="fl-label"></label>
                <select name="shippingCountry" type="text" placeholder="@lang('checkout::app.v2.Country')" class="selcet-fld required cb-remove-class frmField" data-selected="US" data-error-message="Please select your country!">
                </select>
              </div>
              <div class="frm-flds fl" style="margin-top: 10px;">
                <label for="state" class="fl-label"></label>
                <select type="text" name="shippingState" placeholder="@lang('checkout::app.v2.State')" class="selcet-fld required cb-remove-class frmField" id="shippingStateSelect" data-error-message="Please select your state!" data-selected="">
                  <option value=""></option>
                </select>
              </div>
              <div class="fl input-box" style="margin-top: 10px;">
                <label>
                  <input onblur="inputBlur(event)" class="input-item" name="shippingZip" id="zip" type="tel" placeholder="" required="" />
                  <span class="input-span">@lang('checkout::app.v2.Zip Code')</span>
                </label>
              </div>
            </div>
            <p class="bdr-line hide-mob"></p>
            <p class="pkg-hdng"><span class="pkg-step">@lang('checkout::app.v2.Step')4:</span> @lang('checkout::app.v2.Enter your payment information')</p>
            <p style="font-size: 13px;color: #444444; margin-bottom: 15px">@lang('checkout::app.v2.All transactions are secure and encrypted')</p>
            <select name="creditCardType" class="form-control" data-error-message="Please select valid card type!">
              <option value="">Card Type</option>
              <option value="master">Master Card</option>
              <option value="visa">Visa</option>
              <option value="amex">Amex</option>
              <option value="discover">Discover</option>
              <option value="paypal">Paypal</option>
            </select>

            <div class="htmleaf-container">
              <form id="myForm">

                <div class="full-container">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-12">
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default" id="airwallex-klarna-box">
                          <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                              <div class="panel-title-header" id="headingThree2">
                                <div class="form-check form-check-inline" style="width: 100%;">
                                  <input class="form-check-input" name="airwallex-klarna" type="radio" value="airwallex-klarna" id="airwallex-klarna" <?php if ($payments_default == 'airwallex-klarna') echo 'checked'; ?> name="payment_method">
                                  <label class="form-check-label" for="airwallex-klarna" style="float: right;min-width: 95%;">
                                    <span style="font-family: var(--title-family);">@lang('onebuy::app.product.payment.klarna.title')</span>
                                    <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/Klarna.png" width="84" height="24" loading="lazy" alt="" /></div>
                                  </label>
                                </div>
                              </div>


                            </h4>
                          </div>
                          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                              <div style="margin:10px;">
                                @lang('onebuy::app.product.payment.klarna.description')
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default" id="payal-standard-box">
                          <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                              <div class="panel-title-header" id="headingOne2">
                                <div class="form-check form-check-inline" style="width: 100%;">
                                  <input class="form-check-input" type="radio" value="paypal_standard" id="payal_standard" <?php if ($payments_default == 'payal_standard') echo 'checked'; ?> name="payment_method">
                                  <label class="form-check-label" for="payal_standard" style="float: right;min-width: 95%;">
                                    <span style="font-family: var(--title-family);">@lang('onebuy::app.product.payment.paypal.title') </span>
                                    <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/paypal.png" width="84" height="24" loading="lazy" alt="" /></div>
                                  </label>
                                </div>
                              </div>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              <div style="margin:10px;">
                                @lang('onebuy::app.product.payment.paypal.description')
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default" id="airwallex-credit-card-box">
                          <div class="panel-heading" id="headingOne">
                            <h4 class="panel-title">
                              <div class="panel-title-header" id="headingOne1">
                                <div class="form-check form-check-inline" style="width: 100%;">
                                  <input class="form-check-input" type="radio" name="payment_method" id="payment_method_airwallex" <?php if ($payments_default == 'payment_method_airwallex') echo 'checked'; ?> value="airwallex">
                                  <label class="form-check-label" for="payment_method_airwallex" style="float: right;min-width: 95%;">
                                    <span style="font-family: var(--title-family);">@lang('onebuy::app.product.payment.creditCard.title')</span>
                                    <div class="text-right" style="min-width:190px; display: inline;float: right;">
                                      <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/0169695890db3db16bfe.svg" loading="lazy" alt="" />
                                      <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/ae9ceec48b1dc489596c.svg" loading="lazy" alt="" />
                                      <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/f11b90c2972f3811f2d5.svg" loading="lazy" alt="" />
                                      <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/37fc65d0d7ac30da3b0c.svg" loading="lazy" alt="" />
                                    </div>

                                  </label>
                                </div>

                              </div>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                              <div>
                                <div id="cardNumber" class="form-floating input-group has-icon-left" style="
                                  border: 1px solid rgba(105, 105, 105, 0.397);
                                  border-radius: 10px;
                                  color: #222;
                                  height: 32px;
                                  line-height: 22px;
                                  width: 100%;
                                  font-size: 14px;
                                  padding: 3px 8px;
                                  outline: 0;
                                  font-family: var(--title-family), sans-serif;
                                  font-weight: 400;
                                  box-sizing: border-box;
                                  background-color: #fff;
                                  -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
                                  line-height: 1.25;padding: 1rem 0.75rem "></div>
                              </div>
                              <div style='margin-top:10px'>
                                <div id="cardExpiry" style="
                                  border: 1px solid rgba(105, 105, 105, 0.397);
                                  border-radius: 10px;
                                  color: #222;
                                  height: 32px;
                                  line-height: 22px;
                                  width: 100%;
                                  font-size: 14px;
                                  padding: 3px 8px;
                                  outline: 0;
                                  font-family: var(--title-family), sans-serif;
                                  font-weight: 400;
                                  box-sizing: border-box;
                                  background-color: #fff;
                                  -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
                                  line-height: 1.25;padding: 1rem 0.75rem "></div>
                              </div>
                              <div style='margin-top:10px'>
                                <div id="cardCvc" style="
                                  border: 1px solid rgba(105, 105, 105, 0.397);
                                  border-radius: 10px;
                                  color: #222;
                                  height: 32px;
                                  line-height: 22px;
                                  width: 100%;
                                  font-size: 14px;
                                  padding: 3px 8px;
                                  outline: 0;
                                  font-family: var(--title-family), sans-serif;
                                  font-weight: 400;
                                  box-sizing: border-box;
                                  background-color: #fff;
                                  -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
                                  line-height: 1.25;padding: 1rem 0.75rem "></div>
                              </div>
                              <div style="display: flex;align-items: center;margin:10px 0 0 5px">
                                <input type="checkbox" name="payment_vault" value="1" checked onchange="airwallexVault(this)">
                                <p style="margin-left: 5px;">@lang('checkout::app.v4.Save my card for future payments')</p>
                              </div>
                              <div class="choose-billing-box">
                                <div style="display: flex;align-items: center;">
                                  <input type="checkbox" name="hobby" value="music" onchange="billingAddress()">
                                  <p style="margin-left: 5px;">Use differce address for billing</p>
                                </div>
                              </div>
                              <div class="billing-content" style="display: none;">
                                <div class="input-box">
                                  <label>
                                    <input onblur="billingInputBlur(event)" class="input-item" name="billingStreetAddress" type="text" placeholder="" required="" />
                                    <span class="input-span">Billing Street Address</span>
                                  </label>
                                </div>
                                <div class="billing-input-box">
                                  <div class="frm-flds fl" style="width:48% !important">
                                    <label for="billingCountry " class="fl-label"></label>
                                    <select name="billingCountry" type="text" placeholder="Billing Country" class="selcet-fld required cb-remove-class frmField">
                                    </select>
                                  </div>
                                  <div class="frm-flds fl" style="width:48% !important">
                                    <label for="billingState" class="fl-label"></label>
                                    <select name="billingState" type="text" placeholder="Billing State" class="selcet-fld required cb-remove-class frmField">
                                    </select>
                                  </div>
                                </div>
                                <div class="input-box" style="margin-top: 10px;">
                                  <label>
                                    <input onblur="billingInputBlur(event)" class="input-item" name="billingZip" id="billingZip" type="tel" placeholder="" required="" />
                                    <span class="input-span">Billing Zip/Postal Code</span>
                                  </label>
                                </div>
                                <div class="input-box">
                                  <label>
                                    <input onblur="billingInputBlur(event)" class="input-item" name="billingCity" placeholder="" required="" />
                                    <span class="input-span">Billing City</span>
                                  </label>
                                </div>
                                <div class="billing-input-box">
                                  <div class="input-box" style="width:48% !important">
                                    <label>
                                      <input onblur="billingInputBlur(event)" class="input-item" name="billingFirstName" placeholder="" required="" />
                                      <span class="input-span">Billing First Name</span>
                                    </label>
                                  </div>
                                  <div class="input-box" style="width:48% !important">
                                    <label>
                                      <input onblur="billingInputBlur(event)" class="input-item" name="billingLastName" placeholder="" required="" />
                                      <span class="input-span">Billing Last Name</span>
                                    </label>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default" id="airwallex-dropin-box">
                            <div class="panel-heading" role="tab" id="airwallex_dropin_head_1">
                              <h4 class="panel-title">
                                <div class="panel-title-header" id="airwallex_dropin_2">
                                  <div class="form-check form-check-inline input-box" style="width: 100%;">
                                    <input class="form-check-input input-item" type="radio" value="airwallex_dropin" id="airwallex_dropin" <?php if ($payments_default == 'airwallex_dropin') echo 'checked'; ?> name="payment_method">
                                    <label class="form-check-label" for="airwallex_dropin" style="float: right;min-width: 95%;">
                                      <span style="font-family: var(--title-family);">@lang('onebuy::app.product.payment.airwallex_dropin.title') </span>
                                      <!-- <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/paypal.png" style="max-height:24px" /></div> -->
                                    </label>
                                  </div>
                                </div>
                              </h4>
                            </div>
                            <div id="airwallex_dropin_collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="airwallex_dropin_head_2">
                              <div class="panel-body">
                                <p>
                                <div>
                                  @lang('onebuy::app.product.payment.airwallex_dropin.description')
                                </div>
                                </p>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="panel panel-default" id="google-pay-box">
                          <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                              <div class="panel-title-header">
                                <div class="form-check form-check-inline" style="width: 100%;">
                                  <input class="form-check-input" type="radio" onchange="gooleOrAppleChange()" value="airwallex_google" id="airwallex_google" name="payment_method">
                                  <label class="form-check-label" for="airwallex_google" style="float: right;min-width: 95%;">
                                    <span style="font-family: var(--title-family);line-height:40px">GooglePay </span>
                                    <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v2/images/googlePay.webp" width="64" height="40" style="max-height:40px" loading="lazy" alt="" /></div>
                                  </label>
                                </div>
                              </div>
                            </h4>
                          </div>
                          <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              <div style="margin:10px;">
                                After clicking "Pay with GooglePay" you will be redirected to GooglePay to securely complete your purchase.
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-default" id="apple-pay-box">
                          <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                              <div class="panel-title-header">
                                <div class="form-check form-check-inline" style="width: 100%;">
                                  <input class="form-check-input" onchange="gooleOrAppleChange()" type="radio" value="airwallex_apple" id="airwallex_apple" name="payment_method">
                                  <label class="form-check-label" for="airwallex_apple" style="float: right;min-width: 95%;">
                                    <span style="font-family: var(--title-family);line-height:40px">ApplePay</span>
                                    <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v2/images/applePay.webp" width="64" height="40" style="max-height:40px" loading="lazy" alt="" /></div>
                                  </label>
                                </div>
                              </div>
                            </h4>
                          </div>
                          <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                              <div style="margin:10px;">
                                After clicking "Pay with ApplePay" you will be redirected to ApplePay to securely complete your purchase.
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
            </div>

          </div>
          <div class="complete-btn" id="complete-btn-id"></div>
          <div id="payment_vault2" style="display:none">
            <div style="display: flex;align-items: center;">
              <input type="checkbox" name="payment_vault2" value="1" checked onchange="paymentVault2(this)">
              <p style="margin-left: 5px;">@lang('checkout::app.v4.Save my card for future payments')</p>
            </div>
          </div>
          <div id="complete-btn-id"></div>
          <div id='paypal-button'></div>
          <div class="zoom-fade submit-button button-opacity pay-button fl" id="googlePayButton" onclick="googleOrAppleCheck()"></div>
          <div class="zoom-fade submit-button button-opacity appalpay-button fl" id="applePayButton" onclick="googleOrAppleCheck()"></div>
        </form>
        <div class="summary-wrapper">
          <div class="order-summary-title">
            <div style="font-size: 14px;font-weight: 500;">@lang('checkout::app.v2.ORDER DETAILS')</div>
          </div>
          <div class="order-summary-item">
            <div class="sku-info">

            </div>
          </div>
          <div class="order-summary-item">
            <div>@lang('checkout::app.v2.Subtotal'):</div>
            <div id="summary-total1" style="color: red;"></div>
          </div>
          <div class="order-summary-item">
            <div>@lang('checkout::app.v2.Discount'):</div>
            <div id="summary-total2"></div>
          </div>
          <div class="order-summary-item">
            <div>@lang('checkout::app.v2.Shipping'):</div>
            <div id="summary-total3" style="color: red;"></div>
          </div>
          <div class="order-summary-item">
            <div>@lang('checkout::app.v2.Shipping Method'):</div>
            <div>@lang('checkout::app.v2.USPS Express')</div>
          </div>
          <div class="order-summary-total">
            <div><strong>@lang("checkout::app.v2.Today's Total"):</strong></div>
            <div>
              <strong id="summary-total4" style="color: red">@lang('checkout::app.v2.price')</strong>
            </div>
          </div>
        </div>
        <div class="faq-content" style="width: 100%;float: right;">
          <div id="seeFaqBtn">
            @lang('onebuy::app.product.order.Frequently Asked Questions')
            <span class="faq_view" onclick="heightChange()">@lang('onebuy::app.product.order.See Our FAQs')</span>
          </div>
          <div id="faq-text">
            <div id="collapseContent">
              <?php foreach ($faqItems as $key => $item) {
                $item = json_decode($item); ?>

                <div class="panel-group" id="accordion<?php echo $key; ?>" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <p class="panel-title">
                        <a class="faq-question" role="button" data-toggle="collapse" data-parent="#accordion<?php echo $key; ?>" href="#faq<?php echo $key; ?>" aria-expanded="true" aria-controls="faq<?php echo $key; ?>" style="color: #333; text-decoration: none">
                          <?php echo $item->q; ?>
                        </a>
                      </p>
                    </div>
                    <div id="faq<?php echo $key; ?>" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body"><?php echo $item->a; ?></div>
                    </div>
                  </div>
                </div>

              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearall"></div>
  <div class="btn-fixed">
    <div class="btn-bx" id="btn-bx">
      <a href="#product2" class="comn-btn" id="comn-btn1">@lang('checkout::app.v3.Buy Now')</a>
    </div>
  </div>
  <div class="icon-container" onclick="iconToggle()">
    <i class="fa-solid fa-cart-shopping"></i>
  </div>
  <div class="image-area" id="imageArea"></div>

  <div class="footer-box">
    <p style="font-weight: 700" id="footer-top-text">© 2024 </p>
    <br class="br" />
    <br class="br" />
    <div class="phone-block"></div>
    <div class="terms-block">
      <a class="ajax" href="/onebuy/page/shipping-policy?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.Shipping') </a>
      <a class="ajax" href="/onebuy/page/refund-policy?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.refund policy')</a>
      <a class="ajax" href="/onebuy/page/about-us?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.About Us')</a>
      <a class="ajax" href="/onebuy/page/privacy-policy?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.Privacy Policy')</a>
      <a class="ajax" href="/onebuy/page/contact-us?locale=<?php echo strtolower($default_country); ?>" target="_blank"> @lang('checkout::app.v2.Contact us')</a>
      <a class="ajax terms-block-last" style="display: none;" href="/onebuy/page/Impressum?locale=<?php echo strtolower($default_country); ?>" target="_blank">@lang('checkout::app.v2.imprint')</a>
    </div>
    <br /><br />
    <div class="dmca_logo">
      <img src="/checkout/v2/images/1662477222-dmca.webp" width="150" height="30" loading="lazy" alt="DMCA.com Protection Status" />
    </div>
  </div>
  <div class="dialog-error">
    <div class="dialog-box">
      <a href="javascript:void(0)" id="error-close" onclick="closeDialog()">X</a>
      <ul style="text-align: center;">
      </ul>
    </div>
  </div>
  <div class="sku-preview-img-box" onclick="imgBoxClose()">
    <div class="sku-preview-img">
      <img src="/checkout/v2/images/dmca_protected_sml_120n.png" loading="lazy" alt="" />
    </div>
  </div>
  <div class="size-chart-img-box" onclick="sizeChartBoxClose()">
    <div class="size-chart-img">
      <img src="" loading="lazy" alt="" />
    </div>
  </div>

  <script>
    var app_current_step = {
      id: 1,
      configId: 1,
      goto: 'upsell1a.php',
      pageType: 'checkoutPage',
      ajaxDelay: 0,
      link: 'checkout-now-v3.php',
    }
    var app_query_params = []
  </script>
  <script type="application/json" fncls="fnparams-dede7cc5-15fd-4c75-a9f4-36c430ee3a99">
    {
      "f": "<?php echo md5(uniqid()); ?>",
      "s": "<?php echo $paypal_rt; ?>_RT",
    }
  </script>
  <script type="text/javascript">
    AJAX_PATH = 'ajax.php/'
    app_config = {
      valid_class: 'no-error',
      error_class: 'has-error',
      loading_class: 'loading',
      exit_popup_enabled: false,
      exit_popup_element_id: '',
      exit_popup_page: '',
      offer_path: '\/offer\/1\/',
      current_step: 1,
      cbtoken: 'b997b34d04abdf676c5078e372e21d6e',
      dev_mode: 'N',
      show_validation_errors: 'modal',
      allowed_tc: '8"m4l4d4J454k454O0lv8sm"l"d4J454k454O4l481mvlsd"J[r1j4V4H4q4h4k4R4X|Niraj,V1H4q4h4k4R4X4N4r|jiVaH]',
      allowed_country_codes: ['US'],
      countries: {
        US: {
          name: 'United States',
          states: {
            AL: {
              name: 'Alabama'
            },
            AK: {
              name: 'Alaska'
            },
            AS: {
              name: 'American Samoa'
            },
            AZ: {
              name: 'Arizona'
            },
            AR: {
              name: 'Arkansas'
            },
            CA: {
              name: 'California'
            },
            CO: {
              name: 'Colorado'
            },
            CT: {
              name: 'Connecticut'
            },
            DE: {
              name: 'Delaware'
            },
            DC: {
              name: 'District of Columbia'
            },
            FM: {
              name: 'Federated States of Micronesia'
            },
            FL: {
              name: 'Florida'
            },
            GA: {
              name: 'Georgia'
            },
            GU: {
              name: 'Guam'
            },
            HI: {
              name: 'Hawaii'
            },
            ID: {
              name: 'Idaho'
            },
            IL: {
              name: 'Illinois'
            },
            IN: {
              name: 'Indiana'
            },
            IA: {
              name: 'Iowa'
            },
            KS: {
              name: 'Kansas'
            },
            KY: {
              name: 'Kentucky'
            },
            LA: {
              name: 'Louisiana'
            },
            ME: {
              name: 'Maine'
            },
            MD: {
              name: 'Maryland'
            },
            MA: {
              name: 'Massachusetts'
            },
            MI: {
              name: 'Michigan'
            },
            MN: {
              name: 'Minnesota'
            },
            MS: {
              name: 'Mississippi'
            },
            MO: {
              name: 'Missouri'
            },
            MT: {
              name: 'Montana'
            },
            NE: {
              name: 'Nebraska'
            },
            NV: {
              name: 'Nevada'
            },
            NH: {
              name: 'New Hampshire'
            },
            NJ: {
              name: 'New Jersey'
            },
            NM: {
              name: 'New Mexico'
            },
            NY: {
              name: 'New York'
            },
            NC: {
              name: 'North Carolina'
            },
            ND: {
              name: 'North Dakota'
            },
            MP: {
              name: 'Northern Mariana Islands'
            },
            OH: {
              name: 'Ohio'
            },
            OK: {
              name: 'Oklahoma'
            },
            OR: {
              name: 'Oregon'
            },
            PA: {
              name: 'Pennsylvania'
            },
            PR: {
              name: 'Puerto Rico'
            },
            MH: {
              name: 'Republic of Marshall Islands'
            },
            RI: {
              name: 'Rhode Island'
            },
            SC: {
              name: 'South Carolina'
            },
            SD: {
              name: 'South Dakota'
            },
            TN: {
              name: 'Tennessee'
            },
            TX: {
              name: 'Texas'
            },
            UT: {
              name: 'Utah'
            },
            VT: {
              name: 'Vermont'
            },
            VI: {
              name: 'Virgin Islands of the U.S.'
            },
            VA: {
              name: 'Virginia'
            },
            WA: {
              name: 'Washington'
            },
            WV: {
              name: 'West Virginia'
            },
            WI: {
              name: 'Wisconsin'
            },
            WY: {
              name: 'Wyoming'
            },
          },
        },
        FR: {
          states: {
            bb: {
              name: '123'
            }
          }
        }
      },
      country_lang_mapping: {},
      device_is_mobile: false,
      pageType: 'checkoutPage',
      enable_browser_back_button: false,
      disable_trialoffer_cardexp: true,
      enable_csrf_token: true,
    }
  </script>
  <script type="text/javascript">
    var cbUtilConfig = {
      disable_non_english_char_input: false
    }
  </script>
  <script>
    var validator_data = {
      enable_ca_statecode_validation: true,
      ca_state_code_mask: 'S0S 0S0',
      ca_state_code_regex: '^[A-Za-z]\\d[A-Za-z](\\s?\\d[A-Za-z]\\d)?$',
      us_state_code_mask: '00000',
      enable_statecode_validation: true,
      enable_us_statecode_validation: true,
    }
  </script>
  <!-- <script src="/checkout/v2/js/jquery-3.0.0.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/jquery.colorbox.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.ajax').colorbox({
        width: '90%'
      })
    })
  </script>


  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-P6343Y2GKT"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-P6343Y2GKT', {
      "debug_mode": true
    });
  </script>

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

  <script>
    var isMobile = window.innerWidth <= 768;
    var orderObj = {},
      params = {
        first_name: "",
        second_name: "",
        email: "",
        phone_full: "",
        country: "",
        city: "",
        province: "",
        address: "",
        code: "",
        product_delivery: "",
        currency: "",
        coupon_code: "",
        product_price: "",
        total: "",
        amount: "",
        payment_return_url: "",
        payment_cancel_url: "",
        phone_prefix: "",
        payment_method: "",
        products: [],
        logo_image: "",
        brand: "",
        description: "",
        shopify_store_name: "",
        produt_amount_base: "",
        domain_name: "",
        price_template: "",
        omnisend: "",
        payment_account: "",
        shipping_address: "",
        bill_first_name: "",
        bill_second_name: "",
        bill_country: null,
        bill_city: "",
        bill_province: null,
        bill_address: "",
        bill_code: "",
        error: false
      },
      currency = '{{ core()->getCurrentCurrencyCode() }}',
      paypalId = '',
      attLength,
      productL1 = {},
      productL2 = {},
      productL3 = {},
      productL4 = {},
      getProductId = '{{ $slug }}',
      countries1 = '<?php echo strtolower($default_country); ?>',
      reviewErrMsg = "@lang('checkout::app.v3.Please enter a valid page number')",
      reviewLang = "@lang('onebuy::app.product.order.Verified')",
      paypal_pay_acc = '',
      area = '{{ app()->getLocale() }}',
      currencySymbol = '{{ core()->currencySymbol(core()->getCurrentCurrencyCode()) }}',
      airwallexArr = {
        complete: false
      },
      skuErr = false,
      schrittImg = "/checkout/v2/images/1701506369_" + countries1 + ".webp",
      googlerOrApple = '',
      googleShow = false,
      appleShow = false,
      shopifyToggle = true,
      reviewsToggle = true,
      countryOptions = '',
      countriesList = '',
      swiperImgList = [],
      galleryThumbs,
      mySwiper,
      phppackage_products = <?php echo json_encode($data['package_products']); ?>,

      phpads = '<?php echo addslashes(json_encode($data['ads'])); ?>',
      phpattr = '<?php echo addslashes(json_encode($data['attr'])); ?>',
      phpbrand = '<?php echo $data['brand']; ?>',
      phpdefault_country = '<?php echo $data['default_country']; ?>',
      phpenv = '<?php echo $data['env']; ?>',
      phppayments = '<?php echo addslashes(json_encode($data['payments'])); ?>',
      phppayments_default = '<?php echo $data['payments_default']; ?>',
      phppaypal_client_id = '<?php echo $data['paypal_client_id']; ?>',
      phpsku = '<?php echo $data['sku']; ?>',
      phpsellPoints = '<?php echo addslashes(json_encode($data['sellPoints'])); ?>',
      payment_vault = 1,
      payment_vault2 = 1,
      airwallex_vault = 1;
    phppackage_products.forEach(function(index, item) {
      JSON.parse(item)
    })
    var data = {
      ads: JSON.parse(phpads),
      attr: JSON.parse(phpattr),
      brand: phpbrand,
      default_country: phpdefault_country,
      env: phpenv,
      package_products: phppackage_products,
      payments: JSON.parse(phppayments),
      payments_default: phppayments_default,
      paypal_client_id: phppaypal_client_id,
      // product: JSON.parse(phpproduct),
      sku: phpsku,
      sellPoints: JSON.parse(phpsellPoints)
    }
    params.payment_return_url = window.location.href;
    params.payment_cancel_url = window.location.href;
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.0.4/js/swiper.js"></script>
  <script src="/checkout/v4/js/main.js?v=13"></script>
  <script>
    $(function() {
      if (countries1 == 'fr' || countries1 == 'es') {
        $('.header-middle').hide()
      } else {
        $('.header-middle').show()
        $('.header-middle img').attr({
          'src': schrittImg,
          'width': '460'
        })
      }
      if (countries1 == 'de' || countries1 == 'fr') {
        $('.terms-block-last').show()
      }
      if (countries1 == 'us' || countries1 == 'gb') {
        var favicon = '/checkout/v2/images/favicon.webp'
        $('#favicon-icon').attr('href', favicon)
      }
      airwallex_vault = 1;
      payment_vault = 1;
      payTypeShow = data.payments
      var attrList = data.attr.attributes
      paypal_pay_acc = data.paypal_client_id
      var paymentsDefault = data.payments_default
      getDescriptionItem(data)
      $('#p-name2').text(data.package_products[0].name)
      $('#p-name1').text(data.package_products[1].name)
      $('#p-name3').text(data.package_products[2].name)
      $('#p-name4').text(data.package_products[3].name)
      $('#b-off2').text("@lang('checkout::app.v2.Save')" + data.package_products[0].tip1 + "@lang('checkout::app.v2.OFF')")
      $('#b-off1').text("@lang('checkout::app.v2.Save')" + data.package_products[1].tip1 + "@lang('checkout::app.v2.OFF')")
      $('#b-off3').text("@lang('checkout::app.v2.Save')" + data.package_products[2].tip1 + "@lang('checkout::app.v2.OFF')")
      $('#b-off4').text("@lang('checkout::app.v2.Save')" + data.package_products[3].tip1 + "@lang('checkout::app.v2.OFF')")
      $('#cb-reg-price2').text(data.package_products[0].old_price_format)
      $('#cb-reg-price1').text(data.package_products[1].old_price_format)
      $('#cb-reg-price3').text(data.package_products[2].old_price_format)
      $('#cb-reg-price4').text(data.package_products[3].old_price_format)
      $('#cb-buy-each2').text(data.package_products[0].new_price_format)
      $('#cb-buy-each1').text(data.package_products[1].new_price_format)
      $('#cb-buy-each3').text(data.package_products[2].new_price_format)
      $('#cb-buy-each4').text(data.package_products[3].new_price_format)
      let discount1 = Number(data.package_products[1].old_price) - Number(data.package_products[1].new_price)
      discount1 = currencySymbol + discount1.toFixed(2)
      $('.pr-price-single > :eq(0)').text(data.package_products[1].old_price_format)
      $('.pr-price-single > :eq(1)').text(data.package_products[1].new_price_format)
      $('#pr-price1').text(discount1)
      $('#pr-price2').text("(" + data.package_products[1].tip1 + ")")
      if (attrList.length > 0) {
        attrList.forEach(function(item) {
          let num = 0
          let sortedObj = sortObjectByValue(item.attr_sort);
          let keysIterator = sortedObj.keys();
          let keysList = Array.from(keysIterator);
          keysList.forEach(function(keyItem) {
            item.options.forEach(function(opItem, index) {
              if (opItem.id == keyItem) {
                num++
                item.options.splice(index, 1)
                opItem.num = num
                item.options.push(opItem)
              }
            })
          })
        })

        var selectList = ''
        for (var arri = 0; arri < attrList.length; arri++) {
          var optionList = `<option value="" selected disabled>` + attrList[arri].label + `</option>`
          for (var attj = 0; attj < attrList[arri].options.length; attj++) {
            optionList += `<option value="` + attrList[arri].options[attj].label + `">` + attrList[arri].options[attj].label + `</option>`
          }
          selectList += `<select class="in-se" id="in-se` + arri + `" onchange="seInput(value)">` + optionList + `</select>`
        }
        $('.se-box').append(selectList)
        $('#buy-select2').show()
      } else {
        $('.buy-select').hide()
        $('#p2-select').show()
        $('#product2').addClass('background-green')
      }
      var nprice = currencySymbol + data.package_products[0].new_price.toFixed(2)
      $('#summary-total1').text(nprice)
      var shippingFee = currencySymbol + data.package_products[0].shipping_fee
      $('#summary-total3').text(shippingFee)

      var discount = Number(data.package_products[0].old_price) - Number(data.package_products[0].new_price)
      discount = currencySymbol + discount.toFixed(2)
      $('#summary-total2').text(discount)
      var total = Number(data.package_products[0].new_price) + Number(data.package_products[0].shipping_fee)
      total = currencySymbol + total.toFixed(2)
      $('#summary-total4').text(total)
      $('.product-name').text(data.package_products[0].name)
      $('#product-number').text('number: 2')
      $('#product-price').text(data.package_products[0].tip2)
      if (data.payments.airwallex_credit_card == '0') {
        $('.paypal-box').hide()
      }
      if (data.payments.payal_standard == '0') {
        $('.cardPayOpt').hide()
        $('.credit-card').hide()
      }

      var productsObj = {}
      var midList = []
      attLength = data.attr.attributes.length
      params.product_delivery = data.package_products[0].shipping_fee
      params.total = Number(data.package_products[0].new_price) + Number(data.package_products[0].shipping_fee)
      params.amount = '2'
      params.description = data.package_products[0].name
      paypalId = data.paypal_client_id
      productsObj.amount = '1'
      productsObj.description = data.package_products[0].name
      productsObj.product_id = '<?php echo $data['product']['id']; ?>'
      productsObj.img = '<?php echo @$data['product']['base_image']['large_image_url']; ?>'
      productsObj.price = data.package_products[0].tip2
      productL1 = JSON.parse(JSON.stringify(productsObj))
      productL2 = JSON.parse(JSON.stringify(productsObj))
      productL3 = JSON.parse(JSON.stringify(productsObj))
      productL4 = JSON.parse(JSON.stringify(productsObj))
      var name1,
        name1List = [],
        name2,
        name2List = [],
        name3,
        name3List = [],
        name4,
        name4List = [],
        v1,
        v1List = [],
        v2,
        v2List = [],
        v3,
        v3List = [],
        v4,
        v4List = []
      for (let m = 0; m < attLength; m++) {
        var oid = '#in-se' + m

        if (params.amount == '1') {}
        if (params.amount == '2') {
          name1 = $('#select2-item1').children('select').eq(m).val()
          name1List.push(name1)
          name2 = $('#select2-item2').children('select').eq(m).val()
          name2List.push(name2)
          for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
            var mid = data.attr.attributes[m].id
            if (data.attr.attributes[m].options[inm].label == name1) {
              v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name2) {
              v2List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
          }
        }
        if (params.amount == '3') {}
        if (params.amount == '4') {}
      }
      name1List = name1List.join(',')
      name2List = name2List.join(',')
      v1List = v1List.join(',')
      v2List = v2List.join(',')
      productL1.attr_id = v1List
      productL2.attr_id = v2List
      productL1.attribute_name = name1List
      productL2.attribute_name = name2List
      getVSID(data.attr.index2)
      params.products = []
      params.products.push(productL1, productL2)
      getSkuListInfo();
      if (data.attr.attributes.length == 0) {
        params.products.forEach(function(item) {
          item.product_sku = data.sku
          item.variant_id = ''
        })
      }
      $('.prod-name').text('<?php echo addslashes($data['product']['name']); ?>')
      $('title').html('<?php echo addslashes($data['product']['name']); ?>')
      $('#buy-select1, #buy-select3, #buy-select4').hide()
      $('#footer-top-text').append(data.brand)
      var isPc = IsPC()
      if (countries1 == 'us') {
        $('.choose-billing-box').show()
        if (isPc) {
          let isMac = /macintosh|mac os x/i.test(navigator.userAgent);
          googlerOrApple = isMac ? 'apple' : 'google'

        } else {
          let type = getMobileOperatingSystem()
          googlerOrApple = type == 'iOS' ? 'apple' : 'google'
        }
        if (googlerOrApple == 'google' && payTypeShow.airwallex_google == 1) {
          googleShow = true
        }
        if (googlerOrApple == 'apple' && payTypeShow.airwallex_appley == 1) {
          appleShow = true
        }
      }
      if (data.ads.size.img == '') {
        $('#size-chart').hide()
      } else {
        $('#size-chart').show()
      }
      if (payTypeShow.airwallex_klarna == '0') {
        $('#airwallex-klarna-box').hide()
      }
      if (payTypeShow.payal_standard == '0') {
        $('#payal-standard-box').hide()

      }
      if (payTypeShow.airwallex_credit_card == '0') {
        $('#airwallex-credit-card-box').hide()

      }
      if (payTypeShow.airwallex_dropin == '0') {
        $('#airwallex-dropin-box').hide()
      }
      if (payTypeShow.airwallex_google == '0' || googlerOrApple !== 'google') {
        $('#google-pay-box').hide()
      }
      if (payTypeShow.airwallex_appley == '0' || googlerOrApple !== 'apple') {
        $('#apple-pay-box').hide()
      }
      if (paymentsDefault == 'airwallex_klarna') {
        $('#airwallex-klarna').prop('checked', true);
        $('#payal_standard').prop('checked', false);
        $('#payment_method_airwallex').prop('checked', false);
        $("#complete-btn-id").show();
        $("#collapseOne").hide();
        $("#collapseTwo").hide();
        $("#collapseThree").show();
        $("#airwallex_dropin_collapse").hide();

        $("#headingThree2").addClass("action");
        $("#headingOne1").removeClass("action");
        $("#headingOne2").removeClass("action");
        $("#airwallex_dropin_2").removeClass("action");
        $("#complete-btn-id").addClass(".complete-btn")
        $("#complete-btn-id").addClass("submit-button");
        $("#complete-btn-id").css({
          width: "100%",
          background: "#1773b0",
          padding: "18px 13px",
          textAlign: 'center'
        });
        $("#complete-btn-id").html("@lang('checkout::app.v2.complete_secure_purchase')");
      } else {
        window.is_airwallex = true
        $('#airwallex-klarna').prop('checked', false);
        $('#payal_standard').prop('checked', false);
        $('#payment_method_airwallex').prop('checked', true);
        $("#complete-btn-id").show();
        $("#collapseOne").show();
        $("#collapseTwo").hide();
        $("#collapseThree").hide();
        $("#airwallex_dropin_collapse").hide();

        $("#headingOne1").addClass("action");
        $("#headingThree2").removeClass("action");
        $("#headingOne2").removeClass("action");
        $("#airwallex_dropin_2").removeClass("action");
        $("#complete-btn-id").addClass(".complete-btn")
        $("#complete-btn-id").addClass("submit-button");
        $("#complete-btn-id").css({
          width: "100%",
          background: "#1773b0",
          padding: "18px 13px",
          textAlign: 'center'
        });
        $("#complete-btn-id").html("@lang('checkout::app.v2.complete_secure_purchase')");
      }
      var script = document.createElement('script')
      if (script.readyState) {
        // IE
        script.onreadystatechange = function() {
          if (
            script.readyState === 'loaded' ||
            script.readyState === 'complete'
          ) {
            script.onreadystatechange = null
            creatPaypalCardButton()
          }
        }
      } else {
        script.onload = function() {
          creatPaypalCardButton()
        }
      }
      script.type = 'text/javascript'
      script.src =
        'https://www.paypal.com/sdk/js?client-id=' +
        paypal_pay_acc +
        '&components=buttons,messages,funding-eligibility&vault=true&commit=true&currency=' +
        currency

      script.async = true

      script.setAttribute('data-user-id-token', '<?php echo $paypal_id_token; ?>')
      document.body.appendChild(script)

    })

    function paymentVault(radio) {
      // Remove existing PayPal script if it exists
      const existingScript = document.querySelector('script[src*="paypal.com/sdk/js"]');
      if (existingScript) {
        existingScript.remove();
      }

      // Create new script element
      const script = document.createElement('script');
      script.type = 'text/javascript';
      script.async = true;

      if (radio.checked) {
        payment_vault = 1;
        script.src = `https://www.paypal.com/sdk/js?client-id=${paypal_pay_acc}&components=buttons,messages,funding-eligibility&vault=true&commit=true&currency=${currency}`;
        script.setAttribute('data-user-id-token', '<?php echo $paypal_id_token; ?>');
      } else {
        payment_vault = 0;
        script.src = `https://www.paypal.com/sdk/js?client-id=${paypal_pay_acc}&components=buttons,messages,funding-eligibility&currency=${currency}`;
      }
      if (script.readyState) {
        // IE
        script.onreadystatechange = function() {
          if (
            script.readyState === 'loaded' ||
            script.readyState === 'complete'
          ) {
            script.onreadystatechange = null
            creatPaypalCardButton()
          }
        }
      } else {
        script.onload = function() {
          creatPaypalCardButton()
        }
      }
      document.body.appendChild(script);


    }

    function paymentVault2(radio) {
      // Remove existing PayPal script if it exists
      const existingScript = document.querySelector('script[src*="paypal.com/sdk/js"]');
      if (existingScript) {
        existingScript.remove();
      }

      // Create new script element
      const script = document.createElement('script');
      script.type = 'text/javascript';
      script.async = true;

      if (radio.checked) {
        payment_vault2 = 1;
        script.src = `https://www.paypal.com/sdk/js?client-id=${paypal_pay_acc}&components=buttons,messages,funding-eligibility&vault=true&commit=true&currency=${currency}`;
        script.setAttribute('data-user-id-token', '<?php echo $paypal_id_token; ?>');
      } else {
        payment_vault2 = 0;
        script.src = `https://www.paypal.com/sdk/js?client-id=${paypal_pay_acc}&components=buttons,messages,funding-eligibility&currency=${currency}`;
      }
      if (script.readyState) {
        // IE
        script.onreadystatechange = function() {
          if (
            script.readyState === 'loaded' ||
            script.readyState === 'complete'
          ) {
            script.onreadystatechange = null
            creatPaypalCardButton2()
          }
        }
      } else {
        script.onload = function() {
          creatPaypalCardButton2()
        }
      }
      document.body.appendChild(script);


    }

    function airwallexVault(radio) {
      if (radio.checked) {
        airwallex_vault = 1;
      } else {
        airwallex_vault = 0;
      }
    }

    function sortObjectByValue(obj) {
      let entries = Object.entries(obj);
      entries.sort((a, b) => a[1] - b[1]);
      let map = new Map();
      entries.forEach(([key, value]) => {
        map.set(key, value);
      });
      return map;
    }

    function getbillingAddress() {
      var billingText = ''
      if ($('input[name=hobby]').is(":checked")) {
        params.bill_first_name = $('input[name="billingFirstName"]').val()
        params.bill_second_name = $('input[name="billingLastName"]').val()
        params.bill_country = $('select[name="billingCountry"]').val()
        params.bill_city = $('input[name="billingCity"]').val()
        params.bill_province = $('select[name="billingState"]').val()
        params.bill_address = $('input[name="billingStreetAddress"]').val()
        params.bill_code = $('input[name="billingZip"]').val()
        params.shipping_address = 'other'
        if (params.bill_first_name == '') {
          billingText += '<li>Please enter your billing first name!</li>'
        }
        if (params.bill_second_name == '') {
          billingText += '<li>Please enter your billing last name!</li>'
        }
        if (params.bill_country == '' || params.bill_country == null) {
          billingText += '<li>Please select your billing country!</li>'
        }
        if (params.bill_city == '') {
          billingText += '<li>Please enter your billing city!</li>'
        }
        if (params.bill_province == '' || params.bill_province == null) {
          billingText += '<li>Please select your billing state!</li>'
        }
        if (params.bill_address == '') {
          billingText += '<li>Please enter your billing address!</li>'
        }
        if (params.bill_code == '') {
          billingText += '<li>Please enter your billing first name</li>'
        }
      }
      return billingText;
    }

    function getDescriptionItem(data) {
      let descriptionContent = ''
      if (!data.sellPoints) {
        $('.three-description-box').hide()
      } else {
        let sellObj = data.sellPoints
        $.each(sellObj, function(key, value) {
          if (value) {
            descriptionContent += `<div class="three-description-item">
            <img src="/checkout/v2/images/1673346232-mainpage.webp" width="30" height="30" loading="lazy" alt="">
            <p class="three-description-text"> ` + value + `</p></div>`
          }
        })
      }
      $('.three-description-box').append(descriptionContent)
    }
    $('#shopify-title-item1').click(function() {
      $(".shopify-content").show()
      $('#reviews-box').hide()
      $('#shopify-title-item1').addClass('bor-bom-3')
      $('#shopify-title-item2').removeClass('bor-bom-3')
    })

    function reviewToggle() {
      $('#shopify-title-item2').addClass('bor-bom-3')
      $('#shopify-title-item1').removeClass('bor-bom-3')
      $(".shopify-content").hide()
      $('#reviews-box').show()
    }

    function billingAddress() {
      if ($('input[name=hobby]').is(":checked")) {
        $('.billing-content').show()
        if (countryOptions !== '' && countriesList[0]?.countryCode !== '') {

          $('select[name="billingCountry"]').append(countryOptions)
          $('select[name="billingCountry"]').val(countriesList[0].countryCode)
          var cval = countriesList[0].countryCode.toLowerCase()
          var countryUrl = '/template-common/checkout1/state/' + cval + '_' + area + '.json'
          axios
            .get(countryUrl)
            .then(function(res) {
              if (res.data[0].CountryCode) {
                var stateList = res.data
                var optionList = `<option value="" selected disabled>@lang('checkout::app.v2.Select State')</option>`
                for (var resj = 0; resj < stateList.length; resj++) {
                  optionList += `<option value="` + stateList[resj].StateCode + `">` + stateList[resj].StateName + `</option>`
                }
                $('select[name="billingState"]').empty()
                $('select[name="billingState"]').append(optionList)
              }
            })
        }

      } else {
        $('.billing-content').hide()
      }
    }

    $('select[name="billingCountry"]').change(function() {
      if ($(this).val()) {
        var countryClick = $(this).val().toLowerCase()
        var countryUrl = '/template-common/checkout1/state/' + countryClick + '_' + area + '.json'
        axios
          .get(countryUrl)
          .then(function(res) {
            if (res.data[0].CountryCode) {
              var stateList = res.data
              var optionList = `<option value="" selected disabled>@lang('checkout::app.v2.Select State')</option>`
              for (var resj = 0; resj < stateList.length; resj++) {
                optionList += `<option value="` + stateList[resj].StateCode + `">` + stateList[resj].StateName + `</option>`
              }
              $('select[name="billingState"]').empty()
              $('select[name="billingState"]').append(optionList)
            }

          })
          .catch(function(err) {
            console.log(err, 'err====')
          })
      }
    })

    function billingInputBlur(event) {
      if ($(event.target).val() !== '') {
        $(event.target).next().addClass('input-focus')
      } else {
        $(event.target).next().removeClass('input-focus')
      }
    }

    function addressChange(event) {
      const hasNumber = /\d/.test(event.target.value);
      if (hasNumber) {
        $('.email-warn').hide()
      } else {
        $('.email-warn').show()
      }

    }

    function inputBlur(event) {
      if ($(event.target).val() !== '') {
        $(event.target).next().addClass('input-focus')
      } else {
        $(event.target).next().removeClass('input-focus')
      }
      var trackFlag = $('input[name="firstName"]').val() && $('input[name="lastName"]').val() && $('input[name="email"]').val() && $('input[name="phone"]').val() && $('input[name="shippingAddress1"]').val() && $('input[name="shippingCity"]').val() && $('input[name="shippingZip"]').val()
      if (trackFlag) {
        crmTrack('add_user_info')
      }
      createdButton()
    }

    function IsPC() {
      var userAgentInfo = navigator.userAgent;
      var Agents = ["Android", "iPhone",
        "SymbianOS", "Windows Phone",
        "iPad", "iPod"
      ];
      var flag = true;
      for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
          flag = false;
          break;
        }
      }
      return flag;
    }

    function getMobileOperatingSystem() {
      var userAgent = navigator.userAgent || navigator.vendor || window.opera;

      if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/iPod/i)) {
        return 'iOS';
      } else if (userAgent.match(/Android/i)) {
        return 'Android';
      } else {
        return 'unknown';
      }
    }

    function throttle(fn, wait) {
      let timeout = null;
      return function() {
        let context = this,
          args = arguments;
        if (!timeout) {
          timeout = setTimeout(() => {
            fn.apply(context, args);
            timeout = null;
          }, wait);
        }
      };
    }

    function crmTrack(type) {
      var postParams = {
        channel_id: "<?php echo $crm_channel; ?>",
        token: "<?php echo $refer; ?>",
        type: type
      };
      fetch('https://crm.heomai.com/api/user/action', {
        body: JSON.stringify(postParams),
        method: 'POST',
        headers: {
          'content-type': 'application/json'
        },
      })
    }

    function validateEmail(email) {
      const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
      return regex.test(email);
    }

    function errDialogShow(errIsShow, emailErr, billingErr = '', airwallexArror = true) {
      $('.dialog-error .dialog-box ul').empty()
      var textList = ''
      if (!$('input[name="firstName"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your first name!')</li>`
      }
      if (!$('input[name="lastName"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your last name!')</li>`
      }
      if (!$('input[name="email"]').val() || !emailErr) {
        textList += `<li>@lang('checkout::app.v2.Please enter a valid email address!')</li>`
      }
      if (!$('input[name="phone"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your phone number!')</li>`
      }
      if (!$('input[name="shippingAddress1"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your address!')</li>`
      }
      if (!$('input[name="shippingCity"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please enter your city!')</li>`
      }
      if (!$('input[name="shippingZip"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please insert a valid postal code!')</li>`
      }
      if (!$('select[name="shippingCountry"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please select your country!')</li>`
      }
      if (!$('select[name="shippingState"]').val()) {
        textList += `<li>@lang('checkout::app.v2.Please select your state!')</li>`
      }
      if (!errIsShow) {
        textList += `<li>@lang('checkout::app.v2.Please select product information!')</li>`
      }
      if (!airwallexArror) {
        textList += `<li>` + airwallexArr.errText + `</li>`
      }
      if (billingErr !== '') {
        textList += billingErr
      }
      $('.dialog-error').show()
      $('.dialog-error .dialog-box ul').append(textList)
    }

    function getAttrId(productL, obj) {
      if (typeof(obj) == 'undefined') {
        productL.variant_id = ''
        productL.product_sku = ''
        return
      }
      let objKey = Object.keys(obj)
      if (productL.attr_id !== '') {
        for (const key in obj) {
          if (key == productL.attr_id) {
            productL.variant_id = obj[key][0]
            productL.product_sku = obj[key][1]
            break;
          } else {
            productL.variant_id = ''
            productL.product_sku = ''
          }
        }
      } else {
        productL.variant_id = ''
        productL.product_sku = ''
      }
    }

    function getVSID(obj, value = '1') {
      if (value == '') {
        productL1.product_sku = ''
        productL2.product_sku = ''
        productL3.product_sku = ''
        productL4.product_sku = ''
      }
      getAttrId(productL1, obj)
      getAttrId(productL2, obj)
      getAttrId(productL3, obj)
      getAttrId(productL4, obj)
    }

    function showImage(index) {
      const img = $('#imageArea').children().eq(index)
      const imgAttr = img.attr('src')
      if (imgAttr !== '') {
        $('.image-area').removeClass('image-toggle')
        $('.icon-container').addClass('icon-toggle icon-fixed')
        img.addClass('active');
      }
      setTimeout(() => {
        img.removeClass('active').addClass('fixed');
      }, 1000)
      $('#imageArea img').on('click', function() {
        $(this).toggleClass('enlarged');
      });
      $('#imageArea img').on('transitionend', function() {
        setTimeout(() => {
          img.removeClass('active').addClass('fixed');
        }, 1000);
      });
    }

    function shopIcon() {
      if (isMobile) {
        $('.icon-container').addClass('icon-fixed')
        $('.icon-container').removeClass('icon-toggle')
        $('.image-area').html('')
      }
    }

    function iconToggle() {
      $('.icon-container').toggleClass('icon-toggle')
      $('.image-area').toggleClass('image-toggle')
    }

    function imgRemove() {
      $('#imageArea img').removeClass('enlarged');
    }
    $(document).ready(function() {
      $(document).on('click', function(event) {
        var clickedElement = $(event.target);
        if (!clickedElement.closest('#imageArea img').length) {
          $('#imageArea img').removeClass('enlarged');
        }

      });
    });

    function throttle(fn, wait) {
      var time = Date.now();
      return function() {
        if ((time + wait - Date.now()) < 0) {
          fn();
          time = Date.now();
        }
      }
    }

    window.addEventListener('scroll', throttle(imgRemove, 1000));

    function getSkuListInfo(id = '') {
      $('.sku-info').empty()
      var skuData = params.products
      var skuList = ''
      if (id !== '' && isMobile) {
        // skuData[0].img = '/checkout/v2/images/logo_de.webp'
        const lastChar = id.charAt(id.length - 1) - 1
        let previewDom = ''
        skuData.forEach((item) => {
          previewDom += `<img src= "` + item.img + `" alt= ''/>`
        })
        const imageArea = $('#imageArea');
        imageArea.html(previewDom)
        showImage(lastChar)
      }
      for (let i = 0; i < skuData.length; i++) {
        var description = skuData[i].description.slice(2)
        var attributeName = skuData[i].attribute_name.split(',').join(' / ')
        var skuImgUrl = skuData[i].img
        if (skuData[i].img == '') {
          skuImgUrl = data.package_products[0].image
        }
        skuList += `<div class="sku-item-info">
                <img src="` + skuImgUrl + `"  onclick="skuImgPreview(event)" style="width: 64px;height:64px" loading="lazy" alt=""/>
                <div class="sku-content">
                  <p class="sku-item-title">` + description + `</p>
                  <span class="sku-item-text">` + attributeName + `</span>
                  <a
                    style="display:block;color:#1773B0; font-size:13px"
                    href="javascript:void(0)"
                    onclick="javascript:bookmarkscroll.scrollTo('product2')"
                    >@lang('checkout::app.v2.edit')</a> 
                </div>
                <div class="sku-price">` + skuData[i].price + `</div>
              </div>`
      }
      $('.sku-info').append(skuList)
    }

    function skuImgPreview(event) {
      var imgUrl = $(event.target).attr('src')
      $('.sku-preview-img-box').show()
      $('.sku-preview-img img').attr('src', imgUrl)
    }

    function sizeCharImgPreview() {
      var imgUrl = data.ads.size.img
      $('.size-chart-img-box').show()
      $('.size-chart-img img').attr('src', imgUrl)
    }

    function imgBoxClose() {
      $('.sku-preview-img-box').hide()
    }

    function sizeChartBoxClose() {
      $('.size-chart-img-box').hide()
    }

    function paramsProductsinit(list) {
      for (var listi = 0; listi < list.length; listi++) {
        if (listi == list.length - 1) {
          break;
        }
        if (list[listi].attr_id == list[listi + 1].attr_id) {
          var toNum = Number(list[listi].amount) + 1
          list[listi + 1].amount = String(toNum)
          list.splice(listi, 1)

        }
      }
      params.products = list
    }

    function initProuctData(num1, num2) {
      var name1,
        name1List = [],
        name2,
        name2List = [],
        name3,
        name3List = [],
        name4,
        name4List = [],
        v1,
        v1List = [],
        v2,
        v2List = [],
        v3,
        v3List = [],
        v4,
        v4List = []
      var productsObj = {}
      var midList = []
      params.product_delivery = data.package_products[num1].shipping_fee
      params.total = Number(data.package_products[num1].new_price) + Number(data.package_products[num1].shipping_fee)
      params.amount = num2
      params.description = data.package_products[num1].name
      productsObj.amount = '1'
      productsObj.description = data.package_products[num1].name
      productsObj.product_id = '<?php echo $data['product']['id']; ?>'
      productsObj.price = data.package_products[num1].tip2
      productsObj.img = '<?php echo @$data['product']['base_image']['large_image_url']; ?>'
      productL1 = JSON.parse(JSON.stringify(productsObj))
      productL2 = JSON.parse(JSON.stringify(productsObj))
      productL3 = JSON.parse(JSON.stringify(productsObj))
      productL4 = JSON.parse(JSON.stringify(productsObj))
      for (let m = 0; m < attLength; m++) {
        var oid = '#in-se' + m

        if (params.amount == '1') {
          name1 = $('#select1-item1').children('select').eq(m).val()
          name1List.push(name1)
          for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
            var mid = data.attr.attributes[m].id
            if (data.attr.attributes[m].options[inm].label == name1) {
              v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
          }
        }
        if (params.amount == '2') {
          name1 = $('#select2-item1').children('select').eq(m).val()
          name1List.push(name1)
          name2 = $('#select2-item2').children('select').eq(m).val()
          name2List.push(name2)
          name3 = $('#select2-item2').children('select').eq(m).val()
          name2List.push(name2)
          for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
            var mid = data.attr.attributes[m].id
            if (data.attr.attributes[m].options[inm].label == name1) {
              v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name2) {
              v2List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
          }
        }
        if (params.amount == '3') {
          name1 = $('#select3-item1').children('select').eq(m).val()
          name1List.push(name1)
          name2 = $('#select3-item2').children('select').eq(m).val()
          name2List.push(name2)
          name3 = $('#select3-item3').children('select').eq(m).val()
          name3List.push(name3)
          for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
            var mid = data.attr.attributes[m].id
            if (data.attr.attributes[m].options[inm].label == name1) {
              v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name2) {
              v2List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name3) {
              v3List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
          }
        }
        if (params.amount == '4') {
          name1 = $('#select4-item1').children('select').eq(m).val()
          name1List.push(name1)
          name2 = $('#select4-item2').children('select').eq(m).val()
          name2List.push(name2)
          name3 = $('#select4-item3').children('select').eq(m).val()
          name3List.push(name3)
          name4 = $('#select4-item4').children('select').eq(m).val()
          name4List.push(name4)
          for (var inm = 0; inm < data.attr.attributes[m].options.length; inm++) {
            var mid = data.attr.attributes[m].id
            if (data.attr.attributes[m].options[inm].label == name1) {
              v1List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name2) {
              v2List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name3) {
              v3List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
            if (data.attr.attributes[m].options[inm].label == name4) {
              v4List.push(mid + '_' + data.attr.attributes[m].options[inm].id)
            }
          }
        }
      }
      if (num2 == '1') {
        name1List = name1List.join(',')
        v1List = v1List.join(',')
        productL1.attr_id = v1List
        productL1.attribute_name = name1List
        getVSID(data.attr.index2)
        params.products = []
        params.products.push(productL1)
      }
      if (num2 == '2') {
        name1List = name1List.join(',')
        name2List = name2List.join(',')
        v1List = v1List.join(',')
        v2List = v2List.join(',')
        productL1.attr_id = v1List
        productL2.attr_id = v2List
        productL1.attribute_name = name1List
        productL2.attribute_name = name2List
        getVSID(data.attr.index2)
        params.products = []
        params.products.push(productL1, productL2)
        // paramsProductsinit(params.products)
      }
      if (num2 == '3') {
        name1List = name1List.join(',')
        name2List = name2List.join(',')
        name3List = name3List.join(',')

        v1List = v1List.join(',')
        v2List = v2List.join(',')
        v3List = v3List.join(',')

        productL1.attr_id = v1List
        productL2.attr_id = v2List
        productL3.attr_id = v3List

        productL1.attribute_name = name1List
        productL2.attribute_name = name2List
        productL3.attribute_name = name3List
        getVSID(data.attr.index2)
        params.products = []
        params.products.push(productL1, productL2, productL3)
        // paramsProductsinit(params.products)
      }
      if (num2 == '4') {
        name1List = name1List.join(',')
        name2List = name2List.join(',')
        name3List = name3List.join(',')
        name4List = name4List.join(',')

        v1List = v1List.join(',')
        v2List = v2List.join(',')
        v3List = v3List.join(',')
        v4List = v4List.join(',')

        productL1.attr_id = v1List
        productL2.attr_id = v2List
        productL3.attr_id = v3List
        productL4.attr_id = v4List

        productL1.attribute_name = name1List
        productL2.attribute_name = name2List
        productL3.attribute_name = name3List
        productL4.attribute_name = name4List
        getVSID(data.attr.index2)
        params.products = []
        params.products.push(productL1, productL2, productL3, productL4)
        // paramsProductsinit(params.products)
      }
      if (data.attr.attributes.length == 0) {
        params.products.forEach(function(item) {
          item.product_sku = data.sku
          item.variant_id = ''
        })
      }
      getSkuListInfo();
    }
    $(function() {
      var countriesUrl = '/template-common/checkout1/state/countries_' + countries1 + '.json'
      axios
        .get(countriesUrl)
        .then(function(res) {
          if (res.data[0].countryCode) {
            app_config.allowed_country_codes = []
            countriesList = res.data
            countryOptions = `<option value="" disabled>@lang('checkout::app.v2.select country')</option>`
            for (let resi = 0; resi < countriesList.length; resi++) {
              var code = countriesList[resi].countryCode
              var name = countriesList[resi].countryName
              countryOptions += `<option value="` + code + `">` + name + `</option>`
            }
            $('select[name="shippingCountry"]').append(countryOptions)
            $('select[name="shippingCountry"]').val(countriesList[0].countryCode)
          }
          var cval = $('select[name="shippingCountry"]').val()
          if (cval) {
            cval = cval.toLowerCase()
            var countryUrl = '/template-common/checkout1/state/' + cval + '_' + area + '.json'
            axios
              .get(countryUrl)
              .then(function(res) {
                if (res.data[0].CountryCode) {
                  var stateList = res.data
                  var optionList = `<option value="" selected disabled>@lang('checkout::app.v2.Select State')</option>`
                  for (var resj = 0; resj < stateList.length; resj++) {
                    optionList += `<option value="` + stateList[resj].StateCode + `">` + stateList[resj].StateName + `</option>`
                  }
                  $('select[name="shippingState"]').empty()
                  $('select[name="shippingState"]').append(optionList)
                  // $('select[name="shippingState"]').val(stateList[0].StateCode)
                }
              })
          }

        })
        .catch(function(err) {
          console.log(err, 'err====')
        })
    })

    $('select[name="shippingState"]').change(function() {
      params.province = $(this).val()
    })
    $('select[name="shippingCountry"]').change(function() {
      params.country = $(this).val()
      if ($(this).val()) {
        var countryClick = $(this).val().toLowerCase()
        var countryUrl = '/template-common/checkout1/state/' + countryClick + '_' + area + '.json'
        axios
          .get(countryUrl)
          .then(function(res) {
            if (res.data[0].CountryCode) {
              var stateList = res.data
              var optionList = `<option value="" selected disabled>@lang('checkout::app.v2.Select State')</option>`
              for (var resj = 0; resj < stateList.length; resj++) {
                optionList += `<option value="` + stateList[resj].StateCode + `">` + stateList[resj].StateName + `</option>`
              }
              $('select[name="shippingState"]').empty()
              $('select[name="shippingState"]').append(optionList)
              // $('select[name="shippingState"]').val(stateList[0].StateCode)
            }

          })
          .catch(function(err) {
            console.log(err, 'err====')
          })
      }
    })
    $(document).ready(function() {
      $('#mySelect option[disabled]').each(function() {
        $(this).css('background-color', 'lightgray');
      });
    });

    function getSku(id, n, value) {
      var nList = []
      var aList = []
      for (var i = 0; i < attLength; i++) {
        var inSeId = 'in-se' + i
        if (id == inSeId) {
          nList = params.products[n].attribute_name.split(',')
          nList[i] = value
          params.products[n].attribute_name = nList.join(',')
          for (var j = 0; j < data.attr.attributes[i].options.length; j++) {
            if (data.attr.attributes[i].options[j].label == value) {
              aid = data.attr.attributes[i].options[j].id
            }
          }
          var imgIndex = ''
          var colorList = data.attr.attributes[0].options
          for (var colori = 0; colori < colorList.length; colori++) {
            if (colorList[colori].label == value) {
              imgIndex = colorList[colori].products[0]
            }
          }
          if (imgIndex) {
            params.products[n]
            var finUrl = data.attr.variant_images[imgIndex][0].original_image_url
            params.products[n].img = finUrl
          }
          aList = params.products[n].attr_id.split(',')
          if (value !== '') {
            aList[i] = data.attr.attributes[i].id + '_' + aid

          } else {
            aList[i] = ''
          }
          params.products[n].attr_id = aList.join(',')
        }
      }
      getVSID(data.attr.index2, value)
    }

    function listEach(list) {
      return list.every(function(item) {
        return item !== '' && item !== null
      })
    }

    function getNextOptions(value) {
      let attribute = data.attr.attributes[0],
        nextList = data.attr.attributes[1],
        nextId = data.attr.attributes[1].id,
        skuList = '',
        keys = [],
        updateNext = [],
        change = false
      attribute.options.forEach(function(item) {
        if (item.label == value) {
          skuList = item.sku
        }
      })
      if (skuList !== '' && Object.keys(skuList[nextId]).length !== 0) {
        keys = Object.keys(skuList[nextId])
        keys.forEach(function(item) {
          nextList.options.forEach(function(nextItem) {
            if (item == nextItem.id) {
              updateNext.push(nextItem)
            }
          })
        })
      }
      const noInArray = nextList.options.filter(function(element) {
        return !updateNext.includes(element)
      })
      noInArray.sort(function(a, b) {
        return a.num - b.num
      })
      updateNext.sort(function(a, b) {
        return a.num - b.num
      })
      let nextOption = `<option value="" selected disabled>` + data.attr.attributes[1].label + `</option>`
      for (let i = 0; i < updateNext.length; i++) {
        nextOption += `<option onchange="seInput(value)" value="` + updateNext[i].label + `">` + updateNext[i].label + `</option>`
      }
      if (noInArray.length > 0) {
        change = true
        for (let i = 0; i < noInArray.length; i++) {
          nextOption += `<option onchange="seInput(value)" disabled value="` + noInArray[i].label + `">` + noInArray[i].label + `</option>`
        }
      }
      return {
        nextOption,
        change
      }
    }

    function swiperTo(value) {
      let swiperToId = ''
      let variantId = ''
      data.attr.attributes.forEach(function(item) {
        if (item.id == "23") {
          item.options.forEach(function(opItem) {
            if (opItem.label == value) {
              swiperToId = opItem.products[0]
            }
          })

        }
      })
      for (const key in data.attr.index) {
        if (Object.hasOwnProperty.call(data.attr.index, key)) {
          if (key == swiperToId) {
            variantId = data.attr.index[key].sku.split('-')[1]
          }
        }
      }
      if (swiperImgList.length > 0) {
        swiperImgList.forEach(function(item, index) {
          if (item.variant_ids.includes(Number(variantId))) {
            index = index + 1
            galleryThumbs.slideTo(index)
            mySwiper.slideTo(index)
          }
        })
      }

    }

    function seInput(value) {
      if (value == null) {
        value = ''
      }
      $(event.target).removeClass('border-red')
      var parId = $(event.target).parent().attr('id')
      var itemId = $(event.target).attr('id')
      var aid = ''
      if (parId == 'select1-item1' || parId == 'select2-item1' || parId == 'select3-item1' || parId == 'select4-item1') {
        getSku(itemId, 0, value)
      }
      if (parId == 'select2-item2' || parId == 'select3-item2' || parId == 'select4-item2') {
        getSku(itemId, 1, value)
      }
      if (parId == 'select3-item3' || parId == 'select4-item3') {
        getSku(itemId, 2, value)
      }
      if (parId == 'select4-item4') {
        getSku(itemId, 3, value)
      }
      if (itemId == 'in-se0') {
        swiperTo(value)
      }
      if (itemId == 'in-se0' && data.attr.attributes.length == 2) {
        let returnParams = getNextOptions(value)
        if (returnParams.change) {
          $(event.target).siblings('#in-se1').html(returnParams.nextOption)
          $(event.target).siblings('#in-se1').addClass('border-red')
          let lastChar = parId.substring(parId.length - 1);
          getSku('in-se1', Number(lastChar) - 1, '')
        } else {
          $(event.target).siblings('#in-se1').removeClass('border-red')
          $(event.target).siblings('#in-se1').children().slice(1).removeAttr('disabled')
        }
      }
      getSkuListInfo(parId);
      var skuAll = $(event.target).parent().parent().parent()
      var list = []
      skuAll.find('select').each(function() {
        list.push($(this).val())
      })
      var isCrmTrack = listEach(list)
      if (isCrmTrack) {
        crmTrack('add_cart')
        createdButton()
      }
    }
    $('#product1').click(function(e) {
      $('.pay-button').addClass('button-opacity')
      $('.appalpay-button').addClass('button-opacity')
      var list = $('#product1,#product2,#product3,#product4')
      list.removeClass('choose-p')

      $('#buy-select2').hide()
      $('#buy-select3').hide()
      $('#buy-select4').hide()
      if (data.attr.attributes.length > 0) {
        $('#buy-select1').show()
        shopIcon()
      } else {
        $('#buy-select1').hide()
        list.removeClass('background-green')
        $('#product1').addClass('background-green')
      }
      $('#product1').addClass('choose-p')
      var nprice = currencySymbol + data.package_products[1].new_price.toFixed(2)
      $('#summary-total1').text(nprice)
      var shippingFee = currencySymbol + data.package_products[1].shipping_fee
      $('#summary-total3').text(shippingFee)
      var discount = Number(data.package_products[1].old_price) - Number(data.package_products[1].new_price)
      discount = currencySymbol + discount.toFixed(2)
      $('#summary-total2').text(discount)
      var total = Number(data.package_products[1].new_price) + Number(data.package_products[1].shipping_fee)
      total = currencySymbol + total.toFixed(2)
      $('#summary-total4').text(total)
      $('.product-name').text(data.package_products[1].name)
      $('#product-number').text('number: 1')
      $('#product-price').text(data.package_products[1].tip2)
      initProuctData(1, '1')
      if (data.attr.attributes.length == 0) {
        $('#p1-select').show()
        $('#p2-select').hide()
        $('#p3-select').hide()
        $('#p4-select').hide()
        crmTrack('add_cart')
        createdButton()
      }
    })
    $('#product2').click(function(e) {
      var list = $('#product1,#product2,#product3,#product4')
      list.removeClass('choose-p')
      $('#buy-select1').hide()
      $('#buy-select3').hide()
      $('#buy-select4').hide()
      if (data.attr.attributes.length > 0) {
        $('#buy-select2').show()
        shopIcon()
      } else {
        $('#buy-select2').hide()
        list.removeClass('background-green')
        $('#product2').addClass('background-green')
      }
      $('#product2').addClass('choose-p')
      var nprice = currencySymbol + data.package_products[0].new_price.toFixed(2)
      $('#summary-total1').text(nprice)
      var shippingFee = currencySymbol + data.package_products[0].shipping_fee
      $('#summary-total3').text(shippingFee)

      var discount = Number(data.package_products[0].old_price) - Number(data.package_products[0].new_price)
      discount = currencySymbol + discount.toFixed(2)
      $('#summary-total2').text(discount)
      var total = Number(data.package_products[0].new_price) + Number(data.package_products[0].shipping_fee)
      total = currencySymbol + total.toFixed(2)
      $('#summary-total4').text(total)
      $('.product-name').text(data.package_products[0].name)
      $('#product-number').text('number: 2')
      $('#product-price').text(data.package_products[0].tip2)
      initProuctData(0, '2')
      if (data.attr.attributes.length == 0) {
        $('#p2-select').show()
        $('#p1-select').hide()
        $('#p3-select').hide()
        $('#p4-select').hide()
        crmTrack('add_cart')
        createdButton()
      }
    })
    $('#product3').click(function(e) {
      var list = $('#product1,#product2,#product3,#product4')
      list.removeClass('choose-p')
      $('#buy-select2').hide()
      $('#buy-select1').hide()
      $('#buy-select4').hide()
      if (data.attr.attributes.length > 0) {
        $('#buy-select3').show()
        shopIcon()
      } else {
        $('#buy-select3').hide()
        list.removeClass('background-green')
        $('#product3').addClass('background-green')
      }

      $('#product3').addClass('choose-p')
      var nprice = currencySymbol + data.package_products[2].new_price.toFixed(2)
      $('#summary-total1').text(nprice)
      var shippingFee = currencySymbol + data.package_products[2].shipping_fee
      $('#summary-total3').text(shippingFee)

      var discount = Number(data.package_products[2].old_price) - Number(data.package_products[2].new_price)
      discount = currencySymbol + discount.toFixed(2)
      $('#summary-total2').text(discount)
      var total = Number(data.package_products[2].new_price) + Number(data.package_products[2].shipping_fee)
      total = currencySymbol + total.toFixed(2)
      $('#summary-total4').text(total)
      $('.product-name').text(data.package_products[2].name)
      $('#product-number').text('number: 3')
      $('#product-price').text(data.package_products[2].tip2)
      initProuctData(2, '3')
      if (data.attr.attributes.length == 0) {
        $('#p3-select').show()
        $('#p2-select').hide()
        $('#p1-select').hide()
        $('#p4-select').hide()
        crmTrack('add_cart')
        createdButton()
      }
    })
    $('#product4').click(function(e) {
      var list = $('#product1,#product2,#product3,#product4')
      list.removeClass('choose-p')

      $('#buy-select2').hide()
      $('#buy-select3').hide()
      $('#buy-select1').hide()
      if (data.attr.attributes.length > 0) {
        $('#buy-select4').show()
        shopIcon()
      } else {
        $('#buy-select4').hide()
        list.removeClass('background-green')
        $('#product4').addClass('background-green')
      }
      $('#product4').addClass('choose-p')
      var nprice = currencySymbol + data.package_products[3].new_price.toFixed(2)
      $('#summary-total1').text(nprice)
      var shippingFee = currencySymbol + data.package_products[3].shipping_fee
      $('#summary-total3').text(shippingFee)

      var discount = Number(data.package_products[3].old_price) - Number(data.package_products[3].new_price)
      discount = currencySymbol + discount.toFixed(2)
      $('#summary-total2').text(discount)
      var total = Number(data.package_products[3].new_price) + Number(data.package_products[3].shipping_fee)
      total = currencySymbol + total.toFixed(2)
      $('#summary-total4').text(total)
      $('.product-name').text(data.package_products[3].name)
      $('#product-number').text('number: 4')
      $('#product-price').text(data.package_products[3].tip2)
      initProuctData(3, '4')
      if (data.attr.attributes.length == 0) {
        $('#p4-select').show()
        $('#p2-select').hide()
        $('#p3-select').hide()
        $('#p1-select').hide()
        crmTrack('add_cart')
        createdButton()
      }
    })
    $('#complete-btn-id').click(function() {
      $('#loading').show()
      window.is_airwallex = true
      params.first_name = $('input[name="firstName"]').val()
      params.second_name = $('input[name="lastName"]').val()
      params.email = $('input[name="email"]').val()
      params.phone_full = $('input[name="phone"]').val()
      params.address = $('input[name="shippingAddress1"]').val()
      params.city = $('input[name="shippingCity"]').val()
      params.code = $('input[name="shippingZip"]').val()
      params.country = $('select[name="shippingCountry"]').val()
      params.province = $('select[name="shippingState"]').val()
      var billingErr = getbillingAddress()
      var errIsShow = skuIsScelect()
      var emailErr = validateEmail($('input[name="email"]').val())
      var errorShow = params.first_name && params.second_name && params.email && params.phone_full && params.address && params.city && params.code && params.country && params.province && errIsShow && airwallexArr.complete && emailErr
      if (!errorShow || billingErr !== '') {
        errDialogShow(errIsShow, emailErr, billingErr, airwallexArr.complete)
        $('#loading').hide()
        return
      }

      var klarnaSelected = $("#airwallex-klarna").is(":checked");
      var airwallexSelected = $("#payment_method_airwallex").is(":checked");
      if (klarnaSelected) {
        params.payment_method = 'airwallex_klarna'
      }
      if (airwallexSelected) {
        params.payment_method = 'airwallex'
      }
      createOrder('', '', 'airwallex')
    })

    function skuIsScelect() {
      var showDialog = true
      if (data.attr.attributes.length > 0 && params.products.length > 0) {
        if (typeof params.products[0] !== 'undefined' && !params.products[0].product_sku) {
          showDialog = false
        }
        if (typeof params.products[1] !== 'undefined' && !params.products[1].product_sku) {
          showDialog = false
        }
        if (typeof params.products[2] !== 'undefined' && !params.products[2].product_sku) {
          showDialog = false
        }
        if (typeof params.products[3] !== 'undefined' && !params.products[3].product_sku) {
          showDialog = false
        }

      }

      return showDialog;
    }

    function gooleOrAppleChange() {
      var googleSelected = $("#airwallex_google").is(":checked");
      var appleSelected = $("#airwallex_apple").is(":checked");
      if (googleSelected || appleSelected) {
        createdButton()
      }
    }

    function createdButton() {
      var paramsNotEmpty = paramsIsEmpty()
      var googleSelected = $("#airwallex_google").is(":checked");
      var appleSelected = $("#airwallex_apple").is(":checked");
      if (countries1 == 'us') {
        if (googlerOrApple == 'google' && googleShow && googleSelected && paramsNotEmpty) {
          params.first_name = $('input[name="firstName"]').val()
          params.second_name = $('input[name="lastName"]').val()
          params.email = $('input[name="email"]').val()
          params.phone_full = $('input[name="phone"]').val()
          params.address = $('input[name="shippingAddress1"]').val()
          params.city = $('input[name="shippingCity"]').val()
          params.code = $('input[name="shippingZip"]').val()
          params.country = $('select[name="shippingCountry"]').val()
          params.province = $('select[name="shippingState"]').val()
          createGoogleButton(params)
        }
        if (googlerOrApple == 'apple' && appleShow && appleSelected && paramsNotEmpty) {
          params.first_name = $('input[name="firstName"]').val()
          params.second_name = $('input[name="lastName"]').val()
          params.email = $('input[name="email"]').val()
          params.phone_full = $('input[name="phone"]').val()
          params.address = $('input[name="shippingAddress1"]').val()
          params.city = $('input[name="shippingCity"]').val()
          params.code = $('input[name="shippingZip"]').val()
          params.country = $('select[name="shippingCountry"]').val()
          params.province = $('select[name="shippingState"]').val()
          createApplePayButton(params)
        }
      }
    }

    function googleOrAppleCheck() {
      var paramsNotEmpty = paramsIsEmpty()
      if (!paramsNotEmpty) {
        var errIsShow = skuIsScelect()
        var emailErr = validateEmail($('input[name="email"]').val())
        errDialogShow(errIsShow, emailErr)
      }
    }

    function paramsIsEmpty() {
      var errIsShow = skuIsScelect()
      var emailErr = validateEmail($('input[name="email"]').val())
      var errorShow = $('input[name="firstName"]').val() && $('input[name="lastName"]').val() && $('input[name="email"]').val() &&
        $('input[name="phone"]').val() &&
        $('input[name="shippingAddress1"]').val() && $('input[name="shippingCity"]').val() && $('input[name="shippingZip"]').val() && $('select[name="shippingCountry"]').val() && $('select[name="shippingState"]').val() && errIsShow && emailErr
      return errorShow
    }

    function createApplePayButton(params) {
      $('#loading').show();
      var payUrl = '/onebuy/order/add/sync?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime();
      params.payment_method = 'airwallex_apple'
      fetch(payUrl, {
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
          var orderId = res.order.id
          if (res.result === 200) {
            const applePayElement = Airwallex.createElement('applePayButton', {
              intent_id: res.payment_intent_id,
              client_secret: res.client_secret,
              amount: {
                value: res.order.base_grand_total,
                currency: res.currency,
              },
              countryCode: 'HK',
              buttonType: 'buy',
              origin: window.location.origin,
            });
            const domApplePay = applePayElement.mount('applePayButton');
            domApplePay.addEventListener('onReady', (event) => {
              $('#loading').hide();
              $('#applePayButton').removeClass('button-opacity')
              $('.appalpay-button').css('background', '#fff')
              /*
                ... Handle event
              */
              // window.alert(event.detail);
              console.log(event.detail, event, 'applePay ===  ready');
            });
            domApplePay.addEventListener('onSuccess', (event) => {
              crmTrack('add_pay')
              /*
                ... Handle event on success
              */
              // window.alert(event.detail);
              console.log(event.detail, event, 'applePay ===  success');
              localStorage.setItem('from', 'checkout');
              alert("@lang('checkout::app.v4.Payment successful')");
              window.location.href = "/onebuy/checkout/v4/success/" + orderId;
            });
            domApplePay.addEventListener('onError', (event) => {
              crmTrack('add_pay')
              /*
                ... Handle event on error
              */
              // window.alert(event.detail);
              console.log(event.detail, event, 'applePay ===  error');
            });
          } else {
            $('#loading').hide();
            alert(res.error)
          }
        })
        .catch(function(err) {
          $('#loading').hide();
          console.log(err, 'err==');
        })
    }

    function createGoogleButton(params) {
      $('#loading').show();
      var payUrl = '/onebuy/order/add/sync?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime();
      // airwallex_apple
      // airwallex_google
      params.payment_method = 'airwallex_google'
      fetch(payUrl, {
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
          var orderId = res.order.id
          if (res.result === 200) {

            const googlePayElement = Airwallex.createElement('googlePayButton', {
              intent_id: res.payment_intent_id,
              client_secret: res.client_secret,
              amount: {
                value: res.order.base_grand_total,
                currency: res.currency,
              },
              countryCode: 'HK',
              origin: window.location.origin,
              merchantInfo: {
                merchantName: 'Airwallex',
              },
            });
            const domGooglePay = googlePayElement.mount('googlePayButton');
            domGooglePay.addEventListener('onReady', (event) => {
              $('#loading').hide();
              $('#googlePayButton').removeClass('button-opacity')
              $('.pay-button').css('background', '#fff')
              /*
                ... Handle event
              */
              // window.alert(event.detail);
              console.log(event.detail, event, 'googlePay ===  ready');
            });
            console.log("onSuccess");
            domGooglePay.addEventListener('onSuccess', (event) => {
              crmTrack('add_pay')
              /*
                ... Handle event on success
              */
              // window.alert(event.detail);
              // console.log(event.detail);
              console.log(event.detail, event, 'googlePay ===  success');

              localStorage.setItem('from', 'checkout');
              alert("@lang('checkout::app.v4.Payment successful')");
              window.location.href = "/onebuy/checkout/v4/success/" + orderId;
            });
            domGooglePay.addEventListener('onError', (event) => {
              crmTrack('add_pay')
              // alert(event.detail.error.message)
              /*
                ... Handle event on error
              */
              // window.alert(event.detail);
              console.log(event.detail);
              console.log(event.detail, event, 'googlePay ===  error');
            });
          } else {
            $('#loading').hide();
            alert(res.error)
          }
        })
        .catch(function(err) {
          $('#loading').hide();
          console.log(err, 'err==');
        })
    }
  </script>
  <script>
    function getParams(methods) {
      params.first_name = $('input[name="firstName"]').val()
      params.second_name = $('input[name="lastName"]').val()
      params.email = $('input[name="email"]').val()
      params.phone_full = $('input[name="phone"]').val()
      params.address = $('input[name="shippingAddress1"]').val()
      params.city = $('input[name="shippingCity"]').val()
      params.country = $('select[name="shippingCountry"]').val()
      params.province = $('select[name="shippingState"]').val()
      params.code = $('input[name="shippingZip"]').val()
      params.payment_method = methods
    }
    $(function() {

      $('#airwallex_google').on("click", function() {
        $('#airwallex-klarna').prop('checked', false);
        $('#payal_standard').prop('checked', false);
        $('#airwallex_google').prop('checked', true);
        $('#payment_method_airwallex').prop('checked', false);
        $('#airwallex_apple').prop('checked', false);
        $("#collapseOne").hide();
        $("#collapseTwo").hide();
        $("#collapseThree").hide();
        $("#collapseFour").show();
        $("#collapseFive").hide();
        $("#complete-btn-id").hide();
        $('.pay-button').show()
        $('#payment_vault2').hide();

      })

      $('#airwallex_apple').on("click", function() {
        $('#airwallex-klarna').prop('checked', false);
        $('#payal_standard').prop('checked', false);
        $('#airwallex_apple').prop('checked', true);
        $('#airwallex_google').prop('checked', false);
        $('#payment_method_airwallex').prop('checked', false);
        $("#collapseOne").hide();
        $("#collapseTwo").hide();
        $("#collapseThree").hide();
        $("#collapseFour").hide();
        $("#collapseFive").show();
        $("#complete-btn-id").hide();
        $('.appalpay-button').show()
        $('#payment_vault2').hide();
      })

      $("#payment_method_airwallex").on("click", function() {
        $('#airwallex-klarna').prop('checked', false);
        $('#payal_standard').prop('checked', false);
        $('#payment_method_airwallex').prop('checked', true);
        $('#airwallex_apple').prop('checked', false);
        $('#airwallex_google').prop('checked', false)
        $("#complete-btn-id").show();
        $("#collapseOne").show();
        $("#collapseTwo").hide();
        $("#collapseThree").hide();
        $("#collapseFour").hide();
        $("#collapseFive").hide();
        $("#airwallex_dropin_collapse").hide();
        $('.appalpay-button').hide()
        $('.pay-button').hide()
        $('#payment_vault2').hide();

        $("#headingOne1").addClass("action");
        $("#headingThree2").removeClass("action");
        $("#headingOne2").removeClass("action");
        $("#airwallex_dropin_2").removeClass("action");
        $("#complete-btn-id").addClass(".complete-btn")
        $("#complete-btn-id").addClass("submit-button");
        $("#complete-btn-id").css({
          width: "100%",
          background: "#1773b0",
          padding: "18px 13px",
          textAlign: 'center'
        });
        $("#complete-btn-id").html("@lang('checkout::app.v2.complete_secure_purchase')");

      });

      $("#airwallex-klarna").on("click", function() {
        $('#airwallex-klarna').prop('checked', true);
        $('#payal_standard').prop('checked', false);
        $('#payment_method_airwallex').prop('checked', false);
        $('#airwallex_apple').prop('checked', false);
        $('#airwallex_google').prop('checked', false)
        $("#complete-btn-id").show();
        $("#collapseOne").hide();
        $("#collapseTwo").hide();
        $("#collapseThree").show();
        $("#collapseFour").hide();
        $("#collapseFive").hide();
        $("#airwallex_dropin_collapse").hide();
        $('.appalpay-button').hide()
        $('.pay-button').hide()
        $('#payment_vault2').hide();
        $("#headingThree2").addClass("action");
        $("#headingOne1").removeClass("action");
        $("#headingOne2").removeClass("action");
        $("#airwallex_dropin_2").removeClass("action");
        $("#complete-btn-id").addClass(".complete-btn")
        $("#complete-btn-id").addClass("submit-button");
        $("#complete-btn-id").css({
          width: "100%",
          background: "#1773b0",
          padding: "18px 13px",
          textAlign: 'center'
        });
        $("#complete-btn-id").html("@lang('checkout::app.v2.complete_secure_purchase')");

      })

      $("#payal_standard").on("click", function() {
        $("#complete-btn-id").show();
        $('#airwallex-klarna').prop('checked', false);
        $('#payal_standard').prop('checked', true);
        $('#payment_method_airwallex').prop('checked', false);
        $('#airwallex_apple').prop('checked', false);
        $('#airwallex_google').prop('checked', false)
        $("#collapseOne").hide();
        $("#collapseTwo").show();
        $("#collapseThree").hide();
        $("#collapseFour").hide();
        $("#collapseFive").hide();
        $("#airwallex_dropin_collapse").hide();
        $('.appalpay-button').hide()
        $('.pay-button').hide()

        $("#headingOne2").addClass("action");
        $("#headingOne1").removeClass("action");
        $("#headingThree2").removeClass("action");
        $("#airwallex_dropin_2").removeClass("action");

        $("#complete-btn-id").removeClass("submit-button");
        $("#complete-btn-id").removeClass(".complete-btn")
        $("#complete-btn-id").css({
          width: "100%",
          background: "none",
          padding: '0'
        });
        $('#payment_vault2').show();
        //payment-button
        $("#complete-btn-id").empty();;
        // var paramsinfo = params
        // console.log(paramsinfo, 'paramsinfo');
        creatPaypalCardButton2();
      });


    });
  </script>
  <script>
    var restricted_countries = 'US,CA'
  </script>
  <!-- <script src="/checkout/v2/js/address-auto-complete.min.js"></script> -->
  <script async type="text/javascript" src="/checkout/v2/js/slick.min.js"></script>
  <script async type="text/javascript" src="/checkout/v2/js/bookmarkscroll.js?v=1"></script>
  <!-- <script type="text/javascript" src="/checkout/v2/js/jquery.sticky.js"></script> -->
  <script>
    function getRandomIntInclusive(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function getOrderMsg() {
      let hour = getRandomIntInclusive(1, 24)
      let number = getRandomIntInclusive(5, 50)
      $('#order-msg-hour').text(hour)
      $('#order-msg-number').text(number)
    }

    function getDateAfterNDays(n) {
      let currentDate = new Date();
      currentDate.setDate(currentDate.getDate() + n);
      return currentDate;
    }

    function formatDate(date) {
      let month = String(date.getMonth() + 1).padStart(2, '0');
      let day = String(date.getDate()).padStart(2, '0');
      return `${month}/${day}`;
    }

    function getshippingMsg() {
      let date1 = formatDate(getDateAfterNDays(5))
      let date2 = formatDate(getDateAfterNDays(8))
      $('#shipping-date1').text(date1)
      $('#shipping-date2').text(date2)
    }

    function getUserView() {
      let viewNum = getRandomIntInclusive(1, 99)
      $('.user-view-num').text(viewNum)
    }
    getshippingMsg();
    getOrderMsg();
    setInterval(function() {
      getUserView()
    }, 5000);

    function heightChange() {
      var width = $(window).innerWidth()
      $('body').css('height', height)
      if (width > 767) {
        var height = $('.checkout-section').height()
        $('.left-sec').css('height', height)
      }
    }
    window.onload = function() {
      var width = $(window).innerWidth()
      var height = $('.checkout-section').height()
      $('body').css('height', height)
      if (width > 767) {
        $('.left-sec').css('height', height)
      }
    }
    $('.fieldToggle').click(function() {
      if ($('#togData').prop('checked') == true) {
        $('.shipaddress').slideUp()
      } else if ($('#togData').prop('checked') == false) {
        $('.shipaddress').slideDown()
      }
    })
    $(document).on('click', '.go-rew', async function(evt) {
      if (evt.which) {
        $('html,body').animate({
            scrollTop: $('#shopify-title-item1').offset().top,
          },
          '2000'
        )
      }
    })

    function closeDialog() {
      $('.dialog-error').hide()
    }
    $(document).ready(function() {
      $(".faq_view").click(function() {
        $("#collapseContent").slideToggle();
      });
    });

    function payAfterSubmit() {
      $('#pay-after-submit-error').hide()
    }
    document.addEventListener('DOMContentLoaded', function() {
      const button1 = document.querySelector('.btn-fixed');
      const button2 = document.getElementById('comn-btn2');
      const pkgopt = document.querySelector('.pkg-opt');
      const swbox = document.querySelector('.Schritt-top-box');

      // IntersectionObserver 观察器
      const observer = new IntersectionObserver((entries) => {
        let isButton2Visible = false;
        let isButton3Visible = false;
        let isButton4Visible = false;
        entries.forEach(entry => {
          if (entry.target === button2) {
            isButton2Visible = entry.isIntersecting;
          }
          if (entry.target === pkgopt) {
            isButton3Visible = entry.isIntersecting;
          }
          if (entry.target === swbox) {
            isButton4Visible = entry.isIntersecting;
          }
        });


        if (isButton4Visible || isButton2Visible || isButton3Visible) {
          button1.style.display = 'none';
        } else if (isMobile) {
          button1.style.display = 'block';
        }
      }, {
        threshold: 0.5
      });

      observer.observe(button2);
      observer.observe(pkgopt);
      observer.observe(swbox);
      updateButton1Visibility();


      function updateButton1Visibility() {
        const rect2 = button2.getBoundingClientRect();
        const rect3 = pkgopt.getBoundingClientRect();
        const rect4 = swbox.getBoundingClientRect();
        if (!rect2.height && !rect3.height && !rect4.height) {

          button1.style.display = 'block';
        } else {

          button1.style.display = 'none';
        }
      }
    });
  </script>
  <script>

  </script>
  <?php if (@$data['env'] == 'demo') { ?>
    <script src="https://checkout-demo.airwallex.com/assets/elements.bundle.min.js"></script>
  <?php } else { ?>
    <script src="https://checkout.airwallex.com/assets/elements.bundle.min.js"></script>
  <?php } ?>
  <script>
    Airwallex.init({
      env: '<?php echo $data['env']; ?>', // Setup which Airwallex env('staging' | 'demo' | 'prod') to integrate with
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
      // console.log(event.detail);
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
        airwallexArr.complete = true
        $("#id_card").val(event.detail.complete);
        $("#cardNumber").removeClass("shipping-info-input-error");
      }
      if (event.detail.complete == false) {
        airwallexArr.complete = false
        airwallexArr.errText = event.detail.error.message
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
  <script>
    function gotoSuccess(data, sub = false) {
      var orderData = {
        paymentID: localStorage.getItem('order_id'),
        orderID: localStorage.getItem('order_id'),
      };
      var outputorder = localStorage.getItem('outputorder') ? JSON.parse(localStorage.getItem('outputorder')) : {};
      console.log(outputorder.first_name, 'first_name==')
      var paypalParams = {
        first_name: sub ? $('input[name="firstName"]').val() : outputorder.first_name ? outputorder.first_name : '',
        second_name: sub ? $('input[name="lastName"]').val() : outputorder.last_name ? outputorder.last_name : '',
        email: sub ? $('input[name="email"]').val() : outputorder.email ? outputorder.email : '',
        phone_full: sub ? $('input[name="phone"]').val() : outputorder.phone ? outputorder.phone : '',
        address: sub ? $('input[name="shippingAddress1"]').val() : outputorder.address1 ? outputorder.address1 : '',
        city: sub ? $('input[name="shippingCity"]').val() : outputorder.city ? outputorder.city : '',
        country: sub ? $('select[name="shippingCountry"]').val() : outputorder.country ? outputorder.country : '',
        province: sub ? $('select[name="shippingState"]').val() : outputorder.state ? outputorder.state : '',
        code: sub ? $('input[name="shippingZip"]').val() : outputorder.postcode ? outputorder.postcode : '',
        payment_method: 'paypal_stand'
      }
      var request_params = {
        client_secret: data.orderID,
        id: localStorage.getItem('order_id'),
        orderData: orderData,
        data: data,
        params: paypalParams
      }
      console.log(request_params, '===request_params===');
      var url = "/onebuy/order/status?_token={{ csrf_token() }}&currency={{ core()->getCurrentCurrencyCode() }}";
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

          localStorage.setItem('from', 'checkout');
          alert("@lang('checkout::app.v4.Payment successful')");
          window.location.href = '/onebuy/checkout/v4/success/' + localStorage.getItem('order_id');
          return true;
        }
        if (res.error == 'INSTRUMENT_DECLINED') {}

      }).catch(function(res) {
        $('#loading').hide();

      });
    }

    function creatPaypalCardButton() {
      var that = this
      var FUNDING_SOURCES = [{
        fundingSource: paypal.FUNDING.PAYPAL
      }]

      FUNDING_SOURCES.forEach(function(item) {
        var error_id = item.error_id
        var render_id = item.render_id
        var paypal_type = item.paypal_type
        var fundingSource = item.fundingSource

        paypal
          .Buttons({
            style: {
              layout: fundingSource === paypal.FUNDING.CARD ?
                'vertical' : 'horizontal',
            },
            fundingSource: fundingSource === paypal.FUNDING.CARD ?
              paypal.FUNDING.CARD : undefined,

            // Call your server to set up the transaction
            createOrder: function(data, actions) {
              console.log(data, 'paypal create order ==========');
              var errIsShow = skuIsScelect()
              if (!errIsShow) {
                $('.dialog-error .dialog-box ul').empty()
                var textList = `<li>@lang('checkout::app.v2.Please select product information!')</li>`
                $('.dialog-error').show()
                $('.dialog-error .dialog-box ul').append(textList)
                $('#loading').hide()
                return;
              }
              crmTrack('add_pay')
              var url =
                '/onebuy/order/addr/after?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' +
                new Date().getTime() +
                '&force=' +
                localStorage.getItem('force')
              $('#' + (error_id || 'paypal-error')).hide()
              params.payment_method = 'paypal'
              params.payment_vault = payment_vault == 1 ? 1 : 0;
              params.payment_paypal_vault = payment_vault == 1 ? 1 : 0;
              params.payment_airwallex_vault = 0;
              localStorage.setItem("payment_vault", params.payment_vault);
              return fetch(url, {
                  body: JSON.stringify(params),
                  method: 'POST',
                  headers: {
                    'content-type': 'application/json',
                  },
                })
                .then(function(res) {
                  return res.json()
                })
                .then(function(res) {
                  //$('#loading').hide();
                  var data = res
                  console.log(data, "paypal create order data")
                  if (data.statusCode === 201 || data.statusCode === 200) {
                    console.log('==2===2==2==2==2==2==2==')
                    var order_info = data.result
                    // return order_info.id
                    //console.log(order_info);
                    //console.log(order_info.purchase_units[0].amount);
                    // document.cookie =
                    //   'voluum_payout=' +
                    //   order_info.purchase_units[0].amount.value +
                    //   order_info.purchase_units[0].amount.currency_code +
                    //   '; path=/'
                    // document.cookie = 'order_id=' + order_info.id + '; path=/'
                    localStorage.setItem('order_id', order_info.id)
                    // localStorage.setItem(
                    //   'order_params',
                    //   JSON.stringify(params)
                    // )
                    if (order_info.status === "COMPLETED") {
                      $('#loading').show();
                      gotoSuccess(data);
                      return
                    }
                    return order_info.id
                  } else {
                    if (data.code == '202') {
                      if (confirm(data.error) == true) {
                        localStorage.setItem('force', 1)
                      }
                    }

                    var pay_error = JSON.parse(data.error)
                    var pay_error_message = pay_error.details

                    if (pay_error_message && pay_error_message.length) {
                      var show_pay_error_message_arr = []

                      for (
                        var pay_error_message_i = 0; pay_error_message_i < pay_error_message.length; pay_error_message_i++
                      ) {
                        show_pay_error_message_arr.push(
                          'Field:' +
                          pay_error_message[pay_error_message_i].field +
                          '<br /> Value' +
                          pay_error_message[pay_error_message_i].value +
                          '. <br />' +
                          pay_error_message[pay_error_message_i]
                          .description +
                          '<br /><br />'
                        )
                      }

                      $('#' + (error_id || 'paypal-error')).html(
                        show_pay_error_message_arr.join('')
                      )
                      $('#' + (error_id || 'paypal-error')).show()
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

              $('#loading').show();
              // actions.order.get().then(function(details) {
              //   console.log(details, 'paypal get details');
              // })


              console.log("on approve ")
              console.log(data);

              //console.log("on app rove");
              if (!data.orderID) {
                throw new Error('orderid is not exisit')
              }
              var orderData = {
                paymentID: data.orderID,
                orderID: data.orderID,
              }
              var request_params = {
                client_secret: data.orderID,
                id: localStorage.getItem('order_id'),
                orderData: orderData,
                data: data,
              }
              var request = ''
              for (var i = 0; i < Object.keys(request_params).length; i++) {
                request +=
                  Object.keys(request_params)[i] +
                  '=' +
                  request_params[Object.keys(request_params)[i]] +
                  '&'
              }
              request = request.substr(0, request.length - 1)
              //console.log(request);

              var url =
                '/onebuy/order/status?_token={{ csrf_token() }}&currency={{ core()->getCurrentCurrencyCode() }}'

              return fetch(url, {
                  method: 'post',
                  body: JSON.stringify(request_params),
                  headers: {
                    'content-type': 'application/json',
                  },
                })
                .then(function(res) {
                  return res.json()
                })
                .then(function(res) {
                  $('#loading').hide()
                  console.log(res.outputorder, 'res.outputorder')
                  localStorage.setItem('outputorder', JSON.stringify(res.outputorder))
                  var errorDetail =
                    Array.isArray(res.details) && res.details[0]

                  if (
                    errorDetail &&
                    errorDetail.issue === 'INSTRUMENT_DECLINED'
                  ) {
                    return actions.restart() // Recoverable state, per:
                    // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                  }

                  if (errorDetail) {
                    var msg =
                      'Sorry, your transaction could not be processed.'
                    if (errorDetail.description)
                      msg += '\n\n' + errorDetail.description
                    if (res.debug_id) msg += ' (' + res.debug_id + ')'
                    return alert(msg) // Show a failure message (try to avoid alerts in production environments)
                  }

                  //console.log(res);

                  if (res.success == true) {

                    localStorage.setItem('from', 'checkout');
                    alert("@lang('checkout::app.v4.Payment successful')");

                    window.location.href =
                      '/onebuy/checkout/v4/success/' +
                      localStorage.getItem('order_id')
                    return true
                    //actions.redirect('/checkout/v1/success/'+localStorage.getItem('order_id'));
                  }
                  if (res.error == 'INSTRUMENT_DECLINED') {
                    $('#' + (error_id || 'paypal-error')).html(
                      "The instrument presented  was either declined by the processor or bank, or it can't be used for this payment.<br><br> Please confirm your account or bank card has sufficient balance, and try again."
                    )
                    $('#' + (error_id || 'paypal-error')).show()
                  }

                }).catch(function(res) {
                  $('#loading').hide();

                })
            },

            onClick() {},

            onError: function(err) {
              console.log('error from the onError callback', err)

              $('#loading').hide()
            },
            onCancel: function(data) {
              $('#loading').hide()
            },
          })
          .render('#payment-button')
        // .render('#' + (render_id || 'paypal-card-submit'));
      })
    }

    function creatPaypalCardButton2() {
      paypal.Buttons({
        style: {
          layout: 'horizontal',
          tagline: false,
          height: 55
        },

        onInit(data, actions) {
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
            if (!params.error) {
              actions.enable();
            }
          });

          $(".first_name").on('change', function() {
            var value = $(".first_name").val();
            if (value.length > 0) first_name_can = 1;
            if (!params.error) {
              actions.enable();
            }
          });

          $(".last_name").on('change', function() {
            var value = $(".last_name").val();
            if (value.length > 0) last_name_can = 1;
            if (!params.error) {
              actions.enable();
            }
          });
          $(".phone_number").on('change', function() {
            var value = $(".phone_number").val();
            if (value.length > 0) phone_number_can = 1;
            if (!params.error) {
              actions.enable();
            }
          });
          $(".address").on('change', function() {
            var value = $(".address").val();
            if (value.length > 0) address_can = 1;
            if (!params.error) {
              actions.enable();
            }
          });
          $(".city").on('change', function() {
            var value = $(".city").val();
            if (value.length > 0) city_can = 1;
            if (!params.error) {
              actions.enable();
            }
          });
          $(".zip_code").on('change', function() {
            var value = $(".zip_code").val();
            if (value.length > 0) zip_code_can = 1;
            if (!params.error) {
              actions.enable();
            }
          });

          $("#state-select").on('change', function() {
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
          // var params = getOrderParams('paypal_stand');
          // console.log("on click " + JSON.parse(params));
          if (params.error) {
            $('#checkout-error').html(params.error.join('<br />'));
            $('#checkout-error').show();
          }

        },

        // Call your server to set up the transaction
        createOrder: function(data, actions) {
          getParams('paypal_stand')
          var errIsShow = skuIsScelect()
          params.payment_vault = payment_vault == 1 ? 1 : 0;
          params.payment_paypal_vault = payment_vault == 1 ? 1 : 0;
          params.payment_airwallex_vault = 0;
          localStorage.setItem("payment_vault", params.payment_vault);
          var emailErr = validateEmail($('input[name="email"]').val())
          console.log(emailErr, 'emailErr');
          var errorShow = $('input[name="firstName"]').val() && $('input[name="lastName"]').val() && $('input[name="email"]').val() &&
            $('input[name="phone"]').val() &&
            $('input[name="shippingAddress1"]').val() && $('input[name="shippingCity"]').val() && $('input[name="shippingZip"]').val() && $('select[name="shippingCountry"]').val() && $('select[name="shippingState"]').val() && errIsShow && emailErr
          if (!errorShow) {
            errDialogShow(errIsShow, emailErr)
            $('#loading').hide()
            return
          }
          $('#loading').show();
          crmTrack('add_pay')
          // var params = getOrderParams('paypal_stand');
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
            //$('#loading').hide();
            var data = res;
            console.log('created=======order', data);
            if (data.statusCode === 201 || data.statusCode === 200) {
              var order_info = data.result;
              // console.log(order_info, 'order=====id');
              //console.log(order_info.purchase_units[0].amount);
              // document.cookie = "voluum_payout=" + order_info.purchase_units[0].amount.value + order_info.purchase_units[0].amount.currency_code + "; path=/";
              // document.cookie = "order_id=" + order_info.id + "; path=/";
              localStorage.setItem("order_id", order_info.id);
              // localStorage.setItem("order_params", JSON.stringify(params));
              if (order_info.status === "COMPLETED") {

                $('#loading').show();

                gotoSuccess(data, true);
                return
              }
              return order_info.id;
            } else {
              if (data.code == '202') {
                if (confirm(data.error) == true) {
                  localStorage.setItem("force", 1);
                }
              }

              // var pay_error = JSON.parse(data.error);
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
          $('#loading').show();
          var orderData = {
            paymentID: data.orderID,
            orderID: data.orderID,
          };
          var paypalParams = {
            first_name: $('input[name="firstName"]').val(),
            second_name: $('input[name="lastName"]').val(),
            email: $('input[name="email"]').val(),
            phone_full: $('input[name="phone"]').val(),
            address: $('input[name="shippingAddress1"]').val(),
            city: $('input[name="shippingCity"]').val(),
            country: $('select[name="shippingCountry"]').val(),
            province: $('select[name="shippingState"]').val(),
            code: $('input[name="shippingZip"]').val(),
            payment_method: 'paypal_stand'
          }
          var request_params = {
            client_secret: data.orderID,
            id: localStorage.getItem('order_id'),
            orderData: orderData,
            data: data,
            params: paypalParams
          }
          console.log(request_params, '===request_params===');
          var url = "/onebuy/order/status?_token={{ csrf_token() }}&currency={{ core()->getCurrentCurrencyCode() }}";
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
            localStorage.setItem('outputorder', JSON.stringify(res.outputorder))
            if (res.success == true) {
              //Goto('/checkout/v1/success/'+localStorage.getItem('order_id'));

              localStorage.setItem('from', 'checkout');
              alert("@lang('checkout::app.v4.Payment successful')");
              window.location.href = '/onebuy/checkout/v4/success/' + localStorage.getItem('order_id');
              return true;
              //actions.redirect('/checkout/v1/success/'+localStorage.getItem('order_id'));
            }
            if (res.error == 'INSTRUMENT_DECLINED') {

              $('#checkout-error').html("The instrument presented  was either declined by the processor or bank, or it can't be used for this payment.<br><br> Please confirm your account or bank card has sufficient balance, and try again.");
              $('#checkout-error').show();
            }

          }).catch(function(res) {
            $('#loading').hide();
          });
        }
      }).render('#complete-btn-id');
    }

    function checkout() {
      sendInitiateCheckoutEvent();
      var pay_type = 'worldpay';
      // var params = getOrderParams(pay_type);
      if (params.error && params.error.length) {
        $('#checkout-error').html(params.error.join('<br />'));
        $('#checkout-error').show();
        return;
      }

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
      }
    }

    function createOrder(token, token_field = "checkout_frames_token", pay_type = "checkout", card = {}) {
      // var params = getOrderParams(pay_type);
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
      params.payment_paypal_vault = 0;
      params.payment_airwallex_vault = 1;
      console.log(params, '===params====')
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
          crmTrack('add_pay')
          var data = res;
          console.log(data);
          //return false;
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
                  console.log(res, 'airwallex res====');
                  console.log(res);

                  //console.log(res.payment.next_action.url);

                  Goto(res.payment.next_action.url);

                });

              return false;


            }

            document.cookie = "voluum_payout=" + order_info.grand_total + order_info.order_currency_code + "; path=/";
            document.cookie = "order_id=" + order_info.id + "; path=/";
            localStorage.setItem("order_id", order_info.id);
            localStorage.setItem("cus_id", data.customer.id);
            // localStorage.setItem("order_params", JSON.stringify(params));


            if (window.is_airwallex) {
              console.log(data, 'data===window.is_airwallex');
              document.querySelector(".submit-button").scrollIntoView({
                behavior: "smooth"
              })

              //Airwallex.confirmPaymentIntent({
              Airwallex.createPaymentConsent({
                element: cardNumber,
                intent_id: data.payment_intent_id,
                customer_id: data.customer.id,
                //client_secret: data.customer_client_secret.client_secret,
                client_secret: data.client_secret,
                next_triggered_by: 'customer',
                currency: data.currency,
                requires_cvc: true,
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

              }).then((response) => {

                $('#loading').hide();

                console.log('createPaymentConsent airwallex===111=' + JSON.stringify(response));

                //window.alert(" then " + JSON.stringify(response));

                localStorage.setItem("airwallex_response", JSON.stringify(response));
                localStorage.setItem("payment_consent_id", response.payment_consent_id);
                localStorage.setItem('payment_vault', 0);

                localStorage.setItem('from', 'checkout');
                alert("@lang('checkout::app.v4.Payment successful')");

                window.location.href = "/onebuy/checkout/v4/success/" + data.order.id;
                return false;

              }).catch((response) => {
                $('#loading').hide();
                alert(response.message)

                return false;

              });;


              console.log('createPaymentConsent airwallex====' + json.stringify(response));

            }
          } else {
            console.log('else====');
            $('#loading').hide();
            var pay_error = data.error;
            alert(res.error)
            if (pay_error && pay_error.length) {
              $('#checkout-error').html(pay_error.join('<br />') + '<br /><br />');
              $('#checkout-error').show();
            }
          }
        })
        .catch(function(err) {
          $('#loading').hide();
        })
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

    window.onpageshow = function() {
      clearTimeout(window.turn_inter);
      clearTimeout(window.no_href_turn_inter);
      clearTimeout(window.a_turn_inter);
      clearTimeout(window.no_top_turn_inter);
    }
  </script>
</body>

</html>