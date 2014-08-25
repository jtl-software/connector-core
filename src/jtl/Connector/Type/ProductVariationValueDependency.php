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
class ProductVariationValueDependency extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('productVariationValueId', 'int', null, true, true, false),
            new PropertyInfo('productVariationValueTargetId', 'int', null, true, true, false),
        );
    }
}
