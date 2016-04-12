<?php
namespace jtl\Connector\Event\CustomerOrder;

use Symfony\Component\EventDispatcher\Event;
use jtl\Connector\Model\CustomerOrder;


class CustomerOrderAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'customerorder.after.statistic';

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