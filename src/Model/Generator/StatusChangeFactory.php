<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\CustomerOrder;
use Jtl\Connector\Core\Model\StatusChange;

class StatusChangeFactory extends AbstractModelFactory
{
    /**
     * @return array<string, mixed>
     */
    protected function makeFakeArray(): array
    {
        /** @var IdentityFactory $identityFactory */
        $identityFactory = $this->getFactory('Identity');

        $paymentStatus = [
            0 => CustomerOrder::STATUS_CANCELLED,
            1 => CustomerOrder::STATUS_NEW,
            2 => CustomerOrder::STATUS_PARTIALLY_SHIPPED,
            3 => CustomerOrder::STATUS_SHIPPED
        ];

        $customerOrderStatus = [
            0 => CustomerOrder::PAYMENT_STATUS_COMPLETED,
            1 => CustomerOrder::PAYMENT_STATUS_PARTIALLY,
            2 => CustomerOrder::PAYMENT_STATUS_UNPAID
        ];

        return [
            'customerOrderId' => $identityFactory->makeOneArray(),
            'orderStatus'     => $paymentStatus[$this->faker->numberBetween(0, 2)],
            'paymentStatus'   => $customerOrderStatus[$this->faker->numberBetween(0, 3)]
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return StatusChange::class;
    }
}
