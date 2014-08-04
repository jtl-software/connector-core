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
class SpecificI18n extends DataType
{
    protected function loadProperties()
    {
        return array(
            new PropertyInfo('specificId', 'Identity', null, true, true, false),
            new PropertyInfo('localeName', 'string', null, true, false, false),
            new PropertyInfo('name', 'string', null, false, false, false),
        );
    }
}
