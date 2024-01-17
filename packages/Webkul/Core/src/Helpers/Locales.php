<?php

namespace Webkul\Core\Helpers;

use Astrotomic\Translatable\Locales as BaseLocales;

class Locales extends BaseLocales
{
    /**
     * Load.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function load(): void
    {
        $this->locales = [];

        foreach (core()->getAllLocales() as $locale) {
            $this->locales[$locale->code] = $locale->code;
        }
    }
}
