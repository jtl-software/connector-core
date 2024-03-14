<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\ProductStockLevel;

class ProductStockLevelFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        /** @var IdentityFactory $identityFactory */
        $identityFactory = $this->getFactory('Identity');

        return [
            'productId'  => $identityFactory->makeOneArray(),
            'stockLevel' => $this->faker->numberBetween(0, 100)
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return ProductStockLevel::class;
    }
}
