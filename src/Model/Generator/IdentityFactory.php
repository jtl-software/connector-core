<?php
namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\Identity;

class IdentityFactory extends AbstractModelFactory
{
    /**
     * @param mixed[] $override
     * @return mixed[]
     */
    public function makeOneArray(array $override = []): array
    {
        if(!isset($override[0])) {
            $override[0] = $this->faker->uuid;
        }

        if(!isset($override[1])) {
            $override[1] = $this->faker->numberBetween(1);
        }

        return $override;
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Identity::class;
    }
}