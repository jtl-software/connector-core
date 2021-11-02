<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\CrossSellingGroupI18n;

class CrossSellingGroupI18nFactory extends AbstractI18nFactory
{
    protected function makeFakeArray(): array
    {
        return [
            'description' => $this->faker->text,
            'name' => $this->faker->name,
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return CrossSellingGroupI18n::class;
    }
}