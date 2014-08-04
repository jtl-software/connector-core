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
class ProductPrice extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerGroupId', 'Identity', null, True, false, false),
            new PropertyInfo('productId', 'Identity', null, True, false, false),
            new PropertyInfo('netPrice', 'double', null, False, false, false),
            new PropertyInfo('quantity', 'int', null, False, false, false),
        );
    }
}
