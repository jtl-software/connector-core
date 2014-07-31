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
			new PropertyInfo('customerOrderItemId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('productId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('productVariationId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('productVariationValueId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('productVariationName', 'string', '', false, false, false),
			new PropertyInfo('productVariationValueName', 'string', '', false, false, false),
			new PropertyInfo('surcharge', 'float', 0.0, false, false, false),
        );
    }
}
