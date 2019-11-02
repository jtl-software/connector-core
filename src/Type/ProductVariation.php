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
class ProductVariation extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('sort', 'integer', 0, false, false, false),
            new PropertyInfo('type', 'string', '', false, false, false),
            new PropertyInfo('i18ns', 'Jtl\Connector\Core\Model\ProductVariationI18n', null, false, false, true),
            new PropertyInfo('invisibilities', 'Jtl\Connector\Core\Model\ProductVariationInvisibility', null, false, false, true),
            new PropertyInfo('values', 'Jtl\Connector\Core\Model\ProductVariationValue', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return false;
    }
}
