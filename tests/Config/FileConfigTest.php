<?php

namespace Jtl\Connector\Core\Test\Config;

use Jtl\Connector\Core\Config\FileConfig;
use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class FileConfig
 * @package Jtl\Connector\Core\Test\Config
 */
class FileConfigTest extends TestCase
{
    /**
     * @var string
     */
    protected $configFile;

    protected function tearDown(): void
    {
        parent::tearDown();
        if (file_exists($this->configFile)) {
            unlink($this->configFile);
        }
    }

    /**
     *
     */
    public function testConfigSetParameter()
    {
        $fileConfig = $this->getFileConfig();

        $testKey = 'test';
        $testValue = rand();

        $fileConfig->set($testKey, $testValue);

        $this->assertNotNull($fileConfig->get($testKey, null));
        $this->assertSame($testValue, $fileConfig->get($testKey));
    }

    /**
     *
     */
    public function testConfigSetParameterCannotBeEmpty()
    {
        $this->expectException(ConfigException::class);
        $this->getExpectedExceptionCode(ConfigException::EMPTY_KEY);

        $fileConfig = $this->getFileConfig();

        $fileConfig->set("", "");
    }

    public function testSave()
    {
        $file = $this->createConfigFile();
        $data = json_decode(file_get_contents($file), true);
        $this->assertArrayNotHasKey('yo', $data);
        $this->assertArrayNotHasKey('foo', $data);
        $config = new FileConfig($file);
        $config->set('yo', 'lo');
        $config->set('foo', 'bar');
        $config->write();
        $data = json_decode(file_get_contents($file), true);
        $this->assertArrayHasKey('yo', $data);
        $this->assertEquals('lo', $data['yo']);
        $this->assertArrayHasKey('foo', $data);
        $this->assertEquals('bar', $data['foo']);
    }

    /**
     * @param string $payload
     * @param string $extension
     * @return FileConfig
     */
    protected function getFileConfig(string $payload = "{}", string $extension = 'json'): FileConfig
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
