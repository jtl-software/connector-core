<?php
namespace Jtl\Connector\Core\Event\Connector;

use Jtl\Connector\Core\Event\AbstractEvent;

class ConnectorAfterFinishEvent extends AbstractEvent
{
    const EVENT_NAME = 'connector.after.finish';
    
    /**
     * @var bool
     */
    protected $result;
    
    public function __construct(bool &$result)
    {
        $this->result = &$result;
    }
    
    public function getResult()
    {
        return $this->result;
    }

    public function getEventName(): string
    {
        return self::EVENT_NAME;
    }
}
