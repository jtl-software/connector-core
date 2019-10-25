<?php
namespace Jtl\Connector\Core\Event\GlobalData;

use Symfony\Component\EventDispatcher\Event;
use Jtl\Connector\Core\Model\GlobalData;


class GlobalDataAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'globaldata.after.delete';

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
