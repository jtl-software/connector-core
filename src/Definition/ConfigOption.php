<?php

namespace Jtl\Connector\Core\Definition;

class ConfigOption
{
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_FLOAT = 'float';
    const TYPE_INTEGER = 'integer';
    const TYPE_STRING = 'string';

    const LOG_LEVEL = 'log_level';

    /**
     * @var string[]
     */
    protected static $options = [
        self::LOG_LEVEL => self::TYPE_STRING
    ];

    /**
     * @return string[]
     */
    public static function getOptions(): array
    {
        return static::$options;
    }

    /**
     * @param string $option
     * @return boolean
     */
    public static function isOption(string $option): bool
    {
        return in_array($option, static::getOptions(), true);
    }

    /**
     * @param string $option
     * @return string
     */
    public static function getType(string $option): string
    {
        if (static::isOption($option)) {
            return static::$options[$option];
        }
        return self::TYPE_STRING;
    }
}
