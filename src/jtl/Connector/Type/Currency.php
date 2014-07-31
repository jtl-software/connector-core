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
class Currency extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'702EE75A' => new PropertyInfo('beforeAmount', 'boolean', false, false, false, false),
			'9B0026EA' => new PropertyInfo('decimalSeparator', 'string', '', false, false, false),
			'CE87900C' => new PropertyInfo('factor', 'float', 0.0, false, false, false),
			'B0DDC840' => new PropertyInfo('isDefault', 'boolean', false, false, false, false),
			'BA72D4FC' => new PropertyInfo('lastModified', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'2F139D1B' => new PropertyInfo('mapping', 'string', '', false, false, false),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
			'956526F8' => new PropertyInfo('nameHTML', 'string', '', false, false, false),
			'0C4B6CE6' => new PropertyInfo('thousandsSeparator', 'string', '', false, false, false),
        );
    }
}


