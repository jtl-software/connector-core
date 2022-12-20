<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Model\Specific;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use RuntimeException;
use TypeError;

class SpecificFactory extends AbstractModelFactory
{
    /**
     * @return array{sort: 1, isGlobal: bool, type: mixed, i18ns: array<mixed[]>, values: array<mixed[]>}
     * @throws RuntimeException
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    protected function makeFakeArray(): array
    {
        $faker = Validate::checkGeneratorAndNotNull($this->faker);
        return [
            'sort'     => 1,
            'isGlobal' => $faker->boolean,
            'type'     => $faker->randomElement(
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
