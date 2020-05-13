<?php

namespace Jtl\Connector\Core\Test\Config;

use Jtl\Connector\Core\Config\ConfigOption;
use Jtl\Connector\Core\Config\ConfigOptions;
use Jtl\Connector\Core\Exception\ConfigException;
use PHPUnit\Framework\TestCase;

class ConfigOptionsTest extends TestCase
{

    public function testGetDefaultOptions()
    {
        $options = (new ConfigOptions())->setOptions(...ConfigOptions::createDefaultOptions());
        $reflectionClass = new \ReflectionClass($options);
        $reflectionProperty = $reflectionClass->getProperty('options');
        $reflectionProperty->setAccessible(true);
        $optionsArray = $reflectionProperty->getValue($options);
        $this->assertArrayHasKey(ConfigOptions::MAIN_LANGUAGE, $optionsArray);
        $this->assertInstanceOf(ConfigOption::class, $optionsArray[ConfigOptions::MAIN_LANGUAGE]);
        $this->assertArrayHasKey(ConfigOptions::LOG_LEVEL, $optionsArray);
        $this->assertInstanceOf(ConfigOption::class, $optionsArray[ConfigOptions::LOG_LEVEL]);
    }

    public function testGetOption()
    {
        $options = (new ConfigOptions())->setOptions(...ConfigOptions::createDefaultOptions());
        $this->assertInstanceOf(ConfigOption::class, $options->getOption(ConfigOptions::LOG_LEVEL));
    }

    public function testGetNotExistingOption()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::UNKNOWN_OPTION);
        (new ConfigOptions())->getOption('foobar');
    }

    public function testIsOption()
    {
        $options = (new ConfigOptions())->setOptions(...ConfigOptions::createDefaultOptions());
        $this->assertTrue($options->isOption(ConfigOptions::LOG_LEVEL));
        $this->assertFalse($options->isOption('yolo'));
    }

    public function testGetOptions()
    {
        $options = new ConfigOptions();
        $options->setOption(new ConfigOption('foo', ConfigOption::TYPE_INTEGER));
        $reflectionClass = new \ReflectionClass($options);
        $reflectionProperty = $reflectionClass->getProperty('options');
        $reflectionProperty->setAccessible(true);
        $optionsArray = $reflectionProperty->getValue($options);
        $this->assertEquals(array_values($optionsArray), $options->getOptions());
    }

    public function testSetOption()
    {
        $options = new ConfigOptions();
        $reflectionClass = new \ReflectionClass($options);
        $reflectionProperty = $reflectionClass->getProperty('options');
        $reflectionProperty->setAccessible(true);
        $this->assertCount(0, $reflectionProperty->getValue($options));
        $option = new ConfigOption('foo', ConfigOption::TYPE_INTEGER);
        $options->setOption($option);
        $this->assertCount(1, $reflectionProperty->getValue($options));
        $actualOption = $options->getOption('foo');
        $this->assertEquals($option, $actualOption);
    }

    public function testSetOptions()
    {
        $options = new ConfigOptions();
        $reflectionClass = new \ReflectionClass($options);
        $reflectionProperty = $reflectionClass->getProperty('options');
        $reflectionProperty->setAccessible(true);
        $this->assertCount(0, $reflectionProperty->getValue($options));
        $options->setOptions(...ConfigOptions::createDefaultOptions());
        $this->assertCount(2, $reflectionProperty->getValue($options));
    }

    public function testGetDefaultValues()
    {
        $options = (new ConfigOptions())->setOptions(...ConfigOptions::createDefaultOptions());
        $expected = [ConfigOptions::LOG_LEVEL => 'info', ConfigOptions::MAIN_LANGUAGE => 'de'];
        $this->assertEquals($expected, $options->getDefaultValues());
    }
}
