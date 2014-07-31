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
class Currency extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('beforeAmount', 'boolean', false, false, false, false),
			new PropertyInfo('decimalSeparator', 'string', '', false, false, false),
			new PropertyInfo('factor', 'float', 0.0, false, false, false),
			new PropertyInfo('isDefault', 'boolean', false, false, false, false),
			new PropertyInfo('lastModified', '\jtl\Connector\Model\DateTime', null, false, false, false),
			new PropertyInfo('mapping', 'string', '', false, false, false),
			new PropertyInfo('name', 'string', '', false, false, false),
			new PropertyInfo('nameHTML', 'string', '', false, false, false),
			new PropertyInfo('thousandsSeparator', 'string', '', false, false, false),
        );
    }
}
