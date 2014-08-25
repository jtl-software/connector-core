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
class ProductConfigGroup extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('configGroupId', 'int', null, true, true, false),
            new PropertyInfo('id', 'int', null, false, true, false),
            new PropertyInfo('productId', 'int', null, true, true, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
        );
    }
}
