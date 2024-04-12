<?php

namespace Webkul\FPC\Listeners;

use Spatie\ResponseCache\Facades\ResponseCache;

class Refund extends Product
{
    /**
     * After refund is created
     *
     * @param  \Webkul\Sale\Contracts\Refund  $refund
     * @return void
     */
    public function afterCreate($refund)
    {
        foreach ($refund->items as $item) {
            if(!is_null($item->product)) { // when the product has deleted, and need to check it todo
                $urls = $this->getForgettableUrls($item->product);

                ResponseCache::forget($urls);
            }
            
        }
    }
}
