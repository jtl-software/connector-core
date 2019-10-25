<?php
namespace Jtl\Connector\Core\Event\CustomerOrder;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\CustomerOrder;


class CustomerOrderBeforeDeleteEvent extends Event
{
    const EVENT_NAME = 'customerorder.before.delete';

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
