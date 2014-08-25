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
class CategoryCustomerGroup extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('categoryId', 'int', null, true, true, false),
            new PropertyInfo('connectorId', 'int', null, true, true, false),
            new PropertyInfo('customerGroupId', 'int', null, true, true, false),
            new PropertyInfo('discount', 'double', null, false, false, false),
        );
    }
}
