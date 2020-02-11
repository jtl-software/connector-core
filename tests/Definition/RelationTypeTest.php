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
            [RelationType::CATEGORY, IdentityType::CATEGORY],
            [RelationType::PRODUCT_VARIATION_VALUE, IdentityType::PRODUCT_VARIATION_VALUE],
            ['foo', DefinitionException::unknownIdentityTypeMapping('foo')],
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