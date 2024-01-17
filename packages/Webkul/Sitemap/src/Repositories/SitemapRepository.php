<?php

namespace Webkul\Sitemap\Repositories;

use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Webkul\Core\Eloquent\Repository;
<<<<<<< HEAD
use Webkul\Sitemap\Models\Product;
use Webkul\Sitemap\Models\Category;
use Webkul\Sitemap\Models\CmsPage;
=======
use Webkul\Sitemap\Models\Category;
use Webkul\Sitemap\Models\Page;
use Webkul\Sitemap\Models\Product;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class SitemapRepository extends Repository
{
    /**
     * Specify Model class name
<<<<<<< HEAD
     *
     * @return string
     */
    function model(): string
=======
     */
    public function model(): string
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        return 'Webkul\Sitemap\Contracts\Sitemap';
    }

    /**
     * Create.
     *
<<<<<<< HEAD
     * @param  array  $attributes
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return mixed
     */
    public function create(array $attributes)
    {
        $sitemap = parent::create($attributes);

        $this->generateSitemap($sitemap);

        return $sitemap;
    }

    /**
     * Update.
     *
<<<<<<< HEAD
     * @param  array  $attributes
     * @param  $id
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $sitemap = $this->find($id);

        Storage::delete($sitemap->path . '/' . $sitemap->file_name);

        $sitemap = parent::update($attributes, $id);

        $this->generateSitemap($sitemap);
    }

    /**
     * Update.
     *
     * @param  \Webkul\Sitemap\Contracts\Sitemap  $sitemap
     * @return void
     */
    public function generateSitemap($sitemap)
    {
        Sitemap::create()
            ->add(Url::create('/'))
            ->add(Category::all())
            ->add(Product::all())
<<<<<<< HEAD
            ->add(CmsPage::all())
            ->writeToDisk('public', $sitemap->path . '/' . $sitemap->file_name);
    }
}
=======
            ->add(Page::all())
            ->writeToDisk('public', $sitemap->path . '/' . $sitemap->file_name);
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
