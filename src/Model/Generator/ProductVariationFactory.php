<?php
namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\ProductVariation;

class ProductVariationFactory extends AbstractModelFactory
{
    public function makeOneArray(array $override = []): array
    {
        return array_merge([
            'sort' => $this->faker->numberBetween(),
            //'type' => '',
            'i18ns' => $this->getFactory('ProductVariationI18n')->makeArray(mt_rand(1, 5)),
            //'inivisibilities' => [],
            'values' => []
        ], $override);
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return ProductVariation::class;
    }
}