<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\SpecificValue;

class SpecificValueFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        return [
            'sort'  => 1,
            'i18ns' => [$this->getFactory('SpecificValueI18n')->makeOneArray()],
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return SpecificValue::class;
    }
}
