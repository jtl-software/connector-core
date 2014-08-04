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
class ProductSpecialPrice extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('productId', 'Identity', null, False, false, false),
            new PropertyInfo('activeFrom', 'string', null, False, false, false),
            new PropertyInfo('activeUntil', 'string', null, False, false, false),
            new PropertyInfo('considerDateLimit', 'bool', null, False, false, false),
            new PropertyInfo('considerStockLimit', 'bool', null, False, false, false),
            new PropertyInfo('isActive', 'bool', null, False, false, false),
            new PropertyInfo('stockLimit', 'double', null, False, false, false),
            new PropertyInfo('specialPrices', '\jtl\Connector\Model\SpecialPrice', null, false, false, true),
        );
    }
}
