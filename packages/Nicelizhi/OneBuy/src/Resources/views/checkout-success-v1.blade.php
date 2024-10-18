
<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://shop.hatmeo.com/css/recommended.css">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<script src="/template-common/js/recommended.js?v=<?php echo time();?>"></script>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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

<?php if(!empty($quora_adv_id)) { ?>

<script>
!function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
<?php 
    $quora_adv_arr = explode(',', $quora_adv_id);
    foreach ($quora_adv_arr as $key => $quora_id) {
    ?>
qp('init', '<?php echo $quora_id;?>');
<?php } ?>

qp('track', 'ViewContent');
</script>
<?php foreach ($quora_adv_arr as $key => $quora_id) {?>
<noscript><img height="1" width="1" style="display:none" src="https://q.quora.com/_/ad/<?php echo $quora_id;?>/pixel?tag=ViewContent&noscript=1"/></noscript>
<?php } ?>
<!-- End of Quora Pixel Code -->
<?php } ?>

<?php if(!empty($ob_adv_id)) { ?>

<?php 
    $ob_adv_ids = explode(',', $ob_adv_id); 
    foreach($ob_adv_ids as $key=>$ob_adv_id) {
?>

<script data-obct type = "text/javascript">
/** DO NOT MODIFY THIS CODE**/
!function(_window, _document) {
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
<?php } } ?>
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
    <?php 
    $fb_ids_arr = explode(',', $fb_ids);
    foreach ($fb_ids_arr as $key => $fb_id) {
    ?>
    fbq('init', '<?php echo $fb_id;?>');
    <?php } ?>
  </script>
  <noscript>
    <?php foreach ($fb_ids_arr as $key => $fb_id) { ?>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $fb_id;?>&ev=PageView&noscript=1"/>
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
        function addVoluumImg(data) {
        }

        function postVoluumConversion(data) {
            if(getQueryString('s2')) {
                var params = {
                    cid     : getQueryString('s2'),
                    payout  : data.info.payout || (data.info.total + data.info.currency),
                    txid    : data.info._id.$oid
                };

                fetch('/common/send_conversion/voluum',{
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


      

        function sendPurchaseEvent(data) {
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

        function getQueryString(name) {
            var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
            var r = window.location.search.substr(1).match(reg);

            if (r != null) {
            return unescape(r[2]);
            }
            return null;
        }
    </script>

    <?php $products = $order->items;
    $line_items = [];
    foreach($products as $key=>$product) {
        $sku = $product['additional'];

        $skuInfo = explode('-', $sku['product_sku']);


        $line_item = [];
        $line_item['item_id'] = $skuInfo[0];
        $line_item['item_name'] = $product['name'];
        $line_item['price'] = $product['price'];
        $line_item ['quantity'] = $product['qty_ordered'];
        $line_item ['item_variant'] = @$sku['attribute_name'];

        //var_dump($product);

        array_push($line_items, $line_item);
    }

    ?>
<script>
        function purchase(value) {
            console.log("purchase "+ (value * 1).toFixed(2));
            fbq('track', 'Purchase', {currency: "EUR", value: (value * 1).toFixed(2)});
            console.log("purchase "+ (value * 1).toFixed(2));
            <?php if(!empty($ob_adv_id)) { ?>
            obApi('track', 'Purchase');
            <?php } ?>

            <?php if(!empty($quora_adv_id)) { ?>
            qp('track', 'Purchase',{value: (value * 1).toFixed(2)});
            <?php } ?>



            gtag('event', 'purchase', {
                transaction_id: '<?php echo $order->id;?>',
                value: (value * 1).toFixed(2),
                currency: "<?php echo $order->channel_currency_code;?>",
                items: <?php echo json_encode($line_items);?>
            });


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


            // params = {
            //     "channel_id": "<?php echo $crm_channel;?>",
            //     "token": "<?php echo $refer; ?>",
            //     "type": "purchase",
            //     "order_id": '<?php echo $order->id;?>',
            //     "amount": (value * 1).toFixed(2)
            // };
            // fetch('https://crm.heomai.com/api/user/action',{
            //         body: JSON.stringify(params),
            //         method: 'POST',
            //         headers: {
            //             'content-type': 'application/json'
            //         },
            // })


            if(typeof gtag == 'function') {
                if(window.localStorage) {
                    var ga_post_order_template_commom_ids_str = localStorage.getItem("ga_post_order_template_commom_ids");
                    var ga_post_order_template_commom_ids = [];
                    if(ga_post_order_template_commom_ids_str) {
                        ga_post_order_template_commom_ids = JSON.parse(ga_post_order_template_commom_ids_str);
                    }
                    if(ga_post_order_template_commom_ids.indexOf(getQueryString('id')) > -1) {
                        return;
                    }

                    ga_post_order_template_commom_ids.push(getQueryString('id'));
                    localStorage.setItem("ga_post_order_template_commom_ids", JSON.stringify(ga_post_order_template_commom_ids));
                }
                if(value) {
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
                setTimeout(function(){
                    //purchase();
                },10)
            }
        }

        //fbq('track', 'Purchase');
    </script>

<link href="https://shop.hatmeo.com/css/timber.scss.css" rel="stylesheet" type="text/css" media="all">
<link href="https://shop.hatmeo.com/css/theme.scss.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout1/css/font-awesome.min.css">
<style>
        @media screen and (min-width: 750px) {
            #dynamic-checkout-cart {
                min-height: 50px;
            }
        }

        @media screen and (max-width: 750px) {
            #dynamic-checkout-cart {
                min-height: 60px;
            }
        }

        
        @media (max-width:3840px) {
            .header-banner {
                background-image : url('/checkout/onebuy/success/{{ $default_country }}_pc.jpg');
                height: 100px;
            }
        }
     

        @media (max-width:750px) {
            .header-banner {
                background-image : url('/checkout/onebuy/success/{{ $default_country }}_mobile.jpg');
            }
        }
            .content-box{
                font-size:14px;
                border: 1px solid #666;
            }
            .loox-reviews-default {
                max-width: 1200px;
                margin: 0 auto;
            }

            .loox-rating .loox-icon {
                color: #fbcd0a;
            }

            .success_block {
                display: none;
            }
            .failed_block {
                display: none;
            }
    </style>
</head>
<body id="terms-of-service" class="template-page">
<div id="shopify-section-header" class="header-container-bg">
    <div data-section-id="header" data-section-type="header-section" data-template="page">
        <div class="header-container drawer__header-container">
            <div class="header-wrapper" data-header-wrapper>
                <header class="site-header" role="banner" data-transparent-header="true">
                    <div class="wrapper">
                        <div class="grid--full grid--table header-banner">
                            <div class="grid__item large--one-third medium-down--one-half">
                                <div class="h1 site-header__logo large--left" itemscope itemtype="http://schema.org/Organization">
                                    <a href="#" itemprop="url" class="site-header__logo-link" id="logo-image">
                                        <img class="site-header__logo-image" src height="70px" itemprop="logo">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>
</div>
<div id="PageContainer" class="page-container">
    <main class="main-content" role="main">
        <div class="wrapper">

            <div class="grid">
                <div class="grid__item large--five-sixths push--large--one-twelfth">
                    <div class="success_block">
                        <div class="content-box">
                            <div class="content-box__row text-container">
                                <h2 class="heading-2 os-step__title">@lang('checkout::app.v1.success.Your order is confirmed')</h2>
                                <p class="os-step__description">@lang('checkout::app.v1.success.We ve accepted your order and we re getting it ready Come back to this page for updates on your shipment status')</p>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="content-box__row text-container">
                                <h2 class="heading-2 os-step__title">@lang('checkout::app.v1.success.Order information')</h2>
                                <p>@lang('checkout::app.v1.success.Order Data'): <?php echo $order->created_at;?>
                                    <div class="product-content"></div>
                                </p>
                                <p>
                                Order Total:
                                <span class="order-total" data-value="orderTotalValue" data-currency="currencyCode">orderTotal</span>
                                </p>

                            </div>
                        </div>
                        <div class="content-box">
                            <div class="content-box__row text-container">
                                <h2 class="heading-2 os-step__title">@lang('checkout::app.v1.success.Customer information')</h2>
                                <p>
                                    <strong class="left-info" style="font-size:20px;">@lang('checkout::app.v1.success.First Name'): </strong> <span style="padding-left:10px;" class="customer_first_name right-info"></span>
                                </p>
                                <p>
                                    <strong class="left-info" style="font-size:20px;">@lang('checkout::app.v1.success.Last Name'): </strong> <span style="padding-left:10px;" class="customer_last_name right-info"></span>
                                </p>
                                <p>
                                    <strong class="left-info" style="font-size:20px;">@lang('checkout::app.v1.success.Email'): </strong> <span style="padding-left:10px;" class="customer_email right-info"></span>
                                </p>
                                <p>
                                    <strong class="left-info" style="font-size:20px;">@lang('checkout::app.v1.success.Phone Number'): </strong> <span style="padding-left:10px;" class="customer_phone right-info"></span>
                                </p>
                                <p>
                                    <strong class="left-info" style="font-size:20px;">@lang('checkout::app.v1.success.Street Address'): </strong> <span style="padding-left:10px;" class="customer_address_1 right-info"></span>
                                </p>
                                <p>
                                    <strong class="left-info" style="font-size:20px;">@lang('checkout::app.v1.success.City'): </strong> <span style="padding-left:10px;" class="customer_city right-info"></span>
                                </p>
                                <p>
                                    <strong class="left-info" style="font-size:20px;">@lang('checkout::app.v1.success.Country'): </strong> <span style="padding-left:10px;" class="customer_country right-info"></span>
                                </p>
                                <p>
                                    <strong class="left-info" style="font-size:20px;">@lang('checkout::app.v1.success.State/Province'): </strong> <span style="padding-left:10px;" class="customer_state right-info"></span>
                                </p>
                                <p>
                                    <strong class="left-info" style="font-size:20px;">@lang('checkout::app.v1.success.Zip/Postal Code'): </strong> <span style="padding-left:10px;" class="customer_zip right-info"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="failed_block">
                        <div class="content-box" style="text-align: center;">
                            <img src="./images/failed.png" style="height: 114px;margin: 10px auto;">
                            <h2>Your order payment failed!</h2>
                            <p class="failed_reason"></p>
                            <p class="os-step__description">Please try again!</p>
                        </div>
                    </div>
                    <div class="loading_block">
                        <div class="content-box" style="text-align: center;padding: 10px">
                        <h2>Please wait...</h2>
                    </div>
            </div>
</div>
</div>
</div>
</main>
<style>
    .terms-block {
    min-height: auto;
    margin: 5px 0;
    text-align: center;
    padding: 5px 0;
}
    .terms-block a {
    margin: 0 10px 0 0;
    display: inline-block;
    text-decoration: none;
    color: #5c5c5c;
    font-size: 12px;
    font-family: Helvetica Regular;
    opacity: 1;
}
            .main__footer {
                background-color: #000;
                color: #fff;
                text-align: center;
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
        </style>
    <footer class="main__footer" role="contentinfo">
        @include('onebuy::footer-container-'.strtolower($default_country))
    </footer>
    
</div>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gtag; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
<?php if(empty($refer)) { ?>
    gtag('config', '<?php echo $gtag; ?>',{"debug_mode": true});
<?php }else { ?>
  gtag('config', '<?php echo $gtag; ?>', {"user_id": "<?php echo $refer;?>","debug_mode": true});
<?php } ?>
</script>
<script>
        if(getCookie('voluum_payout') && getCookie('order_id') == getQueryString('id')) {
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
        if(client_secret || cko_session_id) {
            var paypal_request_params = {
                id : getQueryString('id'),
            }
            if(client_secret) {
                paypal_request_params['client_secret'] = client_secret;
            }
            if(cko_session_id) {
                paypal_request_params['cko_session_id'] = cko_session_id;
            }
            var paypal_request = '';
            for(var i=0; i<Object.keys(paypal_request_params).length; i++) {
                paypal_request += Object.keys(paypal_request_params)[i] + '=' + paypal_request_params[Object.keys(paypal_request_params)[i]] + '&';
            }
            paypal_request = paypal_request.substr(0,paypal_request.length - 1);
            console.log(paypal_request);

            var paypal_status_url = '/pay/order/status?' + paypal_request
            fetch(paypal_status_url,{
                method: 'get',
                headers: {
                    'content-type': 'application/json'
                },
            })
            .then(function(res) {return res.json()})
            .then(function(res) {
                postPayStatusParams(JSON.stringify(res), getQueryString('id'));
                if(res.result === 200) {
                    if(res.info.pay_status) {
                        getOrderData();
                    } else {
                        showPayFailed(res.info.message);
                    }
                }
            })
        } else {
            if(pacypay_response_code && pacypay_response_code != '88') {
                showPayFailed(getQueryString('message'));
            } else if(awx_return_result && awx_return_result != 'success') {
                showPayFailed();
            } else {
                getOrderData();
            }
        }

        function getOrderData() {
            
            var params = {
                id : getQueryString('id'),
            }
            var url = '/onebuy/order/query?id=' + getQueryString('id');
            fetch(url,{
                method: 'GET',
            })
            .then(function(data){return data.json()}).then(function(data){updataDom(data)})
        }

        function getFormatPrice(price, price_template) {
            console.log("get formate price fun");
            console.log(price);
            console.log(price_template)
            var price_prefix = '';
            if(price*1 < 0) {
                price = Math.abs(price);
                price_prefix = '-';
            }
            
            return price_prefix + price_template.replace('price', (price*1).toFixed(2));
        }

        function updataDom(input) {

            order_param = JSON.parse(localStorage.getItem('order_params'));

            order_param = <?php echo json_encode($order);?>

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
            if(!getCookie('voluum_payout') || getCookie('order_id') != getQueryString('id')) {
                console.log('data');
                //sendPurchaseEvent(data);
            }

            //document.querySelector('.order-total').innerHTML = getFormatPrice(data.info.grand_total, order_param.price_template);
            document.querySelector('.customer_first_name').innerHTML = order_param.customer_first_name;
            document.querySelector('.customer_last_name').innerHTML = order_param.customer_last_name;
            document.querySelector('.customer_email').innerHTML = order_param.customer_email;
            document.querySelector('.customer_phone').innerHTML = "<?php echo $shipping_address->phone;?>";
            document.querySelector('.customer_address_1').innerHTML = "<?php echo $shipping_address->address1;?>";
            document.querySelector('.customer_city').innerHTML = "<?php echo $shipping_address->city;?>";
            document.querySelector('.customer_country').innerHTML = "<?php echo $shipping_address->country;?>";
            document.querySelector('.customer_state').innerHTML = "<?php echo $shipping_address->state;?>";
            document.querySelector('.customer_zip').innerHTML = "<?php echo $shipping_address->postcode;?>";


            // setProductHtml(order_param.products, order_param.produt_amount_base);
            setProductHtml();
            showPaySuccess();
            console.log("getRecommendedData");
            console.log(order_param.items[0].sku);
            getRecommendedData("/onebuy/v4/"+order_param.items[0].sku);
            
        }

        function setProductHtml() {
            var product_html = "";
            var product_attributes_html = "";
            <?php
            $products = $order->items;
            foreach($products as $key=>$product) { ?>
            product_attributes_html += "<p>";
            <?php 
                //var_dump($product->additional['attributes']);exit;
                if(isset($product->additional['attributes'])) {
                foreach($product->additional['attributes'] as $attribute) {
            ?>
                product_attributes_html += "<span><?php echo $attribute['attribute_name']; ?>: <?php echo $attribute['option_label']; ?></span>";
            <?php } } ?>
                product_attributes_html += "</p>";
                product_html += '<p class="order-date"><strong><?php echo addslashes($product->name);?> </strong> ×<span class="order-count">(<?php echo $product->qty_ordered;?>)</span> ' + product_attributes_html +'</p> ';
            <?php } ?>

            document.querySelector('.product-content').innerHTML = product_html;

        }

        function setProductHtmlNew(products, produt_amount_base =1) {
            var product_html = ''

            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                product_html += '<p class="order-date"><img src="'+product.img+'" height="50" style="vertical-align: middle;"> '+product.description+' ×<span class="order-count">'+(product.amount)+'</span></p> '
            }

            document.querySelector('.product-content').innerHTML = product_html;
        }

        function showPaySuccess() {
            document.querySelector('.failed_block').style.display = "none";
            document.querySelector('.success_block').style.display = "block";
            document.querySelector('.loading_block').style.display = "none";
        }

        function showPayFailed(message) {
            if(message) {
                document.querySelector('.failed_reason').innerText = message;
            }
            document.querySelector('.failed_block').style.display = "block";
            document.querySelector('.success_block').style.display = "none";
            document.querySelector('.loading_block').style.display = "none";
        }

        function postPayStatusParams(log, order_id) {
            let url = '/order/pay/status/error?order_id='+order_id+'&logo='+log;

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
    </script>
<style type="text/css">
        .ba-vol-wrapper {
            margin-top: 20px;
        }

        .booster-cart-item-line-price .original_price {
            display: block;
            text-decoration: line-through !important;
        }

        .booster-cart-item-price,
        .booster-cart-total,
        .booster-cart-item-line-price .discounted_price {
            display: block;
            font-weight: bold;
        }

        .booster-cart-item-success-notes,
        .booster-cart-item-upsell-notes {
            display: block;
            font-weight: bold;
            color: #0078bd;
            font-size: 100%;
            white-space: pre-wrap !important;
        }

        .booster-cart-item-success-notes a,
        .booster-cart-item-upsell-notes a {
            color: #0078bd;
        }

        .wh-cart-total {
            display: block;
            font-weight: bold;
        }

        .booster-messages {
            display: block;
        }

        #booster-discount-item {
            font-size: 70%;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        #booster-summary-item {
            font-size: 70%;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .summary-line-note {
            padding-right: 10px;
        }

        .summary-line-discount {
            color: #0078bd;
        }

        input#booster-discount-code {
            max-width: 200px;
            display: inline-block;
            font-size: 16px;
        }

        button#apply-booster-discount {
            display: inline-block;
            max-width: 200px;
            font-size: 16px;
        }

        div#booster-notification-bar {
            font-size: 110%;
            background-color: #a1c65b;
            padding: 12px;
            color: #ffffff;
            font-family: inherit;
            z-index: 9999999999999;
            display: none;
            left: 0px;
            width: 100%;
            margin: 0px;
            margin-bottom: 20px;
            text-align: center;
            text-transform: none;
        }

        div#booster-notification-bar span {
            display: block;
        }

        div#booster-close-notification {
            float: right;
            font-weight: bold;
            height: 0;
            overflow: visible;
            cursor: pointer;
            margin-right: 1em;
        }

        .ba-bundle-wrapper {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .ba-bundle-wrapper .ba-product-bundle {
            display: flex;
            clear: both;
            margin: 0 0 20px;
        }

        #dpModal-container .ba-product-bundle {
            clear: both;
            margin: 0 0 20px;
            min-height: 390px;
        }


        .ba-bundle-wrapper .bundle-title {

            font-size: 20px;
            margin-bottom: 15px;

        }

        .ba-eqs {
            display: none;
        }

        .ba-product-bundle .ba-product-wrapper,
        .ba-product-bundle .bundle-plus,
        .ba-product-bundle .bundle-total {
            display: inline-block;
            text-align: center;
            vertical-align: middle;
        }

        .ba-product-bundle .bundle-total {
            text-align: left;
        }

        .ba-bundle-wrapper .ba-product-bundle .ba-info-wrapper a {
            text-decoration: none;
        }

        #two-product.ba-product-bundle .bundle-plus img {
            position: relative;
            max-width: 35px;
            min-width: 12px;
        }

        #three-product.ba-product-bundle.button-under .bundle-plus img {
            position: relative;
            margin-left: 0px;
            max-width: 22px !important;
            min-width: 12px;
        }

        #three-product.ba-product-bundle.with-total .bundle-plus img {
            position: relative;
            margin-left: -22% !important;
            max-width: 22px !important;
            min-width: 12px;
        }

        #four-product.ba-product-bundle.button-under .bundle-plus img {
            position: relative;
            margin-left: -22% !important;
            max-width: 22px !important;
            min-width: 12px;
        }

        #four-product.ba-product-bundle.with-total .bundle-plus img {
            position: relative;
            margin-left: -22% !important;
            max-width: 22px !important;
            min-width: 12px;
        }

        #over-four-product.ba-product-bundle .bundle-plus img {
            position: relative;
            min-width: 12px;
        }

        .ba-product-bundle .ba-product-wrapper {
            line-height: 15px;
        }

        .ba-product-bundle .ba-product-wrapper img {
            width: 80%;
        }

        .ba-product-bundle .bundle-name {
            margin: 10px 0 5px 0;
            text-align: left;
            min-height: 40px;
        }

        .ba-product-bundle .bundle-name p.product-title {
            margin-bottom: 5px;

        }

        p.product-quantity {
            color: #6b6b6b;
            font-size: 12px;
        }

        .ba-product-bundle .ba-price {
            margin-bottom: 5px;
            display: inline-block;
            margin-right: 5px;
            width: 100%;
        }

        .ba-product-bundle .buy-bundle {
            text-align: right;
            padding: 5px 0;
        }

        .ba-product-bundle .buy-bundle input.addtocart {
            padding: 5px 10px;
            background-color: #222;
            color: #FFF;
            border: none;
        }

        .booster-variants-container select {
            width: 100%;
            margin-bottom: 5px
        }

        .ba-product-bundle .booster-variants-container {
            border: none;
            margin: 0;
            padding: 0;
        }

        .ba-product-bundle .ba-price.regular {
            color: #bbb;
            text-decoration: line-through;
        }

        .ba-product-bundle .ba-product-wrapper {
            vertical-align: top !important;
            line-height: 15px;
            text-align: left;
        }

        .ba-product-bundle .ba-image {
            min-height: 130px;
            max-height: 130px;
            line-height: 125px;
            border: 1px solid #d9d9d9;
            background: #fff;
            text-align: center;
        }

        .ba-product-bundle .ba-image img {
            max-height: 115px;
            max-width: 100%;
            vertical-align: middle;
            height: auto;
            width: auto;
        }

        .ba-product-bundle .bundle-plus {
            line-height: 125px;
        }

        .ba-bundle-wrapper .ba-product-bundle button {
            display: inline-block;
            padding: 4px 10px 4px;
            margin-bottom: 0;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.1);
            color: #ffffff;
            text-align: center;
            vertical-align: middle;
            background-repeat: repeat-x;
            border: 1px solid #cccccc;
            border-bottom-color: #b3b3b3;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            background-color: #414141;
            background-image: -moz-linear-gradient(top, #555555, #222222);
            background-image: -ms-linear-gradient(top, #555555, #222222);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#555555), to(#222222));
            background-image: -webkit-linear-gradient(top, #555555, #222222);
            background-image: -o-linear-gradient(top, #555555, #222222);
            background-image: linear-gradient(top, #555555, #222222);
            background-repeat: repeat-x;
            filter: progid: DXImageTransform.Microsoft.gradient(startColorstr="#555555", endColorstr="#222222", GradientType=0);
            border-color: #222222 #222222 #000000;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            filter: progid: dximagetransform.microsoft.gradient(enabled=false);
            padding: 5px 10px;
        }

        .ba-product-bundle button .top-button {
            font-size: 12px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            display: block;
            padding: 0 5px 2px 5px;
        }

        .ba-product-bundle button .bottom-button {
            font-size: 14px;
            padding: 2px 5px 0 5px;
            display: block;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .ba-product-bundle .ba-price {
            position: static;
            background: none;
            text-align: left;
            padding: 0;
        }


        .ba-product-bundle .ba-eqs {
            width: auto;
            margin: 0 10px;
        }

        #two-product.ba-product-bundle .ba-product-wrapper {
            width: 46%;
        }

        #two-product.ba-product-bundle .bundle-plus {
            font-size: 75px
        }

        #two-product.ba-product-bundle.with-total .bundle-total {
            width: 100%;
            margin: 10px 0 0 0;
            text-align: right;
            display: inline-block;
        }

        #three-product.ba-product-bundle .ba-product-wrapper {
            width: 28%;
        }

        #three-product.ba-product-bundle .bundle-plus {
            width: 3.1%;
            font-size: 50px
        }

        #four-product.ba-product-bundle.button-under .ba-product-wrapper {
            width: 21.2%;
        }

        #four-product.ba-product-bundle.with-total .ba-product-wrapper {
            width: 17%;
        }

        #four-product.ba-product-bundle.button-under .bundle-plus {
            width: 5%;
            font-size: 40px
        }

        #four-product.ba-product-bundle .bundle-plus {
            width: 3%;
            font-size: 40px
        }

        #over-four-product.ba-product-bundle .ba-product-wrapper {
            width: 17%;
        }

        #over-four-product.ba-product-bundle .bundle-plus {
            width: 3.5%;
            font-size: 40px
        }

        .with-total .bundle-total button {
            white-space: normal;
        }

        #two-product.ba-product-bundle.with-total .ba-product-wrapper {
            flex: 1;
            flex-basis: 115px;
        }

        #two-product.ba-product-bundle.with-total .bundle-plus {
            margin: 0 5px;
        }

        #two-product.ba-product-bundle.with-total .bundle-total {
            font-size: 35px;
            margin: 0;
            text-align: right;
        }

        #three-product.ba-product-bundle.with-total .ba-product-wrapper {
            flex: 1;
            flex-basis: 100px;
        }

        #three-product.ba-product-bundle.with-total .bundle-total button {
            width: 100%;
            margin-top: 0px;
        }

        #three-product.ba-product-bundle.with-total .bundle-plus {
            font-size: 45px;
            margin: 0 5px;
        }

        #two-product.ba-product-bundle.with-total .bundle-total {
            display: flex;
            flex: 1;
            flex-basis: 100px;
            font-size: 30px;
            height: 100%;
            margin-top: 20px;
        }

        #three-product.ba-product-bundle.with-total .bundle-total {
            display: flex;
            flex: 1;
            flex-basis: 115px;
            font-size: 30px;
            height: 100%;
            margin-top: 20px;
        }

        .ba-product-bundle.with-total .bundle-total .ba-eqs {
            width: 23px;
        }

        .ba-product-bundle.with-total .bundle-total .ba-eqs img {
            margin: auto;
            max-width: 23px;
            height: 16px;
        }

        #four-product.ba-product-bundle.with-total .ba-product-wrapper,
        #four-product.ba-product-bundle.with-total .bundle-total {
            flex: 1;
            flex-basis: 90px;
        }

        #four-product.ba-product-bundle.with-total .bundle-plus {
            font-size: 40px;
            margin: 0 5px;
        }

        #four-product.ba-product-bundle.with-total .bundle-total {
            font-size: 25px
        }

        #four-product.ba-product-bundle .ba-eqs {
            display: none;
        }

        #four-product.ba-product-bundle.with-total .bundle-total {
            flex: 1;
            flex-basis: 130px;
            height: inherit;
            max-height: 100px;
            min-height: 50px;
            text-align: center;
            margin-top: 20px;
        }

        #over-four-product.ba-product-bundle.with-total .ba-product-wrapper,
        #over-four-product.ba-product-bundle.with-total .bundle-total {
            flex: 1;
            flex-basis: 90px;
        }

        #over-four-product.ba-product-bundle.with-total .bundle-plus {
            font-size: 40px
        }

        #over-four-product.ba-product-bundle.with-total .bundle-total {
            font-size: 25px
        }

        #over-four-product.ba-product-bundle .ba-eqs {
            display: none;
        }

        .ba-product-bundle.button-under .bundle-total,
        #over-four-product.ba-product-bundle.with-total .bundle-total {
            flex: 1;
            flex-basis: 130px;
            height: 100%;
            text-align: center;
            margin-top: 20px;
        }

        .ba-product-bundle.button-under .ba-product-wrapper {
            flex-basis: auto;
        }

        #two-product.ba-product-bundle.button-under .bundle-plus,
        #three-product.ba-product-bundle.button-under .bundle-plus {
            width: 8%;
        }

        #max-two {
            width: 61%;
        }

        #max-two .bundle-plus {
            width: 10%
        }

        #three-product.max-two .bundle-total,
        #four-product.max-two .bundle-total,
        #over-four-product.max-two .bundle-total {
            height: 384px;
        }

        #three-product.max-two .ba-eqs,
        #four-product.max-two .ba-eqs,
        #over-four-product.max-two .ba-eqs {
            position: relative;
            top: 50%;
        }

        #three-product.max-two button,
        #four-product.max-two button {
            position: relative;
            top: 50%;
        }

        #over-four-product.max-two button {
            position: relative;
            top: 50%;
        }

        #max-two {
            width: 60%;
            display: inline-block;
        }

        #max-two .bundle-plus:nth-child(4n+4) {
            display: none;
        }

        .ba-product-bundle.button-under {
            flex-wrap: wrap;
        }

        .ba-product-bundle .ba-product-wrapper {
            width: 45%;
        }

        .ba-product-bundle .bundle-total {
            color: #bfbfbf;
            font-size: 21px;
            font-weight: bold;
        }

        /* .ba-product-bundle .bundle-name{
  overflow-x: hidden;
} */

        .with-total.ba-product-bundle .ba-eqs {
            display: flex;
            width: 24px;
        }

        .ba-product-bundle .bundle-total button {
            width: 100%;
            /*max-width: 150px;*/
        }

        @media screen and (min-width: 650px) {

            #four-product.ba-product-bundle,
            #over-four-product.ba-product-bundle {
                flex-wrap: wrap;
            }

            #four-product.ba-product-bundle.with-total .bundle-total .ba-eqs,
            #over-four-product.ba-product-bundle.with-total .bundle-total .ba-eqs {
                display: none;
            }

            .ba-product-bundle.with-total .bundle-total {
                justify-content: center;
            }

            #four-product.ba-product-bundle.with-total .ba-product-wrapper {
                flex-basis: auto;
            }

            #over-four-product.ba-product-bundle.with-total .ba-product-wrapper {
                flex-basis: auto;
            }

            #four-product .ba-product-bundle.with-total .bundle-total,
            #over-four-product.ba-product-bundle.with-total .bundle-total {
                min-height: 50px;
                max-height: 100px;
                height: inherit;
            }

            #four-product .ba-info-wrapper .bundle-name {
                font-size: 90%;
                word-break: break-word;
            }

            #over-four-product .ba-info-wrapper .bundle-name {
                font-size: 85%;
                word-break: break-word;
            }

            #four-product.with-total.ba-product-bundle .bundle-total button span,
            #over-four-product.with-total.ba-product-bundle .bundle-total button span {
                font-size: 15px;
            }

            #four-product.with-total.ba-product-bundle .bundle-total button.add-booster-bundle,
            #over-four-product.with-total.ba-product-bundle .bundle-total button.add-booster-bundle {
                width: 100%;
                margin: 0;
            }
        }

        @media screen and (max-width: 650px) {
            .ba-product-bundle {
                flex-direction: column;
            }

            .ba-product-bundle .ba-product-wrapper {
                width: 100% !important;
            }

            .ba-product-bundle .ba-product-wrapper>a:first-child {
                width: 35% !important;
                margin-right: 20px;
                display: block;
                float: left;
            }

            .ba-product-bundle .ba-product-wrapper .bundle-name {
                margin: 0;
            }

            .ba-product-bundle .bundle-plus {
                width: 100% !important;
                max-width: 100%;
                line-height: 0;
                border-bottom: 1px solid #ccc;
                margin: 10px 0 25px;
            }

            .ba-product-bundle .bundle-total .ba-eqs {
                display: none;
            }

            .ba-product-bundle .bundle-plus img,
            #two-product.ba-product-bundle.with-total .bundle-plus img,
            #three-product.ba-product-bundle.with-total .bundle-plus img,
            #four-product.ba-product-bundle.with-total .bundle-plus img,
            #over-four-product.ba-product-bundle.with-total .bundle-plus img,
            #two-product.ba-product-bundle.button-under .bundle-plus img,
            #three-product.ba-product-bundle.button-under .bundle-plus img,
            #four-product.ba-product-bundle.button-under .bundle-plus img,
            #over-four-product.ba-product-bundle.button-under .bundle-plus img {
                margin-left: 0 !important;
                margin-bottom: -18px;
                max-width: 35px !important;
            }

            .booster-variants-container select {
                width: auto;
                margin-top: 10px
            }

            .ba-product-bundle .bundle-total {
                width: 100% !important;
                text-align: center;
                margin-top: 20px;
            }

            .ba-product-bundle .ba-eqs {
                width: 100%;
                border-bottom: 1px solid #ccc;
                margin: -22px 0 0 0;
                position: relative;
            }

            .ba-product-bundle .ba-eqs img {
                margin-left: 0 !important;
                margin-bottom: -18px;
                display: none;
            }

            .ba-product-bundle .ba-image-container {
                width: 35%;
                display: inline-block;
                float: left;
            }

            .ba-product-bundle .ba-info-wrapper {
                width: 60%;
                display: inline-block;
                float: left;
                padding-left: 10px;
            }

            .ba-product-bundle .ba-info-wrapper a {
                text-decoration: none;
            }

            .ba-product-bundle .ba-info-wrapper select.ba-variants {
                width: 100%;
            }

            #two-product.ba-product-bundle.with-total .bundle-plus {
                margin: 0 0 30px;
            }

            #two-product.ba-product-bundle .bundle-plus img,
            #three-product.ba-product-bundle .bundle-plus img,
            #four-product.ba-product-bundle .bundle-plus img,
            #over-four-product.ba-product-bundle .bundle-plus img {
                max-width: 35px !important;
                margin-left: 0 !important;
            }

            #three-product.ba-product-bundle.with-total .bundle-total button {
                margin-top: 20px;
                width: 100%;
            }

            #three-product.ba-product-bundle.with-total .bundle-plus {
                margin: 10px 0 25px;
            }

            #four-product.ba-product-bundle.with-total .bundle-plus {
                margin: 10px 0 25px;
            }

            #over-four-product.ba-product-bundle.with-total .bundle-plus {
                margin: 10px 0 25px;
            }

        }

        .ba-product-bundle .ba-price {
            color: #8C0000;
        }

        .ba-product-bundle .bundle-total {
            color: #8C1919;
        }

        .ba-product-bundle .bundle-total button {
            width: 100%;
        }

        .ba-product-bundle button .top-button {
            border-bottom: 0px;
        }

        @media (max-width: 650px) {
            .bundle-name {
                display: inline-block !important;
            }

            .ba-eqs {
                width: 100% !important;
            }

            .bundle-name {
                padding-top: 10px !important;
            }

            .bundle-total button {
                margin-left: auto !important;
                margin-right: auto !important;
                display: block;
            }
        }

        .bundle-total button {
            color: #fff;
            margin: -10px 0 -10px;
            width: 100%;
            border: none;
            text-decoration: none;
            font-size: 13%;
            font-family: inherit;
            text-transform: uppercase;
            font-weight: 500;
            padding: 10px;
            height: 100%;
        }

        .with-total.ba-product-bundle .bundle-total button.add-booster-bundle {
            width: 100%;
            margin: 0;
            height: inherit;
            min-height: 50px;

        }

        .ba-product-bundle button .top-button {
            border-bottom: 0px;
        }

        @media (max-width: 650px) {
            .bundle-name {
                display: inline-block !important;
            }

            .ba-eqs {
                width: 100% !important;
            }

            .bundle-name {
                padding-top: 10px !important;
            }

            .bundle-total button {
                margin-left: auto !important;
                margin-right: auto !important;
                display: block;
            }

            .with-total.ba-product-bundle .bundle-total button.add-booster-bundle {
                width: 100%;
                margin-top: 10px;
                height: inherit;
                max-height: 100px;
                min-height: 50px;
            }

        }

        .dp-popup div,
        .dp-popup span,
        .dp-popup h1,
        .dp-popup h2,
        .dp-popup h3,
        .dp-popup h4,
        .dp-popup h5,
        .dp-popup h6,
        .dp-popup p,
        .dp-popup a,
        .dp-popup img,
        .dp-popup b,
        .dp-popup u,
        .dp-popup i,
        .dp-popup ol,
        .dp-popup ul,
        .dp-popup li,
        .dp-popup form,
        .dp-popup label,
        .dp-popup table,
        .dp-popup tbody,
        .dp-popup tfoot,
        .dp-popup thead,
        .dp-popup tr,
        .dp-popup th,
        .dp-popup td {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            text-transform: none;
        }

        .dp-popup body {
            line-height: 1;
        }

        .dp-popup ol,
        .dp-popup ul {
            list-style: none;
        }

        .dp-popup table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .blocker {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            z-index: 2147483646;
            padding: 20px;
            box-sizing: border-box;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.75);
            text-align: center;
        }

        .blocker:before {
            content: "";
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -0.05em;
        }

        .blocker.behind {
            background-color: transparent;
        }

        .dp-popup-dpModal {
            display: inline-block;
            min-width: 400px;
            vertical-align: middle;
            position: relative;
            z-index: 2147483647;
            max-width: 600px;
            background: #fff;
            padding: 30px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -o-border-radius: 8px;
            -ms-border-radius: 8px;
            border-radius: 8px;
            -webkit-box-shadow: 0 0 10px #000;
            -moz-box-shadow: 0 0 10px #000;
            -o-box-shadow: 0 0 10px #000;
            -ms-box-shadow: 0 0 10px #000;
            box-shadow: 0 0 10px #000;
            text-align: center;
            text-transform: none;
            font-family: "Helvetica Neue",
            Helvetica,
            Arial,
            sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333333;
            -moz-transition: background-color 0.15s linear;
            -webkit-transition: background-color 0.15s linear;
            -o-transition: background-color 0.15s linear;
            transition: background-color 0.15s cubic-bezier(0.785, 0.135, 0.150, 0.860);
        }

        .dp-popup-dpModal a {
            background-color: transparent;
        }

        .dp-popup-dpModal a:active,
        .dp-popup-dpModal a:hover {
            outline: 0;
        }

        .dp-popup-dpModal hr {
            height: 0;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            height: 0;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eeeeee;
        }

        .dp-popup-dpModal button,
        .dp-popup-dpModal input,
        .dp-popup-dpModal optgroup,
        .dp-popup-dpModal select,
        .dp-popup-dpModal textarea {
            color: inherit;
            font: inherit;
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }

        .dp-popup-dpModal button {
            overflow: visible;
        }

        .dp-popup-dpModal button,
        .dp-popup-dpModal select {
            text-transform: none;
        }

        .dp-popup-dpModal button {
            -webkit-appearance: button;
            cursor: pointer;
        }

        .dp-popup-dpModal button::-moz-focus-inner,
        .dp-popup-dpModal input::-moz-focus-inner {
            border: 0;
            padding: 0;
        }

        .dp-popup-dpModal input {
            line-height: normal;
        }

        .dp-popup-dpModal input[type="number"]::-webkit-inner-spin-button,
        .dp-popup-dpModal input[type="number"]::-webkit-outer-spin-button {
            height: auto;
        }

        .dp-popup-dpModal body.fadein {
            background: rgba(0, 0, 0, 0.65);
        }

        #dpModal-container {
            width: auto;
        }

        #dpModal-container img {
            opacity: 100 !important;
        }

        #dpModal-container div.image {
            position: static !important;
        }

        .dp-popup-dpModal #popup-dpModal-container {
            background: white;
            padding: 12px 18px 40px 18px;
        }

        @media only screen and (min-width:500px) {
            .dp-popup-dpModal #popup-dpModal-container {
                border-radius: 5px;
                padding: 30px 40px;
            }
        }

        @media only screen and (min-width:992px) {
            .dp-popup-dpModal #popup-dpModal-container {
                margin-top: 140px;
            }
        }

        .dp-popup-dpModal .fade {
            opacity: 0;
            -webkit-transition: opacity 0.15s linear;
            -o-transition: opacity 0.15s linear;
            transition: opacity 0.15s linear;
        }

        .dp-popup-dpModal .fade.in {
            opacity: 1;
        }

        /* only the stuff we need added here */

        .dp-popup-dpModal h2 {
            font-size: 24px;
            font-family: inherit;
            font-weight: 500;
            line-height: 1.1;
            color: inherit;
        }

        .dp-popup-dpModal h3 {
            font-family: inherit;
            font-weight: normal;
            line-height: 1.1;
            color: inherit;
            font-size: 18px;
            margin-top: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .dp-popup-dpModal p.body-text {
            font-size: 20;
            margin-top: 40px;
            margin-bottom: 10px;
        }

        .dp-popup-dpModal .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }

        .dp-popup-dpModal .input-lg {
            height: 46px;
            padding: 10px 16px;
            line-height: 1.3333333;
            border-radius: 6px;
        }

        .dp-popup-dpModal select.input-lg {
            height: 46px;
        }

        @media screen and (-webkit-min-device-pixel-ratio:0) {

            .dp-popup-dpModal select:focus,
            .dp-popup-dpModal textarea:focus,
            .dp-popup-dpModal input:focus {
                font-size: 16px;
                background: #eee;
            }
        }

        .dp-popup-dpModal .form-group {
            margin-bottom: 15px;
        }

        .dp-popup-dpModal .btn {
            display: inline-block;
            padding: 8px 12px;
            margin-bottom: 0;
            font-size: 14px;
            line-height: 1.42857143;
            text-align: center;
            vertical-align: middle;
            letter-spacing: 1px;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 3px;
        }

        .dp-popup-dpModal .btn-success {
            width: 100%;
            color: #ffffff;
            background-color: #4ed14e;
        }

        .dp-popup-dpModal .btn-lg {
            line-height: 24px;
            font-size: 15px;
            padding: 14px;
            line-height: 1.3333333;
        }

        .dp-popup-dpModal .close {
            -webkit-appearance: none;
            padding: 0;
            cursor: pointer;
            background: 0 0;
            border: 0;
            text-align: center;
            font-size: 21px;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
        }

        .dp-popup-dpModal form {
            margin-top: 10px;
        }

        .dp-popup-dpModal .dpModal-content .close {
            font-size: 30px;
        }

        .dp-popup-dpModal .dpModal-backdrop.in {
            filter: alpha(opacity=65);
            opacity: .65;
        }

        .dp-popup-dpModal .completed_message {
            display: none;
        }

        .dp-popup-dpModal .complete .completed_message {
            display: block;
        }

        .dp-popup-dpModal .single-variant {
            display: none;
        }

        .dp-popup-dpModal div.footer {
            margin-top: 20px;
        }

        .dp-popup-dpModal div.footer p {
            color: #b3b3b3;
            font-size: 12px;
        }

        .dp-popup-dpModal div.no-thanks {
            padding-top: 20px;
        }

        .dp-popup-dpModal div.no-thanks a {
            color: #aaaaaa;
            font-size: 100%;
        }

        @media (min-width: 0px) {
            .dp-popup-dpModal {
                min-width: 100%;
            }
        }

        @media (min-width: 300px) {
            .dp-popup-dpModal {
                min-width: 80%;
            }
        }

        @media (min-width: 768px) {
            .dp-popup-dpModal {
                min-width: 600px;
            }
        }

        .dp-popup-dpModal img {
            vertical-align: middle;
            max-width: 100%;
        }

        .dp-popup-dpModal img.single {
            margin-right: 20px;
            margin-left: 0px;
            display: inline-block;
            padding-right: 20px;
            max-width: 100%;
            height: auto;
            margin: 0 auto;
        }

        #upsell-minimized-button {
            background-color: #44c767;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            -moz-border-top-left-radius: 8px;
            -moz-border-top-right-radius: 8px;
            -webkit-border-top-left-radius: 8px;
            -webkit-border-top-right-radius: 8px;
            /*border:1px solid #18ab29;*/
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            /*font-family:Arial;*/
            padding: 10px 16px;
            text-decoration: none;
            background: #44c767;
            color: #ffffff;
            font-size: 16px;
            -webkit-transform: rotate(90deg);
            -webkit-transform-origin: left bottom;
            -moz-transform: rotate(90deg);
            -moz-transform-origin: left bottom;
            -ms-transform: rotate(90deg);
            -ms-transform-origin: left bottom;
            -o-transform: rotate(90deg);
            -o-transform-origin: left bottom;
            transform: rotate(90deg);
            left: 0px;
            top: 100px;
            transform-origin: left bottom;
            white-space: nowrap;
            position: fixed;
        }

        #upsell-minimized-button:hover {
            /*background-color:#5cbf2a;*/
        }

        .dp-popup-dpModal a.close-dpModal {
            position: absolute;
            top: -12.5px;
            right: -12.5px;
            display: block;
            width: 30px;
            height: 30px;
            text-indent: -9999px;
            background: url(&#x27;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAANjr9RwUqgAAACBjSFJNAABtmAAAc44AAPJxAACDbAAAg7sAANTIAAAx7AAAGbyeiMU/AAAG7ElEQVR42mJkwA8YoZjBwcGB6fPnz4w/fvxg/PnzJ2N6ejoLFxcX47Rp036B5Dk4OP7z8vL+P3DgwD+o3v9QjBUABBALHguZoJhZXV2dVUNDgxNIcwEtZnn27Nl/ZmZmQRYWFmag5c90dHQY5OXl/z98+PDn1atXv79+/foPUN9fIP4HxRgOAAggRhyWMoOwqKgoq6GhIZe3t7eYrq6uHBDb8/Pz27Gysloga/jz588FYGicPn/+/OapU6deOnXq1GdgqPwCOuA31AF/0S0HCCB0xAQNBU4FBQWB0NBQublz59oADV37Hw28ePHi74MHD/6ii3/8+HEFMGQUgQ6WEhQU5AeZBTWTCdkigABC9ylIAZeMjIxQTEyMysaNG/3+/v37AGTgr1+//s2cOfOXm5vbN6Caz8jY1NT0a29v76/v37//g6q9sHfv3khjY2M5YAgJgsyEmg0PYYAAQreUk4+PT8jd3V1l1apVgUAzfoIM2rlz5x9gHH5BtxAdA9PB1zNnzvyB+R6oLxoopgC1nBPZcoAAgiFQnLIDMb+enp5iV1eXBzDeHoI0z58//xcwIX0mZCkMg9S2trb+hFk+ffr0QCkpKVmQ2VA7QHYxAgQQzLesQMwjIiIilZWVZfPu3bstMJ+SYikyBmUzkBnA9HEMyNcCYgmQHVC7mAACCJagOEBBbGdnp7lgwYJEkIavX7/+BcY1SvAaGRl9tba2xohjMTGxL8nJyT+AWQsuxsbG9vnp06e/QWYdPHiwHmiWKlBcCGQXyNcAAQSzmBuoSQqYim3u37+/EKR48uTJv5ANB+bVr7Dga2xs/AkTV1JS+gq0AJyoQIkPWU9aWtoPkPibN2/2A/l6QCwJ9TULQADB4hcY//xKXl5eHt++fbsAUmxhYYHiM1DiAsr9R7ZcVVUVbikIdHd3/0TWIyws/AWYVsByAgICdkAxRSAWAGI2gACClV7C4uLiOv7+/lEgRZ8+ffqLLd6ABck3ZMuB6uCWrlu37je29HDx4kVwQisvL88FFqkaQDERUHADBBAomBl5eHiYgQmLE1hSgQQZgIUD1lJm69atf4HR8R1YKoH5QIPAWWP9+vV/gOI/gHkeQw+wGAXTwAJJ5t+/f/BUDRBA4NIEKMDMyMjICtQIiniG379/4yza7t69+//Lly8oDrty5co/bJaCAEwcZCkwwTJDLWYCCCCwxcDgY3z16hXDnTt3voP4EhISWA0BFgZMwNqHExh3jMiG1tbWsgHjnA2bHmAeBtdWwOL1MycnJ7wAAQggBmi+kgIW/OaKiorJwOLuFShO0LMSMPF9AUYBSpz6+vqixHlOTs4P9MIEWHaDsxSwYMoE2mEGFJcG5SKAAGJCqjv/AbPUn8ePH98ACQQHB6NUmZqamkzABIgSp5s3bwbHORCA1QDLAWZkPc7OzszA8oHl5cuXVy5duvQBGIXwWgoggGA+FgO6xkBNTS28r69vDrT2+Y1cIMDyJchX6KkXVEmAshd6KB06dAic94EO3AzkBwGxPhCLg8ptgACCZyeQp9jZ2b2AmsuAefM8tnxJCk5ISPgOLTKfAdNEOVDMA2QHLDsBBBC8AAFlbmCLwlZISCg5JSVlJizeQAaQaimoWAUFK0g/sGGwHiiWCMS2yAUIQAAxI7c4gEmeFZi4OJ48ecLMzc39CRiEmgEBASxA/QzA8vYvAxEgNjaWZc2aNezAsprp2LFjp4FpZRdQ+AkQvwLij0AMSoC/AQIIXklAC3AVUBoBxmE8sPXQAiyvN8J8fuPGjR/h4eHf0eMdhkENhOPHj8OT+NGjR88BxZuBOA5kJtRseCUBEECMSI0AdmgBDooDaaDl8sASTSkyMlKzpqZGU1paGlS7MABLrX83b978A6zwwakTmE0YgIkSnHpBfGCV+gxYh98qKSk5CeTeAxVeQPwUiN8AMSjxgdLNX4AAYkRqCLBAXcMHtVwSaLkMMMHJAvOq9IQJE9R8fHxElJWV1bEF8aNHj+7t27fvLTDlXwXGLyhoH0OD+DnU0k/QYAa1QP8BBBAjWsuSFWo5LzRYxKFYAljqiAHzqxCwIBEwMTERBdZeoOYMA7Bl+RFYEbwB5oS3IA9D4/IFEL+E4nfQ6IDFLTgvAwQQI5ZmLRtSsINSuyA0uwlBUyQPMPWD20/AKo8ByP4DTJTfgRgUjB+gFoEc8R6amGDB+wu5mQsQQIxYmrdMUJ+zQTM6NzQEeKGO4UJqOzFADQMZ/A1qCSzBfQXi71ALfyM17sEAIIAY8fQiWKAYFgIwzIbWTv4HjbdfUAf8RPLhH1icojfoAQKIEU8bG9kRyF0aRiz6YP0k5C4LsmUY9TtAADEyEA+IVfufGEUAAQYABejinPr4dLEAAAAASUVORK5CYII=&#x27;) no-repeat 0 0;
        }

        .dp-popup .just-added {
            width: 100%;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }

        .dp-popup .multiple-products-true div {
            display: block;
            float: left;
        }

        .dp-popup .product-container.discount-applies-true {
            display: flex;
            flex-wrap: wrap;
        }

        .dp-popup .multiple-products-false div {
            display: block;
        }

        .dp-popup .multiple-products-false div.product-container {
            max-width: 350px;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            flex-direction: column;
        }

        .dp-popup .multiple-products-false .image {
            flex: 1;
            min-height: 150px;
        }

        .dp-popup .multiple-products-true .image {
            width: 100px;
        }

        .dp-popup .multiple-products-false .image img {
            max-width: 150px;
            max-height: 150px;
        }

        .dp-popup .multiple-products-true .image img {
            max-width: 100px;
            max-height: 100px;
        }

        .dp-popup .multiple-products-false .details {
            flex: 1 0 0;
            text-align: center;
            font-size: 14px;
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 20px;
        }

        .dp-popup .multiple-products-true .details {
            flex: 1;
            text-align: left;
            font-size: 14px;
            padding-left: 15px;
            padding-right: 15px;
            max-width: 320px;
        }

        .dp-popup .multiple-products-false .actions {
            flex: 1;
            text-align: center;
            padding-top: 20px;
        }

        .dp-popup .multiple-products-true .actions {
            vertical-align: middle;
            max-width: 116px;
            width: 100%;
            float: right
        }

        @media (min-width: 651px) {

            .dp-popup .multiple-products-true .actions button.add-upsells,
            .dp-popup .multiple-products-true .actions select.ba-variants {
                min-width: 116px;
                max-width: 116px;
            }
        }

        .dp-popup .other-upsells {
            width: 100%;
        }

        .dp-popup .product-container {
            width: 100%;
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .dp-popup .product-container:not(first) {
            border-top: 1px #eee solid;
        }

        .dp-popup .product-container select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-position: right center;
            background-image: url(images/ico-select.svg);
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: auto;
            padding-right: 28px;
            text-indent: 0.01px;
            width: 100%;
            margin-bottom: 10px;
            font-size: 12px;
            display: block;
            padding-left: 10px;
        }

        .dp-popup .product-container .variant-wrapper {
            float: none;
        }

        .dp-popup .no-thanks {
            text-align: center;
            width: 100%;
        }

        .dp-popup-dpModal .ba-image {
            width: 100%;
        }

        .dp-popup-dpModal .upsell-total {
            width: 100%;
            padding-top: 10px;
        }

        .dp-popup-dpModal button.add-upsells {
            color: #ffffff;
            font-size: 100%;
            font-size: 14px;

            background-color: #a1c65b;
            display: inline-block;
            padding: 8px 12px;
            margin-bottom: 0;
            line-height: 1.42857143;
            text-align: center;
            vertical-align: middle;
            letter-spacing: 1px;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 3px;
            font-weight: 500;
            width: 100%;
            box-shadow: none;
        }

        .ba-price .ba-regular {
            width: 100%;
        }

        .product-price .ba-sale {
            display: block;
            width: 100%;
        }

        .dp-popup-dpModal .product-price {
            padding-top: 10px;
            font-weight: bold;
        }

        .dp-popup-dpModal #one-product .product-price {
            font-size: 22px;
        }

        .dp-popup-dpModal .multiple-products-true .product-price {
            font-size: 16px;
        }

        .dp-popup-dpModal #one-product .product-price s {
            vertical-align: middle;
            font-size: 16px;
        }

        .dp-popup-dpModal .product-price .ba-sale s {
            font-weight: normal;
            color: #000;
            opacity: 1;
            padding-left: 5px;
            font-size: 13px;
            font-size: 100%;
        }

        .discount-applies-false .product-price .ba-sale,
        .discount-applies- .product-price .ba-sale {
            color: #000;
        }

        .discount-applies-true .ba-price .ba-sale {

            text-decoration: line-through;

            width: 100%;
        }

        .discount-applies-true .product-price .ba-sale {
            display: block;
            width: 100%;
            color: #8C0000;
        }

        #dpModal-container .product-title {
            font-weight: 400;
            width: 100%;
        }





        .dp-popup-dpModal .upsell-title {
            font-family: inherit;
            font-weight: normal;
            line-height: 1.1;
            color: inherit;
            font-size: 18px;
            margin-top: 10px;
            margin-bottom: 20px;
            font-weight: 500;
            text-align: center;
        }

        @media (max-width: 650px) {
            .dp-popup .multiple-products-true .details {
                flex: 1;
                padding-left: 20px;
            }

            .dp-popup .multiple-products-true .actions {
                max-width: inherit;
                width: 100%;
                padding-top: 15px;
            }

            .dp-popup .product-container {
                padding-bottom: 20px;
                padding-top: 20px;
            }
        }

        .ba-bundle-wrapper .booster-variants-container select.ba-variants {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-position: right center;
            background-image: url(images/ico-select.svg);
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: auto;
            padding-right: 28px;
            text-indent: 0.01px;
            width: 100%;
            margin-bottom: 10px;
            font-size: 12px;
            display: block;
            padding-left: 10px;
        }

        .ba-bundle-wrapper .ba-product-bundle button.add-booster-bundle {
            cursor: pointer;
            background-color: #a1c65b;
            background-image: none;
            color: #fff;
            margin: -10px 0 -10px;
            width: 100%;
            border: none;
            text-decoration: none;
            font-size: 13px;
            font-family: inherit;
            text-transform: uppercase;
            font-weight: 500;
            padding: 10px;
        }

        .ba-product-bundle .bundle-total button span {
            font-size: 13px;
        }





        table.ba-discount-table {
            min-width: 0%;
        }


        table.ba-discount-table tr th:first-child {
            flex: 1;
        }

        table.ba-discount-table tr th:nth-child(2) {
            flex: 2;
        }

        table.ba-discount-table tr td:first-child {
            flex: 1;
        }

        table.ba-discount-table tr td:nth-child(2) {
            flex: 2;
        }

        table.ba-discount-table thead {
            display: table-header-group;
            vertical-align: middle;
        }

        #dpModal-container .no_touch {
            cursor: default;
            pointer-events: none;
        }

        #dpModal-container .no_touch:hover {
            opacity: 1;
        }

        .dp-popup-dpModal .upsell-title,
        .dp-popup-dpModal .product-title,
        .dp-popup-dpModal .product-price .ba-sale,
        .dp-popup-dpModal div.no-thanks a {}

        .ba-product-bundle .bundle-name {}

        .ba-product-bundle .ba-price {}

        .ba-bundle-wrapper .booster-variants-container select.ba-variants {}

        .ba-bundle-wrapper {}



        #booster-discount-item:empty,
        #booster-summary-item:empty {
            display: none;
        }

        .ba_show_animation {
            visibility: visible;
            opacity: 1;
        }

        .ba_default_animation {
            visibility: hidden;
        }

        div.ba_show_animation.ba_default_animation {
            visibility: visible;
        }

        .ba_fade_and_scale_effect {
            -webkit-transform: scale(0.7);
            -moz-transform: scale(0.7);
            -ms-transform: scale(0.7);
            transform: scale(0.7);
            opacity: 0;
            -webkit-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .ba_show_animation.ba_fade_and_scale_effect {
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            opacity: 1;
        }

        .ba_slide_from_the_right {
            -webkit-transform: translateX(20%);
            -moz-transform: translateX(20%);
            -ms-transform: translateX(20%);
            transform: translateX(20%);
            opacity: 0;
            -webkit-transition: all 0.3s cubic-bezier(0.25, 0.5, 0.5, 0.9);
            -moz-transition: all 0.3s cubic-bezier(0.25, 0.5, 0.5, 0.9);
            transition: all 0.3s cubic-bezier(0.25, 0.5, 0.5, 0.9);
        }

        .ba_show_animation.ba_slide_from_the_right {
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }


        .ba_slide_from_the_left {
            -webkit-transform: translateX(-20%);
            -moz-transform: translateX(-20%);
            -ms-transform: translateX(-20%);
            transform: translateX(-20%);
            opacity: 0;
            -webkit-transition: all 0.3s cubic-bezier(0.25, 0.5, 0.5, 0.9);
            -moz-transition: all 0.3s cubic-bezier(0.25, 0.5, 0.5, 0.9);
            transition: all 0.3s cubic-bezier(0.25, 0.5, 0.5, 0.9);
        }

        .ba_show_animation.ba_slide_from_the_left {
            -webkit-transform: translateX(0);
            -moz-transform: translateX(0);
            -ms-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }

        .ba_slide_from_the_bottom {
            -webkit-transform: translateY(20%);
            -moz-transform: translateY(20%);
            -ms-transform: translateY(20%);
            transform: translateY(20%);
            opacity: 0;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }

        .ba_show_animation.ba_slide_from_the_bottom {
            -webkit-transform: translateY(0);
            -moz-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
            opacity: 1;
        }

        .ba_fall_effect {
            -o-transform: perspective(1300px) translateZ(600px) rotateX(30deg);
            -ms-transform: perspective(1300px) translateZ(600px) rotateX(30deg);
            -moz-transform: perspective(1300px) translateZ(600px) rotateX(30deg);
            -webkit-transform: perspective(300px) translateZ(600px) rotateX(30deg);
            transform: perspective(1300px) translateZ(600px) rotateX(30deg);
            opacity: 0;
        }

        .ba_show_animation.ba_fall_effect {
            -webkit-transition: all 0.3s ease-in;
            -moz-transition: all 0.3s ease-in;
            transition: all 0.3s ease-in;
            -webkit-transform: translateZ(0px) rotateX(0deg);
            -moz-transform: translateZ(0px) rotateX(0deg);
            -ms-transform: translateZ(0px) rotateX(0deg);
            transform: translateZ(0px) rotateX(0deg);
            opacity: 1;
        }

        div.dp-popup.is_funnel_true span.ba-sale s {
            text-decoration: none !important;
        }
    </style>
</body>
</html> 