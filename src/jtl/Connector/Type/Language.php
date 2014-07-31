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
class Language extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('isDefault', 'boolean', false, false, false, false),
			new PropertyInfo('localeName', 'string', '', false, false, false),
			new PropertyInfo('nameEnglish', 'string', '', false, false, false),
			new PropertyInfo('nameGerman', 'string', '', false, false, false),
        );
    }
}
