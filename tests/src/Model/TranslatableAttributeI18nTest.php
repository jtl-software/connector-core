<?php

namespace Jtl\Connector\Core\Test\Model;

use Jtl\Connector\Core\Exception\TranslatableAttributeException;
use Jtl\Connector\Core\Model\TranslatableAttribute;
use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Test\TestCase;
use stdClass;

class TranslatableAttributeI18nTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        TranslatableAttributeI18n::setStrictMode(false);
    }


    /**
     * @dataProvider getValueProvider
     *
     * @param string $type
     * @param $originalValue
     * @param $expectedValue
     * @param bool $strictMode
     * @throws TranslatableAttributeException
     */
    public function testGetValue(string $type, $originalValue, $expectedValue, bool $strictMode = false)
    {
        TranslatableAttributeI18n::setStrictMode($strictMode);

        $i18n = (new TranslatableAttributeI18n())
            ->setValue($originalValue);

        $actualValue = $i18n->getValue($type);

        $this->assertTrue($expectedValue === $actualValue, \sprintf('Casted value (%s) has the wrong type', \json_encode($actualValue)));
    }

    /**
     * @return array
     */
    public function getValueProvider(): array
    {
        return [
            [
                'int',
                '2',
                2,
            ],
            [
                'int',
                '2.1',
                2,
            ],
            [
                'float',
                '2',
                2.,
            ],
            [
                'float',
                '0',
                0.,
            ],
            [
                'float',
                '0.32',
                0.32,
            ],
            [
                'bool',
                'true',
                true,
            ],
            [
                'bool',
                'false',
                false,
            ],
            [
                'bool',
                '0',
                false,
            ],
            [
                'bool',
                '1',
                true,
            ],
            [
                'bool',
                '',
                false,
            ],
            [
                'bool',
                'wat',
                true,
            ],
            [
                'string',
                'foo',
                'foo',
            ],
            [
                'string',
                '',
                '',
            ],
            [
                'foo',
                'bar',
                'bar',
            ],
            [
                'json',
                '["a", "b"]',
                [
                    'a',
                    'b',
                ],
            ],
            [
                'json',
                '{"key1":"value1", "key2":"value2"}',
                [
                    'key1' => 'value1',
                    'key2' => 'value2',
                ],
            ],
            [
                'json',
                '...asdas',
                null,
                false,
            ],
        ];
    }

    public function testGetValueAndJsonDecodingFailedInStrictMode()
    {
        $this->expectException(TranslatableAttributeException::class);
        $this->expectExceptionCode(TranslatableAttributeException::DECODING_VALUE_FAILED);

        TranslatableAttributeI18n::setStrictMode(true);

        $i18n = (new TranslatableAttributeI18n())
            ->setValue('asdasdas');

        $i18n->getValue(TranslatableAttribute::TYPE_JSON);
    }

    /**
     * @dataProvider setValueProvider
     *
     * @param $value
     * @param string $expectedValue
     * @throws TranslatableAttributeException
     */
    public function testSetValue($value, string $expectedValue)
    {
        $translation = (new TranslatableAttributeI18n())->setValue($value);

        $this->assertTrue($translation->getValue() === $expectedValue, \sprintf('Value (%s) is not equal to expected value (%s)', $translation->getValue(), $expectedValue));
    }

    /**
     * @return array
     */
    public function setValueProvider(): array
    {
        return [
            [
                true,
                '1',
            ],
            [
                false,
                '0',
            ],
            [
                0.1,
                '0.1',
            ],
            [
                1.342342342,
                '1.342342342',
            ],
            [
                0.0,
                '0',
            ],
            [
                0,
                '0',
            ],
            [
                1,
                '1',
            ],
            [
                'foo',
                'foo',
            ],
            [
                [
                    'a',
                    'c',
                ],
                '["a","c"]',
            ],
            [
                [
                    'foo' => 'bar', 'baz'
                ],
                '{"foo":"bar","0":"baz"}',
            ],
        ];
    }

    /**
     * @dataProvider setValueInvalidTypeProvider
     *
     * @param $value
     */
    public function testSetValueWrongType($value)
    {
        $this->expectException(TranslatableAttributeException::class);
        $this->expectExceptionCode(TranslatableAttributeException::VALUE_TYPE_INVALID);
        (new TranslatableAttributeI18n())->setValue($value);
    }

    /**
     * @return array
     */
    public function setValueInvalidTypeProvider(): array
    {
        return [
            [null],
            [\fopen('php://temp', 'r')],
        ];
    }
}
