<?php
namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\Identity;

class IdentityFactory extends AbstractModelFactory
{
    /**
     * @return mixed[]
     */
    protected function makeFakeArray(): array
    {
        return [$this->faker->uuid, $this->faker->numberBetween(1)];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Identity::class;
    }
}
