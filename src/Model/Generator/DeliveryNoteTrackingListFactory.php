<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\DeliveryNoteTrackingList;

class DeliveryNoteTrackingListFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        return [
            'name'         => $this->faker->name,
            'codes'        => $this->faker->words(\random_int(2, 4)),
            'trackingURLs' => [$this->faker->url]
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return DeliveryNoteTrackingList::class;
    }
}
