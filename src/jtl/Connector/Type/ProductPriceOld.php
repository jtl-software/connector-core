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
class ProductPriceOld extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('customerGroupId', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('productId', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('connectorId', 'integer', 0, true, false, false),
			new PropertyInfo('netPercent1', 'float', 0.0, false, false, false),
			new PropertyInfo('netPercent2', 'float', 0.0, false, false, false),
			new PropertyInfo('netPercent3', 'float', 0.0, false, false, false),
			new PropertyInfo('netPercent4', 'float', 0.0, false, false, false),
			new PropertyInfo('netPercent5', 'float', 0.0, false, false, false),
			new PropertyInfo('netPrice', 'float', 0.0, false, false, false),
			new PropertyInfo('netPrice1', 'float', 0.0, false, false, false),
			new PropertyInfo('netPrice2', 'float', 0.0, false, false, false),
			new PropertyInfo('netPrice3', 'float', 0.0, false, false, false),
			new PropertyInfo('netPrice4', 'float', 0.0, false, false, false),
			new PropertyInfo('netPrice5', 'float', 0.0, false, false, false),
			new PropertyInfo('percent', 'float', 0.0, false, false, false),
			new PropertyInfo('quantity1', 'integer', 0, false, false, false),
			new PropertyInfo('quantity2', 'integer', 0, false, false, false),
			new PropertyInfo('quantity3', 'integer', 0, false, false, false),
			new PropertyInfo('quantity4', 'integer', 0, false, false, false),
			new PropertyInfo('quantity5', 'integer', 0, false, false, false),
        );
    }
}
