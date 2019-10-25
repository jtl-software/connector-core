<?php
namespace Jtl\Connector\Core\Event\Specific;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;


class SpecificAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'specific.after.statistic';

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
