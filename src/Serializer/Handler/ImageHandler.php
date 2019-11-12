<?php

namespace Jtl\Connector\Core\Serializer\Handler;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use Jtl\Connector\Core\Model\Image;

class ImageHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => Image::class,
                'method' => 'deserializeImage',
            ]
        ];
    }

    public function deserializeImage(JsonSerializationVisitor $visitor, array $image, array $type, Context $context)
    {
        if (!isset($image['relationType'])) {
            throw new \Exception('Relation type missing');
        }

        $className = 'Jtl\\Connector\\Core\\Model\\' . ucfirst($image['relationType']) . 'Image';
        if (!class_exists($className)) {
            $className = Image::class;
        }

        $instance = new $className();
        foreach($image as $key => $value) {
            $setter = sprintf('set%s', ucfirst($key));
            if(is_callable([$instance, $setter])) {
                $instance->{$setter}($value);
            }
        }

        return $instance;
    }
}
