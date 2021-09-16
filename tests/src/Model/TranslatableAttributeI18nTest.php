<?php

namespace Jtl\Connector\Core\Test\Model;

use Jtl\Connector\Core\Exception\ModelException;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Test\TestCase;
use stdClass;

class TranslatableAttributeI18nTest extends TestCase
{
    /**
     * @dataProvider getValueProvider
     *
     * @param string $type
     * @param $originalValue
     * @param $expectedValue
     * @throws ModelException
     */
    public function testGetValue(string $type, $originalValue, $expectedValue)
    {
        $i18n = (new TranslatableAttributeI18n())
            ->setValue($originalValue);

        $actualValue = $i18n->getValue($type);

        $this->assertTrue($expectedValue === $actualValue, sprintf('Casted value (%s) has the wrong type', $actualValue));
    }

    /**
     * @return array
     */
    public function getValueProvider(): array
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
     * @param $value
     * @param string $expectedValue
     * @throws ModelException
     */
    public function testSetValue($value, string $expectedValue)
    {
        $translation = (new TranslatableAttributeI18n())->setValue($value);

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
     * @param $value
     */
    public function testSetValueWrongType($value)
    {
        $this->expectException(ModelException::class);
        $this->expectExceptionCode(ModelException::TRANSLATABLE_ATTRIBUTE_VALUE_TYPE_INVALID);
        $this->testSetValue($value, 'foo');
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
