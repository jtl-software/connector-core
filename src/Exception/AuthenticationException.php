<?php
namespace Jtl\Connector\Core\Exception;

use Jtl\Connector\Core\Definition\ErrorCode;

class AuthenticationException extends \Exception
{
    /**
     * @return AuthenticationException
     */
    public static function failed(): AuthenticationException
    {
        return new static('Authentication failed', ErrorCode::AUTHENTICATION_FAILED);
    }

    /**
     * @return AuthenticationException
     */
    public static function tokenMissing(): AuthenticationException
    {
        return new static('Token is missing', ErrorCode::AUTHENTICATION_FAILED);
    }
}