<?php

namespace Nicelizhi\Lp\Repositories;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Webkul\Core\Eloquent\Repository;

class LpRepository extends Repository
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct(
        Container $container
    ) {
        parent::__construct($container);
    }

    /**
     * Specify model class name.
     */
    public function model(): string
    {
        return 'Nicelizhi\Lp\Contracts\Lp';
    }


    /**
     * Retrieve product from slug without throwing an exception.
     *
     * @param  string  $slug
     * @return \Webkul\Product\Contracts\Product
     */
    public function findBySlug($slug)
    {
        return $this->findByAttributeCode('slug', $slug);
    }

    /**
     * Retrieve product from slug.
     *
     * @param  string  $slug
     * @return \Webkul\Product\Contracts\Product
     */
    public function findBySlugOrFail($slug)
    {
        $product = $this->findByAttributeCode('slug', $slug);

        if (! $product) {
            throw (new ModelNotFoundException)->setModel(
                get_class($this->model), $slug
            );
        }

        return $product;
    }
        
}
