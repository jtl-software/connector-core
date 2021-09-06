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
        $schema = (new ConfigSchema())->setParameters(...ConfigSchema::createDefaultParameters($this->connectorDir));
        $this->assertInstanceOf(ConfigParameter::class, $schema->getParameter(ConfigSchema::LOG_LEVEL));
    }

    public function testGetNotExistingParameter()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::UNKNOWN_PARAMETER);
        (new ConfigSchema())->getParameter('foobar');
    }

    public function testIsParameter()
    {
        $schema = (new ConfigSchema())->setParameters(...ConfigSchema::createDefaultParameters($this->connectorDir));
        $this->assertTrue($schema->hasParameter(ConfigSchema::LOG_LEVEL));
        $this->assertFalse($schema->hasParameter('yolo'));
    }

    public function testGetParameters()
    {
        $schema = new ConfigSchema();
        $schema->setParameter(new ConfigParameter('foo', ConfigParameter::TYPE_INTEGER));
        $reflectionClass = new \ReflectionClass($schema);
        $reflectionProperty = $reflectionClass->getProperty('parameters');
        $reflectionProperty->setAccessible(true);
        $schemaArray = $reflectionProperty->getValue($schema);
        $this->assertEquals(array_values($schemaArray), $schema->getParameters());
    }

    public function testSetparameter()
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

    public function testSetParameters()
    {
        $schema = new ConfigSchema();
        $reflectionClass = new \ReflectionClass($schema);
        $reflectionProperty = $reflectionClass->getProperty('parameters');
        $reflectionProperty->setAccessible(true);
        $this->assertCount(0, $reflectionProperty->getValue($schema));
        $defaultParameters = ConfigSchema::createDefaultParameters($this->connectorDir);
        $schema->setParameters(...$defaultParameters);
        $this->assertCount(count($defaultParameters), $reflectionProperty->getValue($schema));
    }

    public function testGetDefaultValues()
    {
        $schema = (new ConfigSchema())->setParameters(...ConfigSchema::createDefaultParameters($this->connectorDir));
        $expected = [
            ConfigSchema::LOG_LEVEL => 'info',
            ConfigSchema::LOG_FORMAT => 'line',
            ConfigSchema::MAIN_LANGUAGE => 'de',
            ConfigSchema::CONNECTOR_DIR => $this->connectorDir,
            ConfigSchema::LOG_DIR => sprintf('%s/var/log', $this->connectorDir),
            ConfigSchema::CACHE_DIR => sprintf('%s/var/cache', $this->connectorDir),
            ConfigSchema::PLUGINS_DIR => sprintf('%s/plugins', $this->connectorDir),
            ConfigSchema::FEATURES_PATH => sprintf('%s/config/features.json', $this->connectorDir),
            ConfigSchema::DEBUG => false,
            ConfigSchema::SERIALIZER_ENABLE_CACHE => true,
        ];
        $actual = $schema->getDefaultValues();
        $this->assertEquals($expected, $actual);
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
