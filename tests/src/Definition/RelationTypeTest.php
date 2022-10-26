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
     * @dataProvider relatedImageIdentityTypeProvider
     *
     * @param string   $relationType
     * @param int|null $relatedImageIdentityType
     *
     * @throws DefinitionException|\ReflectionException
     */
    public function testGetRelatedImageIdentityType(string $relationType, ?int $relatedImageIdentityType)
    {
        if (\is_null($relatedImageIdentityType)) {
            $this->expectException(DefinitionException::class);
            $this->expectExceptionCode(DefinitionException::UNKNOWN_RELATION_TYPE);
        }

        $this->assertEquals($relatedImageIdentityType, RelationType::getRelatedImageIdentityType($relationType));
    }


    /**
     * @dataProvider relatedImageIdentityProvider
     *
     * @param string $relationType
     * @param bool   $hasRelatedImageIdentityType
     *
     * @throws DefinitionException
     */
    public function testHasRelatedImageIdentityType(string $relationType, bool $hasRelatedImageIdentityType)
    {
        $this->assertEquals(RelationType::hasRelatedImageIdentityType($relationType), $hasRelatedImageIdentityType);
    }

    /**
     * @dataProvider relationTypeProvider
     *
     * @param string $relationType
     * @param bool   $isRelationType
     *
     * @throws DefinitionException
     */
    public function testGetRelatedImageModelName(string $relationType, bool $isRelationType)
    {
        if (!$isRelationType) {
            $this->expectExceptionObject(DefinitionException::unknownRelationType($relationType));
        }

        $this->assertEquals(
            \sprintf('%sImage', \ucfirst($relationType)),
            RelationType::getRelatedImageModelName($relationType)
        );
    }

    /**
     * @dataProvider relationTypeProvider
     *
     * @param string $relationType
     * @param bool   $isRelationType
     *
     * @throws DefinitionException
     */
    public function testGetModelName(string $relationType, bool $isRelationType)
    {
        if (!$isRelationType) {
            $this->expectExceptionObject(DefinitionException::unknownRelationType($relationType));
        }

        $this->assertEquals(\ucfirst($relationType), RelationType::getModelName($relationType));
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
     * @param      $relationType
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
        $testCases[] = [
            ' ',
            false,
        ];
        $testCases[] = [
            'Category',
            true,
        ];
        $testCases[] = [
            'category',
            true,
        ];
        $testCases[] = [
            ' category',
            false,
        ];
        $testCases[] = [
            'Yolo',
            false,
        ];
        $testCases[] = [
            'CrossSelling',
            true,
        ];

        return $testCases;
    }

    /**
     * @return mixed[]
     */
    public function relatedImageIdentityProvider(): array
    {
        return [
            [
                'productStockLevel',
                false,
            ],
            [
                'ProductStockLevel',
                false,
            ],
            [
                'CrossSelling',
                false,
            ],
            [
                'manufacturer',
                true,
            ],
            [
                'Manufacturer',
                true,
            ],
        ];
    }

    /**
     * @return array[]
     */
    public function relatedImageIdentityTypeProvider(): array
    {
        return [
            [
                'product',
                IdentityType::PRODUCT_IMAGE,
            ],
            [
                'Product',
                IdentityType::PRODUCT_IMAGE,
            ],
            [
                'manufacturer',
                IdentityType::MANUFACTURER_IMAGE,
            ],
            [
                'productAttr',
                null,
            ],
            [
                'whateverYouWant',
                null,
            ],
        ];
    }

    /**
     * @dataProvider getIdentityTypeDataProvider
     *
     * @param $relationType
     * @param $expectedValue
     *
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
            [
                'category',
                IdentityType::CATEGORY,
            ],
            [
                'ProductVariationValue',
                IdentityType::PRODUCT_VARIATION_VALUE,
            ],
            [
                'foo',
                DefinitionException::unknownRelationType('foo'),
            ],
        ];
    }
}
