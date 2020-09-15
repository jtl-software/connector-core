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
    public function testHasIdentityType($relationType, bool $shouldHaveRelation = null)
    {
        if (is_null($shouldHaveRelation)) {
            $this->expectExceptionObject(DefinitionException::relationTypeCannotBeEmpty());
        }

        $hasIdentityType = RelationType::hasIdentityType($relationType);

        if (!is_null($shouldHaveRelation)) {
            $this->assertSame($hasIdentityType, $shouldHaveRelation);
        }
    }

    /**
     * @dataProvider hasIdentityTypeDataProvider
     *
     * @param $relationType
     * @param bool $shouldBeRelationType
     */
    public function testIsRelationType($relationType, bool $shouldBeRelationType = null)
    {
        if (is_null($shouldBeRelationType)) {
            $this->expectExceptionObject(DefinitionException::relationTypeCannotBeEmpty());
        }

        $hasIdentityType = RelationType::isRelationType($relationType);

        if (!is_null($shouldBeRelationType)) {
            $this->assertSame($hasIdentityType, $shouldBeRelationType);
        }
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function hasIdentityTypeDataProvider(): array
    {
        $testCases = $this->getCorrectConstantsTestCases(RelationType::class);

        $testCases[] = [false, null];
        $testCases[] = ['', null];
        $testCases[] = ['  ', false];
        $testCases[] = ['Category', true];
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
            ['category', IdentityType::CATEGORY],
            ['ProductVariationValue', IdentityType::PRODUCT_VARIATION_VALUE],
            ['foo', DefinitionException::unknownIdentityTypeMapping('foo')],
        ];
    }
}
