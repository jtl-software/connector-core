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
class ProductConfigGroup extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('configGroupId', 'Identity', null, True, false, false),
            new PropertyInfo('id', 'Identity', null, False, false, false),
            new PropertyInfo('productId', 'Identity', null, True, false, false),
            new PropertyInfo('sort', 'int', null, False, false, false),
        );
    }
}
