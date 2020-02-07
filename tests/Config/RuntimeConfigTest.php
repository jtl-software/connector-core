<?php
namespace Jtl\Connector\Core\Tests\Config;

use Jtl\Connector\Core\Config\RuntimeConfig;
use PHPUnit\Framework\TestCase;

/**
 * Class RuntimeConfigTest
 * @package Jtl\Connector\Core\Tests\Config
 */
class RuntimeConfigTest extends TestCase
{
    /**
     *
     */
    public function testInstanceIsSingleton()
    {
        $runtimeConfig = RuntimeConfig::getInstance();

        $this->assertInstanceOf(RuntimeConfig::class, $runtimeConfig);

        $this->assertSame(RuntimeConfig::getInstance(), $runtimeConfig);
    }

    /**
     *
     */
    public function testGetDefaultValue()
    {
        $runtimeConfig = RuntimeConfig::getInstance();

        $result = $runtimeConfig->get("key", []);

        $this->assertEquals([], $result);
    }

    /**
     *
     */
    public function testSetAndGetOption()
    {
        $randomValue = rand();
        $key = "config_key";

        $runtimeConfig = RuntimeConfig::getInstance();
        $runtimeConfig->set($key, $randomValue);

        $this->assertEquals($randomValue, $runtimeConfig->get($key));
    }

    /**
     *
     */
    public function testGetAllOptions()
    {
        $runtimeConfig = RuntimeConfig::getInstance();
        $runtimeConfig->set("option_1", rand());
        $runtimeConfig->set("option_2", rand());
        $runtimeConfig->set("option_3", rand());

        $this->assertCount(3,$runtimeConfig->all());
    }

    /**
     *
     */
    protected function tearDown(): void
    {
        $runtimeConfig = RuntimeConfig::getInstance();
        $reflection = new \ReflectionClass($runtimeConfig);
        $property = $reflection->getProperty('options');
        $property->setAccessible(true);
        $property->setValue($runtimeConfig,[]);
        $property->setAccessible(false);

        parent::tearDown();
    }

}