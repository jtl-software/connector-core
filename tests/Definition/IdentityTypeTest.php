<?php
namespace Jtl\Connector\Core\Tests\Definition;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Tests\TestCase;

/**
 * Class IdentityTypeTest
 * @package Jtl\Connector\Core\Tests\Definition
 */
class IdentityTypeTest extends TestCase
{
    /**
     * @dataProvider isTypeDataProvider
     *
     * @param $type
     * @param bool $shouldBeIdentityType
     * @throws \ReflectionException
     */
    public function testIsType($type, bool $shouldBeIdentityType)
    {
        $isType = IdentityType::isType($type);
        $this->assertSame($shouldBeIdentityType, $isType);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function isTypeDataProvider(): array
    {
        $testCases = $this->getCorrectConstantsTestCases(IdentityType::class);
        $testCases[] = [false, false];
        $testCases[] = [-100, false];
        $testCases[] = ['68', true];

        return $testCases;
    }
}