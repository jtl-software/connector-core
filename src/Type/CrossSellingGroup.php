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
class CrossSellingGroup extends AbstractDataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('id', 'Identity', null, false, true, false),
            new PropertyInfo('i18ns', 'Jtl\Connector\Core\Model\CrossSellingGroupI18n', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return false;
    }
}
