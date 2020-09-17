<?php

namespace Jtl\Connector\Core\Test\Definition;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Definition\RelationType;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class RelationTypeTest
 * @package Jtl\Connector\Core\Test\Definition
 */
class RelationTypeTest extends TestCase
{
    /**
     * @dataProvider relatedImageIdentityProvider
     *
     * @param string $relationType
     * @param bool $hasRelatedImageIdentity
     * @throws DefinitionException
     */
    public function testHasRelatedImageIdentity(string $relationType, bool $hasRelatedImageIdentity)
    {
        $this->assertEquals(RelationType::hasRelatedImageIdentity($relationType), $hasRelatedImageIdentity);
    }

    /**
     * @dataProvider relationTypeProvider
     *
     * @param string $relationType
     * @param bool $isRelationType
     * @throws DefinitionException
     */
    public function testGetRelatedImageModelName(string $relationType, bool $isRelationType)
    {
        if(!$isRelationType) {
            $this->expectExceptionObject(DefinitionException::unknownRelationType($relationType));
        }

        $expectedImageModelName = sprintf('%sImage', ucfirst($relationType));
        $this->assertEquals($expectedImageModelName, RelationType::getRelatedImageModelName($relationType));
    }

    /**
     * @dataProvider relationTypeProvider
     *
     * @param $relationType
     * @param $isRelationType
     */
    public function testHasIdentityType($relationType, bool $isRelationType)
    {
        $hasIdentityType = RelationType::hasIdentityType($relationType);
        $this->assertSame($hasIdentityType, $isRelationType);
    }

    /**
     * @dataProvider relationTypeProvider
     *
     * @param $relationType
     * @param bool $isRelationType
     */
    public function testIsRelationType($relationType, bool $isRelationType)
    {
        $hasIdentityType = RelationType::isRelationType($relationType);
        $this->assertSame($hasIdentityType, $isRelationType);
    }

    /**
     * @return mixed[]
     */
    public function relationTypeProvider(): array
    {
        $testCases[] = [' ', false];
        $testCases[] = ['Category', true];
        $testCases[] = ['category', true];
        $testCases[] = [' category', false];
        $testCases[] = ['Yolo', false];
        $testCases[] = ['CrossSelling', true];

        return $testCases;
    }

    /**
     * @return mixed[]
     */
    public function relatedImageIdentityProvider(): array
    {
        return [
            ['productStockLevel', false],
            ['ProductStockLevel', false],
            ['CrossSelling', false],
            ['manufacturer', true],
            ['Manufacturer', true],
        ];
    }

    /**
     * @dataProvider getIdentityTypeDataProvider
     *
     * @param $relationType
     * @param $expectedValue
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public function testGetIdentityType($relationType, $expectedValue)
    {
        if ($expectedValue instanceof DefinitionException) {
            $this->expectExceptionObject($expectedValue);
        }

        $identityType = RelationType::getIdentityType($relationType);

        if ($expectedValue instanceof DefinitionException === false) {
            $this->assertSame($identityType, $expectedValue);
        }
    }

    /**
     * @return array
     */
    public function getIdentityTypeDataProvider(): array
    {
        return [
            ['category', IdentityType::CATEGORY],
            ['ProductVariationValue', IdentityType::PRODUCT_VARIATION_VALUE],
            ['foo', DefinitionException::unknownRelationType('foo')],
        ];
    }
}
