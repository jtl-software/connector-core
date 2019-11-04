<?php
namespace Jtl\Connector\Core\Event;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Jtl\Connector\Core\Model\DataModel;
use Jtl\Connector\Core\Model\QueryFilter;
use Jtl\Connector\Core\Utilities\ClassName;
use Symfony\Contracts\EventDispatcher\Event;

class EventHandler
{
    const BEFORE = 'before';
    const AFTER = 'after';

    /**
     * @param mixed $entity
     * @param EventDispatcher $dispatcher
     * @param string $action
     * @param string $moment
     * @param string|null $class
     * @param bool $isCore
     */
    public static function dispatch(&$entity, EventDispatcher $dispatcher, string $action, string $moment, string $class = null, bool $isCore = false)
    {
        if (!$isCore && (!($entity instanceof DataModel) && !($entity instanceof QueryFilter)) || strlen(trim($action)) == 0 || strlen(trim($moment)) == 0) {
            return;
        }

        if($isCore) {
            $class = 'Core';
        }

        $class = ($class !== null) ? $class : ClassName::getFromNS(get_class($entity));
        $event = self::createEvent($entity, $class, $action, $moment, $isCore);

        if ($event !== null) {
            $dispatcher->dispatch($event, $event::EVENT_NAME);
        }
    }

    /**
     * @param mixed $data
     * @param EventDispatcher $dispatcher
     * @param string $controller
     * @param string $action
     * @param string $moment
     */
    public static function dispatchRpc(&$data, EventDispatcher $dispatcher, string $controller, string $action, string $moment): void
    {
        if (strlen(trim($action)) == 0 || strlen(trim($moment)) == 0) {
            return;
        }

        // Rpc Event
        $event = self::createRpcEvent($data, $controller, $action, $moment);
        if ($event !== null) {
            $dispatcher->dispatch($event, $event::EVENT_NAME);
        }
    }

    /**
     * @param mixed $entity
     * @param string $class
     * @param string $action
     * @param string $moment
     * @param bool $isCore
     * @return Event|null
     */
    protected static function createEvent(&$entity, string $class, string $action, string $moment, bool $isCore): ?Event
    {
        $eventClassname = sprintf('\Jtl\Connector\Core\Event\%s\%s%s%sEvent', $class, $class, ucfirst($moment), ucfirst($action));

        if (class_exists($eventClassname)) {
            return new $eventClassname($entity);
        }

        return null;
    }

    /**
     * @param mixed $data
     * @param string $controller
     * @param string $action
     * @param string $moment
     * @return Event|null
     */
    protected static function createRpcEvent(&$data, string $controller, string $action, string $moment): ?Event
    {
        $eventClassname = sprintf('\Jtl\Connector\Core\Event\Rpc\Rpc%sEvent', ucfirst($moment));

        if (class_exists($eventClassname)) {
            return new $eventClassname($data, $controller, $action);
        }

        return null;
    }
}
