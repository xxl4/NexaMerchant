<!-- <script src="https://checkout-demo.airwallex.com/assets/elements.bundle.min.js"></script> -->
<script src="https://checkout.airwallex.com/assets/elements.bundle.min.js"></script>
<script>
    var shippingAddress = '<?php echo addslashes(json_encode($order->shipping_address)); ?>';
    shippingAddress = JSON.parse(shippingAddress)
    console.log(shippingAddress, 'shippingAddress=')
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
        products: [
            {
                amount: "",
                description: "",
                product_id: "",
                price: "",
                img: "",
                attr_id: "",
                attribute_name: "",
                variant_id: null,
                product_sku: ""
            }
        ],
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
    var colorId = '';
    var sizeId = '';
    var colorAttr = '';
    var sizeAttr = '';
    var currency = '{{ core()->getCurrentCurrencyCode() }}';
    var paypal_pay_acc = '';
    function paypalInit() {
      const payment_vault =  localStorage.getItem('payment_vault');
      console.log(payment_vault, 'payment_vault')
      const existingScript = document.querySelector('script[src*="paypal.com/sdk/js"]');
      if (existingScript) {
          existingScript.remove();
      }

      // Create new script element
      const script = document.createElement('script');
      script.type = 'text/javascript';
      script.async = true;

      if (!isEmpty(payment_vault) && payment_vault == 1) {
          script.src = `https://www.paypal.com/sdk/js?client-id=${paypal_pay_acc}&components=buttons,messages,funding-eligibility&buyer-country=US&vault=true&commit=true&currency=${currency}`;
          script.setAttribute('data-user-id-token', '<?php echo $paypal_id_token;?>');
      } else {
        console.log(222222)
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
    function creatPaypalCardButton() {
      paypal.Buttons({
        style: {
          layout: 'horizontal',
          tagline: false,
          height: 55
        },

        onInit(data, actions) {

        },
        onError(err) {
          console.log("paypal " + JSON.stringify(err));
        },
        onCancel: function(data) {
        },
        onClick() {
        },
        // Call your server to set up the transaction
        createOrder: function(data, actions) {
          productParams.payment_method = 'paypal'
        //   productParams.payment_vault = localStorage.getItem('payment_vault') ? JSON.parse(localStorage.getItem('payment_vault')) : 0;
        // productParams.payment_vault = 1;
          paramsInit()
          crmTrack('add_pay')
          var url = '/onebuy/order/addr/after?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime() + "&force=" + localStorage.getItem("force");
          return fetch(url, {
            body: JSON.stringify(productParams),
            method: 'POST',
            headers: {
              'content-type': 'application/json'
            }
          }).then(function(res) {
            return res.json();
          }).then(function(res) {
            //$('#loading').hide();
            let data = res;
            console.log(data, 'data')
            if (data.statusCode === 201) {
              let order_info = data.result;
              localStorage.setItem("order_id", order_info.id);
              if (order_info.status === "COMPLETED") {
                gotoSuccess(data);
                return
              }
              return order_info.id;
            } else {
              if (data.code == '202') {
                if (confirm(data.error) == true) {
                  localStorage.setItem("force", 1);
                }
              }
            //   if (pay_error_message && pay_error_message.length) {
            //   }
            }
          });
        },

        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
          gotoSuccess(data)
        }
      }).render('#complete-btn-id');
    }
    function gotoSuccess(data) {
      var orderData = {
            paymentID: localStorage.getItem('order_id'),
            orderID: localStorage.getItem('order_id'),
          };
          var paypalParams = {
            first_name: shippingAddress.first_name || '',
            second_name: shippingAddress.last_name || '',
            email: shippingAddress.email || '',
            phone_full: shippingAddress.phone || '',
            address: shippingAddress.address1 || '',
            city: shippingAddress.city || '',
            country: shippingAddress.country || '',
            province: shippingAddress.state || '',
            code: shippingAddress.postcode || ''
          }
          var request_params = {
            client_secret: localStorage.getItem('order_id'),
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
              window.location.href = '/onebuy/checkout/v4/success/' + localStorage.getItem('order_id');
              return true;
            }
            if (res.error == 'INSTRUMENT_DECLINED') {
            }
          });
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
        productParams.products[0].attr_id = attr_id;
        productParams.products[0].attribute_name = attribute_name;
        productParams.payment_vault = '<?php echo $payment_paypal_vault;?>'
        productParams.payment_airwallex_vault = '<?php echo $payment_airwallex_vault;?>'
        productParams.payment_paypal_vault = '<?php echo $payment_paypal_vault;?>'
        if (!isEmpty(attr_id)) {
            const index2 = productData.attr.index2;
            for (const key in index2) {
                if (Object.prototype.hasOwnProperty.call(index2, key)) {
                    if (key == attr_id) {
                        productParams.products[0].variant_id = index2[key][0];
                        productParams.products[0].product_sku = index2[key][1];
                    }
                    
                }
            }
        } else {
            productParams.products[0].product_sku = productData.sku;
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
        productParams.products[0].product_id = productData.product.id; 
        console.log(productParams, 'productParams')
    }
</script>

<script>
  console.log('<?php echo $payment_airwallex_vault; ?>','<?php echo $payment_paypal_vault; ?>','payment_airwallex_vault==')
      // STEP #2: Initialize the Airwallex global context for event communication
      Airwallex.init({
        env: '<?php echo $app_env; ?>', // Setup which Airwallex env('staging' | 'demo' | 'prod') to integrate with
        origin: window.location.origin, // Setup your event target to receive the browser events message
        // components: ['cvc']
      });
    //const cardCvc = Airwallex.createElement('cvc');
    
    <?php if($payment_airwallex_vault==1) { ?>
      const cvc = Airwallex.createElement('cvc');
      cvc.mount('cvc'); 
    <?php }else {?>
      $('#expiry').show();
      $('#cardNumber').show();
      const cardNumber = Airwallex.createElement('cardNumber', {
        allowedCardNetworks: ['visa', 'maestro', 'mastercard', 'amex', 'unionpay', 'jcb']
      });
      const cardExpiry = Airwallex.createElement('expiry');
      const cvc = Airwallex.createElement('cvc');
      cvc.mount('cvc'); 
      cardNumber.mount('cardNumber');
      cardExpiry.mount('expiry');
    <?php } ?>

      document.getElementById('payButton').addEventListener('click', () => {
        createOrder()
      });

      function createOrder() {
        paramsInit()
        productParams.pay_type = 'airwallex';
        <?php if($payment_airwallex_vault==1) { ?>
          productParams.cus_id = localStorage.getItem('cus_id') ? localStorage.getItem('cus_id') : '';
        <?php } ?>

        //console.log(JSON.stringify(productParams));
        //return false;
        var url = '/onebuy/order/add/sync?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime()+ "&force=" + localStorage.getItem("force");;

        fetch(url, {
            body: JSON.stringify(productParams),
            method: 'POST',
            headers: {
            'content-type': 'application/json'
            },
        })
        .then(function(res) {
            return res.json()
        })
        .then(async function(res) {
            crmTrack('add_pay')
            var data = res;
            console.log(data);
            //return false;
            if (data.result === 200) {

                var order_info = data.order;
                localStorage.setItem("order_id", order_info.id);

                console.log(data, 'data===window.is_airwallex');

                customer_id = localStorage.getItem('cus_id') ? localStorage.getItem('cus_id') : '';
                payment_consent_id = localStorage.getItem('payment_consent_id') ? localStorage.getItem('payment_consent_id') : '';

                // const aUrl = "/onebuy/order/confirm?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&payment_intent_id=" + data.payment_intent_id + "&order_id=" + data.order.id + "&cus_id=" + customer_id;
                // let aResponse = await fetch(aUrl);
                // if (!aResponse.ok) {
                //     throw new Error('Network response was not ok');
                // }
                // let aData = await aResponse.json();
                // console.log(aData, 'aData==')
                <?php if($payment_airwallex_vault==1) { ?>

                    Airwallex.confirmPaymentIntent({
                        id: data.payment_intent_id, // intent id(Optional)
                        client_secret: data.client_secret, // client secret
                        // currency: '{{ core()->getCurrentCurrencyCode() }}', // currency
                        element: cvc, // either the card element or card number element depends on the element you integrate,
                        payment_consent_id: payment_consent_id // 'merchant' for MIT and 'customer' for CIT
                    }).then((response) => {
                        // STEP #6b: Listen to the request response
                        /* handle create consent response in your business flow */
                        $('#loading').hide();

                        window.location.href = "/onebuy/checkout/v4/success/" + data.order.id;
                        return false;
                    });

                <?php }else { ?>

                    console.log(2222)
                    Airwallex.confirmPaymentIntent({
                    element: cardNumber,
                    id: data.payment_intent_id,
                    // customer_id: data.customer.id,
                    client_secret: data.client_secret,
                    // next_triggered_by: "customer",
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

                window.location.href = "/onebuy/checkout/v2/success/" + data.order.id;
                return false;

                }).catch((response) => {
                $('#loading').hide();
                console.log("catch");
                console.log(JSON.stringify(response))

                alert(response.message)

                return false;

                });   


                
                
                <?php } ?>
                
                
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

        function isEmpty(value) {
          if (value == null) return true;

          if (typeof value === 'string' && value.trim() === '') return true;

          if (Array.isArray(value) && value.length === 0) return true;

          if (typeof value === 'object' && Object.keys(value).length === 0 && value.constructor === Object) return true;

          return false;
        }
</script>
