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
class ConnectorLog extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'569E932A' => new PropertyInfo('connectorId', 'integer', 0, false, false, false),
			'4BDA0302' => new PropertyInfo('date', '\jtl\Connector\Model\DateTime', null, false, false, false),
			'C1F336EC' => new PropertyInfo('message', 'string', '', false, false, false),
        );
    }
}


