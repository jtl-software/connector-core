<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\ProductVariationI18n;

class ProductVariationI18nFactory extends AbstractModelFactory
{
    protected function makeFakeArray(): array
    {
        return [
            'name'        => $this->faker->text,
            'languageIso' => $this->faker->languageCode
        ];
    }

    protected function getModelClass(): string
    {
        return ProductVariationI18n::class;
    }
}
