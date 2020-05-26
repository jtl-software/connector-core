<?php

namespace Jtl\Connector\Core\Subscriber;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\FeaturesEvent;
use Jtl\Connector\Core\Model\FeatureFlag;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CoreFeaturesSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Event::createCoreEventName(Controller::CONNECTOR, Action::FEATURES, Event::AFTER) => [
                ['forceSetFinishCallFlag', -10000]
            ]
        ];
    }

    public function forceSetFinishCallFlag(FeaturesEvent $event)
    {
        $event->getFeatures()->setFlag(new FeatureFlag('needs_finish_call', true));
    }
}
