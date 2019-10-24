<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Serializer\Handler
 */
namespace Jtl\Connector\Core\Serializer\JMS;

class SerializerBuilder
{
    public static function create()
    {
        return \JMS\Serializer\SerializerBuilder::create()
                ->addDefaultHandlers()
                ->configureHandlers(function (\JMS\Serializer\Handler\HandlerRegistry $registry) {
                    $registry->registerSubscribingHandler(new \Jtl\Connector\Core\Serializer\Handler\IdentityHandler());
                })
                ->build();
    }
}
