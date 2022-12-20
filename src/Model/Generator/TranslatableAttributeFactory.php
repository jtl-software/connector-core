<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\TranslatableAttribute;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use RuntimeException;

/**
 * Class TranslatableAttributeFactory
 *
 * @package Jtl\Connector\Core\Model\Generator
 */
class TranslatableAttributeFactory extends AbstractModelFactory
{
    /**
     * @return array<string, bool|array<int, mixed>>
     * @throws RuntimeException|\TypeError
     */
    protected function makeFakeArray(): array
    {
        $faker = Validate::checkGeneratorAndNotNull($this->faker);
        return [
            'isTranslated'     => $faker->boolean,
            'isCustomProperty' => $faker->boolean,
            'i18ns'            => $this->getFactory('TranslatableAttributeI18n')->makeArray(3),
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return TranslatableAttribute::class;
    }
}
