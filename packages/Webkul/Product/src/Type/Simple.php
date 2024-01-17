<?php

namespace Webkul\Product\Type;

use Webkul\Product\Helpers\Indexers\Price\Simple as SimpleIndexer;

class Simple extends AbstractType
{
    /**
     * Show quantity box.
     *
     * @var bool
     */
    protected $showQuantityBox = true;

    /**
     * Return true if this product type is saleable. Saleable check added because
     * this is the point where all parent product will recall this.
     *
     * @return bool
     */
    public function isSaleable()
    {
        if (! $this->product->status) {
            return false;
        }

<<<<<<< HEAD
        if (
            is_callable(config('products.isSaleable'))
            && call_user_func(config('products.isSaleable'), $this->product) === false
        ) {
            return false;
        }

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        return $this->haveSufficientQuantity(1);
    }

    /**
     * Have sufficient quantity.
<<<<<<< HEAD
     *
     * @param  int  $qty
     * @return bool
     */
    public function haveSufficientQuantity(int $qty): bool
    {
        if (! $this->product->manage_stock){
=======
     */
    public function haveSufficientQuantity(int $qty): bool
    {
        if (! $this->product->manage_stock) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            return true;
        }

        return $qty <= $this->totalQuantity() ?: (bool) core()->getConfigData('catalog.inventory.stock_options.back_orders');
    }

    /**
     * Get product maximum price.
     *
     * @return float
     */
    public function getMaximumPrice()
    {
        return $this->product->price;
    }

    /**
     * Returns price indexer class for a specific product type
     *
     * @return string
     */
    public function getPriceIndexer()
    {
        return app(SimpleIndexer::class);
    }
}
