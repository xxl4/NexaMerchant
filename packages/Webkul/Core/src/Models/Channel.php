<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use Webkul\Category\Models\CategoryProxy;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Inventory\Models\InventorySourceProxy;
use Webkul\Core\Database\Factories\ChannelFactory;
use Webkul\Core\Contracts\Channel as ChannelContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;
use Webkul\Category\Models\CategoryProxy;
use Webkul\Core\Contracts\Channel as ChannelContract;
use Webkul\Core\Database\Factories\ChannelFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Inventory\Models\InventorySourceProxy;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class Channel extends TranslatableModel implements ChannelContract
{
    use HasFactory;

<<<<<<< HEAD
=======
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    protected $fillable = [
        'code',
        'name',
        'description',
        'theme',
        'hostname',
        'default_locale_id',
        'base_currency_id',
        'root_category_id',
        'home_seo',
        'is_maintenance_on',
        'maintenance_mode_text',
        'allowed_ips',
    ];

<<<<<<< HEAD
=======
    /**
     * Castable.
     *
     * @var array
     */
    protected $casts = [
        'home_seo' => 'array',
    ];

    /**
     * Translated attributes.
     *
     * @var array
     */
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    public $translatedAttributes = [
        'name',
        'description',
        'maintenance_mode_text',
        'home_seo',
    ];

    /**
     * Get the channel locales.
     */
    public function locales(): BelongsToMany
    {
        return $this->belongsToMany(LocaleProxy::modelClass(), 'channel_locales');
    }

    /**
     * Get the default locale
     */
    public function default_locale(): BelongsTo
    {
        return $this->belongsTo(LocaleProxy::modelClass());
    }

    /**
     * Get the channel locales.
     */
    public function currencies(): BelongsToMany
    {
        return $this->belongsToMany(CurrencyProxy::modelClass(), 'channel_currencies');
    }

    /**
     * Get the channel inventory sources.
     */
    public function inventory_sources(): BelongsToMany
    {
        return $this->belongsToMany(InventorySourceProxy::modelClass(), 'channel_inventory_sources');
    }

    /**
     * Get the base currency.
<<<<<<< HEAD
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function base_currency(): BelongsTo
    {
        return $this->belongsTo(CurrencyProxy::modelClass());
    }

    /**
     * Get the root category.
<<<<<<< HEAD
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function root_category(): BelongsTo
    {
        return $this->belongsTo(CategoryProxy::modelClass(), 'root_category_id');
    }

    /**
     * Get logo image url.
     */
    public function logo_url()
    {
        if (! $this->logo) {
            return;
        }

        return Storage::url($this->logo);
    }

    /**
     * Get logo image url.
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo_url();
    }

    /**
     * Get favicon image url.
     */
    public function favicon_url()
    {
        if (! $this->favicon) {
            return;
        }

        return Storage::url($this->favicon);
    }

    /**
     * Get favicon image url.
     */
    public function getFaviconUrlAttribute()
    {
        return $this->favicon_url();
    }

    /**
     * Create a new factory instance for the model
<<<<<<< HEAD
     *
     * @return Factory
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected static function newFactory(): Factory
    {
        return ChannelFactory::new();
    }
}
