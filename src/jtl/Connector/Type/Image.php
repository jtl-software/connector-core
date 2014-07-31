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
class Image extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('filename', 'string', '', false, false, false),
			new PropertyInfo('foreignKey', '\jtl\Connector\Model\IdentityKeyPair', null, false, false, false),
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, false, false, false),
			new PropertyInfo('masterImageId', '\jtl\Connector\Model\IdentityKeyPair', null, false, false, false),
			new PropertyInfo('relationType', 'integer', 0, false, false, false),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
        );
    }
}
