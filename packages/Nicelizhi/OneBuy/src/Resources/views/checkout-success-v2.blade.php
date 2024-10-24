<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://shop.hatmeo.com/css/recommended.css">
  <script src="/template-common/js/recommended.js?v=<?php echo time(); ?>"></script>
  <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/jquery.colorbox.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/jquery-colorbox@1.6.4/example1/colorbox.min.css" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', '<?php echo $gtm;?>');
  </script>
  <!-- End Google Tag Manager -->

  <style>
    :root {
      --text-family: Poppins, sans-serif;
      --text-color: #444444;
      --title-color: #000000
    }

    html {
      font-size: 12px;
      background: #F4F4F4;
      margin: 0;
      font-family: Poppins, -apple-system-font, Helvetica Neue, Helvetica, sans-serif, 'Microsoft Yahei', arial;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      color: var(--text-color)
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    p {
      margin: 0;
      padding: 0;
    }

    body {
      background: #F4F4F4 !important;
      overflow-x: hidden;
      color: var(--text-color);
      margin: 0;
      padding: 0;
      font-family: var(--text-family);
    }

    li {
      outline: none;
      border: none;
      list-style: none;
    }

    .ml5 {
      margin-left: 5px;
    }

    .ml10 {
      margin-left: 10px;
    }

    .mt10 {
      margin-top: 10px;
    }

    .mt20 {
      margin-top: 20px;
    }

    .flex-between {
      display: flex;
      flex-flow: row nowrap;
      justify-content: space-between;
      align-items: center;
    }

    .w100 {
      width: 100%;
    }

    .relative {
      position: relative;
    }

    .absolute {
      position: absolute;
    }

    .text-center {
      text-align: center;
    }

    .text-right {
      text-align: right;
    }

    .text-left {
      text-align: left;
    }

    .flex-between {
      display: flex;
      flex-flow: row nowrap;
      justify-content: space-between;
      align-items: center;
    }

    .box {
      padding: 15px;
      background-color: #fff;
      border-radius: 10px;
    }

    @media (min-width: 768px) {
      .grid-row {
        grid-template-columns: repeat(1, 10fr 6fr);
      }

      .order-details-content {
        grid-template-columns: repeat(2, 1fr);

      }

      .main__footer-pc {
        position: fixed;
        bottom: 0;
        width: 100%;
      }

      .header-banner {
        background: url('/checkout/onebuy/success/{{ $default_country }}_pc.jpg') no-repeat center center/100% 100px;
        height: 100px;
      }

      .recommend-item-box {
        grid-template-columns: repeat(3, 1fr);
      }

      .order-summary {
        position: sticky;
        top: 0;
      }
    }

    /* 移动端两列布局 */
    @media (max-width: 767px) {
      .grid-row {
        grid-template-columns: repeat(1, 1fr);
      }

      .order-details-content {
        grid-template-columns: repeat(1, 1fr);
      }

      .header-banner {
        /* width: 100%; */
        background: url('/checkout/onebuy/success/{{ $default_country }}_mobile.jpg') no-repeat center center/100%;
        height: 80px;
      }

      .recommend-item-box {
        grid-template-columns: repeat(1, 1fr);
      }
    }

    .grid-row {
      display: grid;
      gap: 10px;
    }

    /* header start*/
    header {
      padding-top: 20px;
    }

    .header-left {
      display: flex;
      flex-flow: row nowrap;
      justify-content: space-between;
      align-items: start;
    }

    .header-left-text-title {
      font-size: 16px;
      font-weight: bold;
      color: var(--title-color);
    }

    .header-right {
      padding: 10px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 4px;
      color: #1773B0;
      font-weight: bold;
    }

    /* header end*/
    /* login strat*/
    .login-container {
      display: flex;
      flex-flow: row nowrap;
      justify-content: space-between;
      align-items: start;
    }

    .login-left {
      color: var(--title-color);
      font-size: 14px;
      font-weight: bold;
    }

    .login-right {
      background-color: #1773B0;
      color: #fff;
      padding: 8px;
      border-radius: 4px;
    }

    /* login end*/

    /* second content start */
    .second-content {
      display: flex;
    }

    .dashed-line {
      border-left: 1px dashed #ccc;
      margin: 2px 0 0 7px;
      height: 70%;
      width: 1px;
    }

    .second-content-text {
      margin-left: 10px;
    }

    .second-content-text>p:first-child {
      color: var(--title-color);
      font-size: 14px;
      font-weight: bold;
    }

    .second-content-text>p:last-child {
      margin-top: 10px;
    }

    /* second content end */

    /* order details start */
    .order-details-title {
      color: var(--title-color);
      font-size: 14px;
      font-weight: bold;
    }

    .order-details-content {
      width: 100%;
      display: grid;
      gap: 20px;
      margin-top: 10px;
    }

    .order-details-subtext {
      display: flex;
    }

    .order-details-item {
      background: #f4f4f4;
      padding: 5px;
      border-radius: 5px;
    }

    .order-details-subtext {
      padding: 2px;
    }

    /* order details end */

    /* Order Summary start */
    .order-summary-title {
      color: var(--title-color);
      font-size: 14px;
      font-weight: bold;
    }

    .sku-item-left {
      display: flex;
      align-items: center;
    }

    .sku-item {
      margin-top: 10px;
    }

    .sku-img img {
      width: 80px;

    }

    .sku-img>div {
      top: -8px;
      right: -8px;
      background-color: #444444;
      color: #fff;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      text-align: center;
      line-height: 20px;
    }

    .sku-content {}

    .order-summary-total {
      font-size: 14px;
      font-weight: bold;
      color: var(--title-color);
    }

    /* Order Summary end */

    .solid-line {
      border-top: 1px solid #ccc;
      width: 100%;
      margin: 20px 0;
    }

    .main__footer {
      background-color: #000;
      color: #fff;
      text-align: center;
      width: 100%;
    }

    .main__footer i {
      width: 40px;
      height: 40px;
      display: inline-block;
      background-color: #fff;
      border-radius: 50%;
      line-height: 40px;
      margin: 0 5px;
      color: #4267b2;
    }

    .main__footer .copyright-text {
      margin-top: 15px;
    }

    /* recommend start */
    .recommend-container {
      background-color: #fff;
      border-radius: 10px;
      padding: 15px;
    }

    .recommend-title {
      color: var(--title-color);
      font-size: 14px;
      font-weight: bold;
    }

    .recommend-item {
      text-align: center;
      font-size: 14px;
    }

    .recommend-item-box {
      display: grid;
      gap: 20px;
      margin-top: 10px;
      padding: 10px;
    }

    .recommend-img {
      width: 100%;
    }

    .recommend-price>span:first-child {
      text-decoration: line-through;
    }

    /* recommend end */
  </style>
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
  <title>
    @lang('checkout::app.v1.success.Thank you')
  </title>
  <script>
    function addVoluumImg(data) {}

    function postVoluumConversion(data) {
      if (getQueryString('s2')) {
        var params = {
          cid: getQueryString('s2'),
          payout: data.info.payout || (data.info.total + data.info.currency),
          txid: data.info._id.$oid
        };

        fetch('/common/send_conversion/voluum', {
          body: JSON.stringify(params),
          method: 'POST',
          headers: {
            'content-type': 'application/json'
          },
        })
      } else {
        addVoluumImg(data);
      }
    }

    function sendPurchaseEvent(data) {}

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

    function getQueryString(name) {
      var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
      var r = window.location.search.substr(1).match(reg);

      if (r != null) {
        return unescape(r[2]);
      }
      return null;
    }
  </script>

  <?php
  $payment = $order->payment->created_at;

  // var_dump($payment);
  // var_dump($order_pre);
  // exit;
  $products = $order->items;
  $line_items = [];
  foreach ($products as $key => $product) {
    $sku = $product['additional'];

    $skuInfo = explode('-', $sku['product_sku']);
    // var_dump($products);

    $line_item = [];
    $line_item['item_id'] = $skuInfo[0];
    $line_item['item_name'] = $product['name'];
    $line_item['price'] = number_format($product['base_price'], 2);
    $line_item['quantity'] = $product['qty_ordered'];
    $line_item['item_variant'] = @$sku['attribute_name'];
    $line_item['item_img'] = $product['additional']['img'];
    $line_item['base_total'] = number_format($product['base_total'], 2);
    // 小计base_sub_total
    // 折扣base_discount_amount
    // 运输base_shipping_amount
    //var_dump($product);

    array_push($line_items, $line_item);
  }
  // var_dump($line_items);
  // exit;
  ?>
  <script>
    function purchase(value) {
      console.log("purchase " + (value * 1).toFixed(2));
      fbq('track', 'Purchase', {
        currency: "EUR",
        value: (value * 1).toFixed(2)
      });
      console.log("purchase " + (value * 1).toFixed(2));
      <?php if (!empty($ob_adv_id)) { ?>
        obApi('track', 'Purchase');
      <?php } ?>

      <?php if (!empty($quora_adv_id)) { ?>
        qp('track', 'Purchase', {
          value: (value * 1).toFixed(2)
        });
      <?php } ?>

      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
      
        eventType: 'conversion',
        conversionClass: 'order',
        conversionSubClass: 'purchase',
        conversionId: '<?php echo $order->id; ?>',
        offerIds: <?php echo json_encode($line_items); ?>,
        conversionValue: (value * 1).toFixed(2),
        conversionCurrency: '<?php echo $order->channel_currency_code; ?>',


      });



      gtag('event', 'purchase', {
        transaction_id: '<?php echo $order->id; ?>',
        value: (value * 1).toFixed(2),
        currency: "<?php echo $order->channel_currency_code; ?>",
        items: <?php echo json_encode($line_items); ?>
      });

      // params = {
      //     "channel_id": "<?php echo $crm_channel; ?>",
      //     "token": "<?php echo $refer; ?>",
      //     "type": "purchase",
      //     "order_id": '<?php echo $order->id; ?>',
      //     "amount": (value * 1).toFixed(2)
      // };
      // fetch('https://crm.heomai.com/api/user/action',{
      //         body: JSON.stringify(params),
      //         method: 'POST',
      //         headers: {
      //             'content-type': 'application/json'
      //         },
      // })


      if (typeof gtag == 'function') {
        if (window.localStorage) {
          var ga_post_order_template_commom_ids_str = localStorage.getItem("ga_post_order_template_commom_ids");
          var ga_post_order_template_commom_ids = [];
          if (ga_post_order_template_commom_ids_str) {
            ga_post_order_template_commom_ids = JSON.parse(ga_post_order_template_commom_ids_str);
          }
          if (ga_post_order_template_commom_ids.indexOf(getQueryString('id')) > -1) {
            return;
          }

          ga_post_order_template_commom_ids.push(getQueryString('id'));
          localStorage.setItem("ga_post_order_template_commom_ids", JSON.stringify(ga_post_order_template_commom_ids));
        }
        if (value) {
          gtag('event', 'sur_purchase', {
            'transaction_id': getQueryString('id'),
            'event_label': 'Sur Purchase',
            'event_category': 'ecommerce',
            'value': (value * 1).toFixed(2),
            'currency': 'USD',
          });
        } else {
          gtag('event', 'sur_purchase', {
            'transaction_id': getQueryString('id'),
            'event_label': 'Sur Purchase',
            'event_category': 'ecommerce'
          });
        }
      } else {
        setTimeout(function() {
          //purchase();
        }, 10)
      }
    }

    //fbq('track', 'Purchase');
  </script>
  <link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout1/css/font-awesome.min.css">
</head>

<body>
  <div class="container">
    <!-- header banner -->
    <div class="header-banner">
    </div>
    <!-- herder start-->
    <header class="flex-between">
      <div class="header-left">
        <div class="herder-back" onclick="goBack()">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
          </svg>
        </div>
        <div class="header-left-text ml5">
          <p class="header-left-text-title">@lang('onebuy::app.v2.success.Order')</p>
          <p class="header-left-time"><span></span> @lang('onebuy::app.v2.success.confirm')</p>
        </div>
      </div>
      <div class="header-right" onclick="goBack()">@lang('onebuy::app.v2.success.Buy Again')</div>
    </header>
    <!-- header end-->
    <div class="w100 mt20">
      <div class="grid-row">
        <div class="grid-col">
          <!-- login start-->
          <div class="login-container box" style="display: none;">
            <div class="login-left">@lang('onebuy::app.v2.success.Log in to view all order details')</div>
            <div class="login-right">@lang('onebuy::app.v2.success.Login')</div>
          </div>
          <!-- login end-->

          <!-- second content start-->
          <div class="second-content box mt20">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
              </svg>
              <div class="dashed-line">

              </div>

            </div>
            <div class="second-content-text">
              <p>@lang('onebuy::app.v2.success.comfirmed')</p>
              <p>@lang('onebuy::app.v2.success.Updated')</p>
              <p>@lang('onebuy::app.v2.success.We have received your order')</p>
            </div>

          </div>
          <!-- second content end-->

          <!-- order details start -->
          <div class="box mt20">
            <div class="order-details-title">@lang('onebuy::app.v2.success.Order details')</div>
            <div class="order-details-content">
              <div class="order-details-left">
                <div class="order-details-item">
                  <div class="order-details-subtitle">@lang('onebuy::app.v2.success.contact information')</div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.firstname'):</p>
                    <p class="order-details-firstname ml10"></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.lastname'):</p>
                    <p class="order-details-lastname ml10"></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.phone'):</p>
                    <p class="order-details-phone ml10"></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.email'):</p>
                    <p class="order-details-email ml10"></p>
                  </div>
                </div>

                <div class="order-details-item mt10">
                  <div class="order-details-subtitle">@lang('onebuy::app.v2.success.mailing address')</div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.Street address and number'):</p>
                    <p class="order-details-address ml10"></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.City'):</p>
                    <p class="order-details-city ml10"></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.Country'):</p>
                    <p class="order-details-country ml10"></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.State'):</p>
                    <p class="order-details-state ml10"></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.Postal Code'):</p>
                    <p class="order-details-code ml10"></p>
                  </div>
                </div>

                <!-- <div class="order-details-item mt10">
                  <div class="order-details-subtitle">邮寄方式</div>

                </div> -->

              </div>
              <div class="order-details-right">
                <div class="order-details-item">
                  <div class="order-details-subtitle">@lang('onebuy::app.v2.success.billing Address')</div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.Street address and number'):</p>
                    <p><?php echo $order->billing_address->address1; ?></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.City'):</p>
                    <p><?php echo $order->billing_address->city; ?></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.Country'):</p>
                    <p><?php echo $order->billing_address->country; ?></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.State'):</p>
                    <p><?php echo $order->billing_address->state; ?></p>
                  </div>
                  <div class="order-details-subtext flex-between ml10">
                    <p>@lang('onebuy::app.v2.success.Postal Code'):</p>
                    <p><?php echo $order->billing_address->postcode; ?></p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- order details end -->
        </div>

        <div class="grid-col">
          <!-- Order Summary start -->
          <div class="box order-summary">
            <div class="order-summary-title">@lang('onebuy::app.v2.success.Order Summary')</div>
            <div class="sku-item flex-between">

              <?php foreach ($line_items as $key => $item) {
              ?>
                <div class="sku-item-left">

                  <div class="sku-img relative">
                    <img src="<?php echo $item['item_img']; ?>" alt="">
                    <div class="absolute"><?php echo $item['quantity']; ?></div>
                  </div>

                  <div class="sku-content ml10">
                    <p class="sku-subtitle"><?php echo $item['item_name']; ?></p>
                    <p><?php echo $item['item_variant']; ?></p>
                    <p>({{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}<?php echo $item['price']; ?>@lang('onebuy::app.v2.success./pcs'))</p>
                  </div>
                </div>
                <div class="sku-total">{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}<?php echo $item['base_total']; ?></div>
              <?php } ?>
            </div>

            <div class="order-summary-content mt10">
              <div class="order-summary-content-item flex-between">
                <span>@lang('onebuy::app.v2.success.Subtotal')</span>
                <span>{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}<?php echo number_format($order->base_sub_total, 2); ?></span>
              </div>
              <div class="order-summary-content-item flex-between">
                <span>@lang('onebuy::app.v2.success.Discount')</span>
                <span>{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}<?php echo number_format($order->base_discount_amount, 2); ?></span>
              </div>
              <div class="order-summary-content-item flex-between">
                <span>@lang('onebuy::app.v2.success.Shipping')</span>
                <span>{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}<?php echo number_format($order->base_shipping_amount, 2); ?></span>
              </div>
            </div>

            <div class="order-summary-total flex-between mt20">
              <span>@lang('onebuy::app.v2.success.Total')</span>
              <span>{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}<?php echo number_format($order->grand_total, 2); ?></span>
            </div>
          </div>
          <!-- Order Summary end -->
        </div>
      </div>

    </div>
    <div class="recommend-container w100 mt20">
      <div class="recommend-title"></div>
      <div class="recommend-item-box">
      </div>
    </div>

    <div class="solid-line"></div>
  </div>


  <footer class="main__footer" role="contentinfo">
    @include('onebuy::footer-container-'.strtolower($default_country))
  </footer>
  <?php if($default_country=='US') {?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16498281514"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-16498281514'); </script>
  <?php } ?>
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
    $(function() {
   
    })

    function getRecommended(path) {
      var checkout_path = ''
      var path_f = path.split('/onebuy/')[1]
      if (path_f.indexOf('?') != -1) {
        checkout_path = path_f.substring(0, path_f.indexOf('?'))
      } else {
        checkout_path = path_f
      }
      if (checkout_path) {
        fetch('/onebuy/recommended/query?checkout_path=' + decodeURI(checkout_path) + '', {
            method: 'GET',
            headers: {
              'content-type': 'application/json',
            },
          })
          .then(function(data) {
            return data.json()
          })
          .then(function(data) {
            console.log(data, 'getRecommendedData==222')
            const recommendData = data.data.recommended_info
            console.log(recommendData, 'recommendData');
            $('.recommend-title').text(data.data.recommended_info_title)
            let recommendDom = ''
            let url = ''
            for (const item of recommendData) {
              let recommend_source_page = 'utm_source=checkout-recommendations'
              if (item.url.indexOf('?') != -1) {
                if (item.url.lastIndexOf('?') == item.url.length - 1) {
                  url = item.url + recommend_source_page
                } else {
                  url = item.url + '&' + recommend_source_page
                }
              } else {
                url = item.url + '?' + recommend_source_page
              }

              console.log(item, 'key');
              recommendDom += `<div class="recommend-item">
                <img class="recommend-img" src=" ` + item.image_url + `" alt="">
                <p class="recommend-subtitle mt10">
                  <a href="` + url + `" target="_blank" rel="noopener noreferrer">` + item.title + `</a>
                </p>
                <div class="recommend-price mt10">
                  <span>{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}` + item.origin_price + `</span>
                  <span class="ml5">{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}` + item.discount_price + `</span>
                </div>
              </div>`
            }
            $('.recommend-item-box').append(recommendDom)
          }).catch(function(err) {
            console.log(err, 'getRecommended====err');
          })
      }
    }

    function initDomData() {
      let orderPre = '<?php echo $order_pre; ?>',
        payment = '<?php echo $payment; ?>',
        titleId = '<?php echo $order->id; ?>',
        headerTitle = orderPre + '#' + titleId,
        updatedTime = '<?php echo $order->updated_at; ?>',
        shippingAddress = JSON.parse('<?php echo $order->shipping_address; ?>')
      console.log(shippingAddress, 'shippingAddress');
      $('.header-left-time span').append(payment.split(' ')[0])
      $('.header-left-text-title').append(headerTitle)
      $('.second-content-text > :eq(1)').append(updatedTime.split(' ')[0])
      $('.order-details-firstname').text(shippingAddress.first_name)
      $('.order-details-lastname').text(shippingAddress.last_name)
      $('.order-details-phone').text(shippingAddress.phone)
      $('.order-details-email').text(shippingAddress.email)
      $('.order-details-address').text(shippingAddress.address1)
      $('.order-details-city').text(shippingAddress.city)
      $('.order-details-country').text(shippingAddress.country)
      $('.order-details-state').text(shippingAddress.state)
      $('.order-details-code').text(shippingAddress.postcode)
    }
    initDomData();

    if (getCookie('voluum_payout') && getCookie('order_id') == getQueryString('id')) {
      var order_params = {};

      order_params['info'] = JSON.parse(localStorage.getItem('order_params'));
      order_params['info']['payout'] = getCookie('voluum_payout');
      order_params['info']['_id'] = {};
      order_params['info']['_id']['$oid'] = getCookie('order_id');

      console.log('cookie');

      console.log(order_params);
      // sendPurchaseEvent(order_params);
    }

    var client_secret = getQueryString('client_secret');
    var cko_session_id = getQueryString('cko-session-id');
    var pacypay_response_code = getQueryString('responseCode');
    var awx_return_result = getQueryString('awx_return_result');
    if (client_secret || cko_session_id) {
      var paypal_request_params = {
        id: getQueryString('id'),
      }
      if (client_secret) {
        paypal_request_params['client_secret'] = client_secret;
      }
      if (cko_session_id) {
        paypal_request_params['cko_session_id'] = cko_session_id;
      }
      var paypal_request = '';
      for (var i = 0; i < Object.keys(paypal_request_params).length; i++) {
        paypal_request += Object.keys(paypal_request_params)[i] + '=' + paypal_request_params[Object.keys(paypal_request_params)[i]] + '&';
      }
      paypal_request = paypal_request.substr(0, paypal_request.length - 1);
      console.log(paypal_request);

      var paypal_status_url = '/pay/order/status?' + paypal_request
      fetch(paypal_status_url, {
          method: 'get',
          headers: {
            'content-type': 'application/json'
          },
        })
        .then(function(res) {
          return res.json()
        })
        .then(function(res) {
          postPayStatusParams(JSON.stringify(res), getQueryString('id'));
          if (res.result === 200) {
            if (res.info.pay_status) {
              getOrderData();
            } else {
              showPayFailed(res.info.message);
            }
          }
        })
    } else {
      if (pacypay_response_code && pacypay_response_code != '88') {
        showPayFailed(getQueryString('message'));
      } else if (awx_return_result && awx_return_result != 'success') {
        showPayFailed();
      } else {
        getOrderData();
      }
    }

    function getOrderData() {

      var params = {
        id: getQueryString('id'),
      }
      var url = '/onebuy/order/query?id=' + getQueryString('id');
      fetch(url, {
          method: 'GET',
        })
        .then(function(data) {
          return data.json()
        }).then(function(data) {
          updataDom(data)
        })
    }

    function getFormatPrice(price, price_template) {
      console.log("get formate price fun");
      console.log(price);
      console.log(price_template)
      var price_prefix = '';
      if (price * 1 < 0) {
        price = Math.abs(price);
        price_prefix = '-';
      }

      return price_prefix + price_template.replace('price', (price * 1).toFixed(2));
    }

    function updataDom(input) {

      order_param = JSON.parse(localStorage.getItem('order_params'));

      order_param = <?php echo json_encode($order); ?>

      <?php
      $shipping_address = $order->shipping_address;
      //var_dump($shipping_address);
      ?>

      console.log(order_param);

      data = input.data;
      console.log("pushare " + order_param.grand_total);
      console.log("pushare " + order_param.grand_total);
      purchase(order_param.grand_total);
      //purchase(null);
      console.log(data)
      if (!getCookie('voluum_payout') || getCookie('order_id') != getQueryString('id')) {
        console.log('data');
        //sendPurchaseEvent(data);
      }
      // setProductHtml(order_param.products, order_param.produt_amount_base);
      setProductHtml();
      showPaySuccess();
      console.log("getRecommendedData");
      console.log(order_param.items[0].sku);
      getRecommended("/onebuy/v4/" + order_param.items[0].sku);
    }

    function setProductHtml() {
      var product_html = "";
      var product_attributes_html = "";
      <?php
      $products = $order->items;
      foreach ($products as $key => $product) { ?>
        product_attributes_html += "<p>";
        <?php
        //var_dump($product->additional['attributes']);exit;
        if (isset($product->additional['attributes'])) {
          foreach ($product->additional['attributes'] as $attribute) {
        ?>
            product_attributes_html += "<span><?php echo $attribute['attribute_name']; ?>: <?php echo $attribute['option_label']; ?></span>";
        <?php }
        } ?>
        product_attributes_html += "</p>";
        product_html += '<p class="order-date"><strong><?php echo addslashes($product->name); ?> </strong> ×<span class="order-count">(<?php echo $product->qty_ordered; ?>)</span> ' + product_attributes_html + '</p> ';
      <?php } ?>

      // document.querySelector('.product-content').innerHTML = product_html;

    }

    function setProductHtmlNew(products, produt_amount_base = 1) {
      var product_html = ''

      for (var i = 0; i < products.length; i++) {
        var product = products[i];
        product_html += '<p class="order-date"><img src="' + product.img + '" height="50" style="vertical-align: middle;"> ' + product.description + ' ×<span class="order-count">' + (product.amount) + '</span></p> '
      }

      // document.querySelector('.product-content').innerHTML = product_html;
    }

    function showPaySuccess() {
      // document.querySelector('.failed_block').style.display = "none";
      // document.querySelector('.success_block').style.display = "block";
      // document.querySelector('.loading_block').style.display = "none";
    }

    function showPayFailed(message) {
      if (message) {
        // document.querySelector('.failed_reason').innerText = message;
      }
      // document.querySelector('.failed_block').style.display = "block";
      // document.querySelector('.success_block').style.display = "none";
      // document.querySelector('.loading_block').style.display = "none";
    }

    function postPayStatusParams(log, order_id) {
      let url = '/order/pay/status/error?order_id=' + order_id + '&logo=' + log;

      window.navigator.sendBeacon ? sendBeacon(url) : sendImage(url);
    }

    function sendBeacon(url) {
      window.navigator.sendBeacon(url);
    }

    function sendImage(url) {
      this.img = document.createElement('img');
      this.img.src = url;
      this.img.style.display = 'none';
      this.img.width = '1';
      this.img.height = '1';
      document.getElementsByTagName('body')[0].appendChild(this.img);
    }

    function getQueryString(name) {
      var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
      var r = window.location.search.substr(1).match(reg);

      if (r != null) {
        return unescape(r[2]);
      }
      return null;
    }

    function goBack() {
      if (window.history.length > 1) {
        window.history.back();
      }
    }
  </script>
</body>

</html>