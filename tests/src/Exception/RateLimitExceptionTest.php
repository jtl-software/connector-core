<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Exception;

use Jtl\Connector\Core\Definition\ErrorCode;
use Jtl\Connector\Core\Exception\RateLimitException;
use PHPUnit\Framework\TestCase;

class RateLimitExceptionTest extends TestCase
{
    /**
     * @return void
     */
    public function testExceptionCode(): void
    {
        $exception = new RateLimitException('core.connector.auth');
        $this->assertEquals(ErrorCode::RATE_LIMIT_EXCEEDED, $exception->getCode());
    }

    /**
     * @return void
     */
    public function testExceptionMessage(): void
    {
        $exception = new RateLimitException('core.connector.auth');
        $this->assertStringContainsString('core.connector.auth', $exception->getMessage());
        $this->assertStringContainsString('Rate limit exceeded', $exception->getMessage());
    }

    /**
     * @return void
     */
    public function testRetryAfterDefaultValue(): void
    {
        $exception = new RateLimitException('core.connector.auth');
        $this->assertEquals(60, $exception->getRetryAfter());
    }

    /**
     * @return void
     */
    public function testRetryAfterCustomValue(): void
    {
        $exception = new RateLimitException('core.connector.auth', 30);
        $this->assertEquals(30, $exception->getRetryAfter());
    }

    /**
     * @return void
     */
    public function testRetryAfterInMessage(): void
    {
        $exception = new RateLimitException('test.method', 45);
        $this->assertStringContainsString('45', $exception->getMessage());
    }
}
