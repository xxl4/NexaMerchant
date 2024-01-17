<?php

namespace Webkul\Core\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Webkul\Core\Contracts\ChannelTranslation as ChannelTranslationContract;

class ChannelTranslation extends Model implements ChannelTranslationContract
{
    protected $guarded = [];

    protected $casts = [
        'home_seo' => 'array',
    ];
}
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webkul\Core\Contracts\ChannelTranslation as ChannelTranslationContract;
use Webkul\Core\Database\Factories\ChannelTranslationFactory;

class ChannelTranslation extends Model implements ChannelTranslationContract
{
    use HasFactory;

    /**
     * Guarded.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Castable.
     *
     * @var array
     */
    protected $casts = [
        'home_seo' => 'array',
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return ChannelTranslationFactory::new();
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
