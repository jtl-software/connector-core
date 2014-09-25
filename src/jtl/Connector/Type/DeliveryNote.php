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
class DeliveryNote extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('created', 'DateTime', null, false, false, false),
            new PropertyInfo('customerOrderId', 'int', null, false, true, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('isFulfillment', 'bool', null, false, false, false),
            new PropertyInfo('note', 'string', null, false, false, false),
        );
    }

	public function isMain()
	{
		return true;
	}
}
