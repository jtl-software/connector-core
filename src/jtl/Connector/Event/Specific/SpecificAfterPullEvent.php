<?php
namespace jtl\Connector\Event\Specific;

use \Symfony\Component\EventDispatcher\Event;
use \jtl\Connector\Core\Model\QueryFilter;

class SpecificAfterPullEvent extends Event
{
    const EVENT_NAME = 'specific.after.pull';

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
