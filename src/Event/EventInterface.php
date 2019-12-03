<?php
namespace Jtl\Connector\Core\Event;


/**
 * Interface EventInterface
 * @package Jtl\Connector\Core\Event
 */
interface EventInterface
{
    /**
     * @return string
     */
    public function getEventName(): string;
}