<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\Category;

/**
 * Class CategoryFactory
 * @package Jtl\Connector\Core\Model\Generator
 */
class CategoryFactory extends AbstractModelFactory
{
    /**
     * @return array
     */
    protected function makeFakeArray() : array
    {
        $identityFactory = $this->getFactory('Identity');
        
        return [
            'level' => $this->faker->numberBetween(0, 10),
            'parentCategoryId' => $identityFactory->makeOneArray(),
            'sort' => $this->faker->numberBetween(0, 10),
            'id' => $identityFactory->makeOneArray(),
            'isActive' => $this->faker->boolean,
            'attributes' => [],
            'customerGroups' => [],
            'invisibilities' => [],
            'i18ns' => $this->getFactory('CategoryI18n')->makeArray(mt_rand(1, 3))
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass() : string
    {
        return Category::class;
    }
}
