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
class ProductSpecialPrice extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('activeFrom', 'DateTime', null, false, false, false),
            new PropertyInfo('activeUntil', 'DateTime', null, false, false, false),
            new PropertyInfo('considerDateLimit', 'bool', null, false, false, false),
            new PropertyInfo('considerStockLimit', 'bool', null, false, false, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('isActive', 'bool', null, false, false, false),
            new PropertyInfo('productId', 'int', null, false, true, false),
            new PropertyInfo('stockLimit', 'double', null, false, false, false),
            new PropertyInfo('specialPrices', '\jtl\Connector\Model\SpecialPrice', null, false, false, true),
        );
    }

	public function isMain()
	{
		return false;
	}
}
