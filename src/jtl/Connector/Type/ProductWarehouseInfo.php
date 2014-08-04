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
class ProductWarehouseInfo extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('productId', 'Identity', null, True, false, false),
            new PropertyInfo('warehouseId', 'Identity', null, True, false, false),
            new PropertyInfo('inflowDate', 'string', null, False, false, false),
            new PropertyInfo('inflowQuantity', 'double', null, False, false, false),
            new PropertyInfo('stockLevel', 'double', null, False, false, false),
        );
    }
}
