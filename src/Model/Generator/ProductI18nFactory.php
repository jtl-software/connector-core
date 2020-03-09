<?php
namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\ProductI18n;

class ProductI18nFactory extends AbstractModelFactory
{

    protected function makeFakeArray(): array
    {
        return [
            'languageIso' => $this->faker->languageCode,
            'deliveryStatus' => $this->faker->word,
            'description' => $this->faker->sentence,
            'measurementUnitName' => $this->faker->randomElement(['Kilogram', 'Centimeter', '']),
            'metaDescription' => $this->faker->text,
            'metaKeywords' => $this->faker->words(mt_rand(0, 5), true),
            'name' => $this->faker->word,
            'shortDescription' => $this->faker->text,
            'titleTag' => $this->faker->word,
            'unitName' => $this->faker->randomElement(['Piece', 'Pack', '']),
            'urlPath' => $this->faker->url,
        ];
    }

    protected function getModelClass(): string
    {
        return ProductI18n::class;
    }
}