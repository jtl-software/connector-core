<?php
namespace Jtl\Connector\Core\Event\CustomerOrder;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\CustomerOrder;

class CustomerOrderAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'customerorder.after.delete';

    protected $customerOrder;

    public function __construct(CustomerOrder &$customerOrder)
    {
        $this->customerOrder = $customerOrder;
    }

    public function getCustomerOrder()
    {
        return $this->customerOrder;
    }
}
