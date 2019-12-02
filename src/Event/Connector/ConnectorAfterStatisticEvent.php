<?php
namespace Jtl\Connector\Core\Event\Connector;

use Jtl\Connector\Core\Event\AbstractEvent;
use Jtl\Connector\Core\Model\Statistic;

class ConnectorAfterStatisticEvent extends AbstractEvent
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

    public function getEventName(): string
    {
        return self::EVENT_NAME;
    }
}
