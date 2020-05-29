<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Exception
 */

namespace Jtl\Connector\Core\Exception;

use Jtl\Connector\Core\Definition\ErrorCode;

/**
 * RPC Exception Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class RpcException extends \Exception
{
    /**
     * @return RpcException
     */
    public static function parseError(): self
    {
        return new static("Parse error", ErrorCode::PARSE_ERROR);
    }

    /**
     * @return RpcException
     */
    public static function invalidRequest(): self
    {
        return new static('Invalid request', ErrorCode::INVALID_REQUEST);
    }

    /**
     * @param string $method
     * @return RpcException
     */
    public static function invalidMethod(string $method): self
    {
        return new static(sprintf('Invalid method (%s)', $method), ErrorCode::INVALID_METHOD);
    }
}
