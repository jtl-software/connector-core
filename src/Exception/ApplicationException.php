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
    /**
     * @return ApplicationException
     */
    public static function noSession(): ApplicationException
    {
        return new static('Could not get any Session', ErrorCode::NO_SESSION);
    }
}
