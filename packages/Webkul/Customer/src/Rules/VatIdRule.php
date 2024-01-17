<?php

namespace Webkul\Customer\Rules;

use Illuminate\Contracts\Validation\Rule;
<<<<<<< HEAD
use Webkul\Customer\Rules\VatValidator;
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

/**
 * Class VatIdRule
 *
 * @see https://laravel.com/docs/5.8/validation#using-rule-objects
<<<<<<< HEAD
 * @package App\Rules
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
 */
class VatIdRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * The rules are borrowed from:
<<<<<<< HEAD
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @see https://raw.githubusercontent.com/danielebarbaro/laravel-vat-eu-validator/master/src/VatValidator.php
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $validator = new VatValidator();

        return empty($value) || $validator->validate($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('customer::app.validations.vat-id.invalid-format');
    }
}
