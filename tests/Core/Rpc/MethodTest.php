<?php
namespace Jtl\Connector\Test\Core\Rpc;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Test\Core\TestCase;

/**
 * Class MethodTest
 * @package Jtl\Connector\Test\Core\Rpc
 */
class MethodTest extends TestCase
{

    /**
     *
     */
    public function testConstructorParameters()
    {
        $method = new Method('category.push', Controller::CATEGORY, Action::PUSH);

        $this->assertSame('Category', $method->getController());
        $this->assertSame('push', $method->getAction());
        $this->assertSame('category.push', $method->getRpcMethod());
        $this->assertFalse($method->isCore());
    }

    /**
     * @dataProvider createFromRpcMethodDataProvider
     *
     * @param $rpcMethod
     * @param $expectedController
     * @param $expectedAction
     * @param $isCore
     * @throws \Exception
     */
    public function testCreateFromRpcMethod($rpcMethod, $expectedController, $expectedAction, $isCore)
    {
        $method = Method::createFromRpcMethod($rpcMethod);
        $this->assertSame($expectedController, $method->getController());
        $this->assertSame($expectedAction, $method->getAction());
        $this->assertSame($rpcMethod, $method->getRpcMethod());
        $this->assertSame($isCore, $method->isCore());
    }

    /**
     * @return array
     */
    public function createFromRpcMethodDataProvider(): array
    {
        return [
            ['product.pull', 'Product', 'pull', false],
            ['core.connector.auth', 'Connector', 'auth', true],
            [' category. pull', ' Category', ' pull', false],
            ['.', '', '', false],
            ['..', '', '', false]
        ];
    }

}