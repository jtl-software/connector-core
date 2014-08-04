<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
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
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('productVariationId', 'Identity', null, False, false, false),
            new PropertyInfo('extraWeight', 'double', null, False, false, false),
            new PropertyInfo('sku', 'string', null, False, false, false),
            new PropertyInfo('sort', 'int', null, False, false, false),
            new PropertyInfo('stockLevel', 'double', null, False, false, false),
            new PropertyInfo('dependencies', '\jtl\Connector\Model\ProductVariationValueDependency', null, false, false, true),
            new PropertyInfo('extraCharges', '\jtl\Connector\Model\ProductVariationValueExtraCharge', null, false, false, true),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\ProductVariationValueI18n', null, false, false, true),
            new PropertyInfo('invisibilities', '\jtl\Connector\Model\ProductVariationValueInvisibility', null, false, false, true),
        );
    }
}
