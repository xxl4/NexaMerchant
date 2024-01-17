<?php

namespace Webkul\Core\Models;

<<<<<<< HEAD
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Contracts\Country as CountryContract;
=======
use Webkul\Core\Contracts\Country as CountryContract;
use Webkul\Core\Eloquent\TranslatableModel;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class Country extends TranslatableModel implements CountryContract
{
    public $timestamps = false;

    public $translatedAttributes = ['name'];

    protected $with = ['translations'];

    /**
     * Get the States.
     */
    public function states()
    {
        return $this->hasMany(CountryStateProxy::modelClass());
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
