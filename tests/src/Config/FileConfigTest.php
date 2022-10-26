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
     *
     */
    public function testConfigSetParameter()
    {
        $fileConfig = $this->createFileConfig();

        $testKey   = 'test';
        $testValue = \rand();

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

        $fileConfig = $this->createFileConfig();

        $fileConfig->set('', '');
    }

    public function testSave()
    {
        $file = $this->createConfigFile();
        $data = \json_decode(\file_get_contents($file), true);
        $this->assertArrayNotHasKey('yo', $data);
        $this->assertArrayNotHasKey('foo', $data);
        $config = new FileConfig($file);
        $config->set('yo', 'lo');
        $config->set('foo', 'bar');
        $config->write();
        $data = \json_decode(\file_get_contents($file), true);
        $this->assertArrayHasKey('yo', $data);
        $this->assertEquals('lo', $data['yo']);
        $this->assertArrayHasKey('foo', $data);
        $this->assertEquals('bar', $data['foo']);
    }
}
