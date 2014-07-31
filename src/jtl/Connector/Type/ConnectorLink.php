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
class ConnectorLink extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'569E932A' => new PropertyInfo('connectorId', 'integer', 0, true, true, true),
			'446352C0' => new PropertyInfo('endpointId', 'string', '', true, true, true),
			'C15430A6' => new PropertyInfo('type', 'integer', 0, true, true, true),
			'75BF1A9F' => new PropertyInfo('wawiId', 'integer', 0, true, true, true),
        );
    }
}


