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
class ConfigGroupI18n extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('configGroupId', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('description', 'string', '', false, false, false),
			new PropertyInfo('localeName', 'string', '', true, false, false),
			new PropertyInfo('name', 'string', '', false, false, false),
        );
    }
}
