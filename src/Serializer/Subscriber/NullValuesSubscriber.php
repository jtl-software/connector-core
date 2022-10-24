<?php
/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace Jtl\Connector\Core\Serializer\Subscriber;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

/**
 * Class PreDeserializeEvent
 * @package Jtl\Connector\Core\Serializer\Event
 */
class NullValuesSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            [
                'event'  => 'serializer.pre_deserialize',
                'method' => 'onPreDeserialize',
                'format' => 'json',
            ],
        ];
    }

    /**
     * Remove null values
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        if (\is_array($eventData = $event->getData())) {
            $event->setData(\array_filter($eventData, function ($value) {
                return $value !== null;
            }));
        }
    }
}
