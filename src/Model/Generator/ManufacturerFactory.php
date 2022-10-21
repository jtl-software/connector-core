<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\Manufacturer;

/**
 * Class ManufacturerFactory
 * @package Jtl\Connector\Core\Model\Generator
 */
class ManufacturerFactory extends AbstractModelFactory
{
    protected int $sort = 1;

    /**
     * @param array $override
     * @return array
     * @throws \Jawira\CaseConverter\CaseConverterException
     */
    public function makeFakeArray(array $override = []): array
    {
        return \array_merge([
            'id'    => $this->getFactory('Identity')->makeOneArray(),
            'name'  => $this->faker->text(40),
            'sort'  => $this->sort++,
            'i18ns' => $this->getFactory('ManufacturerI18n')->makeArray(3)
        ], $override);
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Manufacturer::class;
    }
}
