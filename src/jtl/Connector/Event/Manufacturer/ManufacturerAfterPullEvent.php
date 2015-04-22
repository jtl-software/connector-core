<?php
namespace jtl\Connector\Event\Manufacturer;

use \Symfony\Component\EventDispatcher\Event;
use \jtl\Connector\Core\Model\QueryFilter;

class ManufacturerAfterPullEvent extends Event
{
    const EVENT_NAME = 'manufacturer.after.pull';

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
