<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Application;

use Jtl\Connector\Core\Application\Response;
use Jtl\Connector\Core\Model\AbstractModel;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * Class ResponseTest
 *
 * @package Jtl\Connector\Core\Test\Application
 */
class ResponseTest extends TestCase
{
    /**
     * @return array<int, array{0: Identity|array{0: int, 1: int}|int|float|string, 1?: string}>
     */
    public static function responseDataProvider(): array
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
     * @param AbstractModel|int|string|float|int[] $result
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('responseDataProvider')]
    public function testCreateFromStatic(AbstractModel|int|string|float|array $result): void
    {
        $response = Response::create($result);

        $this->assertSame($result, $response->getResult());
    }

    /**
     * @return void
     * @throws \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    public function testSetResult(): void
    {
        $result = 'FOO';

        $response = new Response(123);
        $response->setResult($result);

        $this->assertSame($result, $response->getResult());
    }
}
