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
class ConfigGroup extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'E2466323' => new PropertyInfo('comment', 'string', '', false, false, false),
			'30EBA8FF' => new PropertyInfo('image', '\jtl\Connector\Model\Byte[]', null, false, false, false),
			'A744C846' => new PropertyInfo('maximumSelection', 'integer', 0, false, false, false),
			'8677EDC0' => new PropertyInfo('minimumSelection', 'integer', 0, false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
			'C15430A6' => new PropertyInfo('type', 'integer', 0, false, false, false),
        );
    }
}


