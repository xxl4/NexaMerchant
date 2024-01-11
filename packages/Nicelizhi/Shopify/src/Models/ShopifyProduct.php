<?php
namespace Nicelizhi\Shopify\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Konekt\Concord\Proxies\ModelProxy;
use Illuminate\Database\Eloquent\Model;
use Nicelizhi\Shopify\Contracts\ShopifyProduct as ShopifyProductContract;


class ShopifyProduct extends Model implements ShopifyProductContract
{
    use HasFactory;

    /**
     * Castable.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'json',
        'variants' => 'json',
        'images' => 'json',
    ];

    /**
     * Add fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'shopify_store_id',
        'title',
        'body_html',
        'vendor',
        'product_type',
        'published_at',
        'template_suffix',
        'published_scope',
        'tags',
        'status',
        'admin_graphql_api_id',
        'variants',
        'options',
        'images',
    ];
}
