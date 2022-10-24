<?php

namespace Jtl\Connector\Core\Test\Config;

use Jtl\Connector\Core\Config\ConfigParameter;
use Jtl\Connector\Core\Exception\ConfigException;
use PHPUnit\Framework\TestCase;

class ConfigParameterTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     *
     * @param string $type
     * @param $validValue
     * @param array $invalidValues
     * @throws ConfigException
     */
    public function testIsValidValueString(string $type, $validValue, array $invalidValues)
    {
        $option = new ConfigParameter('foo', $type);
        $this->assertTrue($option->isValidValue($validValue));
        foreach ($invalidValues as $invalidValue) {
            $this->assertFalse($option->isValidValue($invalidValue));
        }
    }

    /**
     * @dataProvider dataProvider
     *
     * @param string $type
     * @param $validValue
     * @param array $invalidValues
     * @throws ConfigException
     */
    public function testSetDefaultValue(string $type, $validValue, array $invalidValues)
    {
        $option = new ConfigParameter('foo', $type);
        $option->setDefaultValue($validValue);
        $this->assertEquals($validValue, $option->getDefaultValue());
    }

    /**
     * @dataProvider dataProvider
     *
     * @param string $type
     * @param $validValue
     * @param array $invalidValues
     * @throws ConfigException
     */
    public function testSetWrongDefaultValue(string $type, $validValue, array $invalidValues)
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::WRONG_TYPE);
        $option             = new ConfigParameter('foo', $type);
        $invalidValuesCount = \count($invalidValues);
        $invalidValuesIndex = \mt_rand(1, $invalidValuesCount - 1);
        $option->setDefaultValue($invalidValues[$invalidValuesIndex]);
    }

    public function testSetUnknownType()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::UNKNOWN_TYPE);
        $option           = new ConfigParameter('foo', ConfigParameter::TYPE_BOOLEAN);
        $reflectionClass  = new \ReflectionClass($option);
        $reflectionMethod = $reflectionClass->getMethod('setType');
        $reflectionMethod->setAccessible(true);
        $reflectionMethod->invoke($option, 'yolo');
    }

    public function testSetEmptyKey()
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::EMPTY_KEY);
        $option           = new ConfigParameter('foo', ConfigParameter::TYPE_INTEGER);
        $reflectionClass  = new \ReflectionClass($option);
        $reflectionMethod = $reflectionClass->getMethod('setKey');
        $reflectionMethod->setAccessible(true);
        $reflectionMethod->invoke($option, '');
    }

    /**
     * @dataProvider dataProvider
     *
     * @param string $type
     * @param $validValue
     * @param array $invalidValues
     * @throws ConfigException
     */
    public function testHasDefaultValue(string $type, $validValue, array $invalidValues)
    {
        $option = new ConfigParameter('foo', $type);
        $this->assertFalse($option->hasDefaultValue());
        $option->setDefaultValue($validValue);
        $this->assertTrue($option->hasDefaultValue());
    }

    /**
     * @return array[]
     */
    public function dataProvider()
    {
        return [
            [ConfigParameter::TYPE_STRING, 'foo', [null, 5, false, true, 0.1]],
            [ConfigParameter::TYPE_BOOLEAN, true, ['yolo', 49]],
            [ConfigParameter::TYPE_DOUBLE, 0.2, ['1', 1, true]],
            [ConfigParameter::TYPE_INTEGER, 22, [2.1, 'yo', false]],
            [ConfigParameter::TYPE_INTEGER, -3, [-0.1, true, 'baz']],
        ];
    }
}
