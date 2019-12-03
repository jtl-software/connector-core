<?php

namespace Jtl\Connector\Test\Http;

use Jtl\Connector\Core\Http\Request;
use Jtl\Connector\Test\TestCase;

/**
 * Class RequestTest
 * @package Jtl\Connector\Core\Http
 */
class RequestTest extends TestCase
{
    /**
     * @throws \Jtl\Connector\Core\Exception\CompressionException
     * @throws \Jtl\Connector\Core\Exception\HttpException
     */
    public function testJtlRpcIsPresentOnHandleResult()
    {
        $expected = [
            'jtlrpc' => '2.0'
        ];
        $_POST['jtlrpc'] = $expected;

        $result = Request::handle();

        $this->assertSame($expected, $result);
    }

    /**
     * @throws \Jtl\Connector\Core\Exception\CompressionException
     * @throws \Jtl\Connector\Core\Exception\HttpException
     */
    public function testJtlRpcIsMissingOnHandleRequest()
    {
        $result = Request::handle();
        $this->assertNull($result);
    }

    /**
     *
     */
    public function testJtlAuthIsPresentOnGetSession()
    {
        $expected = [
            'token' => 'foo_bar'
        ];
        $_REQUEST['jtlauth'] = $expected;

        $result = Request::getSession();
        $this->assertEquals($expected, $result);
    }

    /**
     *
     */
    public function testJtlAuthIsMissingOnGetSession()
    {
        $result = Request::getSession();
        $this->assertNull($result);
    }

    /**
     *
     */
    public function tearDown(): void
    {
        parent::tearDown();
        $_POST = [];
        $_REQUEST = [];
    }
}
