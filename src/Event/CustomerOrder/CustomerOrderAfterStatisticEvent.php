<?php
namespace Jtl\Connector\Core\Event\CustomerOrder;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;


class CustomerOrderAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'customerorder.after.statistic';

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
