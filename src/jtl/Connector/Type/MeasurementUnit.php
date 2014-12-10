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
class MeasurementUnit extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('code', 'string', null, false, false, false),
            new PropertyInfo('displayCode', 'string', null, false, false, false),
            new PropertyInfo('id', 'int', null, true, true, false),
        );
    }

	public function isMain()
	{
		return false;
	}
}
