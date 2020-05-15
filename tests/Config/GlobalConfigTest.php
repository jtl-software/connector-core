<?php
namespace Jtl\Connector\Core\Test\Config;

use Jtl\Connector\Core\Config\GlobalConfig;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class RuntimeConfigTest
 * @package Jtl\Connector\Core\Test\Config
 */
class GlobalConfigTest extends TestCase
{
    /**
     *
     */
    public function testInstanceIsSingleton()
    {
        $config = GlobalConfig::getInstance();

        $this->assertInstanceOf(GlobalConfig::class, $config);

        $this->assertSame(GlobalConfig::getInstance(), $config);
    }

    /**
     *
     */
    public function testGetDefaultValue()
    {
        $config = GlobalConfig::getInstance();

        $result = $config->get("key", []);

        $this->assertEquals([], $result);
    }

    /**
     *
     */
    public function testSetAndGetOption()
    {
        $randomValue = rand();
        $key = "config_key";

        $config = GlobalConfig::getInstance();
        $config->set($key, $randomValue);

        $this->assertEquals($randomValue, $config->get($key));
    }

    /**
     *
     */
    public function testGetAllOptions()
    {
        $config = GlobalConfig::getInstance();
        $config->set("option_1", rand());
        $config->set("option_2", rand());
        $config->set("option_3", rand());

        $this->assertCount(3, $config->all());
    }
}
