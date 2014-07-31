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
class ConnectorLink extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('connectorId', 'integer', 0, true, false, false),
			new PropertyInfo('endpointId', 'string', '', true, false, false),
			new PropertyInfo('type', 'integer', 0, true, false, false),
			new PropertyInfo('wawiId', 'integer', 0, true, false, false),
        );
    }
}
