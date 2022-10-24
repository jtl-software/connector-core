<?php

namespace Jtl\Connector\Core\Event;

use Jtl\Connector\Core\Model\Ack;
use Symfony\Contracts\EventDispatcher\Event;

class AckEvent extends Event
{
    /**
     * @var Ack
     */
    protected $ack;

    /**
     * AckEvent constructor.
     * @param Ack $ack
     */
    public function __construct(Ack $ack)
    {
        $this->ack = $ack;
    }

    /**
     * @return Ack
     */
    public function getAck(): Ack
    {
        return $this->ack;
    }
}
