<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Exception
 */
namespace Jtl\Connector\Core\Exception;

/**
 * RPC Exception Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class RpcException extends \Exception
{
    const PARSE_ERROR = -32701;

    /**
     * @return RpcException
     */
    public static function parseError(): RpcException
    {
        return new self("Parse error", self::PARSE_ERROR);
    }
}
