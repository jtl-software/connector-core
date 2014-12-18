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
class ProductPrice extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerGroupId', 'int', null, false, true, false),
            new PropertyInfo('productId', 'int', null, false, true, false),
            new PropertyInfo('items', '\jtl\Connector\Model\ProductPriceItem', null, false, false, true),
        );
    }

	public function isMain()
	{
		return false;
	}
}
