<?php

namespace Webkul\Core\Eloquent;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
=======
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Core\Helpers\Locales;

class TranslatableModel extends Model
{
    use Translatable;

    /**
     * Get locales helper.
<<<<<<< HEAD
     *
     * @return \Webkul\Core\Helpers\Locales
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected function getLocalesHelper(): Locales
    {
        return app(Locales::class);
    }

    /**
     * Locale. This method is being overridden to address the
     * performance issues caused by the existing implementation
     * which increases application time.
     *
     * @return string
     */
    protected function locale()
    {
        if ($this->isChannelBased()) {
<<<<<<< HEAD
            return core()->getDefaultChannelLocaleCode();
=======
            return core()->getDefaultLocaleCodeFromDefaultChannel();
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        } else {
            if ($this->defaultLocale) {
                return $this->defaultLocale;
            }

            return config('translatable.locale') ?: app()->make('translator')->getLocale();
        }
    }

    /**
     * Is channel based.
     *
     * @return bool
     */
    protected function isChannelBased()
    {
        return false;
    }
}
