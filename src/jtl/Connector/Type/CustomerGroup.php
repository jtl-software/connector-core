<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Product extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('applyNetPrice', 'integer', 0, false, false, false),
			new PropertyInfo('attributes', '\jtl\Connector\Model\CustomerGroupAttr', null, false, false, true),
			new PropertyInfo('discount', 'float', 0.0, false, false, false),
			new PropertyInfo('i18n', '\jtl\Connector\Model\CustomerGroupI18n', null, false, false, true),
			new PropertyInfo('isDefault', 'boolean', false, false, false, false),
			new PropertyInfo('kKundenDrucktext', 'integer', 0, false, false, false),
			new PropertyInfo('name', 'string', '', false, false, false),
        );
    }
}
