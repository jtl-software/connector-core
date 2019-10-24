<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Utilities
 */

namespace Jtl\Connector\Core\Utilities;

class ClassName
{
    /**
     * Converts the Class from given Namespace
     *
     * @param string $class_namespace
     * @return string
     */
    public static function getFromNS($class_namespace)
    {
        return substr($class_namespace, strrpos($class_namespace, "\\") + 1);
    }
}
