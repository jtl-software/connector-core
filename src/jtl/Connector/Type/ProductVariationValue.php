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
class ProductVariationValue extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'81B11883' => new PropertyInfo('productVariationId', '\jtl\Connector\Model\Identity', null, false, false, false),
			'A6DCA77D' => new PropertyInfo('cName', 'string', '', false, false, false),
			'F2BD910F' => new PropertyInfo('ean', 'string', '', false, false, false),
			'3717EAA7' => new PropertyInfo('extraCharge', 'float', 0.0, false, false, false),
			'50B2011E' => new PropertyInfo('extraChargeNet', 'float', 0.0, false, false, false),
			'99D79C46' => new PropertyInfo('extraWeight', 'float', 0.0, false, false, false),
			'3CE59533' => new PropertyInfo('flagUpdate', 'boolean', false, false, false, false),
			'597AD442' => new PropertyInfo('isActive', 'boolean', false, false, false, false),
			'3AE077AE' => new PropertyInfo('sku', 'string', '', false, false, false),
			'484219DD' => new PropertyInfo('sort', 'integer', 0, false, false, false),
			'3E1E1991' => new PropertyInfo('stockLevel', 'float', 0.0, false, false, false),
        );
    }
}


