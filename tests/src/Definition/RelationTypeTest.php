<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Definition;

use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Definition\RelationType;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Test\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * Class RelationTypeTest
 *
 * @package Jtl\Connector\Core\Test\Definition
 */
class RelationTypeTest extends TestCase
{
    /**
     * @param string   $relationType
     * @param int|null $relatedImageIdentityType
     *
     * @return void
     * @throws DefinitionException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('relatedImageIdentityTypeProvider')]
    public function testGetRelatedImageIdentityType(string $relationType, ?int $relatedImageIdentityType): void
    {
        if (\is_null($relatedImageIdentityType)) {
            $this->expectException(DefinitionException::class);
            $this->expectExceptionCode(DefinitionException::UNKNOWN_RELATION_TYPE);
        }

        $this->assertEquals($relatedImageIdentityType, RelationType::getRelatedImageIdentityType($relationType));
    }


    /**
     * @param string $relationType
     * @param bool   $hasRelatedImageIdentityType
     *
     * @return void
     * @throws DefinitionException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('relatedImageIdentityProvider')]
    public function testHasRelatedImageIdentityType(string $relationType, bool $hasRelatedImageIdentityType): void
    {
        $this->assertEquals(RelationType::hasRelatedImageIdentityType($relationType), $hasRelatedImageIdentityType);
    }

    /**
     * @param string $relationType
     * @param bool   $isRelationType
     *
     * @return void
     * @throws DefinitionException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('relationTypeProvider')]
    public function testGetRelatedImageModelName(string $relationType, bool $isRelationType): void
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
     * @param string $relationType
     * @param bool   $isRelationType
     *
     * @return void
     * @throws DefinitionException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('relationTypeProvider')]
    public function testGetModelName(string $relationType, bool $isRelationType): void
    {
        if (!$isRelationType) {
            $this->expectExceptionObject(DefinitionException::unknownRelationType($relationType));
        }

        $this->assertEquals(\ucfirst($relationType), RelationType::getModelName($relationType));
    }

    /**
     * @param string $relationType
     * @param bool   $isRelationType
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('relationTypeProvider')]
    public function testHasIdentityType(string $relationType, bool $isRelationType): void
    {
        $hasIdentityType = RelationType::hasIdentityType($relationType);
        $this->assertSame($hasIdentityType, $isRelationType);
    }

    /**
     * @param string $relationType
     * @param bool   $isRelationType
     *
     * @return void
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('relationTypeProvider')]
    public function testIsRelationType(string $relationType, bool $isRelationType): void
    {
        $hasIdentityType = RelationType::isRelationType($relationType);
        $this->assertSame($hasIdentityType, $isRelationType);
    }

    /**
     * @return array<int, array{0: string, 1: bool}>
     */
    public static function relationTypeProvider(): array
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
     * @return array<int, array{0: string, 1: bool}>
     */
    public static function relatedImageIdentityProvider(): array
    {
        return [
            ['productStockLevel', false],
            ['ProductStockLevel', false],
            ['CrossSelling', false],
            ['manufacturer', true],
            ['Manufacturer', true]
        ];
    }

    /**
     * @return array<int, array{0: string, 1: int|null}>
     */
    public static function relatedImageIdentityTypeProvider(): array
    {
        return [
            ['product', IdentityType::PRODUCT_IMAGE],
            ['Product', IdentityType::PRODUCT_IMAGE],
            ['manufacturer', IdentityType::MANUFACTURER_IMAGE],
            ['productAttr', null],
            ['whateverYouWant', null]
        ];
    }

    /**
     * @param string                  $relationType
     * @param DefinitionException|int $expectedValue
     *
     * @return void
     * @throws DefinitionException
     * @throws \InvalidArgumentException
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    #[DataProvider('getIdentityTypeDataProvider')]
    public function testGetIdentityType(string $relationType, DefinitionException|int $expectedValue): void
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
     * @return array<int, array{0: string, 1: int|DefinitionException}>
     */
    public static function getIdentityTypeDataProvider(): array
    {
        return [
            ['category', IdentityType::CATEGORY],
            ['ProductVariationValue', IdentityType::PRODUCT_VARIATION_VALUE],
            ['foo', DefinitionException::unknownRelationType('foo')]
        ];
    }
}
