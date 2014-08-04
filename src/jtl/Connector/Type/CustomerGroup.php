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
class CustomerGroup extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('applyNetPrice', 'bool', null, False, false, false),
            new PropertyInfo('discount', 'double', null, False, false, false),
            new PropertyInfo('isDefault', 'bool', null, False, false, false),
            new PropertyInfo('attributes', '\jtl\Connector\Model\CustomerGroupAttr', null, false, false, true),
            new PropertyInfo('i18n', '\jtl\Connector\Model\CustomerGroupI18n', null, false, false, true),
        );
    }
}
