<?php

namespace Webkul\Core\Repositories;

use Webkul\Core\Eloquent\Repository;

class CountryStateRepository extends Repository
{
    /**
     * Specify Model class name
<<<<<<< HEAD
     *
     * @return string
     */
    function model(): string
    {
        return 'Webkul\Core\Contracts\CountryState';
    }
}
=======
     */
    public function model(): string
    {
        return 'Webkul\Core\Contracts\CountryState';
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
