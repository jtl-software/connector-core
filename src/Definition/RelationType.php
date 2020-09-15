<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Linker
 */

namespace Jtl\Connector\Core\Definition;

use Jtl\Connector\Core\Exception\DefinitionException;

final class RelationType
{
    /**
     * @param string $relationType
     * @return bool
     * @throws \ReflectionException
     */
    public static function hasIdentityType(string $relationType): bool
    {
        return Model::isModel(self::getRelatedImageModelName($relationType));
    }

    /**
     * @param string $relationType
     * @return bool
     */
    public static function hasImageIdentityType(string $relationType): bool
    {
        return Model::hasIdentityType(self::getRelatedImageModelName($relationType));
    }

    /**
     * @param string $relationType
     * @return string
     * @throws DefinitionException
     */
    protected static function getRelatedImageModelName(string $relationType): string
    {
        if (empty($relationType)) {
            throw DefinitionException::relationTypeCannotBeEmpty();
        }

        return sprintf('%sImage', ucfirst($relationType));
    }

    /**
     * @param string $relationType
     * @return int
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public static function getIdentityType(string $relationType): int
    {
        if (self::hasIdentityType($relationType) && IdentityType::isType($type = Model::getIdentityType(ucfirst($relationType)))) {
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
        if (self::hasImageIdentityType($relationType) && IdentityType::isType($type = Model::getIdentityType(self::getRelatedImageModelName($relationType)))) {
            return $type;
        }

        throw DefinitionException::unknownImageIdentityTypeMapping($relationType);
    }

    /**
     * @param string $relationType
     * @return bool
     */
    public static function isRelationType(string $relationType): bool
    {
        return self::hasImageIdentityType($relationType);
    }
}
