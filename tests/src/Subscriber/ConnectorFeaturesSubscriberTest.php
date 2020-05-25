<?php

namespace Jtl\Connector\Core\Test\Subscriber;

use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\FeaturesEvent;
use Jtl\Connector\Core\Model\Features;
use Jtl\Connector\Core\Subscriber\CoreFeaturesSubscriber;
use PHPUnit\Framework\TestCase;

class ConnectorFeaturesSubscriberTest extends TestCase
{
    public function testLockNeedsFinishCall()
    {
        $subscriber = new CoreFeaturesSubscriber();
        $features = Features::create();
        $this->assertFalse($features->hasFlag('needs_finish_call'));
        $subscriber->forceSetFinishCallFlag(new FeaturesEvent($features));
        $this->assertTrue($features->hasFlag('needs_finish_call'));
        $this->assertTrue($features->getFlag('needs_finish_call')->isActive());
    }

    public function testGetSubscribedEvents()
    {
        $expectedEventName = Event::createCoreEventName('Connector', 'features', 'after');
        $subscribedEvents = CoreFeaturesSubscriber::getSubscribedEvents();
        $this->assertArrayHasKey($expectedEventName, $subscribedEvents);
        $listeners = $subscribedEvents[$expectedEventName];
        $this->assertIsArray($listeners);
        $this->assertCount(1, $listeners);
        $this->assertArrayHasKey(0, $listeners);
        $event = $listeners[0];
        $this->assertCount(2, $event);
        $this->assertArrayHasKey(0, $event);
        $this->assertEquals('forceSetFinishCallFlag', $event[0]);
        $this->assertArrayHasKey(1, $event);
        $this->assertEquals(-10000, $event[1]);
    }
}
