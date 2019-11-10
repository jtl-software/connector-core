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
class ProductConfigGroup extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('configGroupId', 'Identity', null, false, true, false),
            new PropertyInfo('sort', 'integer', 0, false, false, false),
        ];
    }

    public function isMain()
    {
        return false;
    }
}
