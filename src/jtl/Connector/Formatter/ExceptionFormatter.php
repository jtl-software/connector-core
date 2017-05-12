<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Formatter
 */

namespace jtl\Connector\Formatter;

class ExceptionFormatter
{
    /**
     * @param \Throwable $exc
     * @param string $message
     * @return string
     */
    public static function format(\Throwable $exc, $message = '')
    {
        return sprintf(
            "Exception '%s' (Code: %s) with message '%s' in %s:%s%s",
            get_class($exc),
            $exc->getCode(),
            $exc->getMessage(),
            $exc->getFile(),
            $exc->getLine(),
            (strlen($message) > 0 ? " - additional message: {$message}" : '')
        );
    }
}
