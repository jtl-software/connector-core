<?php
namespace Jtl\Connector\Core\Event\StatusChange;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;


class StatusChangeBeforePullEvent extends Event
{
    const EVENT_NAME = 'statuschange.before.pull';

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
