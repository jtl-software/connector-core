<?php

namespace Jtl\Connector\Core\Test\Model;

use Jtl\Connector\Core\Model\TranslatableAttributeI18n;
use Jtl\Connector\Core\Test\TestCase;

class TranslatableAttributeI18nTest extends TestCase
{
    /**
     * @dataProvider castedValuesProvider
     *
     * @param string $type
     * @param string $originalValue
     * @param $castedValue
     */
    public function testGetCastedValue(string $type, string $originalValue, $castedValue)
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
}
