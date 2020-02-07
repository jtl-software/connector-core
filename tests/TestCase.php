<?php
namespace Jtl\Connector\Core\Tests;

use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Tests\Stub\Logger\LoggerStub;

/**
 * Class TestCase
 * @package Jtl\Connector\Core\Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     *
     */
    protected function setUp(): void
    {
        \Mockery::namedMock(Logger::class, LoggerStub::class)
            ->shouldReceive('write')
            ->withAnyArgs();
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

    /**
     * @return Identity
     * @throws \Exception
     */
    protected function createIdentity(): Identity
    {
        return new Identity($this->createEndpointId(), $this->createHostId());
    }

    /**
     * @param string $className
     * @return array
     * @throws \ReflectionException
     */
    protected function getCorrectConstantsTestCases(string $className): array
    {
        $reflection = new \ReflectionClass($className);
        $constants = array_values($reflection->getConstants());

        $testCases = [];
        foreach ($constants as $constant) {
            $testCases[] = [$constant, true];
        }

        return $testCases;
    }
}
