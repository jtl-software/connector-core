<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Product extends DataModel
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('productId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('activeFrom', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('activeUntil', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('considerDateLimit', 'integer', 0, false, false, false),
			new PropertyInfo('considerStockLimit', 'integer', 0, false, false, false),
			new PropertyInfo('isActive', 'boolean', false, false, false, false),
			new PropertyInfo('specialPrices', '\jtl\Connector\Model\SpecialPrice', null, false, false, true),
			new PropertyInfo('stockLimit', 'integer', 0, false, false, false),
        );
    }
}
