<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Linker
 */
namespace Jtl\Connector\Core\Definition;


final class Relation
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
        self::PRODUCT => IdentityType::TYPE_PRODUCT,
        self::CATEGORY => IdentityType::TYPE_CATEGORY,
        self::PRODUCT_VARIATION_VALUE => IdentityType::TYPE_PRODUCT_VARIATION_VALUE,
        self::SPECIFIC => IdentityType::TYPE_SPECIFIC,
        self::SPECIFIC_VALUE => IdentityType::TYPE_SPECIFIC_VALUE,
        self::MANUFACTURER => IdentityType::TYPE_MANUFACTURER,
        self::CONFIG_GROUP => IdentityType::TYPE_CONFIG_GROUP,
    ];

    /**
     * @param string $relationType
     * @return boolean
     */
    public static function canMapToIdentity(string $relationType): bool
    {
        return isset(self::$mappings[$relationType]);
    }

    /**
     * @param string $relationType
     * @return int|null
     */
    public static function mapToIdentity(string $relationType): int
    {
        return self::canMapToIdentity($relationType) ? self::$mappings[$relationType] : null;
    }

    /**
     * @return string[]
     */
    public static function getRelations(): array
    {
        return array_keys(self::$mappings);
    }

    /**
     * @param string $relationType
     * @return bool
     */
    public static function isRelation(string $relationType): bool
    {
        return in_array($relationType, self::getRelations());
    }
}
