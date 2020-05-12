<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Model\ProductPrice;

class ProductPriceFactory extends AbstractModelFactory
{
    protected $withBulkPrices = false;

    /**
     * @return mixed[]
     * @throws \Exception
     */
    protected function makeFakeArray(): array
    {
        return [
            'id' => $this->makeIdentityArray(IdentityType::PRODUCT_PRICE),
            'customerGroupId' => $this->makeIdentityArray(IdentityType::CUSTOMER_GROUP),
            //'customerId' => null,
            'productId' => $this->makeIdentityArray(IdentityType::PRODUCT),
            'items' => $this->makeItemsArray($this->withBulkPrices),
        ];
    }

    /**
     * @param bool $withBulkPrices
     * @return array
     */
    public function makeItemsArray(bool $withBulkPrices = false): array
    {
        $items = [
            $this->makeItemArray(['quantity' => 0, 'netPrice' => $this->faker->randomFloat(4, 1)])
        ];

        if ($withBulkPrices === true) {
            $pricesCount = mt_rand(1, mt_rand(1, 30));
            $maxQuantity = mt_rand($pricesCount, mt_rand($pricesCount, 500));
            $step = (int)floor($maxQuantity / $pricesCount);
            $priceStep = floor($items[0]['netPrice'] / $pricesCount);

            $quantity = 0;
            for ($i = 0; $i < $pricesCount; $i++) {
                $quantity += $step;
                $minPrice = $items[$i]['netPrice'] - $priceStep;
                if ($minPrice > $items[$i]['netPrice'] || $minPrice < 0) {
                    $minPrice = (($items[$i]['netPrice'] - 0.1) / 2);
                }
                $price = mt_rand($minPrice, $items[$i]['netPrice']);
                $items[] = $this->makeItemArray(['quantity' => $quantity, 'netPrice' => $price]);
            }
        }

        return $items;
    }

    /**
     * @param mixe[] $override
     * @return mixed[]
     */
    public function makeItemArray(array $override = []): array
    {
        return array_merge([
            'quantity' => $this->faker->numberBetween(),
            'netPrice' => $this->faker->randomFloat(4, 1),
        ], $override);
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
