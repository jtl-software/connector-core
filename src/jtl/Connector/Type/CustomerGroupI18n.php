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
class CustomerGroupI18n extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerGroupId', 'Identity', null, True, false, false),
            new PropertyInfo('localeName', 'string', null, True, false, false),
            new PropertyInfo('name', 'string', null, False, false, false),
            new PropertyInfo('customerGroup', '\jtl\Connector\Model\CustomerGroup', null, false, false, true),
        );
    }
}
