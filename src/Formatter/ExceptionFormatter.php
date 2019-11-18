<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Formatter
 */

namespace Jtl\Connector\Core\Formatter;

use Jtl\Connector\Core\Error\ErrorHandler;

class ExceptionFormatter
{
    /**
     * @param \Throwable $exc
     * @param string $message
     * @return string
     */
    public static function format(\Throwable $e, $message = '')
    {
        return sprintf(
            "Exception '%s' (Code: %s) with message '%s' in %s:%s%s",
            get_class($e),
            $e->getCode(),
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            (strlen($message) > 0 ? " - additional message: {$message}" : '')
        );
    }
}
