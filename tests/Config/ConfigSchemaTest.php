<?php

namespace Jtl\Connector\Core\Test\Config;

use Jtl\Connector\Core\Config\ConfigSchemaOption;
use Jtl\Connector\Core\Config\ConfigSchema;
use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Test\TestCase;

class ConfigSchemaTest extends TestCase
{
    public function testGetOption()
    {
        $schema = (new ConfigSchema())->setOptions(...ConfigSchema::createDefaultOptions());
        $this->assertInstanceOf(ConfigSchemaOption::class, $schema->getOption(ConfigSchema::LOG_LEVEL));
    }

    public function testGetNotExistingOption()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::UNKNOWN_OPTION);
        (new ConfigSchema())->getOption('foobar');
    }

    public function testIsOption()
    {
        $schema = (new ConfigSchema())->setOptions(...ConfigSchema::createDefaultOptions());
        $this->assertTrue($schema->isOption(ConfigSchema::LOG_LEVEL));
        $this->assertFalse($schema->isOption('yolo'));
    }

    public function testGetOptions()
    {
        $schema = new ConfigSchema();
        $schema->setOption(new ConfigSchemaOption('foo', ConfigSchemaOption::TYPE_INTEGER));
        $reflectionClass = new \ReflectionClass($schema);
        $reflectionProperty = $reflectionClass->getProperty('options');
        $reflectionProperty->setAccessible(true);
        $schemaArray = $reflectionProperty->getValue($schema);
        $this->assertEquals(array_values($schemaArray), $schema->getOptions());
    }

    public function testSetOption()
    {
        $schema = new ConfigSchema();
        $reflectionClass = new \ReflectionClass($schema);
        $reflectionProperty = $reflectionClass->getProperty('options');
        $reflectionProperty->setAccessible(true);
        $this->assertCount(0, $reflectionProperty->getValue($schema));
        $option = new ConfigSchemaOption('foo', ConfigSchemaOption::TYPE_INTEGER);
        $schema->setOption($option);
        $this->assertCount(1, $reflectionProperty->getValue($schema));
        $actualOption = $schema->getOption('foo');
        $this->assertEquals($option, $actualOption);
    }

    public function testSetOptions()
    {
        $schema = new ConfigSchema();
        $reflectionClass = new \ReflectionClass($schema);
        $reflectionProperty = $reflectionClass->getProperty('options');
        $reflectionProperty->setAccessible(true);
        $this->assertCount(0, $reflectionProperty->getValue($schema));
        $schema->setOptions(...ConfigSchema::createDefaultOptions());
        $this->assertCount(2, $reflectionProperty->getValue($schema));
    }

    public function testGetDefaultValues()
    {
        $schema = (new ConfigSchema())->setOptions(...ConfigSchema::createDefaultOptions());
        $expected = [ConfigSchema::LOG_LEVEL => 'info', ConfigSchema::MAIN_LANGUAGE => 'de'];
        $this->assertEquals($expected, $schema->getDefaultValues());
    }

    public function testValidate()
    {
        $options = [
            ConfigSchemaOption::create('foo', ConfigSchemaOption::TYPE_STRING, true),
            ConfigSchemaOption::create('nothing', ConfigSchemaOption::TYPE_STRING, false),
            ConfigSchemaOption::create('yo', ConfigSchemaOption::TYPE_BOOLEAN, true),
        ];

        $schema = (new ConfigSchema())->setOptions(...$options);
        $config = $this->createFileConfig(json_encode(['yo' => false, 'foo' => 'bar']));
        $this->assertNull($schema->validateConfig($config));
    }

    public function testValidateHasInvalidValueAndMissingRequiredProperty()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::SCHEMA_VALIDATION_ERRORS);
        $options = [
            ConfigSchemaOption::create('foo', ConfigSchemaOption::TYPE_STRING, true),
            ConfigSchemaOption::create('nothing', ConfigSchemaOption::TYPE_STRING, false),
            ConfigSchemaOption::create('yo', ConfigSchemaOption::TYPE_BOOLEAN, true),
        ];
        $schema = (new ConfigSchema())->setOptions(...$options);
        $config = $this->createFileConfig(json_encode(['foo' => 42, 'nothing' => true]));
        $schema->validateConfig($config);
    }
}
