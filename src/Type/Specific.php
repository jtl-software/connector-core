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
class Specific extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('isGlobal', 'boolean', false, false, false, false),
            new PropertyInfo('sort', 'integer', 0, false, false, false),
            new PropertyInfo('type', 'string', '', false, false, false),
            new PropertyInfo('i18ns', '\Jtl\Connector\Core\Model\SpecificI18n', null, false, false, true),
            new PropertyInfo('values', '\Jtl\Connector\Core\Model\SpecificValue', null, false, false, true),
        );
    }

    public function isMain()
    {
        return true;
    }
}
