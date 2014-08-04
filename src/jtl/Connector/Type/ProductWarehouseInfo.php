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
class ProductWarehouseInfo extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('productId', 'Identity', null, true, true, false),
            new PropertyInfo('warehouseId', 'Identity', null, true, true, false),
            new PropertyInfo('inflowDate', 'string', null, false, false, false),
            new PropertyInfo('inflowQuantity', 'double', null, false, false, false),
            new PropertyInfo('stockLevel', 'double', null, false, false, false),
        );
    }
}
