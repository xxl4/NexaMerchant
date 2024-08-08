<script src="https://checkout-demo.airwallex.com/assets/elements.bundle.min.js"></script>
<!-- <script src="https://checkout.airwallex.com/assets/elements.bundle.min.js"></script> -->
<script>
      // STEP #2: Initialize the Airwallex global context for event communication
      Airwallex.init({
        env: 'demo', // Setup which Airwallex env('staging' | 'demo' | 'prod') to integrate with
        origin: window.location.origin, // Setup your event target to receive the browser events message
        // components: ['cardNumber', 'expiry', 'cvc']
      });
      const cardNumber = Airwallex.createElement('cardNumber', {
      allowedCardNetworks: ['visa', 'maestro', 'mastercard', 'amex', 'unionpay', 'jcb']
    });
    const cardExpiry = Airwallex.createElement('expiry');
    const cardCvc = Airwallex.createElement('cvc');

    const domcardNumber = cardNumber.mount('cardNumber');
    const domcardExpiry = cardExpiry.mount('expiry');
    const domcardCvv = cardCvc.mount('cvc');

    domcardNumber.addEventListener('onReady', (event) => {
      /*
      ... Handle event
      */
      //window.alert(event.detail);
      // console.log(event.detail);
    });

    // STEP #8: Add an event listener to listen to the changes in each of the input fields
    domcardNumber.addEventListener('onChange', (event) => {
      console.log(event.detail)
      console.log(event.detail.complete)
    });

    domcardExpiry.addEventListener('onChange', (event) => {

      console.log(event.detail)
      console.log(event.detail.complete)
    });

    //id_cvc
    domcardCvv.addEventListener('onChange', (event) => {
      console.log(event.detail)
      console.log(event.detail.complete)
    });
      document.getElementById('payButton').addEventListener('click', () => {
        createOrder()
      });

      function createOrder() {
        paramsInit()
        productParams.pay_type = 'airwallex';
        productParams.cus_id = localStorage.getItem('cus_id') ? localStorage.getItem('cus_id') : '';

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
        .then(function(res) {
            crmTrack('add_pay')
            var data = res;
            console.log(data);
            //return false;
            if (data.result === 200) {

                var order_info = data.order;
                document.cookie = "voluum_payout=" + order_info.grand_total + order_info.order_currency_code + "; path=/";
                document.cookie = "order_id=" + order_info.id + "; path=/";
                localStorage.setItem("order_id", order_info.id);
                // localStorage.setItem("cus_id", data.customer.id);
                localStorage.setItem("order_params", JSON.stringify(productParams));

                console.log(data, 'data===window.is_airwallex');
                // document.querySelector(".submit-button").scrollIntoView({
                // behavior: "smooth"
                // })
                const airwallex_vault = localStorage.getItem("airwallex_vault");
                if (!isEmpty(airwallex_vault) && airwallex_vault == 1) {
                    console.log(airwallex_vault, 'customerId==')
                    Airwallex.createPaymentConsent({
                        intent_id: data.payment_intent_id, // intent id(Optional)
                        customer_id: localStorage.getItem('cus_id') ? localStorage.getItem('cus_id') : '', // customer id
                        client_secret: data.client_secret, // client secret
                        currency: '{{ core()->getCurrentCurrencyCode() }}', // currency
                        element: cardNumber, // either the card element or card number element depends on the element you integrate,
                        next_triggered_by: 'customer' // 'merchant' for MIT and 'customer' for CIT
                    }).then((response) => {
                        // STEP #6b: Listen to the request response
                        /* handle create consent response in your business flow */
                        window.alert(JSON.stringify(response));
                    });
                } else {
                    console.log(2222)
                    Airwallex.confirmPaymentIntent({
                    element: cardNumber,
                    id: data.payment_intent_id,
                    customer_id: data.customer.id,
                    client_secret: data.client_secret,
                    next_triggered_by: "customer",
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
            }
                
                
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
</script>

<script>
    var shippingAddress = JSON.parse('<?php echo $order->shipping_address; ?>');
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
        //   payment_vault2 = 1;
          script.src = `https://www.paypal.com/sdk/js?client-id=${paypal_pay_acc}&components=buttons,messages,funding-eligibility&buyer-country=US&vault=true&commit=true&currency=${currency}`;
          script.setAttribute('data-user-id-token', '<?php echo $paypal_id_token;?>');
      } else {
        //   payment_vault2 = 0;
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
              //console.log(order_info);
              //console.log(order_info.purchase_units[0].amount);
              document.cookie = "voluum_payout=" + order_info.purchase_units[0].amount.value + order_info.purchase_units[0].amount.currency_code + "; path=/";
              document.cookie = "order_id=" + order_info.id + "; path=/";
              localStorage.setItem("order_id", order_info.id);
              localStorage.setItem("order_params", JSON.stringify(productParams));
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
          var orderData = {
            paymentID: data.orderID,
            orderID: data.orderID,
          };
          var paypalParams = {
            first_name: '',
            second_name: '',
            email: '',
            phone_full: '',
            address: '',
            city: '',
            country: '',
            province: '',
            code: '',
            payment_method: 'paypal_stand'
          }
          var request_params = {
            client_secret: data.orderID,
            id: localStorage.getItem('order_id'),
            orderData: orderData,
            data: data,
            productParams: paypalParams
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
      }).render('#complete-btn-id');
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