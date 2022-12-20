<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Model\ProductVariationI18n;
use Jtl\Connector\Core\Utilities\Validator\Validate;

class ProductVariationI18nFactory extends AbstractModelFactory
{
    /**
     * @return array
     * @throws MustNotBeNullException
     * @throws \TypeError
     */
    protected function makeFakeArray(): array
    {
        $faker = Validate::checkGeneratorAndNotNull($this->faker);

        return [
            'name'        => $faker->text,
            'languageIso' => $faker->languageCode,
        ];
    }

    protected function getModelClass(): string
    {
        return ProductVariationI18n::class;
    }
}
