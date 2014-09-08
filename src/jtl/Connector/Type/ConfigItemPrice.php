<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class ConfigItemPrice extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('configItemId', 'int', null, true, true, false),
            new PropertyInfo('customerGroupId', 'int', null, true, true, false),
            new PropertyInfo('price', 'float', null, false, false, false),
            new PropertyInfo('type', 'int', null, false, false, false),
        );
    }

	public function isMain()
	{
		return false;
	}
}
