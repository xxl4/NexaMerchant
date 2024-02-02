<?php
namespace Nicelizhi\ShopLine\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Eloquent\TranslatableModel;
use Webkul\Core\Models\ChannelProxy;
use Konekt\Concord\Proxies\ModelProxy;
use Illuminate\Database\Eloquent\Model;
use Nicelizhi\ShopLine\Contracts\ShopLineProduct as ShopLineProductContract;


class ShoplineProduct extends Model implements ShopLineProductContract
{
    use HasFactory;

    /**
     * Castable.
     *
     * @var array
     */
    // protected $casts = [
    //     'options' => 'json',
    //     'variants' => 'json',
    //     'images' => 'json',
    // ];

    /**
     * Add fillable properties
     *
     * @var array
     */
    protected $fillable = [
        'product_id'
    ];
}
