<?php

namespace Webkul\Product\Helpers\Indexers\Price;

use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductCustomerGroupPriceRepository;
use Webkul\CatalogRule\Repositories\CatalogRuleProductPriceRepository;
=======
use Webkul\CatalogRule\Repositories\CatalogRuleProductPriceRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductCustomerGroupPriceRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

abstract class AbstractType
{
    /**
     * Product instance.
     *
     * @var \Webkul\Product\Contracts\Product
     */
    protected $product;

    /**
<<<<<<< HEAD
=======
     * Channel instance.
     *
     * @var \Webkul\Core\Contracts\Channel
     */
    protected $channel;

    /**
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * Customer Group instance.
     *
     * @var \Webkul\Customer\Contracts\CustomerGroup
     */
    protected $customerGroup;

    /**
     * Create a new command instance.
     *
<<<<<<< HEAD
     * @param  \Webkul\Customer\Repositories\CustomerRepository  $customerRepository
     * @param  \Webkul\Product\Repositories\ProductCustomerGroupPriceRepository  $productCustomerGroupPriceRepository
     * @param  \Webkul\CatalogRule\Repositories\CatalogRuleProductPriceRepository  $catalogRuleProductPriceRepository
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return void
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected ProductCustomerGroupPriceRepository $productCustomerGroupPriceRepository,
        protected CatalogRuleProductPriceRepository $catalogRuleProductPriceRepository
<<<<<<< HEAD
    )
    {
=======
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Set current product
     *
     * @param  \Webkul\Product\Contracts\Product  $product
     * @return \Webkul\Product\Helpers\Indexers\Price\AbstractPriceIndex
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
<<<<<<< HEAD
=======
     * Set channel
     *
     * @param  \Webkul\Core\Contracts\Channel  $channel
     * @return \Webkul\Product\Helpers\Indexers\Price\AbstractPriceIndex
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * Set customer group
     *
     * @param  \Webkul\Customer\Contracts\CustomerGroup  $customerGroup
     * @return \Webkul\Product\Helpers\Indexers\Price\AbstractPriceIndex
     */
    public function setCustomerGroup($customerGroup)
    {
        $this->customerGroup = $customerGroup;

        return $this;
    }

    /**
     * Returns product specific pricing for customer group
     *
     * @return array
     */
    public function getIndices()
    {
        return [
            'min_price'         => ($minPrice = $this->getMinimalPrice()) ?? 0,
            'regular_min_price' => $this->product->price ?? 0,
            'max_price'         => $minPrice ?? 0,
            'regular_max_price' => $this->product->price ?? 0,
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
<<<<<<< HEAD
     * @param  integer  $qty
=======
     * @param  int  $qty
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return float
     */
    public function getMinimalPrice($qty = null)
    {
        $customerGroupPrice = $this->getCustomerGroupPrice($qty ?? 1);

        $rulePrice = $this->getCatalogRulePrice();

        if (
            empty($this->product->special_price)
            && empty($rulePrice)
            && $customerGroupPrice == $this->product->price
        ) {
            return $this->product->price;
        }

        if (! (float) $this->product->special_price) {
            if ($rulePrice) {
                $discountedPrice = min($rulePrice->price, $this->product->price);
            } else {
                $discountedPrice = $this->product->price;
            }
        } else {
            if ($rulePrice) {
                if (
                    core()->isChannelDateInInterval(
                        $this->product->special_price_from,
                        $this->product->special_price_to
                    )
                ) {
                    $discountedPrice = min($rulePrice->price, $this->product->special_price);
                } else {
                    $discountedPrice = $rulePrice->price;
                }
            } else {
                if (
                    core()->isChannelDateInInterval(
                        $this->product->special_price_from,
                        $this->product->special_price_to
                    )
                ) {
                    $discountedPrice = $this->product->special_price;
                } else {
                    $discountedPrice = $this->product->price;
                }
            }
        }

        return min($discountedPrice, $customerGroupPrice);
    }

    /**
     * Get product group price.
     *
<<<<<<< HEAD
     * @param  integer  $qty
=======
     * @param  int  $qty
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return float
     */
    public function getCustomerGroupPrice($qty)
    {
        $customerGroupPrices = $this->productCustomerGroupPriceRepository
            ->prices($this->product, $this->customerGroup->id);

        if ($customerGroupPrices->isEmpty()) {
            return $this->product->price;
        }

        $lastQty = 1;

        $lastPrice = $this->product->price;

        $lastCustomerGroupId = null;

        foreach ($customerGroupPrices as $customerGroupPrice) {
            if (
                $customerGroupPrice->qty > $qty
                || $customerGroupPrice->qty < $lastQty
            ) {
                continue;
            }

            if ($customerGroupPrice->value_type == 'discount') {
                if (
                    $customerGroupPrice->value >= 0
                    && $customerGroupPrice->value <= 100
                ) {
                    $lastPrice = $this->product->price - ($this->product->price * $customerGroupPrice->value) / 100;

                    $lastQty = $customerGroupPrice->qty;

                    $lastCustomerGroupId = $customerGroupPrice->customer_group_id;
                }
            } else {
                if (
                    $customerGroupPrice->value >= 0
                    && $customerGroupPrice->value < $lastPrice
                ) {
                    $lastPrice = $customerGroupPrice->value;

                    $lastQty = $customerGroupPrice->qty;

                    $lastCustomerGroupId = $customerGroupPrice->customer_group_id;
                }
            }
        }

        return $lastPrice;
    }

    /**
     * Get catalog rules product price for specific date, channel and customer group.
     *
     * @return mixed
     */
    public function getCatalogRulePrice()
    {
        return $this->product->catalog_rule_prices
            ->where('customer_group_id', $this->customerGroup->id)
<<<<<<< HEAD
            ->where('channel_id', core()->getCurrentChannel()->id)
            ->where('rule_date', Carbon::now()->format('Y-m-d'))
            ->first();
    }
}
=======
            ->where('channel_id', $this->channel->id)
            ->where('rule_date', Carbon::now()->format('Y-m-d'))
            ->first();
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
