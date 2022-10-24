<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Model\ProductVariation;

class ProductVariationFactory extends AbstractModelFactory
{
    /**
     * @throws \Exception
     */
    protected function makeFakeArray(): array
    {
        return [
            'id'     => $this->makeIdentityArray(IdentityType::PRODUCT_VARIATION),
            'sort'   => $this->faker->numberBetween(),
            //'type' => '',
            'i18ns'  => $this->getFactory('ProductVariationI18n')->makeArray(\random_int(1, 5)),
            //'inivisibilities' => [],
            'values' => [],
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return ProductVariation::class;
    }
}
