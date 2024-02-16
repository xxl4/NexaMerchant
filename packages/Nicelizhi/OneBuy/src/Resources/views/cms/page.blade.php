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


<link rel="stylesheet" href="https://lander.heomai.com/template-common/checkout1/css/font-awesome.min.css">

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

</head>
<body>
<div class="smb-body">
    <section>
        <h2><?php echo $page->meta_title;?></h2>
        <?php echo $page->html_content;?>
    </div>
    </section>
</div></div>
</body>