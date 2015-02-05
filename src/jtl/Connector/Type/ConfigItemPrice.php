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
            new PropertyInfo('configItemId', 'string', '', false, false, false),
            new PropertyInfo('customerGroupId', 'string', '', false, false, false),
            new PropertyInfo('price', 'double', 0.0, false, false, false),
            new PropertyInfo('type', 'string', '', false, false, false),
		);
    }

	public function isMain()
	{
		return false;
	}
}
