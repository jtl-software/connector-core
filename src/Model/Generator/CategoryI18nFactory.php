<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\CategoryI18n;

class CategoryI18nFactory extends AbstractModelFactory
{
    protected function makeFakeArray() : array
    {
        return [
            'description' => $this->faker->sentence,
            'metaDescription' => $this->faker->text,
            'metaKeywords' => $this->faker->words(mt_rand(0, 5), true),
            'name' => $this->faker->word,
            'titleTag' => $this->faker->word,
            'urlPath' => $this->faker->url,
            'languageIso' => $this->faker->languageCode
        ];
    }
    
    protected function getModelClass() : string
    {
        return CategoryI18n::class;
    }
}