<div class="htmleaf-container">
            <form id="myForm">

	        <div class="full-container">
	            <div class="row">
	                <div class="col-md-offset-3 col-md-12">
	                    <div class="panel-group" id="accordion">


                        <?php if($payments['payal_standard']==1) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <div class="panel-title-header" id="headingOne2">
                                        <div class="form-check form-check-inline" style="width: 100%;">
                                            <input class="form-check-input" type="radio" value="paypal_standard" id="payal_standard" <?php if($payments_default=='payal_standard') echo 'checked'; ?> name="payment_method">
                                            <label class="form-check-label" for="payal_standard" style="float: right;min-width: 95%;">
                                            <span>@lang('onebuy::app.product.payment.paypal.title') </span>
                                            <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/paypal.png" style="max-height:24px" /></div>
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
                        <?php } ?>


                        <?php if($payments['airwallex_credit_card']==1) { ?>
	                        <div class="panel panel-default">
	                            <div class="panel-heading"  id="headingOne">
	                                <h4 class="panel-title">
	                                    <div class="panel-title-header" id="headingOne1">
                                            <div class="form-check form-check-inline" style="width: 100%;">
                                                <input class="form-check-input" type="radio" name="payment_method" id="payment_method_airwallex" <?php if($payments_default=='payment_method_airwallex') echo 'checked'; ?> value="airwallex">
                                                <label class="form-check-label" for="payment_method_airwallex" style="float: right;min-width: 95%;">
                                                    <span>@lang('onebuy::app.product.payment.creditCard.title')</span>

                                                    <div class="text-right" style="min-width:190px; display: inline;float: right;">
                                                        <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/0169695890db3db16bfe.svg" />
                                                        <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/ae9ceec48b1dc489596c.svg" />
                                                        <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/f11b90c2972f3811f2d5.svg" />
                                                        <img src="https://cdn.shopify.com/shopifycloud/checkout-web/assets/37fc65d0d7ac30da3b0c.svg" />
                                                    </div>

                                                </label>
                                            </div>
                                            
                                        </div>
	                                </h4>
	                            </div>
	                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	                                <div class="panel-body">
                                    <div style={containerStyle}>
                                        <div>@lang('onebuy::app.product.payment.creditCard.card_number')</div>
                                        <div id="cardNumber" class="form-floating input-group has-icon-left" style="
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
            background-color: #fff;
            -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
            line-height: 1.25;padding: 1rem 0.75rem "></div>
                                    </div>
                                    <div style={containerStyle}>
                                        <div>@lang('onebuy::app.product.payment.creditCard.Expiry')</div>
                                        <div id="cardExpiry" style="
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
            background-color: #fff;
            -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
            line-height: 1.25;padding: 1rem 0.75rem "></div>
                                    </div>
                                    <div style={containerStyle}>
                                        <div>@lang('onebuy::app.product.payment.creditCard.cvc')</div>
                                        <div id="cardCvc" style="
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
            background-color: #fff;
            -webkit-box-sizing: border-box;height: calc(3.5rem + 2px);
            line-height: 1.25;padding: 1rem 0.75rem "></div>
                                    </div>
	                                </div>
	                            </div>
	                        </div>
                            <?php } ?>


                        <?php if($payments['airwallex_klarna']==1) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <div class="panel-title-header" id="headingThree2">
                                        <div class="form-check form-check-inline" style="width: 100%;">
                                            <input class="form-check-input" type="radio" value="airwallex-klarna" id="airwallex-klarna" <?php if($payments_default=='airwallex-klarna') echo 'checked'; ?> name="payment_method">
                                            <label class="form-check-label" for="airwallex-klarna" style="float: right;min-width: 95%;">
                                            <span>@lang('onebuy::app.product.payment.klarna.title')</span>
                                            <div style="float: right;min-width: 200px;display: inline;text-align: right;"><img src="/checkout/v1/app/desktop/images/Klarna.png" style="max-height:24px" /></div>
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
                        <?php } ?>

                        
                        


            <?php if($payments['airwallex_dropin']==1) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="airwallex_dropin_head_1">
                        <h4 class="panel-title">
                            <div class="panel-title-header" id="airwallex_dropin_2">
                                <div class="form-check form-check-inline" style="width: 100%;">
                                    <input class="form-check-input" type="radio" value="airwallex_dropin" id="airwallex_dropin" <?php if($payments_default=='airwallex_dropin') echo 'checked'; ?> name="payment_method">
                                    <label class="form-check-label" for="airwallex_dropin" style="float: right;min-width: 95%;">
                                    <span>@lang('onebuy::app.product.payment.airwallex_dropin.title') </span>
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
	            

            <?php } ?>                
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
        </form>
</div>

<div class="submit-block" style="padding-top:10px;">
    <div class="submit-content">
        
        <div class="zoom-fade submit-button" id="payment-button" style="text-align:center;">@lang('onebuy::app.product.payment.complete_secure_purchase')</div>
        <div id="checkout-error" style="color:#e51f28;display:none;"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        <?php if($payments_default=='airwallex-klarna') { ?>

            $("#collapseThree").show();
            $("#headingThree2").addClass("action");
            $("#payment-button").addClass("airwallex-pay");

        <?php } elseif($payments_default=='payal_standard') { ?>
            $("#collapseTwo").show();
            $("#headingOne2").addClass("action");

        <?php } elseif($payments_default=='payment_method_airwallex') { ?>
            $("#collapseOne").show();
            $("#headingOne1").addClass("action");

        <?php } ?>

        $("#payment_method_airwallex").on("click", function(){
            console.log("click headingOne ");
            $("#collapseOne").show();
            $("#collapseTwo").hide();
            $("#collapseThree").hide();
            $("#airwallex_dropin_collapse").hide();

            $("#headingOne1").addClass("action");
            $("#headingThree2").removeClass("action");
            $("#headingOne2").removeClass("action");
            $("#airwallex_dropin_2").removeClass("action");

        });

        $("#payal_standard").on("click", function(){
            $("#collapseOne").hide();
            $("#collapseTwo").show();
            $("#collapseThree").hide();
            $("#airwallex_dropin_collapse").hide();

            $("#headingOne2").addClass("action");
            $("#headingOne1").removeClass("action");
            $("#headingThree2").removeClass("action");
            $("#airwallex_dropin_2").removeClass("action");

        });

        $("#airwallex-klarna").on("click", function(){
            $("#collapseOne").hide();
            $("#collapseTwo").hide();
            $("#collapseThree").show();
            $("#airwallex_dropin_collapse").hide();

            $("#headingThree2").addClass("action");
            $("#headingOne1").removeClass("action");
            $("#headingOne2").removeClass("action");
            $("#airwallex_dropin_2").removeClass("action");
        })

        $('#airwallex_dropin').on("click", function(){
            $("#collapseOne").hide();
            $("#collapseTwo").hide();
            $("#collapseThree").hide();
            $("#airwallex_dropin_collapse").show();

            $("#airwallex_dropin_2").addClass("action");
            $("#headingThree2").removeClass("action");
            $("#headingOne1").removeClass("action");
            $("#headingOne2").removeClass("action");
        })

        $("#payment-button").on("click", function(){
            var payment_method = $('input[name=payment_method]:checked', '#myForm').val();
            console.log("payment method" + payment_method);
            if(payment_method=="airwallex") {
                var id_card = $("#id_card").val();
                var id_expiry = $("#id_expiry").val();
                var id_cvc = $("#id_cvc").val();
                console.log(id_card);
                console.log(id_expiry);
                console.log(id_cvc);
                if(id_card!="true" && id_expiry!="true" && id_cvc!="true") {
                    
                    if(id_card!="true") $("#cardExpiry").addClass("shipping-info-input-error");
                    if(id_expiry!="true") $("#cardNumber").addClass("shipping-info-input-error");
                    if(id_cvc!="true") $("#cardCvc").addClass("shipping-info-input-error");
                    return false;
                }
                console.log("airwallex-pay");
                gtag('event', 'initiate_airwallex_checkout', {
                    'event_label': 'Initiate airwallex Checkout',
                    'event_category': 'ecommerce'
                });
            }
            if(payment_method=="paypal_standard") {
                gtag('event', 'initiate_paypal_standard_checkout', {
                    'event_label': 'Initiate paypal_standard Checkout',
                    'event_category': 'ecommerce'
                });
                //fbq('track', 'InitiateCheckout');

                window.pay_type = "paypal_standard";
                window.is_paypal_standard = true;
                console.log("paypal standard payment "+window.pay_type);
                console.log("paypal standard payment "+window.is_paypal_standard);
            }
            if(payment_method=='airwallex_dropin') {
                gtag('event', 'initiate_airwallex_dropin_checkout', {
                    'event_label': 'Initiate airwallex_dropin Checkout',
                    'event_category': 'ecommerce'
                });
                //fbq('track', 'InitiateCheckout');

                window.pay_type = "airwallex_dropin";
                window.is_airwallex_dropin = true;
                console.log("airwallex_dropin payment "+window.airwallex_dropin);
                console.log("airwallex_dropin payment "+window.is_airwallex_dropin);
            }
            if(payment_method=='airwallex-klarna') {
                gtag('event', 'initiate_airwallex_klarna_checkout', {
                    'event_label': 'Initiate airwallex_klarna Checkout',
                    'event_category': 'ecommerce'
                });
                window.pay_tpe = "airwallex_klarna";
                window.is_airwallex_klarna = true;

            }
            if(payment_method=='airwallex_dropin') {
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