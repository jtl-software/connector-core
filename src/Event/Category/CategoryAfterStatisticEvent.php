<?php
namespace Jtl\Connector\Core\Event\Category;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;


class CategoryAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'category.after.statistic';

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
