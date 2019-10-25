<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use \Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class ProductVariationValue extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('ean', 'string', '', false, false, false),
            new PropertyInfo('extraWeight', 'double', 0.0, false, false, false),
            new PropertyInfo('sku', 'string', '', false, false, false),
            new PropertyInfo('sort', 'integer', 0, false, false, false),
            new PropertyInfo('stockLevel', 'double', 0.0, false, false, false),
            new PropertyInfo('extraCharges', '\Jtl\Connector\Core\Model\ProductVariationValueExtraCharge', null, false, false, true),
            new PropertyInfo('i18ns', '\Jtl\Connector\Core\Model\ProductVariationValueI18n', null, false, false, true),
            new PropertyInfo('invisibilities', '\Jtl\Connector\Core\Model\ProductVariationValueInvisibility', null, false, false, true),
        );
    }

    public function isMain()
    {
        return false;
    }
}
