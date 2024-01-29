<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}" class="has-reviews has-faq">
    <head>
        <title><?php echo $page->meta_title;?></title>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
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
  fbq('init', '844340774106979');
  fbq('track', 'PageView');
  fbq('track', 'ViewContent');
</script>
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
    <section>
        <div class="smb-content" style="padding:10px; padding-left:40px;padding-right:40px;">
        <h2><img src="/storage/configuration/kXMSPSveA3eaK1w2RbcdiiIAv6OPs5UJRiaqANId.png" style="height:80px;" /><?php echo $page->meta_title;?></h2>
        <?php echo $page->html_content;?>
    </div>
    </section>
@include('onebuy::footer-container')
</div></div>
</body>