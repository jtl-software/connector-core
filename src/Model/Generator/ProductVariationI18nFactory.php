<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\ProductVariationI18n;

class ProductVariationI18nFactory extends AbstractModelFactory
{
    public function makeOneArray(array $override = []): array
    {
        return array_merge([
            'name' => $this->faker->text,
            'languageIso' => $this->faker->languageCode
        ], $override);
    }

    protected function getModelClass(): string
    {
        return ProductVariationI18n::class;
    }
}