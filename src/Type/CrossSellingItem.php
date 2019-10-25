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
class CrossSellingItem extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('crossSellingGroupId', 'Identity', null, false, true, false),
            new PropertyInfo('productIds', '\Jtl\Connector\Core\Model\Identity', null, false, false, true),
        );
    }

    public function isMain()
    {
        return false;
    }
}
