<?php
namespace Jtl\Connector\Test\Core;

use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Model\Identity;

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
