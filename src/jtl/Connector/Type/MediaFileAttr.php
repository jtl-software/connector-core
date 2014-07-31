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
class MediaFileAttr extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('mediaFileId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('key', 'string', '', false, false, false),
			new PropertyInfo('localeName', 'string', '', false, false, false),
			new PropertyInfo('value', 'string', '', false, false, false),
        );
    }
}
