<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Serializer\Handler
 */
namespace Jtl\Connector\Core\Serializer;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerInterface;
use Jtl\Connector\Core\Serializer\Handler\ProductHandler;
use Jtl\Connector\Core\Serializer\Subscriber\NullValuesSubscriber;
use Jtl\Connector\Core\Serializer\Handler\IdentityHandler;
use Jtl\Connector\Core\Serializer\Subscriber\ObjectTypesSubscriber;

class SerializerBuilder
{
    /**
     * @var SerializerInterface
     */
    protected static $instance;

    /**
     * SerializerBuilder constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return SerializerInterface
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = \JMS\Serializer\SerializerBuilder::create()
                ->addDefaultHandlers()
                ->setObjectConstructor(new ObjectConstructor())
                ->configureListeners(function (EventDispatcher $dispatcher) {
                    $dispatcher->addSubscriber(new NullValuesSubscriber());
                    $dispatcher->addSubscriber(new ObjectTypesSubscriber());
                })
                ->configureHandlers(function (HandlerRegistry $registry) {
                    $registry->registerSubscribingHandler(new IdentityHandler());
                    $registry->registerSubscribingHandler(new ProductHandler());
                })
                ->build();
        }

        return self::$instance;
    }
}
