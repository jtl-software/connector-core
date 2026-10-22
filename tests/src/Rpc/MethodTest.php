<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Rpc;

use Jawira\CaseConverter\CaseConverterException;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Rpc\Method;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * Class MethodTest
 *
 * @package Jtl\Connector\Core\Test\Rpc
 */
class MethodTest extends TestCase
{
    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testConstructorParameters(): void
    {
        $method = new Method('category.push', Controller::CATEGORY, Action::PUSH);

        $this->assertSame('Category', $method->getController());
        $this->assertSame('push', $method->getAction());
        $this->assertSame('category.push', $method->getRpcMethod());
        $this->assertFalse($method->isCore());
    }

    /**
     * @param string $rpcMethod
     * @param string $expectedController
     * @param string $expectedAction
     * @param bool   $isCore
     *
     * @return void
     * @throws CaseConverterException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('createFromRpcMethodDataProvider')]
    public function testCreateFromRpcMethod(
        string $rpcMethod,
        string $expectedController,
        string $expectedAction,
        bool   $isCore
    ): void {
        $method = Method::createFromRpcMethod($rpcMethod);
        $this->assertSame($expectedController, $method->getController());
        $this->assertSame($expectedAction, $method->getAction());
        $this->assertSame($rpcMethod, $method->getRpcMethod());
        $this->assertSame($isCore, $method->isCore());
    }

    /**
     * @return array<int, array<int, string|bool>>
     */
    public static function createFromRpcMethodDataProvider(): array
    {
        return [
            [
                'product.pull',
                'Product',
                'pull',
                false,
            ],
            [
                'core.connector.auth',
                'Connector',
                'auth',
                true,
            ],
            [
                ' category. pull',
                'Category',
                'pull',
                false,
            ],
            [
                '.',
                '',
                '',
                false,
            ],
            [
                '..',
                '',
                '',
                false,
            ],
            [
                'some',
                'Invalid',
                'invalid',
                false,
            ],
            [
                'yo.lo.mio.rio',
                'Invalid',
                'invalid',
                false,
            ],
        ];
    }
}
