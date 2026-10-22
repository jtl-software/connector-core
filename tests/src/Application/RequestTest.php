<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Application;

use Jtl\Connector\Core\Application\Request;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestTest
 *
 * @package Jtl\Connector\Core\Test\Application
 */
class RequestTest extends TestCase
{
    /**
     * @return void
     * @throws Exception
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testCreateFromStatic(): void
    {
        $controller = 'FooBarController';
        $action     = 'pull';
        $params     = [
            1,
            2,
        ];

        $request = Request::create($controller, $action, $params);

        $this->assertInstanceOf(Request::class, $request);
        $this->assertSame($params, $request->getParams());
        $this->assertSame($controller, $request->getController());
        $this->assertSame($action, $request->getAction());
    }
}
