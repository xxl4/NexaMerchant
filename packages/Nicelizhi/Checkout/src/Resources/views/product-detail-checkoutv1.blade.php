@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    $productBaseImage = product_image()->getProductBaseImage($product);
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}" class="has-reviews has-faq">
<head>

<style type="text/css">

.modal.fade.attentionMdl .modal-body {
    text-align: center;
    padding: 20px !important;
    border-top: 10px solid red;
}
.modal.fade.attentionMdl .modal-body h3 {
    font-size: 24px;
    color: red;
    font-weight: 600;
}
p.cmpny-name {
    color: #646464;
    font-size: 15px;
}
.attentionMdl button.closebtn-info {
    background: #fe1103;
    font-size: 18px;
    max-width: 200px;
    width: 50%;
    padding: 10px 0;
    margin: 0 auto;
    border-radius: 10px;
    position: static;
}

</style>

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


<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
 
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="HandheldFriendly" content="true"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>

<link rel="stylesheet" href="/checkout/v1/assets/css/app.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/checkout/v1/app/desktop/css/main.css?v=1704676786">
    <!-- <link rel="stylesheet" type="text/css" href="/checkout/v1/app/desktop/css/spreedly.css"> -->
    <style>
        .offer .offer-content {
            justify-content: flex-start;
        }

        .offer-footer-features ul li {
            list-style: disc !important;
        }

        .checkout_express-buttons button img {
            height: revert-layer;
        }

        .form-cc-card.crd_number .input-group-text {
            position: absolute;
            height: 100%;
            left: 0;
            border-radius: 3.75px;
        }

        .form-cc-card.crd_number .input-group-text {
            position: absolute;
            height: calc(100% - 1px);
            left: 0px;
            border-radius: 3.75px !important;
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            top: 0;
        }

        .form-cc-card.crd_number .spf-field-group {
            padding-left: 36px !important;
        }

        .form-cc-cvv.input-group .input-group-text {
            position: absolute;
            height: calc(100% - 1px);
            width: 39.6px !important;
            right: 0;
            top: 0;
        }

        .form-cc-cvv.input-group .spf-field-group {
            padding-right: 38px !important;
            border-radius: 0.375px !important;
        }

        .form-cc-card.crd_number .input-group-text.input-group-text-right {
            right: 0;
            width: 39.6px;
            left: auto !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: 0.375px !important;
            border-bottom-right-radius: 0.375px !important;
        }

        .form-cc-cvv.input-group .input-group-text:hover{
            background-color:#e9ecef !important;
        }

        #block--faq h2 button:hover{
            background-color:transparent !important;
        }

        #exitModal .exit-modal-close, #sizeChartModal .sizeChart-modal-close {
            padding: 0;
            line-height: 1;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            background-color: transparent;
            position: absolute;
            z-index: 999;
            right: 10px;
            top: 10px;
        }

        #exitModal .exit-modal-close span, #sizeChartModal .sizeChart-modal-close span {
            margin-top: -5px;
            font-size: 30px;
        }

        #sizeChartModal .sizeChart-modal-close span {
            color: #000;
        }

        .w_fomo_wrapper .w_desc > div{
          justify-content: flex-start;
        }
        span.flag {
            padding-left: 10px;
        }

        div#cvvModal .close {
            background: transparent;
            color: #333;
            font-size: 20px;
            font-weight: bold !important;
            position: relative;
            width: 20px;
            height: 20px;
            float: right;
            top: -5px;
            padding: 0;
        }
        .offer .bg-tertiary {
            background: #469eb3 !important;
            color: #fff !important;
        }
        .checkout_express-buttons button img {
            height: 40px !important;
        }
        @media screen and (orientation:landscape) and (max-device-width: 991px){
            #cvvModal img {
                max-width: 300px;
                margin: 0 auto;
                display: block;
            }
        }
        @media (min-width: 767.5px) and (max-width: 991.5px){
            div#cvvModal .close {
                top: -11px;
                padding: 0;
            }
        }

        .size_selection span{
            font-size:12px;
        }
            .size_selection {
            width:200px;
        } 

        @media (max-width:1919px) {

        }

        @media (max-width:1023px) {
            .modal-dialog {
                max-width: 800px; /* New width for default modal */
            }

            /* .size_selection .select_size_1 {
                width:100px;
                max-width:100px;
            }
            .size_selection .select_size_2 {
                width:80px;
                max-width:80px;
            }
            .size_selection .select_size_3 {
                width:65px;
                max-width:65px;
            }
            .size_selection span {
                width: 80px;
                display: block;
                font-size: 12px;
                font-weight: bold;
            } */
            .size_selection span{
                font-size:12px;
            }
             .size_selection {
                width:200px;
            } 
        }

        @media (max-width:767px) {
            .modal-dialog {
                max-width: 600px; /* New width for default modal */
            }

            /* .size_selection .select_size_1 {
                width:65px;
                max-width:65px;
            }
            .size_selection .select_size_2 {
                width:60px;
                max-width:60px;
            }
            .size_selection .select_size_3 {
                width:55px;
                max-width:55px;
            }
            .size_selection span {
                width: 80px;
                display: block;
                font-size: 12px;
                font-weight: bold;
            } */

            .size_selection span{
                font-size:12px;
            }
             .size_selection {
                width:140px;
            } 

        }
    </style> 
</head>

<body class="bg-checkout">
    <div class="bg-info flagbar">
        <div class="">
            <div class="row justify-content-center align-items-center g-0">
                <div class="col text-center text-white p-2 discount-span-text">
                   <marquee width="100%" direction="left">
<span class="">
                        <img width="40px" src="/checkout/v1/app/desktop/images/us-flag.png" alt="flag" class="img-fluid" >
                    </span>
                    <span class="text-secondary fw-bold" id="changeText" style="padding-left:10px">Limited Time Offer - Secure Payment - Fast Shipping - Hassle-Free Returns</span>
                    <span class="flag"><img width="40px" src="/checkout/v1/app/desktop/images/us-flag.png" alt="flag" class="img-fluid"></span>
</marquee> 
                </div>

            </div>

        </div>

    </div>

    <div class="topbar py-3">

        <div class="container">

            <div class="row justify-content-between align-items-center">

                <div class="col-md-3 d-flex justify-content-center justify-content-md-start align-items-center pb-2 pb-md-0">

                    <div class="logo">

                        <img src="/checkout/v1/app/desktop/images/logo-f02a1643.svg" alt="" class="img-fluid">

                    </div>

                    <!-- <div class="ms-3 ps-3 text-start d-none d-md-block secure-checkout">

                        <span class="topbar-secure"></span><br>

                        <span class="topbar-checkout"></span><br>

                    </div> -->

                </div>

                <div class="col-md-9 d-flex justify-content-center justify-content-md-end align-items-center" style="font-family: oswald;">

                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item is-current"><span>Select Item</span></li>

                            <li class="breadcrumb-item">Personal Information</li>

                            <li class="breadcrumb-item">Select Checkout</li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>

    </div>

    <section id="block--hero" class="hero">

        <div class="container">

            <div class="row py-5 ">

                <div class="col fs-3 text-center">

                    HERO SECTION <br><span class="fs-7">(VISIBLE IF <span class="text-info">".has-hero"</span> CLASS ADDED TO HTML TAG)</span>

                </div>

            </div>

        </div>

    </section>

    <section id="block--timer">

        <div class="container">

            <div class="row justify-content-center py-5">

                <div class="col text-center">

                    <div class="timer">

                        timer placement <span class="text-danger fw-bold">00:00</span> <br> <span class="fs-7">(VISIBLE IF <span class="text-info">".has-timer"</span> CLASS ADDED TO HTML TAG)</span>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="notification my-3">

        <div class="container">

            <div class="row py-3">

                <div class="col 50-per-coupon-div">

                    <div class="alert alert-success alert-dismissible fade show fs-5 text-center d-flex align-items-center justify-content-center" role="alert" style="font-family: oswald;">

                        <i class="far fa-check-circle fa-2x me-3 text-success"></i> <span>Your <span class="text-danger pack-percent"><strong>55%</strong></span> Discount Has Been Applied!</span>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>

                </div>



                <div class="col-12 10-per-coupon-div" style="display:none;">

                    <div class="alert alert-info alert-dismissible fade show fs-5 text-center d-flex align-items-center justify-content-center" role="alert">

                      <i class="far fa-check-circle fa-2x me-3 text-info"></i> <span>An additonal <span class="text-danger"><strong>5%</strong></span> Discount Has Been Applied!</span>

                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>

                </div>



            </div>

        </div>

    </section>

    <section class="main">

        <div class="container">

            <div class="row justify-content-center">

                <div id="block--offers" class="col-12 col-lg-7">

                    <div class="step-title">

                        STEP 1: SELECT ITEM & SIZE

                    </div>

                    <hr class="mt-2">


                    <div class="offers">
                        <div class="recomended_seal_area">
                            <img class="deskk" src="/checkout/v1/app/desktop/images/rec_Desk.png" alt="recommended-deal">
                            <img class="mbll" src="/checkout/v1/app/desktop/images/rec_Mob.png" alt="recommended-deal">
                        </div>
                        <?php foreach($package_products as $key=>$package_product) { 
                            
                            //var_dump($package_product);    exit;
                        ?>
                        <div class="offer selectedhh selected" data-pid="<?php echo $package_product['id'];?>">

                            <div class="offer-header d-flex justify-content-between align-items-center">

                                <div class="offer-title d-flex align-items-center">

                                    <span class="offer-title-text ps-3 text-nowrap">Buy <?php echo $package_product['id'];?></span>

                                    <div class="offer-badges">

                                        <span class="badge bg-danger">Save <span class="buy_<?php echo $package_product['id'];?>_save_percentage"><?php echo $package_product['tip1'];?></span></span>
                                        <span class="badge bg-tertiary text-dark">Limited-Time Offer</span>

                                    </div>

                                </div>

                                <?php if($package_product['shipping_fee']=='0.00') { ?>
                                <div class="offer-freeship px-3 py-3 text-nowrap">

                                    <i class="fas fa-truck me-1"></i>

                                    FREE SHIPPING

                                </div>
                                <?php }else {?>
                                <div class="offer-freeship px-3 py-3 text-nowrap">

                                    <i class="fas fa-truck me-1"></i>

                                   $<?php echo $package_product['shipping_fee'];?> SHIPPING

                                </div>
                                <?php } ?>

                            </div>
                            <style>
                               
                            </style>

                            <div class="offer-content d-flex align-items-center py-2">

                                <div class="offer-content-img ms-5">

                                    <img src="/checkout/v1/app/desktop/images/<?php echo $product['id'];?>.png" alt="" class="img-fluid pic_big_show">
                                   
                                </div>

                                <div class="offer-content-info pe-2 ms-2 ms-md-3">

                                        <div class="justify-content-center align-items-center size_selection pe-10 ms-10 md-12 <?php if($package_product['id']==3) { echo "size_selection_three"; ?><?php }elseif($package_product['id']==1){ echo "size_selection_single";}elseif($package_product['id']==2){echo "size_selection_two";}?>">
                                                
                                                <?php for($i=1;$i<=$package_product['id'];$i++) { ?>
                                                    <div class="attribute_select">
                                                        <span>Item<?php echo $i;?>:</span>
                                                    <select name="color_<?php echo $package_product['id'];?>_<?php echo $i;?>" id="color_<?php echo $package_product['id'];?>_<?php echo $i;?>" class="color_filter select_size_<?php echo $package_product['id'];?>" onchange="attributeChange(this, '<?php echo $package_product['id'];?>' ,'<?php echo $package_product['id'];?>_<?php echo $i;?>')">
                                                        <option value="" data-bundle="<?php echo $package_product['id'];?>">Color</option>
                                                        <?php foreach($attributes['attributes'] as $key=>$attribute) {
                                                            if($key!=0) continue;
                                                        ?>
                                                            <?php foreach($attribute['options'] as $kk => $option) { ?>
                                                                <option value="<?php echo $option['label']?>" data-camp="<?php echo $option['id']?>" data-bundle="<?php echo $package_product['id'];?>"><?php echo $option['label']?></option>
                                                            <?php } ?>
                                                        <?php } ?>

                                                    </select>
                                                    <select name="size_<?php echo $package_product['id'];?>_<?php echo $i;?>" id="size_<?php echo $package_product['id'];?>_<?php echo $i;?>" class="size_filter select_size_<?php echo $package_product['id'];?>">
                                                        <option value="" data-bundle="<?php echo $package_product['id'];?>">Size</option>
                                                    </select>
                                                    </div>
                                                <?php } ?>
                                               
                                        </div>

                                    <!-- <div class="offer-content-info-text">
                                        <div class="offer-content-title">Big Savings <span class="badge bg-danger ms-sm-2 exit-pop-10-badge" style="display:none;">Extra 5% OFF</span></div>

                                        <div class="offer-content-subtitle"><?php echo $package_product['name'];?> </div>

                                        <div class="fs-9">Same as</div>

                                        <div class="offer-content-price-each">

                                            <span class="buy_3_per_price"><?php echo $package_product['tip2'];?> </span>

                                            <span class="fs-8 fw-light">/each</span>

                                        </div>

                                        <div class="offer-content-price-orig text-secondary fs-8">

                                            <s> Orig

                                                $<span class="buy_<?php echo $package_product['id'];?>_orig_per_price"><?php echo $package_product['srouce_price'];?></span>

                                                <span class="fs-9 fw-light">/each</span></s>

                                        </div>

                                        <div class="offer-content-price-total fs-8">

                                            Total:

                                            $<span class="buy_3_total_price"><?php echo $package_product['amount']; ?></span>

                                        </div>
                                    </div> -->
                                    <div class="offer-content-info-btn d-block d-sm-none">
                                        <button class="badge bg-primary text-white mb-3 size_chart_btn p-2" data-bs-toggle="modal" data-bs-target="#sizeChartModal">Size Chart <i class="fa-solid fa-ruler-combined"></i></button>
                                    </div>

                                </div>

                                <div class="offer-content-btn text-end pe-2 pb-3 align-self-end d-none d-sm-block d-lg-none d-xl-block">

                                    <button class="badge bg-primary text-white mb-3 size_chart_btn p-2" data-bs-toggle="modal" data-bs-target="#sizeChartModal">Size Chart <i class="fa-solid fa-ruler-combined"></i></button>

                                    <div class="d-grid ps-4">

                                        <a class="btn btn-select">

                                        </a>

                                    </div>

                                </div>
                            </div>
                            

                            <div class="offer-footer">

                                <div class="offer-footer-status d-flex justify-content-around align-items-center p-2 fs-8">
                                    <div><strong><?php echo $package_product['name'];?></strong></div>
                                    <div><span class="text-danger"><?php echo $package_product['tip2'];?> </span><span class="fs-8 fw-light">/each</span></div>
                                    <div>Orig:$<span class=""><?php echo $package_product['srouce_price'];?>&nbsp;&nbsp;</span></div>
                                    <div class="text-danger">Total:$<span class="buy_3_total_price"><?php echo $package_product['amount']; ?></span></div>
                                </div>

                                <div class="offer-footer-features  px-3 py-2 m-1 fs-8">

                                    <ul>
                                        <?php foreach($product_ad_text as $key=>$ad_text) { ?>
                                        <li><?php echo $ad_text;?></li>
                                        <?php } ?>
                                    </ul>

                                </div>

                                <div class="offer-footer-status d-flex justify-content-around align-items-center p-2 fs-8">

                                    <div>Sellout Risk: <span class="text-danger">High</span></div>

                                    <div><span class="text-success fw-bold">Fast Shipping</span></div>

                                    <div><span class="text-danger fw-bold">Discount <span class="buy_<?php echo $package_product['id'];?>_save_percentage"><?php echo $package_product['tip1'];?></span></span></div>

                                </div>

                            </div>

                        </div>
                        <?php } ?>
                    </div>

                    <!-- AddOn Section Starts Here -->
                    <div class="down_bundle">
                        <div class="dwn_bundle">
                            <div class="cross-sells">
         
                                <div class="cross-sells__title pulse" style="font-family: oswald;">
                                    <img src="/checkout/v1/app/desktop/images/popular-fire-icon.png" alt="Fire Icon"> Order Summary <img src="/checkout/v1/app/desktop/images/popular-fire-icon.png" alt="Fire Icon">
                                </div>
        
                                
                               
                            </div>
                        </div>
                    </div>
                    <!-- AddOn Section Ends Here -->

                    <div class="offer-summary border border-secondary rounded mb-5">

                        <div class="row align-items-center p-2">

                            <div class="col-lg-6" style="text-align:center;">

                                <img src="/checkout/v1/app/desktop/images/<?php echo $product['id'];?>_order.jpg" alt="" class="img-fluid" >

                            </div>

                            <div class="col-lg-6">

                                <div class="order-summary rounded">

                                    <!-- <div class="order-summary-header d-flex justify-content-center align-items-center bg-dark text-white mb-0 py-1">
                                        <i class="fas fa-shopping-cart fa-inverse me-2"></i>
                                        <div class="order-summary-header-text">Order Summary</div>
                                    </div> -->

                                    <div class="order-summary-title d-flex justify-content-between pb-1 pt-2 border-bottom border-secondary">
                                        <div><strong>Item</strong></div>
                                        <div><strong>Price</strong></div>
                                    </div>

                                    <div class="order-summary-item justify-content-between pt-2 pb-1 d-flex">
                                        <div class="os_main_product_name">2x Hatmeo Heated Vest</div>
                                        <div class="os_main_product_each_price" style="font-weight:bold;">$ 59.99 <span class="fs-8">/ea</span></div>

                                    </div>

                                    <div class="order-summary-item justify-content-between pt-2 pb-1 d-flex os_extended_warranty_div">
                                        <div class="os_extended_warranty_product_name">2x Extended Warranty</div>
                                        <div class="os_extended_warranty_product_each_price" style="font-weight:bold;">$ 9.99 <span class="fs-8">/ea</span>
                                        </div> 
                                    </div>

                                    <!---- Add-ons start------>
                                  <div class="order-summary-item justify-content-between pt-2 pb-1 d-flex os_add-ons_div">
                                        <div class="os_add-ons_product_name"></div>
                                        <div class="os_add-ons_product_each_price" style="color:red;font-weight:bold;">$ 19.99 
                                        <!--<span class="fs-8">/ea</span>-->
                                        </div>
                                    </div>

                                    <div class="order-summary-item justify-content-between pt-2 pb-1 d-flex">
                                        <div>Subtotal:</div>
                                        <div class="os_subtotal_price" style="font-weight:bold;">$0.00</div>
                                    </div>

                                    <div class="order-summary-item justify-content-between pt-2 pb-1 d-flex">
                                        <div>Discount:</div>
                                        <div class="os_discount_price" style="color:red;font-weight:bold;">$0.00</div>
                                    </div>

                                    <div class="order-summary-item justify-content-between pt-2 pb-1 d-flex">
                                        <div>Shipping:</div>
                                        <div class="os_shipping_price">$0.00</div>
                                    </div>

                                    <div class="order-summary-item justify-content-between pt-2 pb-1 d-flex">
                                        <div>Shipping Method:</div>
                                        <div class="os_shipping_method">USPS Express</div>
                                    </div>

                                    <div class="order-summary-total d-flex justify-content-between pt-1 border-top border-secondary">
                                        <div><strong>Today's Total:</strong></div>
                                        <div><strong class="os_total_price" style="color:red;">$ 134.97</strong></div>
                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div id="block--payment_opt1" class="col-12 col-lg-5">

                    <form method="post" action="" name="downsell_form1" accept-charset="utf-8" enctype="application/x-www-form-urlencoded;charset=utf-8">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div id="main_campaign_div"></div>
                        <div id="extra-add-ons"></div>
                        <div id="protection_input"></div>
                        <input type="hidden" name="campaign_index" id="campaign_index" value="0">
                        <input type="hidden" name="json_hidden_input" id="json_hidden_input">
                        <!-- Note: Shipping to Alaska and Hawaii will be $20 as per client requirement -->
                        <input type="hidden" name="ship_price_extra_feature" value="0">

                        <!-- Price Instead of Coupon -->
                        <!--<input type="hidden" name="total_price" value="59.99" id="price_total">
                        <input type="hidden" name="total_price_campaign_id" value="2" id="total_price_campaign_id">-->
                        <!-- Price Instead of Coupon -->


                        <input type="hidden" name="currency" value="USD">

                        <!-- <input type="hidden" name="couponCode" value="" /> -->
                        <input type="hidden" name="shipping_price" id="shipping_price" value="0.0">
                        <input type="hidden" name="allow_shipping_price" value="true" />
                        <input type="hidden" name="language" value="en">
                        <input type="hidden" name="product_id" value="<?php echo $product['id'];?>" />
                        <input type="hidden" name="selected_package_id" value="<?php echo $product['id'];?>" />
                        <input type="hidden" name="coupon_applied" value="0">

                        <div id="payment-gateway-input-div">
                            <input type="hidden" name="payment_gateway_group" value="37">
                        </div>

                        <select name="creditCardType" class="required" style="display: none;" data-error-message="Please select valid card type!">
                           <option value="">Card Type</option>
                                                      <option value="paypal">Paypal</option>
                                                      <option value="airwallex">Airwallex</option>
                                                      <option value="paypal-standard">PayPal Standard</option>
                                                   </select>
                        
                        <div class="div-line"><span><i class="fas fa-lock me-2"></i></span><strong>Express Checkout</strong></div>
                        <div class="checkout_express-buttons">
                            <div class="d-grid mb-3">
                                <button type="button" class="btn btn-lg btn-express is-paypal pay-with-paypal zoom-fade"> <span class="fs-8 text-dark me-1">Pay with</span> <img src="/checkout/v1/app/desktop/images/paypal.svg" height="50px" alt=""></button>
                            </div>
                        </div>
                        

                        <div class="div-line"><span><i class="fas fa-lock me-2"></i></span><strong>OR Checkout WITH Credit Card</strong></div>

                        <div class="step-title">
                            STEP 2: CUSTOMER INFORMATION
                        </div>
                        <hr class="mt-2">

                        <div id="form-info" class="checkout_form checkout_form-info  p-2 p-lg-3 mb-3">

                            <div class="form-customer-ino">

                                <div class="row mb-3 g-2">

                                    <div class="col-sm col-lg-12 col-xl-6">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white "><i class="fas fa-user text-light"></i></span>

                                            <input type="text" name="firstName" maxlength="255" class="required form-control" id="first_name" placeholder="First Name" data-error-message="Please enter your first name!">

                                            <label for="first_name">First Name</label>

                                        </div>

                                    </div>

                                    <div class="col-sm col-lg-12 col-xl-6">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-user text-light"></i></span>

                                            <input type="text" name="lastName" maxlength="255" class="required form-control" id="last_name" placeholder="Last Name" data-error-message="Please enter your last name!">

                                            <label for="last_name">Last Name</label>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-envelope text-light"></i></span>

                                            <input type="email" placeholder="Email address" name="email" maxlength="254" class="required form-control" id="id_email" data-error-message="Please enter a valid email id!">

                                            <label for="id_email">Email</label>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-phone text-light"></i></span>

                                            <input type="tel" name="phone" placeholder="Phone number" class="required form-control " maxlength="10" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" data-validate="phone" aria-required="true" data-error-message="Please enter a valid phone number!" id="id_phone_number">

                                            <label for="id_phone_number">Phone</label>

                                        </div>

                                    </div>
                                        
                                    <div class="col-12">
                                        <div class="fs-7 text-center mb-2">
                                            <i class="fas fa-lock me-2"></i> We never share your information.
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="col-12">

                                        <div class="ex-protection">

                                            <div class="ex-protection-header py-3 d-flex justify-content-center align-items-center mb-1 ">

                                                <i class="fas fa-caret-right bounce-arrow me-1 text-danger"></i>

                                                <div class="form-check mb-0">

                                                    <input type="checkbox" class="form-check-input" id="extentded-protection" name="extended_protection">

                                                    <label class="form-check-label" for="extentded-protection">YES, I Want Extended Warranty</label>

                                                </div>

                                                <i class="fas fa-caret-left bounce-arrow-r ms-1 text-danger"></i>

                                            </div>

                                            <div class="ex-protection-content  px-3 pt-2 pb-3 fs-7">

                                                <strong>One Time Offer:</strong>  <span class="extended_protection_price">By placing your order today, you can have an extended warranty and replacement plan for only an additional $9.99 per unit. This means your two products are covered for 1 Year.</span>

                                            </div>

                                        </div>

                                    </div> -->
                                </div>

                            </div>


                            <div class="form-shipping-info">
                            <div class="form-title mb-3">Shipping Address</div>

                            <div class="form-shipping-address">

                                <div class="row mb-3 g-2">

                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-light"></i></span>

                                            <input type="text" placeholder="Address" name="shippingAddress1" maxlength="255" class="form-control required" id="id_line1" data-error-message="Please enter your address!">

                                            <label for="id_line1">Address</label>

                                        </div>

                                    </div>
                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-light"></i></span>

                                            <input type="text" placeholder="Suite/Apt/Other" name="shippingAddress2" maxlength="255" autocomplete="address-line2" class="form-control " aria-required="true" id="id_line2" data-error-message="Please enter your address 2!">

                                            <label for="id_line2">Suite/Apt/Other</label>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="far fa-building text-light"></i></span>

                                            <input type="text" name="shippingCity" maxlength="255" class="form-control required" id="id_line4" placeholder="City" data-error-message="Please enter your city!">

                                            <label for="id_line4">City</label>

                                        </div>

                                    </div>

                                    <div class="col-sm col-lg-12 col-xl-6">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-light"></i></span>

                                            <input type="text" name="shippingState" placeholder="Your State" class="form-select required" id="id_state"  data-error-message="Please select your state!" />


                                            <label for="id_state">State</label>

                                        </div>

                                    </div>

                                    <div class="col-sm col-lg-12 col-xl-6">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-light"></i></span>

                                            <input type="tel" pattern="[0-9]*" inputmode="numeric" placeholder="ZIP" name="shippingZip" maxlength="5" class="form-control required" id="id_postcode" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" data-error-message="Please enter a valid zip code!">

                                            <label for="id_postcode">ZIP</label>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-globe text-light"></i></span>
                                            <select name="shippingCountry" class="form-select required" data-selected="US" data-error-message="Please select your country!" id="id_country">
                                                <option value="">Select Country</option>
                                            </select>

                                            <label for="id_country">Country</label>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            </div>

                        </div>


                        <div class="step-title">
                            STEP 3: PAYMENT OPTION
                        </div>
    
                        <hr class="mt-2">
                        
                    <div class="div-line"><span><i class="fas fa-lock me-2"></i></span><strong>(1) PayPal Standard</strong></div>
                        
                    <div class="checkout_express-buttons">
                        <div class="d-grid mb-3">
                            <!-- <button type="button" class="btn btn-lg btn-express is-paypal pay-with-paypal-standard"> <span class="fs-8 text-dark me-1">Pay with</span> <img src="/checkout/v1/app/desktop/images/paypal.svg" height="50px" alt=""></button> -->
                            <a href="#" class="btn btn-lg pay-with-paypal-standard"><img src="/checkout/v1/app/desktop/images/paypal_standard.png" /></a>
                            <div class="col-12">
                                <div class="fs-9 text-center mb-2">
                                    <i class="fas fa-lock me-2"></i>
                            After clicking "Pay with PayPal", you will be redirected to PayPal to complete your purchase securely.
                                        </div>
                            </div>
                        </div>
                    </div>

                    <div class="div-line"><span><i class="fas fa-lock me-2"></i></span><strong>(2) Credit Card</strong></div>
                    
                    <div id="form-info" class="checkout_form checkout_form-info  p-2 p-lg-3">

                    
                    
                        <div class="form-check form-check-cc d-flex align-items-center" style="padding-left: 0;">
                            <label class="form-check-label pb-3 w-100 fs-6" for="id_use_new_card">
                                Credit/Debit: <img src="/checkout/v1/app/desktop/images/creditCard.svg" alt="" class="ms-1">
                            </label>
                        </div>

                        <div id="form-cc" class="form form-cc is-visible">

                            <div class="row g-2 mb-3" style="display: none;">
                                <div class="col-12 ">
                                    <label class="sr-only" for="id_card">Card Number</label>
                                    <div class="form-cc-card input-group">
                                        <input type="hidden" id="id_card" data-error-message="Please enter a valid credit card number!" />
                                        <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                                    </div>
                                </div>

                                <div class="col-sm col-lg-12 col-xl-6">
                                    <label class="sr-only" for="id_number">Card Expiry</label>
                                    <div class="form-floating">
                                        <input type="hidden" id="id_expiry" data-error-message="Please enter a valid credit expiry!"/>
                                        <label for="id_expiry">Expiry</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="sr-only" for="id_cvc">CVV</label>
                                    <div class="form-cc-cvv input-group">
                                        <input type="hidden" id="id_cvc" data-error-message="Please select a valid CVV Code!" />
                                        <button class="input-group-text"  data-bs-toggle="modal" data-bs-target="#cvvModal"><i class="fas fa-question-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row g-2 mb-3">

                            <!-- <label>
                            Card number
                            <div id="cardNumber"></div>
                            </label>
                            <label>
                            Expiry
                            <div id="cardExpiry"></div>
                            </label>
                            <label>
                            CVC
                            <div id="cardCvc"></div>
                            </label>
                            <br />        
                            -->

                            <!-- STEP #3a: Add empty containers for each card input element to be injected into -->
                            <div style={containerStyle}>
                                <div>Card number</div>
                                <div id="cardNumber" class="form-floating input-group has-icon-left" style="background: #FFF;
    border: 1px solid #a7abad;
    color: #222;
    height: 32px;
    line-height: 22px;
    width: 100%;
    font-size: 14px;
    padding: 3px 8px;
    outline: 0;
    font-family: Arial, sans-serif;
    font-weight: 400;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
    line-height: 1.25;padding: 1rem 0.75rem "></div>
                            </div>
                            <div style={containerStyle}>
                                <div>Expiry</div>
                                <div id="cardExpiry" style="background: #FFF;
    border: 1px solid #a7abad;
    color: #222;
    height: 32px;
    line-height: 22px;
    width: 100%;
    font-size: 14px;
    padding: 3px 8px;
    outline: 0;
    font-family: Arial, sans-serif;
    font-weight: 400;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
    line-height: 1.25;padding: 1rem 0.75rem "></div>
                            </div>
                            <div style={containerStyle}>
                                <div>Cvc</div>
                                <div id="cardCvc" style="background: #FFF;
    border: 1px solid #a7abad;
    color: #222;
    height: 32px;
    line-height: 22px;
    width: 100%;
    font-size: 14px;
    padding: 3px 8px;
    outline: 0;
    font-family: Arial, sans-serif;
    font-weight: 400;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
    line-height: 1.25;padding: 1rem 0.75rem "></div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="d-grid mb-4">
                                <button type="button" id="submit" class="btn btn-lg btn-primary btn-checkout pay-with-cc zoom-fade"><i class="fas fa-lock me-3"></i>Complete Purchase</button>
                            </div>
                        </div>
                        <div class="row ps-2 mb-0">
                            <div class="col">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input billing_toggle" id="id_same_as_shipping" name="billing_address_same_as_shipping" checked>

                                    <label class="form-check-label" for="id_same_as_shipping">Shipping address is the same as my billing address</label>
                                </div>
                            </div>
                        </div>
                        <span style="display: none;">
                            <input type="radio" name="billingSameAsShipping" value="yes" checked="checked" id="same_billing"> YES
                            <input type="radio" name="billingSameAsShipping" value="no" id="different_billing"> NO
                        </span>

                        <div id="form-billing" style="display: none;" class="mt-2"> 

                            <div class="form-title mb-3 ">Billing Address</div>

                            <div class="form-billing-address">

                                <div class="row mb-3 g-2">

                                    <div class="col-sm col-lg-12 col-xl-6">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-user text-light"></i></span>

                                            <input type="text" name="billingFirstName" maxlength="255" autocomplete="given-name" class="form-control " id="id_first_name_b" placeholder="First Name" data-error-message="Please enter your billing first name!">

                                            <label for="id_first_name_b">First Name</label>

                                        </div>

                                    </div>

                                    <div class="col-sm col-lg-12 col-xl-6">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-user text-light"></i></span>

                                            <input type="text" name="billingLastName" maxlength="255" autocomplete="family-name" class="form-control " aria-required="true" id="id_last_name_b" placeholder="Last Name" data-error-message="Please enter your billing last name!">

                                            <label for="id_last_name_b">Last Name</label>

                                        </div>

                                    </div>

                                    

                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-light"></i></span>

                                            <input type="text" placeholder="Address" name="billingAddress1" maxlength="255" autocomplete="address-line1" class="form-control " aria-required="true" id="id_line1_b" data-error-message="Please enter your billing address!">

                                            <label for="id_line1_b">Address</label>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-light"></i></span>

                                            <input type="text" placeholder="Suite/Apt/Other" name="billingAddress2" maxlength="255" autocomplete="address-line2" class="form-control " id="id_line2_b" data-error-message="Please enter your billing address 2!">

                                            <label for="id_line2_b">Suite/Apt/Other</label>

                                        </div>

                                    </div> 

                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="far fa-building text-light"></i></span>

                                            <input type="text" name="billingCity" maxlength="255" autocomplete="address-level2" class="form-control " aria-required="true" id="id_line4_b" placeholder="City" data-error-message="Please enter your billing city!">

                                            <label for="id_line4_b">City</label>

                                        </div>

                                    </div>

                                    <div class="col-sm col-lg-12 col-xl-6">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-light"></i></span>

                                            <input type="text" name="billingState" maxlength="255" autocomplete="address-level2" class="form-control form-select " aria-required="true" id="id_state_b" placeholder="State" data-error-message="Please select your billing state!">

                                            <label for="id_state_b">State</label>

                                        </div>

                                    </div>

                                    <div class="col-sm col-lg-12 col-xl-6">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-light"></i></span>

                                            <input type="tel" pattern="[0-9]*" inputmode="numeric" placeholder="ZIP" name="billingZip" maxlength="5" autocomplete="postal-code" class="form-control " aria-required="true" id="id_postcode_b" data-error-message="Please enter a valid billing zip code!" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />

                                            <label for="id_postcode_b">ZIP</label>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="form-floating input-group has-icon-left">

                                            <span class="input-group-text bg-white"><i class="fas fa-globe text-light"></i></span>

                                            <select class="form-select" name="billingCountry" id="id_country_b" data-error-message="Please select your billing country!">

                                                <option value="">Select Country</option>

                                            </select>

                                            <label for="id_country_b">Country</label>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        </div>
                    </div>


                   
                    

                    <div id="form-footer" class="checkout_form checkout_form-footer p-2 p-lg-3 mb-3">

                        <div class="row" id="step-3" style="display: block;">
    
                            

                        </div>

                        <div class="row mb-3">

                            <div class="col">

                                <div class="fs-7 text-center">

                                    <i class="fas fa-lock"></i> 256-bit SSL Encrypted Checkout

                                </div>

                            </div>

                        </div>

                        <div class="row justify-content-center mb-3">

                            <div class="col-10 col-sm-9">

                                <img src="/checkout/v1/app/desktop/images/verified.png" alt="" class="img-fluid">

                            </div>

                        </div>

                        <div class="row justify-content-center mb-3">

                            <div class="col-11">

                                <div class="g-wrap p-3">

                                    <div class=" mb-2 text-center">

                                        <div class="">

                                            <img src="/checkout/v1/app/desktop/images/30d.png" class="img-fluid">

                                        </div>

                                        <div class="mb-2">

                                            <div class="fs-4 mb-1 seal-title">Our Guarantee</div>

                                            <div class="guarantee-item seal-title"><i class="fas fa-check-square text-success"></i> 30-Days Moneyback Guarantee</div>

                                        </div>

                                        <div class="seal-content fs-8">If you are not satisfied for any reason within 30 days, just contact our customer service to apply for a return or exchange service.</div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row justify-content-center mb-3">

                            <div class="col-11">

                                <div class="seal-wrap py-3 px-2  d-flex justify-content-start">

                                    <div class="seal-img ">

                                        <img src="/checkout/v1/app/desktop/images/lock.png" class="img-fluid">

                                    </div>

                                    <div>

                                        <div class="seal-title mb-1">SHOP WITH CONFIDENCE</div>

                                        <div class="seal-content fs-8">hatmeocom is Safe & Secure Guaranteed! You'll pay nothing if unauthorized charges are made to your credit card as a result of shopping at hatmeocom</div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row justify-content-center mb-3">

                            <div class="col-11">

                                <div class="seal-wrap py-3 px-2  d-flex justify-content-start">

                                    <div class="seal-img ">

                                        <img src="/checkout/v1/app/desktop/images/shield.png" class="img-fluid">

                                    </div>

                                    <div>

                                        <div class="seal-title mb-1">YOUR PRIVACY IS IMPORTANT</div>

                                        <div class="seal-content fs-8">All information is encrypted and transmitted without risk using a Secure Socket Layer (SSL) protocol.</div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row justify-content-center mb-3">

                            <div class="col-11">

                                <div class="seal-wrap py-3 px-2  d-flex justify-content-start">

                                    <div class="seal-img ">

                                        <img src="/checkout/v1/app/desktop/images/us-flag.png" class="img-fluid">

                                    </div>

                                    <div>

                                        <div class="seal-title mb-1">UNITED STATES OWNED</div>

                                        <div class="seal-content fs-8">Hatmeo proudly serves over 1 million U.S. consumers</div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                        <p id="loading-indicator" style="display:none;">Processing...</p>
                    </form>
                </div>

                <div class="clearfix"></div>
                                                            </div>

                <div class="col-md-11 col-lg-9">

                    <div id="block--reviews" class="reviews">

                        <div class="step-title">

                            What customers are saying about Hatmeo Heated Vest
                        </div>

                        <hr class="mt-2">
                        <!-- NEW TESTIMONIAL SECTION STARTS HERE -->
                        <div class="testi-sec">
                        <?php foreach($comments as $key=>$comment) { 
                            $comment = json_decode($comment);    
                            //var_dump($comment);exit;
                        ?>
                            <div class="testi-row">
                                <div class="testi-row-lft">
                                    <div class="testi-lft-abt">
                                        <p class="testi-pics"><?php echo substr($comment->name, 0, 1);?></p>
                                        <p class="t-name"><?php echo $comment->name;?></p>
                                        <p class="t-vryfd">
                                            <img src="/checkout/v1/app/desktop/images/vrfy-seal-c.png" alt=""> Verified Buyer
                                        </p>
                                    </div>
                                    <div class="test-prod">
                                        <div class="t-prod-dv">
                                            <img src="/checkout/v1/app/desktop/images/t-prod1.jpg" alt="">
                                        </div>
                                        <p class="test-prod-txt">Reviewing<br><span>Hatmeo Heated Vest</span></p>
                                    </div>
                                </div>
                                
                                <div class="testi-row-rght">
                                    <span><?php echo $comment->title;?></span>
                                    <img src="/checkout/v1/app/desktop/images/star.png" class="t-star">
                                    <p class="testi-paragraph"><?php echo $comment->content;?></p>
                                   
                                </div>
                            </div>

                        <?php } ?>
                            
                        </div>
                        <!-- NEW TESTIMONIAL SECTION STARTS HERE -->

                    </div>

                </div>

                <div class="clearfix"></div>

                <div id="block--faq" class="faqs col mt-4 bg-white border p-3">

                    <div class="h2 text-center mb-4" style="font-family: oswald;">

                        Frequently Asked Questions

                    </div>

                    <div class="accordion accordion-flush" id="faqs">

                        <?php foreach($faqItems as $key=>$item) {
                            $item = json_decode($item);    
                        ?>

                        <div class="accordion-item">

                            <h2 class="accordion-header" id="compatability">

                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?php echo $key;?>" <?php if($key==0) { ?> aria-expanded="true" <?php } ?> aria-controls="faq<?php echo $key;?>">

                                    <?php echo $item->q;?>

                                </button>

                            </h2>

                            <div id="faq<?php echo $key;?>" class="accordion-collapse collapse <?php if($key==0) { ?>show<?php } ?>" aria-labelledby="compatability" data-bs-parent="#faqs">

                                <div class="accordion-body" style="font-size:14px;">

                                    <?php echo $item->a;?>

                                </div>

                            </div>

                        </div>
                    <?php } ?>
                    

                    </div>

                </div>

            </div>

        </div>

    </section>

    <footer class="footer mt-5">

        <div class="container pt-4 pb-5">

            <div class="row">

                <div class="col-6 col-sm-4 col-md-3 col-lg-3 footer-column">

                    <div class="d-none d-sm-block footer-inf footer-column-header">INFORMATION</div>

                    <a class="btn-action btn" data-url="/checkout/v1/cms/contact-us" >About Us</a><br>
                    <a class="btn-action btn" data-url="/checkout/v1/cms/contact-us" >Contact Us</a><br>
                    <a class="btn-action btn" data-url="/checkout/v1/cms/shipping-policy" >Shipping Policy</a><br>
                    <a class="btn-action btn" data-url="/checkout/v1/cms/privacy-policy">Privacy Policy</a><br>
                    <a class="btn-action btn" data-url="/checkout/v1/cms/return-policy">Refund Policy</a><br>

                </div>



                <div class="d-none d-sm-block col-sm-4 col-md-3 col-lg-3 footer-column">

                    <div class="footer-pmethods footer-column-header">PAYMENT METHODS</div>

                    <div>

                        <span>

                            <img class="credit-cards-image" style="max-height:44px;" src="/checkout/v1/app/desktop/images/secure-icons.png">

                        </span>

                    </div>

                </div>

                <div class="d-none d-md-block col-md-3 col-lg-3 footer-column">

                    <div class="footer-guarantee footer-column-header">GUARANTEE</div>

                    <div class="footer-guarantee-content">We offer a 30-Days money-back guarantee</div>

                </div>

                <div class="col-6 col-sm-4 col-md-3 col-lg-3 d-flex align-items-start justify-content-end footer-column">

                    <a href="javascript:void(0)"><img src="/checkout/v1/app/desktop/images/logo-f02a1643.svg" class="img-fluid ps-xl-5"></a>

                </div>

                <div class="col-12 mt-3 pt-2 text-center footer-copyright">

                    Copyright ©2024                    <span class="text-dark">Hatmeo</span>.

                    All Rights Reserved.

                </div>

            </div>

        </div>

    </footer>

    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body modal-body-ajax"><div class="te"></div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" class="close" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

    <!-- CVV modal -->
    <div class="modal fade" id="cvvModal" tabindex="-1" aria-labelledby="cvvLocations" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    <img src="/checkout/v1/app/desktop/images/cvv-check.jpg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- attention modal -->
<div class="modal fade attentionMdl" id="attentionMdl" tabindex="-1" aria-labelledby="exitOffer" aria-modal="true" role="dialog" style="display: none;">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <!--<button type="button" class="exit-modal-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>-->
            <div class="modal-body p-0">
                <h3><i class="fas fa-exclamation-circle"></i> Attention!</h3>
                <p class="ship-det">Shipping to Alaska and Hawaii incurs higher postage rates, resulting in a <span>$20 shipping charge</span>. We apologize for any inconvenience caused. Thank you for your understanding.</p>
                <p class="cmpny-name">Hatmeo</p>
                <button type="button" class="closebtn-info exit-modal-close" data-bs-dismiss="modal" aria-label="Close">Exit</button>
            </div>
        </div>
    </div>
</div>
    <!-- EXIT modal -->
    <div class="modal fade" id="exitModal" tabindex="-1" aria-labelledby="exitOffer" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <button type="button" class="exit-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body p-0">
                    <img src="/checkout/v1/app/desktop/images/<?php echo $product['id'];?>_ad.jpg?v=11" class="img-fluid apply_coupon">
                </div>
            </div>
        </div>
    </div>

    <!-- big pic show -->
    <div class="modal fade" id="bigPicModal" tabindex="-1" aria-labelledby="exitOffer" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <img src="/checkout/v1/app/desktop/images/<?php echo $product['id'];?>.png" class="img-fluid apply_coupon">
                </div>
            </div>
        </div>
    </div>


    <!-- Size Chart Modal -->
    <div class="modal fade" id="sizeChartModal" tabindex="-1" aria-labelledby="sizeChart" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <button type="button" class="sizeChart-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body p-0">
                    <img src="/storage/<?php echo $size_image_url;?>" class="img-fluid d-block mx-auto size_chart">
                </div>
            </div>
        </div>
    </div>


    <!-- FOMO -->
    <div id="w_fomo_wrapper" class="w_fomo_wrapper">
        <div class="w_outer">
            <div class="w_inner">
                <div class="w_item ">
                    <div class="w_thumb">
                        <img src="{{ $productBaseImage['small_image_url'] }}" alt="" class="img-fluid">
                    </div>
                    <div class="w_desc">
                        <p><span id="recentCustomer"></span> bought: <span class="fw-bold text-primary"><?php echo $product['name'];?></span> <span class="fw-bold"> JUST NOW</span></p>
                        <div class="fs-9 d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-1"></i>
                            <span class="text-dark">Verfified Purchase</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LOADING -->
        <div class="loadingMessageContainerWrapper" style="background-color: rgb(241, 241, 241);">
         <div class="counter px-2 px-sm-4">
            <div class="step-inner-container text-center">
               <img class="counter-logo" src="/checkout/v1/app/desktop/images/logo-f02a1643.svg">
               <p class="steps1 counter-step"></p>
               <div class="progress">
                  <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" ></div>
                </div>
               <div class="step-review-container">
               <?php 
               $i = 0;
               foreach($comments as $key=>$comment) { 
                    $i++;
                    $comment = json_decode($comment); 
                    if($i > 2) continue;   
                            
                ?>
                  <div class="steps<?php echo $i+1;?> steps<?php echo $i+2;?> descCounterStep<?php echo $i+1;?>">
                     <div class="step-review-box">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <p class="step-review-title"><?php echo $comment->title;?></p>

                        <p class="step-review-body"><?php echo $comment->content;?></p>

                        <p class="step-review-author"><?php echo $comment->name;?></p>
                        <p class="step-review-verified"><i class="fas fa-check-circle text-success me-1"></i>Verified Purchase</p>
                     </div>
                  </div>

                  <!-- <div class="steps3 steps4 descCounterStep2">
                     <div class="step-review-box odd">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <p class="step-review-title">Morning Jogger</p>

                        <p class="step-review-body">"Instant warmth, even on the coldest mornings. I was skeptical at first, but after trying it out, I'm buying one for my entire family!"</p>

                        <p class="step-review-author">Jackson Reid</p>
                        <p class="step-review-verified"><i class="fas fa-check-circle text-success me-1"></i>Verified Purchase</p>
                     </div>
                  </div> -->
                <?php } ?>
               </div>
            </div>
         </div>
    </div> 
    
    
        <script type="text/javascript">
        AJAX_PATH="checkout/v1/"; 
        app_config={"valid_class":"no-error","error_class":"has-error","loading_class":"loading","exit_popup_enabled":false,"exit_popup_element_id":"","exit_popup_page":"","offer_path":"/","current_step":1,"cbtoken":"","dev_mode":"N","show_validation_errors":"modal","allowed_tc":"8\"m0l0d0J050k050O0lv8sm\"l\"d4J454k454O4l480mvlsd\"J\"50k151O1l181m1l7dvJs5\"k\"50O1l089m0l3d4J45vks5\"O[r0j0V0H0q0h0k0R0X|Niraj,V1H4q4h4k4R4X4N4r|jiVaH,q6h1k1R1X1N1r1j1V|Hiqah,k6R1X0N0r9j1V9H2q|hikaR]","allowed_country_codes":["US","GB","CA","AU"],"countries":{"US":{"name":"United States","states":{"AL":{"name":"Alabama"},"AS":{"name":"American Samoa"},"AZ":{"name":"Arizona"},"AR":{"name":"Arkansas"},"CA":{"name":"California"},"CO":{"name":"Colorado"},"CT":{"name":"Connecticut"},"DE":{"name":"Delaware"},"DC":{"name":"District of Columbia"},"FM":{"name":"Federated States of Micronesia"},"FL":{"name":"Florida"},"GA":{"name":"Georgia"},"GU":{"name":"Guam"},"ID":{"name":"Idaho"},"IL":{"name":"Illinois"},"IN":{"name":"Indiana"},"IA":{"name":"Iowa"},"KS":{"name":"Kansas"},"KY":{"name":"Kentucky"},"LA":{"name":"Louisiana"},"ME":{"name":"Maine"},"MD":{"name":"Maryland"},"MA":{"name":"Massachusetts"},"MI":{"name":"Michigan"},"MN":{"name":"Minnesota"},"MS":{"name":"Mississippi"},"MO":{"name":"Missouri"},"MT":{"name":"Montana"},"NE":{"name":"Nebraska"},"NV":{"name":"Nevada"},"NH":{"name":"New Hampshire"},"NJ":{"name":"New Jersey"},"NM":{"name":"New Mexico"},"NY":{"name":"New York"},"NC":{"name":"North Carolina"},"ND":{"name":"North Dakota"},"MP":{"name":"Northern Mariana Islands"},"OH":{"name":"Ohio"},"OK":{"name":"Oklahoma"},"OR":{"name":"Oregon"},"PA":{"name":"Pennsylvania"},"PR":{"name":"Puerto Rico"},"MH":{"name":"Republic of Marshall Islands"},"RI":{"name":"Rhode Island"},"SC":{"name":"South Carolina"},"SD":{"name":"South Dakota"},"TN":{"name":"Tennessee"},"TX":{"name":"Texas"},"UT":{"name":"Utah"},"VT":{"name":"Vermont"},"VI":{"name":"Virgin Islands of the U.S."},"VA":{"name":"Virginia"},"WA":{"name":"Washington"},"WV":{"name":"West Virginia"},"WI":{"name":"Wisconsin"},"WY":{"name":"Wyoming"}}},"GB":{"name":"United Kingdom","states":{}},"CA":{"name":"Canada","states":{"AB":{"name":"Alberta"},"BC":{"name":"British Columbia"},"MB":{"name":"Manitoba"},"NB":{"name":"New Brunswick"},"NL":{"name":"Newfoundland and Labrador"},"NT":{"name":"Northwest Territories"},"NS":{"name":"Nova Scotia"},"NU":{"name":"Nunavut"},"ON":{"name":"Ontario"},"PE":{"name":"Prince Edward Island"},"QC":{"name":"Quebec"},"SK":{"name":"Saskatchewan"},"YT":{"name":"Yukon"}}},"AU":{"name":"Australia","states":{"ACT":{"name":"Australian Capital Territory"},"NSW":{"name":"New South Wales"},"NT":{"name":"Northern Territory"},"QLD":{"name":"Queensland"},"SA":{"name":"South Australia"},"TAS":{"name":"Tasmania"},"VIC":{"name":"Victoria"},"WA":{"name":"Western Australia"}}}},"country_lang_mapping":{"US":{"state":"State:","zip":"Zip Code:"},"GB":{"state":"County:","zip":"Postal Code:"},"CA":{"state":"Province:","zip":"Pin Code:"},"IN":{"state":"State:","zip":"Pin:"}},"device_is_mobile":false,"pageType":"leadPage","enable_browser_back_button":false,"disable_trialoffer_cardexp":false,"enable_csrf_token":false,"token":"{{ csrf_token() }}"}
        </script>
        <script type="text/javascript">
        app_lang={"error_messages":{"zip_invalid":"Please enter a valid zip code!","email_invalid":"Please enter a valid email id!","cc_invalid":"Please enter a valid credit card number!","cvv_invalid":"Please enter a valid CVV code!","card_expired":"Card seems to have expired already!","card_expire_soon":"Your credit card is about to expire, please update your card information.","common_error":"Oops! Something went wrong! Can you please retry?","not_checked":"Please check the agreement box in order to proceed.","ca_zip_invalid":"Invalid Canada state code","xv_invalid_shipping":"Your shipping address could not be verified","xv_email":"Your email address could not be verified","xv_phone":"Your phone number could not be verified"},"exceptions":{"config_error":"General config error","config_file_missing":"General config error","invalid_array":"Argument is not a valid array","empty_prospect_id":"Prospect ID is empty or invalid","curl_error":"Something went wrong with the request, Please try again.","generic_error":"Something went wrong with the request, Please try again."}};
    </script>
    <script type="text/javascript">
        var cbUtilConfig = {"disable_non_english_char_input":false};
    </script>
<script src="/checkout/v1/assets/js/promise.min.js" type="text/javascript"></script>
<!-- <script src="/checkout/v1/assets/js/jquery.min.js" type="text/javascript"></script> -->
<script src="https://code.jquery.com/jquery-2.0.0.min.js" crossorigin="anonymous"></script>
<script src="/checkout/v1/assets/js/jquery.mask.min.js" type="text/javascript"></script>
<script src="/checkout/v1/assets/js/validator.js" type="text/javascript"></script>
<script src="/checkout/v1/assets/js/codebase.js" type="text/javascript"></script>
<script src="/checkout/v1/assets/js/form_handler.js?v=11" type="text/javascript"></script>
<script src="/checkout/v1/assets/js/app.js?v=13" type="text/javascript"></script>
<script src="/checkout/v1/assets/js/outro.js" type="text/javascript"></script>
<script src="/checkout/v1/extensions/CbUtilityPackage/js/cb-util-pkg.js" type="text/javascript"></script>
      <!-- <script type="text/javascript" src="/checkout/v1/app/desktop/js/bootstrap.min.js"></script> -->
      <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <?php if($app_env=='demo') { ?>
    <script src="https://checkout-demo.airwallex.com/assets/elements.bundle.min.js"></script>
    <?php }else{ ?>
    <script src="https://checkout.airwallex.com/assets/elements.bundle.min.js"></script>
    <?php } ?>
    <script>
            Airwallex.init({
            env: '<?php echo $app_env;?>', // Setup which Airwallex env('staging' | 'demo' | 'prod') to integrate with
            origin: window.location.origin, // Setup your event target to receive the browser events message
            });

            const cardNumber = Airwallex.createElement('cardNumber',{
                allowedCardNetworks:['visa','maestro','mastercard','amex','unionpay','jcb']
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
                $("#id_card").val(event.detail.complete);
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
                $("#id_cvc").val(event.detail.complete);
            });

    </script>

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P6343Y2GKT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P6343Y2GKT');
</script>


    <!-- <script src="https://core.spreedly.com/iframe/iframe-v1.min.js"></script>
    <script id="spreedly-iframe" data-environment-key="6hyXvtqVacIHBBOrIGc7NyTbHEv" data-number-id="spreedly-number-test" data-cvv-id="spreedly-cvv-test"></script> -->

    <script type="text/javascript">
        var BarParam = "";
        var LoadParam = "";
        var ExitPopParam = "";
        var TimerParam = "";
        var ReviewParam = "";
        var OfferParam = "";
        var PackageParam = "";
        var DiscountParam = "";
        var Evclid = "";
        var AppCoupon = 0;

        $( document ).ready(function() {



            $('.pic_big_show').click(function(){
                $('#bigPicModal').modal('show');
            });


            $('.btn-action').click(function(){
                var url = $(this).data("url"); 
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(res) {
                        $('.modal-body-ajax').html(res);
                        // show modal
                        $('#myModal').modal('show');
                        
                    },
                    error:function(request, status, error) {
                        console.log("ajax call went wrong:" + request.responseText);
                    }
                });
            });



            dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
            window.dataLayer.push({'event': 'checkout_page_view'});
            dataLayer.push({
                event: "begin_checkout",
                ecommerce: {
                    currency:'USD',
                    value: 134.97,
                    coupon: '',
                    items: [
                        {
                            item_id: 'HEATEDVEST-L-01-Hatmeo',
                            item_name: "Hatmeo Heated Vest",
                            affiliation: "",
                            // discount: 60,
                            item_brand: 'Hatmeo',
                            item_category: 'Hatmeo',
                            item_variant: 'product',
                            price: 44.99,
                            quantity: 3
                        }
                    ]
                }
            });

            // setTimeout( ()=>{
            //     $.ajax({
            //         url: 'https://offer.hatmeocom/checkout/v1/set-affiliate.php'+ location.search,
            //         method: 'post',
            //         //data: {affid:"", afid:"", evclid:EF.getTransactionId(EF.urlParameter('oid'))},
            //         data: { affid: "", afid: "", evclid: typeof EF !== 'undefined' ? EF.getTransactionId(EF.urlParameter('oid')) : Evclid },
            //         success: function (data) {
            //             console.log(data);
            //         }
            //     });
            // },2000);
                
            if(OfferParam == "" && PackageParam == "")
            {
                var selectedOfferId = 3;
            }
            else if(OfferParam != "" && PackageParam == "")
            {
                var selectedOfferId = OfferParam;
            }
            else if(OfferParam == "" && PackageParam != "")
            {
                var selectedOfferId = PackageParam;
            }
            else
            {
                var selectedOfferId = PackageParam;
            }
            console.log('selectedOfferId: '+selectedOfferId);

            $('.offer[data-pid='+selectedOfferId+']').click();
            if((BarParam == "n" || LoadParam == "n") && ExitPopParam != "n")
            {
                exitPop();
            }

            var remove_state_id=['AE','AA','AP','VI','PR','GU'];
            $.each(remove_state_id, function( index, value ) {
                // console.log( index + ": " + value );
                $("#id_state option[value="+value+"]").remove();
            });

            $(".billing_toggle").on("click", function () {

                $("#form-billing").stop().slideToggle();

                if ($(this).prop("checked") == true) {
                
                $("#form-billing").slideUp();

                $('#form-billing input, #form-billing select').removeClass('required');

                $("#same_billing").trigger('click');

                } else if ($(this).prop("checked") == false) {
                
                $('#form-billing input, #form-billing select').addClass('required');
                $('#form-billing #id_line2_b').removeClass('required');
                $("#different_billing").trigger('click');
                }
            });

            $('select[name=creditCardType]').val('airwallex').trigger('change');
            // $('input[name=pay_with_credit_card]').on('change', function(e){
            //     if ($(this).prop('checked') == false) {
            //         $('#form-cc').removeClass("is-visible");
            //         $('#form-shipping').removeClass("is-visible");
            //         $('#form-sub-btn').hide();
            //         $('#payment-gateway-input-div').html('');
            //         $('select[name=creditCardType]').val('').trigger('change');
            //         if ($('input[name=billing_address_same_as_shipping]').prop('checked') == false) {
            //             $('input[name=billing_address_same_as_shipping]').click();
            //             $("#same_billing").trigger('click');
            //         }
            //     } else {
            //         $('#payment-gateway-input-div').html('<input type="hidden" name="payment_gateway_group" value="37">');
            //         $('#form-cc').addClass("is-visible");
            //         $('#form-shipping').addClass("is-visible");
            //         $('#form-sub-btn').show();
            //         $('select[name=creditCardType]').val('airwallex').trigger('change');
            //     }
            // });

            $('.pay-with-paypal-standard').on('click', function(e){
                window.dataLayer.push({'event': 'pay_with_paypal_standard_cta'});
                e.preventDefault();
                var is_check = checkSizeValidation();
                if(is_check.error_count >0){
                    cb.errorHandler(is_check.error);
                }else{
                    $('#payment-gateway-input-div').html('');
                    $('select[name=creditCardType]').val('paypal-standard').trigger('change');

                    $('form[name=downsell_form1]').submit();
                }
            });

             $('.pay-with-paypal').on('click', function(e){
                window.dataLayer.push({'event': 'pay_with_paypal_cta'});
                e.preventDefault();
                var is_check = checkSizeValidation();
                if(is_check.error_count >0){
                    cb.errorHandler(is_check.error);
                }else{
                    $('#payment-gateway-input-div').html('');
                    $('select[name=creditCardType]').val('paypal').trigger('change');
                    // $('.form-control').removeClass('required');
                    // $('.form-select').removeClass('required');
                    // $('input[name=pay_with_credit_card]').prop('checked', false);
                    // $('#form-cc').removeClass("is-visible");
                    // $('#form-shipping').removeClass("is-visible");
                    // $('#form-sub-btn').hide();
                    // if ($('input[name=billing_address_same_as_shipping]').prop('checked') == false) {
                    //     $('input[name=billing_address_same_as_shipping]').click();
                    //     $("#same_billing").trigger('click');
                    // }

                    //$('.form-select').removeClass('required');


                    $('input[name=firstName]').attr('value', "firstName");
                    $('input[name=lastName]').attr('value', "lastName");
                    $('input[name=email]').attr('value', "email@qq.com");
                    $('input[name=shippingAddress1]').attr('value', "shippingAddress1");
                    $('input[name=shippingAddress2]').attr('value', "shippingAddress2");
                    $('input[name=shippingCity]').attr('value', "shippingCity");
                    //$('input[name=shippingState]').attr('value', "");

                    $("#id_state").val("AL");
                    $('input[name=phone]').attr('value', "12000000");

                    //$('input[name=shippingZip]').attr('value', "00000");
                    $("#id_postcode").val("00000");


                    console.log("paypal submit");
                    $('form[name=downsell_form1]').submit();
                    $('input[name=firstName]').attr('value', "");
                    $('input[name=lastName]').attr('value', "");
                    $('input[name=email]').attr('value', "");
                    $('input[name=shippingAddress1]').attr('value', "");
                    $('input[name=shippingAddress2]').attr('value', "");
                    $('input[name=shippingCity]').attr('value', "");
                    $('input[name=shippingState]').attr('value', "");
                    $('input[name=shippingZip]').attr('value', "");
                    $('input[name=phone]').attr('value', "");

                    gtag('event', 'initiate_checkout', {
                            'event_label': 'Initiate paypal Checkout',
                            'event_category': 'ecommerce'
                    });
                }
            });

            $('input[name=extended_protection]').on('change', function(e){
                calculateTotal();
            });

            $('.apply_coupon').on('click', function(e){
                var pid = parseInt($('.selected').data('pid'));
                if(pid==1){
                    var pprice = 56.9905;
                }else if(pid==2){
                    var pprice = 56.9905;
                }else if(pid==3){
                    var pprice = 42.7405;
                }else if(pid==4){
                    var pprice = 37.9905;
                }

                dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
                dataLayer.push({
                    event: "select_promotion",
                    ecommerce: {
                        creative_name: "",
                        promotion_id: "",
                        promotion_name:"",
                    }
                });

                dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
                dataLayer.push({
                    event: "select_item",
                    ecommerce: {
                        items: [
                            {
                                item_id: 'HEATEDVEST-L-01-Hatmeo',
                                item_name:  "Hatmeo Heated Vest",
                                affiliation: "",
                                quantity: pid,
                                coupon: '',
                                item_brand:'Hatmeo',
                                item_category: 'Hatmeo',
                                item_variant: 'product',
                                price: parseFloat(pprice.toFixed(2))
                            }
                        ]
                    }
                });

                $('input[name=coupon_applied]').val(1);
                $('#exitModal').modal('hide');
                $('.exit-pop-10-badge').show();
                // $('.discount-span-text').html('<span class="text-tertiary fw-bold">Attention:</span> An additional <span class="text-tertiary fw-bold">5%</span> Discount has been applied!');
                $('.50-per-coupon-div').show();
                $('.10-per-coupon-div').show();
                operation_size();
                calculateTotal();


            });

            $('.pay-with-cc').on('click', function(e){
                console.log('pay with cc');
                window.dataLayer.push({'event': 'complete_order_cta'});
                e.preventDefault();

                var id_card = $("#id_card").val();
                var id_expiry = $("#id_expiry").val();
                var id_cvc = $("#id_cvc").val();
                console.log("id_cvc" + id_cvc);
                console.log("id_card" + id_card);
                console.log("id_expiry" + id_expiry);
                if(id_card!="true") {
                    error =  ["Please check your card number!"];
                    return cb.errorHandler(error);
                }
                if(id_cvc!="true") {
                    error =  ["Please check your card cvc!"];
                    return cb.errorHandler(error);
                }
                if(id_expiry!="true") {
                    error =  ["Please check your card expiry!"];
                    return cb.errorHandler(error);
                }
                console.log("cb beformsubmitevents");

                var is_check = checkSizeValidation();
                if(is_check.error_count >0){
                    cb.errorHandler(is_check.error);
                }else{
                    $('#payment-gateway-input-div').html('<input type="hidden" name="payment_gateway_group" value="37">');
                    $('select[name=creditCardType]').val('airwallex').trigger('change');
                    //$('#loading-indicator').show();
                    var normalBorder = "1px solid #ccc";
                    var paymentMethodFields = ['first_name', 'last_name', 'month', 'year']
                    // options = {};
                    // for(var i = 0; i < paymentMethodFields.length; i++) {
                    //     var field = paymentMethodFields[i];
                    //     var fieldEl = document.getElementById(field);
                    //     fieldEl.style.border = normalBorder;
                    //     options[field]  = fieldEl.value
                    // }
                    // Spreedly.setStyle('number', "border: " + normalBorder + ";");
                    // Spreedly.setStyle('cvv', "border: " + normalBorder + ";");
                    // Spreedly.tokenizeCreditCard(options);

                    console.log("form submit");

                    $('form[name=downsell_form1]').submit();

                    gtag('event', 'initiate_checkout', {
                            'event_label': 'Initiate Checkout',
                            'event_category': 'ecommerce'
                    });

                }
            });
        });

        $('.offer').on('click', function(e){
            $('.offer').removeClass('selected');
            $(this).addClass('selected');
            console.log($(this));
            var pid = parseInt($(this).data('pid'));
            $('input[name=selected_package_id]').val(pid);
            $("#add_on_qty").val(pid)

            for(var i=1; i<=4; i++){
                for(var j=1; j<=i; j++){
                    // console.log($("#size_"+i+"_"+j).val());
                    if(i!=pid){
                        $("#size_"+i+"_"+j).val('');
                    }
                }
            }

            var coupon = $('input[name=coupon_applied]').val();
            if(coupon==1){
                if(pid==1){
                    var pprice = 56.9905;
                }else if(pid==2){
                    var pprice = 56.9905;
                }else if(pid==3){
                    var pprice = 42.7405;
                }else if(pid==4){
                    var pprice = 37.9905;
                }
            }else{
                if(pid==1){
                    var pprice = 59.99;
                }else if(pid==2){
                    var pprice = 59.99;
                }else if(pid==3){
                    var pprice = 44.99;
                }else if(pid==4){
                    var pprice = 39.99;
                }
            }
    
            dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
            dataLayer.push({
                event: "select_item",
                ecommerce: {
                    items: [
                        {
                            item_id: 'HEATEDVEST-L-01-Hatmeo',
                            item_name:  "Hatmeo Heated Vest",
                            affiliation: "",
                            quantity: pid,
                            coupon: '',
                            item_brand:'Hatmeo',
                            item_category: 'Hatmeo',
                            item_variant: 'product',
                            price: parseFloat(pprice.toFixed(2))
                        }
                    ]
                }
            });
            

            operation_size();
            calculateTotal();   
        });

        $(document).on('click','#id_same_as_shipping',function(){
            var remove_state_id=['AE','AA','AP','VI','PR','GU'];
            $.each(remove_state_id, function( index, value ) {
                // console.log( index + ": " + value );
                $("#id_state_b option[value="+value+"]").remove();
            });
        });

        $('input[name=add-ons]').on('change', function(e){
            calculateTotal();
        });
        $("#add_on_qty").on('change',function(){
            calculateTotal();
        });

        var skus = <?php echo json_encode($skus);?>


        window.attributes = <?php echo json_encode($attributes);?>

        // attributeChange
        function attributeChange(target, size, size_id) {

            console.log(target);
            console.log();

            var select_option_html = "";
            $("#size_"+size_id).empty();
            <?php foreach($attributes['attributes'] as $key=>$attribute) { ?>
                <?php if($attribute['id']!=24) continue; ?>
                
                $("#size_"+size_id).empty();

                //<option data-camp="1" data-bundle="3">Please chose the Size</option>
                var select_option_html = "<option>Size</option>";
                $("#size_"+size_id).append(select_option_html);
                <?php foreach($attribute['options'] as $kk=>$option) { ?>
                    select_option_html='<option value="<?php echo $option['label'] ?>" data-camp="<?php echo $option['id'] ?>" data-bundle="'+size+'"><?php echo $option['label'] ?></option>';
                    console.log(select_option_html);
                    console.log(size_id);
                    $("#size_"+size_id).append(select_option_html);
                <?php } ?>
            <?php } ?>


        }

        function productDetails(id){
            // Note: Shipping to Alaska and Hawaii will be $20 as per client requirement  
            var extra_shipping = 0.00;
            var ship_price_extra_feature = $('input[name=ship_price_extra_feature]').val();
            if(ship_price_extra_feature==1){
                var extra_shipping = 20.00;
            }

            var productArr = [];
            switch (id) {
                <?php foreach($package_products as $key=> $package_product) {
                    //var_dump($package_product);exit;
                    ?>    
                case <?php echo $package_product['id'];?>:
                    productArr['campaign_id'] = <?php echo $package_product['id'];?>;
                    productArr['product_name'] = "<?php echo $package_product['name'];?>";
                    productArr['per_product_price'] = <?php echo $package_product['per_product_price'];?>;
                    productArr['product_qty'] = <?php echo $package_product['id'];?>;
                    productArr['product_total'] = <?php echo $package_product['new_price']; ?>;
                    productArr['product_price_original'] = <?php echo $package_product['srouce_price']; ?>;

                     productArr['shipping_price'] = <?php echo $package_product['shipping_fee'];?>

                    productArr['offer_coupon_code'] = '';
                    productArr['offer_discount_percentage'] = "40";

                    productArr['coupon_discount_percentage'] = "45%";
                    productArr['after_coupon_per_product_price'] = 56.9905;
                    productArr['after_coupon_product_total'] = 56.9905;
                    productArr['exit_pop_coupon_code'] = '';

                    productArr['extended_protection_per_price'] = 9.99;
                    productArr['extended_protection_total_price'] = 9.99;
                    productArr['extended_protection_product_name'] = "1x Extended Warranty";
                    productArr['extended_protection_text'] = "By placing your order today, you can have an extended warranty and replacement plan for only an additional $9.99. This means your one product is covered for 1 Year.";
                    break;
                <?php if($package_product['id']==3) { ?>
                default:
                    productArr['campaign_id'] = <?php echo $package_product['id'];?>;
                    productArr['product_name'] = "<?php echo $package_product['name'];?>";
                    productArr['per_product_price'] = <?php echo $package_product['per_product_price'];?>;
                    productArr['product_qty'] = <?php echo $package_product['id'];?>;
                    productArr['product_total'] = <?php echo $package_product['new_price']; ?>;
                    productArr['product_price_original'] = <?php echo $package_product['srouce_price']; ?>;

                     productArr['shipping_price'] = <?php echo $package_product['shipping_fee'];?>

                    productArr['offer_coupon_code'] = '';
                    productArr['offer_discount_percentage'] = "40";

                    productArr['coupon_discount_percentage'] = "45%";
                    productArr['after_coupon_per_product_price'] = 56.9905;
                    productArr['after_coupon_product_total'] = 56.9905;
                    productArr['exit_pop_coupon_code'] = '';

                    productArr['extended_protection_per_price'] = 9.99;
                    productArr['extended_protection_total_price'] = 9.99;
                    productArr['extended_protection_product_name'] = "1x Extended Warranty";
                    productArr['extended_protection_text'] = "By placing your order today, you can have an extended warranty and replacement plan for only an additional $9.99. This means your one product is covered for 1 Year.";
                    break;
                <?php } } ?>
                
                }
                return productArr;
            }

            $(".size_selection").on('click',function(event){
                event.stopPropagation();
            })
         // start select size operatio code here
            $(".size_filter").on('change',function(){
                var obj = $(this);
                var bundle = $('option:selected', obj).data('bundle');
                // console.log(bundle);
                // reset the other select value
                var tot_bundle = 4;
                for(var i=1; i<=tot_bundle; i++){
                    for(var j=1; j<=i; j++){
                        if(i!=bundle){
                            $("#size_"+i+"_"+j).val('');
                        }
                    }
                }

                operation_size();
            })

            var sku_maps = getSKuMaps();

            console.log(" sku maps "+sku_maps);

            function getSKuMaps() {
                if(window.sku_maps) {
                    return window.sku_maps
                }
                var skus = <?php echo json_encode($skus);?>      
                var sku_maps = {};
                for(var i=0; i<skus.length; i++) {
                    sku_maps[skus[i].key] = JSON.parse(JSON.stringify(skus[i]));
                }

                window.sku_maps = sku_maps;
                console.log(window.sku_maps);
                return window.sku_maps;
            }


            function operation_size(){
                var campaign_index = $("#campaign_index").val();
                var bundle = parseInt($('input[name=selected_package_id]').val());
                if($('input[name=coupon_applied]').val() == 1){
                    var price = productDetails(parseInt(bundle)).after_coupon_per_product_price.toFixed(2)
                }else{
                    var price = productDetails(parseInt(bundle)).per_product_price.toFixed(2)
                }

                var camp_arr = [];
                var color_arr = [];
               
                var campaign_html = "";
                $("#main_campaign_div").html('');

                sku_map = window.sku_maps;
                
                for(var i=1; i<=bundle; i++){
                    var sel_obj = $("#size_"+bundle+"_"+i);

                    var color_obj = $("#color_"+bundle+"_"+i);

                    var color_camp_id = $('option:selected', color_obj).data('camp');
                    var color_sel = $('option:selected', color_obj).val();

                    var camp_id = $('option:selected', sel_obj).data('camp');
                    var size_sel = $('option:selected', sel_obj).val();
                    if(typeof camp_id !== undefined && size_sel!==''){
                        camp_arr.push({
                            'size':size_sel,
                            'qty':1,
                            'camp':camp_id,
                            'color': color_sel,
                            'product_id': '<?php echo $product['id'];?>',
                            'sku_id': sku_map[size_sel+'_'+color_sel].sku_id,
                            'product_sku' : sku_map[size_sel+'_'+color_sel].sku_code,
                            'color_camp': color_camp_id
                        })
                    }
                }

                const new_obj = {};
                camp_arr.forEach(e => {  
                    const obj =  new_obj[e.size] = new_obj[e.size] || {...e, qty: 0}
                    obj.qty += e.qty
                })
                const res = Object.values(new_obj)

                var json_data = JSON.stringify(new_obj)

                console.log("json data");
                console.log(json_data);
                console.log(new_obj);

                $("#json_hidden_input").val(json_data);

                // $.each(res, function( index, value ) {
                res.forEach(function (value, index) {
                    index++;
                    campaign_html+= '<input type="hidden" name="campaigns['+index+'][id]" value="'+value.camp+'"> <input type="hidden" name="campaigns['+index+'][quantity]" value="'+value.qty+'"> <input type="hidden" name="campaigns['+index+'][price]" value="'+price+'"> <input type="hidden" name="ignore_isupsell" value="true">';
                    $("#campaign_index").val(index);
                });
                
                $("#main_campaign_div").html(campaign_html);

                calculateTotal();
            }

            function checkSizeValidation(){
                var bundle = parseInt($('input[name=selected_package_id]').val());
                console.log("check size validation" + bundle);
                error= [];
                error_count = 0;
                for(var i=1; i<=bundle; i++){
                    var size = $("#size_"+bundle+"_"+i).val();
                    if(size===''){
                        error_count++;
                        error=["Please select size from chosen Package"];
                    }
                }

                return {error_count,error}
            }

            // end select size operatio code here

        

        function calculateTotal(){

            var pid = parseInt($('input[name=selected_package_id]').val());
            var campaign_index = $("#campaign_index").val();
            // $('#campaign_id').val(productDetails(pid).campaign_id);

            //coupon replaced by price 
            // $('#total_price_campaign_id').val(productDetails(pid).campaign_id);

            $("#shipping_price").val(productDetails(pid).shipping_price.toFixed(2))

            $('.os_main_product_name').text(productDetails(pid).product_name);
            //$('.os_main_product_each_price').html('$ '+productDetails(pid).per_product_price.toFixed(2)+' <span class="fs-8">/ea</span>');
            $('.os_main_product_each_price').html('$ '+productDetails(pid).product_total.toFixed(2));
            $('.os_shipping_price').text('$ '+productDetails(pid).shipping_price.toFixed(2));

            $('.os_subtotal_price').text('$ '+productDetails(pid).product_price_original.toFixed(2));
            

            //$('.extended_protection_price').text('$'+productDetails(pid).extended_protection_total_price.toFixed(2));
            $('.extended_protection_price').text(productDetails(pid).extended_protection_text);
            $('.pack-percent').html('<strong>' + productDetails(pid).offer_discount_percentage + '%</strong>');

            if ($('input[name=extended_protection]').prop('checked') == true) {
                campaign_index++;
                /*
                $('#protection_input').html('<input type="hidden" name="campaigns['+campaign_index+'][id]" id="warranty_campaign_id" value="7"> <input type="hidden" name="campaigns['+campaign_index+'][quantity]" id="warranty_campaign_qty" value="'+productDetails(pid).product_qty+'"> <input type="hidden" name="campaigns['+campaign_index+'][price]" id="warranty_campaign_price" value="'+productDetails(pid).extended_protection_per_price+'"><input type="hidden" name="campaigns['+campaign_index+'][is_upsell_product]" value="true">');*/
                $('.os_extended_warranty_div').show();
                $('.os_extended_warranty_product_name').text(productDetails(pid).extended_protection_product_name);
                $('.os_extended_warranty_product_each_price').html('$ '+productDetails(pid).extended_protection_per_price.toFixed(2)+' <span class="fs-8">/ea</span>');
                
                var total_price = productDetails(pid).extended_protection_total_price + productDetails(pid).product_total + productDetails(pid).shipping_price;
                $('.os_total_price').text('$ '+total_price.toFixed(2));
            }
            else
            {
                $('#protection_input').html('');
                $('.os_extended_warranty_div').attr('style', 'display:none !important');
                
                var total_price = productDetails(pid).product_total + productDetails(pid).shipping_price;
                $('.os_total_price').text('$ '+total_price.toFixed(2));
            }

            var discount_price = productDetails(pid).product_price_original - total_price;
            $('.os_discount_price').text('$ '+discount_price.toFixed(2));

            
            /********************* add-ons start *********/
        if ($('input[name=add-ons]').prop('checked') == true) {
            campaign_index++;
            var add_on_qty = $("#add_on_qty").val();
            $('#extra-add-ons').html('<input type="hidden" name="campaigns['+campaign_index+'][id]" id="addon1_campaign_id" value="10"> <input type="hidden" name="campaigns['+campaign_index+'][quantity]" id="addon1_campaign_qty" value="'+add_on_qty+'"> <input type="hidden" name="campaigns['+campaign_index+'][price]" id="addon_campaign_price" value="19.99"><input type="hidden" name="campaigns['+campaign_index+'][is_upsell_product]" value="true">');
            $('.op_add1').html('Click to Add');
            $('.os_add-ons_div').show();
            $('.os_add-ons_product_each_price').html('$19.99 /ea');
            $('.os_add-ons_product_name').html(add_on_qty+'x PowerBank Ultra')
            var tot_add_on_price = (19.99*parseInt(add_on_qty))
            var total_price = productDetails(pid).product_total + productDetails(pid).shipping_price;
            if ($('input[name=extended_protection]').prop('checked') == true) {
                total_price = total_price + tot_add_on_price + productDetails(pid).extended_protection_total_price;
            }else{
                total_price = total_price + tot_add_on_price;
            }
        
            $('.os_total_price').text('$ '+total_price.toFixed(2));  
        } else {
            $('#extra-add-ons').html('');
            $('.op_add1').html('Click to Add');
            $('.os_add-ons_div').attr('style', 'display:none !important');
            var total_price =  productDetails(pid).product_total + productDetails(pid).shipping_price;
            if ($('input[name=extended_protection]').prop('checked') == true) {
                total_price = total_price + productDetails(pid).extended_protection_total_price;
            }
            $('.os_total_price').text('$ '+total_price.toFixed(2));
        }
        /***********add-ons end *********************/

            /**  Total price field Without Coupon Start  */
                var total_price_without_shipping_price = productDetails(pid).product_total;
                var price_total = total_price_without_shipping_price/productDetails(pid).product_qty;
                // $('#price_total').val(price_total.toFixed(2));
            /**  Total price field Without Coupon End  */

            // $('input[name=couponCode]').val(productDetails(pid).offer_coupon_code);

            if($('input[name=coupon_applied]').val() == 1)
            {
                $('.buy_1_per_price').text(productDetails(1).after_coupon_per_product_price.toFixed(2));
                $('.buy_1_total_price').text(productDetails(1).after_coupon_product_total.toFixed(2));
                $('.buy_2_per_price').text(productDetails(2).after_coupon_per_product_price.toFixed(2));
                $('.buy_2_total_price').text(productDetails(2).after_coupon_product_total.toFixed(2));
                $('.buy_3_per_price').text(productDetails(3).after_coupon_per_product_price.toFixed(2));
                $('.buy_3_total_price').text(productDetails(3).after_coupon_product_total.toFixed(2));
                $('.buy_4_per_price').text(productDetails(4).after_coupon_per_product_price.toFixed(2));
                $('.buy_4_total_price').text(productDetails(4).after_coupon_product_total.toFixed(2));

                // $('.buy_1_save_percentage').text(productDetails(1).coupon_discount_percentage);
                // $('.buy_2_save_percentage').text(productDetails(2).coupon_discount_percentage);
                // $('.buy_3_save_percentage').text(productDetails(3).coupon_discount_percentage);
                // $('.buy_4_save_percentage').text(productDetails(4).coupon_discount_percentage);
                
                $('.os_main_product_each_price').html('$ '+productDetails(pid).after_coupon_per_product_price.toFixed(2)+' <span class="fs-8">/ea</span>');

                // if ($('input[name=extended_protection]').prop('checked') == true) {
                    
                //     var total_price = productDetails(pid).extended_protection_total_price + productDetails(pid).after_coupon_product_total + productDetails(pid).shipping_price;
                //     $('.os_total_price').text('$ '+total_price.toFixed(2));

                // }else{
                    
                //     var total_price = productDetails(pid).after_coupon_product_total + productDetails(pid).shipping_price;
                //     $('.os_total_price').text('$ '+total_price.toFixed(2));
                // }

              var total_price = productDetails(pid).after_coupon_product_total + productDetails(pid).shipping_price;
                if ($('input[name=extended_protection]').prop('checked')) {
                    total_price += productDetails(pid).extended_protection_total_price;
                }
                if ($('input[name=add-ons]').prop('checked')) {
                    var add_on_qty = $("#add_on_qty").val();
                    total_price += 19.99 * parseInt(add_on_qty);
                }
                $('.os_total_price').text('$ ' + total_price.toFixed(2));

                /**  Total price field With Coupon Start  */
                    var total_price_without_shipping_price = productDetails(pid).after_coupon_product_total;
                    var price_total = total_price_without_shipping_price/productDetails(pid).product_qty;
                    // $('#price_total').val(price_total.toFixed(2));
                /**  Total price field With Coupon End   */
                
                // $('input[name=couponCode]').val(productDetails(pid).exit_pop_coupon_code);
            }
        }

        $(function() {
            setInterval(function() {
                var recentCustomer = Array('Hannah from Lancaster ', 'Jennifer from Newport News', 'Thomas from Springfield ', 'Benjamin from San Diego ', 'Lucy from Aimes ', 'Frank from Eureka ', 'Jennifer from Plano ', 'Robert from Osage Beach', 'Karen from Owensboro ', 'Steve from Stamford ', 'Jennifer from Hamptom ', 'Lucy  from Bethel ', 'Robert from Bozeman ', 'Mary from Key Biscayne ', 'Jim from Oxnard ', 'Elizabeth from Raleigh ', 'Lucy from Baltimore ', 'Steve from Camden ', 'Thomas from Mansfield ', 'James from Landover');
                var recentCustomer = recentCustomer[Math.floor(Math.random() * recentCustomer.length)];
                $('#recentCustomer').text(recentCustomer);
                $("#w_fomo_wrapper").addClass("notify").delay(8000).queue(function(next) {
                    $(this).removeClass("notify");
                    next();
                });
            }, 22000);
        });

        function noScroll() {
            window.scrollTo(0, 0);
        }
        
        function exitPop() { 
            document.addEventListener("mouseout", function(e){
                if( e.clientY < 0 && AppCoupon == 0){
                    AppCoupon = 1;
                    $('#exitModal').modal('show');
                }
            }, false);
        }
    </script>

        <script type="text/javascript">
        var progress = msgCounter = 0;
        var loadingMeg = [
            "Checking if you qualify for special offers ...",
            "Congratulations, you qualified!",
            "Checking warehouse for available inventory ...",
            "Limited stock available! Reserving Your Units..."
        ];

        setInterval(function() {
            if (progress != 100) {
                window.addEventListener('scroll', noScroll);
                $("body").addClass("is-loading");
                $('.descCounterStep1').show();
                $('.descCounterStep2').hide();
                if (progress % 25 == 0) {
                    $('.counter-step').html(loadingMeg[msgCounter]);
                    msgCounter++;
                }
                if (progress >= 50) {
                    $('.descCounterStep1').hide();
                    $('.descCounterStep2').show();
                }
                progress++;
                $(".progress-bar").width(progress + '%');
            } else {
                $(".loadingMessageContainerWrapper").hide();
                window.removeEventListener('scroll', noScroll);
                $("body").removeClass("is-loading");
                if(ExitPopParam != "n")
                {
                    exitPop();
                }                
                return false;
            }
        }, 80);
    </script>
    
    <script>
        // Spreedly.init();
        // Spreedly.on('paymentMethod', function(token, pmData) {
        //     $('#card_token').val(token);
        //     $('#loading-indicator').hide();
        //     $('form[name=downsell_form1]').submit();
        // });
        // Spreedly.on('errors', function(errors) {
        //     $('#loading-indicator').hide();
        //     var cbErrors = new Array();
        //     var errorBorder = "1px solid red";
        //     for(var i = 0; i < errors.length; i++) {
        //         var error = errors[i];
        //         if(error["attribute"] == "number") {
        //             cbErrors.push("Please enter a valid credit card number!");
        //         }
        //         if(error["attribute"] == "month") {
        //             cbErrors.push("Please select a valid expiry month!");
        //         }
        //         if(error["attribute"] == "year") {
        //             cbErrors.push("Please select a valid expiry year!");
        //         }
        //         if(error["attribute"] == "first_name") {
        //             cbErrors.push("Please enter your first name!");
        //         }
        //         if(error["attribute"] == "last_name") {
        //             cbErrors.push("Please enter your last name!");
        //         }
        //     }
        //     cb.errorHandler(cbErrors);
        // });
        // Spreedly.on('ready', function(frame) {
        //     Spreedly.setFieldType('number', 'text');
        //     Spreedly.setFieldType('cvv', 'text');
        //     Spreedly.setPlaceholder("number", "Card Number");
        //     Spreedly.setPlaceholder("cvv", "CVV");
        //     Spreedly.setNumberFormat('prettyFormat');
        //     Spreedly.setStyle('number','width: 100%; border-radius: 3px; border: 1px solid #ccc; padding: .65em .5em; font-size: 91%; height: 38px; background-color: #fff;');
        //     Spreedly.setStyle('cvv', 'width: 100%; border-radius: 3px; border: 1px solid #ccc; padding: .65em .5em; font-size: 91%; height: 38px; background-color: #fff;');
        // });
        // Spreedly.on('fieldEvent', function(name, event, activeElement, inputData) {
        //     if (event == 'input') {
        //         if (inputData["validCvv"]){
        //             Spreedly.setStyle('cvv', "background-color: #CDFFE6;")
        //         } else {
        //             Spreedly.setStyle('cvv', "background-color: #FFFFFF;")
        //         }
        //         if (inputData["validNumber"]){
        //             Spreedly.setStyle('number', "background-color: #CDFFE6;")
        //         } else {
        //             Spreedly.setStyle('number', "background-color: #FFFFFF;")
        //         }
        //     }
        // });

       cb.beforeFormSubmitEvents.push(function(e) {
            
            var is_check = checkSizeValidation();
            if(is_check.error_count >0){
                cb.errorHandler(is_check.error);
            }else{
                $('#loading-indicator').show();
                $.ajax({
                    url: '/checkout/v1/' + 'downsell?_token={{ csrf_token() }}',
                    method: 'post',
                    data: $('[name=downsell_form1]').serialize()
                }).success(function(data) {
                    console.log("downsell_form");
                    console.log(data);
                    if(data.success) {
                        var str = data.redirect;
                        var res = str.split("?");
                        console.log("downsell_form" + str);
                        console.log("creditCardType" + $('select[name=creditCardType]').val());
                        if($('select[name=creditCardType]').val() == "paypal") {

                            gtag('event', 'initiate_paypal', {
                                'event_label': 'Initiate paypal redirect',
                                'event_category': 'ecommerce'
                            });

                            window.location.href = data.redirect;
                        }else if($('select[name=creditCardType]').val() == "paypal-standard") {
                            gtag('event', 'initiate_paypal', {
                                'event_label': 'Initiate paypal standard redirect',
                                'event_category': 'ecommerce'
                            });

                            // window.location.href = data.redirect_url;


                            var paypal_form = '<form action="'+data.pay_url+'" method="post" style="display:none" >';
                            console.log(data.form);
                            $.each(data.form, function(k, v) {

                                if(k=='cancel_return') v = window.location.href;
                                //if(k=='return') v = "<?php echo route('onebuy.checkout.success')?>";
                                /// do stuff
                                paypal_form +='<input type="hidden" name="'+k+'" value="'+v+'">';
                            });
                                // 
                            paypal_form += '</form>';

                            console.log(paypal_form);

                            $(paypal_form).appendTo('body').submit();

                            return false;



                        } else {
                            //window.location.href = 'https://offer.hatmeocom/checkout/v1/upsell2/?' + res[1];

                            console.log(cardNumber)

                                Airwallex.confirmPaymentIntent({
                                    element: cardNumber,
                                    id: data.payment_intent_id,
                                    client_secret: data.client_secret,
                                }).then((response) => {
                                // STEP #6b: Listen to the request response
                                /* handle confirm response in your business flow */
                                //window.alert(JSON.stringify(response));
                                    $("#loading-indicator").hide();
                                    console.log('success');
                                    console.log(JSON.stringify(response))
                                    //cb.errorHandler("Success");
                                    //alert("Success"); 

                                    gtag('event', 'initiate_pay_success', {
                                        'event_label': "Initiate cc success"+data.order_id,
                                        'event_category': 'ecommerce'
                                    });

                                    window.location.href="/checkout/v1/success/"+data.order_id;

                                }).catch((response) => {
                                    $("#loading-indicator").hide();
                                    console.log("catch");
                                    console.log(JSON.stringify(response))

                                    //cb.errorHandler(response.message);

                                    var cbErrors = new Array();
                                    cbErrors.push(response.message);
                                    cb.errorHandler(cbErrors);

                                    gtag('event', 'initiate_pay_error', {
                                        'event_label': response.message,
                                        'event_category': 'ecommerce'
                                    });
                                    // cb.errorHandler(response.message);

                                });

                            


                        }              
                    } else {
                        $("#loading-indicator").length ? $("#loading-indicator").hide() : '';
                        cb.errorHandler(data.errors);
                    }
                });
            }
        });


        // Note: Shipping to Alaska and Hawaii will be $20 as per client requirement

        $(window).on('load', function () {
            $("#id_state").change(function () {

                var get_state_value = $(this).val();

                if (get_state_value == "AK" || get_state_value == "HI") {
                    $('#attentionMdl').modal('show');
                    $('input[name=ship_price_extra_feature]').val(1);
                } else {
                    $('input[name=ship_price_extra_feature]').val(0);
                }

                calculateTotal();
            });
        });

        function selectItemDatalayer(){   
            dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
            dataLayer.push({
                event: "select_item",
                ecommerce: {
                    items:item_obj
                    /*items: [
                        {
                            item_id: 'HEATEDVEST-L-01-Hatmeo',
                            item_name:  "Hatmeo Heated Vest",
                            affiliation: "",
                            quantity: pid,
                            coupon: '',
                            item_brand:'Hatmeo',
                            item_category: 'Hatmeo',
                            item_variant: 'product',
                            price: parseFloat(pprice.toFixed(2))
                        }
                    ]*/
                }
            });
        }
    </script>
    
    <script>(function(){"use strict";function n(n,e){var r;void 0===e&&(e="uclick");var c=null===(r=n.match(/\?.+?$/))||void 0===r?void 0:r[0];return c?Array.from(c.matchAll(new RegExp("[?&](clickid|"+e+")=([^=&]*)","g"))).map((function(n){return{name:n[1],value:n[2]}})):[]}function e(n){var e=n();return 0===e.length?{}:e.reduce((function(n,e){var r;return Object.assign(n,((r={})[e.name]=""+e.value,r))}),{})}function r(r){void 0===r&&(r="uclick");var c,t,u=e((function(){return(function(n){return void 0===n&&(n="uclick"),Array.from(document.cookie.matchAll(new RegExp("(?:^|; )(clickid|"+n+")=([^;]*)","g"))).map((function(n){return{name:n[1],value:n[2]}}))})(r)})),i=e((function(){return n(document.referrer,r)})),o=e((function(){return n(document.location.search,r)}));return(c=[r,"clickid"],t=[u,i,o],c.reduce((function(n,e){return n.concat(t.map((function(n){return[e,n]})))}),[])).map((function(n){return{name:n[0],value:n[1][n[0]]}})).find((function(n){return n.value}))||null}var c,t,u,i;(i=document.createElement("img")).src=(t=""+"https://binom.heomai.com/"+"click"+".php?payout=OPTIONAL",(u=r(c="uclick"))?t+"&cnv_id="+(u.name===c?"OPTIONAL":u.value)+(u.name===c?"&"+c+"="+u.value:""):t+"&cnv_id=OPTIONAL"),i.referrerPolicy="no-referrer-when-downgrade"})();</script>
</body>
</html>