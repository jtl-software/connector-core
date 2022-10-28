<?php

namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Model\Statistic;
use Symfony\Contracts\EventDispatcher\Event;

class StatisticEvent extends Event
{
    /**
     * @var Statistic
     */
    protected $statistic;

    /**
     * StatisticEvent constructor.
     *
     * @param Statistic $statistic
     */
    public function __construct(Statistic $statistic)
    {
        $this->statistic = $statistic;
    }

    /**
     * @return Statistic
     */
    public function getStatistic(): Statistic
    {
        return $this->statistic;
    }
}
