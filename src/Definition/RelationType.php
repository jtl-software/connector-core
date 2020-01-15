<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Linker
 */
namespace Jtl\Connector\Core\Definition;

use Jtl\Connector\Core\Exception\DefinitionException;

final class RelationType
{
    const CATEGORY = 'category';
    const CONFIG_GROUP = 'configGroup';
    const MANUFACTURER = 'manufacturer';
    const PRODUCT = 'product';
    const PRODUCT_VARIATION_VALUE = 'productVariationValue';
    const SPECIFIC = 'specific';
    const SPECIFIC_VALUE = 'specificValue';

    /**
     * @var string[]
     */
    protected static $mappings = [
        self::CATEGORY => IdentityType::CATEGORY,
        self::CONFIG_GROUP => IdentityType::CONFIG_GROUP,
        self::MANUFACTURER => IdentityType::MANUFACTURER,
        self::PRODUCT => IdentityType::PRODUCT,
        self::PRODUCT_VARIATION_VALUE => IdentityType::PRODUCT_VARIATION_VALUE,
        self::SPECIFIC => IdentityType::SPECIFIC,
        self::SPECIFIC_VALUE => IdentityType::SPECIFIC_VALUE,
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
