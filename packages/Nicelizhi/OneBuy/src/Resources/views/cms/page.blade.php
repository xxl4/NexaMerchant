<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}" class="has-reviews has-faq">

<head>
    <title><?php echo $page->meta_title; ?></title>
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




    <style>
        body {
            font-family: arial, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            line-height: 1.4;
            margin: 1rem;
            font-size: 14px;
            color: #555555;
        }

        table {
            border-collapse: collapse
        }

        table:not([cellpadding]) td,
        table:not([cellpadding]) th {
            padding: .4rem
        }

        table[border]:not([border="0"]):not([style*=border-width]) td,
        table[border]:not([border="0"]):not([style*=border-width]) th {
            border-width: 1px
        }

        table[border]:not([border="0"]):not([style*=border-style]) td,
        table[border]:not([border="0"]):not([style*=border-style]) th {
            border-style: solid
        }

        table[border]:not([border="0"]):not([style*=border-color]) td,
        table[border]:not([border="0"]):not([style*=border-color]) th {
            border-color: #ccc
        }

        figure {
            display: table;
            margin: 1rem auto
        }

        figure figcaption {
            color: #999;
            display: block;
            margin-top: .25rem;
            text-align: center
        }

        hr {
            border-color: #ccc;
            border-style: solid;
            border-width: 1px 0 0 0
        }

        code {
            background-color: #e8e8e8;
            border-radius: 3px;
            padding: .1rem .2rem
        }

        .mce-content-body:not([dir=rtl]) blockquote {
            border-left: 2px solid #ccc;
            margin-left: 1.5rem;
            padding-left: 1rem
        }

        .mce-content-body[dir=rtl] blockquote {
            border-right: 2px solid #ccc;
            margin-right: 1.5rem;
            padding-right: 1rem;
        }
    </style>

</head>

<body>
    <div class="" style="max-width: 800px;margin:0 auto;">
        <section>
            <h2><?php echo $page->meta_title; ?></h2>
            <?php echo $page->html_content; ?>
        </section>
    </div>
</body>