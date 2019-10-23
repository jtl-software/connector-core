<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Serializer\Handler
 */
namespace jtl\Connector\Serializer\Handler;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\Context;
use jtl\Connector\Rpc\JsonString;
use jtl\Connector\Serializer\Json;

/**
 * JMS JsonString Subscribing Handler
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class JsonStringHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => JsonString::class,
                'method' => 'deserializeJsonString',
            ),
        );
    }

    public function deserializeJsonString(JsonDeserializationVisitor $visitor, $params, array $type, Context $context)
    {
        return Json::encode($params);
    }
}
