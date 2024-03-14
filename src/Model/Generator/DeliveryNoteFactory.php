<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\DeliveryNote;

class DeliveryNoteFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        /** @var IdentityFactory $identityFactory */
        $identityFactory = $this->getFactory('Identity');

        /** @var DeliveryNoteItemFactory $deliveryNoteItemsFactory */
        $deliveryNoteItemsFactory = $this->getFactory('DeliveryNoteItem');

        /** @var DeliveryNoteTrackingListFactory $deliveryNoteTrackingListFactory */
        $deliveryNoteTrackingListFactory = $this->getFactory('DeliveryNoteTrackingList');

        return [
            'id'              => $identityFactory->makeOneArray(),
            'customerOrderId' => $identityFactory->makeOneArray(),
            'isFulfillment'   => $this->faker->boolean,
            'note'            => $this->faker->sentence,
            'items'           => $deliveryNoteItemsFactory->makeOneArray(),
            'trackingLists'   => $deliveryNoteTrackingListFactory->makeOneArray()
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return DeliveryNote::class;
    }
}
