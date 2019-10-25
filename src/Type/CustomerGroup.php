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
class CustomerGroup extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('applyNetPrice', 'boolean', false, false, false, false),
            new PropertyInfo('discount', 'double', 0.0, false, false, false),
            new PropertyInfo('isDefault', 'boolean', false, false, false, false),
            new PropertyInfo('attributes', 'Jtl\Connector\Core\Model\CustomerGroupAttr', null, false, false, true),
            new PropertyInfo('i18ns', 'Jtl\Connector\Core\Model\CustomerGroupI18n', null, false, false, true),
        );
    }

    public function isMain()
    {
        return false;
    }
}
