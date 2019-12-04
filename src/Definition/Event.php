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

    const REQUEST_BEFORE_HANDLE = 'request.before.handle';
    const RESPONSE_AFTER_HANDLE = 'response.after.handle';

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