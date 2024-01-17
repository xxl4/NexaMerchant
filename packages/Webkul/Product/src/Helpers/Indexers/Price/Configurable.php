<?php

namespace Webkul\Product\Helpers\Indexers\Price;

class Configurable extends AbstractType
{
    /**
     * Returns product specific pricing for customer group
     *
     * @return array
     */
    public function getIndices()
    {
        return [
            'min_price'         => $this->getMinimalPrice() ?? 0,
            'regular_min_price' => $this->getRegularMinimalPrice() ?? 0,
            'max_price'         => $this->getMaximumPrice() ?? 0,
            'regular_max_price' => $this->getRegularMaximumPrice() ?? 0,
            'product_id'        => $this->product->id,
<<<<<<< HEAD
=======
            'channel_id'        => $this->channel->id,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'customer_group_id' => $this->customerGroup->id,
        ];
    }

    /**
     * Get product minimal price.
     *
     * @return float
     */
    public function getMinimalPrice($qty = null)
    {
        $minPrices = [];

        foreach ($this->product->variants as $variant) {
            if (! $variant->getTypeInstance()->isSaleable()) {
                continue;
            }

            $variantIndexer = $variant->getTypeInstance()
                ->getPriceIndexer()
<<<<<<< HEAD
=======
                ->setChannel($this->channel)
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ->setCustomerGroup($this->customerGroup)
                ->setProduct($variant);

            $minPrices[] = $variantIndexer->getMinimalPrice();
        }

        if (empty($minPrices)) {
            return 0;
        }

        return min($minPrices);
    }
<<<<<<< HEAD
    
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    /**
     * Get product regular minimal price.
     *
     * @return float
     */
    public function getRegularMinimalPrice()
    {
        $minPrices = [];

        foreach ($this->product->variants as $variant) {
            if (! $variant->getTypeInstance()->isSaleable()) {
                continue;
            }

            $minPrices[] = $variant->price;
        }

        if (empty($minPrices)) {
            return 0;
        }

        return min($minPrices);
    }

    /**
     * Get product maximum price.
     *
     * @return float
     */
    public function getMaximumPrice()
    {
        $maxPrices = [];

        foreach ($this->product->variants as $variant) {
            if (! $variant->getTypeInstance()->isSaleable()) {
                continue;
            }

            $variantIndexer = $variant->getTypeInstance()
                ->getPriceIndexer()
<<<<<<< HEAD
=======
                ->setChannel($this->channel)
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                ->setCustomerGroup($this->customerGroup)
                ->setProduct($variant);

            $maxPrices[] = $variantIndexer->getMinimalPrice();
        }

        if (empty($maxPrices)) {
            return 0;
        }

        return max($maxPrices);
    }

    /**
     * Get product regular maximum price.
     *
     * @return float
     */
    public function getRegularMaximumPrice()
    {
        $maxPrices = [];

        foreach ($this->product->variants as $variant) {
            if (! $variant->getTypeInstance()->isSaleable()) {
                continue;
            }

            $maxPrices[] = $variant->price;
        }

        if (empty($maxPrices)) {
            return 0;
        }

        return max($maxPrices);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
