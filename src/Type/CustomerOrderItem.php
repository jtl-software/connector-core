<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use \Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class CustomerOrderItem extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('configItemId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('productId', 'Identity', null, false, true, false),
            new PropertyInfo('name', 'string', '', false, false, false),
            new PropertyInfo('price', 'double', 0.0, false, false, false),
            new PropertyInfo('priceGross', 'double', 0.0, false, false, false),
            new PropertyInfo('quantity', 'double', 0.0, false, false, false),
            new PropertyInfo('sku', 'string', '', false, false, false),
            new PropertyInfo('type', 'string', '', false, false, false),
            new PropertyInfo('note', 'string', '', false, false, false),
            new PropertyInfo('unique', 'string', '', false, false, false),
            new PropertyInfo('vat', 'double', 0.0, false, false, false),
            new PropertyInfo('variations', 'Jtl\Connector\Core\Model\CustomerOrderItemVariation', null, false, false, true),
        );
    }

    public function isMain()
    {
        return false;
    }
}
