<?php
namespace Jtl\Connector\Core\Test;

use Jtl\Connector\Core\Config\ArrayConfig;
use Jtl\Connector\Core\Config\FileConfig;
use Jtl\Connector\Core\Config\GlobalConfig;
use Jtl\Connector\Core\Logger\Logger;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Test\Stub\Logger\LoggerStub;
use Noodlehaus\AbstractConfig;

/**
 * Class TestCase
 * @package Jtl\Connector\Core\Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $configFile;

    /**
     *
     */
    protected function setUp(): void
    {
        $runtimeConfig = GlobalConfig::getInstance();
        $reflectionClass = new \ReflectionClass($runtimeConfig);
        $reflectionProperty = $reflectionClass->getProperty('instance');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($runtimeConfig, null);
        $reflectionProperty->setAccessible(false);

        \Mockery::namedMock(Logger::class, LoggerStub::class)
            ->shouldReceive('write')
            ->withAnyArgs();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        if (file_exists($this->configFile)) {
            unlink($this->configFile);
        }
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


    /**
     * @param string $className
     * @param string $methodName
     * @param mixed ...$methodArgs
     * @return mixed
     * @throws \ReflectionException
     */
    protected function invokeMethod(string $className, string $methodName, ...$methodArgs)
    {
        return $this->invokeMethodFromObject($this->createMock($className), $methodName, ...$methodArgs);
    }

    /**
     * @param object $object
     * @param string $methodName
     * @param mixed ...$methodArgs
     * @return mixed
     * @throws \ReflectionException
     */
    protected function invokeMethodFromObject(object $object, string $methodName, ...$methodArgs)
    {
        $reflection = new \ReflectionClass($object);
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invoke($object, ...$methodArgs);
    }

    /**
     * @param array $data
     * @return AbstractConfig|__anonymous@2834
     */
    protected function createConfig(array $data = [])
    {
        return new ArrayConfig($data);
    }

    /**
     * @param string $payload
     * @param string $extension
     * @return FileConfig
     */
    protected function createFileConfig(string $payload = "{}", string $extension = 'json'): FileConfig
    {
        return new FileConfig($this->createConfigFile($payload, $extension));
    }

    /**
     * @param string $payload
     * @param string $extension
     * @return string
     */
    protected function createConfigFile(string $payload = '{}', string $extension = 'json'): string
    {
        $this->configFile = sprintf('%s/%s.%s', sys_get_temp_dir(), uniqid('connector-config', true), $extension);
        file_put_contents($this->configFile, $payload);
        return $this->configFile;
    }
}
