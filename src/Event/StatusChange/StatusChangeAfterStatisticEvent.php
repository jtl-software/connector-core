<?php
namespace Jtl\Connector\Core\Event\StatusChange;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;

class StatusChangeAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'statuschange.after.statistic';

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
