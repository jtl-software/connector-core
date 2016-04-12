<?php
namespace jtl\Connector\Event\Connector;

use Symfony\Component\EventDispatcher\Event;

class ConnectorAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'connector.after.statistic';

	protected $statistics;

    public function __construct(array &$statistics)
    {
		$this->statistics = $statistics;
    }

    public function getStatistics()
    {
        return $this->statistics;
	}
	
}