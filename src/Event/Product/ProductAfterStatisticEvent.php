<?php
namespace Jtl\Connector\Core\Event\Product;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;

class ProductAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'product.after.statistic';

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
