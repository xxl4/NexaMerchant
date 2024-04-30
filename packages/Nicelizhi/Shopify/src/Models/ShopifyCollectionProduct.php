<?php
namespace Nicelizhi\Shopify\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Konekt\Concord\Proxies\ModelProxy;
use Illuminate\Database\Eloquent\Model;
use Nicelizhi\Shopify\Contracts\ShopifyCollectionProduct as ShopifyCollectionProductContract;


class ShopifyCollectionProduct extends Model implements ShopifyCollectionProductContract
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
        'product_id'
    ];
}
