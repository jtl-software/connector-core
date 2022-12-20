<?php

namespace Jtl\Connector\Core\Test\Rpc;

use Jtl\Connector\Core\Exception\RpcException;
use Jtl\Connector\Core\Rpc\Error;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class ErrorTest
 * @package Jtl\Connector\Core\Test\Rpc
 */
class ErrorTest extends TestCase
{
    /**
     * @throws RpcException
     */
    public function testValidateThrowExceptionWhenCodeIsNull(): void
    {
        $this->expectExceptionObject(RpcException::parseError());

        $error = new Error();
        $error->validate();
    }

    /**
     * @throws RpcException
     */
    public function testValidateThrowExceptionWhenMessageIsNotSet(): void
    {
        $this->expectExceptionObject(RpcException::parseError());

        $error = new Error();
        $error->setCode(100);
        $error->setMessage('');
        $error->setData([]);
        $error->validate();
    }

    /**
     * @throws RpcException
     */
    public function testValidateCorrect(): void
    {
        $error = new Error();
        $error->setCode(101);
        $error->setMessage('Error messasge');
        $error->setData([]);
        $return = $error->validate();

        $this->assertNull($return);
    }
}
