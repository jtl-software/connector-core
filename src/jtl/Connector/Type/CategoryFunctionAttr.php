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
class CategoryFunctionAttr extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('categoryId', 'int', null, false, true, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('name', 'string', null, false, false, false),
            new PropertyInfo('value', 'string', null, false, false, false),
        );
    }
}
