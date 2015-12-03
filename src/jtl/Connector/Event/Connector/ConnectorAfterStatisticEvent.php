<?php
namespace jtl\Connector\Event\Connector;

use Symfony\Component\EventDispatcher\Event;

class ConnectorAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'connector.statistic';

    protected $statistic;

    public function __construct(array &$statistics)
    {
        $this->statistic = $statistics;
    }

    public function getStatistics()
    {
        return $this->statistic;
    }
}