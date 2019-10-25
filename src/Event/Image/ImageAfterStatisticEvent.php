<?php
namespace Jtl\Connector\Core\Event\Image;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\Statistic;


class ImageAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'image.after.statistic';

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
