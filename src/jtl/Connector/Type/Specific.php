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
class Specific extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'1702AA1E' => new PropertyInfo('isGlobal', 'boolean', false, false, false, false),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
			'C15430A6' => new PropertyInfo('type', 'string', '', false, false, false),
        );
    }
}


