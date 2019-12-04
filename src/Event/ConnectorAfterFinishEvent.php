<?php
namespace Jtl\Connector\Core\Event\Connector;

use Jtl\Connector\Core\Event\EventInterface;
use Symfony\Contracts\EventDispatcher\Event;

class ConnectorAfterFinishEvent extends Event
{
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
