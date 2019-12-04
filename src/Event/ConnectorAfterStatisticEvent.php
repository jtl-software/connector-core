<?php
namespace Jtl\Connector\Core\Event\Connector;

use Jtl\Connector\Core\Model\Statistic;
use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;

class ConnectorAfterStatisticEvent extends Event
{
    protected $statistic;

    public function __construct(Statistic &$statistic)
    {
        $this->statistic = $statistic;
    }

    public function getStatistic()
    {
        return $this->statistic;
    }
}
