<?php

namespace Jtl\Connector\Core\Test\Model;

use Jtl\Connector\Core\Exception\ModelException;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Test\TestCase;
use stdClass;

class TranslatableAttributeI18nTest extends TestCase
{
    /**
     * @dataProvider castedValuesProvider
     *
     * @param string $type
     * @param $originalValue
     * @param $castedValue
     * @throws ModelException
     */
    public function testGetCastedValue(string $type, $originalValue, $castedValue)
    {
        $i18n = (new TranslatableAttributeI18n())
            ->setValue($originalValue);

        $actualValue = $i18n->getCastedValue($type);

        $this->assertTrue($castedValue === $actualValue, sprintf('Casted value (%s) has the wrong type', $actualValue));
    }

    /**
     * @return array
     */
    public function castedValuesProvider(): array
    {
        return [
            ['int', '2', 2],
            ['int', '2.1', 2],
            ['float', '2', 2.],
            ['float', '0', 0.],
            ['float', '0.32', 0.32],
            ['bool', 'true', true],
            ['bool', 'false', false],
            ['bool', '0', false],
            ['bool', '1', true],
            ['bool', '', false],
            ['bool', 'wat', true],
            ['string', 'foo', 'foo'],
            ['string', '', ''],
            ['foo', 'bar', 'bar'],
        ];
    }

    /**
     * @dataProvider setValueProvider
     *
     * @param $rawValue
     * @param string $expectedValue
     * @throws ModelException
     */
    public function testSetValue($rawValue, string $expectedValue)
    {
        $translation = (new TranslatableAttributeI18n())->setValue($rawValue);

        $this->assertTrue($translation->getValue() === $expectedValue, sprintf('Value (%s) is not equal to expected value (%s)', $translation->getValue(), $expectedValue));
    }

    /**
     * @return array
     */
    public function setValueProvider(): array
    {
        return [
            [true, '1'],
            [false, '0'],
            [0.1, '0.1'],
            [1.342342342, '1.342342342'],
            [0.0, '0'],
            [0, '0'],
            [1, '1'],
            ['foo', 'foo'],
        ];
    }

    /**
     * @dataProvider setValueInvalidTypeProvider
     *
     * @param $rawValue
     */
    public function testSetValueWrongType($rawValue)
    {
        $this->expectException(ModelException::class);
        $this->expectExceptionCode(ModelException::TRANSLATABLE_ATTRIBUTE_VALUE_TYPE_INVALID);
        $this->testSetValue($rawValue, 'foo');
    }

    /**
     * @return array
     */
    public function setValueInvalidTypeProvider(): array
    {
        return [
            [null],
            [['a', 'b']],
            [new stdClass()],
        ];
    }
}
