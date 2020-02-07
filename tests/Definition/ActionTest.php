<?php
namespace Jtl\Connector\Test\Core\Definition;

use Jtl\Connector\Core\Definition\Action;
use PHPUnit\Framework\TestCase;

/**
 * Class ActionTest
 * @package Jtl\Connector\Test\Core\Definition
 */
class ActionTest extends TestCase
{
    /**
     *
     */
    public function testGetActions()
    {
        $actions = Action::getActions();

        $this->assertSame([
            Action::PULL,
            Action::PUSH,
            Action::DELETE,
            Action::STATISTIC,
            Action::AUTH,
            Action::ACK,
            Action::CLEAR,
            Action::FEATURES,
            Action::FINISH,
            Action::IDENTIFY,
            Action::INIT
        ], array_values($actions));
    }

    /**
     * @dataProvider actionDataProvider
     *
     * @param mixed $actionName
     * @param bool $expectedResult
     * @throws \ReflectionException
     */
    public function testIsAction($actionName, bool $expectedResult)
    {
        $this->assertSame($expectedResult, Action::isAction($actionName));
    }

    /**
     * @return array
     */
    public function actionDataProvider(): array
    {
        return [
            [Action::PULL, true],
            [Action::CLEAR, true],
            ['push ', false],
            [' push ', false],
            ['PusH', false],
            ['Clear', false],
            [Action::CLEAR, true],
            [false, false],
        ];
    }

    /**
     * @dataProvider coreActionDataProvider
     *
     * @param mixed $actionName
     * @param bool $expectedResult
     */
    public function testIsCoreAction($actionName, bool $expectedResult)
    {
        $this->assertSame($expectedResult, Action::isCoreAction($actionName));
    }

    /**
     * @return array
     */
    public function coreActionDataProvider()
    {
        return [
            [Action::AUTH, true],
            [Action::ACK, true],
            [Action::PULL, false],
            [false, false],
            ['autH', false],
            [rand(-9999,9999), false],
        ];
    }

}