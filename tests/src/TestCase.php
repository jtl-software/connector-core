<?php

namespace Jtl\Connector\Test;

use Jtl\Connector\Core\Logger\Logger;

/**
 * Class TestCase
 * @package Jtl\Connector\Test
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     *
     */
    protected function setUp(): void
    {
        \Mockery::mock(Logger::class, 'LoggerStub')
            ->shouldReceive('write')
            ->withAnyArgs()
            ->andReturnTrue();
    }

    /**
     * @return int
     * @throws \Exception
     */
    protected function createHostId(): int
    {
        return random_int(1, 9999);
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function createEndpointId(): string
    {
        return sprintf("%s_%s", 't', $this->createHostId());
    }


}