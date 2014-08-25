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
            new PropertyInfo('inflowDate', 'DateTime', null, false, false, false),
            new PropertyInfo('inflowQuantity', 'double', null, false, false, false),
            new PropertyInfo('productId', 'int', null, true, true, false),
            new PropertyInfo('stockLevel', 'double', null, false, false, false),
            new PropertyInfo('warehouseId', 'int', null, true, true, false),
        );
    }
}
