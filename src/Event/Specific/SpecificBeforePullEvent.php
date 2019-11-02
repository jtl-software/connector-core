<?php
namespace Jtl\Connector\Core\Event\Specific;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;

class SpecificBeforePullEvent extends Event
{
    const EVENT_NAME = 'specific.before.pull';

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
