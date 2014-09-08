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
class CustomerGroupAttr extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerGroupId', 'int', null, false, true, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('key', 'string', null, false, false, false),
            new PropertyInfo('value', 'string', null, false, false, false),
            new PropertyInfo('customerGroup', '\jtl\Connector\Model\CustomerGroup', null, false, false, true),
        );
    }

	public function isMain()
	{
		return false;
	}
}
