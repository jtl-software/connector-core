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
class TaxRate extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'EC19DDD9' => new PropertyInfo('taxClassId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'26AB5087' => new PropertyInfo('taxZoneId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'21D6EA8F' => new PropertyInfo('priority', 'integer', 0, false, false, false),
			'4BDA0314' => new PropertyInfo('rate', 'float', 0.0, false, false, false),
        );
    }
}


