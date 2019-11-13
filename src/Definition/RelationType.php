<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Linker
 */
namespace Jtl\Connector\Core\Definition;


final class RelationType
{
    const PRODUCT = 'product';
    const CATEGORY = 'category';
    const PRODUCT_VARIATION_VALUE = 'productVariationValue';
    const SPECIFIC = 'specific';
    const SPECIFIC_VALUE = 'specificValue';
    const MANUFACTURER = 'manufacturer';
    const CONFIG_GROUP = 'configGroup';

    /**
     * @var string[]
     */
    protected static $mappings = [
        self::PRODUCT => IdentityType::PRODUCT,
        self::CATEGORY => IdentityType::CATEGORY,
        self::PRODUCT_VARIATION_VALUE => IdentityType::PRODUCT_VARIATION_VALUE,
        self::SPECIFIC => IdentityType::SPECIFIC,
        self::SPECIFIC_VALUE => IdentityType::SPECIFIC_VALUE,
        self::MANUFACTURER => IdentityType::MANUFACTURER,
        self::CONFIG_GROUP => IdentityType::CONFIG_GROUP,
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
     * @return int|null
     */
    public static function getIdentityType(string $relationType): int
    {
        return self::hasIdentityType($relationType) ? self::$mappings[$relationType] : null;
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
        return in_array($relationType, self::getRelationTypes());
    }
}
