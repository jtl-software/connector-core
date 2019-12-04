<?php

namespace Jtl\Connector\Core\Definition;

/**
 * Class Event
 * @package Jtl\Connector\Core\Definition
 */
final class Event
{
    const BEFORE = 'before';
    const AFTER = 'after';

    /**
     * @param string $controllerName
     * @param string $actionName
     * @param string $moment
     * @return string
     */
    public static function createEventName(string $controllerName, string $actionName, string $moment): string
    {
        return strtolower(sprintf("%s.%s.%s", $controllerName, $moment, $actionName));
    }

    /**
     * @param string $controllerName
     * @param string $actionName
     * @param string $moment
     * @return string
     */
    public static function createCoreEventName(string $controllerName, string $actionName, string $moment): string
    {
        return self::createEventName('core.' . $controllerName, $moment, $actionName);
    }

    /**
     * @param string $moment
     * @return string
     */
    public static function createRpcEventName(string $moment): string
    {
        return strtolower(sprintf("rpc.%s", $moment));
    }


}