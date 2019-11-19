<?php

namespace Jtl\Connector\Core\Serializer\Handler;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use Jtl\Connector\Core\Model\Product;

/**
 * Class ProductHandler
 * @package Jtl\Connector\Core\Serializer\Handler
 */
class ProductHandler implements SubscribingHandlerInterface
{
    /**
     * @return array
     */
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => Product::class,
                'method' => 'serializeProduct',
            ]
        ];
    }

    /**
     * @param JsonSerializationVisitor $visitor
     * @param Product $product
     * @param array $type
     * @param Context $context
     * @return \stdClass
     */
    public function serializeProduct(JsonSerializationVisitor $visitor, Product $product, array $type, Context $context)
    {
        return $product->getPublic();
    }
}
