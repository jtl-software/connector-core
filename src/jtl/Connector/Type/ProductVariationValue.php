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
class ProductVariationValue extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('extraWeight', 'double', null, false, false, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('productVariationId', 'int', null, false, true, false),
            new PropertyInfo('sku', 'string', null, false, false, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
            new PropertyInfo('stockLevel', 'double', null, false, false, false),
            new PropertyInfo('dependencies', '\jtl\Connector\Model\ProductVariationValueDependency', null, false, false, true),
            new PropertyInfo('extraCharges', '\jtl\Connector\Model\ProductVariationValueExtraCharge', null, false, false, true),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\ProductVariationValueI18n', null, false, false, true),
            new PropertyInfo('invisibilities', '\jtl\Connector\Model\ProductVariationValueInvisibility', null, false, false, true),
        );
    }

	public function isMain()
	{
		return false;
	}
}
