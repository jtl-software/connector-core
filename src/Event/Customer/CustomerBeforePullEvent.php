<?php
namespace Jtl\Connector\Core\Event\Customer;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;

class CustomerBeforePullEvent extends Event
{
    const EVENT_NAME = 'customer.before.pull';

    protected $filter;

    public function __construct(QueryFilter &$filter)
    {
        $this->filter = $filter;
    }

    public function getFilter()
    {
        return $this->filter;
    }
}
