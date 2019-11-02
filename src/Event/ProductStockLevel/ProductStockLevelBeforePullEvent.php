<?php
namespace Jtl\Connector\Core\Event\ProductStockLevel;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;

class ProductStockLevelBeforePullEvent extends Event
{
    const EVENT_NAME = 'productstocklevel.before.pull';

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
