<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Model\SpecificValueI18n;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use TypeError;

class SpecificValueI18nFactory extends AbstractI18nFactory
{
    /**
     * @return array<string, string>
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    protected function makeFakeArray(): array
    {
        $faker = Validate::checkGeneratorAndNotNull($this->faker);

        return [
            'value'           => $faker->word,
            'urlPath'         => $faker->url,
            'titleTag'        => $faker->word,
            'metaKeywords'    => $faker->word,
            'metaDescription' => $faker->sentence,
            'description'     => $faker->sentence,
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return SpecificValueI18n::class;
    }
}
