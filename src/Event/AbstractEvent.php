<?php
namespace Jtl\Connector\Core\Event;

use Symfony\Contracts\EventDispatcher\Event;

abstract class AbstractEvent extends Event
{
    abstract public static function getEventName(): string;
}
