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
class CustomerOrderItemVariation extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerOrderItemId', 'Identity', null, False, false, false),
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('productVariationId', 'Identity', null, False, false, false),
            new PropertyInfo('productVariationValueId', 'Identity', null, False, false, false),
            new PropertyInfo('freeField', 'string', null, False, false, false),
            new PropertyInfo('productVariationName', 'string', null, False, false, false),
            new PropertyInfo('productVariationValueName', 'string', null, False, false, false),
            new PropertyInfo('surcharge', 'double', null, False, false, false),
        );
    }
}
