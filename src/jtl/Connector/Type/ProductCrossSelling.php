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
class ProductCrossSelling extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('crossProductId', 'Identity', null, false, true, false),
            new PropertyInfo('crossSellingGroupId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('productId', 'Identity', null, false, true, false),
        );
    }

    public function isMain()
    {
        return false;
    }
}
