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
class SpecificImage extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('foreignKey', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('connectorId', 'integer', 0, false, false, false),
			new PropertyInfo('data', '\jtl\Connector\Model\Byte[]', null, false, false, false),
			new PropertyInfo('flagUpdate', 'boolean', false, false, false, false),
			new PropertyInfo('size', 'integer', 0, false, false, false),
			new PropertyInfo('sort', 'integer', 0, false, false, false),
        );
    }
}
