<?php

namespace Jtl\Connector\Core\Exception;

/**
 * Class ConnectorException
 * @package Jtl\Connector\Core\Exception
 */
class TokenValidatorException extends \Exception
{
    const EMPTY_TOKEN = 10;

    /**
     * @return static
     */
    public static function emptyToken(): TokenValidatorException
    {
        return new self("Connector token cannot be empty", self::EMPTY_TOKEN);
    }
}
