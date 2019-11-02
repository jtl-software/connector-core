<?php
namespace Jtl\Connector\Core\Event\GlobalData;

use Symfony\Contracts\EventDispatcher\Event;
use Jtl\Connector\Core\Model\GlobalData;


class GlobalDataBeforeDeleteEvent extends Event
{
    const EVENT_NAME = 'globaldata.before.delete';

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
