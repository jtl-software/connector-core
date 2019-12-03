<?php
namespace Jtl\Connector\Core\Event\Connector;

use Jtl\Connector\Core\Model\Statistic;
use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;

class ConnectorAfterStatisticEvent extends Event implements EventInterface
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
