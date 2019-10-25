<?php
namespace Jtl\Connector\Core\Event\Customer;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Customer;


class CustomerAfterPushEvent extends Event
{
    const EVENT_NAME = 'customer.after.push';

	protected $customer;

    public function __construct(Customer &$customer)
    {
		$this->customer = $customer;
    }

    public function getCustomer()
    {
        return $this->customer;
	}
	
}
