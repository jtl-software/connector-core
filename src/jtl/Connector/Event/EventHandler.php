<?php
namespace jtl\Connector\Event;

use \Symfony\Component\EventDispatcher\EventDispatcher;
use \jtl\Connector\Model\DataModel;
use \jtl\Connector\Core\Utilities\ClassName;

class EventHandler
{
    const BEFORE = 'before';
    const AFTER = 'after';

    public static function dispatch(DataModel &$entity, EventDispatcher $dispatcher, $action, $moment)
    {
        $class = ClassName::getFromNS(get_class($entity));
        $event = self::createEvent($entity, $class, $action, $moment);

        $dispatcher->dispatch($event::EVENT_NAME, $event);
    }

    protected static function createEvent(DataModel &$entity, $class, $action, $moment)
    {
        $eventClassname = sprintf('\jtl\Connector\Event\%s\%s%s%sEvent', $class, $class, ucfirst($moment), ucfirst($action));

        if (class_exists($eventClassname)) {
            return new $eventClassname($entity);
        }

        return null;
    }
}