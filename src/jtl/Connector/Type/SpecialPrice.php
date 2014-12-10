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
class SpecialPrice extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerGroupId', 'int', null, true, true, false),
            new PropertyInfo('priceNet', 'double', null, false, false, false),
            new PropertyInfo('productSpecialPriceId', 'int', null, true, true, false),
        );
    }

	public function isMain()
	{
		return false;
	}
}
