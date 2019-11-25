<?php
namespace Jtl\Connector\Core\Event\Connector;

use Symfony\Contracts\EventDispatcher\Event;

class ConnectorAfterFinishEvent extends Event
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
}
