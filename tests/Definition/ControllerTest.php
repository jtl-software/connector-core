<?php
namespace Jtl\Connector\Core\Test\Definition;

use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Test\TestCase;

class ControllerTest extends TestCase
{
    /**
     * @dataProvider isTypeDataProvider
     *
     * @param $controllerName
     * @param bool $shouldBeController
     * @throws \ReflectionException
     */
    public function testIsType($controllerName, bool $shouldBeController)
    {
        $isType = Controller::isController($controllerName);
        $this->assertSame($shouldBeController, $isType);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function isTypeDataProvider(): array
    {
        $testCases = $this->getCorrectConstantsTestCases(Controller::class);
        $testCases[] = [false, false];
        $testCases[] = ['', false];
        $testCases[] = ['statuschange', false];

        return $testCases;
    }
}
