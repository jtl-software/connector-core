<?php
namespace jtl\Connector\Event\GlobalData;

use \Symfony\Component\EventDispatcher\Event;
use \jtl\Connector\Model\GlobalData;

class GlobalDataBeforePullEvent extends Event
{
    const EVENT_NAME = 'globalData.before.pull';

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