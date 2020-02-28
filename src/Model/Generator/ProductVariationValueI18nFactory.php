<?php
namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\Generator\AbstractModelFactory;
use Jtl\Connector\Core\Model\ProductVariationValueI18n;

class ProductVariationValueI18nFactory extends AbstractModelFactory
{
    /**
     * @param mixed[] $override
     * @return mixed[]
     */
    public function makeOneArray(array $override = []): array
    {
        return array_merge([
            'languageIso' => $this->faker->languageCode,
            'name' => $this->faker->text(80),
        ], $override);
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return ProductVariationValueI18n::class;
    }
}