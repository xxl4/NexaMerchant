<?php
namespace Nicelizhi\Shopify\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Konekt\Concord\Proxies\ModelProxy;
use Illuminate\Database\Eloquent\Model;
use Nicelizhi\Shopify\Contracts\ShopifyCustomCollection as ShopifyCustomCollectionContract;


class ShopifyCustomCollection extends Model implements ShopifyCustomCollectionContract
{
    use HasFactory;

    /**
     * Castable.
     *
     * @var array
     */

    /**
     * Add fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'collection_id',
        'handle',
        'sprt_order',
        'published_scope',
        'title'
    ];
}
