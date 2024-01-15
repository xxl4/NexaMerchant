<?php
namespace Nicelizhi\Shopify\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Konekt\Concord\Proxies\ModelProxy;
use Illuminate\Database\Eloquent\Model;
use Nicelizhi\Shopify\Contracts\ShopifyStore as ShopifyStoreContract;


class ShopifyStore extends Model implements ShopifyStoreContract
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
        'shopify_store_id',
        'shopify_app_host_name',
        'shopify_admin_access_token',
        'shopify_client_id',
        'shopify_client_secret',
        'status',
    ];
}
