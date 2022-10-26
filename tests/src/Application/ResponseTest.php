<?php

namespace Jtl\Connector\Core\Test\Application;

use Jtl\Connector\Core\Application\Response;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class ResponseTest
 * @package Jtl\Connector\Core\Test\Application
 */
class ResponseTest extends TestCase
{
    /**
     *
     */
    public function responseDataProvider()
    {
        return [
            [new Identity('1')],
            [[1, 2,], 'ABC'],
            [1],
            ['FOO'],
            [1.2]
        ];
    }

    /**
     * @dataProvider responseDataProvider
     *
     * @param $result
     */
    public function testCreateFromStatic($result)
    {
        $response = Response::create($result);

        $this->assertSame($result, $response->getResult());
    }

    /**
     *
     */
    public function testSetResult()
    {
        $result = 'FOO';

        $response = new Response(123);
        $response->setResult($result);

        $this->assertSame($result, $response->getResult());
    }
}
