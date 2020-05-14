<?php

namespace Jtl\Connector\Core\Test\Config;

use Jtl\Connector\Core\Config\ConfigParameter;
use Jtl\Connector\Core\Config\ConfigSchema;
use Jtl\Connector\Core\Exception\ConfigException;
use Jtl\Connector\Core\Test\TestCase;

class ConfigSchemaTest extends TestCase
{
    public function testGetOption()
    {
        $schema = (new ConfigSchema())->setParameters(...ConfigSchema::createDefaultParameters());
        $this->assertInstanceOf(ConfigParameter::class, $schema->getParameter(ConfigSchema::LOG_LEVEL));
    }

    public function testGetNotExistingOption()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::UNKNOWN_OPTION);
        (new ConfigSchema())->getParameter('foobar');
    }

    public function testIsOption()
    {
        $schema = (new ConfigSchema())->setParameters(...ConfigSchema::createDefaultParameters());
        $this->assertTrue($schema->hasParameter(ConfigSchema::LOG_LEVEL));
        $this->assertFalse($schema->hasParameter('yolo'));
    }

    public function testGetOptions()
    {
        $schema = new ConfigSchema();
        $schema->setParameter(new ConfigParameter('foo', ConfigParameter::TYPE_INTEGER));
        $reflectionClass = new \ReflectionClass($schema);
        $reflectionProperty = $reflectionClass->getProperty('parameters');
        $reflectionProperty->setAccessible(true);
        $schemaArray = $reflectionProperty->getValue($schema);
        $this->assertEquals(array_values($schemaArray), $schema->getParameters());
    }

    public function testSetOption()
    {
        $schema = new ConfigSchema();
        $reflectionClass = new \ReflectionClass($schema);
        $reflectionProperty = $reflectionClass->getProperty('parameters');
        $reflectionProperty->setAccessible(true);
        $this->assertCount(0, $reflectionProperty->getValue($schema));
        $option = new ConfigParameter('foo', ConfigParameter::TYPE_INTEGER);
        $schema->setParameter($option);
        $this->assertCount(1, $reflectionProperty->getValue($schema));
        $actualOption = $schema->getParameter('foo');
        $this->assertEquals($option, $actualOption);
    }

    public function testSetOptions()
    {
        $schema = new ConfigSchema();
        $reflectionClass = new \ReflectionClass($schema);
        $reflectionProperty = $reflectionClass->getProperty('parameters');
        $reflectionProperty->setAccessible(true);
        $this->assertCount(0, $reflectionProperty->getValue($schema));
        $schema->setParameters(...ConfigSchema::createDefaultParameters());
        $this->assertCount(2, $reflectionProperty->getValue($schema));
    }

    public function testGetDefaultValues()
    {
        $schema = (new ConfigSchema())->setParameters(...ConfigSchema::createDefaultParameters());
        $expected = [ConfigSchema::LOG_LEVEL => 'info', ConfigSchema::MAIN_LANGUAGE => 'de'];
        $this->assertEquals($expected, $schema->getDefaultValues());
    }

    public function testValidate()
    {
        $options = [
            ConfigParameter::create('foo', ConfigParameter::TYPE_STRING, true),
            ConfigParameter::create('nothing', ConfigParameter::TYPE_STRING, false),
            ConfigParameter::create('yo', ConfigParameter::TYPE_BOOLEAN, true),
        ];

        $schema = (new ConfigSchema())->setParameters(...$options);
        $config = $this->createFileConfig(json_encode(['yo' => false, 'foo' => 'bar']));
        $this->assertNull($schema->validateConfig($config));
    }

    public function testValidateHasInvalidValueAndMissingRequiredProperty()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::SCHEMA_VALIDATION_ERRORS);
        $options = [
            ConfigParameter::create('foo', ConfigParameter::TYPE_STRING, true),
            ConfigParameter::create('nothing', ConfigParameter::TYPE_STRING, false),
            ConfigParameter::create('yo', ConfigParameter::TYPE_BOOLEAN, true),
        ];
        $schema = (new ConfigSchema())->setParameters(...$options);
        $config = $this->createFileConfig(json_encode(['foo' => 42, 'nothing' => true]));
        $schema->validateConfig($config);
    }
}
