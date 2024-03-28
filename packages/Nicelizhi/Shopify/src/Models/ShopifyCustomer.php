<?php
namespace Nicelizhi\Shopify\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Konekt\Concord\Proxies\ModelProxy;
use Illuminate\Database\Eloquent\Model;
use Nicelizhi\Shopify\Contracts\ShopifyCustomer as ShopifyCustomerContract;


class ShopifyCustomer extends Model implements ShopifyCustomerContract
{
    use HasFactory;

    protected $casts = [
        'addresses' => 'json',
        'email_marketing_consent' => 'json',
        'sms_marketing_consent' => 'json',
        'tax_exemptions' => 'json',
        'default_address' => 'json'
    ];

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
        'cus_id',
        'email'
    ];
}
