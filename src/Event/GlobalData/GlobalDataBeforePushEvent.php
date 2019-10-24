<?php
namespace Jtl\Connector\Core\Event\GlobalData;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\GlobalData;


class GlobalDataBeforePushEvent extends Event
{
    const EVENT_NAME = 'globaldata.before.push';

	protected $globalData;

    public function __construct(GlobalData &$globalData)
    {
		$this->globalData = $globalData;
    }

    public function getGlobalData()
    {
        return $this->globalData;
	}
	
}
