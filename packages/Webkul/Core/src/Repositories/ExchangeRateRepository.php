<?php

namespace Webkul\Core\Repositories;

use Webkul\Core\Eloquent\Repository;

class ExchangeRateRepository extends Repository
{
    /**
     * Specify model class name.
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function model(): string
    {
        return 'Webkul\Core\Contracts\CurrencyExchangeRate';
    }
}
