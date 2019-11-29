<?php

namespace Jtl\Connector\Core\Definition;

use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Logger\Logger;

class ConfigOption
{
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_FLOAT = 'float';
    const TYPE_INTEGER = 'integer';
    const TYPE_STRING = 'string';

    const LOG_LEVEL = 'log_level';
    const MAIN_LANGUAGE = 'main_language';

    /**
     * @var string[]
     */
    protected static $types = [
        self::LOG_LEVEL => self::TYPE_STRING,
        self::MAIN_LANGUAGE => self::TYPE_STRING,
    ];

    /**
     * @var string[]
     */
    protected static $defaultValues = [
        self::LOG_LEVEL => Logger::INFO,
        self::MAIN_LANGUAGE => 'ger',
    ];

    /**
     * @param string $option
     * @return boolean
     */
    public static function isOption(string $option): bool
    {
        return in_array($option, static::getTypes(), true);
    }

    /**
     * @return string[]
     */
    public static function getTypes(): array
    {
        return static::$types;
    }

    /**
     * @param string $option
     * @return string
     */
    public static function getType(string $option): string
    {
        if (static::isOption($option)) {
            return static::$types[$option];
        }
        return self::TYPE_STRING;
    }

    /**
     * @return mixed[]
     */
    public static function getDefaultValues(): array
    {
        return static::$defaultValues;
    }

    /**
     * @param string $option
     * @return boolean
     */
    public static function hasDefaultValue(string $option): bool
    {
        return static::isOption($option) && isset(static::$defaultValues[$option]);
    }

    /**
     * @param string $option
     * @return string
     * @throws DefinitionException
     */
    public static function getDefaultValue(string $option)
    {
        if(!static::isOption($option)) {
            throw DefinitionException::unknownConfigOption($option);
        }

        if(!static::hasDefaultValue($option)) {
            throw DefinitionException::defaultValueNotExists($option);
        }

        return static::$defaultValues[$option];
    }
}
