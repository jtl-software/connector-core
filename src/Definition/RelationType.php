<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Linker
 */

namespace Jtl\Connector\Core\Definition;

use Jtl\Connector\Core\Exception\DefinitionException;

final class RelationType
{
    public const
        CATEGORY = 'category',
        CATEGORY_IMAGE = 'categoryImage',
        CONFIG_GROUP = 'configGroup',
        MANUFACTURER = 'manufacturer',
        PRODUCT = 'product',
        PRODUCT_VARIATION_VALUE = 'productVariationValue',
        SPECIFIC = 'specific',
        SPECIFIC_VALUE = 'specificValue';

    /**
     * @var int[]
     */
    protected static $mappings = [
        self::CATEGORY => IdentityType::CATEGORY,
        self::CONFIG_GROUP => IdentityType::CONFIG_GROUP,
        self::MANUFACTURER => IdentityType::MANUFACTURER,
        self::PRODUCT => IdentityType::PRODUCT,
        self::PRODUCT_VARIATION_VALUE => IdentityType::PRODUCT_VARIATION_VALUE,
        self::SPECIFIC => IdentityType::SPECIFIC,
        self::SPECIFIC_VALUE => IdentityType::SPECIFIC_VALUE
    ];

    /**
     * @var int[]
     */
    protected static $imageMappings = [
        self::CATEGORY => IdentityType::CATEGORY_IMAGE,
        self::CONFIG_GROUP => IdentityType::CONFIG_GROUP_IMAGE,
        self::MANUFACTURER => IdentityType::MANUFACTURER_IMAGE,
        self::PRODUCT => IdentityType::PRODUCT_IMAGE,
        self::PRODUCT_VARIATION_VALUE => IdentityType::PRODUCT_VARIATION_VALUE_IMAGE,
        self::SPECIFIC => IdentityType::SPECIFIC_IMAGE,
        self::SPECIFIC_VALUE => IdentityType::SPECIFIC_VALUE_IMAGE
    ];

    /**
     * @param string $relationType
     * @return boolean
     */
    public static function hasIdentityType(string $relationType): bool
    {
        return isset(self::$mappings[$relationType]);
    }

    /**
     * @param string $relationType
     * @return boolean
     */
    public static function hasImageIdentityType(string $relationType): bool
    {
        return isset(self::$imageMappings[$relationType]);
    }

    /**
     * @param string $relationType
     * @return int
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public static function getIdentityType(string $relationType): int
    {
        if (self::hasIdentityType($relationType) && IdentityType::isType($type = self::$mappings[$relationType])) {
            return $type;
        }

        throw DefinitionException::unknownIdentityTypeMapping($relationType);
    }

    /**
     * @param string $relationType
     * @return int
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public static function getImageIdentityType(string $relationType): int
    {
        if (self::hasImageIdentityType($relationType) && IdentityType::isType($type = self::$imageMappings[$relationType])) {
            return $type;
        }

        throw DefinitionException::unknownImageIdentityTypeMapping($relationType);
    }

    /**
     * @return string[]
     */
    public static function getRelationTypes(): array
    {
        return array_keys(self::$mappings);
    }

    /**
     * @param string $relationType
     * @return bool
     */
    public static function isRelationType(string $relationType): bool
    {
        return in_array($relationType, self::getRelationTypes(), true);
    }
}
