<?php

namespace Nicelizhi\Shopify\Repositories;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Webkul\Core\Eloquent\Repository;
use Nicelizhi\Shopify\Contracts\ShopifyProduct;

class ProductRepository extends Repository
{
    /**
     * Specify model class name.
     */
    public function model(): string
    {
        //return 'Nicelizhi\Shopify\Contracts\ShopifyProduct';
        return 'Nicelizhi\\Shopify\\Contracts\\ShopifyProduct';
        return Product::class;
    }


}