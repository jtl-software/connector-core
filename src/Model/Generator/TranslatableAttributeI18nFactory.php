<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use TypeError;

/**
 * Class TranslatableAttributeI18nFactory
 *
 * @package Jtl\Connector\Core\Model\Generator
 */
class TranslatableAttributeI18nFactory extends AbstractModelFactory
{
    /**
     * @return array{name: string, value: mixed, languageIso: string}
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    protected function makeFakeArray(): array
    {
        $faker = Validate::checkGeneratorAndNotNull($this->faker);

        return [
            'name'        => $faker->word,
            'value'       => $faker
                ->randomElement([
                                    true,
                                    false,
                                    $faker->words(3, true),
                                ]),
            'languageIso' => $faker->languageCode,
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
