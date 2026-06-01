<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Exception;
use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Model\ProductVariation;
use Jtl\Connector\Core\Model\ProductVariationI18n;

class ProductVariationFactory extends AbstractModelFactory
{
    /**
     * @return array{
     *     id: array<int, int|string>,
     *     sort: int,
     *     i18ns: array<int, array<int|string, mixed>>,
     *     values: array{}
     *     }
     * @throws Exception
     * @throws \RuntimeException
     */
    protected function makeFakeArray(): array
    {
        /** @var array<int, array<string|int, mixed>> $i18ns */
        $i18ns = $this->getFactory('ProductVariationI18n')->makeArray(\random_int(1, 5));

        return [
            'id'     => $this->makeIdentityArray(IdentityType::PRODUCT_VARIATION),
            'sort'   => $this->faker->numberBetween(),
            //'type' => '',
            'i18ns'  => $i18ns,
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
