<?php
namespace Jtl\Connector\Core\Exception;

class ConfigException extends \Exception
{
    public const
        KEY_IS_EMPTY = 10;

    /**
     * @return ConfigException
     */
    public static function keyIsEmpty(): ConfigException
    {
        return new static('Key must contain at least one character', self::KEY_IS_EMPTY);
    }
}
