<?php
/**
 *
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Exception
 */
namespace Jtl\Connector\Core\Exception;

use Jtl\Connector\Core\Definition\ErrorCode;

/**
 * Application Exception Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class ApplicationException extends \Exception
{
    const CONNECTOR_DIR_MISSING = 10;

    /**
     * @return ApplicationException
     */
    public static function noSession(): self
    {
        return new static('Could not get any Session', ErrorCode::NO_SESSION);
    }

    /**
     * @return ApplicationException
     */
    public static function connectorDirMissing(): self
    {
        return new static('Constant CONNECTOR_DIR is not defined', self::CONNECTOR_DIR_MISSING);
    }
}
