<?php
namespace Jtl\Connector\Core\Event\GlobalData;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;


class GlobalDataAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'globaldata.after.statistic';

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
