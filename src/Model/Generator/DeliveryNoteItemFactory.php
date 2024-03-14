<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\DeliveryNoteItem;

class DeliveryNoteItemFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        /** @var IdentityFactory $identityFactory */
        $identityFactory = $this->getFactory('Identity');

        /** @var DeliveryNoteItemInfoFactory $deliveryNoteItemInfoFactory */
        $deliveryNoteItemInfoFactory = $this->getFactory('DeliveryNoteItemInfo');

        return [
            'id'                    => $identityFactory->makeOneArray(),
            'customerOrderItemId'   => $identityFactory->makeOneArray(),
            'productId'             => $identityFactory->makeOneArray(),
            'quantity'              => $this->faker->numberBetween(1, 20),
            'info'                  => $deliveryNoteItemInfoFactory->makeOneArray()
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return DeliveryNoteItem::class;
    }
}
