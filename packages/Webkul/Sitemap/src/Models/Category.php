<?php

namespace Webkul\Sitemap\Models;

use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use Webkul\Category\Models\Category as BaseCategory;

class Category extends BaseCategory implements Sitemapable
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
            ! $this->slug
            || ! $this->status
        ) {
            return [];
        }

        return route('shop.product_or_category.index', $this->slug);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
