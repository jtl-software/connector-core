<?php

namespace Jtl\Connector\Core\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class AbstractEvent
 * @package Jtl\Connector\Core\Event
 */
abstract class AbstractEvent extends Event
{
    /**
     * @return string
     */
    abstract public function getEventName(): string;
}
