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
class CategoryInvisibility extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('customerGroupId', 'Identity', null, true, true, false)
        ];
    }

    public function isMain()
    {
        return false;
    }
}
