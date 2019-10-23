<?php
namespace jtl\Connector\Event\ProductStockLevel;

use Symfony\Component\EventDispatcher\Event;
use jtl\Connector\Model\QueryFilter;


class ProductStockLevelBeforeStatisticEvent extends Event
{
    const EVENT_NAME = 'productstocklevel.before.statistic';

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