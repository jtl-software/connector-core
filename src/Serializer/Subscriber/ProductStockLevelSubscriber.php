<?php

namespace Jtl\Connector\Core\Serializer\Subscriber;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\Metadata\StaticPropertyMetadata;
use Jtl\Connector\Core\Model\Product;

class ProductStockLevelSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            [
                'event' => 'serializer.post_serialize',
                'method' => 'onPostSerialize',
                'format' => 'json'
            ],
            [
                'event' => 'serializer.pre_deserialize',
                'method' => 'onPreDeserialize',
                'format' => 'json'
            ]
        ];
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        $model = $event->getObject();
        if ($model instanceof Product) {
            $stockLevel = ['stockLevel' => $model->getStockLevel()];
            $event->getVisitor()->visitProperty(new StaticPropertyMetadata('', 'stockLevel', $stockLevel), $stockLevel);
        }
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();
        $type = $event->getType()['name'] ?? '';
        if ($type === Product::class && isset($data['stockLevel']['stockLevel'])) {
            $data['stockLevel'] = $data['stockLevel']['stockLevel'];
        }
        $event->setData($data);
    }
}
