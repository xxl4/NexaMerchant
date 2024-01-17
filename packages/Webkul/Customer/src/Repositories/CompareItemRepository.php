<?php

namespace Webkul\Customer\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Customer\Contracts\CompareItem;

class CompareItemRepository extends Repository
{
    /**
     * Specify Model class name
<<<<<<< HEAD
     *
     * @return string
     */
    function model(): string
    {
        return CompareItem::class;
    }
}
=======
     */
    public function model(): string
    {
        return CompareItem::class;
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
