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
            'id' => $this->makeIdentity(IdentityType::PRODUCT_PRICE),
            'customerGroupId' => $this->makeIdentity(IdentityType::CUSTOMER_GROUP),
            //'customerId' => null,
            'productId' => $this->makeIdentity(IdentityType::PRODUCT),
            'items' => $this->generateItemsArray($this->withBulkPrices),
        ], $override);
    }

    /**
     * @param bool $withBulkPrices
     * @return array
     */
    public function generateItemsArray(bool $withBulkPrices = false): array
    {
        $items = [
            $this->generateItem(0, $this->faker->randomFloat())
        ];

        if ($withBulkPrices === true) {
            $pricesCount = mt_rand(1, mt_rand(1, 30));
            $maxQuantity = mt_rand($pricesCount, mt_rand($pricesCount, 500));
            $step = (int)floor($maxQuantity/$pricesCount);

            $quantity = 0;
            for ($i = 0; $i < $pricesCount; $i++) {
                $quantity = mt_rand($quantity + 1, $quantity + $step);
                $price = mt_rand($items[$i]['netPrice'] + 1, $items[$i]['netPrice'] * mt_rand(2,3));
                $items[] = $this->generateItem($quantity, $price);
            }
        }

        return $items;
    }

    /**
     * @param int $quantity
     * @param float $netPrice
     * @return mixed[]
     */
    public function generateItem(int $quantity, float $netPrice): array
    {
        return [
            'quantity' => $quantity,
            'netPrice' => $netPrice,
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return ProductPrice::class;
    }
}