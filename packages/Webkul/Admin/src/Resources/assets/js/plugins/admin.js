export default {
    install(app) {
        app.config.globalProperties.$admin = {
            /**
             * Generates a formatted price string using the provided price, localeCode, and currencyCode.
             *
             * @param {number} price - The price value to be formatted.
             * @param {string} localeCode - The locale code specifying the desired formatting rules.
             * @param {string} currencyCode - The currency code specifying the desired currency symbol.
             * @returns {string} - The formatted price string.
             */
            formatPrice: (price, localeCode = null, currencyCode = null) => {
<<<<<<< HEAD
                if (!localeCode) {
=======
                if (! localeCode) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    localeCode =
                        document.querySelector(
                            'meta[http-equiv="content-language"]'
                        ).content ?? "en";
                }

<<<<<<< HEAD
                if (!currencyCode) {
=======
                if (! currencyCode) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    currencyCode =
                        document.querySelector('meta[name="currency-code"]')
                            .content ?? "USD";
                }

<<<<<<< HEAD
                return new Intl.NumberFormat(localeCode, {
=======
                return new Intl.NumberFormat(localeCode.replace('_', '-'), {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    style: "currency",
                    currency: currencyCode,
                }).format(price);
            },
        };
    },
};
