<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\CrossSellingItem;

class CrossSellingItemFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        /** @var IdentityFactory $identityFactory */
        $identityFactory = $this->getFactory('Identity');

        return [
            'id'                  => $identityFactory->makeOneArray(),
            'crossSellingGroupId' => $identityFactory->makeOneArray(),
            'productIds'          => $identityFactory->makeOneArray()
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return CrossSellingItem::class;
    }
}
