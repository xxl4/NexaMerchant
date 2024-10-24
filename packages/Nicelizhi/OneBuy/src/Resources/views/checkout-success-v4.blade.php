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

      /* .recommend-item-box {
        grid-template-columns: repeat(3, 1fr);
      } */

      .order-summary {
        position: sticky;
        top: 0;
        height: calc(100% - 20px);
        margin-top: 20px;
      }
    }

    @media (min-width: 1200px) {
      .container {
        max-width: 960px;
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

      /* .recommend-item-box {
        grid-template-columns: repeat(1, 1fr);
      } */
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

    .btn-home {
      background-color: #007bff;
      color: #fff;
      font-weight: bold;
      padding: 15px 30px;
      border-radius: 5px;
      margin-right: 20px;
    }

    .btn-buy-again {
      width: 90%;
      background-color: #ff0707;
      color: #fff;
      font-weight: bold;
      padding: 15px 30px;
      border-radius: 5px;
      margin-left: 20px;
      font-size: 18px;
    }

    .btn:hover {
      color: #fff !important;
      background-color: #ef4e4e !important;
    }

    .btn:hover {
      opacity: 0.9;
    }

    .button-container {
      text-align: center;
      margin-top: 50px;
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

    .tooltip1 {
      position: absolute;
      background: #fff;
      border: 1px solid #ccc;
      padding: 8px;
      border-radius: 4px;
      z-index: 1000;
      margin-top: 10px;
      margin-right: 10px;
      left: 30px;
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

    /* .recommend-item-box {
      display: grid;
      gap: 20px;
      margin-top: 10px;
      padding: 10px;
    } */

    .recommend-img {
      width: 100%;
    }

    .recommend-price>span:first-child {
      text-decoration: line-through;
    }

    .drawer {
      position: fixed;
      top: 0;
      right: -500px;
      /* Start off-screen */
      width: 500px;
      height: 100%;
      background-color: #f8f9fa;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      transition: right 0.3s ease;
      /* Transition effect */
      z-index: 1050;
      /* Make sure it's on top of other content */
    }

    @media(max-width:768px) {
      .drawer {
        right: -300px;
        width: 300px;
      }
    }

    .drawer-content {
      padding: 20px;
    }

    .drawer.open {
      right: 0;
      /* Slide in */
    }

    /* recommend end */
    .thankYou {
      font-size: 28px;
      font-weight: bold;
      text-align: center;
      margin-top: 15px;
    }

    /* loading */
    #loading {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .info-icon {
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background-color: #007bff;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      cursor: pointer;
    }

    .spinner {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 4px solid #f3f3f3;
      border-radius: 50%;
      border-top: 4px solid #3498db;
      width: 40px;
      height: 40px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
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
    $line_item['item_img'] = @$product['additional']['img'];
    $line_item['base_total'] = number_format($product['base_total'], 2);


    array_push($line_items, $line_item);
  }
  // var_dump($line_items);
  // exit;
  ?>
  <script>
    function purchase(value) {
      fbq('track', 'Purchase', {
        currency: "EUR",
        value: (value * 1).toFixed(2)
      });
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
  <?php if ($app_env == 'demo') { ?>
    <script src="https://checkout-demo.airwallex.com/assets/elements.bundle.min.js"></script>
  <?php } else { ?>
    <script src="https://checkout.airwallex.com/assets/elements.bundle.min.js"></script>
  <?php } ?>
</head>

<body>
  <script>
    // var billing_address = '<?php echo addslashes(json_encode($order->billing_address)); ?>'
    // var shipping_address = '<?php echo addslashes(json_encode($order->shipping_address)); ?>'
    var productItems = '<?php echo addslashes(json_encode($order->items)); ?>'
    // billing_address = JSON.parse(billing_address)
    // shipping_address = JSON.parse(shipping_address)
    productItems = JSON.parse(productItems)
    var airwallexChange = '1';
    var shippingAddress = '<?php echo addslashes(json_encode($order->shipping_address)); ?>';
    shippingAddress = JSON.parse(shippingAddress)
    console.log(shippingAddress, 'shippingAddress22')
    var productData = {}
    var productParams = {
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
      total: null,
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
      error: null,
      payment_vault: null
    };
    var productList = [{
      amount: "",
      description: "",
      product_id: "",
      price: "",
      img: "",
      attr_id: "",
      attribute_name: "",
      variant_id: null,
      product_sku: ""
    }];
    var colorId = '';
    var sizeId = '';
    var colorAttr = '';
    var sizeAttr = '';
    var currency = '{{ core()->getCurrentCurrencyCode() }}';
    var paypal_pay_acc = '';

    function isEmpty(value) {
      if (value == null) return true;

      if (typeof value === 'string' && value.trim() === '') return true;

      if (Array.isArray(value) && value.length === 0) return true;

      if (typeof value === 'object' && Object.keys(value).length === 0 && value.constructor === Object) return true;

      return false;
    }

    function paramsInit() {
      let attr_id = '';
      let attribute_name = ''
      if (!isEmpty(colorId)) {
        attr_id = colorId
        if (!isEmpty(sizeId)) {
          attr_id = colorId + ',' + sizeId;
        }
      }
      if (!isEmpty(colorAttr)) {
        attribute_name = colorAttr;
        if (!isEmpty(sizeAttr)) {
          attribute_name = colorAttr + ',' + sizeAttr;
        }
      }
      productList[0].attr_id = attr_id;
      productList[0].attribute_name = attribute_name;
      productParams.payment_vault = '<?php echo $payment_paypal_vault; ?>'
      productParams.payment_airwallex_vault = '<?php echo $payment_airwallex_vault; ?>'
      productParams.payment_paypal_vault = '<?php echo $payment_paypal_vault; ?>'
      if (!isEmpty(attr_id)) {
        const index2 = productData.attr.index2;
        for (const key in index2) {
          if (Object.prototype.hasOwnProperty.call(index2, key)) {
            if (key == attr_id) {
              productList[0].variant_id = index2[key][0];
              productList[0].product_sku = index2[key][1];
            }

          }
        }
      } else {
        productList[0].product_sku = productData.sku;
      }
      productParams.address = shippingAddress.address1;
      productParams.first_name = shippingAddress.first_name;
      productParams.second_name = shippingAddress.last_name;
      productParams.phone_full = shippingAddress.phone;
      productParams.email = shippingAddress.email;
      productParams.city = shippingAddress.city;
      productParams.country = shippingAddress.country;
      productParams.province = shippingAddress.state;
      productParams.code = shippingAddress.postcode;
      productParams.bill_address = '<?php echo $order->billing_address->address1; ?>';
      productParams.bill_city = '<?php echo $order->billing_address->city; ?>';
      productParams.bill_code = '<?php echo $order->billing_address->postcode; ?>';
      productParams.bill_country = '<?php echo $order->billing_address->country; ?>';
      productParams.bill_first_name = '<?php echo $order->billing_address->first_name; ?>';
      productParams.bill_province = '<?php echo $order->billing_address->state; ?>';
      productParams.bill_second_name = '<?php echo $order->billing_address->last_name; ?>';
      productList[0].product_id = productData.product.id;
      productParams.products = productList;
      console.log(productParams, 'productParams')
    }

    function paramsInit2() {
      const additionalItems = productItems.reduce((prev, cur) => {
        prev.push(cur.additional)
        return prev
      }, [])
      console.log(additionalItems, 'additionalItems')
      productParams.products = additionalItems;
      productParams.payment_vault = '<?php echo $payment_paypal_vault; ?>'
      productParams.payment_airwallex_vault = '<?php echo $payment_airwallex_vault; ?>'
      productParams.payment_paypal_vault = '<?php echo $payment_paypal_vault; ?>'
      productParams.address = shippingAddress.address1;
      productParams.first_name = shippingAddress.first_name;
      productParams.second_name = shippingAddress.last_name;
      productParams.phone_full = shippingAddress.phone;
      productParams.email = shippingAddress.email;
      productParams.city = shippingAddress.city;
      productParams.country = shippingAddress.country;
      productParams.province = shippingAddress.state;
      productParams.code = shippingAddress.postcode;
      productParams.bill_address = '<?php echo $order->billing_address->address1; ?>';
      productParams.bill_city = '<?php echo $order->billing_address->city; ?>';
      productParams.bill_code = '<?php echo $order->billing_address->postcode; ?>';
      productParams.bill_country = '<?php echo $order->billing_address->country; ?>';
      productParams.bill_first_name = '<?php echo $order->billing_address->first_name; ?>';
      productParams.bill_province = '<?php echo $order->billing_address->state; ?>';
      productParams.bill_second_name = '<?php echo $order->billing_address->last_name; ?>';
      console.log(productParams, 'productParams')
    }
  </script>
  <div class="container">
    <!-- header banner -->
    <div class="header-banner">
    </div>
    <p class="thankYou">@lang('onebuy::app.v4.Thank You for Your Purchase!')</p>
    <!-- herder start-->
    <header class="flex-between">
      <!-- <div class="button-container"> -->
      <div class="herder-back" onclick="goBack()">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
      </div>
      <!-- <button type="button" class="btn btn-home" onclick="goBack()">Return to Homepage</button> -->
      <button type="button" class="btn btn-buy-again" id="buttonRight" onclick="rightButton()" data-toggle="modal" data-target="#exampleModal">
        @lang('onebuy::app.v4.Buy again at half price')
      </button>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="display: flex;gap:10px">@lang('onebuy::app.v4.Order now and enjoy half price discount')<div>
                  <div class="info-icon" id="offerIcon">!</div>
                  <div class="tooltip1" style="display:none;">
                    @lang('onebuy::app.v4.tip1') {{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}<?php echo number_format($order->grand_total, 2) / 2; ?>, @lang('onebuy::app.v4.tip2')
                    <br />
                    <div style="height: 10px;"></div>
                    @lang('onebuy::app.v4.tip3')
                  </div>
                </div>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div>
                <div style="margin: 10px;" id="complete-btn-id2"></div>
              </div>
              <div class="payment-form" id="payment-form2">
                <h1>@lang('onebuy::app.v4.Credit card')</h1>
                <div class="form-group input-icon">
                  <div>
                    <div id="cardNumber2" class="form-floating input-group has-icon-left" style="
                      display: none;
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
                </div>
                <div class="form-group">
                  <div style='margin-top:10px'>
                    <div id="expiry2" style="
                      display:none;
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
                </div>
                <div class="form-group">
                  <div style='margin-top:10px'>
                    <div id="cvc2" style="
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
                </div>
                <button class="submit-btn" id="payButton2">@lang('onebuy::app.v4.Pay Now')</button>
                <div class="card-icons">
                  <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/0169695890db3db16bfe.svg" loading="lazy" alt="" />
                  <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/ae9ceec48b1dc489596c.svg" loading="lazy" alt="" />
                  <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/f11b90c2972f3811f2d5.svg" loading="lazy" alt="" />
                  <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/37fc65d0d7ac30da3b0c.svg" loading="lazy" alt="" />
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('onebuy::app.v4.Close')</button>
            </div>
          </div>
        </div>
      </div>


      <!-- </div> -->

      <!-- <div class="header-left">
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
      <div class="header-right" onclick="goBack()">@lang('onebuy::app.v2.success.Buy Again')</div> -->
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
          <!-- <div class="second-content box mt20">
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

          </div> -->
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

                  <div class="relative sku-img">
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
  <!-- Drawer -->
  <div class="drawer" id="drawer">
    <div class="drawer-content">
      <button class="btn btn-danger" id="closeDrawer">@lang('onebuy::app.v4.Close')</button>
      <div class="drawer-title"></div>
      <div class="mt-5">
        <!-- color -->
        <div class="color-content" style="display: none;">
          <p style="margin-bottom: 5px;"><span id="sku-color"></span><span class="color-img-sku"></span></p>
          <div class="color-img-box">

          </div>
        </div>
        <!-- size -->
        <div class="size-content" style="display: none;">
          <p style="margin-bottom: 5px;"><span id="sku-size"></span><span class="size-img-sku"></span></p>
          <div class="size-img-box">

          </div>
        </div>
        <div class="mt-4 counter">
          <button id="decrease" class="btn btn-secondary">-</button>
          <input id="quantity" type="text" value="1" readonly class="mx-2 form-control">
          <button id="increase" class="btn btn-secondary">+</button>
        </div>

        <!-- paypal button -->
        <div>
          <div style="margin: 10px;" id="complete-btn-id"></div>
        </div>
        <div class="payment-form" id="payment-form1">
          <h1>@lang('onebuy::app.v4.Credit card')</h1>
          <div class="form-group input-icon">
            <div>
              <div id="cardNumber" class="form-floating input-group has-icon-left" style="
                      display: none;
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
          </div>
          <div class="form-group">
            <div style='margin-top:10px'>
              <div id="expiry" style="
                      display:none;
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
          </div>
          <div class="form-group">
            <div style='margin-top:10px'>
              <div id="cvc" style="
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
          </div>
          <button class="submit-btn" id="payButton">@lang('onebuy::app.v4.Pay Now')</button>
          <div class="card-icons">
            <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/0169695890db3db16bfe.svg" loading="lazy" alt="" />
            <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/ae9ceec48b1dc489596c.svg" loading="lazy" alt="" />
            <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/f11b90c2972f3811f2d5.svg" loading="lazy" alt="" />
            <img width="38" height="24" src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/37fc65d0d7ac30da3b0c.svg" loading="lazy" alt="" />
          </div>
        </div>

      </div>
    </div>
  </div>

  <div id="loading">
    <div class="overlay"></div>
    <div class="spinner"></div>
  </div>

  </div>
  <style>
    .payment-form {
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      /* max-width: 400px; */
      width: 100%;
    }

    .payment-form h1 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .form-group .input-icon {
      position: relative;
    }

    .form-group .input-icon input {
      padding-left: 40px;
    }

    .form-group .input-icon i {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #9c27b0;
    }

    .checkbox-group {
      display: flex;
      align-items: center;
    }

    .checkbox-group input {
      margin-right: 10px;
    }

    .submit-btn {
      width: 100%;
      padding: 10px;
      background-color: #8e24aa;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #7b1fa2;
    }

    .card-icons {
      margin-top: 15px;
      display: flex;
      justify-content: flex-end;
    }

    .card-icons img {
      margin-left: 10px;
    }

    .drawer-title {
      font-size: 18px;
      color: #444444;
      text-transform: capitalize;
      font-weight: 500;
      margin: 10px 0 -20px;
    }

    .counter {
      display: flex;
      align-items: center;
    }

    .counter button {
      width: 30px;
      height: 30px;
    }

    .counter input {
      width: 50px;
      text-align: center;
    }

    .size-label {
      display: block;
      text-transform: uppercase;
      font-weight: 500;
      min-width: 34px;
      min-height: 32px;
      width: auto;
      line-height: 30px;
      border: 1px solid transparent;
      border-radius: 5px;
      color: #333;
      font-size: 13px;
      margin: 0;
      overflow: hidden;
      text-align: center;
      background-color: #f5f5f5;
      padding: 0 10px;
      box-shadow: 0 0 0 1px #ddd;
    }

    .color-img-box {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .size-input:checked+.size-label {
      border: 1px solid #000000;
      background: #000;
      color: #fff;
    }

    .size-img-box {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .form-check {
      padding: 0 !important;
    }

    .form-check-input {
      display: none;
    }

    .form-check-label {
      display: flex;
      align-items: center;
      cursor: pointer;
      border: 1px solid #ddd;
      border-radius: 0.375rem;
      /* padding: 5px; */
      margin-bottom: 10px;
      background-color: #fff;
    }

    .form-check-label img {
      width: 50px;
      /* Adjust image size as needed */
      height: auto;
    }

    .form-check-input:checked+.form-check-label {
      border-color: #000000;
    }

    .form-check-input:focus+.form-check-label {
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }
  </style>
  <footer class="main__footer" role="contentinfo">
    @include('onebuy::footer-container-'.strtolower($default_country))
  </footer>
  @include("onebuy::checkout-airwallex")
  @include("onebuy::checkout-paypal")
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
    $(document).ready(function() {
      $('#offerIcon').hover(function() {
        $('.tooltip1').toggle();
      }).click(function() {
        $('.tooltip1').toggle();
      });
    });
    $(function() {
      const from = localStorage.getItem('from');
      if (!isEmpty(from) && from == 'success') {
        $('#buttonRight').hide()
      }
    })
    $(document).mouseup(function(e) {
      const drawer = $('#drawer');
      if (!drawer.is(e.target) && drawer.has(e.target).length === 0) {
        airwallexChange = '1';
        drawer.removeClass('open');
      }
    });
    async function getRecommended(path) {
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
            const recommendData = data.data.recommended_info
            console.log(recommendData, 'recommendData==')
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

              // <a href="` + url + `" target="_blank" rel="noopener noreferrer">` + item.title + `</a>
              // recommendDom += `<div class="recommend-item">
              //   <img class="recommend-img" src=" ` + item.image_url + `" alt="">
              //   <p class="recommend-subtitle mt10">
              //     <a href="javascript:void(0)" data-id="${item.product_id}" data-title="${item.title}" class="openDrawer" rel="noopener noreferrer">` + item.title + `</a>
              //   </p>
              //   <div class="recommend-price mt10">
              //     <span>{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}` + item.origin_price + `</span>
              //     <span class="ml5">{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}` + item.discount_price + `</span>
              //   </div>
              // </div>`
              recommendDom += `
              <div class="mt-4 mb-3 row align-items-center">
                <div class="col-auto">
                    <img width="100" height="100" src="` + item.image_url + `" alt="Product Image" class="rounded-sm img-fluid">
                </div>
                <div class="col">
                    <p class="mb-1 fw-bold">${item.title}</p>
                    
                </div>
                <div class="col-auto text-end" style="font-size:14px;">
                    <span class="d-block text-danger fs-5">{{ core()->currencySymbol(core()->getBaseCurrencyCode()) }}` + item.discount_price + `</span>
                    <button data-id="${item.product_id}" data-title="${item.title}" class="mt-2 btn btn-success openDrawer">Buy at 50% Off</button>
                </div>
              </div>
              `
            }
            $('.recommend-item-box').append(recommendDom)
            $('.openDrawer').click(async function() {
              $("#loading").show();
              airwallexChange = '2';
              $('#drawer').addClass('open');
              let id = $(this).data('id')
              let title = $(this).data('title')
              $('.drawer-title').text(title)
              productList[0].description = title;
              let url = `/api/onebuy/product/detail/${id}?currency={{ core()->getCurrentCurrencyCode() }}`
              let response = await fetch(url);
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              let data = await response.json();
              productData = data;
              paypal_pay_acc = data.paypal_client_id;
              createAirwallex2()
              paypalInit();
              getShopCard(data);
              // $("#loading").hide();
              console.log(data, 'data===')
            });

            $('#closeDrawer').click(function() {
              airwallexChange = '1';
              $('#drawer').removeClass('open');
            });
          }).catch(function(err) {
            console.log(err, 'getRecommended====err');
          })
      }
    }

    function rightButton() {
      $('#loading').show();
      paypalInit()
      createAirwallex1()
    }

    function getShopCard(productData) {
      console.log(productData, '==product==data==')
      productParams.amount = $('#quantity').val();
      productList[0].amount = $('#quantity').val();
      if (!isEmpty(productData.attr.attributes)) {
        skuInfo(productData.attr)
      }
    }

    function skuInfo(data) {
      let skuData = data.attributes;
      let imgData = data.variant_images;
      skuData.forEach(item => {
        // color
        if (item.id == 23) {
          $('.color-img-sku').text(item.options[0].label);
          colorId = item.id + '_' + item.options[0].id;
          colorAttr = item.options[0].label;
          let colorDom = ``;
          $('.color-content').show()
          let colorOption = item.options;
          let text = item.label + ': ';
          $('#sku-color').text(text)
          colorOption.forEach((cItem, index) => {
            cItem.img = imgData[cItem.products[0]][0].large_image_url;
            const isChecked = index === 0 ? 'checked' : '';
            colorDom += `
              <div class="color-img-item">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="color" onchange="colorSelect(this)" id="${cItem.id}" value="${cItem.label}" ${isChecked}>
                      <label class="form-check-label" for="${cItem.id}">
                          <img src="${cItem.img}" alt="${cItem.label}">
                      </label>
                  </div>
              </div>
            `
          })
          $('.color-img-box').html(colorDom);
        }
        // size
        if (item.id == 24) {
          let sizeDom = ``;
          sizeId = item.id + '_' + item.options[0].id;
          sizeAttr = item.options[0].label;
          $('.size-img-sku').text(item.options[0].label);
          $('.size-content').show()
          let sizeOption = item.options;
          let text = item.label + ': ';
          $('#sku-size').text(text);
          sizeOption.forEach((sItem, index) => {
            const isChecked = index === 0 ? 'checked' : '';
            sizeDom += `<div class="size-img-item">
                <div class="form-check">
                    <input class="form-check-input size-input" type="radio" name="size" onchange="sizeSelect(this)" id="${sItem.id}" value="${sItem.label}" ${isChecked}>
                    <label class="form-check-label size-label" for="${sItem.id}">
                      ${sItem.label}
                    </label>
                </div>
              </div>`
          })
          $('.size-img-box').html(sizeDom);
        }
      });
    }
    $('#decrease').click(function() {
      var currentValue = parseInt($('#quantity').val(), 10);
      if (currentValue > 1) {
        $('#quantity').val(currentValue - 1);
        productParams.amount = $('#quantity').val();
        productList[0].amount = $('#quantity').val();
      }
    });

    $('#increase').click(function() {
      var currentValue = parseInt($('#quantity').val(), 10);
      $('#quantity').val(currentValue + 1);
      productParams.amount = $('#quantity').val();
      productList[0].amount = $('#quantity').val();
    });

    function sizeSelect(radio) {
      $('.size-img-sku').text(radio.value);
    }

    function colorSelect(radio) {
      $('.color-img-sku').text(radio.value);
    }
    // function isEmpty(value) {
    //   if (value == null) return true;

    //   if (typeof value === 'string' && value.trim() === '') return true;

    //   if (Array.isArray(value) && value.length === 0) return true;

    //   if (typeof value === 'object' && Object.keys(value).length === 0 && value.constructor === Object) return true;

    //   return false;
    // }
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

    function initDomData() {
      let orderPre = '<?php echo $order_pre; ?>',
        payment = '<?php echo $payment; ?>',
        titleId = '<?php echo $order->id; ?>',
        headerTitle = orderPre + '#' + titleId,
        updatedTime = '<?php echo $order->updated_at; ?>',
        shippingAddress = '<?php echo addslashes(json_encode($order->shipping_address)); ?>';
      shippingAddress = JSON.parse(shippingAddress)
      $('.header-left-time span').append(payment.split(' ')[0])
      // $('.header-left-text-title').append(headerTitle)
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
      ?>

      console.log(order_param.grand_total, 'order_param.grand_total');
      data = input.data;
      purchase(order_param.grand_total);
      //purchase(null);
      if (!getCookie('voluum_payout') || getCookie('order_id') != getQueryString('id')) {
        //sendPurchaseEvent(data);
      }
      // setProductHtml(order_param.products, order_param.produt_amount_base);
      setProductHtml();
      showPaySuccess();
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