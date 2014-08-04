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
class ProductVariationValueDependency extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('productVariationValueId', 'Identity', null, True, false, false),
            new PropertyInfo('productVariationValueTargetId', 'Identity', null, True, false, false),
        );
    }
}
