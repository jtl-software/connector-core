<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\Category;

class CategoryFactory extends AbstractModelFactory
{
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
            'i18ns' => [$this->getFactory('CategoryI18n')->make(mt_rand(1, 3))]
        ];
    }
    
    protected function getModelClass() : string
    {
        return Category::class;
    }
}