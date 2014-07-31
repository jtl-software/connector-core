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
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('taxClassId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('taxZoneId', '\jtl\Connector\Model\IdentityKeyPair', null, false, true, false),
			new PropertyInfo('priority', 'integer', 0, false, false, false),
			new PropertyInfo('rate', 'float', 0.0, false, false, false),
        );
    }
}
