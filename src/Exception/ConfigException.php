<?php

namespace Jtl\Connector\Core\Exception;

class ConfigException extends \Exception
{
    public const
        EMPTY_KEY = 10,
        UNKNOWN_TYPE = 20,
        WRONG_TYPE = 30,
        UNKNOWN_OPTION = 40;

    /**
     * @return ConfigException
     */
    public static function keyIsEmpty(): self
    {
        return new static('Key must contain at least one character', self::EMPTY_KEY);
    }

    /**
     * @param string $type
     * @return ConfigException
     */
    public static function unknownType(string $type): self
    {
        return new static(sprintf('Option type (%s) does not exist', $type), self::UNKNOWN_TYPE);
    }

    /**
     * @param string $expectedType
     * @param string $givenType
     * @return ConfigException
     */
    public static function wrongType(string $expectedType, string $givenType): self
    {
        return new static(sprintf('Wrong data type. %s was expected but %s is given', $expectedType, $givenType), self::WRONG_TYPE);
    }

    /**
     * @param string $key
     * @return ConfigException
     */
    public static function unknownOption(string $key): self
    {
        return new static(sprintf('Option (%s) does not exist', $key), self::UNKNOWN_OPTION);
    }
}
