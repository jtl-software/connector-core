<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Connector\Formatter
 */

namespace jtl\Connector\Connector\Formatter;

class ExceptionFormatter
{
    public static function format(\Exception $exc)
    {
        return sprintf("Exception '%s' with message '%s' in %s:%s", get_class($exc), $exc->getMessage(), $exc->getFile(), $exc->getFile());
    }
}