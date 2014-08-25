<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use \jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class ConfigGroup extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('comment', 'string', null, false, false, false),
            new PropertyInfo('id', 'int', null, true, true, false),
            new PropertyInfo('imagePath', 'string', null, false, false, false),
            new PropertyInfo('maximumSelection', 'int', null, false, false, false),
            new PropertyInfo('minimumSelection', 'int', null, false, false, false),
            new PropertyInfo('sort', 'int', null, false, false, false),
            new PropertyInfo('type', 'int', null, false, false, false),
            new PropertyInfo('i18ns', '\jtl\Connector\Model\ConfigGroupI18n', null, false, false, true),
        );
    }
}
