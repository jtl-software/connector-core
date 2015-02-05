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
class CustomerGroupPackagingQuantities extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customergroupID', 'string', '', false, false, false),
            new PropertyInfo('minimumOrderQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('packagingQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('productId', 'string', '', false, false, false),
        );
    }

    public function isMain()
    {
        return false;
    }
}
