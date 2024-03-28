<?php
namespace Nicelizhi\ShopLine\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Konekt\Concord\Proxies\ModelProxy;
use Illuminate\Database\Eloquent\Model;
use Nicelizhi\Shopify\Contracts\ShopifyStore as ShopifyStoreContract;


class ShoplineStore extends Model implements ShopifyStoreContract
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
        'store_id',
        'app_host_name',
        'admin_access_token',
        'client_id',
        'client_secret',
        'status',
    ];
}
