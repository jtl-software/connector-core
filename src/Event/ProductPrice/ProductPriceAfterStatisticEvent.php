<?php
namespace Jtl\Connector\Core\Event\ProductPrice;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;

class ProductPriceAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'productprice.after.statistic';

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
