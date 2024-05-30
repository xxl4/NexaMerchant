//Add Ons Place Change
if (!/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    $(`.cb-add-one`).appendTo('.md-add-ons');
}  
var step = 1;
$(".cb-step").each(function () {
    $(this).html(step);
    step++;
});
//End of Add Ons Place Change
$(".cb-whats-this").on("click", function () {
    $(".cb-cvv-box").toggleClass("show-cvv");
});
$(".cb-cvv-close").on("click", function () {
    $(".cb-cvv-box").removeClass("show-cvv");
});
// Start of pre Selected Products By Qty
var preSeletedProductQuantity = app_query_params.package;
setTimeout(function () {
    // Updated code Start
    let packages = [];
    $(".cb-package-container").each(async function () {
        packages.push(parseInt($(this).attr('data-quantity')));
    });

    if(!packages.includes(parseInt(app_query_params.package))){
        for(key in productsNames[app_current_step.id]['mainProduct']){
            if(productsNames[app_current_step.id]['mainProduct'][key]['product'][0]['is_active'])
            {
                preSeletedProductQuantity = key;
                break;
            } 
        }   
    }
    // Updated code End

    $(".cb-package-container").each(async function () {
        let productQty = parseInt($(this).attr('data-quantity'));
        if (productQty == preSeletedProductQuantity) {
            $(this).appendTo('.cb-first-item');
            $(this).click();
        }
    });
}, 1000);
// Start of pre Selected Products By Qty
$(".cb-package-container").each(function () {
    var discount = $(this).data('package-discount');
    $(this).find('.cb-package-main-save').html(`Save ${discount}%`);
    $(this).find('.cb-package-main-save2').html(`${discount}%`);
});

if (discount_val != '') {
    innerButton_discount(discount_val);
}
//-----on ready - Exit-popup-------//
//--------------Discpunt-pop-up-functionality + price changes-------------------//
$('#innerButton1').click(function () {
    innerButton_discount(10);
});
$('#innerButton2').click(function () {
    innerButton_discount(15);
});
$('.cb-discount-off').hide();
$('.cb-discount-off-order-summary').hide();
async function innerButton_discount(discount) {
    var percnt = discount / 100;
    window.percnt = percnt;
    window.discount = discount;
    $(".discountStrip").show();
    $(".cb-discountPercentage").show().html(`+ ${discount}% OFF`);
    $(".cb-discountPercentage-bnr").show().html(`+ ${discount}%`); 
    $('.cb-discount-off').html(`+ ${parseInt(discount)}% OFF`);
    $('.cb-discount-off-order-summary').html(`+ ${parseInt(discount)}%`); 
    $('.special-dis').find('.cb-discount-off').html(`+ <span class="text-danger font-weight-bold">${parseInt(discount)}%</span>`); 
    discountTimes = 0;
    if (discount == 10) {
        discountTimes = 2;
    }
    switch (parseInt(discount)) {
        case 5:
            $("input[name='coupon_code']").val('DISCOUNT5')
            break;
        case 10:
            $("input[name='coupon_code']").val('DISCOUNT10')
            break;
        case 15:
            $("input[name='coupon_code']").val('DISCOUNT15')
            break;
        case 20:
            $("input[name='coupon_code']").val('DISCOUNT20')
            break;
        case 25:
            $("input[name='coupon_code']").val('DISCOUNT25')
            break;
    }
    await updateProductPrice();
    await showPriceCheckout();
    var section_pay = $('.cb-paypemt-radio:checked').data("paymentmethod");
    await product_selection(section_pay);
}
function updateProductPrice() {
    return new Promise(resolve => {
        let percnt = window.percnt || 0;
        $(".cb-package-container").each(async function () {
            let productPrice = parseFloat($(this).attr('data-price'));
            let productValue = math.round(parseFloat(productPrice - productPrice * percnt),2).toFixed(2);
            let productQty = parseFloat($(this).attr('data-quantity')).toFixed(2);
            $(this).find(".cb-reg-price").html('$' + parseFloat($(this).attr('data-regPrice')).toFixed(2));
            $(this).find(".cb-buy-each").html('$' + (productValue / productQty).toFixed(2));
            $(this).attr('data-unitPrice', (productValue / productQty).toFixed(2));
            $(this).find(".cb-buy").html('$' + parseFloat(productValue).toFixed(2));
            $(this).find(".cb-save-price").html('$' + ($(this).attr('data-regPrice') - productValue).toFixed(2) + '!');
            $(this).attr('data-productPrice', parseFloat(productValue).toFixed(2));
            $(this).find(".cb-persentage").html(parseFloat($(this).attr('data-package-discount')).toFixed(0));
        });
        resolve(true);
    });
}
//  *******************END OF POP UP WORK **********************************//
$(document).on('click','.cb-package-container', async function(evt){
    $('.cb-package-container').removeClass("selected");
    $(this).addClass("selected");
    await updateProductPrice();
    await showPriceCheckout();
    evt.stopPropagation();
    var section_pay = $('.cb-paypemt-radio:checked').data("paymentmethod");
    await product_selection(section_pay);
});
function showPriceCheckout() {
    return new Promise(resolve => {
        var selectedId = $('.cb-package-container.selected').attr('id');
        var data_quantity = $(`#${selectedId}`).attr("data-quantity");
        var selectedProductTotalValue = $(`#${selectedId}`).attr('data-productPrice');
        var selectedProductShippingValue = $(`#${selectedId}`).attr("data-ship");
        var product_regPrice = $(`#${selectedId}`).attr('data-regPrice');
        var warrantyOriginalPrice = (parseFloat(product_regPrice)*.20).toFixed(2)
       
        var productName = $(`#${selectedId}`).data("name");
        var discountPercentage = $(`#${selectedId}`).attr("data-package-discount");
        var productStaticPrice = $(`#${selectedId}`).attr('data-warranty');
        var clickbumpPrice = (parseFloat(productStaticPrice).toFixed(2));
        var newClickbumpEachPrice = math.round((clickbumpPrice/data_quantity ),2).toFixed(2);
        $('.cb-warranty-original-price').html('$' + (warrantyOriginalPrice));
        $('.cb-warranty-price').html('$' + newClickbumpEachPrice + '/ea');
        $('.cb-click-bump-price').val(clickbumpPrice);
        $(".cb-check-status").attr('data-price', clickbumpPrice);
        let totalPrice = 0;
        if ($(".cb-check-status").prop("checked")) {
            totalPrice = (parseFloat(product_regPrice) + parseFloat(warrantyOriginalPrice)).toFixed(2);
            var step1ProductTotalValue = (parseFloat(selectedProductTotalValue) + parseFloat(clickbumpPrice)).toFixed(2);
            $(".cb-click-bump-order-sum-div").removeClass('d-none');
            $(".cb-click-bump-order-sum-div").addClass('d-flex');
        } else {
            var step1ProductTotalValue = parseFloat(selectedProductTotalValue);
            totalPrice = product_regPrice;
            $(".cb-click-bump-order-sum-div").removeClass('d-flex');
            $(".cb-click-bump-order-sum-div").addClass('d-none');
        }

        var total_discount = totalPrice - step1ProductTotalValue;

        $(".cb-shipping-price").text('$' + selectedProductShippingValue);
        var totalAmount = (parseFloat(step1ProductTotalValue) + parseFloat(selectedProductShippingValue)).toFixed(2);
        $(".cb-total-discount-applied").html(`${parseInt(discountPercentage)}%`);
        $(".cb-total-discount").html(`${total_discount.toFixed(2)}`);
        //only product price
        
        $(".cb-product-price").html(selectedProductTotalValue);
        $(".cb-gtotal").text('$' + totalAmount);
        $(".cb-gtotal-without-shipping").text('$' + (parseFloat(totalAmount) - parseFloat(selectedProductShippingValue)).toFixed(2));
        //product name change
        $(".cb-cart-title").html(productName);
        $(".cb-retail-price").text('$' + product_regPrice);
        $(".cb-real-price").text('$' + selectedProductTotalValue);

        // image change
        var selectedImageSrc = $(`#${selectedId}`).find('.product-img').attr('src');
        $(".cb-orderd-product-img").attr("src", selectedImageSrc);
        $(".product_regPrice").text(product_regPrice);
        var product_individualPrice = $(`#${selectedId}`).attr('data-unitPrice');
        $("[name=regprice]").val(product_regPrice);
        $("[name=individualPrice]").val(product_individualPrice);
        $("[name=packageQuantity]").val(data_quantity);
        if (selectedProductShippingValue != 0) {
            $("#shiptext").text("FAST INSURED SHIPPING");
        }else{
            $("#shiptext").text("FAST N' FREE INSURED SHIPPING");
        }
        resolve(true);
    });
}
function product_selection(section_pay) {
    return new Promise(resolve => {
        var discount = window.discount || 0;
        if (discount != "0") {
            $('.cb-discount-off').show();
            $('.cb-discount-off-order-summary').show();
        } else {
            $('.cb-discount-off').hide();
            $('.cb-discount-off-order-summary').hide();
        }
        let campType;
        if (section_pay == 'paypal') {
            //campType = 'PP';
            $('.cb-remove-class-billing').removeClass('required');
            $('.cb-remove-class').removeClass('required');
            $('select[name=creditCardType]').val('paypal').trigger('change');
            $(".cb-whats-this").hide();
            if ($("select[name='shippingCountry']").val() == 'CA') {
                campType = 'PPCA';
            } else {
                campType = 'PPUS';
            }
            
        } else if (section_pay == 'credit_card') {
           // $('.cb-remove-class').addClass('required');
           $(".cb-remove-class, .cb-remove-class-billing").each(function() {
                if(!$(this).hasClass("no-error")){
                    $(this).addClass("required")
                }
            });
            $('[name="creditCardNumber"]').val($('[name="creditCardNumber"]').val()).trigger('change');
            if ($(".cb-address-differs-check").is(':checked')) {
                $('.cb-remove-class-billing').removeClass('required');
            } else {
                $('.cb-remove-class-billing').addClass('required');
            }
            $(".cb-whats-this").show();
            var cntry = $("select[name='shippingCountry']").val();
            if (cntry == 'CA') {
                campType = 'CA';
            } //end of CA
            else {
                campType = 'US';
            } //end of US
        } //end of CC-if
        var qty = $('.cb-package-container.selected').attr("data-quantity");
        if (qty) {
            $("[name='campaigns[1][id]']").val(productsNames[app_current_step.id]['mainProduct'][qty]['camp'][campType]);
            $("[name='campaigns[2][id]']").val(productsNames[app_current_step.id]['splitProduct']['1']['camp'][campType]); 
        }
        
        try {
            validateCoupon();
        } catch (error) {
            console.error(error)
        }
        setSessionParams();
        resolve(true);
    });
} //end of Function
//------------------for checkout v1, and v3 ------------------------//
$(document).on('click','.cb-paypemt-radio', async function() {
    var section_pay = $('.cb-paypemt-radio:checked').data("paymentmethod");
    if (section_pay == 'paypal') {
        $('.cb-ccheader').hide();
        $('.cb-ppheader').show();
        $('.cb-payment-pp').addClass('active');
        $('.cb-payment-cc').removeClass('active');
        $('#kform_paySourceCard').hide();
        $('input[name="creditCardNumber"]').val('');
        $('input[name="creditCardNumber"]').val('');
        $('input[name="CVV"]').val('');
        $('select[name="expmonth"]').val('');
        $('select[name="expyear"]').val('');
    } else {
        $('.cb-ccheader').show();
        $('.cb-ppheader').hide();
        $('.cb-payment-pp').removeClass('active');
        $('.cb-payment-cc').addClass('active');
        $('#kform_paySourceCard').show();
    }
    var section_pay = $('.cb-paypemt-radio:checked').data("paymentmethod");
    await product_selection(section_pay);
});
// -- Payment method change function -- //
$(document).on('click','.cb-paypal-method', async function(event) {
    section_pay = "paypal";
    await product_selection(section_pay);
});
$(document).on('click','.cb-checkout-button', async function(){ 
    if ($('.cb-paypemt-radio:checked').data("paymentmethod") != 'paypal') {
        section_pay = "credit_card";
        await product_selection(section_pay);
    } else {
        section_pay = "paypal";
        await product_selection(section_pay);
    }
});
//--------------------------Bill-SHIP------------------------//  
$(document).on('change','.cb-address-differs-check',function(){
    if ($(".cb-address-differs-check").is(':checked')) {
        $('input[name="billingSameAsShipping"]').filter('[value="yes"]').prop('checked', true).trigger('change');
    } else {
        $('input[name="billingSameAsShipping"]').filter('[value="no"]').prop('checked', true).trigger('change');
        $('input[name="billingAddress2"]').removeClass("required");
    }
}); 
//------------------AMEX CARD chceking----------------------// 
$(document).on('change','select[name=creditCardType]', function(){

    if ($(this).val() == 'paypal') { 
        $('.cb-credit-card-block').hide();
    } else {
        $('.cb-credit-card-block').show();
    }

    if ($(this).val() == 'amex') {
        $('input[name=CVV]').attr('maxlength', '4');
    } else {
        $('input[name=CVV]').attr('maxlength', '3');
    }
});
//--------------------ClickBump-Check--------------------//
$('.cb-check-status').change(function () {
    if (this.checked) {
        $(".cb-check-status").prop("checked", true);
        enableSplitCampaigns();
    } else {
        $(".cb-check-status").prop("checked", false);
        disableSplitCampaigns();
    }
});
async function enableSplitCampaigns() {
    $('.cb-split-click-bump').prop('disabled', false);
    $('.cb-click-bump-price').prop('disabled', false);
    await updateProductPrice();
    await showPriceCheckout();
    var section_pay = $('.cb-paypemt-radio:checked').data("paymentmethod");
    await product_selection(section_pay);
}
async function disableSplitCampaigns() {
    $('.cb-split-click-bump').prop('disabled', true);
    $('.cb-click-bump-price').prop('disabled', true);
    await updateProductPrice();
    await showPriceCheckout();
    var section_pay = $('.cb-paypemt-radio:checked').data("paymentmethod");
    await product_selection(section_pay);
}
//-------------------Bottom Pop Up----------------//
var firstArray = ['James', 'Mary', 'Robert', 'Jennifer', 'Michael', 'Elizabeth', 'Thomas', 'Nancy', 'Charles', 'Margaret', 'David', 'Ashley', 'Benjamin', 'Frank', 'Hannah', 'Karen', 'Lucy', 'Oscar', 'Peter', 'Rachel', 'Steve', 'Vanessa'];
var lastArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'V', 'W', 'Y'];
var locationArray = ['Birmingham, AL', 'Phoenix, AZ', 'Little Rock, AR', 'Los Angeles, CA', 'Denver, CO', 'Wilmington, DE', 'Washington D.C.', 'Jacksonville, FL', 'Atlanta, GA', 'Boise, ID', 'Chicago, IL', 'Indianapolis, IN', 'Wichita, KS', 'Louisville, KY', 'New Orleans, LA', 'Boston, MA', 'Lansing, MI', 'Jackson, MS', 'Omaha, NE', 'Las Vegas, NV', 'Newark, NJ', 'New York, NY', 'Albuquerque, NM', 'Charlotte, NC', 'Columbus, OH', 'Oklahoma City, OK', 'Philadelphia, PA', 'Columbia, SC', 'Memphis, TN', 'Houston, TX', 'Salt Lake City, UT', 'Seattle, WA', 'Milwaukee, WI', 'Cheyenne, WY'];
var quantityArray = ['1', '2', '3', '4', '5'];
setInterval(function () {
    var randTime = Math.floor((Math.random() * 40) + 5);
    $('#randTime').html(randTime);

    var firstRand = Math.floor(Math.random() * firstArray.length);
    var randFirst = firstArray[firstRand];
    $('#randFirst').html(randFirst);
    var lastRand = Math.floor(Math.random() * lastArray.length);
    var randLast = lastArray[lastRand];
    $('#randLast').html(randLast);
    var locationRand = Math.floor(Math.random() * locationArray.length);
    var randLocation = locationArray[locationRand];
    $('#randLocation').html(randLocation);

    var quantityRand = Math.floor(Math.random() * quantityArray.length);
    var randQuantity = quantityArray[quantityRand];
   
    $('#randQuantity').html(randQuantity);
    if (randQuantity > 1){
        $('#quantity-plural').html('s');
    }else { 
        $('#quantity-plural').html('');
    }
    $('.w_fomo_wrapper').addClass("notify");
    setTimeout(function () {
        $('.w_fomo_wrapper').removeClass("notify");
    }, 5400);
}, 15000);
//----End of Bottom Pop U-----//
// -- DataLayer Params Update -- //
function setSessionParams() {
    $.ajax({
        url: "update-data.php?act=data-layer-update-config",
        type: 'POST',
        data: {
            couponCode: $("input[name='coupon_code']").val(),
            regprice: $('[name=regprice]').val(),
            individualPrice: $('[name=individualPrice]').val(),
            packageQuantity: $('[name=packageQuantity]').val(),
            steps: "steps",
            index: app_current_step.id,
        },
        success: function (data) { }
    });
}
// --End of DataLayer Params Update -- //
const validateEmail = (email) => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
//partial prospect start
$("input[name='firstName'], input[name='lastName'],input[name='phone'],input[name='email']").on('change', function () {
    let execute = true;
    $("input[name='firstName'], input[name='lastName'], input[name='email']").each(function () {
        if ($(this).val() == "" || !validateEmail($("input[name=email]").val())) {
            execute = false;
            return false;
        }
    });
    if (execute) {
        try {
            stickyProspect.updateOrCreateProspect()
                .then((res) => {
                    if (res.success) {
                        dataLayer.push({
                            event: "contact_info_saved"
                        });
                    } else {
                        dataLayer.push({
                            event: "contact_info_save_error"
                        });
                    }
                });
        } catch (error) {
            console.error(error)
        }
    }
});
//partial prospect end
//-------------validateCoupon-----------//
function validateCoupon() {
    $.ajax({
        type: "POST",
        url: app_config.offer_path + AJAX_PATH + "extensions/coupons/validate-coupon",
        data: {
            coupon_code: $("input[name='coupon_code']").val(),
            campaign_id: $("[name='campaigns[1][id]']").val(),
            email: $("input[name='email']").val(),
        },
        cache: false,
        success: function (data) {
        }
    });
}
//-------------validateCoupon end-----------//
$("select[name='shippingCountry']").change(function () {
    if ($(this).val() == "US") {
        $("input[name='shippingZip']").prop("type", "tel");
    } else {
        $("input[name='shippingZip']").prop("type", "text");
    }
});
$("select[name='billingCountry']").change(function () {
    if ($(this).val() == "US") {
        $("input[name='billingZip']").prop("type", "tel");
    } else {
        $("input[name='billingZip']").prop("type", "text");
    }
});
$("form").on('submit', function () {
    if($("select[name=creditCardType]").find(":selected").val() === "paypal"){
       
        if ($("select[name='shippingCountry']").val() === '') {
            $("select[name='shippingCountry']").val(cnty_code).trigger('change');
        }

        if ($("input[name='email']").hasClass('has-error')) {
            $("input[name='email']").val('');
        }
        
        if ($("select[name='billingCountry']").val() === '') {
            $("select[name='billingCountry']").val(cnty_code).trigger('change');
        }
    }

    if ($("select[name='creditCardType']").val() == 'amex') {
       
       if( $('input[name=CVV]').val().length != 4 )
       {  
            $('input[name=CVV]').removeClass('no-error');
            $('input[name=CVV]').addClass('has-error');
            
       }
        
    } else {
       
        
        if( $('input[name=CVV]').val().length !=3 )
       {
           $('input[name=CVV]').removeClass('no-error');
           $('input[name=CVV]').addClass('has-error');
       }
    }
}); 

function updateProductData() {
    return new Promise(async (resolve) => {
        let campType;
        if ($('select[name=creditCardType]').val() == 'paypal') {
            if ($("select[name='shippingCountry']").val() == 'CA') {
                campType = 'PPCA';
            } else {
                campType = 'PPUS';
            }
        } else {
            if ($("select[name='shippingCountry']").val() == 'CA') {
                campType = 'CA';
            } else {
                campType = 'US';
            }
        }
        await Promise.bind(Object.keys(productsNames[app_current_step.id]).forEach(packagekey => {
            Object.keys(productsNames[app_current_step.id][packagekey]).forEach(key => {
                let campId = productsNames[app_current_step.id][packagekey][key]['camp'][campType];
                productsNames[app_current_step.id][packagekey][key]['product'] = [...productsNames[app_current_step.id][packagekey][key]['product'], ...JSON.parse(campaigns[campId]['product_array'])];
                productsNames[app_current_step.id][packagekey][key]['shipping_price'] = parseFloat(campaigns[campId]['shipping_price']);
            });
        }));

        let mainProduct = productsNames[app_current_step.id]['mainProduct'];
        await Promise.bind(Object.keys(mainProduct).forEach(key => {
            let productDetails = mainProduct[key]['product'][0];
            $(".cb-package-container").filter(`#product${key}`).attr('data-quantity', key);
            $(".cb-package-container").filter(`#product${key}`).attr('data-price', productDetails['product_price']);
            $(".cb-package-container").filter(`#product${key}`).attr('data-regPrice', productDetails['retail_price']);
            $(".cb-package-container").filter(`#product${key}`).attr('data-ship', mainProduct[key]['shipping_price']);
            $(".cb-package-container").filter(`#product${key}`).attr('data-warranty', productDetails['data_warranty']);
            $(".cb-package-container").filter(`#product${key}`).attr('data-name', productDetails['data_name']);
            $(".cb-package-container").filter(`#product${key}`).attr('data-package-discount', productDetails['data_discount']);
        }));
        resolve(true);
    });
} //end of Function

$("select[name='shippingCountry']").on('change', async function (e) {
        await updateProductData();
        await updateProductPrice(); 
        await showPriceCheckout();
        await product_selection( $('.cb-paypemt-radio:checked').data("paymentmethod"));
});
//--price change ajax call---//
$("select[name=creditCardType]").on('change', async function (e) {
    if (e.originalEvent !== undefined){
        await updateProductData();
        await updateProductPrice(); 
        await showPriceCheckout();
    }
    if($(this).val() != 'amex'  &&  String($("input[name=CVV]").val()).length > 3) {
        $("input[name=CVV]").val('');
    }
})
//--price change ajax call---//
$("select[name=creditCardType]").on('change', function () {
    if($(this).val() != 'amex'  &&  String($("input[name=CVV]").val()).length > 3) {
        $("input[name=CVV]").val('');
    }
})

$("#applyCoupon1,#applyCoupon2").on("click", function(e) {
    e.preventDefault();
    applyCoupon();
});
var coupon = "";

function applyCoupon() {
    cb.errorHandler(['Please enter a valid coupon.']);
}