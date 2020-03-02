<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Model\ProductPrice;

class ProductPriceFactory extends AbstractModelFactory
{
    protected $withBulkPrices = false;

    /**
     * @param array $override
     * @return array
     * @throws \Exception
     */
    public function makeOneArray(array $override = []): array
    {
        return array_merge([
            'id' => $this->makeIdentityArray(IdentityType::PRODUCT_PRICE),
            'customerGroupId' => $this->makeIdentityArray(IdentityType::CUSTOMER_GROUP),
            //'customerId' => null,
            'productId' => $this->makeIdentityArray(IdentityType::PRODUCT),
            'items' => $this->makeItemsArray($this->withBulkPrices),
        ], $override);
    }

    /**
     * @param bool $withBulkPrices
     * @return array
     */
    public function makeItemsArray(bool $withBulkPrices = false): array
    {
        $items = [
            $this->makeItemArray(0, $this->faker->randomFloat())
        ];

        if ($withBulkPrices === true) {
            $pricesCount = mt_rand(1, mt_rand(1, 30));
            $maxQuantity = mt_rand($pricesCount, mt_rand($pricesCount, 500));
            $step = (int)floor($maxQuantity / $pricesCount);

            $quantity = 0;
            for ($i = 0; $i < $pricesCount; $i++) {
                $quantity = mt_rand($quantity + 1, $quantity + $step);
                $price = mt_rand($items[$i]['netPrice'] + 1, $items[$i]['netPrice'] * mt_rand(2, 3));
                $items[] = $this->makeItemArray($quantity, $price);
            }
        }

        return $items;
    }

    /**
     * @param int $quantity
     * @param float $netPrice
     * @return mixed[]
     */
    public function makeItemArray(int $quantity, float $netPrice): array
    {
        return [
            'quantity' => $quantity,
            'netPrice' => $netPrice,
        ];
    }

    /**
     * @param bool $withBulkPrices
     * @return ProductPriceFactory
     */
    public function setWithBulkPrices(bool $withBulkPrices): ProductPriceFactory
    {
        $this->withBulkPrices = $withBulkPrices;
        return $this;
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return ProductPrice::class;
    }
}