<?php

namespace Jtl\Connector\Core\Serializer\Handler;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use Jtl\Connector\Core\Model\Features;

class FeaturesHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format'    => 'json',
                'type'      => Features::class,
                'method'    => 'serializeFeaturesToJson',
            ],
        ];
    }

    /**
     * @param JsonSerializationVisitor $visitor
     * @param Features $features
     * @param array $type
     * @param Context $context
     * @return array
     */
    public function serializeFeaturesToJson(
        JsonSerializationVisitor $visitor,
        Features $features,
        array $type,
        Context $context
    ) {
        return $features->toArray();
    }
}
