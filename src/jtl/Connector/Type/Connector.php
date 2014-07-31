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
class Connector extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'7A6CE769' => new PropertyInfo('companyId', 'integer', 0, false, false, false),
			'CDE6B7C7' => new PropertyInfo('id', 'integer', 0, true, true, true),
			'597AD442' => new PropertyInfo('isActive', 'boolean', false, false, false, false),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
			'7786EDC3' => new PropertyInfo('token', 'string', '', false, false, false),
			'AD7DA7E9' => new PropertyInfo('url', 'string', '', false, false, false),
        );
    }
}


