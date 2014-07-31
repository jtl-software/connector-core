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
class CustomerGroup extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'93C47682' => new PropertyInfo('applyNetPrice', 'integer', 0, false, false, false),
			'4ACB38AA' => new PropertyInfo('discount', 'float', 0.0, false, false, false),
			'B0DDC840' => new PropertyInfo('isDefault', 'boolean', false, false, false, false),
			'2E7EAA9A' => new PropertyInfo('kKundenDrucktext', 'integer', 0, false, false, false),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
        );
    }
}


