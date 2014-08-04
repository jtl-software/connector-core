<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Specific extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('id', 'Identity', null, True, false, false),
            new PropertyInfo('isGlobal', 'bool', null, False, false, false),
            new PropertyInfo('sort', 'int', null, False, false, false),
            new PropertyInfo('type', 'string', null, False, false, false),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\SpecificI18n', null, false, false, true),
            new PropertyInfo('values', '\jtl\Connector\Model\SpecificValue', null, false, false, true),
        );
    }
}
