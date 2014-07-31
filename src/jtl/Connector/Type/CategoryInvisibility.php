<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Product extends DataType
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('categoryId', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('customerGroupId', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('connectorId', 'integer', 0, true, false, false),
        );
    }
}
