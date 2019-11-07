<?php
namespace Jtl\Connector\Core\Event;

use Symfony\Contracts\EventDispatcher\Event;

abstract class AbstractEvent extends Event
{
    public abstract static function getEventName(): string;
}