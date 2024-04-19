var cb = (function($) {
    'use strict'
    $(window).keydown(function(e) {
        if (e.which === 27 && $('#error_handler_overlay').length) {
            $('#error_handler_overlay').remove();
        }
    });
    $(document).off('click', '#error_handler_overlay_close');
    $(document).on('click', '#error_handler_overlay_close', function(event) {
        event.preventDefault ? event.preventDefault() : (event.returnValue = false);
        $('#error_handler_overlay').remove();
    });
    var ignoreExitPop = true;
    var beforeFormSubmitEvents = [];
    var currentFormSubmitEvents = [];
    var validClass = app_config.valid_class;
    var errorClass = app_config.error_class;
    var loadingClass = app_config.loading_class;
    var formActions = {
        'prospect': 'prospect',
        'checkout': 'checkout',
        'downsell1': 'downsell',
        'downsell2': 'downsell',
        'upsell': 'upsell'
    };
    var prospectFormFields = {
        firstName: {},
        lastName: {},
        email: {
            validators: [
                ['isValidEmail']
            ],
        },
        phone: {
            validators: [
                ['isValidPhone']
            ],
        },
        shippingAddress1: {},
        shippingAddress2: {},
        shippingZip: {
            validators: [
                ['isValidZip', 'shippingCountry']
            ],
        },
        shippingCity: {},
        shippingState: {},
        shippingCountry: {}
    };
    var checkoutFormFields = {
        billingSameAsShipping: {},
        billingFirstName: {
            condition: ['billingSameAsShipping', 'no']
        },
        billingLastName: {
            condition: ['billingSameAsShipping', 'no']
        },
        billingAddress1: {
            condition: ['billingSameAsShipping', 'no']
        },
        billingAddress2: {
            condition: ['billingSameAsShipping', 'no']
        },
        billingZip: {
            condition: ['billingSameAsShipping', 'no'],
            validators: [
                ['isValidZip', 'billingCountry']
            ],
        },
        billingCity: {
            condition: ['billingSameAsShipping', 'no']
        },
        billingState: {
            condition: ['billingSameAsShipping', 'no']
        },
        billingCountry: {
            condition: ['billingSameAsShipping', 'no']
        },
        cardType: {
            aliases: ['creditCardType']
        },
        cardNumber: {
            aliases: ['creditCardNumber'],
            validators: [
                ['isValidCardNumber', 'cardType']
            ]
        },
        cardExpiryMonth: {
            aliases: ['expmonth']
        },
        cardExpiryYear: {
            aliases: ['expyear']
        },
        cvv: {
            aliases: ['CVV'],
            validators: [
                ['isValidCvv']
            ]
        }
    };
    var prospectForm = {
        data: {},
        fields: prospectFormFields,
        errors: {}
    };
    var checkoutForm = {
        data: {},
        fields: checkoutFormFields,
        errors: {}
    };
    var downsellForm = {
        data: {},
        fields: $.extend(true, prospectFormFields, checkoutFormFields),
        errors: {}
    };
    var formElementSelectors = {
        firstName: '[name=firstName], [name$=FirstName]',
        lastName: '[name=lastName], [name$=LastName]',
        address1: '[name=address1], [name$=Address1]',
        address2: '[name=address2], [name$=Address2]',
        country: '[name=country], [name$=Country]',
        state: '[name=state], [name$=State]',
        city: '[name=city], [name$=City]',
        zip: '[name=zip], [name$=Zip]',
        email: '[name=email], [name$=Email]',
        phone: '[name=phone], [name$=Phone]',
        cardNumber: '[name=cardNumber], [name$=CardNumber]',
        cardType: '[name=cardType], [name$=CardType]',
        cardExpiryMonth: '[name=cardExpiryMonth], [name=expmonth]',
        cardExpiryYear: '[name=cardExpiryYear], [name=expyear]',
        cvv: '[name=cvv], [name=CVV]'
    };

    function validateForm(formElement, formType) {
        var form = loadForm(formElement, formType);
        for (var fieldName in form.data) {
            var inputElementName = form.data[fieldName].name;
            if (formElement.find('[name="' + inputElementName + '"]').length === 0) {
                continue;
            }
            var inputElement = formElement.find('[name="' + inputElementName + '"]');
            if (!inputElement.hasClass('required')) {
                continue;
            }
            if (inputElement.data('ignore') && inputElement.has(errorClass)) {
                form.errors[inputElementName] = inputElement.data('error-message');
                if (typeof form.errors[inputElementName] === 'undefined') {
                    form.errors[inputElementName] = 'Enter a valid ' + inputElementName.toUpperCase();
                }
                continue;
            }
            performRegularValidation(fieldName, form, inputElement);
            if (form.errors.hasOwnProperty(fieldName)) {
                continue;
            }
            if (!form.fields[fieldName].hasOwnProperty('validators')) {
                continue;
            }
            for (var ii in form.fields[fieldName].validators) {
                var str = JSON.stringify(form.fields[fieldName].validators[ii]);
                var validationMeta = JSON.parse(str);
                performValidation(fieldName, validationMeta, form, inputElement);
            }
        }
        return JSON.parse(JSON.stringify(form.errors));
    };

    function performValidation(fieldName, validationMeta, form, inputElement) {
        var inputValue = form.data[fieldName].value;
        var validationFunction = validationMeta.shift();
        switch (validationFunction) {
            case 'isValidEmail':
                validateEmail(fieldName, inputElement, form);
                break;
            case 'isValidPhone':
                valdatePhone(fieldName, inputElement, form);
                break;
            case 'isValidZip':
                valdateZip(fieldName, inputElement, form, validationMeta);
                break;
            case 'isValidCardNumber':
                valdateCardNumber(fieldName, inputElement, form, validationMeta);
                break;
            case 'isValidCvv':
                valdateCvv(fieldName, inputElement, form, validationMeta);
                break;
        }
    };

    function valdateCvv(fieldName, inputElement, form, validationMeta) {
        var inputElementValue = form.data[fieldName].value;
        var inputElementName = form.data[fieldName].name;
        var value = inputElement.val();
        form.errors[inputElementName] = inputElement.data('error-message');
        inputElement.removeClass(validClass).addClass(errorClass);
        if (typeof form.errors[inputElementName] === 'undefined') {
            form.errors[inputElementName] = 'Enter a valid ' + inputElementName.toUpperCase();
        }
        if (!validator.isValidCvv(value)) {
            return;
        }
        delete form.errors[inputElementName];
        inputElement.removeClass(errorClass).addClass(validClass);
    };

    function valdateCardNumber(fieldName, inputElement, form, validationMeta) {
        var inputElementValue = form.data[fieldName].value;
        var inputElementName = form.data[fieldName].name;
        var cardNumber = inputElement.val().trim().replace(/[\s-]/g, '');
        form.errors[inputElementName] = inputElement.data('error-message');
        inputElement.removeClass(validClass).addClass(errorClass);
        if (typeof form.errors[inputElementName] === 'undefined') {
            form.errors[inputElementName] = 'Enter a valid ' + inputElementName.toUpperCase();
        }
        var cardType = form.data[validationMeta[0]].value;
        var isTestCard = false;
        if (typeof app_config.allowed_tc !== 'undefined' && app_config.allowed_tc.length) {

            var allowed_tc = cb.decryptAllowedTestCard(app_config.allowed_tc);

            $(allowed_tc).each(function(key, value) {
                var testcardNumber = value.toString().split('|')[0];
                if (cardNumber === testcardNumber) {
                    isTestCard = true;
                    return true;
                }
            });
        }
        if (isTestCard === false && !validator.isValidCardNumber(cardNumber, cardType)) {
            return;
        }
        delete form.errors[inputElementName];
        inputElement.removeClass(errorClass).addClass(validClass);
    };

    function valdateZip(fieldName, inputElement, form, validationMeta) {
        var inputElementValue = form.data[fieldName].value;
        var inputElementName = form.data[fieldName].name;
        var value = inputElement.val().trim();
        form.errors[inputElementName] = inputElement.data('error-message');
        inputElement.removeClass(validClass).addClass(errorClass);
        if (typeof form.errors[inputElementName] === 'undefined') {
            form.errors[inputElementName] = 'Enter a valid ' + inputElementName.toUpperCase();
        }
        var country = form.data[validationMeta[0]].value;
        if (!validator.isValidZip(value, country)) {
            return;
        }
        delete form.errors[inputElementName];
        inputElement.removeClass(errorClass).addClass(validClass);
    };

    function valdatePhone(fieldName, inputElement, form) {
        var inputElementValue = form.data[fieldName].value;
        var inputElementName = form.data[fieldName].name;
        var value = inputElement.val().trim();
        form.errors[inputElementName] = inputElement.data('error-message');
        inputElement.removeClass(validClass).addClass(errorClass);
        if (typeof form.errors[inputElementName] === 'undefined') {
            form.errors[inputElementName] = 'Enter a valid ' + inputElementName.toUpperCase();
        }
        if (!validator.isValidPhone(value)) {
            return;
        }
        delete form.errors[inputElementName];
        inputElement.removeClass(errorClass).addClass(validClass);
    };

    function validateEmail(fieldName, inputElement, form) {
        var inputElementValue = form.data[fieldName].value;
        var inputElementName = form.data[fieldName].name;
        var value = inputElement.val().trim();
        form.errors[inputElementName] = inputElement.data('error-message');
        inputElement.removeClass(validClass).addClass(errorClass);
        if (typeof form.errors[inputElementName] === 'undefined') {
            form.errors[inputElementName] = 'Enter a valid ' + inputElementName.toUpperCase();
        }
        if (!validator.isValidEmail(value)) {
            return;
        }
        delete form.errors[inputElementName];
        inputElement.removeClass(errorClass).addClass(validClass);
    };

    function performRegularValidation(fieldName, form, inputElement) {
        var inputElementValue = form.data[fieldName].value;
        var inputElementName = form.data[fieldName].name;
        var value = inputElement.val().trim();
        form.errors[inputElementName] = inputElement.data('error-message');
        inputElement.removeClass(validClass).addClass(errorClass);
        if (typeof form.errors[inputElementName] === 'undefined') {
            form.errors[inputElementName] = 'Enter a valid ' + inputElementName.toUpperCase();
        }
        if (value === '') {
            return;
        }
        var minLength = 1,
            maxLength = 100;
        if (typeof inputElement.data('min-length') !== 'undefined') {
            minLength = parseInt(inputElement.data('min-length'));
        }
        if (typeof inputElement.data('max-length') !== 'undefined') {
            maxLength = parseInt(inputElement.data('max-length'));
        }
        if (value.length < minLength || value.length > maxLength) {
            return;
        }
        delete form.errors[inputElementName];
        inputElement.removeClass(errorClass).addClass(validClass);
    };

    function loadForm(formElement, formType) {
        formElement.find('input, select').each(function() {
            $(this).removeClass('cb-loaded-field');
        });
        var form = {};
        switch (formType) {
            case 'prospect':
                form = $.extend(true, {}, prospectForm);
                break;
            case 'checkout':
                form = $.extend(true, {}, checkoutForm);
                break;
            case 'downsell':
                form = $.extend(true, {}, downsellForm);
                break;
            default:
                form = {
                    fields: {},
                    data: {},
                    errors: {}
                };
        }
        for (var fieldName in form.fields) {
            if (form.fields[fieldName].hasOwnProperty('condition')) {
                var condition = form.fields[fieldName].condition;
                if (!form.data.hasOwnProperty(condition[0])) {
                    loadInputData(condition[0], form, formElement);
                }
                if (form.data[condition[0]].value.toLowerCase() !== condition[1]) {
                    continue;
                }
            }
            if (!form.data.hasOwnProperty(fieldName)) {
                loadInputData(fieldName, form, formElement);
            }
            if (form.data[fieldName].hasOwnProperty('name')) {
                formElement.find('[name="' + form.data[fieldName].name + '"]').addClass('cb-loaded-field');
            }
        }
        formElement.find('input, select').not('[type=hidden], [type=submit]').each(function() {
            if (!$(this).hasClass('cb-loaded-field') && $(this).attr('name')) {
                form.fields[$(this).attr('name')] = {};
                form.data[$(this).attr('name')] = {
                    value: $(this).val(),
                    name: $(this).attr('name')
                };
            }
        });
        formElement.find('input, select').each(function() {
            $(this).removeClass('cb-loaded-field');
        });
        return form;
    };

    function loadInputData(fieldName, form, formElement) {
        form.data[fieldName] = {
            value: '',
            name: fieldName
        };
        if (formElement.find('[name=' + fieldName + ']').length) {
            if (formElement.find('[name="' + fieldName + '"]').attr('type') !== 'radio') {
                form.data[fieldName] = {
                    value: formElement.find('[name="' + fieldName + '"]').val(),
                    name: fieldName
                };
                return;
            }
            form.data[fieldName] = {
                value: formElement.find('[name="' + fieldName + '"]:checked').val(),
                name: fieldName
            };
            return;
        }
        if (!form.fields[fieldName].hasOwnProperty('aliases')) {
            form.data[fieldName] = {
                value: '',
                name: fieldName
            };
            return;
        }
        for (var ii in form.fields[fieldName].aliases) {
            var name = form.fields[fieldName].aliases[ii];
            if (formElement.find('[name="' + name + '"]').length) {
                if (formElement.find('[name="' + name + '"]').attr('type') !== 'radio') {
                    form.data[fieldName] = {
                        value: formElement.find('[name="' + name + '"]').val(),
                        name: name
                    };
                    break;
                }
                form.data[fieldName] = {
                    value: formElement.find('[name="' + name + '"]:checked').val(),
                    name: name
                };
                break;
            }
        }
    }

    function getUnmaskedCardNumber(cardNumber) {
        if (typeof cardNumber !== 'string' && !(cardNumber instanceof String)) {
            return cardNumber;
        }
        return cardNumber.replace(/[\s-]/g, '');
    }

    function errorHandler(errors, formElement) {
        if(app_config.enable_csrf_token){
            refreshToken();
        }
        if(app_config.show_validation_errors === 'hide'){
            return;
        }
        if(
            app_config.show_validation_errors === 'inline' && 
            typeof formElement !== 'undefined'
        ){
            $(formElement).find('input, select').next('.cb-inline-error').remove();
            for(var elementName in errors){
                var inputElement = formElement.find("[name='" + elementName + "']");
                inputElement.after(
                    '<span class="cb-inline-error">' + errors[elementName] + '</span>'
                );
            }
            return;
        }
        if ($('#error_handler_overlay').length) {
            $('#error_handler_overlay').remove();
        }
        $('body').append(getUI(errors));
        $('#error_handler_overlay').fadeIn(0);
    }

    function getUI(errors) {
        var li = '';
        $.each(errors, function(key, value) {
            li += '<li>' + value + '</li>';
        });
        var html = '';
        html += '<div id="error_handler_overlay">';
        html += '<div class="error_handler_body">';
        html += '<a href="javascript:void(0);" id="error_handler_overlay_close">X</a>';
        html += '<ul>' + li + '</ul></div>';
        html += '</div>';
        return html;
    }

    function submitForm(formElement, formOptions) {
        for (var ii = 0, len = cb.currentFormSubmitEvents.length; ii < len; ii++) {
            var callable = cb.currentFormSubmitEvents[ii];
            cb.currentFormSubmitEvents.splice(ii, 1);
            callable(formElement, formOptions);
            return;
        }
        var actionType = formActions[formOptions.type];
        if ($('input[name=altered_action]').length) {
            actionType = $('input[name=altered_action]').val();
        }
        /**
         * ------------------------
         * Send Test Flag to server
         * ------------------------
         */
        var testFlag = location.search.match('test_flag') ? '&test_flag=on' : '';
        var cbtoken = app_config.cbtoken.length ? ('&cbtoken=' + app_config.cbtoken) : '';
        $.ajax({
            url: app_config.offer_path + AJAX_PATH + actionType,
            method: 'post',
            data: formElement.serialize() + testFlag + cbtoken,
            beforeSend: function() {
                $(formOptions.ajaxLoader.div).fadeIn(formOptions.ajaxLoader.timeInOut);
            },
            success: function(data) {
                if (typeof data !== 'object') {
                    data = JSON.parse(data);
                }
                performAfterResponseTasks(data, formElement, formOptions);
            },
            complete: function() {}
        });
    };

    function performAfterResponseTasks(data, formElement, formOptions) {
        if(data.declinePixels && data.isTrigger == true ){
            data.isTrigger = false;
            renderAdditionalPixels(data);
        }
        if (data.success && 'is_html' in data && data.is_html == true) {
            window.onbeforeunload = null;
            writeToDocument(data.html);
            return;
        }
        if (data.success === true) {
            if(app_config.enable_csrf_token){
                refreshToken();
            }
            if (typeof formOptions.onSuccess === 'function') {
                formOptions.onSuccess(data);
            } else {
                redirectTo(data.redirect, data);
                cb.ignoreExitPop = true;
            }
        } else if (data.hasOwnProperty('prepaidRedirect')) {
            redirectTo(data.prepaidRedirect, data);
        } else if (data.hasOwnProperty('Redirect')) {
            redirectTo(data.Redirect, data);
        } else if (data.hasOwnProperty('errors')) {
            renderAdditionalPixels(data);
            if (typeof formOptions.onError === 'function') {
                formOptions.onError(data);
            } else {
                try {
                    if (!$(formOptions.responseLoader.div).length) {
                        updateFormElement(data);
                        cb.errorHandler(data.errors);
                    } else {
                        var liHtml = '';
                        $.each(data.errors, function(key, value) {
                            liHtml += '<li>' + value + '</li>';
                        });
                        var html = '<ul>' + liHtml + '</ul></div>';
                        $(formOptions.responseLoader.div).html(html).fadeIn(formOptions.responseLoader.timeInOut);
                    }
                } catch (err) {
                    cb.errorHandler([app_lang.error_messages.common_error]);
                }
            }
            if ($(formOptions.ajaxLoader.div).length) {
                $(formOptions.ajaxLoader.div).fadeOut(formOptions.ajaxLoader.timeInOut);
            } else {
                $('body').find('#loaderImage').remove();
            }
            formElement.find('[type=submit]').removeAttr('disabled');
        }
    }
    
    function updateFormElement(data)
    {
        if(data.is_form_element && data.form_element_name)
        {
            var elem = $('[name='+ data.form_element_name +']');
            if (elem.length)
            {
                elem.addClass(errorClass).removeClass(validClass);
            }
        }
    }
    
    function renderAdditionalPixels(data) {
        if(typeof(data.submissionPixels) != 'undefined') {
            if(typeof(data.submissionPixels.top) != 'undefined' && data.submissionPixels.top) {
                $('body').prepend(data.submissionPixels.top);
            }
            if(typeof(data.submissionPixels.bottom) != 'undefined' && data.submissionPixels.bottom) {
                $('body').append(data.submissionPixels.bottom);
            }
            if(typeof(data.submissionPixels.head) != 'undefined' && data.submissionPixels.head) {
                $('head').append(data.submissionPixels.head);
            }
        }
        if(typeof(data.declinePixels) != 'undefined') {
            if(typeof(data.declinePixels.top) != 'undefined' && data.declinePixels.top) {
                $('body').prepend(data.declinePixels.top);
            }
            if(typeof(data.declinePixels.bottom) != 'undefined' && data.declinePixels.bottom) {
                $('body').append(data.declinePixels.bottom);
            }
            if(typeof(data.declinePixels.head) != 'undefined' && data.declinePixels.head) {
                $('head').append(data.declinePixels.head);
            }
            if(data.declinePixels && data.isTrigger == false ){
                delete data.declinePixels;
                delete data.isTrigger;
            }
        }        
    }

    function isInternetExplorer() {
        var ua = navigator.userAgent.toLowerCase();
        return (ua.indexOf('msie') != -1) ? parseInt(ua.split('msie')[1]) : false;
    };

    function redirectTo($redirect, data) {
        window.onbeforeunload = null;
        /**
         * Cookies should be disabled if get cbtoken length
         * Let's handle the refirectuon
         */
        var onlyRedirect = data.onlyRedirect ? data.onlyRedirect : false;
        if (app_config.cbtoken.length && !onlyRedirect) {
            var _form = $('<form />').attr({
                id: 'redirect-to',
                method: 'POST',
                action: $redirect
            });
            var _input = $('<input />').attr({
                name: 'cbtoken',
                value: app_config.cbtoken
            });
            _form.append(_input);
            _form.appendTo('body');
            _form.submit();
        } else if (isInternetExplorer()) {
            window.location.replace($redirect);
        } else {
            if (typeof(data.skipQueryParams) === 'undefined') {
                history.pushState({}, null, data.redirect);
            }
            window.location.assign($redirect);
        }
    };

    function writeToDocument(data) {
        var newDoc = document.open("text/html", "replace");
        newDoc.write(data);
        newDoc.close();
    };

    function decryptAllowedTestCard(chipherText, keyString) {
        var chipherTextParts = chipherText.split('');
        var plainTextPartsLen = Math.floor(chipherTextParts.length / 2);
        var flag = 0;
        var plainTextParts = [];
        for (var ii = 0; ii < plainTextPartsLen; ii++) {
            if (flag) {
                plainTextParts.push(chipherTextParts[ii]);
            } else {
                plainTextParts.push(chipherTextParts[plainTextPartsLen + ii]);
            }
            flag = 1 - flag;
        }
        return JSON.parse(plainTextParts.join(''));
    };

    function urlErrorHandler() {
        var queries = window.location.search.replace('?', '').split('&');
        for(var ii = 0, len = queries.length; ii < len; ii++){
            if(queries[ii].match(/^error=/)){
                cb.errorHandler({
                    'urlError': (queries[ii].replace('error=', '')).replace(/\+/g, ' ')
                });
            }
        }
    };

    function refreshToken(){
        $.ajax({
            url: app_config.offer_path + AJAX_PATH + 'refresh-csrf-token',
            method: 'post',
            success: function(data) {
                $("[name='csrf_token']").val(data.data)
            }
        });        
    }

    return {
        formElementSelectors: formElementSelectors,
        formActions: formActions,
        validateForm: validateForm,
        submitForm: submitForm,
        validClass: validClass,
        errorClass: errorClass,
        loadingClass: loadingClass,
        ignoreExitPop: ignoreExitPop,
        errorHandler: errorHandler,
        beforeFormSubmitEvents: beforeFormSubmitEvents,
        currentFormSubmitEvents: currentFormSubmitEvents,
        decryptAllowedTestCard: decryptAllowedTestCard,
        urlErrorHandler: urlErrorHandler,
        renderAdditionalPixels: renderAdditionalPixels
    };
})(jQuery);