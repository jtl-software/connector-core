<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\CategoryI18n;

/**
 * Class CategoryI18nFactory
 * @package Jtl\Connector\Core\Model\Generator
 */
class CategoryI18nFactory extends AbstractModelFactory
{
    /**
     * @return array
     * @throws \Exception
     */
    protected function makeFakeArray() : array
    {
        return [
            'description'     => $this->faker->sentence,
            'metaDescription' => $this->faker->text,
            'metaKeywords'    => $this->faker->words(\random_int(0, 5), true),
            'name'            => $this->faker->word,
            'titleTag'        => $this->faker->word,
            'urlPath'         => $this->faker->url,
            'languageIso'     => $this->faker->languageCode
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass() : string
    {
        return CategoryI18n::class;
    }
}
