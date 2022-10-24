<?php


namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\Specific;

class SpecificFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        return [
            'sort'     => 1,
            'isGlobal' => $this->faker->boolean,
            'type'     => $this->faker->randomElement(
                [
                    Specific::TYPE_IMAGE,
                    Specific::TYPE_IMAGE_TEXT,
                    Specific::TYPE_SELECT,
                    Specific::TYPE_TEXT,
                ]
            ),
            'i18ns'    => [$this->getFactory('SpecificI18n')->makeOneArray()],
            'values'   => [$this->getFactory('SpecificValue')->makeOneArray()],
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Specific::class;
    }
}
