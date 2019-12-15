<?php
namespace Jtl\Connector\Test\Core\Config;

use Jtl\Connector\Core\Config\FileConfig;
use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Test\Core\TestCase;

/**
 * Class FileConfig
 * @package Jtl\Connector\Test\Core\Config
 */
class FileConfigTest extends TestCase
{
    /**
     *
     */
    public function testConfigFileDoesntExists()
    {
        $filePath = "foo_bar";

        $this->expectException(\InvalidArgumentException::class);

        $fileConfig = new FileConfig($filePath);
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

        $this->assertNotSame('', $fileConfig->get($testKey));
        $this->assertSame($testValue, $fileConfig->get($testKey));
    }

    /**
     *
     */
    public function testConfigSetParameterCannotBeEmpty()
    {
        $this->expectException(ConfigException::class);

        $fileConfig = $this->getFileConfig();

        $fileConfig->set("","");
    }

    /**
     * @param string $payload
     * @return FileConfig
     */
    protected function getFileConfig(string $payload = "{}"): FileConfig
    {
        $tmp = tempnam(sys_get_temp_dir(), "connector_core");

        $tmpJson = $tmp . '.json';

        copy($tmp, $tmpJson);

        unlink($tmp);

        file_put_contents($tmpJson, $payload);

        return new FileConfig($tmpJson);
    }

}