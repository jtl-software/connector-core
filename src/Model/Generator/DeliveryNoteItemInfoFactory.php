<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\DeliveryNoteItemInfo;

class DeliveryNoteItemInfoFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        return [
            'batch'       => $this->faker->word,
            'quantity'    => $this->faker->numberBetween(1, 20),
            'warehouseId' => $this->faker->numberBetween(1)
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return DeliveryNoteItemInfo::class;
    }
}
