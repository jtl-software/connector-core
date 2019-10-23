<?php
namespace jtl\Connector\Event\ProductPrice;

use Symfony\Component\EventDispatcher\Event;
use jtl\Connector\Model\QueryFilter;


class ProductPriceBeforePullEvent extends Event
{
    const EVENT_NAME = 'productprice.before.pull';

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