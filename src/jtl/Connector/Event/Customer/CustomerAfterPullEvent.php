<?php
namespace jtl\Connector\Event\Customer;

use \Symfony\Component\EventDispatcher\Event;
use \jtl\Connector\Core\Model\QueryFilter;

class CustomerAfterPullEvent extends Event
{
    const EVENT_NAME = 'customer.after.pull';

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
