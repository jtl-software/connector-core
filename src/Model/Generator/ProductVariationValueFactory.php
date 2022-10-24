<?php
namespace Jtl\Connector\Core\Model\Generator;

use Jawira\CaseConverter\CaseConverterException;
use Jtl\Connector\Core\Model\ProductVariationValue;

class ProductVariationValueFactory extends AbstractModelFactory
{
    /**
     * @return array
     * @throws \Exception
     */
    protected function makeFakeArray(): array
    {
        return [
            'sort'  => $this->faker->numberBetween(),
            'i18ns' => $this->getFactory('ProductVariationValueI18n')->makeArray(\random_int(1, 5)),
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
