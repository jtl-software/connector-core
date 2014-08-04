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
class CustomerOrderItemVariation extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerOrderItemId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('productVariationId', 'Identity', null, false, true, false),
            new PropertyInfo('productVariationValueId', 'Identity', null, false, true, false),
            new PropertyInfo('freeField', 'string', null, false, false, false),
            new PropertyInfo('productVariationName', 'string', null, false, false, false),
            new PropertyInfo('productVariationValueName', 'string', null, false, false, false),
            new PropertyInfo('surcharge', 'double', null, false, false, false),
        );
    }
}
