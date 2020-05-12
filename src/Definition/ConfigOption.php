<?php

namespace Jtl\Connector\Core\Definition;

use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Logger\Logger;

class ConfigOption
{
    const LOG_LEVEL = 'log_level';
    const MAIN_LANGUAGE = 'main_language';

    /**
     * @var mixed[]|null
     */
    protected static $options = null;

    /**
     * @var string[]
     */
    protected static $defaultValues = [
        self::LOG_LEVEL => Logger::INFO,
        self::MAIN_LANGUAGE => 'ger',
    ];

    /**
     * @return mixed[]
     */
    public static function getOptions(): array
    {
        return array_keys(static::$defaultValues);
    }

    /**
     * @param string $option
     * @return boolean
     */
    public static function isOption(string $option): bool
    {
        return isset(static::$defaultValues[$option]);
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
        return static::isOption($option);
    }

    /**
     * @param string $option
     * @return string
     * @throws DefinitionException
     */
    public static function getDefaultValue(string $option)
    {
        if (!static::isOption($option)) {
            throw DefinitionException::unknownConfigOption($option);
        }

        if (!static::hasDefaultValue($option)) {
            throw DefinitionException::defaultValueNotExists($option);
        }

        return static::$defaultValues[$option];
    }
}
