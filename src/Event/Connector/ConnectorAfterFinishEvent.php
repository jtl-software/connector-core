<?php
namespace Jtl\Connector\Core\Event\Connector;

use Jtl\Connector\Core\Model\BoolResult;
use Symfony\Contracts\EventDispatcher\Event;


class ConnectorAfterFinishEvent extends Event
{
    const EVENT_NAME = 'connector.after.finish';
    
    /**
     * @var BoolResult
     */
    protected $boolResult;
    
    public function __construct(BoolResult &$boolResult)
    {
        $this->boolResult = $boolResult;
    }
    
    public function getBoolResult()
    {
        return $this->boolResult;
    }
    
}
