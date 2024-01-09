(function ($) {
    'use strict';
    $.fn.formHandler = function (_selfOptions) {
        /**
         * -------------------------------------------------------------
         * Check the existence of the element before binding any events
         * on its childrens.
         * -------------------------------------------------------------
         */
        if (!this.length) {
            return false;
        }
        $(this).attr('novalidate', 'novalidate');
        /**
         * ------------------------------------------------
         * The error modal is set to true by default.
         * ------------------------------------------------
         */
        var defaults = {
            errorModal: true,
            autoFillFormElement: false,
            countryDropdown: 'Select Country',
            ajaxLoader: {
                div: '',
                timeInOut: 0
            },
            responseLoader: {
                div: '',
                timeInOut: 0
            }
        };
        _selfOptions = $.extend({}, defaults, _selfOptions);
        /**
         * Make _self usable throughout.
         */
        var _self = $(this);
        // checkCCMasked();
        /**
         * ------------------------------------
         * Chrome Autofill issue PATCH
         * ------------------------------------
         */
        _self.find('input[name=shippingState]').change(function (e) {
            $('body').data({
                chromeAutofilled: $(this).val()
            });
            getStates('shippingState', 'shippingCountry');
        });

        if (_selfOptions.autoFillFormElement) {
            var _copyToForm = $('form[name=' + _selfOptions.autoFillFormElement + ']');
            _self.find('input[type=text]').on('keyup', function () {
                var elem = $(this).attr('name');
                _copyToForm.find('input[name=' + elem + ']').val($(this).val());
            });
            _self.find('textarea').on('keyup', function () {
                var elem = $(this).attr('name');
                _copyToForm.find('textarea[name=' + elem + ']').val($(this).val());
            });
        }

        _self.on('focus', 'input, select', function () {
            if (app_config.show_validation_errors === 'inline') {
                $(this).next('.cb-inline-error').remove();
            }
        });

        _self.on('blur', 'input, select', function () {
            if (!$(this).hasClass('required')) {
                return;
            }
            performRegularBlurEvent($(this));
        });

        _self.on('change', 'input, select', function () {
            if (!$(this).hasClass('required')) {
                return;
            }
            performRegularBlurEvent($(this));
        });
        
                    
        $(document).on('change', 'select[name$=Country]',function () {
            if($("[name=email]").length && $("[name=creditCardNumber]").length)
            {
                var cName = $(this).attr('name');
                if(cName == 'shippingCountry')
                {
                    cb.formElementSelectors["country"] = "[name="+cName+"]";
                    cb.formElementSelectors["zip"] = "[name=shippingZip]";
                }
                else{
                    cb.formElementSelectors["country"] = "[name="+cName+"]";
                    cb.formElementSelectors["zip"] = "[name=billingZip]";
                }
            }
        });
       

        _self.find(cb.formElementSelectors.zip).blur(function () {
            if (!$(this).hasClass('required')) {
                return;
            }
            if($(this).attr('data-ignore')) {
                return;
            }
            $(this).removeClass(cb.errorClass).removeClass(cb.validClass);
            if (!$(this).val().length) {
                return;
            }
            var country = _self.find(cb.formElementSelectors.country).val();
            if (typeof country === 'undefined') {
                country = 'default';
            }
            if (validator.isValidZip($(this).val(), country)) {
                $(this).addClass(cb.validClass);
                return;
            }
            $(this).addClass(cb.errorClass);
        });

        _self.find(cb.formElementSelectors.email).blur(function () {
            if (!$(this).hasClass('required')) {
                return;
            }
            $(this).removeClass(cb.errorClass).removeClass(cb.validClass);
            if (!$(this).val().length) {
                return;
            }
            if (validator.isValidEmail($(this).val())) {
                $(this).addClass(cb.validClass);
                return;
            }
            $(this).removeClass(cb.validClass).addClass(cb.errorClass);
        });

        _self.find(cb.formElementSelectors.phone).blur(function () {
            if (!$(this).hasClass('required')) {
                return;
            }
            $(this).removeClass(cb.errorClass).removeClass(cb.validClass);
            if (!$(this).val().length) {
                return;
            }
            performRegularBlurEvent($(this));
            if ($(this).hasClass(cb.errorClass)) {
                return;
            }
            if (validator.isValidPhone($(this).val())) {
                $(this).addClass(cb.validClass);
                return;
            }
            $(this).removeClass(cb.validClass).addClass(cb.errorClass);
        });

        _self.find(cb.formElementSelectors.cardNumber).blur(function (e) {
            if (!$(this).hasClass('required')) {
                return;
            }
            $(this).removeClass(cb.errorClass).removeClass(cb.validClass);
            var cardNumberElement = _self.find(cb.formElementSelectors.cardNumber);
            var cardType = _self.find(cb.formElementSelectors.cardType).val();
            var cardNumber = cardNumberElement.val();
            if (!cardNumber.length) {
                return;
            }

            var unmaskedCardNumber = cardNumber.trim().replace(/[\s-]/g, '');
            
            if (typeof app_config.allowed_tc !== 'undefined' && app_config.allowed_tc.length) {

                var allowed_tc = cb.decryptAllowedTestCard(app_config.allowed_tc);
                var isTestCard = false;
                $(allowed_tc).each(function (k, v) {
                    var testCardNumber = v.toString().split('|')[0];
                    if (unmaskedCardNumber === testCardNumber) {
                        isTestCard = true;
                        return true;
                    }
                });
                if (isTestCard) {
                    cardNumberElement.removeClass(cb.errorClass).addClass(cb.validClass);
                    return true;
                }
            }
            cardNumberElement.removeClass(cb.validClass).addClass(cb.errorClass);
            if (!validator.isValidCardNumber(unmaskedCardNumber, cardType)) {
                return;
            }
            if (!cardType.length) {
                return;
            }
            cardNumberElement.removeClass(cb.errorClass).addClass(cb.validClass);
        });

        _self.find(cb.formElementSelectors.cvv).blur(function () {
            if (!$(this).hasClass('required')) {
                return;
            }
            $(this).removeClass(cb.errorClass).removeClass(cb.validClass);
            if (!$(this).val().length) {
                return;
            }
            performRegularBlurEvent($(this));
            if ($(this).hasClass(cb.errorClass)) {
                return;
            }
            if (validator.isValidCvv($(this).val())) {
                $(this).addClass(cb.validClass);
                return;
            }
            $(this).removeClass(cb.validClass).addClass(cb.errorClass);
        });
        _self.find(cb.formElementSelectors.cvv).keyup(function () {
            $(this).val($(this).val().replace(/[^\d]/g, ''));
        });

        function performRegularBlurEvent(element) {
            element.removeClass(cb.errorClass).removeClass(cb.validClass);
            if (!element.val().length) {
                return;
            }
            element.addClass(cb.errorClass);
            var value = element.val().trim();
            if (value === '') {
                return;
            }
            var minLength = 1, maxLength = 100;
            if (typeof element.data('min-length') !== 'undefined') {
                minLength = parseInt(element.data('min-length'));
            }
            if (typeof element.data('max-length') !== 'undefined') {
                maxLength = parseInt(element.data('max-length'));
            }
            if (value.length < minLength || value.length > maxLength) {
                return;
            }
            element.removeClass(cb.errorClass).addClass(cb.validClass);
        }

        if (_selfOptions.type !== 'undefined' && _selfOptions.type != 'checkout') {
            getCountries('shippingCountry', 'shippingState');
            _self.find('select[name=shippingCountry]').change(function () {
                if ($(this).data('oldValue') == $(this).val()) {
                    return;
                }
                $(this).data({
                    oldValue: $(this).val()
                });
                getStates('shippingState', 'shippingCountry');
            });
        }

        _self.find('input[name=creditCardNumber]').keyup(function (e) {
            $(this).val($(this).val().toString().replace(/[^0-9\s-]/g, ''));
        });

        _self.find(cb.formElementSelectors.cardNumber).change(function (e) {
            $(this).trigger('keydown').trigger('keypress').trigger('keyup');
        });

        _self.find('input[name=creditCardNumber]').keyup(guessCardType);
        _self.find('select[name=creditCardType]').change(function (e) {
            /**
             * Handle validation differently if user selects PayPal
             */
            var fields = ['creditCardNumber', 'expmonth', 'expyear', 'CVV'];
            var cardType = $(this).val();
            calculateCvvMaxlength(cardType);
            $.each(fields, function (index, field) {                
                if (cardType == 'paypal' || cardType == 'COD' || cardType == 'payu' || cardType == 'sezzle' || cardType == 'affirm' || cardType == 'klarna' || cardType == 'offline' || cardType == 'afterpay' || cardType == 'external' || cardType == 'ccbill' || cardType == 'applePay' || cardType == 'bancontact' || cardType == 'ideal') {
                    $('[name=' + field + ']').removeClass('required').closest('p, div').hide();
                    callSquare('hide');
                    callSepa('hide');
                    callDirectDebit('hide'); 
                }else if (cardType == 'sepa') {
                    $('[name=' + field + ']').removeClass('required').closest('p, div').hide();
                    callSquare('hide');
                    callSepa('show');  
                    callDirectDebit('hide');                       
                }else if (cardType == 'DIRECTDEBIT') {
                    $('[name=' + field + ']').removeClass('required').closest('p, div').hide();
                    callSquare('hide');
                    callSepa('hide');    
                    callDirectDebit('show');                    
                }else if (cardType == 'square') {
                    $('[name=' + field + ']').removeClass('required').closest('p, div').hide();
                    callSquare('show');
                    callSepa('hide');    
                    callDirectDebit('hide');                    
                }else {                        
                    $('[name=' + field + ']').addClass('required').closest('p, div').show();
                    callSquare('hide');
                    callSepa('hide');
                    callDirectDebit('hide'); 
                }
            });
            var _length = validator.getCardNumberMaxLength(cardType);
            _self.find('input[name=creditCardNumber]').attr('maxlength', _length);
        });

        _self.find('input[name=billingSameAsShipping]').change(function (e) {
            if ($(this).val() == 'no') {
                $('.billing-info').show();
                getCountries('billingCountry', 'billingState');
                _self.find('select[name=billingCountry]').change(function () {
                    getStates('billingState', 'billingCountry');
                });
                $('.billing-info input,.billing-info select').addClass('required');
            } else {
                $('.billing-info input,.billing-info select').removeClass('required');
                $('.billing-info input,.billing-info select').removeClass(cb.errorClass);
                $('.billing-info').hide();
            }
        });
        
        function callSepa(type)
        {
            if(type == 'show')
            {
                $('.sepa-block,.sepa-block p').show();
                $('[name=sepa_iban],[name=sepa_bic],[name=pin_number]').attr('disabled',false);
                $('[name=sepa_iban],[name=sepa_bic],[name=pin_number]').addClass('required');
            }
            else
            {
                $('.sepa-block,.sepa-block p').hide();
                $('[name=sepa_iban],[name=sepa_bic],[name=pin_number]').attr('disabled',true);
                $('[name=sepa_iban],[name=sepa_bic],[name=pin_number]').removeClass('required');
            }
        }
        
        function callDirectDebit(type)
        {
            if(type == 'show')
            {
                $('.directdebit-block,.directdebit-block p').show();
                $('[name=iban],[name=ddbic]').attr('disabled',false);
                $('[name=iban],[name=ddbic]').addClass('required');
            }
            else
            {
                $('.directdebit-block,.directdebit-block p').hide();
                $('[name=iban],[name=ddbic]').attr('disabled',true);
                $('[name=iban],[name=ddbic]').removeClass('required');
            }
        }
        
        function callSquare(type)
        {
            if(type == 'show')
            {
                $('.squareForm').show();
            }
            else
            {
                $('.squareForm').hide();
            }
        }

        function guessCardType() {
            var cardNumberElement = _self.find(cb.formElementSelectors.cardNumber);
            var cardTypeElement = _self.find(cb.formElementSelectors.cardType);
            var unmaskedCardNumber = cardNumberElement.val().trim().replace(/[\s-]/g, '');
            var cardType = validator.getCardType(unmaskedCardNumber);
            if (cardType === false) {
                if (typeof app_config.allowed_tc !== 'undefined' && app_config.allowed_tc.length) {
                    var matchType = false;

                    var allowed_tc = cb.decryptAllowedTestCard(app_config.allowed_tc);
                    $(allowed_tc).each(function (k, v) {
                        var testCardParts = v.toString().split('|');
                        if (unmaskedCardNumber === testCardParts[0]) {
                            cardType = testCardParts[1];
                            return true;
                        }
                    });
                }
            }
            if (cardTypeElement.find('option[value=' + cardType + ']').length) {
                cardTypeElement.val(cardType).trigger('change');
                cardTypeElement.removeClass(cb.errorClass).addClass(cb.validClass);
            } else {
                if (_self.find('select[name=creditCardType]').data('deselect') != false) {
                    cardTypeElement.val('').trigger('change');
                    cardTypeElement.addClass(cb.errorClass).removeClass(cb.validClass);
                }
            }
        }
        
        function calculateCvvMaxlength(cardType){
            if(cardType == 'amex'){
                $('[name=CVV]').attr('maxlength' , '4');
            }
            else{
                $('[name=CVV]').attr('maxlength' , '3');
            }
        }

        function getCountries(countryElementName, stateElementName) {
            var countryElement = _self.find('select[name=' + countryElementName + ']');
            var selectedCountryName = countryElement.data('selected');
            var countryElementHtml = '';
            var no_of_countries = 0;
            $.each(app_config.allowed_country_codes, function ($key, countryCode) {
                if (app_config.countries.hasOwnProperty(countryCode)) {
                    no_of_countries++;
                    countryElementHtml += '<option value="' + countryCode + '">' + app_config.countries[countryCode]['name'] + '</option>';
                }
            });
            if (no_of_countries != 1) {
                countryElementHtml = '<option value="">' + _selfOptions.countryDropdown + '</option>' + countryElementHtml;
            }
            countryElement.html(countryElementHtml).trigger('change');
            if (typeof selectedCountryName !== 'undefined' && selectedCountryName.length) {
                countryElement.val(selectedCountryName).trigger('change');
            }
            getStates(stateElementName, countryElementName);
        }

        function getStates(stateElementName, countryElementName) {
            var stateElement = _self.find('input[name=' + stateElementName + ']');
            var selectedStateName = stateElement.data('selected');
            var chromeAutofilled = $('body').data('chromeAutofilled') ? $('body').data('chromeAutofilled') : '';
            var countryElement = _self.find('select[name=' + countryElementName + ']');
            if (countryElement.length === 0 || $(countryElement).val() === '') {
                return;
            }
            var stateElementHtml = '';
            var zipElementName = countryElementName.replace('Country', '') + 'Zip';
            if (app_config.country_lang_mapping.hasOwnProperty(countryElement.val())) {
                _self.find('[name=' + stateElementName + ']').closest('p, div, tr').find('label').text(app_config.country_lang_mapping[countryElement.val()].state);
                _self.find('[name=' + zipElementName + ']').closest('p, div, tr').find('label').text(app_config.country_lang_mapping[countryElement.val()].zip);
            } else {
                _self.find('[name=' + stateElementName + ']').closest('p, div, tr').find('label').text('State: ');
                _self.find('[name=' + zipElementName + ']').closest('p, div, tr').find('label').text('Zip: ');
            }
            $.each(app_config.countries[countryElement.val()]['states'], function (stateCode, value) {
                if (stateCode.length && countryElement.val() == 'US' && stateCode.match(/Armed Forces/) != null) {
                    return;
                }
                stateElementHtml += '<option value="' + stateCode + '">' + value.name + '</option>';
            });
            if (stateElementHtml.length) {
                if (!_self.find('select[name=' + stateElementName + ']').length) {
                    var classes = stateElement.attr('class');
                    $('<select name="' + stateElementName + '"/>').insertAfter(stateElement);
                    var attributes = stateElement.get(0).attributes;
                    stateElement.remove();
                    addAttributesToElement(_self.find('select[name=' + stateElementName + ']'), attributes);
                }
                var stateLable = 'State';
                if (
                        typeof (app_config.country_lang_mapping[countryElement.val()]) !== 'undefined' &&
                        typeof (app_config.country_lang_mapping[countryElement.val()].state) !== 'undefined' &&
                        (app_config.country_lang_mapping[countryElement.val()].state) != '')
                {
                    var stateString = app_config.country_lang_mapping[countryElement.val()].state
                    var lastChar = stateString[stateString.length - 1];
                    if (lastChar == ':') {
                        stateLable = (app_config.country_lang_mapping[countryElement.val()].state).slice(0, -1);
                    } else {
                        stateLable = (app_config.country_lang_mapping[countryElement.val()].state);
                    }
                }
                var stateDefaultElementHtml = "<option value='' selected='selected'>Select " + stateLable + "</option>";
                _self.find('select[name=' + stateElementName + ']').html(stateDefaultElementHtml + stateElementHtml);
                if (selectedStateName) {
                    _self.find('select[name=' + stateElementName + ']').val(selectedStateName);
                }
            } else {
                if (_self.find('input[name=' + stateElementName + ']').length === 0) {
                    stateElement = _self.find('select[name=' + stateElementName + ']');
                    var classes = stateElement.attr('class');
                    $('<input type="text" name="' + stateElementName + '" readonly />').insertAfter(stateElement);
                    var attributes = stateElement.get(0).attributes;
                    stateElement.remove();
                    addAttributesToElement(_self.find('input[name=' + stateElementName + ']'), attributes);
                }
                _self.find('input[name=' + stateElementName + ']').removeAttr('readonly');
            }
        }

        function addAttributesToElement(element, attributes) {
            for (var i in attributes) {
                if (typeof attributes[i] !== 'object') {
                    continue;
                }
                element.attr(attributes[i].name, attributes[i].value);
            }
        }

        _self.submit(function (_event) {
            _event.preventDefault();
            var errors = cb.validateForm(_self, cb.formActions[_selfOptions.type]);
            if (_selfOptions.type !== 'undefined' && _selfOptions.type != 'prospect' && _selfOptions.type != 'upsell') {
                if (hasCardExpired()) {
                    errors.cardNumber = app_lang.error_messages.card_expired;
                    _self.find(cb.formElementSelectors.cardNumber).addClass(cb.errorClass);
                }
                else if (!handleTrialOffer()) {
                    errors.cardNumber = app_lang.error_messages.card_expire_soon;
                    _self.find(cb.formElementSelectors.cardNumber).addClass(cb.errorClass);
                }
            }
            if (_self.find('.agree-checkbox').length) {
                if (!_self.find('.agree-checkbox').prop('checked')) {
                    if (typeof _self.find('.agree-checkbox').data('error-message') !== 'undefined') {
                        errors['agreeCheckbox'] = _self.find('.agree-checkbox').data('error-message');
                    } else {
                        errors['agreeCheckbox'] = app_lang.error_messages.not_checked;
                    }
                }
            }
            if (Object.keys(errors).length !== 0) {
                cb.errorHandler(getArrangedErrorMessages(errors), _self);
                return;
            }
            _self.find('input[name="user_is_at"]').remove();
            _self.append('<input type="hidden" name="user_is_at" value="' + location.href + '" />');

            cb.currentFormSubmitEvents = [];
            if (Array.isArray(cb.beforeFormSubmitEvents)) {
                for (var ii = 0, len = cb.beforeFormSubmitEvents.length; ii < len; ii++) {
                    if (typeof cb.beforeFormSubmitEvents[ii] !== 'function') {
                        continue;
                    }
                    cb.currentFormSubmitEvents.push(cb.beforeFormSubmitEvents[ii]);
                }
            }
            cb.submitForm(_self, _selfOptions);
        });

        function getArrangedErrorMessages(errors) {
            var arrangedErrors = {};
            _self.find('input, select').each(function () {
                if (errors.hasOwnProperty($(this).attr('name'))) {
                    arrangedErrors[$(this).attr('name')] = errors[$(this).attr('name')];
                    delete errors[$(this).attr('name')];
                }
            });
            $.each(errors, function (key, value) {
                arrangedErrors[key] = value;
            });
            return arrangedErrors;
        }

        function hasCardExpired() {
            return false;
            var date = new Date();
            var year = date.getFullYear().toString().substr(2, 2);
            var month = date.getMonth() + 1;
            if (_self.find(cb.formElementSelectors.cardExpiryMonth).val().length && _self.find(cb.formElementSelectors.cardExpiryMonth).val() < month && _self.find(cb.formElementSelectors.cardExpiryYear).val().length && _self.find(cb.formElementSelectors.cardExpiryYear).val() <= year) {
                return true;
            }
            return false;
        }

        function handleTrialOffer() {
            if (app_config.disable_trialoffer_cardexp) {
                return true;
            }
            var $expmonth = _self.find('select[name=expmonth]');
            var $expyear = _self.find('select[name=expyear]');
            var expiryM = parseInt($expmonth.val());
            var expiryY = parseInt($expyear.val());
            var expiry = new Date().setFullYear("20" + expiryY, expiryM - 3);
            var diff = expiry - new Date();
            if (diff < 1) {
                return false;
            }
            return true;
        }
    };
})(jQuery);
var FwUtils = {
    log: function () {
        if (app_config.dev_mode == 'Y') {
            console.log(arguments);
        }
    }
};