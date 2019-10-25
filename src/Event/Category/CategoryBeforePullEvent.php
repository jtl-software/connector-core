<?php
namespace Jtl\Connector\Core\Event\Category;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;


class CategoryBeforePullEvent extends Event
{
    const EVENT_NAME = 'category.before.pull';

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
