<script>
    // STEP #2: Initialize the Airwallex global context for event communication
    Airwallex.init({
        env: '<?php echo $app_env;?>', // Setup which Airwallex env('staging' | 'demo' | 'prod') to integrate with
        origin: window.location.origin, // Setup your event target to receive the browser events message
        // components: ['cvc']
    });
    var cvc2,
        cardExpiry2,
        cardNumber2,
        cvc,
        cardExpiry,
        cardNumber;

    function createAirwallex1() {
        <?php if ($payment_airwallex_vault == 1) { ?>
            cvc2 = Airwallex.createElement('cvc');
            cvc2.mount('cvc2');
        <?php } else { ?>

            $('#expiry2').show();
            $('#cardNumber2').show();
            cardNumber2 = Airwallex.createElement('cardNumber', {
                allowedCardNetworks: ['visa', 'maestro', 'mastercard', 'amex', 'unionpay', 'jcb']
            });
            cardExpiry2 = Airwallex.createElement('expiry');
            cvc2 = Airwallex.createElement('cvc');
            cardNumber2.mount('cardNumber2');
            cardExpiry2.mount('expiry2');
            cvc2.mount('cvc2');
        <?php } ?>

        document.getElementById('payButton2').addEventListener('click', () => {
            $('#loading').show();
            createOrder2()
        });
    }

    function createAirwallex2() {
        <?php if ($payment_airwallex_vault == 1) { ?>
            cvc = Airwallex.createElement('cvc');
            cvc.mount('cvc');
        <?php } else { ?>
            $('#expiry').show();
            $('#cardNumber').show();
            cardNumber = Airwallex.createElement('cardNumber', {
                allowedCardNetworks: ['visa', 'maestro', 'mastercard', 'amex', 'unionpay', 'jcb']
            });
            cardExpiry = Airwallex.createElement('expiry');
            cvc = Airwallex.createElement('cvc');
            cvc.mount('cvc');
            cardNumber.mount('cardNumber');
            cardExpiry.mount('expiry');
        <?php } ?>

        document.getElementById('payButton').addEventListener('click', () => {
            $('#loading').show();
            createOrder()
        });

    }

    function createOrder() {
        console.log('createOrder1')
        paramsInit()
        productParams.pay_type = 'airwallex';
        <?php if ($payment_airwallex_vault == 1) { ?>
            productParams.cus_id = localStorage.getItem('cus_id') ? localStorage.getItem('cus_id') : '<?php echo $airwallex_customer_id; ?>';
        <?php } ?>

        var url = '/onebuy/order/add/sync?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime() + "&force=" + localStorage.getItem("force");;

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
                if (data.result === 200) {

                    var order_info = data.order;
                    localStorage.setItem("order_id", order_info.id);


                    customer_id = localStorage.getItem('cus_id') ? localStorage.getItem('cus_id') : '<?php echo $airwallex_customer_id; ?>';
                    payment_consent_id = localStorage.getItem('payment_consent_id') ? localStorage.getItem('payment_consent_id') : '';


                    <?php if ($payment_airwallex_vault == 1) { ?>

                        Airwallex.confirmPaymentIntent({
                            id: data.payment_intent_id, // intent id(Optional)
                            client_secret: data.client_secret, // client secret
                            // currency: '{{ core()->getCurrentCurrencyCode() }}', // currency
                            element: cvc, // either the card element or card number element depends on the element you integrate,
                            payment_consent_id: payment_consent_id // 'merchant' for MIT and 'customer' for CIT
                        }).then((response) => {
                            $('#loading').hide();
                            localStorage.setItem('from', 'success');
                            alert("@lang('onebuy::app.v4.Payment successful')");
                            window.location.href = "/onebuy/checkout/v5/success/" + data.order.id;
                            return false;
                        }).catch((response) => {
                            $('#loading').hide();

                            alert(response.message)

                            return false;

                        });;

                    <?php } else { ?>

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
                            localStorage.setItem('from', 'success');
                            alert("@lang('onebuy::app.v4.Payment successful')");
                            window.location.href = "/onebuy/checkout/v5/success/" + data.order.id;
                            return false;

                        }).catch((response) => {
                            $('#loading').hide();

                            alert(response.message)

                            return false;

                        });

                    <?php } ?>

                } else {
                    $('#loading').hide();
                    var pay_error = data.error;
                    alert(res.error)
                    localStorage.setItem("force", 1);
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

    function createOrder2() {
        console.log('createOrder2')
        paramsInit2()
        productParams.pay_type = 'airwallex';
        <?php if ($payment_airwallex_vault == 1) { ?>
            productParams.cus_id = localStorage.getItem('cus_id') ? localStorage.getItem('cus_id') : '<?php echo $airwallex_customer_id; ?>';
        <?php } ?>
        var url = '/onebuy/order/add/sync?currency={{ core()->getCurrentCurrencyCode() }}&_token={{ csrf_token() }}&time=' + new Date().getTime() + "&force=" + localStorage.getItem("force");;

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
                if (data.result === 200) {

                    var order_info = data.order;
                    localStorage.setItem("order_id", order_info.id);

                    customer_id = localStorage.getItem('cus_id') ? localStorage.getItem('cus_id') : '<?php echo $airwallex_customer_id; ?>';
                    payment_consent_id = localStorage.getItem('payment_consent_id') ? localStorage.getItem('payment_consent_id') : '';

                    <?php if ($payment_airwallex_vault == 1) { ?>

                        Airwallex.confirmPaymentIntent({
                            id: data.payment_intent_id,
                            client_secret: data.client_secret,
                            element: cvc2,
                            payment_consent_id: payment_consent_id
                        }).then((response) => {
                            $('#loading').hide();
                            localStorage.setItem('from', 'success');
                            alert("@lang('onebuy::app.v4.Payment successful')");
                            window.location.href = "/onebuy/checkout/v5/success/" + data.order.id;
                            return false;
                        }).catch((response) => {
                            $('#loading').hide();

                            alert(response.message)

                            return false;

                        });

                    <?php } else { ?>
                        Airwallex.confirmPaymentIntent({
                            element: cardNumber2,
                            id: data.payment_intent_id,
                            client_secret: data.client_secret,
                            payment_method: {
                                billing: {
                                    email: data.billing.email,
                                    first_name: data.billing.first_name,
                                    last_name: data.billing.last_name,
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
                            localStorage.setItem('from', 'success');
                            alert("@lang('onebuy::app.v4.Payment successful')");
                            window.location.href = "/onebuy/checkout/v5/success/" + data.order.id;
                            return false;

                        }).catch((response) => {
                            $('#loading').hide();

                            alert(response.message)

                            return false;

                        });

                    <?php } ?>

                } else {
                    $('#loading').hide();
                    var pay_error = data.error;
                    alert(res.error)
                    localStorage.setItem("force", 1);
                    if (pay_error && pay_error.length) {}
                }
            })
            .catch(function(err) {
                $('#loading').hide();
            })
    }
</script>