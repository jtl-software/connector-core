<?php


namespace Jtl\Connector\Core\Model\Generator;


use Jtl\Connector\Core\Model\SpecificValueI18n;

class SpecificValueI18nFactory extends AbstractI18nFactory
{
    protected function makeFakeArray(): array
    {
        return [
            'value' => $this->faker->word,
            'urlPath' => $this->faker->url,
            'titleTag' => $this->faker->word,
            'metaKeywords' => $this->faker->word,
            'metaDescription' => $this->faker->sentence,
            'description' => $this->faker->sentence,
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