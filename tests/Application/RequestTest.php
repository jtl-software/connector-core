<?php
namespace Jtl\Connector\Core\Tests\Application;

use Jtl\Connector\Core\Application\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestTest
 * @package Jtl\Connector\Core\Tests\Application
 */
class RequestTest extends TestCase
{
    /**
     *
     */
    public function testCreateFromStatic()
    {
        $controller = "FooBarController";
        $action = "pull";
        $params = [
            1,
            2
        ];

        $request = Request::create($controller, $action, $params);

        $this->assertInstanceOf(Request::class, $request);
        $this->assertSame($params, $request->getParams());
        $this->assertSame($controller, $request->getController());
        $this->assertSame($action, $request->getAction());
    }
}