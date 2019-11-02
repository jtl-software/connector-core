<?php
namespace Jtl\Connector\Core\Event\GlobalData;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;


class GlobalDataBeforeStatisticEvent extends Event
{
    const EVENT_NAME = 'globaldata.before.statistic';

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
