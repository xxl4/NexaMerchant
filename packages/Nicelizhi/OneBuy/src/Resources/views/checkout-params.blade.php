<script>
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
        productParams.payment_vault = 1;
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
        productParams.products[0].product_id = productData.product.id;
        console.log(productParams, 'productParams')
    }
</script>