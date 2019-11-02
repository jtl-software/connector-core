<?php
namespace Jtl\Connector\Core\Event\Image;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\QueryFilter;

class ImageBeforeStatisticEvent extends Event
{
    const EVENT_NAME = 'image.before.statistic';

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
