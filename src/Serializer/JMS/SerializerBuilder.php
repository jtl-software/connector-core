<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Serializer\Handler
 */
namespace Jtl\Connector\Core\Serializer\JMS;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistry;
use Jtl\Connector\Core\Serializer\Listener\NullValuesListener;
use Jtl\Connector\Core\Serializer\Handler\IdentityHandler;
use Jtl\Connector\Core\Serializer\ObjectConstructor;

class SerializerBuilder
{
    public static function create()
    {
        return \JMS\Serializer\SerializerBuilder::create()
                ->addDefaultHandlers()
                ->setObjectConstructor(new ObjectConstructor())
                ->configureListeners(function (EventDispatcher $dispatcher){
                    $dispatcher->addSubscriber(new NullValuesListener());
                })
                ->configureHandlers(function (HandlerRegistry $registry) {
                    $registry->registerSubscribingHandler(new IdentityHandler());
                })
                ->build();
    }
}
