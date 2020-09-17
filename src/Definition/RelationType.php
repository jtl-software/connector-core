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
     * @return int
     * @throws DefinitionException
     * @throws \ReflectionException
     */
    public static function getIdentityType(string $relationType): int
    {
        if (!self::hasIdentityType($relationType)) {
            throw DefinitionException::unknownRelationType($relationType);
        }

        return Model::getIdentityType(self::getModelName($relationType));
    }

    /**
     * @param string $relationType
     * @return boolean
     */
    public static function hasIdentityType(string $relationType): bool
    {
        return Model::hasIdentityType(self::getModelName($relationType));
    }

    /**
     * @param string $relationType
     * @return bool
     * @throws DefinitionException
     */
    public static function hasRelatedImageIdentity(string $relationType): bool
    {
        return Model::hasIdentityType(self::getRelatedImageModelName($relationType));
    }

    /**
     * @param string $relationType
     * @return string
     * @throws DefinitionException
     */
    public static function getRelatedImageModelName(string $relationType): string
    {
        if (!self::hasIdentityType($relationType)) {
            throw DefinitionException::unknownRelationType($relationType);
        }

        return sprintf('%sImage', ucfirst($relationType));
    }

    /**
     * @param string $relationType
     * @return string
     */
    public static function getModelName(string $relationType): string
    {
        return ucfirst($relationType);
    }

    /**
     * @param string $relationType
     * @return bool
     */
    public static function isRelationType(string $relationType): bool
    {
        return self::hasIdentityType($relationType);
    }
}
