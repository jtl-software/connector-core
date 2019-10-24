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
class ProductVariationInvisibility extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('customerGroupId', 'Identity', null, true, true, false),
            new PropertyInfo('productVariationId', 'Identity', null, true, true, false),
        );
    }

    public function isMain()
    {
        return false;
    }
}
