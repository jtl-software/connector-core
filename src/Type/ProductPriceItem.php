<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

use Jtl\Connector\Core\Type\PropertyInfo;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class ProductPriceItem extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('netPrice', 'double', 0.0, false, false, false),
            new PropertyInfo('quantity', 'integer', 0, false, false, false)
        ];
    }

    public function isMain()
    {
        return false;
    }
}
