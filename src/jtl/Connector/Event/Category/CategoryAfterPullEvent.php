<?php
namespace jtl\Connector\Event\Category;

use \Symfony\Component\EventDispatcher\Event;
use \jtl\Connector\Core\Model\QueryFilter;

class CategoryAfterPullEvent extends Event
{
    const EVENT_NAME = 'category.after.pull';

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
