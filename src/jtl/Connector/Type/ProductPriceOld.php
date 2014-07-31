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
class ProductPriceOld extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'C5988257' => new PropertyInfo('customerGroupId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'46FFEF34' => new PropertyInfo('productId', '\jtl\Connector\Model\Identity', null, true, true, true),
			'569E932A' => new PropertyInfo('connectorId', 'integer', 0, true, true, true),
			'43410916' => new PropertyInfo('netPercent1', 'float', 0.0, false, false, false),
			'A099947B' => new PropertyInfo('netPercent2', 'float', 0.0, false, false, false),
			'FDF21FE0' => new PropertyInfo('netPercent3', 'float', 0.0, false, false, false),
			'5B4AAB45' => new PropertyInfo('netPercent4', 'float', 0.0, false, false, false),
			'B8A336AA' => new PropertyInfo('netPercent5', 'float', 0.0, false, false, false),
			'9ADBE9DF' => new PropertyInfo('netPrice', 'float', 0.0, false, false, false),
			'68E9BF9D' => new PropertyInfo('netPrice1', 'float', 0.0, false, false, false),
			'68E9BF9A' => new PropertyInfo('netPrice2', 'float', 0.0, false, false, false),
			'68E9BF9B' => new PropertyInfo('netPrice3', 'float', 0.0, false, false, false),
			'68E9BFA0' => new PropertyInfo('netPrice4', 'float', 0.0, false, false, false),
			'68E9BFA1' => new PropertyInfo('netPrice5', 'float', 0.0, false, false, false),
			'6C138203' => new PropertyInfo('percent', 'float', 0.0, false, false, false),
			'1CB5515F' => new PropertyInfo('quantity1', 'integer', 0, false, false, false),
			'1CB5515C' => new PropertyInfo('quantity2', 'integer', 0, false, false, false),
			'1CB5515D' => new PropertyInfo('quantity3', 'integer', 0, false, false, false),
			'1CB5515A' => new PropertyInfo('quantity4', 'integer', 0, false, false, false),
			'1CB5515B' => new PropertyInfo('quantity5', 'integer', 0, false, false, false),
        );
    }
}


