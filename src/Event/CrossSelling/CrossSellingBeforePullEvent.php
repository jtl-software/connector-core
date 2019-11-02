<?php
namespace Jtl\Connector\Core\Event\CrossSelling;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;

class CrossSellingBeforePullEvent extends Event
{
    const EVENT_NAME = 'crossselling.before.pull';

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
