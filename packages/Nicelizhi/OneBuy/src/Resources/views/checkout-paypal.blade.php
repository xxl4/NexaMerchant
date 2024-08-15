<script>
  function paypalInit() {
    const existingScript = document.querySelector('script[src*="paypal.com/sdk/js"]');
    if (existingScript) {
      existingScript.remove();
    }

    // Create new script element
    const script = document.createElement('script');
    script.type = 'text/javascript';
    script.async = true;

    const paypalAcc = '<?php echo $paypal_pay_acc; ?>';
    <?php if ($payment_airwallex_vault == 1) { ?>
      script.src = `https://www.paypal.com/sdk/js?client-id=${paypalAcc}&components=buttons,messages,funding-eligibility&vault=true&commit=true&currency=${currency}`;
      script.setAttribute('data-user-id-token', '<?php echo $paypal_id_token; ?>');
    <?php } else { ?>
      script.src = `https://www.paypal.com/sdk/js?client-id=${paypalAcc}&components=buttons,messages,funding-eligibility&currency=${currency}`;
    <?php } ?>
    if (script.readyState) {
      // IE
      script.onreadystatechange = function() {
        if (
          script.readyState === 'loaded' ||
          script.readyState === 'complete'
        ) {
          script.onreadystatechange = null
          if (airwallexChange == '2') {
            creatPaypalCardButton()
          } else {
            creatPaypalCardButton2()
          }
        }
      }
    } else {
      script.onload = function() {
        if (airwallexChange == '2') {
          creatPaypalCardButton()
        } else {
          creatPaypalCardButton2()
        }
      }
    }
    document.body.appendChild(script);
    $("#loading").hide();
  }

  function creatPaypalCardButton() {
    console.log('creatPaypalCardButton')
    paypal.Buttons({
      style: {
        layout: 'horizontal',
        tagline: false,
        height: 55
      },

      onInit(data, actions) {

      },
      onError(err) {
        $("#loading").hide();
        console.log("paypal " + JSON.stringify(err));
      },
      onCancel: function(data) {},
      onClick() {},
      // Call your server to set up the transaction
      createOrder: function(data, actions) {
        $("#loading").show();
        productParams.payment_method = 'paypal'
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
          $('#loading').hide();
          let data = res;
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
            var pay_error = JSON.parse(data.error);
                var pay_error_message = pay_error.details;

                if (pay_error_message && pay_error_message.length) {
                  alert(pay_error_message)
                }
          }
        }).catch(function(res) {
          $('#loading').hide();
        });
      },

      // Call your server to finalize the transaction
      onApprove: function(data, actions) {
        gotoSuccess(data)
      }
    }).render('#complete-btn-id');
  }

  function gotoSuccess(data) {
    $('#loading').show();
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
        localStorage.setItem('from', 'success');
        alert("@lang('onebuy::app.v4.Payment successful')");
        window.location.href = '/onebuy/checkout/v4/success/' + localStorage.getItem('order_id');
        return true;
      }
      if (res.error == 'INSTRUMENT_DECLINED') {}
    }).catch(function(res) {
      $('#loading').hide();
    });
  }

  function creatPaypalCardButton2() {
    console.log('creatPaypalCardButton2')
    paypal.Buttons({
      style: {
        layout: 'horizontal',
        tagline: false,
        height: 55
      },

      onInit(data, actions) {

      },
      onError(err) {
        $("#loading").hide();
        console.log("paypal " + JSON.stringify(err));
      },
      onCancel: function(data) {},
      onClick() {},
      // Call your server to set up the transaction
      createOrder: function(data, actions) {
        $("#loading").show();
        productParams.payment_method = 'paypal'
        //   productParams.payment_vault = localStorage.getItem('payment_vault') ? JSON.parse(localStorage.getItem('payment_vault')) : 0;
        // productParams.payment_vault = 1;
        paramsInit2()
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
          $('#loading').hide();
          let data = res;
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
            var pay_error = JSON.parse(data.error);
                var pay_error_message = pay_error.details;

                if (pay_error_message && pay_error_message.length) {
                  alert(pay_error_message)
                }
          }
        }).catch(function(res) {
          $('#loading').hide();
        });
      },

      // Call your server to finalize the transaction
      onApprove: function(data, actions) {
        gotoSuccess(data)
      }
    }).render('#complete-btn-id2');
  }
</script>