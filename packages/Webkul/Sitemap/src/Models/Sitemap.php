<?php

namespace Webkul\Sitemap\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\Marketing\Database\Factories\SitemapFactory;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Sitemap\Contracts\Sitemap as SitemapContract;

class Sitemap extends Model implements SitemapContract
{
<<<<<<< HEAD
=======
    use HasFactory;

    /**
     * Define the fillable properties
     *
     * @var array
     */
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    protected $fillable = [
        'file_name',
        'path',
        'generated_at',
    ];
<<<<<<< HEAD
}
=======

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return SitemapFactory::new();
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
