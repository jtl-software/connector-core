<?php
namespace Jtl\Connector\Core\Event\Customer;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;


class CustomerAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'customer.after.statistic';

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
