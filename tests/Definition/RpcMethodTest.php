<?php
namespace Jtl\Connector\Core\Tests\Definition;

use Jtl\Connector\Core\Definition\RpcMethod;
use Jtl\Connector\Core\Tests\TestCase;

/**
 * Class RpcMethodTest
 * @package Jtl\Connector\Core\Tests\Definition
 */
class RpcMethodTest extends TestCase
{
    /**
     * @dataProvider isMethodDataProvider
     *
     * @param $methodName
     * @param bool $shouldBeMethod
     */
    public function testIsMethod($methodName, bool $shouldBeMethod)
    {
        $isMethodResult = RpcMethod::isMethod($methodName);
        $this->assertSame($shouldBeMethod, $isMethodResult);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function isMethodDataProvider(): array
    {
        $definedMethods = $this->getCorrectConstantsTestCases(RpcMethod::class);

        $customTests = [];
        $customTests[] = ['""', false];
        $customTests[] = [' ', false];
        $customTests[] = [false, false];
        $customTests[] = [true, false];
        $customTests[] = ['.', false];
        $customTests[] = [' connector.pull    ', true];
        $customTests[] = ['...', false];
        $customTests[] = ['.1.1.', false];
        $customTests[] = ['method\.name', false];
        $customTests[] = ['very.long.method.name', true];

        return array_merge_recursive($definedMethods, $customTests);

    }
}