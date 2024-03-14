<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\CrossSelling;

class CrossSellingFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        /** @var IdentityFactory $identityFactory */
        $identityFactory = $this->getFactory('Identity');

        /** @var CrossSellingItemFactory $crossSellingItemFactory */
        $crossSellingItemFactory = $this->getFactory('CrossSellingItem');

        return [
            'id'        => $identityFactory->makeOneArray(),
            'productId' => $identityFactory->makeOneArray(),
            'items'     => $crossSellingItemFactory->makeArray(\random_int(1, 3))
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return CrossSelling::class;
    }
}
