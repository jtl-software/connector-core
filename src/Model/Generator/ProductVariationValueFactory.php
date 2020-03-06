<?php
namespace Jtl\Connector\Core\Model\Generator;

use Jawira\CaseConverter\CaseConverterException;
use Jtl\Connector\Core\Model\ProductVariationValue;

class ProductVariationValueFactory extends AbstractModelFactory
{
    /**
     * @param array $override
     * @return array
     * @throws CaseConverterException
     */
    protected function makeFakeArray(): array
    {
        return [
            'sort' => $this->faker->numberBetween(),
            'i18ns' => $this->getFactory('ProductVariationValueI18n')->makeArray(mt_rand(1, 5))
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return ProductVariationValue::class;
    }
}