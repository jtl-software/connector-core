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
class Product extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('productVariationId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('cName', 'string', '', false, false, false),
			new PropertyInfo('dependencies', '\jtl\Connector\Model\ProductVariationValueDependency', null, false, false, true),
			new PropertyInfo('ean', 'string', '', false, false, false),
			new PropertyInfo('extraCharge', 'float', 0.0, false, false, false),
			new PropertyInfo('extraChargeNet', 'float', 0.0, false, false, false),
			new PropertyInfo('extraCharges', '\jtl\Connector\Model\ProductVariationValueExtraCharge', null, false, false, true),
			new PropertyInfo('extraWeight', 'float', 0.0, false, false, false),
			new PropertyInfo('flagUpdate', 'boolean', false, false, false, false),
			new PropertyInfo('i18ns', '\jtl\Connector\Model\ProductVariationValueI18n', null, false, false, true),
			new PropertyInfo('invisibilities', '\jtl\Connector\Model\ProductVariationValueInvisibility', null, false, false, true),
			new PropertyInfo('isActive', 'boolean', false, false, false, false),
			new PropertyInfo('sku', 'string', '', false, false, false),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
			new PropertyInfo('stockLevel', 'float', 0.0, false, false, false),
        );
    }
}
