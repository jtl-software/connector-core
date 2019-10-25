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
class CustomerGroupPackagingQuantity extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerGroupId', 'Identity', null, false, true, false),
            new PropertyInfo('minimumOrderQuantity', 'double', 0.0, false, false, false),
            new PropertyInfo('packagingQuantity', 'double', 0.0, false, false, false),
        );
    }

    public function isMain()
    {
        return false;
    }
}
