<?php
namespace Jtl\Connector\Test\Core\Definition;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Definition\RelationType;
use Jtl\Connector\Test\Core\TestCase;

/**
 * Class RelationTypeTest
 * @package Jtl\Connector\Test\Core\Definition
 */
class RelationTypeTest extends TestCase
{
    /**
     * @dataProvider hasIdentityTypeDataProvider
     *
     * @param $relationType
     * @param $shouldHaveRelation
     * @throws \ReflectionException
     */
    public function testHasIdentityType($relationType, $shouldHaveRelation)
    {
        $hasIdentityType = RelationType::hasIdentityType($relationType);
        $this->assertSame($hasIdentityType, $shouldHaveRelation);
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function hasIdentityTypeDataProvider(): array
    {
        $testCases = $this->getCorrectConstantsTestCases(RelationType::class);

        $testCases[] = [false, false];
        $testCases[] = ['', false];
        $testCases[] = ['  ', false];
        $testCases[] = ['Category', false];
        $testCases[] = [' category', false];

        return $testCases;
    }

    /**
     * @dataProvider getIdentityTypeDataProvider
     *
     * @param $relationType
     * @param $expectedValue
     */
    public function testGetIdentityType($relationType, $expectedValue)
    {
        $identityType = RelationType::getIdentityType($relationType);
        $this->assertSame($identityType, $expectedValue);
    }

    /**
     * @return array
     */
    public function getIdentityTypeDataProvider(): array
    {
        return [
            [RelationType::CATEGORY, IdentityType::CATEGORY],
            [RelationType::PRODUCT_VARIATION_VALUE, IdentityType::PRODUCT_VARIATION_VALUE],
            ['', null],
        ];
    }

    /**
     * @throws \ReflectionException
     */
    public function testGetRelationTypesReturnSameArrayAsDefinedConstants()
    {
        $testCases = $this->getCorrectConstantsTestCases(RelationType::class);
        $testCases = array_column($testCases, 0);
        $relationTypes = RelationType::getRelationTypes();

        $this->assertSame($relationTypes, $testCases);
    }

    /**
     * @dataProvider hasIdentityTypeDataProvider
     *
     * @param $relationType
     * @param bool $shouldBeRelationType
     */
    public function testIsRelationType($relationType, bool $shouldBeRelationType)
    {
        $hasIdentityType = RelationType::isRelationType($relationType);
        $this->assertSame($hasIdentityType, $shouldBeRelationType);
    }


}