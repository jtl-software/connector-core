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
class ConnectorSync extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'8D04BB52' => new PropertyInfo('action', '\jtl\Connector\Model\Byte[]', null, false, false, false),
			'9AFD0062' => new PropertyInfo('key', 'integer', 0, false, false, false),
			'79394B50' => new PropertyInfo('syncId', 'integer', 0, true, true, true),
			'C15430A6' => new PropertyInfo('type', 'integer', 0, false, false, false),
        );
    }
}


