<?php
namespace Jtl\Connector\Core\Event\Customer;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Customer;

class CustomerAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'customer.after.delete';

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
