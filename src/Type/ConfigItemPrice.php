<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use \Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class ConfigItemPrice extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('configItemId', 'Identity', null, true, true, false),
            new PropertyInfo('customerGroupId', 'Identity', null, true, true, false),
            new PropertyInfo('price', 'double', 0.0, false, false, false),
            new PropertyInfo('type', 'integer', 0, false, false, false),
        );
    }

    public function isMain()
    {
        return false;
    }
}
