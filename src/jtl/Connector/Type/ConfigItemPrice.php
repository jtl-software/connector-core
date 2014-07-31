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
class ConfigItemPrice extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'E84CBC37' => new PropertyInfo('configItemId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'C5988257' => new PropertyInfo('customerGroupId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'EC19DDD9' => new PropertyInfo('taxClassId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'569E932A' => new PropertyInfo('connectorId', 'integer', 0, true, true, true),
			'4AAF050E' => new PropertyInfo('price', 'float', 0.0, false, false, false),
			'C15430A6' => new PropertyInfo('type', 'integer', 0, false, false, false),
        );
    }
}


