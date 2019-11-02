<?php
namespace Jtl\Connector\Core\Event\Product;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;

class ProductBeforePullEvent extends Event
{
    const EVENT_NAME = 'product.before.pull';

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
