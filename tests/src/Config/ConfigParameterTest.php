<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Config;

use Exception;
use Jtl\Connector\Core\Config\ConfigParameter;
use Jtl\Connector\Core\Exception\ConfigException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class ConfigParameterTest extends TestCase
{
    /**
     * @param string       $type
     * @param mixed        $validValue
     * @param array<mixed> $invalidValues
     *
     * @return void
     * @throws ConfigException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('dataProvider')]
    public function testIsValidValueString(string $type, mixed $validValue, array $invalidValues): void
    {
        $option = new ConfigParameter('foo', $type);
        $this->assertTrue($option->isValidValue($validValue));
        foreach ($invalidValues as $invalidValue) {
            $this->assertFalse($option->isValidValue($invalidValue));
        }
    }

    /**
     * @param string $type
     * @param mixed  $validValue
     *
     * @return void
     * @throws ConfigException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('dataProvider')]
    public function testSetDefaultValue(string $type, mixed $validValue): void
    {
        $option = new ConfigParameter('foo', $type);
        $option->setDefaultValue($validValue);
        $this->assertEquals($validValue, $option->getDefaultValue());
    }

    /**
     * @param string       $type
     * @param mixed        $validValue
     * @param array<mixed> $invalidValues
     *
     * @return void
     * @throws ConfigException
     * @throws Exception
     */
    #[DataProvider('dataProvider')]
    public function testSetWrongDefaultValue(string $type, mixed $validValue, array $invalidValues): void
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::WRONG_TYPE);
        $option             = new ConfigParameter('foo', $type);
        $invalidValuesCount = \count($invalidValues);
        $randomIntMax       = $invalidValuesCount - 1;
        if ($randomIntMax < 1) {
            throw new \RuntimeException('randomIntMax must be greater than 0');
        }
        $invalidValuesIndex = \random_int(1, $randomIntMax);
        $option->setDefaultValue($invalidValues[$invalidValuesIndex]);
    }

    /**
     * @return void
     */
    public function testSetUnknownType(): void
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionCode(ConfigException::UNKNOWN_TYPE);
        $option           = new ConfigParameter('foo', ConfigParameter::TYPE_BOOLEAN);
        $reflectionClass  = new \ReflectionClass($option);
        $reflectionMethod = $reflectionClass->getMethod('setType');
        $reflectionMethod->setAccessible(true);
        $reflectionMethod->invoke($option, 'yolo');
    }

    /**
     * @return void
     */
    public function testSetEmptyKey(): void
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
     * @param string $type
     * @param mixed  $validValue
     *
     * @return void
     * @throws ConfigException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('dataProvider')]
    public function testHasDefaultValue(string $type, mixed $validValue): void
    {
        $option = new ConfigParameter('foo', $type);
        $this->assertFalse($option->hasDefaultValue());
        $option->setDefaultValue($validValue);
        $this->assertTrue($option->hasDefaultValue());
    }

    /**
     * @return array<int, array{0: string, 1: string|bool|float|int, 2: array<int, int|float|bool|string|null>}>
     */
    public static function dataProvider(): array
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
