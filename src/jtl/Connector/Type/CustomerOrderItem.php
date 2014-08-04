<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class CustomerOrderItem extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('configItemId', 'Identity', null, False, false, false),
            new PropertyInfo('customerOrderId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('productId', 'Identity', null, False, false, false),
            new PropertyInfo('shippingClassId', 'Identity', null, False, false, false),
            new PropertyInfo('name', 'string', null, False, false, false),
            new PropertyInfo('price', 'double', null, False, false, false),
            new PropertyInfo('quantity', 'int', null, False, false, false),
            new PropertyInfo('sku', 'string', null, False, false, false),
            new PropertyInfo('type', 'string', null, False, false, false),
            new PropertyInfo('unique', 'string', null, False, false, false),
            new PropertyInfo('vat', 'double', null, False, false, false),
            new PropertyInfo('variations', '\jtl\Connector\Model\CustomerOrderItemVariation', null, false, false, true),
        );
    }
}
