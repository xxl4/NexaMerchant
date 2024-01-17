<?php

namespace Webkul\Sitemap\Models;

use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use Webkul\Product\Models\Product as BaseProduct;

class Product extends BaseProduct implements Sitemapable
{
    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function toSitemapTag(): Url | string | array
=======
    public function toSitemapTag(): Url|string|array
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        if (
            ! $this->url_key
            || ! $this->status
            || ! $this->visible_individually
        ) {
            return [];
        }

        return route('shop.product_or_category.index', $this->url_key);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
