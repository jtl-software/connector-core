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
class ProductWarehouseInfo extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('productId', 'Identity', null, true, true, false),
            new PropertyInfo('warehouseId', 'Identity', null, true, true, false),
            new PropertyInfo('inflowQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('stockLevel', 'double', 0.0, false, false, false),
        ];
    }

    public function isMain()
    {
        return false;
    }
}
