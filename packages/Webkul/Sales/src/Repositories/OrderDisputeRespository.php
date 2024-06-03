<?php

namespace Webkul\Sales\Repositories;

use Webkul\Core\Eloquent\Repository;
use Webkul\Sales\Contracts\OrderDispute;

class OrderDisputeRespository extends Repository
{
    /**
     * Specify model class name.
     */
    public function model(): string
    {
        return OrderDispute::class;
    }
}
