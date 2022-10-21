<?php
namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\Generator\AbstractModelFactory;
use Jtl\Connector\Core\Model\ProductVariationValueI18n;

class ProductVariationValueI18nFactory extends AbstractModelFactory
{
    /**
     * @return mixed[]
     */
    protected function makeFakeArray(): array
    {
        return [
            'languageIso' => $this->faker->languageCode,
            'name'        => $this->faker->text(80),
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return ProductVariationValueI18n::class;
    }
}
