'use strict'
var validator = (function() {
    /**
    Regular expressions for vlidations
    **/
    var patterns = {
        zip: {
            US: /(^\d{5}$)|(^\d{5}-\d{4}$)/,
            default: /^[a-zA-Z0-9-\s]+$/
        },
        email: {
            first: /^[A-Za-z0-9\+]+([-._][A-Za-z0-9\+]+)*@([A-Za-z0-9\+]+(-[A-Za-z0-9\+]+)*\.)+[A-Za-z]{2,24}$/,
            last: /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/
        },
        phone: /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i,
        cardNumber: {
            visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
            master: /^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$/,
            maestro: /^(5018|5020|5038|5612|5893|6304|6390|6759|676[1-3]|0604)/,
            amex: /^3[47][0-9]{13}$/,
            diners: /^3(?:0[0-5]|[68][0-9])[0-9]{11}$/,
            discover: /^6(?:011|5[0-9]{2})[0-9]{12}$/,
            jcb: /^(?:2131|1800|35\d{3})\d{11}$/,
            solo: /^(6334|6767)/,
            laser: /^(6304|670[69]|6771)/
        },
        cardNumberStarting: {
            visa: /^4[0-9]/,
            master: /^((5[1-5])|(2[2-7][0-9]))/,
            maestro: /^(5018|5020|5038|5612|5893|6304|6390|6759|676[1-3]|0604)/,
            amex: /^3[47]/,
            discover: /^6(?:011|5[0-9]{2})/,
            jcb: /^(?:21|180|35)/,
            diners: /^3(?:0[0-5]|[68][0-9])/,
            solo: /^(6334|6767)/,
            laser: /^(6304|670[69]|6771)/
        }
    };
    return {
        isValidZip: function(zip, country, pattern) {
            if (typeof pattern !== 'undefined') {
                return pattern.test(zip);
            }
            if (!patterns.zip.hasOwnProperty(country)) {
                return patterns.zip.default.test(zip);
            }
            return patterns.zip[country].test(zip);
        },
        /**
         * Email Address validator
         **/
        isValidEmail: function(email) {
            return patterns.email.first.test(email) && patterns.email.last.test(email);
        },
        isValidPhone: function(phone) {
            return patterns.phone.test(phone);
        },
        /**
         * Card Number Validator
         * Support Visa, Master, Amex, Diner, Discover, Jcb
         * @param cardNumber: A string of Card Number without any masking
         * @param cardType: A string of Card Type
         * @return boolean
         **/
        isValidCardNumber: function(cardNumber, cardType) {
            if (typeof cardNumber !== 'string' && !(cardNumber instanceof String)) {
                return false;
            }
            if (typeof cardType !== 'string' && !(cardType instanceof String)) {
                return false;
            }
            if (!patterns.cardNumber.hasOwnProperty(cardType)) {
                for (var field in patterns.cardNumber) {
                    if (patterns.cardNumber[field].test(cardNumber)) {
                        return true;
                    }
                }
                return false;
            }
            return patterns.cardNumber[cardType].test(cardNumber);
        },
        /**
         * CVV Validator
         * Support Visa, Master, Amex, Diner, Discover, Jcb
         **/
        isValidCvv: function(phone) {
            return /^\d{3,4}$/.test(phone);
        },
        /**
         * Card Length Provider
         * Support Visa, Master, Amex, Diner, Discover, Jcb
         * @param cardType: A string of Card Type
         **/
        getCardNumberMaxLength: function(cardType) {
            var maxLengths = {
                visa: 16,
                master: 16,
                amex: 15,
                diners: 14,
                discover: 16,
                jcb: 16
            };
            if (!maxLengths.hasOwnProperty(cardType)) {
                return 16;
            }
            return maxLengths[cardType];
        },
        /**
         * Card Type Detector
         * Support Visa, Master, Amex, Diner, Discover, Jcb
         * @param cardNumber: A string of Card Number without any masking
         * @return string if match or boolean false
         **/
        getCardType: function(cardNumber) {
            for(var cardType in patterns.cardNumberStarting){
                if(patterns.cardNumberStarting[cardType].test(cardNumber)){
                    return cardType;
                }
            }
            return false;
        }
    };
}());