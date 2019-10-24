<?php
namespace Jtl\Connector\Core\Event\CustomerOrder;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;


class CustomerOrderBeforeStatisticEvent extends Event
{
    const EVENT_NAME = 'customerorder.before.statistic';

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
