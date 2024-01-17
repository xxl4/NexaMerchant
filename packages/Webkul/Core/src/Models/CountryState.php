<?php

namespace Webkul\Core\Models;

<<<<<<< HEAD
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Contracts\CountryState as CountryStateContract;
=======
use Webkul\Core\Contracts\CountryState as CountryStateContract;
use Webkul\Core\Eloquent\TranslatableModel;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CountryState extends TranslatableModel implements CountryStateContract
{
    public $timestamps = false;

    public $translatedAttributes = ['default_name'];

    protected $with = ['translations'];

    /**
     * @return array
     */
    public function toArray()
    {
        $array = parent::toArray();

        $array['default_name'] = $this->default_name;

        return $array;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
