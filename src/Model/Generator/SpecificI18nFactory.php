<?php


namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\SpecificI18n;

class SpecificI18nFactory extends AbstractI18nFactory
{
    /**
     * @return array<string, string>
     */
    protected function makeFakeArray(): array
    {
        return [
            'name' => $this->faker->word,
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return SpecificI18n::class;
    }
}
