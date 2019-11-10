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
class Product2Category extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('categoryId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false)
        ];
    }

    public function isMain()
    {
        return false;
    }
}
