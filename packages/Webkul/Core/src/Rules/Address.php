<?php

namespace Webkul\Core\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Address implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
<<<<<<< HEAD
        if (! preg_match("~^[a-zA-Z0-9\s'\s\p{Arabic}\-\,]{1,60}$~iu", $value)) {
=======
        if (! preg_match("/^[a-zA-Z0-9\s'\p{Arabic}\p{Bengali}\p{Hebrew}\p{Latin}\p{Sinhala}\p{Cyrillic}\p{Devanagari}p{Hiragana}\p{Katakana}\p{Han}\-,\(\)]{1,60}$/iu", $value)) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            $fail('core::validation.address')->translate();
        }
    }
}
