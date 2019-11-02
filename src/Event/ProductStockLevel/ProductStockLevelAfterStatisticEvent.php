<?php
namespace Jtl\Connector\Core\Event\ProductStockLevel;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;

class ProductStockLevelAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'productstocklevel.after.statistic';

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
