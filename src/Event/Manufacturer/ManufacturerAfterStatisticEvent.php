<?php
namespace Jtl\Connector\Core\Event\Manufacturer;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;


class ManufacturerAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'manufacturer.after.statistic';

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
