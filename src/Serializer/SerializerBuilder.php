<?php

/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package   Jtl\Connector\Core\Serializer\Handler
 */

namespace Jtl\Connector\Core\Serializer;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder as JmsBuilder;
use Jtl\Connector\Core\Serializer\Handler\FeaturesHandler;
use Jtl\Connector\Core\Serializer\Handler\IdentityHandler;
use Jtl\Connector\Core\Serializer\Handler\ProductHandler;
use Jtl\Connector\Core\Serializer\Subscriber\CrossSellingSubscriber;
use Jtl\Connector\Core\Serializer\Subscriber\ImageSubscriber;
use Jtl\Connector\Core\Serializer\Subscriber\LanguageIsoSubscriber;
use Jtl\Connector\Core\Serializer\Subscriber\NullValuesSubscriber;
use Jtl\Connector\Core\Serializer\Subscriber\ProductAttributeSubscriber;
use Jtl\Connector\Core\Serializer\Subscriber\ProductStockLevelSubscriber;

class SerializerBuilder
{
    /**
     * @param string|null $cacheDir
     *
     * @return JmsBuilder
     */
    public static function create(string $cacheDir = null): JmsBuilder
    {
        $builder = JmsBuilder::create()
                             ->addDefaultHandlers()
                             ->setObjectConstructor(new ObjectConstructor())
                             ->configureListeners(function (EventDispatcher $dispatcher) {
                                 $dispatcher->addSubscriber(new NullValuesSubscriber());
                                 $dispatcher->addSubscriber(new ImageSubscriber());
                                 $dispatcher->addSubscriber(new LanguageIsoSubscriber());
                                 $dispatcher->addSubscriber(new ProductAttributeSubscriber());
                                 $dispatcher->addSubscriber(new ProductStockLevelSubscriber());
                                 $dispatcher->addSubscriber(new CrossSellingSubscriber());
                             })
                             ->configureHandlers(function (HandlerRegistry $registry) {
                                 $registry->registerSubscribingHandler(new IdentityHandler());
                                 $registry->registerSubscribingHandler(new FeaturesHandler());
                             });

        if (!\is_null($cacheDir)) {
            $builder->setCacheDir($cacheDir);
        }

        return $builder;
    }
}
