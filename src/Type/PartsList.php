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
class PartsList extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('productId', 'Identity', null, true, true, false),
            new PropertyInfo('quantity', 'double', 0.0, false, false, false),
        ];
    }

    public function isMain()
    {
        return false;
    }
}
