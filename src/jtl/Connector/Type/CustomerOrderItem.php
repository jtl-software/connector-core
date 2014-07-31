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
			new PropertyInfo('configItemId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('customerOrderId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('productId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('grossPrice', 'float', 0.0, false, false, false),
			new PropertyInfo('kBestellStueckliste', 'integer', 0, false, false, false),
			new PropertyInfo('name', 'string', '', false, false, false),
			new PropertyInfo('price', 'float', 0.0, false, false, false),
			new PropertyInfo('quantity', 'float', 0.0, false, false, false),
			new PropertyInfo('sku', 'string', '', false, false, false),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
			new PropertyInfo('type', 'string', '', false, false, false),
			new PropertyInfo('unique', 'string', '', false, false, false),
			new PropertyInfo('variations', '\jtl\Connector\Model\CustomerOrderItemVariation', null, false, false, true),
			new PropertyInfo('vat', 'float', 0.0, false, false, false),
        );
    }
}
