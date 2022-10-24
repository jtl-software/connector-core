<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\TranslatableAttributeI18n;

/**
 * Class TranslatableAttributeI18nFactory
 * @package Jtl\Connector\Core\Model\Generator
 */
class TranslatableAttributeI18nFactory extends AbstractModelFactory
{
    /**
     * @return array<string, string|bool>
     */
    protected function makeFakeArray(): array
    {
        return [
            'name' => $this->faker->word,
            'value' => $this->faker->randomElement([
                true,
                false,
                $this->faker->words(3, true)
            ]),
            'languageIso' => $this->faker->languageCode,
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return TranslatableAttributeI18n::class;
    }
}
