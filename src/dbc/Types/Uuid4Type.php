<?php

declare(strict_types=1);

namespace Jtl\Connector\Dbc\Types;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Exception\InvalidType;
use Doctrine\DBAL\Types\Type;

class Uuid4Type extends Type
{
    public const string
        NAME = 'uuid4';

    /**
     * @param mixed[]          $column
     * @param AbstractPlatform $platform
     *
     * @return string
     * @throws Exception
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        $column['length'] = 16;
        $column['fixed']  = true;

        /** @var array{length: int, fixed: bool} $column */
        return $platform->getBinaryTypeDeclarationSQL($column);
    }

    /**
     * @phpstan-param string   $value
     *
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): string
    {
        return \ctype_xdigit(\str_replace('-', '', $value)) ? $value : \bin2hex($value);
    }

    /**
     * @phpstan-param string   $value
     *
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return string
     * @throws InvalidType
     */
    public function convertToDatabaseValue(mixed $value, AbstractPlatform $platform): string
    {
        $converted = \hex2bin(\str_replace('-', '', $value));
        if ($converted === false) {
            throw InvalidType::new((string)$value, self::NAME, ['UUIDv4 string']);
        }

        return $converted;
    }

    /**
     * Modifies the SQL expression (identifier, parameter) to convert to a PHP value.
     *
     * @param string           $sqlExpr
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function convertToPHPValueSQL(string $sqlExpr, AbstractPlatform $platform): string
    {
        return \sprintf('LOWER(HEX(%s))', $sqlExpr);
    }
}
