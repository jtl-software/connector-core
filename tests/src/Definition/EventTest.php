<?php

namespace Jtl\Connector\Core\Test\Definition;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class EventTest
 * @package Jtl\Connector\Core\Test\Definition
 */
class EventTest extends TestCase
{
    /**
     *
     */
    public function testIsMoment()
    {
        $this->assertTrue(Event::isMoment('before'));
        $this->assertTrue(Event::isMoment('after'));
        $this->assertFalse(Event::isMoment('After'));
        $this->assertFalse(Event::isMoment(' after'));
        $this->assertFalse(Event::isMoment(false));
    }

    /**
     * @throws DefinitionException
     */
    public function testCreateRpcEventNameInvalidMoment()
    {
        $moment = 'justAfter';

        $this->expectExceptionObject(DefinitionException::unknownMoment($moment));

        Event::createRpcEventName($moment);
    }

    /**
     * @throws DefinitionException
     */
    public function testCreateRpcEventNameWithCorrectMoment()
    {
        $eventName = Event::createRpcEventName(Event::AFTER);
        $this->assertSame('rpc.after', $eventName);
    }

    /**
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function testCreateHandleEventName()
    {
        $eventName = Event::createHandleEventName(Controller::PRODUCT, Action::PUSH, Event::AFTER);

        $this->assertSame('product.after.push.handle', $eventName);
    }

    /**
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function testCreateCoreEventName()
    {
        $eventName = Event::createCoreEventName(Controller::PRODUCT, Action::PUSH, Event::AFTER);

        $this->assertSame('core.product.after.push', $eventName);
    }

    /**
     * @dataProvider createEventNameInvalidParamsDataProvider
     *
     * @param $controller
     * @param $action
     * @param $moment
     * @param $expectedException
     *
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function testCreateEventNameInvalidParams($controller, $action, $moment, $expectedException)
    {
        $this->expectExceptionObject($expectedException);

        Event::createEventName($controller, $action, $moment);
    }

    /**
     * @return array
     */
    public function createEventNameInvalidParamsDataProvider(): array
    {
        return [
            ['foo', '', '', DefinitionException::unknownController('foo')],
            [Controller::PRODUCT, 'foo', '', DefinitionException::unknownAction('foo')],
            [Controller::PRODUCT, Action::PUSH, 'foo', DefinitionException::unknownMoment('foo')]
        ];
    }

    /**
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function createEventNameCorrectParams()
    {
        $eventName = Event::createEventName(Controller::PRODUCT, Action::PUSH, Event::BEFORE);

        $this->assertSame('product.before.push', $eventName);
    }
}
