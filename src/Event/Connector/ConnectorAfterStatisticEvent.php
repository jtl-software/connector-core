<?php
namespace Jtl\Connector\Core\Event\Connector;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;

class ConnectorAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'connector.after.statistic';

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
