<?php
namespace Nicelizhi\Shopify\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Konekt\Concord\Proxies\ModelProxy;
use Illuminate\Database\Eloquent\Model;
use Nicelizhi\Shopify\Contracts\ShopifyOrder as ShopifyOrderContract;


class ShopifyOrder extends Model implements ShopifyOrderContract
{
    use HasFactory;

    protected $casts = [
        'current_subtotal_price_set' => 'json',
        'current_total_discounts_set' => 'json',
        'current_total_tax_set' => 'json',
        'discount_codes' => 'json',
        'total_discounts_set' => 'json',
        'total_line_items_price_set' => 'json',
        'total_price_set' => 'json',
        'total_shipping_price_set' => 'json',
        'total_tax_set' => 'json',
        'billing_address' => 'json',
        'customer' => 'json',
        'discount_applications' => 'json',
        'line_items' => 'json',
        'shipping_address' => 'json',
        'shipping_lines' => 'json',
        'subtotal_price_set' => 'json',
        'refunds' => 'json',
        'fulfillments' => 'json',
        'tax_lines' => 'json',
        'payment_gateway_names' => 'json',
        'note_attributes' => 'json',
        'client_details' => 'json',
        'current_total_price_set' => 'json'
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
        'order_id',
        'shopify_store_id',
        'shopify_order_id',
    ];
}
