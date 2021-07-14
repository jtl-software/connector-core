<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package Jtl\Connector\Core\Type
 */

namespace Jtl\Connector\Core\Type;

/**
 * @access public
 * @package Jtl\Connector\Core\Type
 */
class CrossSellingItem extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('crossSellingGroup', 'Jtl\Connector\Core\Model\CrossSellingGroup', null, false, false, true),
            new PropertyInfo('crossSellingGroupId', 'Identity', null, false, true, false),
            new PropertyInfo('productIds', 'Jtl\Connector\Core\Model\Identity', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return false;
    }
}
